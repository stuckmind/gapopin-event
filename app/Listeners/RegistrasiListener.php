<?php

namespace App\Listeners;

use App\Events\RegistrasiCreated;
use App\Events\RegistrasiEvent;
use App\Events\RegistrasiSendEvent;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class RegistrasiListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(RegistrasiSendEvent $event): void
    {
        // Pastikan event punya property 'registrasi'
        $registrasi = $event->registrasi;

        Log::info('Registrasi baru diterima:', [
            'id' => $registrasi->id,
            'nama' => $registrasi->nama,
            'email' => $registrasi->email,
            'event' => $registrasi->kode_event,
        ]);
    }
}
