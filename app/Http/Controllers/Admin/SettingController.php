<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Setting\StoreRequest;
use App\Http\Requests\Admin\Setting\UpdateRequest;
use Illuminate\Support\Str;
use Brian2694\Toastr\Facades\Toastr;
use App\Utilities\Utility;

class SettingController extends Controller
{
    protected $_config;

    public function __construct(Request $request)
    {
        $this->_config = $request->_config;
    }
    
    public function index()
    {
        return view($this->_config['view']);
    }

    public function create()
    {
        return view($this->_config['view']);
    }

    public function edit($id)
    {
        return view($this->_config['view'], compact('id'));
    }

    public function show($id)
    {
        return view($this->_config['view'], compact('id'));
    }

}
