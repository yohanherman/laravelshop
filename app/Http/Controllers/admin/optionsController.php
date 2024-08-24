<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\option;
use Illuminate\Http\Request;

class optionsController extends Controller
{
    public function index()
    {

        $options = option::all();
        dd($options);
        return view();
    }
}
