<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tour';

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    

    protected $fillable = ['name', 'start_date', 'tour_date', 'start_address', 'transport', 'price', 'description'];

}
