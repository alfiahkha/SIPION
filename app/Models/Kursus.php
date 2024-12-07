<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kursus extends Model
{
        use HasFactory;
    
        /**
         * The table associated with the model.
         *
         * @var string
         */
        protected $table = 'kursus';
        protected $primaryKey = 'id_kursus'; // Change this line

        /**
         * The attributes that are mass assignable.
         *
         * @var array<int, string>
         */
        protected $fillable = [
            'nama_kursus',
            'deskripsi',
            'durasi',
            'harga',
        ];
    
        /**
         * The attributes that should be cast.
         *
         * @return array<string, string>
         */
        protected $casts = [
            'durasi' => 'float',
            'harga' => 'decimal:2', // casting harga to decimal with 2 decimal points
        ];
}
    