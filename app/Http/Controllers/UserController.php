<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Log;
use Session;
use Validator;

class UserController extends Controller
{
    //

    /* Pagina principal de usuarios*/
    public function index($war = 0)
    {
        //

        $name = session('user')["nickname"];
        $aviso = $war;

        $matrizuser = User::getActiveUserslist();

        return view('Usuarios.index', compact('name', 'aviso', 'matrizuser'));
    }

    /* Funcion para buscar usuarios, llama un metodo del modelo*/

    public function searchUsers(Request $request)
    {
        //

        $name = session('user')["nickname"];
        $aviso = 0;

        $matrizuser = User::searchuser($request->search);

        return view('Usuarios.index', compact('name', 'aviso', 'matrizuser'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /* Funcion para crear usuarios*/
    public function createuser(Request $request)
    {
        //

        if ($request->isMethod('post')) {
            // dd($request->input());

            $validated = Validator::make($request->all(), [
                'name' => 'required | min:5',
                'nick' => 'required| min:5 | unique:users,nickname',
                'password' => 'required | min:5',

            ]);

            if ($validated->fails()) {

                if ($request->ajax()) {
                    return response()->json(array(
                        'success' => false,
                        'message' => 'There are incorect values in the form!',
                        'errors' => $validated->getMessageBag()->toArray(),
                    ), 422);
                }

                $this->throwValidationException(

                    $request, $validated

                );

            }

            $input = $request->all();
            //\Log::info($input);

            $user = User::createuser($input);

            if ($user == null) {
                if ($request->ajax()) {
                    return response()->json(array(
                        'success' => false,
                        'message' => 'Error al crear el usuario',
                        'errors' => $validated->getMessageBag()->toArray(),
                    ), 422);
                }

                $this->throwValidationException(

                    $request, $validated

                );
            }

            return response()->json(['success' => 'Usuario creado']);

        }

        $name = session('user')["nickname"];

        $user = null;
        $edit = 0;
        $js = view('Usuarios.createupdate_js', compact('edit'))->render();

        return view('Usuarios.createupdate', compact('name', 'js', 'user', 'edit'));
    }

    /* Funcion para editar usuarios*/
    public function editUser(Request $request, $id = false)
    {
        // dd($id);

        if ($request->isMethod('post')) {

            $validated = Validator::make($request->all(), [
                'name' => 'required | min:5',
                'nick' => 'required| min:5 ',

            ]);

            if ($validated->fails()) {

                if ($request->ajax()) {
                    return response()->json(array(
                        'success' => false,
                        'message' => 'There are incorect values in the form!',
                        'errors' => $validated->getMessageBag()->toArray(),
                    ), 422);
                }

                $this->throwValidationException(

                    $request, $validated

                );

            }

            $input = $request->all();
            \Log::info($input);
            $user = User::edituser($input);

            if ($user == null) {
                if ($request->ajax()) {
                    return response()->json(array(
                        'success' => false,
                        'message' => 'Error al crear el usuario',
                        'errors' => $validated->getMessageBag()->toArray(),
                    ), 422);
                }

                $this->throwValidationException(

                    $request, $validated

                );
            }

            return response()->json(['success' => 'Usuario editado']);

        }

        $user = User::where("id", $id)->first();

        if ($user == null) {
            return redirect()->route('usuarios', ['aviso' => 3]);

        }

        $name = session('user')["nickname"];

        $edit = 1;

        $js = view('Usuarios.createupdate_js', compact('edit'))->render();

        return view('Usuarios.createupdate', compact('name', 'js', 'user', 'edit'));

    }

    /* Funcion para borrar usuarios*/
    public function deletetUser(Request $request, $id = false)
    {

        $user = User::deleteuser($request->iduser);
        if ($user != null) {

            return redirect()->route('usuarios', ['aviso' => 5]);
        } else {
            return redirect()->route('usuarios', ['aviso' => 4]);

        }
    }

}
