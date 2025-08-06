<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\AddonBenefit;


class HomeController extends Controller
{
   

    public function showFrontendServices()
    {
        $services = Service::latest()->paginate(10);
        $addons = AddonBenefit::all();
        // return view('frontend.services.index', compact('addons'));
        
        // return view('frontend.services.index', compact('services'));
        return view('frontend.services.index', compact('services', 'addons'));
    }
    


    


    
}
