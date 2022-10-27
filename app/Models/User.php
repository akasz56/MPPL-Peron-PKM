<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Helpers\Variables;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use function PHPUnit\Framework\isEmpty;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'password',
        'avatar',
        'name',
        'NIM',
        'role',
        'faculty_id',
        'department_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function isCreator()
    {
        return $this->role == Variables::ROLE_CREATOR;
    }

    public function isDeveloper()
    {
        return $this->role == Variables::ROLE_DEVELOPER;
    }

    public function requests()
    {
        return $this->hasMany(Request::class);
    }

    public function vacancies()
    {
        return $this->hasMany(Vacancy::class);
    }

    public function hasRequested($vacancy_id)
    {
        return $this->requests()
            ->where('vacancy_id', $vacancy_id)
            ->get()
            ->isNotEmpty();
    }
}
