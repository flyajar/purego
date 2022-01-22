<?php

namespace App\Http\Controllers;

use App\Http\Requests\DonationRequest;
use App\Models\Donation;
use Luigel\Paymongo\Facades\Paymongo;

class DonationController extends Controller
{
    public function store(DonationRequest $request)
    {
        $data = $request->validated();

        $source = Paymongo::source()->create([
            'type' => 'gcash',
            'amount' => $data['amount'],
            'currency' => 'PHP',
            'redirect' => [
                'success' => 'https://your-domain.com/success',
                'failed' => 'https://your-domain.com/failed'
            ],
            'billing' => [
                'email' => 'donations@aigo.com',
                'name' => 'aigo'
            ]
        ]);

//        Donation::query()->create([
//            'source_id' => $source->id,
//            'type' => 'gcash',
//            'amount' => $data['amount']
//        ]);

        return redirect($source->getRedirect()['checkout_url']);
    }
}
