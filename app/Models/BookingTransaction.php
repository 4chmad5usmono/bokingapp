<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;


class BookingTransaction extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable =[
        'name',
        'trx_id',
        'proof',
        'phone_number',
        'is_paid',
        'total_amount',
        'store_id',
        'service_id',
        'started_at',
        'time_at',
    ];

    protected $casts = [
        'started_at' => 'date',
    ];
    
    public static function generateUniqueTrxId()
    {
        $prefix = 'SM';
        do {
            $randomString = $prefix . mt_rand(1000, 9999);
        } while (self :: where('trx_id', $randomString)->exists());

        return $randomString;
    }

    public function service_details(): BelongsTo
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

    public function store_details(): BelongsTo
    {
        return $this->belongsTo(Store::class, 'store_id');
    }



}
