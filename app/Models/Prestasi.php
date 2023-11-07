<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    use HasFactory;
    protected $fillable = ['name','nisn','kelas','juara','lomba','penyelenggara','tingkat','tanggal'];
}
