<?php

namespace App\Http\Controllers;

use App\Models\ReservationRdv;
use App\Models\Acte;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ReservationRdvController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $times = DB::table('times')->get();
        $actes = Acte::all();
        return view('docteur.RDV.addRdvReserve', compact('actes', 'times'));
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
        // Validation des champs
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'cin' => 'required|string|max:20',
            'date' => 'required|date',
            'heure_reservation' => 'required',
            'id_acte' => 'required|integer',
        ]);

        // Vérification de la disponibilité : ±45 minutes
        $date = $validated['date'];
        $heure = $validated['heure_reservation'];

        $heureDebut = Carbon::parse("$date $heure")->subMinutes(45);
        $heureFin   = Carbon::parse("$date $heure")->addMinutes(45);

        $conflit = ReservationRdv::whereDate('date', $date)
            ->whereBetween('heure_reservation', [$heureDebut->format('H:i:s'), $heureFin->format('H:i:s')])
            ->exists();

        if ($conflit) {
            return back()->withErrors([
                'heure_reservation' => 'Ce créneau est déjà pris ou trop proche d’un autre rendez-vous (45 min minimum).'
            ])->withInput();
        }

        // Enregistrement du rendez-vous
        ReservationRdv::create([
            'nom' => $validated['nom'],
            'prenom' => $validated['prenom'],
            'cin' => $validated['cin'],
            'date' => $validated['date'],
            'heure_reservation' => $validated['heure_reservation'],
            'id_acte' => $validated['id_acte'],
            'statut' => $request->input('statut', 'en_attente'), // valeur par défaut
        ]);

        return redirect()->route('rdvReserver.index')
            ->with('success', 'Rendez-vous réservé avec succès !');
    }

    /**
     * Display the specified resource.
     */
    public function show(ReservationRdv $reservationRdv)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ReservationRdv $reservationRdv)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ReservationRdv $reservationRdv)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ReservationRdv $reservationRdv)
    {
        //
    }
}
