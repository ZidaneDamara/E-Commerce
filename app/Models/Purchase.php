<?php

namespace App\Models;

use App\Models\Supplier;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Purchase extends Model
{  
    use HasFactory;

    public function supplier(): BelongsTo
    {
        return $this->belongsTo(Supplier::class);
    }
}