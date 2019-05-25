<?php

namespace App\Modules\Page\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function index(Request $request){
    	return view('frontpage.index');
    }
}
