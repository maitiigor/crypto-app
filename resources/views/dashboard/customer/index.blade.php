@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 text-center">
                <h3> Active Deposit <br>
                    $0.0<br>
                </h3>
                <div class="py-4">
                    <a href="{{route('customer.deposit')}}" class="btn custom-btn" type="btn">
                        Deposit
                    </a>
                    <a href="{{route('withdrawal')}}" class="btn custom-btn" type="btn">
                        <i class="fa fa-money"></i> Withdrawal
                    </a>
                </div>
            </div>
            <div class="col-md-12 my-2 py-5  text-center">
                <span style="font-size: 14px" class="dashboard-history">
                    Account Balance ...
                    <a href="#" style="font-size: 12px;">
                        View History
                    </a>
                </span>
                <span style="font-size: 14px" class="dashboard-history">
                    &nbsp; Earned Total ...
                    <a href="#" style="font-size: 12px;">
                        View History
                    </a>
                </span>
                <span class="dashboard-history">
                    &nbsp; Ref Commission ...
                    <a href="#" style="font-size: 12px;">
                        View History
                    </a>
                </span>


                </span>
            </div>
            <div class="col-md-6 mb-3">
                <div class="px-4">
                    <div style="background: #082667; min-height: 8em;" class="text-center p-3 ">
                        <div class="mb-2">
                            <strong style="color: #46bdf4;">
                                Quick Links
                            </strong>
                        </div>

                        <div class="px-2">
                            <a href="{{route('customer.deposit')}}" class="text-light">Fund Wallet</a>
                        </div>
                        <div class="px-2">
                            <a href="{{route('withdrawal')}}" class="text-light">Withdraw Funds</a>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-6 mb-3">
                <div class="px-4">
                    <div style="background: #082667; min-height: 8em;" class="text-center p-3 ">
                        <div class="mb-2">
                            <strong style="color: #46bdf4;">
                                Ref Info
                            </strong>
                        </div>

                        <div class="px-2">
                            <a href="#" class="text-light">Referral Link:
                                {{url()->to('register')}}?ref={{auth()->user()->user_name}}</a>
                        </div>

                    </div>
                </div>

            </div>
            <div class="col-lg-12 my-2">
                <video width="100%" height="400" controls>
                    <source src="{{asset('assets/videos/sample.mp4')}}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
            <div class="col-lg-12">
                <div style="min-height: 14em;" class="py-5">
                    <div class="tradingview-widget-container">
                        <div id="tradingview_167a7"></div>
                        <div class="tradingview-widget-copyright"><a
                                href="https://www.tradingview.com/symbols/BTCUSD/?exchange=COINBASE" rel="noopener"
                                target="_blank"><span class="blue-text">Personal Trading Chat</span></a></div>
                        <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
                        <script type="text/javascript">
                            new TradingView.widget({
                                "width": "100%",
                                "height": "550",
                                "symbol": "COINBASE:BTCUSD",
                                "interval": "D",
                                "timezone": "Etc/UTC",
                                "theme": "light",
                                "style": "9",
                                "locale": "en",
                                "toolbar_bg": "#f1f3f6",
                                "enable_publishing": false,
                                "allow_symbol_change": true,
                                "container_id": "tradingview_167a7"
                            });
                        </script>
                    </div>
                    <!-- TradingView Widget END -->
                </div>

            </div>
        </div>
    </div>
@endsection
