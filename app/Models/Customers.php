<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'customers';

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'gender' => 0
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // chi dinh ro thuoc tinh nao dc dung mass assignable.
    protected $fillable = ['email', 'password',  'phone', 'fullname', 'home_address', 'order_address', 'birthday'];
}
