<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category_task_id',
        'task_name',
    ];
    
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    
    public function m_category_task(): HasMany
    {
        return $this->hasMany(M_category_task::class);
    }
}