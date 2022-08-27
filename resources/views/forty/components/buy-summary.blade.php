<div class="table-wrapper">
    <table>
        <thead>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($details as $detail)
            <tr>
                <td>{{$flavors[$detail->flavor_id]->name}}</td>
                <td>{{$detail->qty}}</td>
                <td>{{$detail->unit_price}}</td>
                <td>{{$detail->subtotal}}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3"><b>Total</b></td>
                <td><b>{{$order->total}}</b></td>
            </tr>
        </tfoot>
    </table>
</div>
