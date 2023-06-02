<?php

namespace Sticket\Src\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TicketResource extends JsonResource
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
            'title' => $this->title,
            'user' => new UserResource($this->user),
            'category' => new CategoryResource($this->category),
            'priority' => $this->priority,
            'status' => $this->status,
            'messages' => $this->mergeWhen(!empty($this->messages()->count()), MessageResource::collection($this->messages)),
            'created_at' => $this->created_at,
            'closed_at' => $this->closed_at
        ];
    }
}
