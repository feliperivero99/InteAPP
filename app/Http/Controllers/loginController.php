<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\User;
use Session;

class loginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /* Metodo del login*/
    public function index()
    {
        //
        $status = false;
        $js = view('Login.login_js', compact('status'))->render();
        return view('Login.login', compact('js', 'status'));
    }

    /* Funcion Procesa el login*/
    public function login(Request $request)
    {

        if($request->isMethod('post')){
            $request->validate([
		        'email' => 'required',
				'password' => 'required | min:5',
				
		        
            ]);
            
            $result= User::userValidation($request->input());
               // dd($result);

            if($result != null){
                session(['user' =>$result]);
                return redirect()->route('dashadmin');

            } else{


                session()->flash('message_type', 'alert-danger');
                session()->flash('message', 'Usuario no encontrado, retificque su email y contraseña');
                $status = true;
                $js = view('Login.login_js', compact('status'))->render();
                return view('Login.login', compact('js', 'status'));
                

            }   

        }//

        $status = false;
        $js = view('Login.login_js', compact('status'))->render();
        return view('Login.login', compact('js', 'status'));

    }

    /* Funcion para cerrar sesion*/
    public function logout(Request $request)
    {

      
        session(['user' => null]);
        return redirect()->route('login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
