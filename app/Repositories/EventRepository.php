<?php
namespace App\Repositories;
use App\Event;
use Illuminate\Support\Facades\Hash;
class UserRepository extends BaseRepository
{
    protected $modelClass = User::class;

    public function getAll()
    {
        $query = $this->newQuery();
        $query = $query->getAll(1000, false);

        return $query;
    }
   
    public function create($event)
    {
        $query = $this->newQuery();
        $response = $query->create(['description' => $event["description"], 'lng' => $event["lng"], 'lat' => $event["event"]]);
        return $response;
    }

}