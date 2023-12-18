<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shareholder extends Model
{
    use HasFactory;


    protected $fillable = [
        'CSD',
        'Name',
        'Email',
        'phone',
        'shares',
    ];

    public function proxy()
    {
        return $this->belongsTo(Proxy::class);
    }
}
