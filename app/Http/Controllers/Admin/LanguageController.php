<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Language;
use Illuminate\Http\Request;

class LanguageController extends Controller
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

    
}
