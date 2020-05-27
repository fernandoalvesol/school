<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiteController extends Controller
{
    public function index(){

        $title = "Pagina Home";

        return view('Site.Home.index', compact('title'));

    }
}
