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

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function make_home()
    {
        $banners = DB::table('images')->where('type', 'banner')->get();
        $cases = DB::table('images')->where('type', 'cases')->get();
        $portfolios = DB::table('images')->where('type', 'portfolios')->get();
        $clients = DB::table('images')->where('type', 'client')->get();
        $teams = DB::table('images')->where('type', 'team')->get();
        $testimonials = DB::table('testimonials')->get();

        return View::make('homeindex', array('banners' => $banners, 'cases' => $cases, 'portfolios' => $portfolios, 'clients' => $clients, 'teams' => $teams, 'testimonials' => $testimonials));
    }
}
