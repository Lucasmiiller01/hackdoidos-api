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

        for ($x = 1; $x <= 50; $x++) {
            array_push($events,  [ 'type_event_id' => 1, 'lat' => -22.874507 + $x/  1000,
                'lng' =>  -43.246532 + $x/1000]);
        }

        for ($x = 1; $x <= 50; $x++) {
            array_push($events,  [ 'type_event_id' => 1, 'lat' => -22.736131 + $x/  1000,
                'lng' =>  -43.307953 + $x/1000]);
        }

        for ($x = 1; $x <= 50; $x++) {
            array_push($events,  [ 'type_event_id' => 1, 'lat' => -22.876111 + $x/  1000,
                'lng' =>  -43.246453 + $x/1000]);
        }

        for ($x = 1; $x <= 50; $x++) {
            array_push($events,  [ 'type_event_id' => 1, 'lat' => -22.878475 + $x/  1000,
                'lng' =>  -43.249061 + $x/1000]);
        }

        for ($x = 1; $x <= 50; $x++) {
            array_push($events,  [ 'type_event_id' => 1, 'lat' => -22.880081 + $x/  1000,
                'lng' =>  -43.246872 + $x/1000]);
        }


        for ($x = 1; $x <= 50; $x++) {
            array_push($events,  [ 'type_event_id' => 1, 'lat' => -22.880565 + $x/  1000,
                'lng' =>  -43.244374 + $x/1000]);
        }



        for ($x = 1; $x <= 50; $x++) {
            array_push($events,  [ 'type_event_id' => 1, 'lat' => -22.880565 + $x/  1000,
                'lng' =>  -43.244374 + $x/1000]);
        }




        DB::table('events')->insert($events);
    }
}
