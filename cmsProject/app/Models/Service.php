<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// app/Models/Service.php

class Service extends Model
{
   
    protected $fillable = [
        'icon', 'title', 'subtitle', 'description',
        'key_services', 'why_it_matters', 'lead_by',
    ];

   
}
