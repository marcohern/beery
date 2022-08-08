Buy Request by {{ $buyRequest->name }} <{{$buyRequest->email}}>:

{{ ($buyRequest->flavor == 'surprise-me') ? 'Surprise Me':config("beery.flavors.$buyRequest->flavor") }} x{{ $buyRequest->qty }}

{{ $buyRequest->comments }}

My phone is {{ $buyRequest->phone }}.
