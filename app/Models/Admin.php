<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    // Specify the table associated with the model
    protected $table = 'admin'; // Pastikan ini adalah nama tabel yang benar

    protected $primaryKey = 'id_admin';

    // Timestamps aktif
    public $timestamps = true;

    // The attributes that are mass assignable
    protected $fillable = [
        'nama',
        'email',
        'nomor_telepon',
        'alamat',
        'tanggal_bergabung',
        'id_user',
    ];

    // Cast attributes
    protected $casts = [
        'tanggal_bergabung' => 'date',
    ];

    // Define relationship with User model
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
