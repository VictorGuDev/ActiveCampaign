<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AcWebhookController extends Controller
{
    public function contactUpdate(Request $request){
        $data = $request->input();
        $contact = $data['contact'];
        $result = app()->make('WebhookContact')->updateContact($contact);
        return response($result)->header('Content-Type', 'application/json');
    }
}
