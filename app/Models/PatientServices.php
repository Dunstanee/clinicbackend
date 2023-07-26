<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientServices extends Model
{
    use HasFactory;

    protected $table = "tbl_patient_services";
    protected $fillable =[
        'user_id',
        'service_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function serviceitem()
    {
        return $this->hasOne(Services::class,'id','service_id');
    }

}
