<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Categoria;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;



class CategoriaController extends Controller
{
    /**
     * Display the user's profile form.
     */

     public function index(Request $request){
        $categorias = Categoria::all();

        return view("categoria/index", ["categorias"=>$categorias]);
    
    }

    public function create(){
        return view('categoria/create');
    }
    public function store(Request $request){   
        $categoria = Categoria::create([
            "categoria"=> $request->categoria,
        ]);
        $categoria->save();

        $categorias = Categoria::all(); 
        return view("categoria/index",["categorias"=>$categorias]);
    }
    public function edit(Request $request ,string $id): View
    {
        $categorias = Categoria::where("id",'=',$id )->first();

        return view("categoria.edit", ["categorias"=>$categorias]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request): RedirectResponse
    {
      

       $categorias = Categoria::where("id",'=',$request->id )->first();
        

       $categorias->save();

        return Redirect::route('categoria.index');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request, string $id)
    {
        $categoria = Categoria::where('id','=',$id );
        $categoria->delete();  

        return redirect()->route('categoria.index');
    }
}
