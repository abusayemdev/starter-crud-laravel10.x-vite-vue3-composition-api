<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;


class SiteController extends Controller
{
    public function site_settings()
    {
      $site_settings =  Setting::latest()->first();

      return response()->json(['site_settings' => $site_settings]);
    }
}
