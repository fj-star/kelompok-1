<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Siswa;

class SiswaSeeder extends Seeder
{
    public function run(): void
    {
        Siswa::factory()->count(50)->create();

        Siswa::firstOrCreate(
            ['email' => 'siswa1@example.com'],
            [
                'nama' => 'Mas Deng Palilng Ganteng',
                'tanggal_lahir' => '2005-05-10',
                'alamat' => 'Jl. Merdeka No.1',
                
                
            ]
        );
    }
}
