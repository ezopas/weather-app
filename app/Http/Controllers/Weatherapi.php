<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

class Weatherapi extends Controller
{
    public function index(){
        return view('welcome');
    }
    public function getdata(Request $request){

        $validator = Validator::make($request->all(), [
            $request->input('town') => 'required',
            $request->input('key') => 'required',
        ]);

//        if(request()->ajax()){
//
//
//            }
//        if ($validator->fails()) {
//            return "error";
//        }else{
            //$data = json_decode(file_get_contents("https://samples.openweathermap.org/data/2.5/forecast?q=&appid=b1b15e88fa797225412429c1c50c122a1​"));

        $data = "https://api.openweathermap.org/data/2.5/forecast?q=".$request->input('town')."&appid=".$request->input('key');
        $data = file_get_contents($data);
        $data = utf8_decode($data);
        $data = json_decode($data, true);

        if($data['cod'] == '401'){

            $content = array('a' => "<a class='nav-item nav-link' id='error-tab' data-toggle='tab' href='#error' role='tab'>error</a>",
                'b' => "<div class='tab-pane fade' role='tabpanel' id='error'>
          <strong>Get informaition failed</strong></div>");
        }else{
            //return var_dump($data['list'][0]);

            $content = array('a' => "<a class='nav-item nav-link' id='".$data['city']['name']."-tab' data-toggle='tab' href='#".$data['city']['name']."' role='tab'>".$data['city']['name']."</a>",
                'b' => "<div class='tab-pane fade' role='tabpanel' id='".$data['city']['name']."'>
          <strong>City:</strong> ". $data['city']['name'].",".$data['city']['country']." <strong>Weather:</strong> ".$data['list'][0]['weather'][0]['description']." <strong>Temperature:</strong> ".($data['list'][0]['main']['temp']-273.15).
                    "</div>");
        }

            //utf8_encode($data);
          return json_encode($content);
       // }
    }

    public function get_http_response_code($url) {
        $headers = get_headers($url);
        return substr($headers[0], 9, 3);
    }
}
