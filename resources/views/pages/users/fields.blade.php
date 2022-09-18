<div class="px-5">

    <div class="mb-3">
   
        {!! Form::label('name', 'Name', ['class' => 'form-label']) !!}
     
        {!! Form::text('name',isset($user) ? $user->name : "", ['class' =>'form-control']) !!}
    </div>
    <div class="mb-3">
        {!! Form::label('email', 'Email', ['class' => 'form-label']) !!}
        {!! Form::email('email',isset($user) ? $user->email : "", ['class' =>'form-control']) !!}
    </div>
    <div class="mb-3">
        {!! Form::label('user_name', 'User Name', ['class' => 'form-label']) !!}
        {!! Form::text('user_name',isset($user) ? $user->user_name : "", ['class' =>'form-control']) !!}
      
    </div>
   {{--  <div class="mb-3">
        {!! Form::label('phone_number', 'Phone Number', ['class' => 'form-label']) !!}
       
        {!! Form::number('phone_number',isset($user) ? $user->phone_number : "",['class' =>'form-control']) !!}
    </div> 
    --}}
    <div class="mb-3">
        {!! Form::label('password', 'Password', ['class' => 'form-label']) !!}

        {!! Form::password('password',['class' =>'form-control']) !!}
    </div>
    <div class="mb-3">
        {!! Form::label('bitcoin_account_id', 'Bitocoin Account ID', ['class' => 'form-label']) !!}

        {!! Form::text('bitcoin_account_id',isset($user) ? $user->bitcoin_account_id : "",['class' =>'form-control']) !!}
      
    </div>
    <div class="mb-3">
        {!! Form::label('ethereum_account_id', 'Ethereum Account Id', ['class' => 'form-label']) !!}

        {!! Form::text('ethereum_account_id',isset($user) ? $user->ethereum_account_id: "",['class' =>'form-control']) !!}
        
    </div>
    <div class="mb-3">
        {!! Form::label('litecoin_account_id', 'Lite Coin Account Id', ['class' => 'form-label']) !!}

        {!! Form::text('litecoin_account_id',isset($user) ? $user->litecoin_account_id : "",['class' =>'form-control']) !!}
        
    </div>
    <div class="mb-3">
        {!! Form::label('tron_account_id', 'Tron Account ID', ['class' => 'form-label']) !!}

        {!! Form::text('tron_account_id',isset($user) ? $user->tron_account_id : "",['class' =>'form-control']) !!}
       
    </div>
    <div class="mb-3">
        {!! Form::label('doge_account_id', 'Doge Account ID', ['class' => 'form-label']) !!}

        {!! Form::text('doge_account_id',isset($user) ? $user->doge_account_id : "",['class' =>'form-control']) !!}
       
    </div>
    <div class="mb-3">
        {!! Form::label('account_balance', 'Account Account', ['class' => 'form-label']) !!}

        {!! Form::text('account_balance',isset($user) ? $user->account_balance : "",['class' =>'form-control']) !!}
      
    </div>
    <button class="btn btn-primary text-center" type="submit">
        Save
    </button>
</div>
