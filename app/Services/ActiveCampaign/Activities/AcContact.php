<?php

namespace App\Services\ActiveCampaign\Activities;
use \App\Model\ActiveCampaign;

class AcContact extends AcMain{

    private $id;
    private $email;
    private $first_name;
    private $last_name;
    private $phone;
    //field[1,0] manually added field DOB in active campaign portal
    private $DOB;
    //field[2,0] manually added field home_address in active campaign portal
    private $home_address;
    //field[3,0] manually added field postal_address in active campaign portal
    private $postal_address;
    private $list_id;
    private $tags;
    private $params;
    
    function generateData($data){
        $this->id = isset($data['id']) ? $data['id'] : '';
        $this->email = isset($data['email']) ? $data['email'] : '';
        $this->first_name = isset($data['first_name']) ? $data['first_name'] : '';
        $this->last_name = isset($data['last_name']) ? $data['last_name'] : '';
        $this->phone = isset($data['phone']) ? $data['phone'] : '';
        $this->DOB = isset($data['DOB']) ? $data['DOB'] : '';
        $this->home_address = isset($data['home_address']) ? $data['home_address'] : '';
        $this->postal_address = isset($data['postal_address']) ? $data['postal_address'] : '';
        $this->list_id = isset($data['$list_id']) ? $data['$list_id'] : 1;
        $this->status = isset($data['status']) ? $data['status'] : 1;
        $this->tags = isset($data['tags']) ? $data['tags'] : 'api';
	$this->params = array(
            "email"                     => $this->email,
            "first_name"                => $this->first_name,
            "last_name"                 => $this->last_name,
            'phone'                     => $this->phone,
            'tags'                      => $this->tags,
            'field[1,0]'                => $this->DOB,
            'field[2,0]'                => $this->home_address,
            'field[3,0]'                => $this->postal_address,
            "p[]"                       => $this->list_id,
            "status[$this->list_id]"    => $this->status
	);
    }
    
    function newContact($service,$data){
        $this->generateData($data);
        $existingContact = ActiveCampaign\Contact::find($this->email);
        if(!$existingContact){
            $result = $this->callActiveCampaign($service, $this->params);
            //following function is not needed when set webhook in active campaign call happ_path()./ac/webhook/contactUpdate
            /*if($result['success']){
                $contact = new ActiveCampaign\Contact;
                $contact->ac_id = $result['returnValue']->subscriber_id;
                $contact->email = $this->email;
                $contact->first_name = $this->first_name;
                $contact->last_name = $this->last_name;
                $contact->phone = $this->phone;
                $contact->ip = '127.0.0.1';
                $contact->tags = $this->tags;
                $contact->save();
            }*/
        }else{
            $result = array("success"=>false, "returnValue"=>"Email address has already been registered in Active Campaign.");
        }
        return $result;
    }
    
    function updateContact($service,$email){
        $contact = ActiveCampaign\Contact::find($email);
        if($contact){
            $params = array(
                "id"                => $contact->ac_id,
                "first_name"        => $contact->first_name,
                "last_name"         => $contact->last_name,
                'phone'             => $contact->phone,
                'tags'              => $contact->tags,
                "p[]"               => $this->generateList(),
                "status[1]"         => $this->generateListStatus(),
                //'field[1,0]'        => $contact->DOB,
                //'field[2,0]'        => $contact->home_address,
                //'field[3,0]'        => $contact->postal_address,
            );
            $result = $this->callActiveCampaign($service, $params);
        }else{
            $result = array("success"=>false, "returnValue"=>"Email address not registered in local system.");
        }
        return $result;
    }
    
    function generateList(){
        //return value based on requirement
        return 1;
    }
    
    function generateListStatus(){
        //return value based on requirement
        return 1;
    }
}
