<?php

//app/Helpers/helper.php

use App\Models\Translation;


//translate database text in blade
if (!function_exists('lang')) {
    function lang($text)
    {
        $lang = app()->getLocale();

        if ($lang != 'en') {
            $translation = Translation::where('text', $text)->where('lang', $lang)->first();

            if ($translation) {
                $text = $translation->translation;
            }

            return $text;
        }

        return $text;
    }
}
