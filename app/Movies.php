<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Movies extends Authenticatable
{
    use Notifiable;

    protected $table = 'movies';

    protected $fillable = [
        'id',
        'titulo',
        'sipnosis',
        'year',
        'updated_at',
        'status',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public static function createmovie($array = false, $password = false)
    {

        $user = new Movies();
        $user->titulo = $array["titulo"];
        $user->year = $array["year"];
        $user->sipnosis ="";

        if($array["sipnosis"] != ""  &&  $array["sipnosis"] != null){
            $user->sipnosis = $array["sipnosis"];
        }
        
        $user->save();
        return $user;

    }

    public static function editmovie($array = false)
    {

        $user = Movies::where("id", $array["iduser"])->first();

        if ($user == null) {
            return null;
        }


        $user->titulo = $array["titulo"];
        $user->year = $array["year"];
      

        if($array["sipnosis"] != ""  &&  $array["sipnosis"] != null){
            $user->sipnosis = $array["sipnosis"];
        }
        
        $user->save();
        return $user;
      

    }

    public static function deletemovie($id = false)
    {

        $user = Movies::where("id", $id)->first();

        if ($user == null) {
            return null;
        }
        $user->status = "T";
        $user->save();

        return $user;
    }



    public static function searchmovie($text = false)
    {

        $users =Movies::where('status', 'A');

        if ($text != null && $text != "") {

            $users->where(function ($query) use ($text) {
                $query->orWhere('titulo', 'LIKE', '%' . $text . '%');
                $query->orWhere('sipnosis', 'LIKE', '%' . $text . '%');
                $query->orWhere('year', 'LIKE', '%' . $text . '%');

            });
        }

        $users = $users->get();

        $userlsit = array();
        $contador = 0;
        foreach ($users as $vt) {
            //dd($vt);
            $userlsit[$contador]["id"] = $vt->id;
            $userlsit[$contador]["pos"] = $contador + 1;

            $userlsit[$contador]["titulo"] = $vt->titulo;
            $userlsit[$contador]["sipnosis"] = $vt->sipnosis;
            $userlsit[$contador]["year"] = $vt->year;

            $userlsit[$contador]["created_at"] = $vt->created_at;

            $contador++;
        }

        return $userlsit;
    }

 

    public static function getActivemovielist()
    {
        $users = Movies::where('status', 'A')->get();

        
        $userlsit = array();
        $contador = 0;
        foreach ($users as $vt) {
            //dd($vt);
            $userlsit[$contador]["id"] = $vt->id;
            $userlsit[$contador]["pos"] = $contador + 1;

            $userlsit[$contador]["titulo"] = $vt->titulo;
            $userlsit[$contador]["sipnosis"] = $vt->sipnosis;
            $userlsit[$contador]["year"] = $vt->year;

            $userlsit[$contador]["created_at"] = $vt->created_at;

            $contador++;
        }

        return $userlsit;
    } //

}
