<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OwnerResource extends JsonResource
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
            "email" => $this->email,
            "phone" => $this->phone,
            "ktp" => $this->ktp,
            "detail_url" => route('owner.detail', ['id' => $this->id]),
            "update_url" => route('owner.update', ['id' => $this->id]),
            "delete_url" => route('owner.delete', ['id' => $this->id])
        ];
    }
}
