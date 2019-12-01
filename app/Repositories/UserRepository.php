<?php
namespace App\Repositories;
use App\User;
class UserRepository extends BaseRepository
{
    protected $modelClass = User::class;

    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function getById($id)
    {
        return $this->model->findOrFail($id);
    }

    public function create($user)
    {
        $query = $this->newQuery();
        $response = $query->create(['name' => $user["name"], 'email' => $user["email"], 'password' => bcrypt($user["password"])]);
        return $response;
    }

    public function updateUser($id, $data)
    {
        return $this->model->findOrFail($id)->update([
            'name' => $data->name, 'email' => $data->email
        ]);;
    }
}
