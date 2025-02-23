<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'presensi';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id_presensi';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama',
        'nomor_induk',
        'tanggal_presensi',
        'waktu_presensi',
        'status',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * Define relationships.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
