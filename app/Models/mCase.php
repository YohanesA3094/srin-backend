<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mCase extends Model
{
    use HasFactory;

    public function region()
    {
        return $this->hasOne(mRegion::class, 'city', 'city');
    }
}
