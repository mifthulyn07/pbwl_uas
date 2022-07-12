<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Daftarpenjualan extends Model
{
    use HasFactory;
    protected $table = "tb_jual";
    protected $primaryKey = "jual_id";
    protected $guarded = [];
}
