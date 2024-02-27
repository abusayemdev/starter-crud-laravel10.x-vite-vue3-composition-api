<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
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

}
