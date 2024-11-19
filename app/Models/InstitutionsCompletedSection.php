<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstitutionsCompletedSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'institution_id',
        'section_id',
        'status',
    ];
}
