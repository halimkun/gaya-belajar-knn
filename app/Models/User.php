<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Determine if the user is an administrator.
     *
     * @return bool
     */
    public function isAdmin(): bool
    {
        return $this->hasRole('admin');
    }

    /**
     * Determine if the user is a siswa.
     *
     * @return bool
     */
    public function isDetailComplete(): bool
    {
        if ($this->hasRole('siswa')) {
            return $this->siswaDetail->isComplete();
        }

        return true;
    }


    /**
     * Get the siswa detail associated with the user.
     */
    public function siswaDetail()
    {
        return $this->hasOne(SiswaDetail::class);
    }

    /**
     * Get the assessments for the user.
     */
    public function assessments()
    {
        return $this->hasMany(Assessment::class)->orderBy('created_at', 'desc');
    }

    /**
     * Get the user learning styles for the user.
     */
    public function userLearningStyles()
    {
        return $this->hasMany(UserLearningStyle::class);
    }
}
