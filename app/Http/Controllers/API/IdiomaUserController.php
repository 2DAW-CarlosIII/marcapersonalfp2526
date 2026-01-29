<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\IdiomaUserResource;
use App\Models\Idioma;
use App\Models\IdiomaUser;
use App\Models\User;
use Illuminate\Http\Request;

class IdiomaUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, User $user, Idioma $idioma)
    {
        return IdiomaUserResource::collection(
            IdiomaUser::where('user_id', $user->id)
            ->where('idioma_id', $idioma->id)
            ->orderBy($request->sort ?? 'id', $request->order ?? 'asc')
            ->paginate($request->per_page));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $idiomaUser = json_decode($request->getContent(), true);
        $idiomaUser = IdiomaUser::create($idiomaUser);
        return new IdiomaUserResource($idiomaUser);
    }

    /**
     * Display the specified resource.
     */
    public function show(IdiomaUser $idiomaUser)
    {
        return new IdiomaUserResource($idiomaUser);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, IdiomaUser $idiomaUser)
    {
        $idiomaUserData = json_decode($request->getContent(), true);
        $idiomaUser->update($idiomaUserData);
        return new IdiomaUserResource($idiomaUser);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(IdiomaUser $idiomaUser)
    {
         try {
            $idiomaUser->delete();
            return response()->json(null, 204);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error: ' . $e->getMessage()
            ], 400);
        }
    }
}
