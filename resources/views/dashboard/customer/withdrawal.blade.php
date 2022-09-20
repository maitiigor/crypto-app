@extends('layouts.app')

@section('title')
@endsection

@section('content')
    <div>
        <div class="pt-5 px-3 rounded" style="width: 100%; background-color: #a8ecec">
            <div class="row pb-2">
                <div class="col-lg-8 text-dark">
                    Account Balance
                </div>
                <div class="col-lg-4 text-dark">
                   $ {{ auth()->user()->account_balance }}
                </div>
            </div>
            <div class="row pb-2 mb-3">

                <div class="col-lg-8 text-dark">
                    Pending Withdrawal
                </div>
                <div class="col-lg-4 text-dark">
                    $ {{auth()->user()->pendingWithdrawal()}}
                </div>
            </div>
            <div class="row pb-2 mb-3">

                <div class="col-lg-12 text-dark">
                    click <a href="{{ route('profile') }}"> here </a> to update payment methods
                </div>
            </div>
            <div class="row pb-2">
                @if (auth()->user()->account_balance == 0)
                    <h3 class="text-danger"> You have no fund to withdrawal</h3>
                @else
                    <div class="col-lg-12 text-dark">
                        {!! Form::open(['url' => 'customer/withdrawal', 'method' => 'post']) !!}
                        <div class="col-lg-4 mb-3">
                            <label for="payment_method_id" class="form-label text-dark">Payment Method</label>
                        </div>
                        <div class="col-lg-8 mb-2">
                            <select name="address" id="address" class="form-select">
                                @foreach ($payment_methods as $idx => $item)
                                    <option value="{{ $item['id'] }}">
                                        {{ $item['name'] }}
                                    </option>
                                @endforeach

                            </select>
                        </div>
                        <div class="col-lg-4  mb-2">
                            <label for="payment_method_id" class="form-label text-dark">Amount</label>
                        </div>
                        <div class="col-lg-8 mb-2">
                            <input type="text" class="form-control" min="1" name="amount" id="amount">
                        </div>
                        <button type="submit" class="btn btn-primary">
                            Submit withdrawal
                        </button>
                        {!! Form::close() !!}
                    </div>
                @endif

            </div>
            <div class="px-2 mb-3" style="width: 100%; background-color: white; color: #19233f; margin-top: 4em">
                <table class="table text-dark">
                    <thead>
                        <tr class="text-dark">
                            <th>
                                Amount
                            </th>
                            <th>
                                Date
                            </th>
                            <th>
                                status
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($withdrawals as $withdrawal)
                            <tr class="text-dark">
                                <td>{{ $withdrawal->amount }}</td>
                                <td>{{ $withdrawal->created_at }} </td>
                                <td>
                                    @if ($withdrawal->is_payed == true)
                                        <span class='text-primary'> Paid </span>
                                    @else
                                        <span class='text-danger'> Pending </span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
