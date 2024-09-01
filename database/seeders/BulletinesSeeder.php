<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Bulletine;

class BulletinesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Bulletine::truncate();
        Bulletine::create([
            'user_id' => '1',
            'titulo' => 'Boletin 1',
            'descripcion' => 'Informe Boletin 1',
            'ano'  => '2024',
            'mes'  => '01',
            'url'  => 'https://www.fegasacruz.org/files/boletin1.pdf',
            'image'  => 'boletin1.jpg'
        ]);
        Bulletine::create([
            'user_id' => '2',
            'titulo' => 'Boletin 2',
            'descripcion' => 'Informe Boletin 2',
            'ano'  => '2024',
            'mes'  => '02',
            'url'  => 'https://www.fegasacruz.org/files/boletin2.pdf',
            'image'  => 'boletin2.jpg'
        ]);
    }
}
