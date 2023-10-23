<?php

namespace App\Repositories;

use App\Models\Owner;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;

class OwnerRepository
{
    public function getAllOwner()
    {
        return Owner::latest()->get();
    }

    public function getTabulator(int $size = 10, array $filters = [])
    {
        $owner = Owner::latest();

        foreach ($filters as $key => $value) {
            if ($key == 'value' && $value) {
                $owner->where('name', 'like', "%{$value}%");
            }
        }

        return $owner->paginate($size);
    }

    public function getOwnerById(int $id)
    {
        return Owner::where('id', $id)->first();
    }

    public function postOwner(string $name, string $email, string $ktp, string $phone)
    {
        DB::beginTransaction();
        try {
            $saveOwner = Owner::create([
                'name' => $name,
                'email' => $email,
                'ktp' => $ktp,
                'phone' => $phone
            ]);
        } catch (\Throwable $e) {
            DB::rollBack();
            throw $e;
        }
        DB::commit();

        return $saveOwner;
    }

    public function updateOwner(int $id, string $name, string $email, string $ktp, string $phone)
    {

        DB::beginTransaction();
        try {
            $owners = $this->getOwnerById(id: $id);
            if (!$owners) {
                throw new ModelNotFoundException();
            }

            $owners->name = $name;
            $owners->email = $email;
            $owners->ktp = $ktp;
            $owners->phone = $phone;

            $owners->save();
        } catch (\Throwable $e) {
            DB::rollBack();
            throw $e;
        }
        DB::commit();

        return $owners;
    }

    public function deleteOwner(int $id)
    {
        DB::beginTransaction();
        try {
            $owners = $this->getOwnerById(id: $id);
            if (!$owners) {
                throw new ModelNotFoundException;
            }

            $owners->delete();
        } catch (\Throwable $e) {
            DB::rollBack();
            throw $e;
        }
        DB::commit();

        return $owners;
    }

    public function countOwner()
    {
        return Owner::all()->count();
    }
}
