<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <h2>Products</h2>
            </div>
        </div>
        <div class="row">
            @foreach ($products as $product)
                <div class="col-4">
                    <a href="{{ route('show', ['slug' => $product->name, 'id'=>$product->id]) }}">
                        <div class="card">
                            <img src="{{url('images/'.$product->slug)}}" alt="Image">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{$product->name}}</h5>
                            <p class="card-text">{{$product->description}}</p>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>