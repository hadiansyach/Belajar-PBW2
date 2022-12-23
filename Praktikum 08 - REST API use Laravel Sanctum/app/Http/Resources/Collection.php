<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class Collection extends JsonResource
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
            'id' => $this->id,
            'namaKoleksi' => $this->namaKoleksi,
            'jenisKoleksi' => $this->jenisKoleksi,
            'jumlahAwal' => $this->jumlahAwal,
            'jumlahSisa' => $this->jumlahSisa,
            'jumlahKeluar' => $this->jumlahKeluar,
        ];
    }
}
