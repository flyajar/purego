<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\ModelStatus\HasStatuses;

class Donation extends Model
{
    use HasFactory;
    use HasStatuses;

    protected $fillable = [
        'amount',
        'source_id',
        'payment_id',
        'type',
    ];

    public function paymongoPayment(array $source)
    {
        $sourceData = $source['attributes'];

        return [
            'amount' => $sourceData['amount'] / 100,
            'currency' => $sourceData['currency'],
            'description' => '',
            'source' => [
                'id' => $source['id'],
                'type' => $source['type'],
            ]
        ];
    }
}
