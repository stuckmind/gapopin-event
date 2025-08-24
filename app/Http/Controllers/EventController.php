<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\RegistrasiEvent;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class EventController extends Controller
{
    public function detail($slug)
    {
        $event = Event::where('slug', $slug)->first();
        return view('event.event-index', [
            'title' => $event->title,
            'event' => $event
        ]);
    }

    public function processRegistration(Request $request, $slug)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'optik' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
        ]);

        $event = Event::where('slug', $slug)->first();

        // Generate kode registrasi unik
        $kode_registrasi = 'REG' .  time() . rand(100, 999);

        // Simpan data
        $registrasi = RegistrasiEvent::create([
            'event_id' => $event->id,
            'kode_event' => $event->kode_event, // bisa ganti sesuai kebutuhan
            'kode_registrasi' => $kode_registrasi,
            'nama' => $request->name,
            'nama_optik' => $request->optik,
            'email' => $request->email,
            'no_whatsapp' => $request->phone,
            'alamat' => $request->address,
        ]);

        return redirect()->route('registrasi.detail', $kode_registrasi);
    }
}
