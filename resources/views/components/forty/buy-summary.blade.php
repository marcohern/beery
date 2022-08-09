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
            <tr>
                <td>{{$summary->flavor}}</td>
                <td>{{$summary->qty}}</td>
                <td>{{$summary->price}}</td>
                <td>{{$summary->total}}</td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3">Total</td>
                <td>{{$summary->total}}</td>
            </tr>
        </tfoot>
    </table>
</div>
