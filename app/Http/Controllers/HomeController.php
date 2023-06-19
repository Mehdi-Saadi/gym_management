<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('index');
    }
    public function about()
    {
        return view('about-us');
    }
    public function classes()
    {
        return view('class-details');
    }
    public function trainers()
    {
        return view('team');
    }
    public function contact()
    {
        return view('contact');
    }
    public function timetable()
    {
        return view('class-timetable');
    }
    public function bmi()
    {
        return view('bmi-calculator');
    }
    public function gallery()
    {
        return view('gallery');
    }
    public function blog()
    {
        return view('blog');
    }

}
