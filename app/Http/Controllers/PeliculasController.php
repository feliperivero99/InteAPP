<?php

namespace App\Http\Controllers;

use App\User;
use App\Movies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Log;
use Session;
use Validator;


class PeliculasController extends Controller
{
    //


        /* Pagina principal de usuarios*/
        public function index($war = 0)
        {
            //
    
            $name = session('user')["nickname"];
            $aviso = $war;
    
            $matrizuser = Movies::getActivemovielist();
            //dd($matrizuser );
            return view('Peliculas.index', compact('name', 'aviso', 'matrizuser'));
        }
    
        /* Funcion para buscar usuarios, llama un metodo del modelo*/
    
        public function searchPeliculas(Request $request)
        {
            //
    
            $name = session('user')["nickname"];
            $aviso = 0;
    
            $matrizuser = Movies::searchmovie($request->search);
    
            return view('Peliculas.index', compact('name', 'aviso', 'matrizuser'));
        }
    
        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
    
        /* Funcion para crear usuarios*/
        public function createPeliculas(Request $request)
        {
            //
    
            if ($request->isMethod('post')) {
                // dd($request->input());
    
                $validated = Validator::make($request->all(), [
                    'titulo' => 'required ',
                    'year' => 'required ',
    
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
    
                $user = Movies::createmovie($input);
    
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
            $js = view('Peliculas.createupdate_js', compact('edit'))->render();
    
            return view('Peliculas.createupdate', compact('name', 'js', 'user', 'edit'));
        }
    
        /* Funcion para editar usuarios*/
        public function editPeliculas(Request $request, $id = false)
        {
            // dd($id);
    
            if ($request->isMethod('post')) {
    
                $validated = Validator::make($request->all(), [
                    'titulo' => 'required ',
                    'year' => 'required ',
    
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
                $user = Movies::editmovie($input);
    
                if ($user == null) {
                    if ($request->ajax()) {
                        return response()->json(array(
                            'success' => false,
                            'message' => 'Error al editar pelicula',
                            'errors' => $validated->getMessageBag()->toArray(),
                        ), 422);
                    }
    
                    $this->throwValidationException(
    
                        $request, $validated
    
                    );
                }
    
                return response()->json(['success' => 'Pelicula editada']);
    
            }
    
            $user = Movies::where("id", $id)->first();
    
            if ($user == null) {
                return redirect()->route('Pelicula', ['aviso' => 3]);
    
            }
    
            $name = session('user')["nickname"];
    
            $edit = 1;
    
            $js = view('Peliculas.createupdate_js', compact('edit'))->render();
    
            return view('Peliculas.createupdate', compact('name', 'js', 'user', 'edit'));
    
        }
    
        /* Funcion para borrar usuarios*/
        public function deletetPeliculas(Request $request, $id = false)
        {
    
            $user =Movies::deletemovie($request->iduser);
            if ($user != null) {
    
                return redirect()->route('Peliculas', ['aviso' => 5]);
            } else {
                return redirect()->route('Peliculas', ['aviso' => 4]);
    
            }
        }
}
