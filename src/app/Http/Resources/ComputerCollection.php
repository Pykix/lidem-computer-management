<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ComputerCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        return [
            'data' => ComputerResource::collection($this->collection),
            'pagination' => [
                'total' => $this->total(),
                'count' => $this->count(),
                'next_page' => $this->nextPageUrl(),
                'previous_page' => $this->previousPageUrl(),
                'total_pages' => $this->lastPage()
            ]
        ];
    }

    // public function withResponse($request, $response)
    // {
    //     $jsonResponse = json_decode($response->getContent(), true);
    //     unset($jsonResponse['links'], $jsonResponse['meta']);
    //     $response->setContent(json_encode($jsonResponse));
    // }
}
