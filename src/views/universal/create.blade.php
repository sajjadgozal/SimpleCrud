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

    <a href="{{ route('crudIndex',[ 'item_name'=>class_basename($model) ]) }}">List of  {{ class_basename($model) }}</a>

    @if ($errors->any())
        <ul class="mt-3 list-disc list-inside text-sm text-red-600">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action={{route('crudStore',['item_name'=>class_basename($model)])}} method='post'>
        @csrf
        @method('POST')
        @foreach($model->getFillable() as $fillable)

            <label for={{$fillable}}>{{$fillable}}</label>

            @if(in_array('string', explode('|', $model->rules[$fillable])))
                <input type="text" name={{$fillable}} value="{{ old($fillable) }}" >
            @elseif(in_array('numeric', explode('|', $model->rules[$fillable])))
                <input type="number" name={{$fillable}} value="{{ old($fillable) }}" >
            @elseif(in_array('text', explode('|', $model->rules[$fillable])))
                <textarea name={{$fillable}} cols="30" rows="10">{{ old($fillable) }}</textarea>
            @endif

            <br>
        @endforeach
        <input type="submit">
    </form>
</div>

</body>
</html>