<?php

namespace App\Http\Controllers\Admin\RegistrasiEvent;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\RegistrasiEvent;
use App\Http\Controllers\Controller;

class RegistrasiEventController extends Controller
{
    public function index()
    {
        return view('admin.registrasi-event.registrasi-event-index', [
            'title' => 'Registrasi Event',
            'events' => Event::orderBy('tanggal', 'desc')->paginate(10)
        ]);
    }

    public function registrasi($slug)
    {
        $event = Event::where('slug', $slug)->first();

        $registrasi = RegistrasiEvent::where('kode_event', $event->kode_event)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.registrasi-event.registrasi-event-detail', [
            'title' => 'Data Registrasi ' . $event->title,
            'event' => $event,
            'registrasi' => $registrasi,
        ]);
    }

    public function scan(Request $request)
    {
        $kode = $request->kode_registrasi;

        $registrasi = RegistrasiEvent::where('kode_registrasi', $kode)->first();

        if (!$registrasi) {
            return response()->json([
                'success' => false,
                'message' => 'Data registrasi tidak ditemukan.'
            ]);
        }

        if ($registrasi->kehadiran) {
            return response()->json([
                'success' => false,
                'message' => 'Peserta sudah ditandai hadir sebelumnya.'
            ]);
        }

        $registrasi->update(['kehadiran' => true]);

        return response()->json([
            'success' => true,
            'nama' => $registrasi->nama,
            'message' => 'Kehadiran berhasil dikonfirmasi.'
        ]);
    }

    public function print($id)
    {
        $registrasi = RegistrasiEvent::findOrFail($id);

        return view('admin.registrasi-event.registrasi-event-print', [
            'registrasi' => $registrasi
        ]);
    }
}
