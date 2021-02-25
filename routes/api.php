<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProvinsiController;
use App\Http\Controllers\Api\ApiController;
use App\Models\Kasus;
use App\Models\Provinsi;
use App\Models\Kota;
use App\Models\Kecamatan;
use App\Models\Desa;
use App\Models\Rw;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/global', [ApiController::class,'global']);
Route::get('/hari', [ApiController::class,'hari']);
Route::get('/indonesia', [ApiController::class,'indonesia']);
Route::get('/provinsi1/{id}', [ApiController::class,'provinsi']);
Route::get('/provinsi2', [ApiController::class,'provinsi1']);
Route::get('/kota1/{id}', [ApiController::class,'kota']);
Route::get('/kota2', [ApiController::class,'kota1']);
Route::get('/kecamatan1/{id}', [ApiController::class,'kecamatan']);
Route::get('/kecamatan2', [ApiController::class,'kecamatan1']);
Route::get('/desa1/{id}', [ApiController::class,'desa']);
Route::get('/desa2', [ApiController::class,'desa1']);
Route::get('/rw1/{id}', [ApiController::class,'rw']);
Route::get('/rw2', [ApiController::class,'rw1']);

Route::get('/positif', [ApiController::class,'positif']);
Route::get('/sembuh', [ApiController::class,'sembuh']);
Route::get('/meninggal', [ApiController::class,'meninggal']);