<table class="table">
    <thead>
    <tr>
        <th scope="col">Product ID</th>
        <th scope="col">Name</th>
        <th scope="col">Product Code</th>
        <th scope="col">Cost(LKR)</th>
        <th scope="col">Selling Price(LKR)</th>
        <th scope="col">Brand</th>
        <th scope="col">Color</th>
        <th scope="col">Size</th>
    </tr>
    </thead>
    <tbody>
    @foreach($clothes as $cloth)
        <tr>
            <th scope="row">{{$cloth->clothId}}</th>
            <td>{{$cloth->clothName}}</td>
            <td>{{$cloth->product_code}}</td>
            <td>{{$cloth->cost}}</td>
            <td>{{$cloth->selling_price}}</td>
            <td>{{$cloth->brandName}}</td>
            <td>{{$cloth->color}}</td>
            <td>{{$cloth->size}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
{!! $clothes->render() !!}