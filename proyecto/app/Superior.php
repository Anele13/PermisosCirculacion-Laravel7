<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Superior extends Model
{
    public function get()
    {
        $superiores = Superior::get();
        $superioresArray[''] = '';
        foreach ($superiores as $superior) {
            $superioresArray[$superior->id] = $superior->nombre;
        }
        return $superioresArray;
    }
}