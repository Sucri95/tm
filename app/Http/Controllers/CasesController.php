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

class CasesController extends Controller
{
	
	public function takeImgs()
    {
        return DB::table('images')->where('type', 'cases')->get();
    }

    public function takeCases()
    {
        return Cases::all();
    }


    public function casesView()
    {
        if (Auth::check()) {

            return View::make('cases.cases');

        }else{
            
            return  Redirect::to('/?msg=6&Necesita Iniciar Sesión para Realizar esta acción');
        }
    }

    public function casesUpload()
    {
    

    	$files = Input::file('picture');
        $images = $this->takeImgs();
        $allcases = $this->takecases();
        $veryport = 0;
        $very = 0;

        foreach ($allcases as $port) {

        	if ($port->name == Input::get('name')) {
        		$veryport = 1;
        	}
        }

        if ($veryport == 0) {


			$cases = new Cases;
			$cases->name = Input::get('name');
			$tags = Input::get('array_tags');
			$cases->tags = $tags;
			$cases->html = Input::get('html');


			$getext = $files[0]->getClientOriginalName();
			$exploder = explode('.', $getext);


			if (Input::get('name') != '') {

				$title = Input::get('name');
				$name = $title .'.'. $exploder[1];

			}else{
				
				$name = 'case1.'. $exploder[1];
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

				$saver = $files[0]->move('uploads', $name);

			}else{

				$saver = $files[0]->move('uploads', $name);

				$image        = new Images;           
				$image->route = $route;
				$image->type  = 'cases';
				$image->id_parent = $cases->id;
				$image->save();

				$cases->id_images = $image->id;
			}

			$cases->save();

			DB::table('images')->where('id', $cases->id_images)->update(['id_parent' => $cases->id]);


		

        }else{

        	$portfolio = DB::table('cases')->where('name', Input::get('name'))->first();

        	DB::table('cases')->where('name', Input::get('name'))->update(['name' => Input::get('name')]);
        	DB::table('cases')->where('name', Input::get('name'))->update(['tags' => Input::get('array_tags')]);
        	DB::table('cases')->where('name', Input::get('name'))->update(['html' => Input::get('html')]);


			$getext = $files[0]->getClientOriginalName();
			$exploder = explode('.', $getext);


			if (Input::get('name') != '') {

				$title = Input::get('name');
				$name = $title .'.'. $exploder[1];

			}else{
				
				$name = 'portfolio.'. $exploder[1];
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

				$saver = $files[0]->move('uploads', $name);

			}else{

				$saver = $files[0]->move('uploads', $name);

				$image        = new Images;           
				$image->route = $route;
				$image->type  = 'cases';
				$image->id_parent = $portfolio->id;
				$image->save();
			}

			DB::table('images')->where('id', $portfolio->id_images)->update(['id_parent' => $portfolio->id]);



        return Redirect::to('/home');
        }
    }
}
