<a href="{{route('users.show',$id)}}" data-val='{{$id}}' class='btn-show-mdl-announcement-modal'>
    {!! Form::button('<i class="fa fa-eye"></i>', ['type'=>'button']) !!}
</a>

<a href="{{route('users.edit',$id)}}" data-val='{{$id}}' class='btn-edit-mdl-announcement-modal'>
    {!! Form::button('<i class="fa fa-edit"></i>', ['type'=>'button']) !!}
</a>

<a href="#" data-val='{{$id}}' is-disabled="{{$is_disabled}}" class='btn-disable-user'>
    {!! Form::button('<i class="fa fa-lock"></i>', ['type'=>'button' ,'class' => 'btn-disable-user']) !!}
</a>
