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
 * @property User $user
 * @package App
 * @method static \Illuminate\Database\Eloquent\Builder|SiswaDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SiswaDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SiswaDetail query()
 * @method static \Illuminate\Database\Eloquent\Builder|SiswaDetail whereAlamat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SiswaDetail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SiswaDetail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SiswaDetail whereJurusan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SiswaDetail whereKelas($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SiswaDetail whereNoHp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SiswaDetail whereTanggalLahir($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SiswaDetail whereTempatLahir($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SiswaDetail whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SiswaDetail whereUserId($value)
 * @mixin \Eloquent
 * @mixin IdeHelperSiswaDetail
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

    // cast tgl_lahir to date
    protected $casts = [
        'tanggal_lahir' => 'date',
    ];

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
