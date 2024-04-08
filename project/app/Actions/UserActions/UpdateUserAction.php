<?php

namespace App\Actions\UserActions;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class UpdateUserAction
{
    public function execute(int $id, array $data): JsonResponse|User
    {
        $user = User::findOrFail($id);

        $validator = Validator::make($data, [
            'first_name' => ['sometimes', 'string'],
            'last_name' => ['sometimes', 'string'],
            'email' => ['sometimes', 'string', 'email'],
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $user->update([
            'first_name' => $data['first_name'] ?? $user->first_name,
            'last_name' => $data['last_name'] ?? $user->last_name,
            'email' => $data['email'] ?? $user->email,
        ]);

        return $user;
    }
}
