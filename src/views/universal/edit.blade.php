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
    <form action={{route('crudUpdate',[ 'item_name'=>class_basename($item), 'id'=>$item['id'] ]) }} method='post'>
        @csrf
        @method('PATCH')
        @foreach($item->getFillable() as $fillable)
            <label for={{$fillable}}>{{$fillable}}</label>
            <input type="text" name={{ $fillable }} value="{{ $item[$fillable] }}" >
            <br>
        @endforeach
        <input type="submit">
    </form>
</div>

</body>
</html>