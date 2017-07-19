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
        $res = Curl::to(env('API_URL').'product')
            ->withData($param)
            ->asJson()
            ->get();
        $latest = null;
        if (isset($res) && $res->meta->status == TRUE) {
            $latest = $res->data;
        }
        return view('frontpage.home.home', compact('latest'));
    }
    public function sales($username, $slug){
        $param = [];
        $param['offset'] = 4;
        $param['attribute'] = 'description';
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

        return view('frontpage.campaign.checkout', compact('code', 'province'));
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
