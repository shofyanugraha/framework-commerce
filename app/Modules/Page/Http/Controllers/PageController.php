<?php

namespace App\Modules\Page\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Ixudra\Curl\Facades\Curl;

class PageController extends Controller
{
    public function index(){
        $param = [];
        $param['offset'] = 12;
        $res = Curl::to(env('API_URL').'product/home')
            ->withData($param)
            ->asJson()
            ->get();
        $latest = null;
        if (isset($res) && $res->meta->status == TRUE) {
            $latest = $res->data;
        }
        return view('frontpage.home.home', compact('latest'));
    }

    public function category($parent, $child = null){
        $param = [];
        $param['offset'] = 12;
        if($child){
            $res = Curl::to(env('API_URL').'product/category/'.$parent.'/'.$child)
            ->withData($param)
            ->asJson()
            ->get();
        } else {
            $res = Curl::to(env('API_URL').'product/category/'.$parent)
            ->withData($param)
            ->asJson()
            ->get();
        }
        $latest = null;
        $category = null;
        if (isset($res) && $res->meta->status == TRUE) {
            $latest = $res->data;
            $category = $res->category;
        }

        $param = [];
        $param['offset'] = 100;
        $param['type'] = 'tree';

        $param['category_id'] = $category->parent_id;
        $curl = \Curl::to(env('API_URL', 'http://api-calcio.dev/v1').'category')
            ->withData($param)

            ->asJson()
            ->get();

        $cat = null;
        if($curl != null) {
            $cat =  $curl->data;
        }


        return view('frontpage.home.category', compact('latest','category', 'cat'));
    }

    public function about(){
        return view('frontpage.page.about');
    }
    public function sales($username, $slug){
        $param = [];
        $param['attribute'] = 'description,status';
        $res = Curl::to(env('API_URL').'product/'.$username.'/'.$slug)
            ->withData($param)
            ->asJson()
            ->get();
        $data = null;
        if (isset($res) && $res->meta->status == TRUE) {
            $data = $res->data;
        }


        return view('frontpage.campaign.sales', compact('data'));
    }
    public function checkout($code){
        $res = Curl::to(env('API_URL').'master/province')
            ->asJson()
            ->get();
        $province = null;
        if (isset($res) && $res->meta->status == TRUE) {
            $province = $res->data;
        }

        $param = [];
        $param['offset'] = 10;
        $res = Curl::to(env('API_URL').'master/bank')
            ->withData($param)
            ->asJson()
            ->get();
        $banks = null;
        if (isset($res) && $res->meta->status == TRUE) {
            $banks = $res->data;
        }

        return view('frontpage.campaign.checkout', compact('code', 'province', 'banks'));
    }
    public function cart(){
        return view('frontpage.campaign.cart');
    }

    public function trackorder(){
        return view('frontpage.home.trackorder');
    }

    public function trackorderGet($code){
        return view('frontpage.home.trackorder', compact('code'));
    }

    public function postTrackorder($code){
        $param = [];
        $param['attribute'] = 'receiver_phone,address,email';
        $res = Curl::to(env('API_URL').'order/'.$code)
            ->asJson()
            ->withData($param)
            ->get();
        $order = null;
        if (isset($res) && $res->meta->status == TRUE) {
            $order = $res->data;
        }
        $res = Curl::to(env('API_URL').'order/'.$code.'/history')
            ->asJson()
            ->get();
        $histories = null;
        if (isset($res) && $res->meta->status == TRUE) {
            $histories = $res->data;
        }

        $res = Curl::to(env('API_URL').'order/'.$code.'/detail')
            ->asJson()
            ->get();
        $details = null;
        if (isset($res) && $res->meta->status == TRUE) {
            $details = $res->data;
        }
        return view('frontpage.home.trackorder-result', compact('order', 'histories', 'details'));
    }

    public function confirmation(){
        $res = Curl::to(env('API_URL').'master/bank')
            ->asJson()
            ->get();
        $bank = null;
        if (isset($res) && $res->meta->status == TRUE) {
            $bank = $res->data;
        }
        return view('frontpage.campaign.confirmation', compact('bank'));
    }

    public function orderSuccess($code){
        $res = Curl::to(env('API_URL').'order/'.$code)
            ->asJson()
            ->get();
        $order = null;
        if (isset($res) && $res->meta->status == TRUE) {
            $order = $res->data;
        }
        $res = Curl::to(env('API_URL').'order/'.$code.'/bank')
            ->asJson()
            ->get();
        $bank = null;
        if (isset($res) && $res->meta->status == TRUE) {
            $bank = $res->data;
        }
        return view('frontpage.campaign.success', compact('order', 'bank'));
    }

}
