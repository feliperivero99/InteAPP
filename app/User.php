<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';

    protected $fillable = [
        'id',
        'nombres',
        'nickname',
        'password',
        'updated_at',
        'status',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public static function userValidation($array = false){
        
        $user = User::where("nickname", $array["email"])->first();

        if($user == null){
            return null;
        }
      
        if( $user->password != $array["password"]){
            return null;
        }
        
        return $user;
    } 

    public static function createuser($array = false, $password = false)
    {




        $user = new User();
        $user->nombres = $array["name"];
        $user->nickname = $array["nick"];
        $user->password = $array["password"] ;
        $user->save();
        return $user;

    }

    public static function edituser($array = false)
    {

        $user = User::where("id", $array["iduser"])->first();


        if($user == null){
            return null;
        }
        if($user->nickname != $array["nick"]){
            $bus = User::where("nickname", $array["nick"])->first();
            if($bus ){
                return null;
            }

        }

      


        

        $user->nombres = $array["name"];
        $user->nickname = $array["nick"];
         if ($array["password"] != null) {
            $user->password = $array["password"];
        }
        $user->save();
        return $user;
       

    

    }

    public static function deleteuser($id = false){

        $user = User::where("id", $id)->first();


        if($user == null){
            return null;
        }
        $user->status="T";
        $user->save();

        return $user;
    }

    public static function getusername($id = false){

        $user = User::where("id", $id)->first();


        if($user == null){
            return null;
        }
 
        return $user->username;
    }


    public static function searchuser($text = false){

        
        $users = User::where('status', 'A');

        if($text != null && $text != ""){
            
            $users->where(function ($query) use ($text) {
                $query->orWhere('nombres', 'LIKE', '%' . $text . '%');
                $query->orWhere('nickname', 'LIKE', '%' . $text . '%');
           
            });
        }

     
        $users =$users->get();
        

        $userlsit = array();
        $contador = 0;
        foreach ($users as $vt) {
            //dd($vt);
            $userlsit[$contador]["id"] = $vt->id;
            $userlsit[$contador]["pos"] = $contador + 1;

            $userlsit[$contador]["nombres"] = $vt->nombres;
            $userlsit[$contador]["nickname"] = $vt->nickname;
     
            $userlsit[$contador]["created_at"] = $vt->created_at;
       
            $contador++;
        }


        return $userlsit;
    }

    public static function getActiveUsers()
    {
        return User::where('status', 'A');
    } //

    public static function getActiveUserslist()
    {
        $users = User::where('status', 'A')->get();
        $userlsit = array();
        $contador = 0;
        foreach ($users as $vt) {
            //dd($vt);
            $userlsit[$contador]["id"] = $vt->id;
            $userlsit[$contador]["pos"] = $contador + 1;

            $userlsit[$contador]["nombres"] = $vt->nombres;
            $userlsit[$contador]["nickname"] = $vt->nickname;
     
            $userlsit[$contador]["created_at"] = $vt->created_at;
       
            $contador++;
        }

        return $userlsit;
    } //

}