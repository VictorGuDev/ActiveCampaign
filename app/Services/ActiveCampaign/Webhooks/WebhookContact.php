<?php

namespace App\Services\ActiveCampaign\Webhooks;

class WebhookContact {
    
    function updateContact($contact){
        
        $ac_id = $contact['id'];
        $email = $contact['email'];
        $first_name = $contact['first_name'];
        $last_name = $contact['last_name'];
        $phone = $contact['phone'];
        $ip = $contact['ip'];
        $tags = $contact['tags'];
        
        $existingContact = \App\Model\ActiveCampaign\Contact::where('email',$email)->first();
        if(!$existingContact){
            $contact = new \App\Model\ActiveCampaign\Contact;
            $contact->ac_id = $ac_id;
            $contact->email = $email;
            $contact->first_name = $first_name;
            $contact->last_name = $last_name;
            $contact->phone = $phone;
            $contact->ip = $ip;
            $contact->tags = $tags;
            $contact->save();
            return 'create new contact';
        }else{
            $contact = \App\Model\ActiveCampaign\Contact::where('ac_id',$ac_id)->first();
            $contact->first_name = $first_name;
            $contact->last_name = $last_name;
            $contact->phone = $phone;
            $contact->ip = $ip;
            $contact->tags = $tags;
            $contact->save();
            return 'update existing contact';
        }
    }

}
