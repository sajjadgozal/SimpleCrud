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
        @if(!$items->isEmpty() )
            <table class="table">
                <tr>
                    @foreach($items[0]->getFillable() as $fillable)
                        <th>{{$fillable}}</th>
                    @endforeach
                </tr>
                @foreach($items as $item)
                    <tr>
                        @foreach($item->getFillable() as $fillable)
                            <td>{{$item[$fillable]}}</td>
                        @endforeach
                    </tr>
                @endforeach
            </table>
        @else
            <span>There is no Item</span>
        @endif
    </div>

</body>
</html>