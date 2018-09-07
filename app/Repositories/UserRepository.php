<?php
namespace App\Repositories;

use App\Models\User;

class UserRepository extends BaseRepository
{
    protected $model;

    public function __construct()
    {
        $this->model = new User();
    }

    public function getById($id)
    {
        return $this->model->firstOrFail($id);
    }
}