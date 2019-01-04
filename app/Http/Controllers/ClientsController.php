<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Client;
use App\Project;

class ClientsController extends Controller
{
    public function index(){
       /* $clients = Client::all();*/
        $data = [
            'clients' =>  Client::all(),
            'projects' => Project::all()
        ]; 

        return view("modules.clients.index")->with($data);
    }

    public function store( Request $request ){

        Client::create([
            "project_id" => $request->project_id,
            "client_firstname" => $request->client_firstname,
            "client_lastname" => $request->client_lastname,
            "client_middlename" => $request->client_middlename,
            "image" => $request->image
        ]);

        return redirect()->route('clients.index')->with('success', 'Client created successfully.');
    }

    public function create(){

        $projects = [
            'projects' => Project::all()
        ];
        return view("modules.clients.create")->with($projects);
    }

    public function show( $client_id ){

        $client = client::find($client_id);
        return view('modules.clients.show')->with("client", $client);
    }

    public function edit( $client_id ){

        // yung laravel with() is equivalent yan sa compact() ng php. every associative array ang nacoconvert into variables. katulad nito.
        // example need mo si client, tapos need mo din di project

        $data = [
            'client' => Client::find($client_id),
            'projects' => Project::all(),
            'client_projects' => Client::find($client_id)->projects()->get(),
        ];


        return view('modules.clients.edit')->with( $data );
    }

    public function update(Request $request, $client_id){
        /*$clients = Client::find($client_id);
        $clients->client_title = $request->client_title;
        $clients->website = $request->website;
        $clients->email = $request->email;
        $clients->telegram = $request->telegram;
        $clients->note = $request->note;
        $clients->save();

        return redirect()->route('clients.index')->with('success', 'Client updated successfully.');*/
    }

    public function destroy($client_id){
        /*$clients = Client::find($client_id);
        $clients->delete();
        return redirect()->route('clients.index')->with('success', 'Client deleted succesfuly.');*/
    }
}
