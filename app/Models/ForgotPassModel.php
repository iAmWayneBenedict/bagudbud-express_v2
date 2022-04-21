<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ForgotPassModel extends Model
{
    use HasFactory;

    public static function client_update_reset_code($email, $reset_code){
        /**
         *insert the generated code into database of the user account 
         
         * param: email: user email should match in database
         * param: reset_code: the generated code from controler to ..
         * ..be inserted/update in DB
         * return: boolean: true
         */
        DB::table('clients')
            ->where('email', $email)
            ->update(['reset_code' => $reset_code]);

        return true;
    }

    public static function client_update_password($email, $sent_reset_code, $password){
        /**
         *update the password in the database

         * param: email: user email should match in database
         * param: sent_reset_code: the code that sent through email 
         * param: password:  the new password from user
         */
        $compare_code = DB::table('clients')
            ->where('email', $email)
            ->pluck('reset_code');

        if($compare_code[0] == $sent_reset_code){
            DB::table('clients')
            ->where('email', $email)
            ->update([
                'password' => $password,
                'reset_code' => 0
            ]);
            return true;
        }
        else{
            return false;
        }
    }

    public static function rider_update_reset_code($email, $reset_code){
        /**
         *insert the generated code into database of the user account 
         
         * param: email: user email should match in database
         * param: reset_code: the generated code from controler to ..
         * ..be inserted/update in DB
         * return: boolean: true
         */
        DB::table('riders')
            ->where('email', $email)
            ->update(['reset_code' => $reset_code]);

        return true;
    }

    public static function rider_update_password($email, $sent_reset_code, $password){
        /**
         *update the password in the database

         * param: email: user email should match in database
         * param: sent_reset_code: the code that sent through email 
         * param: password:  the new password from user
         */
        $compare_code = DB::table('riders')
            ->where('email', $email)
            ->pluck('reset_code');

        if($compare_code[0] == $sent_reset_code){
            DB::table('riders')
            ->where('email', $email)
            ->update([
                'password' => $password,
                'reset_code' => 0
            ]);

            return true;
        }
        else{
            return false;
        }
    }
}
