<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attentant extends Model
{
    use HasFactory;

    public function shareholder()
    {
        return $this->belongsTo(Shareholder::class, 'shareholder_id', 'id');
    }
    public function proxy()
    {
        return $this->belongsTo(Proxy::class, 'proxy_id', 'id');
    }
}
