<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(): JsonResponse
    {
        $users = User::orderBy('id', 'DESC')->get();
        return response()->json([
            'status' => true,
            'users' => $users,
        ], 200);
    }

    public function show(User $user): JsonResponse
    {
        return response()->json([
            'status' => true,
            'user' => $user,
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6',
        ]);

        $user = User::create($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Usuário criado com sucesso.',
            'user' => $user,
        ], 201);
    }

    public function update(Request $request, User $user): JsonResponse
    {
        $request->validate([
            'name' => 'string',
            'email' => 'email|unique:users,email,' . $user->id,
            'password' => 'string|min:6',
        ]);

        $user->update($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Usuário atualizado com sucesso.',
            'user' => $user,
        ]);
    }

    public function destroy(User $user): JsonResponse
    {
        $user->delete();

        return response()->json([
            'status' => true,
            'message' => 'Usuário excluído com sucesso.',
        ]);
    }
}
