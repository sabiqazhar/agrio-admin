<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\OwnerRequest;
use App\Http\Resources\OwnerResource;
use App\Repositories\OwnerRepository;

class OwnerServices
{
    public function __construct(protected OwnerRepository $ownerRepository){}

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

        $result = $this->ownerRepository->getTabulator(
            size: ($request->has('size')) ? $request->size :10,
            filters: $filters
        );

        return (object) [
            'data' => OwnerResource::collection($result)
        ];
    }

    public function doAddOwner(OwnerRequest $request)
    {
        try {
            $result = $this->ownerRepository->postOwner(
                name: $request->name,
                email: $request->email,
                ktp: $request->ktp,
                phone: $request->phone
            );
        } catch (\Throwable $e) {
            throw $e;
        }

        return (object) [
            'code' => Response::HTTP_OK,
            'message' => 'Berhasil menambahkan data!'
        ];
    }

    public function doUpdateOwner(int $id, OwnerRequest $request)
    {
        try {
            $this->ownerRepository->updateOwner(
                id: $id,
                name: $request->name,
                email: $request->email,
                ktp: $request->ktp,
                phone: $request->phone
            );
        } catch (\Throwable $e) {
            throw $e;
        }
        return (object) [
            'code' => Response::HTTP_OK,
            'message' => 'Berhasil mengubah data!'
        ];
    }

    public function doDeleteOwner(int $id)
    {
        try {
            $this->ownerRepository->deleteOwner(id: $id);
        } catch (\Throwable $e) {
            throw $e;
        }
        return (object) [
            'code' => Response::HTTP_OK,
            'message' => 'Berhasil menghapus data!'
        ];
    }

    public function doGetOwnerById($id)
    {
        $result = $this->ownerRepository->getOwnerById(id: $id);

        return (object) [
            "data" => new OwnerResource($result)
        ];
    }

    public function doOwnerCount()
    {
        $owners = $this->ownerRepository->countOwner();

        return compact('owners');
    }
}
