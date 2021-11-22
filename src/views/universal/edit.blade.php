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

    @isset($errors)
        @if ($errors->any())
            <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
    @endisset

    <form action={{route('crudUpdate',[ 'item_name'=>class_basename($item), 'id'=>$item['id'] ]) }} method='post'>
        @csrf
        @method('PATCH')
        @foreach($item->getFillable() as $fillable)
            <label for={{$fillable}}>{{$fillable}}</label>

            @if(in_array('string', explode('|', $item->rules[$fillable])))
                <input type="text" name={{$fillable}} value="{{ $item[$fillable] }}" >
            @elseif(in_array('numeric', explode('|', $item->rules[$fillable])))
                <input type="number" name={{$fillable}} value="{{ $item[$fillable] }}" >
            @elseif(in_array('text', explode('|', $item->rules[$fillable])))
                <textarea name={{$fillable}} cols="30" rows="10">{{ $item[$fillable] }}</textarea>
            @endif

            <br>

        @endforeach
        <input type="submit">
    </form>
</div>

</body>
</html>