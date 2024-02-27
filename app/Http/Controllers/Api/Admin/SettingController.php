<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Resources\Admin\SettingResource;
use App\Http\Requests\Admin\Setting\StoreRequest;
use App\Http\Requests\Admin\Setting\UpdateRequest;
use App\Utilities\Utility;


class SettingController extends Controller
{
    public function index()
    {
        return SettingResource::collection(Setting::get());
    }


    public function store(StoreRequest $request)
    {
        $validData = $request->validated();

        $data = $request->all();

        if ($request->hasFile('Logo')) {
            $fieldName = 'Logo';
            $uploadPath = 'asset/backend/img/Logo/';
            Utility::processImage($request, $data, $fieldName, $uploadPath);
        }

        $setting = Setting::create($data);
 
        return new SettingResource($setting);
    }

 
    public function show(Setting $setting)
    {
        return new SettingResource($setting);
    }


    public function update(UpdateRequest $request, Setting $setting)
    {
        $validData = $request->validated();

        if (!$validData) 
        {
           return Utility::validDataError();
        }
      
        $data = $request->all();

        if ($request->hasFile('Logo')) {
            $fieldName = 'Logo';
            $uploadPath = 'asset/backend/img/Logo/';
            Utility::processImage($request, $data, $fieldName, $uploadPath);
            Utility::unlink($setting, $fieldName);
        }

        $update = $setting->update($data);
 
        return new SettingResource($setting);
    }

    public function destroy(Setting $setting)
    {
        $fieldName = 'Logo';
        
        Utility::deleteWithImage($setting, $fieldName);

        return response()->noContent();
    }

    public function toggle_status_setting($id)
    {
        $setting = Setting::find($id);
        
        if ($setting->Status == 0) {
            $update = $setting->update(['Status' => 1]);
            return response(['success' => 'Settings actived successfully!']);
        } else {
            $update = $setting->update(['Status' => 0]);
            return response(['success' => 'Settings deactived successfully!']);
        }
    }

}
