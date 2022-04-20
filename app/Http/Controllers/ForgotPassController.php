<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ForgotPassModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ForgotPassController extends Controller
{
    public function index(){
        return view('forgot-password');
    }

    public function client_send_code(Request $request){

       $validator = Validator::make($request->all(), [
           'email' => "required|email|exists:clients,email"
       ],[
           'exists' => 'Email Not Found'
       ]);

       if($validator->fails()){
        //return json messages if validator detect errors
        return response()->json([
            'code' => 404,
            'errors' => $validator->getMessageBag()
        ]);
        }

        //create and store the generated number for email to send
        $FiveDigitRandomNumber = mt_rand(10000, 99999);

        if(ForgotPassModel::client_update_reset_code($request->email, $FiveDigitRandomNumber)){
            $data = ['code' => $FiveDigitRandomNumber];

            // Mail::to($email)->send(new RegisterSendEmail($data));
            return response()->json([
                'code' => 202,
            ]);
        }
        else{
            return response()->json([
                'code' => 404,
                'msg' => 'Something went wrong please try again later'
            ]);
        }
       

    }

    public function client_reset_code(Request $request){

        $validator = Validator::make($request->all(), [
            'email' => "required|email|exists:clients,email",
            'password' => "required|min:8|max:25",
            'code' => "required|numeric"
        ]);
 
        if($validator->fails()){
         //return json messages if validator detect errors
         return response()->json([
             'code' => 404,
             'errors' => $validator->getMessageBag()
         ]);
         }

         $password = Hash::make($request->password);

         $res = ForgotPassModel::client_update_password($request->email, $request->code, $password);
         if($res){
            return response()->json([
                'code' => 202
            ]);
         }
         else{
            return response()->json([
                'code' => 404,
                'errors' => array('code' => 'Invalid Code')
            ]);
         }
         


    }

    /** 
     Rider Section ----------------->
     */
    public function rider_send_code(Request $request){

        $validator = Validator::make($request->all(), [
            'email' => "required|email|exists:riders,email"
        ],[
            'exists' => 'Email Not Found'
        ]);

        if($validator->fails()){
         //return json messages if validator detect errors
         return response()->json([
             'code' => 404,
             'errors' => $validator->getMessageBag()
         ]);
        }


        //create and store the generated number for email to send
        $FiveDigitRandomNumber = mt_rand(10000, 99999);

        if(ForgotPassModel::rider_update_reset_code($request->email, $FiveDigitRandomNumber)){
            $data = ['code' => $FiveDigitRandomNumber];

            // Mail::to($email)->send(new RegisterSendEmail($data));
            return response()->json([
                'code' => 202,
            ]);
        }
        else{
            return response()->json([
                'code' => 404,
                'msg' => 'Something went wrong please try again later'
            ]);
        }

    }

    public function rider_reset_code(Request $request){

        $validator = Validator::make($request->all(), [
            'email' => "required|email|exists:riders,email",
            'password' => "required|min:8|max:25",
            'reset_code' => "required|numeric"
        ]);
 
        if($validator->fails()){
         //return json messages if validator detect errors
         return response()->json([
             'code' => 404,
             'errors' => $validator->getMessageBag()
         ]);
         }

         $password = Hash::make($request->password);

         $res = ForgotPassModel::rider_update_password($request->email, $request->reset_code, $password);
         return response()->json([
            'code' => 202
         ]);


    }
}
