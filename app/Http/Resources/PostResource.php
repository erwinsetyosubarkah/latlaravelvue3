<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PostResource extends ResourceCollection
{
  /**
   * Transform the resource collection into an array.
   *
   * @return array<int|string, mixed>
   */
  public function toArray(Request $request): array
  {

    $data = [
      'id'=> $this->id,
      'title' => $this->v_title,
      'image' => $this->v_image,
      'content' => $this->tx_content,
    ];

      return $data;

  }
}
