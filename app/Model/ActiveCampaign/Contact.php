<?php

namespace App\Model\ActiveCampaign;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'ac_contacts';
    public $primaryKey="id";
}
