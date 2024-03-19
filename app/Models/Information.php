<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    use HasFactory;

    protected $table = 'informations';

    protected $fillable = [
        'personal_fullname',
        'personal_email',
        'personal_address',
    ];

    public function orders()
    {
        return $this->belongsToMany('App\Models\Order');
    }

}
