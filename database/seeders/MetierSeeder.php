<?php

namespace Database\Seeders;

use App\Models\Metier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class MetierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cnaeCodes = json_decode(Storage::disk('local')->get('cnae_codes.json'), true);
        foreach ($cnaeCodes as $cnaeCode => $name) {
            Metier::create([
                'name' => $name,
                'cnae_code' => $cnaeCode,
            ]);
        }
    }
}
