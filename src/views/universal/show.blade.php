<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title}}</title>
</head>
<body>

<div class="header">
    <div class="title">

    </div>
</div>

<div class="container">

    <a href="{{ route('crudIndex',[ 'item_name'=>class_basename($item) ]) }}">List of  {{ class_basename($item) }}</a>


    @foreach($item->getFillable() as $fillable)
        <div>
            <span>{{$fillable}} : </span>
            <span>{{$item[$fillable]}}</span>
        </div>
    @endforeach
</div>

</body>
</html>