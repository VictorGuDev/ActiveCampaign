<?php

namespace App\Services\ActiveCampaign\Webhooks;
use App\Model\ActiveCampaign\Contact;

class WebhookContact {
    
    function updateContact($contact){
        
        $ac_id = $contact['id'];
        $email = $contact['email'];
        $first_name = $contact['first_name'];
        $last_name = $contact['last_name'];
        $phone = $contact['phone'];
        $ip = $contact['ip'];
        $tags = $contact['tags'];
        
        $contact = Contact::find($email);
        if(!$contact){
            //when email address updated in active campaign
            $contact = Contact::where('ac_id',$ac_id)->first();
        }
        if(!$contact){
            $contact = new Contact;
        }

        $contact = new Contact;
        $contact->ac_id = $ac_id;
        $contact->email = $email;
        $contact->first_name = $first_name;
        $contact->last_name = $last_name;
        $contact->phone = $phone;
        $contact->ip = $ip;
        $contact->tags = $tags;
        $contact->save();
        
    }

}
