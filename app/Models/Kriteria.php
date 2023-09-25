<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Kriteria extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'kriteria';

    protected $primaryKey = 'kriteria_id';

    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'kriteria_id',
        'nama_kriteria',
    ];

}
