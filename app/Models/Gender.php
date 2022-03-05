<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    use HasFactory;
    //Relationships
    //One to Many
    /**
     * An gender is present in many residents
     */
    public function residents()
    {
        return $this->hasMany(Resident::class);
    }
}
