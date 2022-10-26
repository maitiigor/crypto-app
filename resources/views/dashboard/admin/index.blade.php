@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center p-2">
            <div class="col-lg-4 mb-3 text-center rounded-lg text-middle align-middle py-2">
                <div class="rounded-3 py-2" style="height: 6em; background: #057780;">
                    <div class="align-middle">
                        {{ $total_user_balance }}
                    </div>
                    <div>
                        Total user Balance
                    </div>
                </div>

            </div>
            <div class="col-lg-4 mb-3 text-center rounded-lg text-middle align-middle py-2">
                <div class="rounded-3 py-2" style="height: 6em; background: #057780;">
                    <div class="align-middle">
                        {{ $total_deposit }}
                    </div>
                    <div>
                        Total Deposit
                    </div>
                </div>

            </div>
            <div class="col-lg-4 mb-3 text-center rounded-lg text-middle align-middle">
                <div class="rounded-3 py-2" style="height: 6em; background: #057780;">
                    <div class="align-middle">
                        {{ $total_withdrawal }}
                    </div>
                    <div>
                        Total withdrawal
                    </div>
                </div>

            </div>
        </div>
        <div class="row justify-content-center p-2">
            <div class="col-lg-4 mb-3 text-center rounded-lg text-middle align-middle py-2">
                <div class="rounded-3 py-2" style="height: 6em; background: #057780;">
                    <div class="align-middle">
                        {{ $total_user }}
                    </div>
                    <div>
                        Total user
                    </div>
                </div>

            </div>
            <div class="col-lg-4 mb-3 text-center rounded-lg text-middle align-middle py-2">
                <div class="rounded-3 py-2" style="height: 6em; background: #057780;">
                    <div class="align-middle">
                        {{ $total_deposit }}
                    </div>
                    <div>
                        Total Blocked User
                    </div>
                </div>

            </div>
            <div class="col-lg-4 mb-3 text-center rounded-lg text-middle align-middle py-2">
                <div class="rounded-3 py-2" style="height: 6em; background: #057780;">
                    <div class="align-middle">
                        {{  $unverified_user }}
                    </div>
                    <div>
                        Total unverified User
                    </div>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">

                <div class="card text-center">
                    <div class="card-header text-dark">
                        Pending Withdrawal Requests
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>
                                        User
                                    </th>
                                    <th>
                                        Amount
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($pending_withdrawal_request->count() > 0)
                                    @foreach ($pending_withdrawal_request as $withdrawal_request)
                                    @if ($withdrawal_request)
                                    <tr>
                                        <td>
                                            {{ $withdrawal_request->user->user_name }}
                                        </td>
                                        <td>
                                            {{ $withdrawal_request->amount }}
                                        </td>
                                        <td>
                                            <a href="{{ route('withdrawals.show', $withdrawal_request->id) }}">
                                                <button>
                                                    <i class="fa fa-eye"></i>
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                                    @endif
                                       
                                    @endforeach
                                @else
                                        
                                        <tr>
                                            <td colspan="3">
                                                No pending withdrawal request
                                            </td>
                                        </tr>
                                @endif

                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
            <div class="col-md-6 mb-3">
                <div class="card text-center">
                    <div class="card-header text-dark">
                        Pending Deposit Requests
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>
                                        User
                                    </th>
                                    <th>
                                        Amount
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($pending_deposit_request->count() > 0)
                                    @foreach ($pending_deposit_request as $deposit_request)
                                        <tr>
                                            <td>
                                                {{ $deposit_request->user->user_name }}
                                            </td>
                                            <td>
                                                {{ $deposit_request->amount }}
                                            </td>
                                            <td>
                                                <a href="{{ route('deposits.show', $deposit_request->id) }}">
                                                    <button>
                                                        <i class="fa fa-eye"></i>
                                                    </button>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="3">
                                            No deposit pending verification
                                        </td>
                                    </tr>
                                @endif

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
