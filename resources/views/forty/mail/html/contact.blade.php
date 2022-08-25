<x-email-layout>
	<!--MESSAGE-->
	<tr>
		<td class="bg_dark email-section" style="text-align:center;">
			<div class="heading-section heading-section-white">
				<h2>{{ $contact->name }} writes:</h2>
				<p>{{ $contact->message }}</p>
				<p>reply to <a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a></p>
			</div>
		</td>
	</tr>
</x-email-layout>