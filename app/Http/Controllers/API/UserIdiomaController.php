<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserIdiomaResource;
use App\Models\Idioma;
use App\Models\User;
use Illuminate\Http\Request;

class UserIdiomaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, User $user)
    {
        return $user->idiomas()->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, User $user)
    {
        $data=json_decode($request->getContent(),true);

        $user->idiomas()->attach($data);

        return response()->json($user, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user, Idioma $idioma_id)
    {
        $idiomaUser = $user->idiomas()->indOrFail($idioma_id);

        return new UserIdiomaResource($idiomaUser);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user, Idioma $idioma_id)
    {
        $dataIdiomaUser = json_decode($request->getContent(),true);

        $idiomaUser = $user->idiomas()->indOrFail($idioma_id);

        $idiomaUser->update($dataIdiomaUser);

        return new UserIdiomaResource($idiomaUser);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user, Idioma $idioma_id)
    {
        try {
            $user->idiomas()->detach($idioma_id->id);
            return response()->json(null, 204);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Could not delete the resource'], 500);
        }
    }
}
