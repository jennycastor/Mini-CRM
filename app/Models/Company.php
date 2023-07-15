<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name',
        'email',
        'logo',
        'website',
        '_token', // Add _token to the fillable property
    ];

//     public function company()
// {
//     return $this->belongsTo(Company::class, 'name');
// }

    use HasFactory;
}
