<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\ProfileUpdateRequest;
use App\Models\User;
use Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Validator;
use App\Utilities\Utility;



class UserController extends Controller
{

    public function index()
    {
        return view('frontend.home');
    }

    public function profile()
    {
        if (Auth::check())
        {
            $profile = User::find(Auth::user()->id);
            return view('frontend.user.profile.user_profile', compact('profile'));   
        }
    }


    public function profile_update(ProfileUpdateRequest $request)
    {

        $id = Auth::user()->id;
        $user = User::find($id);
        $data = $request->all();

        if ($request->hasFile('avatar')) {
            $fieldName = 'avatar';
            $uploadPath = 'asset/frontend/img/avatar/';
            Utility::processImage($request, $data, $fieldName, $uploadPath);
            Utility::unlink($user, $fieldName);
        }

        if ($request->password !== null) {
            $data['password'] = Hash::make($request->password);
        }else {
            unset($data['password']);
        }

        $update = $user->update($data);

        if ($update) {
            return response()->json(['message' => "Profile updated!"]);
        }else {
            return response()->json(['error' => "Error!"]);
        }

    }
    
}
