<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_category_task extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_task_name',
    ];

    public function task(): BelongsTo
    {
        return $this->belongsTo(Task::class);
    }
}
