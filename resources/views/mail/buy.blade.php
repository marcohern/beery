Buy Request by {{ $buyRequest->name }} <{{$buyRequest->email}}>:

{{ $buyRequest->qty }} x {{ ($buyRequest->flavor == 'surprise-me') ? 'Surprise Me':config("beery.flavors.$buyRequest->flavor") }}

{{ $buyRequest->comments }}
