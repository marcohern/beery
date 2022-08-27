Buy Request by {{ $order->name }} <{{$order->email}}>:

@foreach ($details as $detail)
    {{$flavors[$detail->flavor_id]->name}}....{{$detail->qty}}x{{$detail->unit_price}}: ${{$detail->subtotal}}
@endforeach
Total: {{$order->total_price}}

{{ $order->comments }}

My phone is {{ $order->phone }}.
