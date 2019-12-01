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
        $types = [
            [ 'name' => 'Pneus',],
            [ 'name' => "Caixa D'água, Cisterna, balde",],
            [ 'name' => 'Lixo doméstico',],
            [ 'name' => 'Ferro velho, Terreno Baldio',],
            [ 'name' => 'Esgoto à céu aberto',],
            [ 'name' => 'Plantas, Folhas, Troncos',],
            [ 'name' => 'Outros',]
        ];

        foreach($types as $type)
            DB::table('type_events')->insert($type);
    }
}
