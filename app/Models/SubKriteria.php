<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class SubKriteria extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'sub_kriteria';

    protected $primaryKey = 'sub_kriteria_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'sub_kriteria',
        'bobot',
    ];

}
