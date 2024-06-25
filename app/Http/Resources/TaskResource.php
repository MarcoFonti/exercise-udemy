<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        /* CONVERTITI IN JSON QUANDO LA RISORSA VIENE RESTITUITA */
        return [
            'id' => $this->id,
            'name' => $this->name,
            'is_completed' => (bool) $this->is_completed, // Risposta booleana
        ];
    }
}
