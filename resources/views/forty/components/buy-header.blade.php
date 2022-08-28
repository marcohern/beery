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
            <td>Address</td><td>{{$order->address1}}, {{$order->address2}}, {{$order->zip}}, {{$order->zone}}, {{$order->city}}, {{$order->state}}, {{$order->country}}</td>
        <tr>
        <tr>
            <td colspan="2">{{$order->comments}}&nbsp;</td>
        <tr>
    </table>
</div>