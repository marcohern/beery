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
                        <div class="table-wrapper">
                            <table>
                                <tr>
                                    <td>Name</td><td>{{$order->name}}</td>
                                <tr>
                                <tr>
                                    <td>Email</td><td>{{$order->email}}</td>
                                <tr>
                                <tr>
                                    <td>Phone</td><td>{{$order->phone}}</td>
                                <tr>
                                <tr>
                                    <td colspan="2">{{$order->comments}}</td>
                                <tr>
                            </table>
                        </div>
                        <x-buy-summary :order="$order" :details="$details" :flavors="$flavors"/>
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