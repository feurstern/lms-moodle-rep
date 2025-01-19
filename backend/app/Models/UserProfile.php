<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    /** @use HasFactory<\Database\Factories\UserProfileFactory> */
    use HasFactory;

    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];

    function scopeCountry($query)
    {
        return $query->whereNull("deleted_at");
    }
}
