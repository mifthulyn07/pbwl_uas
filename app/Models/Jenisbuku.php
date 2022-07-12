<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenisbuku extends Model
{
    use HasFactory;
    protected $table = "tb_jenis";
    protected $primaryKey = "jns_id";
    protected $guarded = [];
}
