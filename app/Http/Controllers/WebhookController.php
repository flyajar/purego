<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;
use Luigel\Paymongo\Facades\Paymongo;

class WebhookController extends Controller
{
    public function charge(Request $request)
    {
        $data = Arr::get($request->all(), 'data.attributes');

        if ($data['type'] !== 'source.chargeable') {
            return response('Unknown type', 422);
        }

        $source = Arr::get($data, 'data');
        $sourceData = $source['attributes'];
        Log::info([$source]);
        Log::info([$sourceData]);
        $donation = Donation::where('source_id',  $source['id'])->firstOrFail();

        if ((float) $sourceData['amount']/100 !== (float) $donation->total || $sourceData['currency'] !== 'PHP') {
            return response('Amount doesn\'t match.', 422);
        }

        if ($sourceData['status'] !== 'chargeable') {
            return response()->noContent();
        }

        $payment = Paymongo::payment()->create($donation->paymongoPayment($source));

        $donation->update(['payment_id' => $payment->id]);
        $donation->setStatus('received');

        return response()->noContent();
    }
}
