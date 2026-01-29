<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class IdiomaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $idioma = parent::toArray($request);
        $idioma['users_idiomas'] = new UserIdiomaResource($this->userIdiomas);
        return $idioma;
    }
}
