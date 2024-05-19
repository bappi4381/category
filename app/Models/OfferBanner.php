<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfferBanner extends Model
{
    use HasFactory;
    protected $fillable = ['offer_banner_title', 'offer_info', 'offer_image',];
}
