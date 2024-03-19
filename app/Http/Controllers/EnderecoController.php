<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Categoria;
use App\Models\endereco;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

use function PHPUnit\Framework\isNull;

class EnderecoController extends Controller
{
    /**
     * Display the user's profile form.
     */

  /**
     * Update the user's profile information.
     */
    public function update(Request $request, string $id = null)
    {
      $entemp=  endereco::where('id','=',auth()->user()->getAuthIdentifier())->latest();
        if($entemp == null) {
            $aux = endereco::create([
                'logradouro'=> $request->logradouro,
                'numero'=> $request->numero,
                'cidade'=> $request->cidade,
                'cep'=> $request->cep,
                'complemento'=> $request->complemento,
                'estado'=> $request->estado,
                'usuario_id'=> auth()->user()->getAuthIdentifier(),
            ]);
            $aux->save();

           
        }else{
            
            $entemp->update([
                'logradouro'=> $request->logradouro,
                'numero'=> $request->numero,
                'cidade'=> $request->cidade,
                'cep'=> $request->cep,
                'complemento'=> $request->complemento,
                'estado'=> $request->estado,
                'usuario_id'=> auth()->user()->getAuthIdentifier(),
            ]);
            $entemp->save();
        }
        return view('profile/teste');
    }

}
