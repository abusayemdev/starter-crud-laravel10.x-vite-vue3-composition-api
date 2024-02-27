<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Translation;
use Illuminate\Http\Request;
use App\Http\Resources\Admin\TranslationResource;
use Stichoza\GoogleTranslate\GoogleTranslate;


class TranslationController extends Controller
{
 
    public function index()
    {
        return TranslationResource::collection(Translation::latest()->get());
    }

    public function store(Request $request)
    {
        $request->validate([
            'addmore' => ['required'],
            'lang' => ['required'],
        ]);

        $languages = $request->lang;
        $all_text = $request->addmore;

       foreach ($languages as $lang) {
            $translator = new GoogleTranslate();
            $translator->setTarget($lang); 

            foreach ($all_text as $text) {

                $textToTranslate = $text;
                $translation = $translator->translate($textToTranslate);

                $data['text'] = $textToTranslate;
                $data['lang'] = $lang;
                $data['translation'] = $translation;

                $translation_exits = Translation::where('text', $textToTranslate)->where('lang', $lang)->first();

                if (!$translation_exits ) {
                    $translation = Translation::create($data);
                } else {
                   $error = session()->flash('error', 'This data already exists in database!');
                    return response($error);
                }
            }
       }
 
        return new TranslationResource($translation);
    }

 
    public function show(Translation $translation)
    {
        return new TranslationResource($translation);
    }


    public function update(Request $request, Translation $translation)
    {
        $request->validate([
            'text' => ['required'],
            'lang' => ['required'],
        ]);

        $lang = $request->lang;
        $text = $request->text;

        $translator = new GoogleTranslate();
        $translator->setTarget($lang); 
        $trans = $translator->translate($text);

        $data['text'] = $text;
        $data['lang'] = $lang;
        $data['translation'] = $trans;

        $translation->update($data);

        return new TranslationResource($translation);
    }


    public function destroy(Translation $translation)
    {
        $translation->delete();
 
        return response()->noContent();
    }
}
