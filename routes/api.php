<?php
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AuthKey;
use App\Http\Controllers\BookingController;

use App\Http\Controllers\API\CommunityController;
use App\Http\Controllers\API\ConstructionController;
use App\Http\Controllers\API\NewsController;
use App\Http\Controllers\API\BlogsController;
use App\Http\Controllers\API\GalleryController;
use App\Http\Controllers\API\UnitController;
use App\Http\Controllers\API\Unit_paymentplan;
use App\Http\Controllers\API\SEOController;
use App\Http\Controllers\API\BrokerController;
use App\Http\Controllers\API\FormSubmissionController;
use App\Http\Controllers\API\EmailSubscriptionController;

/*
|-----------------------------------withErrors(['message', $e->getMessage() ]---------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/email-subscription-v3', 'API\EmailSubscriptionController@storev3');

Route::middleware('authkey')->prefix('v1/esnaad')->namespace('App\Http\Controllers')->group(function () {
    Route::post('/booking-payment-secured', 'BookingController@booking_payment_secured');
    Route::post('/booking-payment-failed', 'BookingController@booking_payment_failed');
    Route::get('/communities-index', 'API\CommunityController@index');
    Route::get('/communities-index-admin', 'API\CommunityController@index_admin');
    Route::get('/communities-details/{slug}', 'API\CommunityController@details');
    Route::get('/developments', 'API\DevelopmentController@index');
    Route::get('/developments-details/{slug}', 'API\DevelopmentController@details');
    Route::get('/units-details/{slug}', 'API\UnitController@details');
    Route::get('/units-paymentplan-details/{unit_id}', 'API\UnitController@paymentplan_details');
    Route::get('/seo/{seo_id}', 'API\SEOController@index');
    Route::get('/constructions', 'API\ConstructionController@index');
    Route::get('/constructions/{id}', 'API\ConstructionController@show');
    Route::get('/news', 'API\NewsController@index');
    Route::get('/news/{id}', 'API\NewsController@show');
    Route::get('/gallery', 'API\GalleryController@index');
    Route::get('/gallery/{id}', 'API\GalleryController@show');
    Route::get('/blogs', 'API\BlogsController@index');
    Route::get('/blogs/{id}', 'API\BlogsController@show');
    Route::post('/agency-registration', 'API\BrokerController@store')->middleware('api', 'cors');
    Route::post('/email-subscription', 'API\EmailSubscriptionController@store')->middleware('cors');
    Route::post('/project-brochure-download', 'API\EmailSubscriptionController@store')->middleware('cors');

});



// Route::post('/agency-registration', 'YourController@yourMethod')->middleware('web');




Route::group([
    'prefix' => 'v1',
    'as' => 'api.',
    'namespace' => 'Api\V1\Admin',
    'middleware' => ['auth:sanctum']

], function() {
    // Route::apiResource('projects', 'ProjectsController');
});

