<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MessageResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'success' => true,
            'message' => 'WhatsApp message sent successfully',
            'data' => $this->resource,
        ];
    }
}
