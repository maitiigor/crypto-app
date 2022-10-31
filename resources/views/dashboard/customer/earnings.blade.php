@extends('layouts.app')

@section('title')
@endsection

@section('content')

    <div>
        <div class="pt-5 px-3 rounded" style="width: 100%; background-color: #a8ecec">
            <div class="row">

                <div class="col-sm-12">
                    <table class="table text-dark">
                        <thead>
                            <tr class="text-dark">
                                <th>Type</th>
                                <th>Earned Amount</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($earnings as $earning)
                                <tr class="text-dark">
                                    @if($earning->investment_plan)
                                        <td>
                                            <strong> {{$earning->investment_plan->name}} </strong><br>
                                            Amount_invested: {{number_format($earning->deposit->amount,2)}}
                                        </td>
                                    @else
                                    <td>
                                        <strong> Referal Bonus</strong><br>
                                        ({{$earning->referal->refered_user->name}})
                                    </td>
                                    @endif
                                    
                                    <td>{{ $earning->amount }}</td>
                                    <td>{{ $earning->created_at }}</td>
                                </tr>
                            @endforeach
                            <tr class="text-dark">
                                <td colspan="3" class="text-end">
                                  <strong> Total:</strong> <strong> $ </strong> {{number_format($earnings->sum('amount'))}}
                                </td>
                            </tr>
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
