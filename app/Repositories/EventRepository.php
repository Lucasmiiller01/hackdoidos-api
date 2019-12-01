<?php
namespace App\Repositories;
use App\Event;
use Illuminate\Support\Facades\Hash;
class EventRepository extends BaseRepository
{
    protected $modelClass = Event::class;

  
   
    public function create($event)
    {
        $query = $this->newQuery();
        $response = $query->create(['description' => $event["description"],  'image' => $event['image'], 'lng' => $event["lng"], 'lat' => $event["lat"]]);
        return $response;
    }

}