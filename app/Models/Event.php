<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function registrasi()
    {
        return $this->hasMany(RegistrasiEvent::class, 'kode_event', 'kode_event');
    }
}
