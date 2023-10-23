<?php

namespace App\Services;

use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserServices
{
    public function __construct(protected UserRepository $userRepository){}

    public function doGetTabulator(Request $request)
    {
        $filters = [
            'name' => null
        ];

        if ($request->has('filter')){
            foreach ($request->get('filter') as $filter) {
                if($filter['value'] != null && $filter['value'] != ""){
                    $filters[$filter['field']] = $filter['value'];
                }
            }
        }

        $result = $this->userRepository->getTabulator(
            size: ($request->has('size')) ? $request->size :10,
            filters: $filters
        );

        return (object) [
            'data' => UserResource::collection($result)
        ];
    }

    public function doGetUserById(int $id)
    {
        $result = $this->userRepository->getUserById(id: $id);

        return (object) [
            "data" => new UserResource($result)
        ];
    }

    public function doAddUser(UserRequest $request)
    {
        try {
            $result = $this->userRepository->postUser(
                name: $request->name,
                email: $request->email,
                password: $request->password,
                roles: $request->roles,
                active: $request->active
            );
        } catch (\Throwable $e) {
            throw $e;
        }

        return (object) [
            'code' => Response::HTTP_OK,
            'message' => 'Berhasil menambahkan data!'
        ];
    }

    public function doUpdateUser(int $id, Request $request)
    {
        try {
            $result = $this->userRepository->updateUser(
                id: $id,
                name: $request->name,
                email: $request->email,
                roles: $request->roles,
                active: $request->active
            );
        } catch (\Throwable $e) {
            throw $e;
        }

        return (object) [
            'code' => Response::HTTP_OK,
            'message' => 'Berhasil mengubah data!'
        ];
    }

    public function doUpdatePassword(int $id, Request $request)
    {
        try {
            $result = $this->userRepository->updatePassword(
                id: $id,
                password: $request->password,
            );
        } catch (\Throwable $e) {
            throw $e;
        }

        return (object) [
            'code' => Response::HTTP_OK,
            'message' => 'Berhasil mengubah data!'
        ];
    }

    public function doDeleteUser(int $id)
    {
        try {
            $result = $this->userRepository->deleteUser(id: $id);
        } catch (\Throwable $e) {
            throw $e;
        }

        return (object) [
            'code' => Response::HTTP_OK,
            'message' => 'Berhasil menghapus data!'
        ];
    }
}
