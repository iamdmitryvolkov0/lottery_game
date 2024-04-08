<?php

namespace App\Http\Controllers;


use App\Actions\CreateUserAction;
use App\Actions\DeleteUserAction;
use App\Actions\GetAllUsersAction;
use App\Actions\UpdateUserAction;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getAllUsers(GetAllUsersAction $action): Collection
    {
        return $action->execute();
    }

    public function register(CreateUserAction $action, Request $request): User
    {
        return $action->execute($request->query());
    }

    public function login()
    {

    }

    public function update(UpdateUserAction $action, int $id, Request $request): User
    {
        return $action->execute($id, $request->query());
    }

    public function delete(int $id, DeleteUserAction $action): void
    {
        $action->execute($id);
    }
}
