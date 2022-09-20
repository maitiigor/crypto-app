@extends('layouts.app')

@section('title')
@endsection

@section('content')

    <div>
        <div class="pt-5 px-3 rounded" style="width: 100%; background-color: #a8ecec">
            <div class="row">
                <div class="col-sm-8 text-dark">
                    Active referals
                </div>
                <div class="col-sm-4 text-dark">
                    {{$referal_commissions->count()}}
                </div>
                <div class="col-sm-8 text-dark">
                    Total referral commision
                </div>
                <div class="col-sm-4 text-dark">
                    $ {{number_format($referal_commissions->sum('amount'),2)}}
                </div>
            </div>
            <div class="row">

                <div class="col-sm-12">
                    <table class="table text-dark">
                        <thead>
                            <tr class="text-dark">
                                <th>Date</th>
                                <th>Amount</th>
                                <th>user</th>
                            </tr>
                        </thead>
                        <tbody>
                         
                            @foreach ($referal_commissions as $earning)
                                <tr class="text-dark">

                                    <td>
                                       <strong> {{$earning->created_at}} </strong><br>
                                        
                                    </td>
                                    <td>{{ $earning->amount }}</td>
                                    <td>{{ $earning->referal->refered_user->user_name }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>


        </div>
    </div>
@endsection
@push('app_js')
    <script>
        $(document).ready(function() {


        })
    </script>
@endpush
