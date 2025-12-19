<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QRISCodes extends Model
{
    //
    protected $table = 'qris_codes';
    protected $primaryKey = 'id';
    protected $fillable = ['nmid', 'nama_merchant', 'qris_image'];
}
