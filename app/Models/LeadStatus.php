<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class LeadStatus extends Model
{
    use HasFactory;

    protected $table = 'lead_statuses';

    public function Leads(): HasMany
    {
        return $this->hasMany(Leads::class);
    }
}
