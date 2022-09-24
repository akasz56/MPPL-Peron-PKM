<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'title_desc',
        'requirement_desc',
        'creator_id',
        'period_id',
    ];

    public function author()
    {
        return $this->belongsTo(Creator::class);
    }

    public function member()
    {
        return $this->hasMany(Developer::class);
    }

    public function requests()
    {
        return $this->hasMany(Request::class);
    }

    public function period()
    {
        return $this->belongsTo(Period::class);
    }

    public function keywords()
    {
        return $this->hasMany(Keyword::class);
    }
}
