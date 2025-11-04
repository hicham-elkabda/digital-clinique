<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ActeSeeder extends Seeder
{
    public function run()
    {
        $now = Carbon::now();

        DB::table('actes')->insert([
            [
                'nom' => 'Consultation générale',
                'prix' => 100,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nom' => 'Détartrage et prophylaxie',
                'prix' => 150,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nom' => 'Obturation / Plombage',
                'prix' => 200,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nom' => 'Extraction dentaire',
                'prix' => 250,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nom' => 'Traitement de canal (endodontie)',
                'prix' => 400,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}

