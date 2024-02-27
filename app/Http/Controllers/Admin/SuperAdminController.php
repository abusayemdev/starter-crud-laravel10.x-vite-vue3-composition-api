<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\SuperAdmin\StoreRequest;
use App\Http\Requests\Admin\SuperAdmin\UpdateRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Brian2694\Toastr\Facades\Toastr;
use App\Utilities\Utility;
use Auth;


class SuperAdminController extends Controller
{
    protected $_config;

    public function __construct(Request $request)
    {
        $this->_config = $request->_config;
    }

    public function index()
    {
        $auth_id = Auth::user()->id;
        $isAdmin = User::where('account_type','admin')->find($auth_id); 
        $admins = User::where('account_type','admin')->get();
        return view($this->_config['view'], compact('admins','isAdmin'));
    }   

    public function create()
    {
        return view($this->_config['view']);
    }

    public function store(StoreRequest $request)
    {
        $validData = $request->validated();

        if (!$validData) 
        {
            return Utility::validDataError();
        }

        $data = $request->all();
        
        if ($request->hasFile('avatar')) {
            $fieldName = 'avatar';
            $uploadPath = 'asset/backend/img/avatar/';
            Utility::processImage($request, $data, $fieldName, $uploadPath);
        }

        if ($request->password !== null) {
            $data['password'] = Hash::make($request->password);
        }else {
            unset($data['password']);
        }

        $data['account_type'] = "admin";
        $admin = User::create($data);

        return Utility::handleResult($admin, $this->_config['redirect'], 'Admins inserted successfully!', 'ERROR!');
    }


    public function make_super_admin($id)
    {
        $update = User::find($id)->update(['isMainAdmin' => 1]);
        return Utility::handleResult($update, $this->_config['redirect'], 'Super admin made successfully!', 'ERROR!');
    }


    public function make_admin($id)
    {
        $update = User::find($id)->update(['isMainAdmin' => 0]);
        return Utility::handleResult($update, $this->_config['redirect'], 'Super admin cancelled!', 'ERROR!');
    }


    public function show($id)
    {
        $admin = User::find( $id);
        return view($this->_config['view'], compact('admin'));  
    }

    public function edit($id)
    {
        $edit = User::find($id);
        return view($this->_config['view'], compact('edit'));
    }

    public function update(Request $request, $id)
    {
        $validator = $request->validate([
            'email' => 'required|email|unique:users,email,'.Auth::user()->id,
            'password' => 'nullable|min:8|confirmed',
        ]);

        $user = User::find($id);
        $data = $request->all();
        
        if ($request->hasFile('avatar')) {
            $fieldName = 'avatar';
            $uploadPath = 'asset/backend/img/avatar/';
            Utility::processImage($request, $data, $fieldName, $uploadPath);
            Utility::unlink($user, $fieldName);
        }

        if ($request->password !== null) {
            $data['password'] = Hash::make($request->password);
        }else {
            unset($data['password']);
        }

        $data['account_type'] = "admin";
        $update = User::find($id)->update($data);
       
        return Utility::handleResult($update, $this->_config['redirect'], 'Admins updateed successfully!', 'ERROR!');
    }


    public function destroy($id)
    {
        $admin = User::find($id);
        $fieldName = 'avatar';
        Utility::deleteWithImage($admin, $fieldName);

        return Utility::handleResult($delete, $this->_config['redirect'], 'Admin deleted successfully!', 'ERROR!');
    }
}
