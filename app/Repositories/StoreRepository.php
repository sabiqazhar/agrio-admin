<?php

namespace App\Repositories;

use App\Models\Store;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;

class StoreRepository
{
    public function postStore(int $owner_id, string $name, string $lat, string $lon, string $address, string $phone, int $active, int $user_id)
    {
        DB::beginTransaction();
        try {
            $saveStore = Store::create([
                'user_id' => $user_id,
                'owner_id' => $owner_id,
                'name' => $name,
                'lat' => $lat,
                'lon' => $lon,
                'address' => $address,
                'phone' =>$phone,
                'active' => $active
            ]);
        } catch (\Throwable $e) {
            DB::rollBack();
            throw $e;
        }
        DB::commit();

        return $saveStore;
    }

    public function getTabulator(int $size = 10, array $filters = [])
    {
        $store = Store::latest()->with(['user', 'owner']);

        foreach ($filters as $key => $value) {
            if ($key == 'value' && $value) {
                $store->where('name', 'like', "%{$value}%");
            }
        }

        return $store->paginate($size);
    }

    public function getStoreById(int $id)
    {
        return Store::where('id', $id)->first();
    }

    public function updateStore(int $id, string $name, int $owner_id, string $lat, string $lon, string $address, string $phone, int $active)
    {
        DB::beginTransaction();
        try {
            $stores = $this->getStoreById(id: $id);
            if (!$stores) {
                throw new ModelNotFoundException;
            }

            $stores->name = $name;
            $stores->owner_id = $owner_id;
            $stores->lat = $lat;
            $stores->lon = $lon;
            $stores->phone = $phone;
            $stores->address = $address;
            $stores->active = $active;

            $stores->save();
        } catch (\Throwable $e) {
            DB::rollBack();
            throw $e;
        }
        DB::commit();

        return $stores;
    }

    public function deleteStore(int $id)
    {
        DB::beginTransaction();
        try {
            $stores = $this->getStoreById(id: $id);
            if (!$stores) {
                throw new ModelNotFoundException;
            }

            $stores->delete();
        } catch (\Throwable $e) {
            DB::rollBack();
            throw $e;
        }
        DB::commit();

        return $stores;
    }

    public function countStore()
    {
        return Store::all()->count();
    }
}
