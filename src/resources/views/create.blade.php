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
            <form method="POST" action="{{ route('postProduct') }}" enctype="multipart/form-data">
                @csrf
                <input type="text" name="name" placeholder="Name">
                <input type="text" name="price" placeholder="Price">
                <input type="text" name="description" placeholder="Description">
                <input type="file" name="slug" placeholder="slug">
                <button type="submit">Enviar</button>
            </form>
        </div>
    </div>
</body>
</html>