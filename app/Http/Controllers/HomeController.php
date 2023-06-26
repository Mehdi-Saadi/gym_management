<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        $trainers = User::where('is_trainer', 1)->get();
        $categories = Category::all();
        return view('index', compact(['trainers', 'categories']));
    }
    public function about()
    {
        $trainers = User::where('is_trainer', 1)->get();
        return view('about-us', compact(['trainers']));
    }
    public function classes()
    {
        return view('class-details');
    }
    public function trainers()
    {
        $trainers = User::where('is_trainer', 1)->get();
        return view('team', compact('trainers'));
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
    public function dashboard()
    {
        return view('dashboard');
    }

}
