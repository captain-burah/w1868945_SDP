<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\BookingClient;
use App\Models\BookingPaymentPlan;
use App\Models\BookingPaymentSlips;
use App\Models\BookingReservationForm;
use App\Models\Clientele;
use App\Models\Clientele_document;
use App\Models\Project;
use App\Models\Honorifics;
use App\Models\Unit;
use App\Models\Project_brochure;
use App\Models\Project_image;
use App\Models\Project_factsheet;
use App\Models\Honorific;
use App\Models\CountryCode;
use App\Models\Language;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log; // send notifications via slack or any other means
use Illuminate\Support\Str;
use Cookie;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Barryvdh\DomPDF\Facade\Pdf;
use Response;
use Route;
class ClienteleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $resource = Clientele::select('id', 'prefix', 'name', 'email', 'contact1' )->orderBy('id', 'Desc');


        if($resource->get()->isEmpty()) {
            $this->data['resource_status'] = 'No client registrations found. You can launch a new project above to start-off';
            
        } else {
            $this->data['resource'] = $resource->get();

        }

        return view('clientele', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->data['honorifics'] = $honorifics = Honorific::all();
        $this->data['country'] = $country = CountryCode::all();
        $this->data['clients'] = $clients = Clientele::all();
        return view('clients.create.index', $this->data);
        
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /**
         * Read the data from the booking record which is linked to the units models.
         * Project data can be withdrawn from the booking record via the unit model.
         */
        $this->data['booking'] = $booking = Booking::with('unit')->find($request->booking_id);
        $project_id = $booking->unit->project->id;
        $unit_id = $booking->unit->id;
        
        $contact1 = $request->country_code1 . $request->contact1;
        $contact2 = $request->country_code2 . $request->contact2;
        $contact3 = $request->country_code3 . $request->contact3;

        $client = new Clientele();
        // $client->unit_id = $request->unit_id;
        $client->prefix = $request->title;
        $client->name = $request->name;
        $client->email = $request->email;
        $client->contact1 = $request->contact1;
        $client->contact2 = $request->contact2;
        $client->contact3 = $request->contact3;
        $client->country_of_residence = $request->country;
        $client->nationality = $request->nationality;
        $client->address1 = $request->address1;
        $client->address2 = $request->address2;
        $client->passport = $request->passport;
        $client->passport_expiry = $request->pp_expiry;
        $client->save();
        
        $client_id = $client->id;
        $this->data['project'] = $project = Project::find($project_id);
        $this->data['client'] = $client = Clientele::find($client_id);
        $this->data['form_type'] = 'form3';
        $this->data['request'] = $request;
        $this->data['form_type'] = 'form1';
        $this->data['clients'] = $clients = Clientele::all();
        $this->data['booking_id'] = $booking->id;
        
        /** EMIRATES ID  */
        if($request->hasfile('eids'))
        {
            /** assign request to variables to avoid the
             * loop accessing the request helper function
             */
            $client_id = $client_id;
            $unit_id = $unit_id;
            foreach($request->file('eids') as $key => $image)
            {
                /**assign the name and path */
                $image_name = $image->hashName();
                $pathname = 'clientele/'.$client_id.'/'.$unit_id.'/eid';

                /**
                 * file is being stored in a secured storage.
                 *
                 * NOTE: the file storage code is different from the previously used code to
                 * store the images, brochures, etc. Those files were used for public access where you can
                 * view them using the "storage/images/......" pathway.
                 *
                 * The below code cannot be accessed to the public. This can be configured under the
                 * "filesystem.php" in config folder.
                 *
                 */
                Storage::disk('local')->put($pathname, $image);

                /**store the information in the database */
                $segment = new Clientele_document();
                $segment->name = 'eid';
                $segment->client_id = $client_id;
                $segment->filename = $image_name;
                $segment->save();
            }
        }

        /** PASSPORT  */
        if($request->hasfile('passports'))
        {
            /** assign request to variables to avoid the
             * loop accessing the request helper function
             */
            $client_id = $client_id;
            $unit_id = $unit_id;

            foreach($request->file('passports') as $key => $image)
            {
                /**assign the name and path */
                $image_name = $image->hashName();
                $pathname = 'clientele/'.$client_id.'/'.$unit_id.'/pp';

                /**
                 * file is being stored in a secured storage.
                 *
                 * NOTE: the file storage code is different from the previously used code to
                 * store the images, brochures, etc. Those files were used for public access where you can
                 * view them using the "storage/images/......" pathway.
                 *
                 * The below code cannot be accessed to the public. This can be configured under the
                 * "filesystem.php" in config folder.
                 *
                 */
                Storage::disk('local')->put($pathname, $image);

                /**store the information in the database */
                $segment = new Clientele_document();
                $segment->name = 'pp';
                $segment->client_id = $client_id;
                $segment->filename = $image_name;
                $segment->save();
            }
        }

        /** VISA  */
        if($request->hasfile('visas'))
        {
            /** assign request to variables to avoid the
             * loop accessing the request helper function
             */
            $client_id = $client_id;
            $unit_id = $unit_id;

            foreach($request->file('visas') as $key => $image)
            {
                /**assign the name and path */
                $image_name = $image->hashName();
                $pathname = 'clientele/'.$client_id.'/'.$unit_id.'/visa';

                /**
                 * file is being stored in a secured storage.
                 *
                 * NOTE: the file storage code is different from the previously used code to
                 * store the images, brochures, etc. Those files were used for public access where you can
                 * view them using the "storage/images/......" pathway.
                 *
                 * The below code cannot be accessed to the public. This can be configured under the
                 * "filesystem.php" in config folder.
                 *
                 */
                Storage::disk('local')->put($pathname, $image);

                /**store the information in the database */
                $segment = new Clientele_document();
                $segment->name = 'pp';
                $segment->client_id = $client_id;
                $segment->filename = $image_name;
                $segment->save();
            }
        }

        return view('booking.create.index', $this->data );

    }



    public function remove_client($id, $booking_id) {

        $client = Clientele::find($id);
        // dd($client);
        $client->unit_id =   null;
        $client->save();

        $booking_id = $booking_id;
        $this->data['booking'] = $booking = Booking::with('unit')->find($booking_id);
        $unit_id = $booking->unit_id;        
        $this->data['unit'] = $unit = Unit::with('clienteles')->find($unit_id);
        $this->data['form_type'] = 'form2';
        return view('booking.create.index', $this->data );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
