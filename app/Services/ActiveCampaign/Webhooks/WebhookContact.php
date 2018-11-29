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
        
        $existingContact = Contact::find($email);
        if(!$existingContact){
            $contact = new Contact;
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
            $contact = Contact::find($email);
            $contact->ac_id = $ac_id;
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
