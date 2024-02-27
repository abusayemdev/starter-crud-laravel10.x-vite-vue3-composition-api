<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Language;
use Illuminate\Http\Request;
use App\Http\Resources\Admin\LanguageResource;
use App\Http\Requests\Admin\Language\StoreRequest;
use App\Http\Requests\Admin\Language\UpdateRequest;

class LanguageController extends Controller
{

    public function index()
    {
        return LanguageResource::collection(Language::all());
    }


    public function store(StoreRequest $request)
    {
        $language = Language::create($request->validated());
 
        return new LanguageResource($language);
    }

 
    public function show(Language $language)
    {
        return new LanguageResource($language);
    }


    public function update(UpdateRequest $request, Language $language)
    {
        $language->update($request->validated());
 
        return new LanguageResource($language);
    }


    public function destroy(Language $language)
    {
        $language->delete();
 
        return response()->noContent();
    }
}
