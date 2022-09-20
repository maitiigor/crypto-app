@extends('layouts.app')
    
@section('title')
@endsection
@php
    $min_amount =  0;   
    if (count($investment_plans) > 0) {
        # code...
        $min_amount =  $investment_plans[0]->amount;
    }
   
@endphp
@section('content')
    <div>
        <div class="bg-light pt-5 px-3" style="width: 100%;">
            <div class="row justify-content-center">
                @foreach ($investment_plans as $index => $item)
                    <div class="col-md-4 mb-3">
                        <div class="plan-header mb-1 app-bg text-center">
                            <h3>PLAN</h3>
                        </div>
                        <div class="plan-content px-2 app-bg mb-3 py-1  text-center ">
                            <div class="my-2 mx-5"
                                style="background-color: white; color: #19233f; width: 15em; border-radius: 2em;">
                                <h3> {{ $item->name }} </h3>
                            </div>
                            <div class="px-2" style="width: 100%; background-color: white; color: #19233f; margin-top: 4em">
                                <table class="table text-dark">
                                    <thead>
                                        <tr class="text-dark">
                                            <th>
                                                Plan
                                            </th>
                                            <th>
                                                Plan
                                            </th>
                                            <th>
                                                Profits
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="text-dark">
                                            <td>Plan {{ $index + 1 }}</td>
                                            <td> {{ $item->amount }} and more</td>
                                            <td> {{ $item->profit_percentage }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>


                    </div>
                @endforeach

            </div>
            {!! Form::open(array('method' => 'post', 'url' => 'customer/deposit')) !!}
                <div class="row">

                    <div class="mb-3">
                        <label for="account_balance" class="form-label text-dark">Your Account Balance</label>
                        <input type="number" class="form-control" value="{{auth()->user()->account_balance}}" id="amount" name="amount" disabled>
                    </div>
    
                    <div class="mb-3">
                        <label for="investment_plan_id" class="form-label text-dark">Select Package</label>
                        <select name="investment_plan_id" id="investment_plan_id" class="form-select">
                            @foreach ($investment_plans as $item)
                                <option value="{{ $item->id }}">
                                    {{ $item->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
    
                    <div class="mb-3">
                        <label for="payment_method" class="form-label text-dark">Payment Method</label>
                        <select name="payment_method" id="payment_method" class="form-select">
                            @foreach ($payment_methods as $item)
                                <option value="{{ $item->account_id }}">
                                    {{ $item->account_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="amount" class="form-label text-dark">Enter Amount</label>
                        <input type="number" id="amount" min="{{$min_amount}}" value="{{$min_amount}}" class="form-control" name="amount">
                    </div>
                    <div class="col-md-4 mb-3">
                        <button class="btn btn-primary" type="submit">
                            Save
                        </button>
                    </div>
                </div>
           {!! Form::close() !!}
            
        </div>
    </div>
@endsection
@push('app_js')
<script>
    $(document).ready(function () {
        let investment_plans = @php echo $investment_plans;@endphp;

       /*  $('#investment_plan_id').change(function(e) {
           let selected_plan_id = $(this).val();
           let plan = investment_plans.find(el =>{
                return el.id == selected_plan_id;
            })
            $('#amount').val(parseInt(plan.amount))
           //$('#amount').attr('min',parseInt(plan.amount))
          

        }) */
        
    })
</script>
    
@endpush

