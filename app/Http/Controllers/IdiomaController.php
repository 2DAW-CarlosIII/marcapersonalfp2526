<?php

namespace App\Http\Controllers;

use App\Models\Idioma;
use Illuminate\Http\Request;

class IdiomaController extends Controller
{
    public function index()
    {
      return Idioma::all();
    }
    public function show(Idioma $idioma)
    {
      return  $idioma;
    }
    public function store(Request $request)
    {
      $idioma = new Idioma();
      $idioma->alpha2 = $request->alpha2;
      $idioma->alpha3t = $request->alpha3t;
      $idioma->alpha3b = $request->alpha3b;
      $idioma->english_name = $request->english_name;
      $idioma->native_name = $request->native_name;
      $idioma->save();

      return  $idioma;
    }
    public function update(Request $request, Idioma $idioma)
    {
      $idioma->alpha2 = $request->alpha2;
      $idioma->alpha3t = $request->alpha3t;
      $idioma->alpha3b = $request->alpha3b;
      $idioma->english_name = $request->english_name;
      $idioma->native_name = $request->native_name;
      $idioma->save();

      return  $idioma;
    }

    public function destroy(Idioma $idioma)
    {
      $idioma->delete();
      return response()->noContent();
    }

}
