<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StoreResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "address" => $this->address,
            "lat" => $this->lat,
            "lon" => $this->lon,
            "phone" => $this->phone,
            "user" => $this->user->name,
            "owner_id" => $this->owner->id,
            "owner" => $this->owner->name,
            "status" => $this->active,
            "active" => $this->active == 1 ? 'Aktif' : 'Tidak aktif',
            "detail_url" => route('store.detail', ['id'=>$this->id]),
            "update_url" => route('store.update', ['id' =>$this->id]),
            "delete_url" => route('store.delete', ['id' =>$this->id])
        ];
    }
}
