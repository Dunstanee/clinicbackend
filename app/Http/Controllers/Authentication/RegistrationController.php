<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use App\Models\Gender;
use App\Models\Genderlist;
use App\Models\PatientServices;
use App\Models\Roles;
use App\Models\User;
use App\Models\UserRoles;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as ValidatorAlias;

class RegistrationController extends Controller
{
    //get gender list available
    public function index()
    {
        return Genderlist::all();
    }

    public function register_patient(Request $request)
    {
        $validator = ValidatorAlias::make($request->toArray(),[
            'name' => "required",
            'gender' => 'required',
            'date_of_birth' => 'required',
            'serviceType' => 'required',
        ]);
        if($validator->fails())
        {
            return $validator->errors();
        }

        $patient_details = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'comment' => $request->comment,
            'date_of_birth' => Carbon::parse($request->date_of_birth)->format('Y-m-d'),
            'password' => md5("1234")
        ]);

        Gender::create([
            'user_id' => $patient_details->id,
            'gender_id' => $request->gender,
        ]);

        PatientServices::create([
            'user_id' => $patient_details->id,
            'service_id' => $request->serviceType,
        ]);

        //Patient Registration Role default as 1
        UserRoles::create([
            'user_id' => $patient_details->id,
            'role_id' => 1,
        ]);

        return User::with(['gender'=>function($q){
            return $q->with('genderitem');
        },'services'=>function($r){
            return $r->with(['serviceitem']);
        }])->get();

    }

    public function register_staff(Request $request)
    {
        $validator = ValidatorAlias::make($request->toArray(),[
            'name' => "required",
            'gender' => 'required',
            'date_of_birth' => 'required',
            'RoleId' => 'required',
        ]);
        if($validator->fails())
        {
            return $validator->errors();
        }

        $staff_details = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'date_of_birth' => Carbon::parse($request->date_of_birth)->format('Y-m-d'),
            'password' => md5("1234")
        ]);

        Gender::create([
            'user_id' => $staff_details->id,
            'gender_id' => $request->gender,
        ]);

        //Staff Registration Role default as 2
        UserRoles::create([
            'user_id' => $staff_details->id,
            'role_id' => 2
        ]);

        return User::with(['gender'=>function($q){
            return $q->with('genderitem');
        },'services'=>function($r){
            return $r->with(['serviceitem']);
        }])->get();
    }
}
