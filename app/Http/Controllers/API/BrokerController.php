<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log; // send notifications via slack or any other means
use Illuminate\Support\Str;

use App\Models\Broker;
use Mail;
use App\Mail\DemoEmail;
use App\Mail\BrokerDenial;
use App\Mail\BrokerAccepted;

class BrokerController extends Controller
{
    public function store(Request $request) {

        dd($request);
        // dd($request->trade_license_expiry['iso']);
        $main_var = new Broker();
        $main_var->company_name = $request->company_name;
        $main_var->company_type = $request->company_type;
        $main_var->trade_license = $request->trade_license;
        // $main_var->trade_license_expiry = $request->trade_license_expiry['iso'];
        $main_var->rera_certificate = $request->rera_certificate;
        // $main_var->rera_certificate_expiry = $request->rera_certificate_expiry['iso'];

        $main_var->authorized_p_name = $request->authorized_p_name;
        $main_var->authorized_p_country = $request->authorized_p_country;
        $main_var->authorized_p_passport = $request->authorized_p_passport;
        $main_var->authorized_p_position = $request->authorized_p_position;
        $main_var->authorized_p_email = $request->authorized_p_email;
        $main_var->authorized_p_contact = $request->country_code . $request->authorized_p_contact;
        $main_var->authorized_p_address = $request->authorized_p_address;
        $main_var->authorized_p_city = $request->authorized_p_city;

        $main_var->power_of_atty_or_moa_id = $request->power_of_atty_or_moa_id;
        $main_var->valid_trade_license_id = $request->valid_trade_license_id;
        $main_var->rera_certificate_id = $request->rera_certificate_id;
        $main_var->broker_card_id = $request->broker_card_id;
        $main_var->valid_vat_certificate_or_noc_id = $request->valid_vat_certificate_or_noc_id;
        $main_var->passport_visa_eid_id = $request->passport_visa_eid_id;
        
        $main_var->bank_name = $request->bank_name;
        $main_var->bank_country = $request->bank_country;
        $main_var->bank_city = $request->bank_city;
        $main_var->account_no = $request->account_no;
        $main_var->iban = $request->iban;
        $main_var->account_title = $request->account_title;
        $main_var->country_code = 
        $main_var->save();

        $broker_id = $main_var->id;

        if($request->hasfile('power_of_atty_or_moa_id'))
        {
            $files = [];
            
            $image_name = $image->hashName();
            $pathname = 'brokers/'.$broker_id.'/';

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

            $broker_files = new BrokerFile();
            $broker_files->broker_id = $broker_id;
            $broker_files->name = "Power of Atty / MOA";
            $broker_files->filename = $image_name;
            $broker_files->save();
        }

        if($request->hasfile('valid_trade_license_id'))
        {
            $files = [];
            
            $image_name = $image->hashName();
            $pathname = 'brokers/'.$broker_id.'/';

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

            $broker_files = new BrokerFile();
            $broker_files->broker_id = $broker_id;
            $broker_files->name = "Valid Trade License";
            $broker_files->filename = $image_name;
            $broker_files->save();
        }

        if($request->hasfile('rera_certificate_id'))
        {
            $files = [];
            
            $image_name = $image->hashName();
            $pathname = 'brokers/'.$broker_id.'/';

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

            $broker_files = new BrokerFile();
            $broker_files->broker_id = $broker_id;
            $broker_files->name = "RERA Certificate";
            $broker_files->filename = $image_name;
            $broker_files->save();
        }

        if($request->hasfile('broker_card_id'))
        {
            $files = [];
            
            $image_name = $image->hashName();
            $pathname = 'brokers/'.$broker_id.'/';

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

            $broker_files = new BrokerFile();
            $broker_files->broker_id = $broker_id;
            $broker_files->name = "Broker Card";
            $broker_files->filename = $image_name;
            $broker_files->save();
        }

        if($request->hasfile('valid_vat_certificate_or_noc_id'))
        {
            $files = [];
            
            $image_name = $image->hashName();
            $pathname = 'brokers/'.$broker_id.'/';

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

            $broker_files = new BrokerFile();
            $broker_files->broker_id = $broker_id;
            $broker_files->name = "Valid VAT Certificate / VAT NOC";
            $broker_files->filename = $image_name;
            $broker_files->save();
        }

        if($request->hasfile('passport_visa_eid_id'))
        {
            $files = [];
            
            $image_name = $image->hashName();
            $pathname = 'brokers/'.$broker_id.'/';

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

            $broker_files = new BrokerFile();
            $broker_files->broker_id = $broker_id;
            $broker_files->name = "Passport, VISA and Emirates ID of Person";
            $broker_files->filename = $image_name;
            $broker_files->save();
        }

        return ["Result"=> "Testing complete"];
    }

    public function create(){
        return view('brokers.create.index');
    }
}