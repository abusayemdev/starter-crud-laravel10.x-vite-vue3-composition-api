<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Translation;

class LocalizationController extends Controller
{
    public function changeLanguage(Request $request, $locale)
    {
        session()->put('locale', $locale);

        return redirect()->back();
    }

    public function translation($text)
    {
        $lang = app()->getLocale();
        $translation = Translation::where('text', $text)->where('lang', $lang)->first();

        if ($translation) {
            $text = $translation->translation;
        }

        return response()->json(['text' => $text]);

    
    }
}
