<?php

namespace App\Modules\Page\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function index(){
        return view('frontpage.home.home');
    }
    public function checkout(){
        return view('frontpage.campaign.checkout');
    }
}
