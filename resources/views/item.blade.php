<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title-1</title>
</head>
<title>Laravel Test</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
      integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
      integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
<body style="margin: 30px">

@if($error!==0)
<div class="alert alert-danger" role="alert">
    The fields cant be empty!
</div>
@endif


<form action="/" method="POST">
    <div class="form-group">
        <label for="product_name">Product name</label>
        <input class="form-control" id="product_name" placeholder="Product name" name="product_name">
    </div>
    <div class="form-group">
        <label for="quantity_in_stock">Quantity in stock</label>
        <input class="form-control" type="number" id="quantity_in_stock" placeholder="Quantity in stock" name="quantity_in_stock">
    </div>
    <div class="form-group">
        <label for="price_per_item">Price per item </label>
        <input class="form-control" type="number" id="price_per_item" placeholder="Price per item " name="price_per_item">
    </div>
    {{ csrf_field() }}
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
<br/>
<br/>

<div class="alert alert-info" role="alert">
    Total sum value: {{$whole_value}}
</div>


<ul class="list-group">
    <li class="list-group-item" style="height: 100px; font-size: 20pt">
        <div class="col-md-2">Product name</div>
        <div class="col-md-2">Quantity in stock</div>
        <div class="col-md-2">Price per item</div>
        <div class="col-md-2">Date submitted</div>
        <div class="col-md-3">Total value</div>
    </li>
    @foreach($items as $item)
    <li class="list-group-item" style="height: 50px">
        <div class="col-md-2">{{$item['product_name']}}</div>
        <div class="col-md-2">{{$item['quantity_in_stock']}}</div>
        <div class="col-md-2">{{$item['price_per_item']}}</div>
        <div class="col-md-2">{{$item['created_at']}}</div>
        <div class="col-md-3">{{$item['total_value']}}</div>
    </li>
    @endforeach
</ul>

</body>
</html>