<?php

namespace App\Http\Controllers\Admin\LaporanEvent;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\RegistrasiEvent;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;

class LaporanEventController extends Controller
{
    public function index()
    {
        return view('admin.laporan-event.laporan-event-index', [
            'title' => 'Laporan Event',
            'events' => Event::orderBy('tanggal', 'desc')->paginate(10)
        ]);
    }

    public function detail($slug)
    {
        $event = Event::where('slug', $slug)->first();

        $registrasi = RegistrasiEvent::where('kode_event', $event->kode_event)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.laporan-event.laporan-event-detail', [
            'title' => 'Laporan Registrasi ' . $event->title,
            'event' => $event,
            'registrasi' => $registrasi,
        ]);
    }

    public function exportPdf(Event $event)
    {
        $registrasi = $event->registrasi()->orderBy('created_at')->get();

        $pdf = Pdf::loadView('admin.laporan-event.laporan-event-pdf', [
            'event' => $event,
            'registrasi' => $registrasi
        ])->setPaper('a4', 'portrait');

        $filename = 'Laporan_Registrasi_' . $event->slug . '.pdf';
        return $pdf->download($filename);
    }
}
