<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\Models\Roles;
use App\Models\Services;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    //get all services
    public function index()
    {
        return Services::all();
    }
}
