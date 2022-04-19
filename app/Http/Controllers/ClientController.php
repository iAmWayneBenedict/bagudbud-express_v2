<?php

namespace App\Http\Controllers;

use App\Rules\ContactNumber;
use Illuminate\Http\Request;
use App\Mail\RegisterSendEmail;
use App\Models\Client\ClientModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{
    public function clientSignup() {
        return view('client.client-signup');
    }

    public function store(Request $request){

        /**
            *validate inputs from the user
            @ContactNumber -> validate contact number
        */

        $validator = Validator::make($request->all(), [
            'password' => 'required|min:8',
            'f_name' => 'required|regex:/^[a-zA-Z\\s]+$/u',
            'l_name' => 'required|regex:/^[a-zA-Z\\s]+$/u',
            'zone' => 'required|',
            'barangay' => 'required|',
            'municipality' => 'required|',
            'email' => ['required', 'email', 'unique:clients'],
            'contact_num' => ['required', new ContactNumber],
            'business_name' => 'required|',
            'product_type' => 'required|'
        ], [
            'f_name.required' => 'The First Name field is required',
            'l_name.required' => 'The Last Name field is required',
            'f_name.regex' => 'First Name is Invalid Format',
            'l_name.regex' => 'Last Name is Invalid Format'
        ]);

        if($validator->fails()){
            //return json messages if validator detect errors
            return response()->json([
                'code' => 404,
                'errors' => $validator->getMessageBag()
            ]);
        }

        // password hash before inserting into database
        $password = Hash::make($request->password);

        //create unique verification key for every users
        $verification_key = substr(md5(time() . $request->f_name), 0, 12);

        $address = "{$request->zone}, {$request->barangay}";
        $email = $request->email;

        $input_data = [
            'password' => $password,
            'f_name' => ucwords($request->f_name),
            'l_name'=> ucwords($request->l_name),
            'address' => ucwords($address),
            'municipality' => $request->municipality,
            'email' => $email,
            'contact_num' => $request->contact_num,
            'business_name' => $request->business_name,
            'product_type' => $request->product_type,
            'v_key' => $verification_key
        ];

        if(ClientModel::create($input_data)){

            $data = ['vkey' => $verification_key];

            // Mail::to($email)->send(new RegisterSendEmail($data));
            return response()->json([ 
                'code' => 200,
                'mssg' => "Check your email, We sent a verification mail to {$email}"
            ]);
        }      
    
    }

    public function verify_email($vkey){
       /*
        param: vkey: it is the key parameter from email after the user click the link
        return: back to the login form if unsuccessful with fail message
       */ 
       $verify_account = new ClientModel();

       if($verify_account->verify_account($vkey) == 1){
           return redirect('login');
       }
       else{
           return redirect('login')->with('fail', 'Account Cannot Verified');
       }
    }

    public function clientLogin() {
        return view('client.client-login');
    }

    public function login_Auth(Request $request){
        
        //validate all client/user inputs
        $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        $client_model = new ClientModel();
        $login_response = $client_model->login_process($request->email, $request->password);

        switch ($login_response) {
            case 1:
                return back()->with('fail', 'Your Account is not verified, Check your email');
                break;
            case 2:
                return back()->with('fail', 'Email address not found');
                break;
            case 3:
                return back()->with('fail', 'Password not match');
                break;
            default:
                // $request->session()->put('user_id', $login_response);
                return back()->with('success', $login_response);
        }   
    }
}
