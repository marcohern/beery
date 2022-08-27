<x-email-layout>
	<!--MESSAGE-->
	<tr>
		<td class="bg_dark email-section" style="text-align:center;">
			<div class="heading-section heading-section-white">
				<h2>Purchase Request</h2>
				<p>{{$order->name}}</p>
				<p>{{$order->email}}</p>
			</div>
		</td>
	</tr>

	<!--NUMBERS-->
	<tr>
		<td valign="middle" class="counter" style="background-image: url(<?=asset('templates/colorlibhq/images/bg_1.jpg')?>); background-size: cover; padding: 4em 0;">
			<div class="overlay"></div>
			<table>
				<tr>
					<td valign="middle" width="33.333%">
						<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
							@foreach($details as $detail)
							<tr>
								<td class="counter-text">
									<span class="num">{{$flavors[$detail->flavor_id]->name}}</span>
									<span class="name">${{number_format($detail->unit_price/1000,0,",",".")}}k x {{$detail->qty}}</span>
								</td>
							</tr>
							@endforeach
						</table>
					</td>
					<td valign="middle" width="33.333%">
						<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
							@foreach($details as $detail)
							<tr>
								<td class="counter-text">
									<span class="num">x {{$detail->qty}}</span>
									<span class="name">{{ number_format($detail->unit_price/1000,0,",",".") }}k c/u</span>
								</td>
							</tr>
							@endforeach
						</table>
					</td>
					<td valign="middle" width="33.333%">
						<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
							<tr>
								<td class="counter-text">
									<span class="num">$ {{ number_format($order->total_price/1000,0,",",".") }}k</span>
									<span class="name"><?= config("beery.currency") ?> Total</span>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</x-email-layout>