<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\SocialMedia;
use Illuminate\Http\Request;

class SocialMediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $social_media = SocialMedia::create($data);

        return response()->json(['social_medial' => $social_media]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user_id = $id;

        $social_media = SocialMedia::where('user_id', $user_id)->latest()->first();

        return response()->json(['social_media' => $social_media]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SocialMedia $socialMedia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user_id = $id;

        $social_media = SocialMedia::where('user_id', $user_id)->latest()->first();

        $social_media_id = $social_media->id;

        $data = $request->all();
        
        SocialMedia::find($social_media_id)->update($data);

        return response()->json(['message'=> "Social Media data updated!"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SocialMedia $socialMedia)
    {
        //
    }
}
