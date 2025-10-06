<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event; // Pastikan baris ini sudah tidak ada komentar
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('event', ['title' => 'Event', 'events' => $events]);
    }

    public function create()
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            return redirect('/')->with('error', 'Anda tidak memiliki izin untuk membuat event.');
        }

        return view('admin.events.create', ['title' => 'Buat Event Baru']);
    }

    public function store(Request $request)
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            return redirect('/')->with('error', 'Anda tidak memiliki izin untuk membuat event.');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
        ]);

        Event::create($request->all());

        return redirect()->route('event')->with('success', 'Event berhasil dibuat!');
    }

    // Menampilkan form edit
    public function edit(Event $event)
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            return redirect('/')->with('error', 'Anda tidak memiliki izin.');
        }

        return view('admin.events.edit', [
            'title' => 'Edit Event',
            'event' => $event
        ]);
    }

    // Proses update
    public function update(Request $request, Event $event)
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            return redirect('/')->with('error', 'Anda tidak memiliki izin.');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
        ]);

        $event->update($request->all());

        return redirect()->route('event')->with('success', 'Event berhasil diperbarui!');
    }

    // Proses delete
    public function destroy(Event $event)
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            return redirect('/')->with('error', 'Anda tidak memiliki izin.');
        }

        $event->delete();

        return redirect()->route('event')->with('success', 'Event berhasil dihapus.');
    }

}