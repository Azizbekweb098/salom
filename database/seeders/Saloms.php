<?php

namespace Database\Seeders;

use App\Models\Salom;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Saloms extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Salom::create([
        'name' => 'Salom',
       ]);
    }
}
