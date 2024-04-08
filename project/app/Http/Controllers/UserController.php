<?php

namespace App\Http\Controllers;


use App\Actions\UserActions\CreateUserAction;
use App\Actions\UserActions\DeleteUserAction;
use App\Actions\UserActions\GetAllUsersAction;
use App\Actions\UserActions\UpdateUserAction;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getAllUsers(GetAllUsersAction $action): Collection
    {
        return $action->execute();
    }

    public function register(CreateUserAction $action, Request $request): JsonResponse|User
    {
        return $action->execute($request->query());
    }

    public function login()
    {

    }

    public function update(UpdateUserAction $action, int $id, Request $request): JsonResponse|User
    {
        return $action->execute($id, $request->query());
    }

    public function delete(int $id, DeleteUserAction $action): void
    {
        $action->execute($id);
    }
}
