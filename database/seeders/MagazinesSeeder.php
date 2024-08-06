<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Magazine;

class MagazinesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Magazine::truncate();
        Magazine::create([
            'user_id' => '1',
            'titulo' => 'Libro 1',
            'descripcion' => 'Se trata de Libro 1',
            'ano'  => '2024',
            'mes'  => '01',
            'url'  => 'https://www.fegasacruz.org',
            'image'  => 'logo1.jpg'
        ]);
        Magazine::create([
            'user_id' => '2',
            'titulo' => 'Libro 2',
            'descripcion' => 'Se trata de Libro 2',
            'ano'  => '2024',
            'mes'  => '02',
            'url'  => 'https://www.fegasacruz.org',
            'image'  => 'logo2.jpg'
        ]);
    }
}
