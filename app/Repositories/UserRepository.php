<?php
namespace App\Repositories;
use App\User;
use Illuminate\Support\Facades\Hash;
class UserRepository extends BaseRepository
{
    protected $modelClass = User::class;

    public function getById($id)
    {
        $query = $this->newQuery();
        $query = $query->findOrFail($id);

        return $query;
    }
   
    public function create($user)
    {
        $query = $this->newQuery();
        $response = $query->create(['name' => $user["name"], 'email' => $user["email"], 'password' => bcrypt($user["password"])]);
        return $response;
    }
    public function updateUser($data)
    {
        $user = User::find($data->user_id);
        $user->update(['name' => $data->name, 'email' => $data->email]);
        return $user;
    }
}