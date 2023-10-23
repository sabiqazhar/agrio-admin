<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'roles_id' => $this->roles,
            'roles' => $this->roles == "99" ? "Super Admin" : "Admin",
            'status' => $this->active,
            'active' => $this->active == 1 ? 'Aktif' : 'Tidak Aktif',
            "detail_url" => route('admin.detail', ['id'=>$this->id]),
            "update_url" => route('admin.update', ['id' =>$this->id]),
            "delete_url" => route('admin.delete', ['id' =>$this->id]),
            "password_url" => route('admin.update-password', ['id' =>$this->id])
        ];
    }
}
