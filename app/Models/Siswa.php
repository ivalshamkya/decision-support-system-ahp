<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Siswa extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'siswa';

    protected $primaryKey = 'siswa_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nis', 'nama', 'matematika', 'indonesia', 'inggris', 'biologi', 'ekonomi', 'minat_siswa', 'kelas_id'
    ];

}
