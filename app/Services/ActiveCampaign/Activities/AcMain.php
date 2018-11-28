<?php

namespace App\Services\ActiveCampaign\Activities;
require_once app_path() . '\Services\ActiveCampaign\ActiveCampaign.class.php';

class AcMain{
    
    private $ac;
    private $result;

    function __construct(){
        $API_URL = "https://victorgucloud.api-us1.com";
        $API_KEY = "e02700d47ae09f63bd3c98fb618b9fcd6ea86b7a31a7a5e24b7f6afab55b53c740f194f3";
        $this->ac = new \ActiveCampaign($API_URL, $API_KEY);
        $this->result = array("success"=>false, "returnValue"=>null);
    }

    public function callActiveCampaign($service,$params=null){
        $contact = $this->ac->api($service,$params);
	if ((int)$contact->success) {
            \Log::info("Call active campaign service: ".$service." success.");
            $this->result['success'] = true;
            $this->result['returnValue'] = $contact;
	}else{
            \Log::warning("Call active campaign service: ".$service." failed. Error returned: ".$contact->error);
            $this->result['success'] = false;
            $this->result['returnValue'] = null;
        }
        return $this->result;
    }
    
}
