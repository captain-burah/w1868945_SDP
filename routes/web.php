<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectBrochureController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\ProjectImageController;
use App\Http\Controllers\ProjectFactsheetController;
use App\Http\Controllers\ProjectVideoController;
use App\Http\Controllers\ProjectTranslationController;


use App\Http\Controllers\UnitController;
use App\Http\Controllers\UnitBrochureController;
use App\Http\Controllers\UnitImageController;
use App\Http\Controllers\UnitFloorplanController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\SeoController;
use App\Http\Controllers\WebsiteNewsController;
use App\Http\Controllers\WebsiteConstructionsController;
use App\Http\Controllers\LeadController;

use App\Http\Controllers\BrokerController;


use App\Http\Controllers\Localization;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\MeetingController;
use App\Http\Controllers\ClienteleController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('agency-registration', [BrokerController::class, 'create'])->name('broker.create');


Route::get('/listing-admin', [MainController::class, 'listing_admin_login'])->middleware(['auth', 'verified'])->name('listing.admin.login');

Route::get('/financial-admin', [MainController::class, 'financial_admin_login'])->middleware(['auth', 'verified'])->name('financial.admin.login');

Route::middleware('auth')->group(function () {
    Route::get('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout.get');
    Route::get('/website', [WebsiteController::class, 'index'])->name('website.index');
    Route::get('/website', [WebsiteController::class, 'index'])->name('website.index');
    

    Route::get('purchaser/remove_unit/{$id}', [ClienteleController::class, 'purchaser_remove_from_unit'])->name('clientele_disengage_unit');

    /**DEFAULT ROUTES */
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    /**RESOURCE PROJECT ROUTES */
    Route::resource('projects', ProjectController::class);
    Route::resource('project-brochures', ProjectBrochureController::class);
    Route::resource('project-images', ProjectImageController::class);
    Route::resource('project-factsheet', ProjectFactsheetController::class);
    Route::resource('project-video', ProjectVideoController::class);
    Route::resource('project-translation', ProjectTranslationController::class);


    /**RESOURCE UNITS ROUTES */
    Route::resource('units', UnitController::class);
    Route::resource('unit-brochures', UnitBrochureController::class);
    Route::resource('unit-images', UnitImageController::class);
    // Route::resource('unit-payment-plan', UnitPaymentplanController::class);
    Route::resource('unit-floor-plan', UnitFloorplanController::class);


    /**LEADS ROUTES */
    Route::resource('leads', LeadController::class);



    Route::resource('bookings', BookingController::class);
    Route::resource('clienteles', ClienteleController::class);
    Route::resource('communities', CommunityController::class);
    Route::resource('meetings', MeetingController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
    Route::resource('languages', Localization::class);
    Route::resource('landingpageseos', SeoController::class);



/** PROJECTS */
    /**PROJECT ROUTES */
    Route::get('projects-drafts', [ProjectController::class, 'index_drafts'])->name('projects.drafts');
    Route::get('projects-trash', [ProjectController::class, 'index_trash'])->name('projects.trash');
    Route::get('projects-status-change/{id}/{status}', [ProjectController::class, 'status_change'])->name('projects.status.change');

    /**PROJECT - BROCHURE CONNECTION ROUTES */
    Route::post('project/connect-brochure', [ProjectController::class, 'project_brochure_connect_store'])->name('project.connect.brochure');
    Route::get('project/brochures/disconnect/{id}', [ProjectController::class, 'project_brochure_disconnect'])->name('project.disconnect.brochure');

    /**PROJECT - IMAGE CONNECTION ROUTES */
    Route::post('project/connect-image', [ProjectController::class, 'project_image_connect_store'])->name('project.connect.image');
    Route::get('project/images/disconnect/{id}', [ProjectController::class, 'project_image_disconnect'])->name('project.disconnect.image');

    /**PROJECT - FACTSHEET CONNECTION ROUTES */
    Route::post('project/connect-factsheet', [ProjectController::class, 'project_factsheet_connect_store'])->name('project.connect.factsheet');
    Route::get('project/factsheet/disconnect/{id}', [ProjectController::class, 'project_factsheet_disconnect'])->name('project.disconnect.factsheet');

    /**PROJECT - VIDEO CONNECTION ROUTES */
    Route::post('project/connect-video', [ProjectController::class, 'project_video_connect_store'])->name('project.connect.video');
    Route::get('project/video/disconnect/{id}', [ProjectController::class, 'project_video_disconnect'])->name('project.disconnect.video');

    /**PROJECT - TRANSLATION CONNECTION ROUTES */
    Route::post('project/connect-translation', [ProjectController::class, 'project_translation_connect_store'])->name('project.connect.translation');
    Route::get('project/translation/disconnect/{id}', [ProjectController::class, 'project_translation_disconnect'])->name('project.disconnect.translation');







    /**PROJECT - BROCHURE - ROUTES  */
    Route::post('project-brochures/connect', [ProjectBrochureController::class, 'project_connect_store'])->name('project-brochures.connect');
    Route::get('project-brochures/disconnect/{id}', [ProjectBrochureController::class, 'project_disconnect'])->name('project-brochures.disconnect');
    Route::get('project-brochures/delete_all/{id}', [ProjectBrochureController::class, 'destroy_segment'])->name('project-brochures.destroy.segment');

    /**PROJECT - IMAGES ROUTES */
    Route::post('project-images/connect', [ProjectImageController::class, 'project_connect_store'])->name('project-images.connect');
    Route::get('project-images/disconnect/{id}', [ProjectImageController::class, 'project_disconnect'])->name('project-images.disconnect');
    Route::get('project-images/delete_all/{id}', [ProjectImageController::class, 'destroy_segment'])->name('project-images.destroy.segment');

    /**PROJECT - FACTSHEET ROUTES */
    Route::post('project-factsheet/connect', [ProjectFactsheetController::class, 'project_connect_store'])->name('project-factsheet.connect');
    Route::get('project-factsheet/disconnect/{id}', [ProjectFactsheetController::class, 'project_disconnect'])->name('project-factsheet.disconnect');
    Route::get('project-factsheet/delete_all/{id}', [ProjectFactsheetController::class, 'destroy_segment'])->name('project-factsheet.destroy.segment');

    /**PROJECT - VIDEO ROUTES */
    Route::post('project-video/connect', [ProjectVideoController::class, 'project_connect_store'])->name('project-video.connect');
    Route::get('project-video/disconnect/{id}', [ProjectVideoController::class, 'project_disconnect'])->name('project-video.disconnect');
    Route::get('project-video/delete_all/{id}', [ProjectVideoController::class, 'destroy_segment'])->name('project-video.destroy.segment');


    /**PROJECT - TRANSLATION ROUTES */
    Route::get('project-translation/status/{id}', [ProjectTranslationController::class, 'project_translation_status'])->name('project-translation.status');
    Route::get('project-translation/activate/{id}', [ProjectTranslationController::class, 'project_translation_move_active'])->name('project-translation.activate');


/** PROJECTS */





/** UNITS */
    /**UNIT ROUTES */
    Route::get('units-drafts', [UnitController::class, 'index_drafts'])->name('units.drafts');
    Route::get('units-trash', [UnitController::class, 'index_trash'])->name('units.trash');
    Route::get('units-status-change/{id}/{status}', [UnitController::class, 'status_change'])->name('units.status.change');
    Route::get('units-state-change/{id}/{status}', [UnitController::class, 'state_change'])->name('units.state.change');

    Route::get('project-units-active/{id}', [UnitController::class, 'project_units_active'])->name('project.units.active');
    Route::get('project-units-draft/{id}', [UnitController::class, 'project_units_draft'])->name('project.units.draft');
    Route::get('project-units-trash/{id}', [UnitController::class, 'project_units_trash'])->name('project.units.trash');



    /**UNIT - BROCHURE CONNECTION ROUTES */
    Route::post('unit/connect-brochure', [UnitController::class, 'unit_brochure_connect_store'])->name('unit.connect.brochure');
    Route::get('unit/brochures/disconnect/{id}', [UnitController::class, 'unit_brochure_disconnect'])->name('unit.disconnect.brochure');

    /**UNIT - IMAGE CONNECTION ROUTES */
    Route::post('unit/connect-image', [UnitController::class, 'unit_image_connect_store'])->name('unit.connect.image');
    Route::get('unit/images/disconnect/{id}', [UnitController::class, 'unit_image_disconnect'])->name('unit.disconnect.image');

    /**UNIT - FACTSHEET CONNECTION ROUTES */
    Route::post('unit/connect-floorplan', [UnitController::class, 'unit_floorplan_connect_store'])->name('unit.connect.floorplan');
    Route::get('unit/floorplan/disconnect/{id}', [UnitController::class, 'unit_floorplan_disconnect'])->name('unit.disconnect.floorplan');

    /**UNIT - VIDEO CONNECTION ROUTES */
    Route::post('unit/connect-paymentplan', [UnitController::class, 'unit_paymentplan_connect_store'])->name('unit.connect.paymentplan');
    Route::get('unit/paymentplan/disconnect/{id}', [UnitController::class, 'unit_paymentplan_disconnect'])->name('unit.disconnect.paymentplan');



    /**UNIT - PROJECT - ROUTES  */
    Route::post('unit-project/connect', [UnitController::class, 'unit_project_connect_store'])->name('unit-project.connect');
    Route::get('unit-project/disconnect/{id}', [UnitController::class, 'unit_project_disconnect'])->name('unit-project.disconnect');
    Route::get('unit-project/delete_all/{id}', [UnitController::class, 'destroy_project_segment'])->name('unit-project.destroy.segment');


    /**UNIT - BROCHURE - ROUTES  */
    Route::post('unit-brochures/connect', [UnitBrochureController::class, 'unit_connect_store'])->name('unit-brochures.connect');
    Route::get('unit-brochures/disconnect/{id}', [UnitBrochureController::class, 'unit_disconnect'])->name('unit-brochures.disconnect');
    Route::get('unit-brochures/delete_all/{id}', [UnitBrochureController::class, 'destroy_segment'])->name('unit-brochures.destroy.segment');

    /**UNIT - IMAGES ROUTES */
    Route::post('unit-images/connect', [UnitImageController::class, 'unit_connect_store'])->name('unit-images.connect');
    Route::get('unit-images/disconnect/{id}', [UnitImageController::class, 'unit_disconnect'])->name('unit-images.disconnect');
    Route::get('unit-images/delete_all/{id}', [UnitImageController::class, 'destroy_segment'])->name('unit-images.destroy.segment');

    /**UNIT - FLOORPLANS ROUTES */
    Route::post('unit-floorplan/connect', [UnitFloorplanController::class, 'unit_connect_store'])->name('unit-floorplan.connect');
    Route::get('unit-floorplan/disconnect/{id}', [UnitFloorplanController::class, 'unit_disconnect'])->name('unit-floorplan.disconnect');
    Route::get('unit-floorplan/delete_all/{id}', [UnitFloorplanController::class, 'destroy_segment'])->name('unit-floorplan.destroy.segment');

    /**UNIT - PAYMENTPLAN ROUTES */
    // Route::post('unit-paymentplan/connect', [UnitPaymentplanController::class, 'unit_connect_store'])->name('unit-paymentplan.connect');
    // Route::get('unit-paymentplan/disconnect/{id}', [UnitPaymentplanController::class, 'unit_disconnect'])->name('unit-paymentplan.disconnect');
    // Route::get('unit-paymentplan/delete_all/{id}', [UnitPaymentplanController::class, 'destroy_segment'])->name('unit-paymentplan.destroy.segment');


    /**UNIT - TRANSLATION ROUTES */
    // Route::get('unit-translation/status/{id}', [UnitTranslationController::class, 'unit_translation_status'])->name('unit-translation.status');
    // Route::get('unit-translation/activate/{id}', [UnitTranslationController::class, 'unit_translation_move_active'])->name('unit-translation.activate');


/** UNITS */




/** WEBSITE CONTENT MANAGEMENT */
    /** COMMUNITY */
        Route::get('community-destroy/{id}', [CommunityController::class, 'destroy_image'])->name('community.destroy.image');
    /** COMMUNITY */

    /** CONSTRUCTION */
        Route::resource('website-constructions', WebsiteConstructionsController::class);
    /** CONSTRUCTION */

    /** NEWS */
        Route::resource('website-news', WebsiteNewsController::class);
    /** NEWS */
/** WEBSITE CONTENT MANAGEMENT */


/**BOOKINGS */
    Route::post('booking-form-one', [BookingController::class, 'store_form0'])->name('bookings.store.form0');
    Route::post('booking-form-one-projects', [BookingController::class, 'store_form0_projects'])->name('bookings.store.form0.projects');
    Route::post('booking-form-one-units', [BookingController::class, 'store_form0_units'])->name('bookings.store.form0.units');
    Route::post('booking-form-two', [BookingController::class, 'store_form1'])->name('bookings.store.form1');
    Route::get('booking-form-three/{client_id}', [BookingController::class, 'show_form3'])->name('bookings.show.form3');
    Route::post('booking-form-three-clients', [BookingController::class, 'store_form3_clients'])->name('bookings.store.form3.clients');
    Route::post('booking-form-three', [BookingController::class, 'store_form2'])->name('bookings.store.form2');
    Route::post('booking-form-four', [BookingController::class, 'store_form3'])->name('bookings.store.form3');
    Route::get('remove_client/{client_id}/{booking_id}', [ClienteleController::class, 'remove_client'])->name('bookings.remove.client');
    Route::get('print_booking/{booking_id}', [BookingController::class, 'print_booking_form'])->name('bookings.form.print');

/**BOOKINGS */ 







/**BROKER */
    Route::get('brokers', [BrokerController::class, 'index'])->name('brokers.index');
    Route::get('brokers-view/{id}', [BrokerController::class, 'show'])->name('brokers.show');
    Route::post('brokers/verification-denied', [BrokerController::class, 'verification_denied'])->name('brokers.verification.deny');
    Route::post('brokers/verification-accepted', [BrokerController::class, 'verification_accepted'])->name('brokers.verification.accept');
/**BROKER */


/**EMAIL SUBSCRIPTION */
    Route::post('/email-subscription-v2', 'API\BrokerController@storev2')->name('email.subscription.v2');
/**EMAIL SUBSCRIPTION */


    
});




require __DIR__.'/auth.php';
