<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Daftarbuku extends Model
{
    use HasFactory;
    protected $table = "tb_buku";
    protected $primaryKey = "bk_id";
    protected $guarded = [];
}
