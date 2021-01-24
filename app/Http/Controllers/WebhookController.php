<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use App\Transaction;
use App\User;
use Illuminate\Http\Request;

class WebhookController extends Controller
{
    public function handle(Request $request){

        $address = $request->addr;
        $status = $request->status;
        try{
            $client =  new Client();
            $response = $client->get('https://www.blockonomics.co/api/merchant_order/'.$address,[
                'headers'=>['Authorization'=> 'Bearer 5RR8EaCwLyRpzEjZx25MmSaRmJ8VoCOHmu8lY0WDH9I'],
            ]);

            $data = json_decode($response->getBody());
            $data_string =json_encode($data);
            error_log($data_string);
           
            $product_name = $data->name;
            $price = $data->value;
            $mail = $data->data->emailid;
            $extra_data = json_decode($data->data->extradata);
            $color = $extra_data->color;
            
            $user = User::where('email','=',$mail)->first();

            if(Transaction::where('address','=',$address)->count()){
                $object = Transaction::where('address','=',$address)->first();
                $object->status = (string)$status;
                $user->transactions()->save($object);
            }
            else{
                $object = new Transaction();
                $object->address = $address;
                $object->offered_price = $price;
                $object->color = $color;
                $object->status = (string)$status;
                $object->product_name = $product_name;
                $user->transactions()->save($object);
            }
        }
        catch (\Exception $e){
            error_log($e);
        }

    }
}
