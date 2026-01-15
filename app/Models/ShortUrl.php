<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShortUrl extends Model
{
    use HasFactory;

    protected $table = 'short_urls';

    protected $primaryKey = 'id';

    public $timestamps = false;


    protected $fillable = [
        'original_url',
        'short_code',
        'clicks'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}