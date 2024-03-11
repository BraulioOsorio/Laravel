<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categoria;
use App\Models\Plato;


class PlatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categoria  = Categoria::all();

        
        $categoria->each(function($cate){
            $plato = Plato::factory()->create([
                'categoria_id' => $categoria->pluck('id')->random(),
            ]);
        });

        //Plato::factory()->count(10)->create();
    }
}
