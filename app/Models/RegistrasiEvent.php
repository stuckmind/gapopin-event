<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistrasiEvent extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function events()
    {
        return $this->belongsTo(Event::class, 'kode_event', 'kode_event');
    }
}
