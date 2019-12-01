<?php

use Illuminate\Database\Seeder;

class TypeEventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_events')->insert(
        [
            'name' => 'Pneus',
        ],
        [
            'name' => "Caixa D'água, Cisterna, balde",
        ],
        [
            'name' => 'Lixo doméstico',
        ],
        [
            'name' => 'Ferro velho, Terreno Baldio',
        ],
        [
            'name' => 'Esgoto à céu aberto',
        ],
        [
            'name' => 'Plantas, Folhas, Troncos',
        ],
        [
            'name' => 'Outros',
        ]);
    }
}
