<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class CommentResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        return [
            'id'        => $this->resource['id'],
            'body'      => $this->resource['body'],
            "_links"    => [
                'self' => [
                    'href' => sprintf('/comments/%s', $this->resource['id'])
                ]
            ],
            '_embedded' => [
                'user' => new UserResource([
                    'user_id'   => $this->resource['user_id'],
                    'user_name' => $this->resource['user_name']
                ])
            ],
        ];

    }
}
