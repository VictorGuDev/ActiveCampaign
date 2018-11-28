<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ActiveCampaignController extends Controller
{
    public function viewList($id){
        $service = "list/view?id=".$id;
        $result = app()->make('AcList')->callActiveCampaign($service);
        return response($result)->header('Content-Type', 'application/json');
    }
    
    public function viewContact($id){
        $service = "contact/view?id=".$id;
        $result = app()->make('AcContact')->callActiveCampaign($service);
        return response($result)->header('Content-Type', 'application/json');
    }
    
    public function addContact(Request $request){
        $service = "contact/sync";
        $data = $request->input();
        $params = app()->make('AcContact')->newContact($data);
        $result = app()->make('AcContact')->callActiveCampaign($service,$params);
        return response($result)->header('Content-Type', 'application/json');
    }
    
    public function updateContact(Request $request){
        $service = "contact/edit";
        $data = $request->input();
        $params = app()->make('AcContact')->updateContact($data);
        $result = app()->make('AcContact')->callActiveCampaign($service,$params);
        return response($result)->header('Content-Type', 'application/json');
    }
}
