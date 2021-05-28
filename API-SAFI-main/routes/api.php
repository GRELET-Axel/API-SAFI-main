<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Models\ExpensePackageType;

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\PassportAuthController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\VisitController;
use App\Http\Controllers\PractitionerController;
use App\Http\Controllers\SheetController;
use App\Http\Controllers\ExpensePackageController;
use App\Models\Visit;

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

/** LIENS */

// https://www.digitalocean.com/community/tutorials/how-to-create-laravel-eloquent-api-resources-to-convert-models-into-json
// https://laravel.com/docs/8.x/queries

/** TOKEN **/
// eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiYzNhODE2ZjM5YTAyN2EwODRlMjM1ZDExMjQ4NmVjMWE5NjQ4MGE3MDA5OWE4MWM3YTQyYWQ1OTA5MTY3NzliMjY3ZGVjZGQ4NzQyNzIxYTQiLCJpYXQiOiIxNjExNjUwMTY3LjE1NTY5MyIsIm5iZiI6IjE2MTE2NTAxNjcuMTU1Njk3IiwiZXhwIjoiMTY0MzE4NjE2Ny4xNTIxNDQiLCJzdWIiOiI5MyIsInNjb3BlcyI6W119.KpFjNlUZwQCri0FoWyStKMfrR30VY0LqSoN64YtOLqKtfAKw7NSq48sjcFHs33qx4a0WEg6HMZ7mlx7AnBnmQf7Ody_FVCJmfpUaeuyCasOXLhIJvULFBXfuUwFGQBoSIUnZ_YbvzuokmlthzOZ-khIBau4hc0pInOvYaTGsQQgPkaN5-RvL4WuWljAUHoyqcXWY9f7_GbOan7s_0pY1oo4NJS8He2OTnh1rzIENe534kvo1gHx4CsBPF8jg5QGl7uHn1eJsw4ZaCHXAD1PRVKzGp37eikbhS8idmxdRYCyh-8w1zpQJUtFKXTrjVHmCTk7mv6LwzgJfeMQ1FqCWaJgasJf31BLepFGtbABEvdWgMJQQZLH1DPNchxSResFm9lkTobgJMG9AWIjaJHuOIqTIJJMZoyIOaSUSayHxagYhqBLGO2jbEXT9yB0RGNfhyWuEKxoZMQC0vF_52zaeMnlvOMGtoFrVUoa0ivUI0PX_3c9Z4ujOZOJkFAaPAGLO44j94afscmdOorHCPH6IRfaOgLq9GYwFkX7nIdrc7o6Mu6jzGY40ocwCnICSnyp_0LS5fEo4kaaLvpA9_ocdY64l0BAso12yUXng-5zXkAGGPLafgCYAEEDm8H8bIpQ0BqmoMExKF2g0GsbJBWiJjq2DwsX7wBu2C4Hb1dHjpTs
//
/** ROUTES  **/


Route::post('login', [PassportAuthController::class, 'login']);

Route::middleware('auth:api')->get('/user', function (Request $request) {
	return $request->user();
});

/**  **/
Route::middleware('auth:api')->group(function () {
	Route::post('register', [PassportAuthController::class, 'register']);
	
	Route::prefix('employee')->group(function () {
		Route::get('/{employee}', [EmployeeController::class, 'getAll']);
	});

	Route::prefix('visit')->group(function () {
		Route::post('/create', [VisitController::class, 'create']);
		Route::get('/{visit}', [VisitController::class, 'getOne']);
		Route::get('/user/{user}', [VisitController::class, 'getByUser']);
		Route::get('/{user}/{day}', [VisitController::class, 'getByDay']);
		Route::patch('/edit/{visit}', [VisitController::class, 'edit']);
		Route::delete('/destroy/{visit}', [VisitController::class, 'destroy']);
	});

	Route::prefix('report')->group(function () {
		Route::post('/create', [ReportController::class, 'create']);
		Route::get('/{report}', [ReportController::class, 'getOne']);
		Route::get('/', [ReportController::class, 'getAll']);
		Route::patch('/edit/{report}', [ReportController::class, 'edit']);
		Route::delete('/destroy/{report}', [ReportController::class, 'destroy']);
	});

	Route::prefix('practitioner')->group(function () {
		Route::post('/create', [PractitionerController::class, 'create']);
		Route::get('/{practitioner}', [PractitionerController::class, 'getOne']);
		Route::get('/user/{user}', [PractitionerController::class, 'getByUser']);
		Route::get('/', [PractitionerController::class, 'getAll']);
		Route::patch('/edit/{practitioner}', [PractitionerController::class, 'edit']);
		//Route::delete('/destroy/{id_practitioner}', [PractitionerController::class, 'destroy']);
	});

	Route::prefix('drug')->group(function () {
		Route::post('/create', [MedicineController::class, 'create']);
		Route::get('/{drug}', [MedicineController::class, 'getOne']);
		Route::get('/', [MedicineController::class, 'getAll']);
		Route::patch('/edit/{drug}', [MedicineController::class, 'edit']);
		Route::delete('/destroy/{drug}', [MedicineController::class, 'destroy']);
	});

	Route::prefix('activity')->group(function () {
		Route::post('/create', [ActivityController::class, 'create']);
		Route::get('/{activity}', [ActivityController::class, 'getOne']);
		Route::get('/user/{user}', [ActivityController::class, 'getByUser']);
		Route::patch('/edit/{activity}', [ActivityController::class, 'edit']);
		Route::delete('/destroy/{activity}', [ActivityController::class, 'destroy']);
	});

	Route::prefix('sheet')->group(function () {
		Route::post('/add', [SheetController::class, 'create']);
		Route::get('{user}/all', [SheetController::class, 'getAll']);
		Route::get('/{user}/last', [SheetController::class, 'getlast']);
		Route::get('/{status}/{user}', [SheetController::class, 'getByState']);
		Route::get('/{sheet}', [SheetController::class, 'getOne']);
		Route::patch('/edit/{sheet}', [SheetController::class, 'edit']);
		Route::delete('/destroy/{sheet}', [SheetController::class, 'destroy']);
	});

	Route::prefix('expense')->group(function () {
		Route::post('/add', [ExpensePackageController::class, 'create']);
		Route::get('/all', [ExpensePackageController::class, 'getAll']);
		Route::get('/{ept}', [ExpensePackageController::class, 'getOne']);
		Route::patch('/edit/{ept}', [ExpensePackageController::class, 'edit']);
		Route::delete('/destroy/{ept}', [ExpensePackageController::class, 'destroy']);
	});
	
	Route::prefix('rule')->group(function () {
		Route::post('/add', [RuleController::class, 'create']);
		Route::get('/show', [RuleController::class, 'get']);
		Route::get('/{id}', [RuleController::class, 'getOne']);
		Route::patch('/edit/{id}', [RuleController::class, 'edit']);
		Route::post('/destroy/{id}', [RuleController::class, 'destroy']);
	});
});
