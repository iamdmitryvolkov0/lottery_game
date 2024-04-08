<?php

namespace App\Actions\UserActions;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class CreateUserAction
{
    public function execute(array $data): JsonResponse|User
    {
        $validator = Validator::make($data, [
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'email' => ['required', 'string', 'email'],
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
        ]);
    }
}
