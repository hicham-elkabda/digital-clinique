<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TimeSeeder extends Seeder
{
    public function run()
    {
        $start = Carbon::createFromTime(8, 0, 0);  // début journée
        $end   = Carbon::createFromTime(19, 0, 0); // fin journée

        while ($start <= $end) {
            DB::table('times')->insert([
                'heure' => $start->format('H:i:s'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            $start->addMinutes(45);
        }
    }
}
