<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\RegistrasiEvent;

class RegistrasiController extends Controller
{
    public function detail($kode_registrasi)
    {
        $dataRegistrasi = RegistrasiEvent::where('kode_registrasi', $kode_registrasi)->first();
        $event = Event::where('kode_event', $dataRegistrasi->kode_event)->first();
        return view('event.event-register-success', [
            'title' => 'Ticket Event ' . $event->title,
            'event' => $event,
            'registrasi' => $dataRegistrasi,
        ]);
    }
}
