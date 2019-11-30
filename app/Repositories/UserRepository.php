<?php
namespace App\Repositories;
use App\Mail\SendMailUser;
use App\User;
use Illuminate\Support\Facades\Mail;
use App\Enums\SystemRoles;
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
   
    public function createUser($name, $email, $password)
    {
        $query = $this->newQuery();
        $response = $query->create(['name' => $name, 'email' => $email, 'password' => bcrypt($password)]);
        return $response;
    }
    public function updateUser($data)
    {
        $user = User::find($data->user_id);
        $user->update(['name' => $data->name, 'email' => $data->email]);
        return $user;
    }
}