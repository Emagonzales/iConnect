<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class Users extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
        public function toArray($request)
    {
        return [
            'id' => $this->id,
            'email' => $this->email,
            'cognome'=>$this->cognome,
            'nome' => $this->nome,
        ];
    }
    public $preserveKeys = true;

}
