<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Jurusan extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'jurusan';

    protected $primaryKey = 'jurusan_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'kode_jurusan',
        'nama_jurusan',
    ];

}
