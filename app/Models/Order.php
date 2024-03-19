<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantity_of_tickets',
        'picture'
    ];

    public function event()
    {
        return $this->belongsTo('App\Models\Event');
    }

    public function informations()
    {
        return $this->belongsToMany('App\Models\Information');
    }
}
