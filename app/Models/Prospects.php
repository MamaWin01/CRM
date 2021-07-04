<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prospects extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function contact()
    {
        return $this->hasOne(\App\Models\ProspectContact::class);
    }
}
