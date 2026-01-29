<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserIdiomaResource;
use App\Models\Idioma;
use App\Models\User;
use App\Models\UserIdioma;
use Illuminate\Http\Request;

class UserIdiomaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request,User $user,Idioma $idioma)
    {  //$user->idiomas()->where('user_id',$user->id);
        return $user->idiomas()->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,User $user)
    {
        $data=json_decode($request->getContent(),true);

        $user->idiomas()->attach($data);

        return response()->json($user, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user,Idioma $idioma)
    {
        $userIdioma=$user->idiomas()->where('idioma_id',$idioma->id)->where('user_id',$user->id)->first();
        return new UserIdiomaResource($userIdioma);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,User $user,Idioma $idioma)
    {
        $data=json_decode($request->getContent(),true);
        $userIdioma=$user->idiomas()->where('idioma_id',$idioma->id)->where('user_id',$user->id)->first();
        $userIdioma->update($data);

        return new UserIdiomaResource($userIdioma);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,User $user,Idioma $idioma)
    {
        try {
            $user->idiomas()->detach($idioma->id);
            return response()->json(null, 204);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Could not delete the resource'], 500);
        }
    }
}
