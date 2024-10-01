<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $nama
 * @property string $jk
 * @property \Illuminate\Support\Carbon $tgl_lahir
 * @property string $jurusan
 * @property int $kelas
 * @property float $mtk
 * @property float $pjok
 * @property float $visual
 * @property float $auditori
 * @property float $kinestetik
 * @property float $skor
 * @property string|null $label
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|Dataset getDataAttribute($withOutName = false)
 * @method static \Illuminate\Database\Eloquent\Builder|Dataset getLabelAttribute()
 * @method static \Illuminate\Database\Eloquent\Builder|Dataset newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Dataset newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Dataset query()
 * @method static \Illuminate\Database\Eloquent\Builder|Dataset whereAuditori($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dataset whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dataset whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dataset whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dataset whereJk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dataset whereJurusan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dataset whereKelas($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dataset whereKinestetik($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dataset whereLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dataset whereMtk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dataset whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dataset wherePjok($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dataset whereSkor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dataset whereTglLahir($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dataset whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dataset whereVisual($value)
 * @mixin \Eloquent
 * @mixin IdeHelperDataset
 */
class Dataset extends Model
{
    use HasFactory;

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

    /**
     * Scope get the label attribute.
     */
    public function scopeGetLabelAttribute($query)
    {
        return $query->select('label');
    }

    /**
     * Scope get the data attribute.
     */
    public function scopeGetDataAttribute($query, $withOutName = false)
    {
        $columns = ['jk', 'tgl_lahir', 'jurusan', 'kelas', 'mtk', 'pjok', 'visual', 'auditori', 'kinestetik', 'skor', 'label'];
        
        if (!$withOutName) {
            array_unshift($columns, 'nama');
        }

        return $query->select($columns);
    }
}
