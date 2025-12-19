<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    /** @use HasFactory<\Database\Factories\AboutUsFactory> */
    use HasFactory;
    protected $table = 'about_us';
    protected $primaryKey = 'id';
    protected $fillable = [
        'orientation',
        'orientation_image',
        'kadjoetangan_history',
        'kadjoetangan_image',
        'vision',
        'mission'
    ];
}
