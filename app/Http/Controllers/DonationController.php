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
        try {
            $source = Paymongo::source()->create([
                'type' => 'gcash',
                'amount' => $data['amount'],
                'currency' => 'PHP',
                'redirect' => [
                    'success' => config('app.url') . 'success',
                    'failed' => config('app.url') . 'failed'
                ],
                'billing' => [
                    'email' => 'donations@purego.com',
                    'name' => 'purego'
                ]
            ]);
           $donation =  Donation::query()->create([
                'source_id' => $source->id,
                'type' => 'gcash',
                'amount' => $data['amount']
            ]);

           $donation->setStatus('pending');

            return redirect($source->getRedirect()['checkout_url']);
        }catch (\Exception $exception) {
            toast('There\'s a problem with your donation. Please try again later','error');
            return redirect('/');
        }
    }
}
