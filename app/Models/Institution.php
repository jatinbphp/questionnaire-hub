<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Institution extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'institutionName',
        'address',
        'contactPersonName',
        'contactNumber',
        'logo_image',
        'mobile_number',
        'status',
        'added_by',
    ];

    public function submitter() {
        return $this->hasOne(User::class, 'institution_id')->select('institution_id','title','fullname','email')->where('role', 'submitter'); 
    }
}
