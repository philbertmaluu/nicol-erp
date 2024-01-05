<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{
    use HasFactory;

    protected $fillable = ['shareholder_id', 'content'];

    public function shareholder()
    {
        return $this->belongsTo(Shareholder::class);
    }

    public function generateTicket()
    {
        // Customize this logic based on your requirements
        $shareholder = $this->shareholder;
        $event = $shareholder->events()->latest()->first(); // Assuming the Shareholder has a relationship to events

        $this->content = "Ticket for {$shareholder->Name} for {$event->name}";
    }
}
