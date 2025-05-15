<?php
namespace App\Filament\Resources\BlogResource\Api\Transformers;
 
use Illuminate\Http\Resources\Json\JsonResource;
 
class BlogTransformer extends JsonResource
{
 
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return $this->resource->toArray();
 
        // or
 
        return md5(json_encode($this->resource->toArray()));
    }
}