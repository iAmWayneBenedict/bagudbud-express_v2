<?php

namespace App\Models\Client;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Hash;

class ClientModel extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'clients';
    protected $fillable = [
        'password',
        'f_name',
        'l_name',
        'address',
        'municipality',
        'email',
        'contact_num',
        'business_name',
        'product_type',
        'v_key'
    ];

    public function check_verification($email){
        /*
            check in the enail in database if already used
            param: $value : input email
        */
        $client_account = DB::table('clients')
            ->where('email', $email)
            ->pluck('verified');
        if($client_account[0] == 0){
            return true;
        }
        else{
            return false;
        }
    }

    public function login_process($email, $password){
        /* 
            param: email: client email for the account
            param: password: clear text password
        */

        // return values
        $not_verified = 1;
        $email_not_found = 2;
        $wrong_password = 3;
        $success = 4;

        $login = DB::table('clients')
            ->where('email', $email)
            ->first(); # get the first row if match
        
        if($login){
            if($login->verified == 0){
                return $not_verified;
            }
            else{
                if(Hash::check($password, $login->password)){
                    return $login->client_id;
                }
                else{
                    return $wrong_password;
                }
            }
        }
        else{
            return $email_not_found;
        }
    }


    public function verify_account($vkey){

        //return values
        $cannot_veifiry_account = 0;
        $verified = 1;

        $verify = DB::table('clients')
            ->where('v_key', $vkey);

        //check if v_key matches/exist on database/account
        if($verify->exists()){                  
            DB::table('clients')
                ->where('v_key', $vkey)
                ->update(['verified' => 1]);
            return $verified;
        }
        else{
            return $cannot_veifiry_account;
        }      
    }
}
