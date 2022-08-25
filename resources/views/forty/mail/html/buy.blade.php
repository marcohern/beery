<x-email-layout>
	<!--MESSAGE-->
	<tr>
		<td class="bg_dark email-section" style="text-align:center;">
			<div class="heading-section heading-section-white">
				<h2>Purchase Request</h2>
				<p>{{$buyRequest->name}}</p>
				<p>{{$buyRequest->email}}</p>
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
							<tr>
								<td class="counter-text">
									<span class="num"><?= config("beery.flavors.{$buyRequest->flavor}") ?></span>
									<span class="name">Flavor</span>
								</td>
							</tr>
						</table>
					</td>
					<td valign="middle" width="33.333%">
						<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
							<tr>
								<td class="counter-text">
									<span class="num"><?=$buyRequest->qty ?></span>
									<span class="name">Beerys</span>
								</td>
							</tr>
						</table>
					</td>
					<td valign="middle" width="33.333%">
						<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
							<tr>
								<td class="counter-text">
									<span class="num">$<?=number_format($buyRequest->total/1000,0,",",".") ?>k</span>
									<span class="name"><?= config("beery.currency") ?></span>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</x-email-layout>