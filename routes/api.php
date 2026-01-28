<?php

use App\Http\Controllers\API\CicloController;
use App\Http\Controllers\API\FamiliaProfesionalController;
use App\Http\Controllers\API\IdiomaController;
use App\Http\Controllers\API\UserIdiomaController as APIUserIdiomaController;
use App\Http\Controllers\UserIdiomaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Psr\Http\Message\ServerRequestInterface;
use Tqdev\PhpCrudApi\Api;
use Tqdev\PhpCrudApi\Config\Config;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

// Rutas /api/v1

Route::prefix('v1')->group(function () {
    Route::apiResource('ciclos', CicloController::class);

    Route::apiResource('familias_profesionales', FamiliaProfesionalController::class)
    ->parameters([
        'familias_profesionales' => 'familiaProfesional'
    ]);


    Route::get('idiomas', [IdiomaController::class, 'index']);
    Route::post('idiomas', [IdiomaController::class, 'store']);
    Route::get('idiomas/{id}', [IdiomaController::class, 'show']);
    Route::put('idiomas/{id}', [IdiomaController::class, 'update']);
    Route::delete('idiomas/{id}', [IdiomaController::class, 'destroy']);

    Route::get('users/{user}/idiomas', [APIUserIdiomaController::class, 'index']);
    Route::post('users/{user}/idiomas', [APIUserIdiomaController::class, 'store']);
    Route::delete('users/{user}/idiomas/{idioma}', [APIUserIdiomaController::class, 'destroy']);

});



// Rutas PHP-CRUD-API
Route::any('/{any}', function (ServerRequestInterface $request) {
    $config = new Config([
        'address' => env('DB_HOST', '127.0.0.1'),
        'database' => env('DB_DATABASE', 'forge'),
        'username' => env('DB_USERNAME', 'forge'),
        'password' => env('DB_PASSWORD', ''),
        'basePath' => '/api',
    ]);
    $api = new Api($config);
    $response = $api->handle($request);

    try {
        $records = json_decode($response->getBody()->getContents())->records;
        $response = response()->json($records, 200, $headers = ['X-Total-Count' => count($records)]);
    } catch (\Throwable $th) {

    }
    return $response;

})->where('any', '.*')->middleware(['auth:sanctum']);
