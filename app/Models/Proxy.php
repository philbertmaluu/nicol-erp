<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proxy extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'phone',
        'shareholders'
    ];

    public function shareholders()
    {
        return $this->hasMany(Shareholder::class);
    }

    protected $casts = [
        'shareholders' => 'array',

    ];
}
