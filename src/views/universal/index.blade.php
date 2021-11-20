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

        <a href="{{ route('crudCreate',[ 'item_name'=>$class_name ]) }}">Create {{ $class_name }}</a>

        @if(!$items->isEmpty() )
            <table class="table">
                <tr>
                    <th>id</th>
                    @foreach($items[0]->getFillable() as $fillable)
                        <th>{{$fillable}}</th>
                    @endforeach
                    <th>action</th>
                </tr>
                @foreach($items as $item)
                    <tr>
                        @isset($item->id)
                            <td>{{$item->id}}</td>
                        @endisset
                        @foreach($item->getFillable() as $fillable)
                            @if ($loop->first)
                                <td>
                                    <a href="{{ route('crudShow',[ 'item_name'=>$class_name , 'id'=>$item['id'] ]) }}">{{$item[$fillable]}}</a>
                                </td>
                            @else
                                <td>{{$item[$fillable]}}</td>
                            @endif
                        @endforeach
                        <td>
                            <a href="{{ route('crudEdit',[ 'item_name'=>$class_name , 'id'=>$item['id'] ]) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                            <span> / </span>
                            <form onsubmit="return confirm('Do you really want to delete?');" action="{{route('crudDelete',[ 'item_name'=>$class_name , 'id'=>$item['id'] ])}}" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="text-indigo-600 hover:text-indigo-900" value="Delete">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        @else
            <span>There is no Item</span>
        @endif
    </div>

</body>
</html>