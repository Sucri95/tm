<?php

namespace App\Http\Controllers;

use Request;
use Input;
use View;
use Redirect;
use Auth;
use DB;
use Image;
use Validator;
use Session;
use App\Cases;
use App\Images;
use App\Portfolios;
use App\Testimonials;
use App\User;
use Illuminate\Support\Facades\File;

class TestimonialsController extends Controller
{

    public function getTestimonials()
    {
        return Testimonials::all();
    }

    public function testimonialView()
    {
        if (Auth::check()) {

            return View::make('testimonials.testimonialsupload');

        }else{
            
            return  Redirect::to('/?msg=6&Necesita Iniciar Sesión para Realizar esta acción');
        }
    }

    public function testimonialUpload()
    {

        $testimonials = $this->getTestimonials();
        $very = 0;

        $files = Input::file('picture');

        $getext = $files->getClientOriginalName();
        $exploder = explode('.', $getext);

        if (Input::get('title') != '') {

            $title = Input::get('title');
            $name = $title .'.'. $exploder[1];

        }else{

            $name = 'testimonial.'. $exploder[1];
        
        }

        $path  = '../../photos/';
        $route = $path . $name;

        foreach ($testimonials as $test) {
         
            if ($test->id_images == $route) {
         
                $very = 1;
         
            }
        }

        if ($very == 1) {

            $saver = $files->move('photos', $name);

            DB::table('testimonials')->where('id_images', $route)->update(['name' => Input::get('name')]);
            DB::table('testimonials')->where('id_images', $route)->update(['author' => Input::get('author')]);
            DB::table('testimonials')->where('id_images', $route)->update(['bio' => Input::get('bio')]);

        }else{

            $saver = $files->move('photos', $name);
            $testimonial          = new Testimonials;           
            $testimonial->name = Input::get('name');
            $testimonial->author = Input::get('author');
            $testimonial->id_images = $route;
            $testimonial->bio = Input::get('bio');
            $testimonial->save();

        }

        return Redirect::to('/home');
        
    }
}
