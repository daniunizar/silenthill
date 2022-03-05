<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resident extends Model
{
    use HasFactory;
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
    //Relationships
    //One to Many Inverse
    /**
     * An resident have a gender
     */
    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }
}
