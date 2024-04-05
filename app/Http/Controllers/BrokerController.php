<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log; // send notifications via slack or any other means
use Illuminate\Support\Str;

use App\Models\Broker;
use App\Models\BrokerAgent;
use App\Models\BrokerFile;
use Mail;
use App\Mail\DemoEmail;
use App\Mail\BrokerDenial;
use App\Mail\BrokerAccepted;

class BrokerController extends Controller
{

    private $uploadPathBroker = "uploads/brokers/";
    private $uploadPathNew = "uploads/agents/";





    function __construct()
    {
         $this->middleware('permission:project-list|project-create|project-edit|project-delete', ['only' => ['index','show']]);
         $this->middleware('permission:project-create', ['only' => ['create','store']]);
         $this->middleware('permission:project-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:project-delete', ['only' => ['destroy']]);
    }


    public function index() {

        $resource = Broker::select('id', 'status', 'company_name', 'state', 'authorized_p_name', 'authorized_p_contact' )->orderBy('id', 'Desc');


        if($resource->get()->isEmpty()) {
            $this->data['resource_status'] = 'No broker registrations found. You can launch a new project above to start-off';
            
        } else {
            $this->data['resource'] = $resource->get();

        }

        return view('broker', $this->data);
    }

    public function show($id) {

        $this->data['resource'] = $resource = Broker::with('broker_files')->find($id);

        return view('broker.show.index', $this->data);
    }


    


    public function verification_denied(Request $request) {
        
        /**CHANGE THE BROKERAGE STATUS */
        $result = Broker::find($request->broker_id);
        $result->status = 2;
        $result->save();

        /**SEND NOTIFICATION TO BROKER VIA EMAIL */
        try{
            $data = [
                'messages' => $request->message,
                'name' => $result->company_name,
            ];
            Mail::mailer('noreply')->to('web@edgerealty.ae')->send(new BrokerDenial($data));

            // if($request->message != ''){
            //     $data = [
            //         'messages' => $request->message,
            //         'name' => $request->result->copmany_name,
            //     ];
            //     Mail::mailer('noreply')->to('as@edgerealty.ae')->send(new BrokerDenial($data));
            // } else {
            //     Mail::mailer('noreply')->to('as@edgerealty.ae')->send(new BrokerDenial());
            // }
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
        return $this->index();
    }


    public function verification_accepted(Request $request) {

        $result = Broker::find($request->broker_id);
        $result->status = 1;
        $result->save();

        try{
            $data = [
                'name' => $result->company_name,
            ];
            Mail::mailer('noreply')->to('web@edgerealty.ae')->send(new BrokerAccepted($data));
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
        return $this->index();
    }

    public function create() {
        return view('broker.create.index');
    }


    public function agent_create() {
        $this->data['brokers'] = $brokers = Broker::all();
        return view('broker.agent.create.index', $this->data);
    }

    public function agent_store(Request $request) {
        $newSegment = new BrokerAgent();
        $newSegment->name = $request->name;
        $newSegment->rera_number = $request->rera_number;
        $newSegment->contact1 = $request->contact1;
        $newSegment->contact2 = $request->contact2;
        $newSegment->email = $request->email;
        $newSegment->broker_id = $request->broker_id;
        $newSegment->status = '1';
        $newSegment->save();
        return $this->broker_agents_index();
    }

    public function agent_list() {
        $this->data['resource'] = $resource = BrokerAgent::with('broker')->get();
        return view('broker.agent.index', $this->data);   
    }

    public function agent_edit($id) {
        $this->data['brokers'] = $brokers = Broker::all();
        $this->data['agent'] = $agent = BrokerAgent::find($id);
        return view('broker.agent.update.index', $this->data);
    }

    public function agent_update(Request $request) {
        $oldSegment = BrokerAgent::find($request->agent_id);
        $oldSegment->name = $request->name;
        $oldSegment->rera_number = $request->rera_number;
        $oldSegment->contact1 = $request->contact1;
        $oldSegment->contact2 = $request->contact2;
        $oldSegment->email = $request->email;
        $oldSegment->broker_id = $request->broker_id;
        $oldSegment->save();
        return $this->agent_list();
    }

    public function broker_store(Request $request) {
        $resource = new Broker();
        $resource->status = '1';
        $resource->company_name = $request->company_name;
        $resource->company_adddress = $request->company_address;
        $resource->authorized_p_name = $request->authorized_p_name;
        $resource->save();

        $files = [];

        $resource_id = $resource->id;

        try {
            if($request->hasFile('files'))
            {                
                foreach($request->file('files') as $key => $image)
                {
                    $image_name = $image->hashName();
                    $path = $this->uploadPathBroker;
                    $image->move($path."$resource_id/", $image_name);               

                    // $image_name = $image->hashName();
                    // $image->storeAs('website-news/'.$resource_id.'/images/', $image_name, 'public'); //nonsecured storage - has public access
                    $resource_segment_file = new BrokerFile();
                    $resource_segment_file->broker_id = $resource_id;
                    $resource_segment_file->name = 'file';
                    $resource_segment_file->filename = $image_name;
                    $resource_segment_file->save();
                }
            }
        } catch (\Exception $e) {
            dd($e->getMessage());
            // return Redirect::back()->withErrors(['message', $e->getMessage() ]);
        }
        return $this->index();
    }

    public function broker_delete($id){
        Broker::destroy($id);
        return $this->index();
    }





    public function broker_agents_index(){
        $this->data['broker_agents'] = $broker_agents = BrokerAgent::where('status', '1');
        if($broker_agents->get()->isEmpty()) {
            $this->data['count_status'] = 'No broker registrations found. You can launch a new project above to start-off';
            
        } else {
            $this->data['resource'] = $broker_agents->get();
        }
        return view('broker_agent', $this->data);
    }

    public function broker_agents_status_change($status_id, $agent_id){
        $this->data['broker_agents'] = $broker_agents = BrokerAgent::find($agent_id);
        if($broker_agents->isEmpty()) {
            $this->data['count_status'] = 'No broker registrations found. You can launch a new project above to start-off';
        } else {
            $this->data['resource'] = $broker_agents->get();
            $broker_agents->status == $status_id;
            $broker_agents->save();
        }
        return view('broker_agent', $this->data);
    }



    public function edit($id){
        $this->data['resource'] = $resource = Broker::with('broker_files')->find($id);
        if($resource->broker_files->count() > 0){
            $this->data['files'] = 'true';
        } else {
            $this->data['files'] = 'false';
        }
        return view('broker.update.index', $this->data);
    }
}
