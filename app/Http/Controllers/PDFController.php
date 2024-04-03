<?php

namespace App\Http\Controllers;

// use Barryvdh\DomPDF\Facade as PDF;
use PDF;
use App\Models\Unit;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Project;
use App\Models\Unit_brochure;
use App\Models\Unit_floorplan;
use App\Models\Unit_paymentplan;
use App\Models\UnitPaymentplanFile;
use App\Models\UnitBrochireFile;
use App\Models\UnitFloorplanFile;
use App\Models\UnitImageFile;
use App\Models\Unit_image;
use App\Models\UnitPaymentPlanController;
use App\Models\UnitFloorPlanController;
use Auth;
use Dompdf\Dompdf;
use Dompdf\Options;

// use App\Models\Language;
// use File;

class PDFController extends Controller
{
    public function generatePDF(Request $request)
    {
        $this->data['unit'] =  $unit = Unit::with('unit_floorplan', 'unit_image', 'unit_paymentplan', 'unit_floorplan', 'unit_status', 'unit_state', 'booking', 'project' )->find($request->unit);
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
        $new_date_array = [];
        $selected_date = $request->date;
        try {
            $base_date = Carbon::parse($selected_date);
        } catch (Exception $e) {
            return back()->withErrors(['base_date' => 'Please enter a valid date in the format YYYY-MM-DD.']);
        }
        $new_date_array = [];
        // $new_date_array[] = $selected_date;
        foreach ($int_array as $month_to_add) {
            $new_date = clone $base_date;  // Clone to avoid modifying the original object
            $new_date->modify("+$month_to_add month");  // Add the month value
            $new_date_array[] = $new_date->format('d/m/Y');  // Format the date string (YYYY-MM-DD)
        }

        $this->data['unit_paymentplan'] = $unit_paymentplan = Unit_paymentplan::with('unit_paymentplan_files', 'unit')->where('unit_id', $unit->id)->get();

        $data = [];
        foreach($new_date_array as $key => $date){
            $data['date_'.$key] = $date;
        }

        /**
         * ALERT!!!
         * 
         * GATHER ALL THE VARIABLES AND APPEND TO ONE ARRAY INDIVIDUALLY
         * 
         * THIS HAS BEEN DONE AS A RESOLUTION TO PDF GENERATION 
         * IN TERMS OF EFFICIENCY AND ACCURACY. AVOID USING NESTED ARRAYS
         * AND LARAVEL COLLECTIONS INTO THE SINGLE $DATA ARRAY.
         * 
        */
        $data['project_name'] = $unit->project->name;
        $data['unit_name'] = 'D11-SPARK-'.$unit->name;
        $data['bedroom'] = $unit->bedroom;
        $data['unit_size_range'] = $unit->unit_size_range;
        $data['unit_price'] = number_format($unit->unit_price);
        $data['auth_user'] = Auth::user()->name;
        $data['timestamp'] = \Carbon\Carbon::now('Asia/Dubai')->format('d.m.Y h:i:s A');


        if($unit->unit_floorplan != null){
            foreach($unit->unit_floorplan->unit_floorplan_files as $key => $floorplan){
                $data['floorplan_'.$key] = 'uploads/units/floorplans/'.$unit->unit_floorplan->id.'/'.$floorplan->name;
            }
        }

        // dd($data);

        $pdf = PDF::loadView('pdf.my-document', $data);

        

        // Option 1: Download the PDF
        // return $pdf->download('my-document.pdf');

        // Option 2: Open the PDF in the browser (might not work in all browsers)
        return $pdf->stream('my-document.pdf', [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline' // This suggests inline display in browser
        ]);
        
    }

}
