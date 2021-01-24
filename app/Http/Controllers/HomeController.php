<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Product;
use App\Transaction;
use App\User;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::all();
        return view('home')->with(['products' => $products]);
        
    }
    
    public function track()
    {
        $all_transactions = Transaction::all();
        $transactions = $all_transactions->filter(function($transaction){
            return $transaction->user_id == Auth::id(); 
        });
        return view('track')->with(['transactions' => $transactions]);
    }

    public function handle(Request $request){

        $product = $request->product;
        $price = (int)$request->value;
        $offer = $request->offer;
        $color = $request->color;
        $offered_price = $price;

        if($offer == '1'){
            $offered_price = max(0.75*$price, $price-75);
        }
        else if($offer == '2'){
            $offered_price = $price - 50;
        }
        else if($offer == '3'){
            $offered_price = 0.9*$price;
        }
        $data = array(
            "offer"=>$offer,
            "color"=>$color,
        );

        $parent_uid = "672d2b8e57ef11eb";

        $client =  new Client();
        $response = $client->post('https://www.blockonomics.co/api/create_child_product',[
            'headers'=>['Authorization'=> 'Bearer '.env('Blockonomics_API','')],
            'json' => ['parent_uid' => $parent_uid, 'product_name' => $product, 
            "value" => $offered_price, "extra_data" => (string)json_encode($data)],
        ]);

        $resp = json_decode($response->getBody());
        $data_string =json_encode($resp);
        error_log($data_string);

        $response = array(
            'link' => 'https://www.blockonomics.co/pay-url/'.$resp->uid,
            'price' => $offered_price,
        );
        return response()->json($response); 
    }
}
