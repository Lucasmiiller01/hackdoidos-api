<?php

use Illuminate\Database\Seeder;

class EventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $events = [];

        for ($x = 1; $x <= 1000; $x++) {
            array_push($events,  [ 'type_event_id' => 1, 'lat' => -22.874507 + $x/  1000, 
                'lng' =>  -43.246532 + $x/1000]);
        }
      
        DB::table('events')->insert($events);
    }
}
