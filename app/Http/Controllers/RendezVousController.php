<?php

namespace App\Http\Controllers;

use App\Models\RendezVous;
use Illuminate\Http\Request;

class RendezVousController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(RendezVous $rendezVous)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RendezVous $rendezVous)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RendezVous $rendezVous)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RendezVous $rendezVous)
    {
        //
    }
    public function checkAvailability(Request $request)
    {
        $date = $request->input('date');
        $heure = $request->input('heure_reservation');

        $heureDebut = \Carbon\Carbon::parse("$date $heure")->subMinutes(45);
        $heureFin   = \Carbon\Carbon::parse("$date $heure")->addMinutes(45);

        $conflit = \App\Models\ReservationRdv::whereDate('date', $date)
            ->whereBetween('heure_reservation', [$heureDebut->format('H:i'), $heureFin->format('H:i')])
            ->exists();

        return response()->json(['available' => !$conflit]);
    }
}
