<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Dataset
 *
 * @property $id
 * @property $nama
 * @property $jk
 * @property $tgl_lahir
 * @property $jurusan
 * @property $kelas
 * @property $mtk
 * @property $pjok
 * @property $visual
 * @property $auditori
 * @property $kinestetik
 * @property $skor
 * @property $label
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 *
 * @package App
 */
class Dataset extends Model
{
    use SoftDeletes;

    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['nama', 'jk', 'tgl_lahir', 'jurusan', 'kelas', 'mtk', 'pjok', 'visual', 'auditori', 'kinestetik', 'skor', 'label'];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'tgl_lahir' => 'date',
        'kelas'     => 'integer',
    ];
}
