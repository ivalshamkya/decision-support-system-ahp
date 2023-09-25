<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Keputusan extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'keputusan';

    protected $primaryKey = 'keputusan_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'siswa_id',
        'jurusan_id',
    ];

}
