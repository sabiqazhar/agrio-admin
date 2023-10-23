<?php

namespace App\Services;

use App\Http\Requests\StoreRequest;
use App\Http\Resources\StoreResource;
use App\Repositories\OwnerRepository;
use App\Repositories\StoreRepository;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreServices
{
    public function __construct(
        protected StoreRepository $storeRepository,
        protected OwnerRepository $ownerRepository
    ){}

    public function doAddStore(StoreRequest $request)
    {
        try {
            $result = $this->storeRepository->postStore(
                user_id: Auth::user()->id,
                owner_id: $request->owner_id,
                name: $request->name,
                lat: $request->lat,
                lon: $request->lon,
                address: $request->address,
                phone: $request->phone,
                active: $request->active,
            );
        } catch (\Throwable $e) {
            throw $e;
        }

        return (object) [
            'code' => Response::HTTP_OK,
            'message' => 'Berhasil menambahkan data!'
        ];
    }

    public function getTabulator(Request $request)
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

        $result = $this->storeRepository->getTabulator(
            size: ($request->has('size')) ? $request->size :10,
            filters: $filters
        );

        return (object) [
            'data' => StoreResource::collection($result)
        ];
    }

    public function doUpdateStore(int $id,StoreRequest $request)
    {
        try {
            $this->storeRepository->updateStore(
                id: $id,
                name: $request->name,
                owner_id: $request->owner_id,
                lat: $request->lat,
                lon: $request->lon,
                address: $request->address,
                phone: $request->phone,
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

    public function doDeleteStore(int $id)
    {
        try {
            $this->storeRepository->deleteStore(id: $id);
        } catch (\Throwable $e) {
            throw $e;
        }
        return (object) [
            'code' => Response::HTTP_OK,
            'message' => 'Berhasil menghapus data!'
        ];
    }

    public function doGetOwner()
    {
        $owner = $this->ownerRepository->getAllOwner();
        return compact('owner');
    }

    public function doGetStoreById(int $id)
    {
        $result = $this->storeRepository->getStoreById(id: $id);

        return (object) [
            "data" => new StoreResource($result)
        ];
    }

    public function doCountStore()
    {
        $stores = $this->storeRepository->countStore();

        return compact('stores');
    }
}
