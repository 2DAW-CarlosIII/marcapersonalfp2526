<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\IdiomaResource;
use App\Http\Resources\UserIdiomaResource;
use App\Models\Idioma;
use App\Models\User;
use Illuminate\Http\Request;

class UserIdiomaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, User $user, Idioma $idioma)
    {
        return UserIdiomaResource::collection(
            UserIdioma::where('user_id', $user->id)
            ->where('idioma_id', $idioma->id)
            ->orderBy($request->sort ?? 'id', $request->order ?? 'asc')
            ->paginate($request->per_page));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $userIdioma = json_decode($request->getContent(), true);

        $userIdioma = Idioma::create($userIdioma);

        return new IdiomaResource($userIdioma);
    }

    /**
     * Display the specified resource.
     */
    public function show(UserIdioma $userIdioma)
    {
        return new IdiomaResource($userIdioma);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserIdioma $userIdioma)
    {
        $userIdiomaData = json_decode($request->getContent(), true);
        $userIdioma->update($userIdiomaData);

        return new IdiomaResource($userIdioma);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserIdioma $userIdioma)
    {
        try {
            $userIdioma->delete();
            return response()->json(null, 204);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error: ' . $e->getMessage()
            ], 400);
        }
    }
}
