<?php

namespace App\Http\Controllers;

use App\Exceptions\ApiException;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserCreateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        // Вызов исключения, если пользователя нет в базе данных
        if (!Auth::attempt($request->only('telephone', 'password'))) {
            throw new ApiException('Unauthorized', 401);
        }

        // Получение информации о текущем пользователе
        $user = Auth::user();

        // Генерация нового токена
        $user->api_token = Hash::make(Str::random(60));
        $user->save();

        // Ответ с сообщением о успешном входе
        return response()->json([
            'message' =>  ''. $user->name .' успешно вошел(а) в систему!',
            'user' => $user,
            'token' => $user->api_token,
        ])->setStatusCode(200);
    }


    public function logout(Request $request)
    {
        $user = $request->user();

        if (!$user) {
            throw new ApiException('Ошибка аутентификации',401 );
        }

        $user->tokens()->delete();

        return response([
            'data' => [
                'message' => 'Вы вышли из системы',
            ],
        ]);
    }

    public function register(UserCreateRequest $request)
    {
        $validatedData = $request->validated();
        $user = User::create($validatedData);

        return response()->json([
            'message' => 'Регистрация пользователя ' . $user->name . ' прошла успешно!',
            'user' => $user
        ], 201);
    }
}
