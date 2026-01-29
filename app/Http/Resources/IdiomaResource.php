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
       return [
           'id' => $this->id,
           'alpha2' => $this->alpha2,
           'alpha3t' => $this->alpha3t,
           'alpha3b' => $this->alpha3b,
           'english_name' => $this->english_name,
           'native_name' => $this->native_name,
       ];
    }
}
