<x-email-layout>
	<!--MESSAGE-->
	<tr>
		<td class="bg_dark email-section" style="text-align:center;">
			<div class="heading-section heading-section-white">
				<h2>Message by {{ $contact->name }} &lt;{{$contact->email}}&gt;:</h2>
				<p>{{ $contact->message }}</p>
			</div>
		</td>
	</tr>
</x-email-layout>