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

class PortfoliosController extends Controller
{
	public function takeImgs()
    {
        return Images::all();
    }

    public function takePortfolios()
    {
        return Portfolios::all();
    }

    public function portfoliosView()
    {
        if (Auth::check()) {

            return View::make('portfolios.portfolios');

        }else{
            
            return  Redirect::to('/?msg=6&Necesita Iniciar Sesión para Realizar esta acción');
        }
    }

    public function portfoliosUpload()
    {

    	$files = Input::file('picture');
        $images = $this->takeImgs();
        $allportfolios = $this->takePortfolios();
        $veryport = 0;
        $very = 0;

        foreach ($allportfolios as $port) {
        	if ($port->name == Input::get('name')) {
        		$veryport = 1;
        	}
        }

        if ($veryport == 0) {


			$portfolios = new Portfolios;
			$portfolios->name = Input::get('name');
			$tags = Input::get('array_tags');
			$portfolios->tags = $tags;
			$portfolios->html = Input::get('html');


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
				if ($img->route == $route) {
					$very = 1;
				}
			}

			if ($very == 1) {

				$saver = $files[0]->move('uploads', $name);

			}else{

				$saver = $files[0]->move('uploads', $name);

				$image        = new Images;           
				$image->route = $route;
				$image->type  = 'portfolios';
				$image->id_parent = $portfolios->id;
				$image->save();

				$portfolios->id_images = $image->id;
			}

			$portfolios->save();

			DB::table('images')->where('id', $portfolios->id_images)->update(['id_parent' => $portfolios->id]);


		

        }else{

        	$portfolio = DB::table('portfolios')->where('name', Input::get('name'))->first();

        	DB::table('portfolios')->where('name', Input::get('name'))->update(['name' => Input::get('name')]);
        	DB::table('portfolios')->where('name', Input::get('name'))->update(['tags' => Input::get('array_tags')]);
        	DB::table('portfolios')->where('name', Input::get('name'))->update(['html' => Input::get('html')]);


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
				if ($img->route == $route) {
					$very = 1;
				}
			}

			if ($very == 1) {

				$saver = $files[0]->move('uploads', $name);

			}else{

				$saver = $files[0]->move('uploads', $name);

				$image        = new Images;           
				$image->route = $route;
				$image->type  = 'portfolios';
				$image->id_parent = $portfolio->id;
				$image->save();
			}

			DB::table('images')->where('id', $portfolio->id_images)->update(['id_parent' => $portfolio->id]);



        }

        return Redirect::to('/home');
        
    }
}
