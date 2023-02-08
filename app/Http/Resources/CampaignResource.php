<?php

namespace App\Http\Resources;

use Illuminate\Support\Facades\URL;
use Illuminate\Http\Resources\Json\JsonResource;

class CampaignResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'from_date'=>$this->from_date,
            'to_date'=>$this->to_date,
            'total_budget'=>$this->total_budget,
            'daily_budget'=>$this->daily_budget,
            'image'=>$this->image,
            'updated_at'=>$this->updated_at,
            'created_at'=>$this->created_at,
        ];
    }
}
