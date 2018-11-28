<?php

namespace App\Services\ActiveCampaign\Activities;

class AcContact extends AcMain{

    private $id;
    private $email;
    private $first_name;
    private $last_name;
    private $mobile;
    private $api;
    //field[1,0] manually added field DOB in active campaign portal
    private $DOB;
    //field[2,0] manually added field home_address in active campaign portal
    private $home_address;
    //field[3,0] manually added field postal_address in active campaign portal
    private $postal_address;
    private $list_id;
    
    function generateData($data){
        $this->id = isset($data['id']) ? $data['id'] : '';
        $this->email = isset($data['email']) ? $data['email'] : '';
        $this->first_name = isset($data['first_name']) ? $data['first_name'] : '';
        $this->last_name = isset($data['last_name']) ? $data['last_name'] : '';
        $this->mobile = isset($data['mobile']) ? $data['mobile'] : '';
        $this->api = isset($data['api']) ? $data['api'] : 'api';
        $this->DOB = isset($data['DOB']) ? $data['DOB'] : '';
        $this->home_address = isset($data['home_address']) ? $data['home_address'] : '';
        $this->postal_address = isset($data['postal_address']) ? $data['postal_address'] : '';
        $this->list_id = isset($data['$list_id']) ? $data['$list_id'] : 1;
        $this->status = isset($data['status']) ? $data['status'] : 1;
    }
    
    function newContact($data){
        $this->generateData($data);
	$params = array(
            "email"              => $this->email,
            "first_name"         => $this->first_name,
            "last_name"          => $this->last_name,
            'phone'              => $this->mobile,
            'tags'               => $this->api,
            'field[1,0]'         => $this->DOB,
            'field[2,0]'         => $this->home_address,
            'field[3,0]'         => $this->postal_address,
            "p[]"                => $this->list_id,
            "status[$this->list_id]"   => $this->status, 
	);
        return $params;
    }
    
    function updateContact($data){
        $this->generateData($data);
        $params = array(
            'id'                 => $this->id, 
            'email'              => $this->email,
            'first_name'         => $this->first_name,
            'last_name'          => $this->last_name,
            'phone'              => $this->mobile,
            'tags'               => $this->api,
            'field[1,0]'         => $this->DOB,
            'field[2,0]'         => $this->home_address,
            'field[3,0]'         => $this->postal_address,
            'p[]'                => $this->list_id,
        );
        return $params;
    }
}
