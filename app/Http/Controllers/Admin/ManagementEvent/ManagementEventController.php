<?php

namespace App\Http\Controllers\Admin\ManagementEvent;

use App\Models\Event;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
            'tanggal'    => 'required|date'
        ]);

        // Upload poster
        $posterPath = $request->file('poster')->store('posters', 'public');
        $kodeEvent = strtoupper(str_replace(' ', '-', $request->title)) . '-' . uniqid();
        Event::create([
            'kode_event' => $kodeEvent,
            'poster'     => $posterPath,
            'title'      => $request->title,
            'slug'       => Str::slug($request->title),
            'location'   => $request->location,
            'tanggal'    => $request->tanggal,
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

        // bikin QR dengan isi link detail event
        $qrCode = QrCode::format('png')
            ->size(300)
            ->generate(route('management-event.show', $event->id));

        $fileName = 'qrcode-event-' . $event->kode_event . '.png';

        return Response::make($qrCode, 200, [
            'Content-Type' => 'image/png',
            'Content-Disposition' => 'attachment; filename="' . $fileName . '"'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
