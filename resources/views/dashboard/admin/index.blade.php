@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center p-2">
            <div class="col-lg-4 mb-3 text-center rounded-lg text-middle align-middle py-2">
                <div class="rounded-3 py-2" style="height: 6em; background: #153d06;">
                    <div class="align-middle">
                        {{ $total_user_balance }}
                    </div>
                    <div>
                        Total user Balance
                    </div>
                </div>

            </div>
            <div class="col-lg-4 mb-3 text-center rounded-lg text-middle align-middle py-2">
                <div class="rounded-3 py-2" style="height: 6em; background: #103104;">
                    <div class="align-middle">
                        {{ $total_deposit }}
                    </div>
                    <div>
                        Total Deposit
                    </div>
                </div>
              
            </div>
            <div class="col-lg-4 mb-3 text-center rounded-lg text-middle align-middle">
                <div class="rounded-3 py-2" style="height: 6em; background: #153d06;">
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
                <div class="rounded-3 py-2" style="height: 6em; background: #153d06;">
                    <div class="align-middle">
                        {{ $total_user_balance }}
                    </div>
                    <div>
                        Total user
                    </div>
                </div>

            </div>
            <div class="col-lg-4 mb-3 text-center rounded-lg text-middle align-middle py-2">
                <div class="rounded-3 py-2" style="height: 6em; background: #153d06;">
                    <div class="align-middle">
                        {{ $total_deposit }}
                    </div>
                    <div>
                        Total Blocked User
                    </div>
                </div>
              
            </div>
            <div class="col-lg-4 mb-3 text-center rounded-lg text-middle align-middle py-2">
                <div class="rounded-3 py-2" style="height: 6em; background: #153d06;">
                    <div class="align-middle">
                        {{ $total_withdrawal }}
                    </div>
                    <div>
                        Total unverified User
                    </div>
                </div>
               
            </div>
        </div>
        <div class="row justify-content-center mb-3">
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
