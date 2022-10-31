<a href="{{route('deposits.show', $id)}}" data-val='{{$id}}' >
    {!! Form::button('<i class="fa fa-eye"></i>', ['type'=>'button']) !!}
</a>

<a href="{{route('deposits.edit', $id)}}" data-val='{{$id}}'>
    {!! Form::button('<i class="fa fa-edit"></i>', ['type'=>'button']) !!}
</a>
