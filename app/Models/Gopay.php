<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gopay extends Model
{
    //
    protected $table = 'gopays';
    protected $primaryKey = 'id';
    protected $fillable = ['nama', 'nomor_telepon'];
}
