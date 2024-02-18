<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;
use App\Models\Category;
use App\Models\Car;
//use Illuminate\Database\Eloquent\Collection;

class WebController extends Controller
{
    public function index()
    {
        $categories= Category::get();
        $cars = Car::where('published', 1)->orderBy('id', 'desc')->take(6)->get();
        $testimonials = Testimonial::where('published', 1)->orderBy('id', 'desc')->take(3)->get();
        return view('user.index', compact('cars','testimonials','categories'));
    }

    public function about()
    {
        return view('user.about');
    }

    public function blog()
    {
        return view('user.blog');
    }

    public function contact()
    {
        return view('user.contact');
    }

    public function listing()
    {
       $cars = Car::where('published', 1)->orderBy('id', 'desc')->paginate(6);   
       $testimonials = Testimonial::where('published', 1)->orderBy('id', 'desc')->take(3)->get();
       return view('user.listing',compact('testimonials', 'cars'));
    }   

    public function single(string $id)
    {        
        $cars = Car::findOrFail($id);
        $categories = Category::get(); 
        return view('user.single', compact('cars','categories'));
    }

    public function testimonials()
    {
        $testimonials = Testimonial::where('published', 1)->orderBy('id', 'desc')->get();
        return view('user.testimonials', compact('testimonials'));        
    }
}
