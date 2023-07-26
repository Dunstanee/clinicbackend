<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use mysql_xdevapi\Table;

class Gender extends Model
{
    use HasFactory;

    protected $table = "tbl_gender";

    protected $fillable =[
        'user_id',
        'gender_id'
    ];

    public function genderitem()
    {
        return $this->hasOne(Genderlist::class,'id','gender_id');
    }
}
