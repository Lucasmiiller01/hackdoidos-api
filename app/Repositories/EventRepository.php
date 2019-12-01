<?php
namespace App\Repositories;

use App\Event;

class EventRepository extends BaseRepository
{
    protected $modelClass = Event::class;
   // protected $model;

    public function __construct(Event $event)
    {
        $this->model = $event;
    }

    public function create($data)
    {
       return $this->model->create([
            'type_event_id' => $data["type_event_id"],
             'image' =>  $data['image'],
             'lng' => $data["lng"],
             'lat' => $data["lat"]
        ]);
    }

}
