<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstitutionsWorkingSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'institution_id',
        'section_id',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id')->select('id', 'fullname', 'email');
    }
}
