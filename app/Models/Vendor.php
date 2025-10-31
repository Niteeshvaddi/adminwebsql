<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;

    protected $table = 'vendors';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'title',
        'walletAmount',
        'latitude',
        'longitude',
        'phonenumber',
        'description',
        'reviewsCount',
        'categoryPhoto',
        'photos',
        'createdAt',
        'location',
        'isOpen',
        'author',
        'adminCommission'
    ];

    protected $casts = [
        'latitude' => 'float',
        'longitude' => 'float',
        'reviewsCount' => 'float',
        'reviewsSum' => 'float',
        'isOpen' => 'boolean',
        'specialDiscountEnable' => 'boolean',
        'enabledDiveInFuture' => 'boolean',
        'DeliveryCharge' => 'boolean',
        'isSelfDelivery' => 'boolean',
        'hidephotos' => 'boolean',
        'reststatus' => 'boolean'
    ];

    public function payouts()
    {
        return $this->hasMany(Payout::class, 'vendorID', 'id');
    }

    public function users()
    {
        return $this->hasMany(AppUser::class, 'vendorID', 'id');
    }
}
