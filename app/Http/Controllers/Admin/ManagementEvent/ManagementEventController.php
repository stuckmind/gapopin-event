<?php

namespace App\Http\Controllers\Admin\ManagementEvent;

use App\Models\Event;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ManagementEventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.management-event.management-event-index', [
            'title' => 'Management Event',
            'events' => Event::orderBy('tanggal', 'desc')->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.management-event.management-event-create', [
            'title' => 'Management Event',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'poster'     => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'title'      => 'required|string|max:255',
            'location'   => 'required|string|max:255',
            'tanggal'    => 'required|date',
            'file_name_tag' => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        // Upload poster
        $posterPath = $request->file('poster')->store('posters', 'public');
        $nameTagPath = $request->file('file_name_tag')->store('name_tag', 'public');
        $kodeEvent = strtoupper(str_replace(' ', '-', $request->title) . '-' . uniqid());
        Event::create([
            'kode_event' => $kodeEvent,
            'poster'     => $posterPath,
            'title'      => $request->title,
            'slug'       => Str::slug($request->title),
            'location'   => $request->location,
            'tanggal'    => $request->tanggal,
            'file_name_tag' => $nameTagPath
        ]);

        return redirect()->route('management-event.index')
            ->with('success', 'Event berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $event = Event::find($id);
        return view('admin.management-event.management-event-show', [
            'title' => 'Management Event ' . $event->title,
            'event' => $event
        ]);
    }

    public function qrcode($id)
    {
        $event = Event::findOrFail($id);

        // Buat QR code dengan link ke form registrasi event
        $url = route('registrasi.form', $event->slug);

        // ✅ Tambahkan background putih dan margin biar mudah discan
        $qrCode = QrCode::format('png')
            ->size(300)                  // ukuran QR utama
            ->margin(2)                  // ruang putih di sekeliling QR
            ->backgroundColor(255, 255, 255) // background putih
            ->color(0, 0, 0)             // warna kode hitam
            ->generate($url);

        $fileName = 'qrcode-event-' . $event->kode_event . '.png';

        return Response::make($qrCode, 200, [
            'Content-Type' => 'image/png',
            'Content-Disposition' => 'inline; filename="' . $fileName . '"'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $event = Event::findOrFail($id);
        return view('admin.management-event.management-event-edit', [
            'title' => 'Edit Event ' . $event->title,
            'event' => $event
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $event = Event::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'poster' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Update slug & kode event (kode tidak berubah)
        $validated['slug'] = strtoupper(str_replace(' ', '-', $validated['title']));

        // Jika ada upload poster baru
        if ($request->hasFile('poster')) {
            // Hapus poster lama
            if ($event->poster && Storage::exists('public/' . $event->poster)) {
                Storage::delete('public/' . $event->poster);
            }

            $path = $request->file('poster')->store('event-posters', 'public');
            $validated['poster'] = $path;
        }

        $event->update($validated);

        return redirect()->route('management-event.index')->with('success', 'Event berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $event = Event::findOrFail($id);

        // Hapus poster dari storage kalau ada
        if ($event->poster && Storage::exists('public/' . $event->poster)) {
            Storage::delete('public/' . $event->poster);
        }

        $event->delete();

        return redirect()->route('management-event.index')
            ->with('success', 'Event berhasil dihapus!');
    }
}
