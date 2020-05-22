<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Product;

class productResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // $product = new Product();
    //    return[
    //        'id' => $request->id,
    //         'vendor_id' => $request->vendor_id,
    //         'sku' => $request->sku,
    //         'request' => $request->product,
    //         'material' => $request->material,
    //         'description' => $request->description,
    //         'requestImage' => $request->productImage,
    //         'price' => $request->price,
    //         'discount' => $request->discount,
    //         'status' => $request->status
    //    ];
    return parent::toArray($request);
    }
}
