<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'stock' => $this->stock,
            'category' => new CategoryResource($this->whenLoaded('category')), // Возвращаем связанные данные о категории
            'image_url' => $this->image_url, // Если есть поле с URL изображения
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
