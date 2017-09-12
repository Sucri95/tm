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

class ImagesController extends Controller
{

    public function takeImgs()
    {
        return Images::all();
    }

    public function bannerView()
    {
        if (Auth::check()) {

            return View::make('home.bannerupload');

        }else{
            
            return  Redirect::to('/?msg=6&Necesita Iniciar Sesión para Realizar esta acción');
        }
    }
    public function bannerUpload()
    {
    
    	$files = Input::file('picture');
        $count = count($files);
        $images = DB::table('images')->where('type', 'banner')->get();
        $very = 0;

        for ($i=0; $i < $count; $i++) {

            $getext = $files[$i]->getClientOriginalName();
            $exploder = explode('.', $getext);

            if (Input::get('title') != '') {

                $title = Input::get('title');
                $name = $title .'.'. $exploder[1];
            }else{
                $name = '1.'. $exploder[1];
            }
            
            $path                = '../../uploads/';
            $route = $path . $name;

            foreach ($images as $img) {

                $explode = explode('/', $img->route);

                $name_db = explode('.', $explode[3]);

                if ($name_db[0] == $title) {
                    $very = 1;
                }
            }

            if ($very == 1) {
                
                $saver = $files[$i]->move('uploads', $name);
            
            }else{

                $saver = $files[$i]->move('uploads', $name);

                $banner          = new Images;           
                $banner->route = $route;
                $banner->type = 'banner';
                $banner->save();
            }

        }

        return Redirect::to('/home');
        
    }
    
    public function teamView()
    {
        if (Auth::check()) {

            return View::make('home.teamupload');

        }else{
            
            return  Redirect::to('/?msg=6&Necesita Iniciar Sesión para Realizar esta acción');
        }
    }
    public function teamUpload()
    {
    
        $files = Input::file('picture');
        $count = count($files);
        $images = DB::table('images')->where('type', 'team')->get();
        $very = 0;

        for ($i=0; $i < $count; $i++) {

            $getext = $files[$i]->getClientOriginalName();
            $exploder = explode('.', $getext);


            if (Input::get('title') != '') {

                $title = Input::get('title');
                $name = $title .'.'. $exploder[1];
            }else{
                $name = 'team1.'. $exploder[1];
            }

            $path                = '../../uploads/';
            $route = $path . $name;
            
            foreach ($images as $img) {

                $explode = explode('/', $img->route);

                $name_db = explode('.', $explode[3]);

                if ($name_db[0] == $title) {
                    $very = 1;
                    DB::table('images')->where('route', $img->route)->update(['route' => $route]);
                }
            }

            if ($very == 1) {
                
                $saver = $files[$i]->move('uploads', $name);
            
            }else{

                $saver = $files[$i]->move('uploads', $name); 
                               
                $banner        = new Images;           
                $banner->route = $route;
                $banner->title = Input::get('title');
                $banner->type = 'team';
                $banner->save();

            }


        }

        return Redirect::to('/home');
        
    }

    public function clientView()
    {
        if (Auth::check()) {

            return View::make('home.clientupload');

        }else{
            
            return  Redirect::to('/?msg=6&Necesita Iniciar Sesión para Realizar esta acción');
        }
    }
    public function clientUpload()
    {
    
        $files = Input::file('picture');
        $count = count($files);
        $images = DB::table('images')->where('type', 'team')->get();
        $very = 0;

        for ($i=0; $i < $count; $i++) {

            $getext = $files[$i]->getClientOriginalName();
            $exploder = explode('.', $getext);


            if (Input::get('title') != '') {

                $title = Input::get('title');
                $name = $title .'.'. $exploder[1];
            }else{
                $name = 'client_pic.'. $exploder[1];
            }

            $path                = '../../uploads/';
            $route = $path . $name;

            foreach ($images as $img) {

                $explode = explode('/', $img->route);

                $name_db = explode('.', $explode[3]);

                if ($name_db[0] == $title) {
                    $very = 1;
                    DB::table('images')->where('route', $img->route)->update(['route' => $route]);
                }
            }

            if ($very == 1) {
                
                $saver = $files[$i]->move('uploads', $name);
            
            }else{

                $saver = $files[$i]->move('uploads', $name); 
                      
                $banner          = new Images;           
                $banner->route = $route;
                $banner->title = Input::get('title');
                $banner->type = 'client';
                $banner->save();

            }

        }

        return Redirect::to('/home');
        
    }
}
