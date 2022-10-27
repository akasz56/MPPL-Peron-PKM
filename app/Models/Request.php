<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'status',
        'user_id',
        'vacancy_id',
    ];

    public function vacancy()
    {
        return $this->belongsTo(Vacancy::class);
    }

    public function author()
    {
        return $this->belongsTo(Developer::class);
    }
}
