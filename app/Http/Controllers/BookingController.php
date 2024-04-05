<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\BrokerAgent;
use App\Models\BookingClient;
use App\Models\BookingPaymentPlan;
use App\Models\BookingPaymentSlips;
use App\Models\BookingReservationForm;
use App\Models\Clientele;
use App\Models\Clientele_document;
use App\Models\Unit_paymentplan;
use App\Models\Project;
use App\Models\Unit_floorplan;
use App\Models\Unit;
use App\Models\Project_brochure;
use App\Models\Project_image;
use App\Models\Project_factsheet;
use App\Models\Honorific;
use App\Models\CountryCode;
use App\Models\Language;
use App\Models\Broker;
use App\Models\BookingBroker;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log; // send notifications via slack or any other means
use Illuminate\Support\Str;
use Cookie;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Barryvdh\DomPDF\Facade\Pdf;
use Response;
use Carbon\Carbon;
use Auth;

class BookingController extends Controller
{

    // function __construct()
    // {
    //      $this->middleware('permission:booking-list|booking-create|booking-edit|booking-delete', ['only' => ['index','show']]);
    //      $this->middleware('permission:booking-create', ['only' => ['create','store']]);
    //      $this->middleware('permission:booking-edit', ['only' => ['edit','update']]);
    //      $this->middleware('permission:booking-delete', ['only' => ['destroy']]);
    // }



    function generateUniqueReferenceNumber() {
        // Generate a unique reference number
        $referenceNumber = $this->generateReferenceNumber();

        // Check if the generated reference number already exists in the database
        while (Booking::where('ref_no', $referenceNumber)->exists()) {
            $referenceNumber = generateReferenceNumber(); // Regenerate until a unique reference number is found
        }

        return $referenceNumber;
    }

    function generateReferenceNumber() {
        // Customize the format of your reference number as needed
        $prefix = 'ERD';
        $prefix2 = 'BF';
        $randomPart = strtoupper(substr(md5(uniqid()), 0, 8));

        return $prefix . '-' . $prefix2 . '-' . $randomPart;
    }

    // Example usage
    // $uniqueReferenceNumber = generateUniqueReferenceNumber();


    public function index()
    {
        $this->data['result'] = $result = Booking::with('bookingclients', 'bookingbrokers', 'unit')->get();
        if($result->isEmpty()) {
            $this->data['count_status'] = 'No projects found. You can launch a new project above to start-off';
        }
        $this->data['count_active'] = $result = Booking::all();
        return view('booking', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        $this->data['results'] = $bookings = Booking::select(['id'])->get();
        $this->data['honorifics'] = $honorifics = Honorific::all();
        $this->data['country'] = $country = CountryCode::all();
        $this->data['projects'] = $projects = Project::where('status', '1')->get();
        $this->data['units'] = $units = Unit::where('status', '1')->get();
        $this->data['form_type'] = 'form0';
        return view('booking.create.index', $this->data );
    }



    public function clientele_store(Request $request) {
        try {
            $contact1 = $request->country_code1 . $request->contact1;
            $contact2 = $request->country_code2 . $request->contact2;
            $contact3 = $request->country_code3 . $request->contact3;
            $client = new Clientele();
            $client->unit_id = $request->unit_id;
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

            $this->data['form_type'] = 'form2';
            $this->data['client_id'] = $client->id;
            $this->data['request'] = $request;

        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return true;
    }






    /** BOOKING CREATE SECTION */
        public function store_form0_projects(Request $request) {
            $units =  Unit::where('project_id', $request->project_id)->where('status', 1)->where('state', '1')->get();
            $this->data['units'] = $units;
            $this->data['project'] = Project::find($request->project_id);
            $this->data['form_type'] = 'form0_units';
            $this->data['request'] = $request;
            return view('booking.create.index', $this->data );
        }


        public function store_form0_units(Request $request) {

            $unit_id = intval($request->unit_id);

            $unit = Unit::with('unit_paymentplan')->find($unit_id);

            $uniqueReferenceNumber = $this->generateUniqueReferenceNumber();

            $booking = new Booking();
            $booking->unit_id = $unit_id;
            $booking->ref_no = $uniqueReferenceNumber;
            $booking->status = '0';
            $booking->save();

            $booking_id = $booking->id;

            $payment_plans = $unit->unit_paymentplan->unit_paymentplan_files;

            foreach($payment_plans as $plans) {
                $bookingplan = new BookingPaymentPlan();
                $bookingplan->booking_id = $booking_id;
                $bookingplan->name = $plans->name;
                $bookingplan->date = $plans->date;
                $bookingplan->percentage = $plans->percentage;
                $bookingplan->amount = $plans->amount;
                $bookingplan->save();
            }

            // dd($unit->unit_paymentplan->unit_paymentplan_files);

            $this->data['results'] = $bookings = Booking::select(['id'])->get();
            $this->data['honorifics'] = $honorifics = Honorific::all();
            $this->data['country'] = $country = CountryCode::all();
            $this->data['clients'] = $clients = Clientele::all();
            $this->data['form_type'] = 'form1';
            $this->data['booking_id'] = $booking->id;

            $this->data['request'] = $request;

            //REDIRECT TO CLIENT INFORMATION
            return view('booking.create.index', $this->data );
        }



        public function store_form1(Request $request) {
            dd($request);
            $fileInputs = $request->file('items');

            ss($fileInputs);

            foreach ($fileInputs as $item) {
                $file = $item['file'];

                if ($file) {
                    // Process and store the file for each item
                    $file->store('/files');
                    $file_path = public_path('files/'.$file);
                    return response()->download($file_path);
                }

                // Handle other fields within each repeater item
            }

            
            $contact1 = $request->country_code1 . $request->contact1;
            $contact2 = $request->country_code2 . $request->contact2;
            $contact3 = $request->country_code3 . $request->contact3;

            $client = new Clientele();
            $client->unit_id = $request->unit_id;
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
            $booking_id = $request->booking_id;

            $booking_client = new BookingClient();
            $booking_client->client_id = $client_id;
            $booking_client->booking_id = $booking_id;
            $booking_client->save();

            $this->data['form_type'] = 'form3';
            $this->data['client_id'] = $client->id;
            $this->data['booking_id'] = $request->booking_id;

            //REDIRECT TO CLIENT DOCUMENTS
            return view('booking.create.index', $this->data );
        }



        public function store_form2(Request $request) {

            // dd($request->files);
            // Storage::disk('local')->deleteDirectory('clientele');
            $this->data['unit'] = $unit = Unit::with('project', 'unit_paymentplan')->find($request->unit_id);
            $project_id = $unit->project->id;

            $this->data['project'] = $project = Project::find($project_id);
            $this->data['client'] = $client = Clientele::find($request->client_id);
            $this->data['form_type'] = 'form3';
            $this->data['request'] = $request;

            // dd($project_id);


            //REDIRECT TO RESERVATION AGREEMENT
            return view('booking.create.index', $this->data );

            // dd('ddss');
            /** EMIRATES ID  */
            if($request->hasfile('eids'))
            {
                /** assign request to variables to avoid the
                 * loop accessing the request helper function
                 */
                $client_id = $request->client_id;
                $unit_id = $request->unit_id;

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
                    $segment->unit_id = $request->unit_id;
                    $segment->client_id = $request->client_id;
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
                $client_id = $request->client_id;
                $unit_id = $request->unit_id;

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
                    $segment->unit_id = $request->unit_id;
                    $segment->client_id = $request->client_id;
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
                $client_id = $request->client_id;
                $unit_id = $request->unit_id;

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
                    $segment->unit_id = $request->unit_id;
                    $segment->client_id = $request->client_id;
                    $segment->filename = $image_name;
                    $segment->save();
                }
            }

            // $this->data['client'] = $client = Clientele::find($request->client_id);
            $this->data['form_type'] = 'form3';
            $this->data['booking_id'] = $booking_id;

            //REDIRECT TO RESERVATION AGREEMENT
            return view('booking.create.index', $this->data );
        }


        public function store_form3_clients(Request $request) {
            $booking_id = $request->booking_id;
            $this->data['booking'] = $booking = Booking::with('unit', 'bookingclients')->find($booking_id);
            $unit_id = $booking->unit_id;

            // CREATE BOOKING-CLIENT RELATIONSHIP
            foreach($request->clients as $client) {
                $booking_client = new BookingClient();
                $booking_client->client_id = $client;
                $booking_client->booking_id = $booking->id;
                $booking_client->save();
            }

            $this->data['unit'] = $unit = Unit::with('clienteles')->find($unit_id);
            $this->data['form_type'] = 'form2';
            $this->data['request'] = $request;
            $this->data['agency'] = Broker::where('status', '1')->get();
            return view('booking.create.index', $this->data );            
        }

        public function store_form3_agency(Request $request) {
            $booking_id = $request->booking_id;
            $this->data['booking'] = $booking = Booking::with('unit', 'bookingclients', 'bookingbrokers')->find($booking_id);
            $booking->salesperson_name = $request->salesperson_name;
            $booking->save();
            $unit_id = $booking->unit_id;

            $twoMinutesAgo = Carbon::now()->subMinutes(10);
            $owners = BookingClient::with('booking', 'client')->where('created_at', '<=', $twoMinutesAgo)->get();

            if($owners->isNotEmpty()) {
                $this->data['sellers'] = $owners;
            }

            // CREATE BROKER AND BOOKING RELATIONSHIP RECORD
            foreach($request->brokers as $data) {   
                $unit_broker = new BookingBroker();
                $unit_broker->booking_id = $booking->id;
                $unit_broker->broker_id = $data;
                $unit_broker->save();
            }
            
            $this->data['unit'] = $unit = Unit::with('clienteles')->find($unit_id);
            $this->data['form_type'] = 'form3';
            $this->data['request'] = $request;

            return view('booking.create.index', $this->data );            
        }


        public function show_form3($booking_id){
            $this->data['form_type'] = 'form2';
            $this->data['booking_id'] = $booking_id;
            //REDIRECT TO CLIENT DOCUMENTS
            return view('booking.create.index', $this->data );
        }


        public function store_form3(Request $request) {

            $clientele = Clientele::find($request->client_id);
            $project = Project::find($request->project_id);
            $unit = Unit::with('unit_paymentplan')->find($request->unit_id);
            $this->data['booking'] = $booking = Booking::find($request->booking_id);


            // PDF::loadView('booking.reservationAgreement')->save(storage_path('invoice.pdf'));

            $pdf = PDF::loadView('booking.reservationAgreement');
            return $pdf->setPaper('a4', 'portrait')->download('reservation-agreement.pdf');


            $this->data['form_type'] = 'form4';
            return view('booking.create.index', $this->data );
        }

        public function booking_payment_secured(Request $request){

            /**SAVE THE CLIENT INFORMATION USING OOM ABOVE */
            $clientele_store = $this->clientele_store($request);

            if($clientele_store) {
                dd('stored');

                /**IF TRUE, CREATE OFFER PURCHASE */

            } else {
                dd($clientele_store);
            }
        }

        public function booking_payment_failed(Request $request){
            dd('hello it works');
        }


        public function print_booking_form($booking_id){
            if(Auth::user()->roles[0]->name == "Real Estate Agent") {
                $this->data['booking'] = $booking = Booking::with('unit')->find($booking_id);
                $booking->status = '3';
                $booking->save();    
            } else{
                $this->data['booking'] = $booking = Booking::with('unit')->find($booking_id);
                $booking->status = '1';
                $booking->save();
            }
            
            $unit_id = $booking->unit_id;

            $this->data['unit'] = $unit = Unit::with('clienteles', 'unit_floorplan')->find($unit_id);
            $unit->state = '2';
            $unit->save();
            
            $this->data['form_type'] = 'form2';



            if($unit->unit_secondary_floorplan_id != null){
                $this->data['unit_floorplan'] = $unit_floorplan = 'true';
                $this->data['unit_secondary_floorplan_id'] = $unit_secondary_floorplan_id = $unit->unit_secondary_floorplan_id;

                $this->data['unit_floorplan_booking'] = $unit_floorplan_booking = Unit_floorplan::with('unit_floorplan_files')->find($unit_secondary_floorplan_id);
                // dd($unit_floorplan_booking->unit_floorplan_files[0]->name);
            }


            /**
             * Get payment plan with dates
            */
            $units_paymentplans = [];

            $new_date_array = [];
            $new_data_set = [];
            foreach($unit->unit_paymentplan->unit_paymentplan_files as $data_sets){
                $data_set_value = $data_sets->name;
                if($data_set_value != 'Down Payment On Booking') {
                    preg_match('/^\d+/', $data_set_value, $matches);
                    if (!empty($matches)) {
                        $new_data_set[] = $matches[0];
                    }
                }
            }
            $int_array = array_map('intval', $new_data_set);
            $selected_date = Carbon::now();
            try {
                $base_date = Carbon::parse($selected_date);
            } catch (Exception $e) {
                return back()->withErrors(['base_date' => 'Please enter a valid date in the format YYYY-MM-DD.']);
            }
            $new_date_array = [];
            $new_date_array[] = $unit->id;
            // $new_date_array[] = $selected_date;
            foreach ($int_array as $month_to_add) {
                $new_date = clone $base_date;  // Clone to avoid modifying the original object
                $new_date->modify("+$month_to_add month");  // Add the month value
                $new_date_array[] = $new_date->format('d/m/Y');  // Format the date string (YYYY-MM-DD)
            }
            $units_paymentplans[] = $new_date_array;
            
            // dd($units_paymentplans);
            $this->data['units_paymentplans'] = $units_paymentplans;



            // $pdf = PDF::loadView('booking.reservationAgreement', $this->data);
            return view('booking.booking_form_print', $this->data);
            // return $pdf->setPaper('a4', 'portrait')->download('reservation-agreement.pdf');
        }


        public function view_booking($booking_id){

            $this->data['booking'] = $booking = Booking::with('unit')->find($booking_id);
            
            $unit_id = $booking->unit_id;

            $this->data['unit'] = $unit = Unit::with('clienteles', 'unit_floorplan')->find($unit_id);

            
            if($unit->unit_floorplan->unit_floorplan_files->count() > 0){
                $this->data['unit_floorplan'] = $unit_floorplan = 'true';
            };
            $this->data['form_type'] = 'form2';

            // $pdf = PDF::loadView('booking.reservationAgreement', $this->data);
            return view('booking.booking_form_print', $this->data);
            // return $pdf->setPaper('a4', 'portrait')->download('reservation-agreement.pdf');
        }





        public function edit($id){
            $this->data['resource'] = $resource = Booking::with('unit', 'bookingbrokers', 'bookingclients')->find($id);
            $this->data['projects'] = $projects = Project::select('id', 'name', 'status')->with('units')->get();
            $this->data['units'] = $units = Unit::select('id', 'name', 'status')->with('project', 'booking')->where('status', '1')->where('project_id', $resource->unit->project_id)->get();

            // dd($units);
            
            // dd($projects);
            return view('booking.update.index', $this->data);
        }


        public function destroy(string $id)
        {
            $resource = Booking::find($id);
            $resource->status = '99';   //---this is the number for deleted---//
            $resource->save();
            return $this->index();   
        }

        public function approve($id){
            $resource = Booking::find($id);
            $resource->status = '1';
            $resource->save();
            return $this->index();
        }

        public function booking_agency_agents(Request $request){
            
            $agencyId = $request->input('agency_id');
            
            // Retrieve options based on the selected client ID
            $options = BrokerAgent::where('broker_id', $agencyId)->pluck('name', 'id');

            // Return the options as HTML
            $html = '<option value="">Choose ...</option>';
            foreach ($options as $id => $name) {
                $html .= '<option value="' . $id . '">' . $name . '</option>';
            }

            return $html;
        }





        public function unit_booking(Request $request){
            $unit_id = intval($request->unit_id);

            $client = Clientele::find($request->client);
            $client->unit_id = $request->unit_id;
            $client->save();

            $uniqueReferenceNumber = $this->generateUniqueReferenceNumber();

            $booking = new Booking();
            $booking->unit_id = $unit_id;
            $booking->ref_no = $uniqueReferenceNumber;
            $booking->save();
            $booking_id = $booking->id;
            

            if(Auth::user()->roles[0]->name == "Real Estate Agent") {
                $this->data['booking'] = $booking = Booking::with('unit')->find($booking_id);
                $booking->status = '3';
                $booking->save();    
            } else{
                $this->data['booking'] = $booking = Booking::with('unit')->find($booking_id);
                $booking->status = '1';
                $booking->save();
            }

            $unit_id = $request->unit_id;
            $client_id = $client->id;                    

            $unit_broker = new BookingBroker();
            $unit_broker->booking_id = $booking->id;
            $unit_broker->broker_id = $request->agency;
            $unit_broker->save();


            

            $this->data['unit'] = $unit = Unit::with('clienteles', 'unit_floorplan')->find($unit_id);
            $unit->state = '2';
            $unit->save();

            if($unit->unit_secondary_floorplan_id != null){
                $this->data['unit_floorplan'] = $unit_floorplan = 'true';
                $this->data['unit_secondary_floorplan_id'] = $unit_secondary_floorplan_id = $unit->unit_secondary_floorplan_id;

                $this->data['unit_floorplan_booking'] = $unit_floorplan_booking = Unit_floorplan::with('unit_floorplan_files')->find($unit_secondary_floorplan_id);
                // dd($unit_floorplan_booking->unit_floorplan_files[0]->name);
            }
        

            $this->data['booking'] = $booking = Booking::with('unit', 'bookingclients', 'bookingbrokers')->find($booking_id);
            $this->data['results'] = $bookings = Booking::select(['id'])->get();
            $this->data['honorifics'] = $honorifics = Honorific::all();
            $this->data['country'] = $country = CountryCode::all();
            $this->data['clients'] = $clients = Clientele::all();
            $this->data['booking_id'] = $booking->id;
            $owners = BookingClient::with('booking', 'client')->where('client_id', $client_id)->get();
            if($owners->isNotEmpty()) {
                $this->data['sellers'] = $owners;
            } else {
                $booking_client = new BookingClient();
                $booking_client->client_id = $client_id;
                $booking_client->booking_id = $booking_id;
                $booking_client->save();
            }



            



            /**
             * Get payment plan with dates
            */
            $units_paymentplans = [];

            $new_date_array = [];
            $new_data_set = [];
            foreach($unit->unit_paymentplan->unit_paymentplan_files as $data_sets){
                $data_set_value = $data_sets->name;
                if($data_set_value != 'Down Payment On Booking') {
                    preg_match('/^\d+/', $data_set_value, $matches);
                    if (!empty($matches)) {
                        $new_data_set[] = $matches[0];
                    }
                }
            }
            $int_array = array_map('intval', $new_data_set);
            $selected_date = Carbon::now();
            try {
                $base_date = Carbon::parse($selected_date);
            } catch (Exception $e) {
                return back()->withErrors(['base_date' => 'Please enter a valid date in the format YYYY-MM-DD.']);
            }
            $new_date_array = [];
            $new_date_array[] = $unit->id;
            // $new_date_array[] = $selected_date;
            foreach ($int_array as $month_to_add) {
                $new_date = clone $base_date;  // Clone to avoid modifying the original object
                $new_date->modify("+$month_to_add month");  // Add the month value
                $new_date_array[] = $new_date->format('d/m/Y');  // Format the date string (YYYY-MM-DD)
            }
            $units_paymentplans[] = $new_date_array;
            
            // dd($units_paymentplans);
            $this->data['units_paymentplans'] = $units_paymentplans;


            // dd($booking->bookingbrokers[0]->broker->broker_agents[0]);

            $this->data['request'] = $request;

            // dd($booking);

            //REDIRECT TO CLIENT INFORMATION
            return view('booking_form', $this->data );
        }
    
}
