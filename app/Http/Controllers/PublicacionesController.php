<?php

namespace App\Http\Controllers;

use App\Models\Publicaciones;
use Illuminate\Http\Request;

class PublicacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // retorno todas las publicaciones
        //return Publicaciones::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $publicacion = new Publicaciones();
        $publicacion->texto = $request->texto;
        $publicacion->enlaces = $request->enlaces;
        $publicacion->etiquetas = $request->etiquetas;
        $publicacion->cod_pais = $request->cod_pais;
        $publicacion->cod_categoria = $request->cod_categoria;
        $publicacion->save();
        return $publicacion;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Publicaciones  $publicaciones
     * @return \Illuminate\Http\Response
     */
    public function show(Publicaciones $publicacione)
    {
        return $publicacione;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Publicaciones  $publicaciones
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Publicaciones $publicacione)
    {
        $publicacione->texto = $request->texto;
        $publicacione->enlaces = $request->enlaces;
        $publicacione->etiquetas = $request->etiquetas;
        $publicacione->cod_pais = $request->cod_pais;
        $publicacione->cod_categoria = $request->cod_categoria;
        $publicacione->save();
        return $publicacione;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Publicaciones  $publicaciones
     * @return \Illuminate\Http\Response
     */
    public function destroy(Publicaciones $publicacione)
    {
        $publicacione->delete();
    }

    public function list(Request $request)
    {
        $publicacione_query = Publicaciones::with(['categoria', 'pais']);
        if ($request->search) {
            $publicacione_query->where('texto', 'LIKE', '%' . $request->search . '%');
            $publicacione_query->orWhere('etiquetas', 'LIKE', '%' . $request->search . '%');
        }
        $publicacion = $publicacione_query->get();
        return $publicacion;
    }
}
