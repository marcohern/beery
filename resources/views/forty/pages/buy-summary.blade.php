<x-layout>
	<x-slot:title>Buy</x-slot>
	<!-- Main -->
	<div id="main">
        <section id="one">
            <div class="inner">
            
                <header class="major">
                    <h1>Buy Summary</h1>
                </header>
                @if ($error)
                    <div style="color:red">{{$error->state}} {{$error->responseCode}}: {{$error->message}}</div>
                    <!--{{json_encode($error->response)}}-->
                @endif
                <div class="row">
                    <div class="col-8 col-12-md">
                        <x-buy-header :order="$order"/>
                        <x-buy-summary :order="$order" :details="$details" :flavors="$flavors"/>
                    </div>
                    <div class="col-4 col-12-md">
                        <x-credit-card-form/>
                    </div>
                </div>
                <span class="image main"><img src="templates/forty/images/pic11.jpg" alt="" /></span>
            </div>
            
        </section>

	</div>
</x-layout>