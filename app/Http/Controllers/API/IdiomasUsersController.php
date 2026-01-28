<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Idiomas_Users;
use App\Models\Idioma;
use App\Models\User;
use Illuminate\Http\Request;

class IdiomasUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(User $user)
    {
       return $user->idiomas()->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $idiomas_users = json_decode($request->getContent(), true);

        $idiomas_users = Idiomas_Users::create($idiomas_users);

        return new Idiomas_Users($idiomas_users);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user, Idioma $idioma)
    {
        return new Idiomas_Users($idioma);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user, Idioma $idioma)
    {
        $idiomaData = json_decode($request->getContent(), true);
        $idioma->update($idiomaData);

        return new Idiomas_Users($idioma);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Idiomas_Users $idiomas_users)
    {
        try {
            $idiomas_users->delete();
            return response()->json(null, 204);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error: ' . $e->getMessage()
            ], 400);
        }
    }
}
