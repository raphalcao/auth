<?php

namespace App\Repository;

use  App\Contracts\Repositories\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Carbon\Carbon;


class UserRepository implements UserRepositoryInterface
{
    /**
     * Insere um novo usuário no banco de dados.
     *
     * @param string $cognitoUserId
     * @param string $email
     * @param string $password
     * @param string $name
     * @param array $data
     * @return string
     */
    public function insert(string $cognitoUserId, string $email, string $password, string $name, $data): string
    {
        try {
            User::create([
                'cognito_user_id' => $cognitoUserId,
                'email' => $email,
                'password' =>  Hash::make($password),
                'email_verified_at' => Carbon::now('America/Sao_Paulo'),
                'name' => $name,
            ]);

            return 'user registered successfully!';
        } catch (\Exception $e) {
            return 'error inserting user: ' . $e->getMessage();
        }
    }
}
