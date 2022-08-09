<x-layout>
	<x-slot:title>Buy</x-slot>
	<!-- Main -->
	<div id="main">

        <section id="one">
            <div class="inner">
                <header class="major">
                    <h1>Buy Summary</h1>
                </header>
                <x-buy-summary :summary="$summary"/>
                <span class="image main"><img src="templates/forty/images/pic11.jpg" alt="" /></span>
            </div>
        </section>

	</div>
</x-layout>