<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SiswaDetail
 * 
 * @property $id
 * @property $user_id
 * @property $kelas
 * @property $jurusan
 * @property $tempat_lahir
 * @property $tanggal_lahir
 * @property $no_hp
 * @property $alamat
 * @property $created_at
 * @property $updated_at
 * 
 * @property User $user
 * 
 * @package App
 */
class SiswaDetail extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'siswa_detail';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [ 'user_id', 'kelas', 'jurusan', 'tempat_lahir', 'tanggal_lahir', 'no_hp', 'alamat' ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    public function isComplete(): bool
    {
        return $this->kelas && $this->jurusan && $this->tempat_lahir && $this->tanggal_lahir && $this->no_hp && $this->alamat;
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
