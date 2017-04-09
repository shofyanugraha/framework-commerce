<?php

namespace App\Modules\Page\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function home() {
    	return view('page::home');
    }
}
