<x-layout>
	<x-slot:title>Buy</x-slot>
	<!-- Main -->
	<div id="main">
        <section id="one">
            <div class="inner">
            
                <header class="major">
                    <h1>Buy Summary</h1>
                </header>
                <div class="row">
                    <div class="col-8 col-12-md">
                        <x-buy-summary :summary="$summary"/>
                    </div>
                    <div class="col-4 col-12-md">
                        <form method="post" action="<?=url('/buy') ?>">
                            @csrf
                            <button class="button primary fit">Request Purchase</button>
                        </form>
                    </div>
                </div>
                <span class="image main"><img src="templates/forty/images/pic11.jpg" alt="" /></span>
            </div>
            
        </section>

	</div>
</x-layout>