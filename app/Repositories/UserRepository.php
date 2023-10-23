<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;

class UserRepository
{
    public function getTabulator(int $size = 10, array $filters = [])
    {
        $user = User::latest();

        foreach ($filters as $key => $value) {
            if ($key == 'value' && $value) {
                $user->where('name', 'like', "%{$value}%");
            }
        }
        return $user->paginate($size);
    }

    public function getUserById(int $id)
    {
        return User::where('id', $id)->first();
    }

    public function postUser(string $name, string $email, string $password, int $roles, int $active)
    {
        DB::beginTransaction();
        try {
            $saveUser = User::create([
                'name' => $name,
                'email' => $email,
                'password' => $password,
                'roles' => $roles,
                'active' => $active
            ]);
        } catch (\Throwable $e) {
            DB::rollBack();
            throw $e;
        }
        DB::commit();

        return $saveUser;
    }

    public function updateUser(int $id, string $name, string $email, int $roles, int $active)
    {
        DB::beginTransaction();
        try {
            $user = $this->getUserById(id: $id);
            if (!$user) {
                throw new ModelNotFoundException();
            }

            $user->name = $name;
            $user->email = $email;
            $user->roles = $roles;
            $user->active = $active;

            $user->save();
        } catch (\Throwable $e) {
            DB::rollBack();
            throw $e;
        }
        DB::commit();

        return $user;
    }

    public function deleteUser(int $id)
    {
        DB::beginTransaction();
        try {
            $user = $this->getUserById(id: $id);
            if (!$user) {
                throw new ModelNotFoundException();
            }

            $user->delete();
        } catch (\Throwable $e) {
            DB::rollBack();
            throw $e;
        }
        DB::commit();

        return $user;
    }

    public function updatePassword(int $id, string $password)
    {
        DB::beginTransaction();
        try {
            $user = $this->getUserById(id: $id);
            if (!$user) {
                throw new ModelNotFoundException();
            }

            $user->password = bcrypt($password);

            $user->save();
        } catch (\Throwable $e) {
            DB::rollBack();
            throw $e;
        }
        DB::commit();

        return $user;
    }
}
