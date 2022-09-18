<a href="{{route('payment_methods.show',$id)}}" data-val='{{$id}}' class='btn-show-mdl-announcement-modal'>
    {!! Form::button('<i class="fa fa-eye"></i>', ['type'=>'button']) !!}
</a>

<a href="{{route('payment_methods.edit',$id)}}" data-val='{{$id}}' class='btn-edit-mdl-announcement-modal'>
    {!! Form::button('<i class="fa fa-edit"></i>', ['type'=>'button']) !!}
</a>
