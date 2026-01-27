<?php

namespace App\Http\Resources;

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
        $idioma['Idiomas'] = IdiomaResource::collection($this->idiomas);
        unset($idioma['created_at']);
        unset($idioma['updated_at']);
        return $idioma;
    }
}
