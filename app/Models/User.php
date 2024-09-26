<?php

namespace App\Models;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User
 *
 * @property $id
 * @property $name
 * @property $email
 * @property $email_verified_at
 * @property $password
 * @property $remember_token
 * @property $created_at
 * @property $updated_at
 *
 * @property Assessment[] $assessments
 * @property SiswaDetail[] $siswaDetails
 * @property UserLearningStyle[] $userLearningStyles
 * @package App
 */
class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The number of models to return for pagination.
     *
     * @var int
     */
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array<int, string>
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<int, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Determine if the user has the given role.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function isAdmin()
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
            if ($this->siswaDetails) {
                return $this->siswaDetails->isComplete();
            } 

            return false;
        }

        return true;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function assessments()
    {
        return $this->hasMany(\App\Models\Assessment::class, 'id', 'user_id')->orderBy('created_at', 'desc');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function siswaDetails()
    {
        return $this->hasOne(\App\Models\SiswaDetail::class, 'id', 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function userLearningStyles()
    {
        return $this->hasMany(\App\Models\UserLearningStyle::class, 'id', 'user_id');
    }
}
