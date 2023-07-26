<?php

namespace App\Http\Controllers\Patients;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    //get patient list
    public function index()
    {
        return User::with(['gender'=>function($q){
            return $q->with('genderitem');
        },'services'=>function($r){
            return $r->with(['serviceitem']);
        }])->get();
    }

    public function show($id)
    {
        return User::with(['gender'=>function($q){
            return $q->with('genderitem');
        },'services'=>function($r){
            return $r->with(['serviceitem']);
        }])->find($id);
    }
}
