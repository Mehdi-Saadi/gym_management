<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function classes()
    {
        return view('admin.class.classes');
    }

    public function createClass()
    {
        return view('admin.class.newClass');
    }

    public function addClass()
    {

    }
}
