@extends('layouts.frontend-app')

@section('content')
    <div class="container">
        <div class="row justify-content-center py-5 my-4">
            <div class="col-lg-6">
                <h1 class="text-center">
                    WELCOME TO
                </h1>
                <div class="text-center" style="color: orange; font-weight: bolder">
                    TradeFunds-INVESTMENT
                </div>
                <div class="my-4" style="color: #d3dcf3">
                    <h4>Daily Profit + Principal Return</h4>
                    <p>
                        Tradefunds has partnered with the world’s best trading technology companies to bring you the ultimate trading experience and cutting-edge trading tools. These tools include: Depth of Market (DoM), inbuilt spread monitoring, ladder trading, automated close of trades with custom order templates, and more.
                    </p>
                </div>
            </div>
            <div class="col-lg-6 ">
                <a href="{{route('register')}}" class="custom-button">Get Started</a>
                <span style="font-size: 12px; color: #96a1c2;">NO CREDIT CARD REQUIRED</span>
            </div>
        </div>
    </div>
    <div class="px-2">
        <div style="background: #065892">
            <div class="row">
                <div class="col-md-6 p-4">
                    <img src="{{ asset('assets/images/4.jpg') }}" class="img-fluid" alt="">
                </div>
                <div class="col-md-6">
                    <h1 class="px-4 mt-5">
                        Statistics
                    </h1>
                    <div class="row">
                        <div class="col-sm-6 my-2">
                            <div class="box-container text-center">
                                <div class="box-title">
                                    <h4><i class="fa fa-clock" style="color: orange"></i> Online Users</h4>
                                </div>
                                <h3>1774</h3>
                            </div>
                        </div>

                        <div class="col-sm-6 my-2">
                            <div class="box-container text-center">
                                <div class="box-title">
                                    <h4><i class="fa fa-user" style="color: orange"></i> Total Accounts</h4>
                                </div>
                                <h3>703133+</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-sm-6 my-2">
                            <div class="box-container text-center">
                                <div class="box-title">
                                    <h4><i class="fa fa-arrow-up" style="color: orange"></i> Total Deposit</h4>
                                </div>
                                <h3>$ 902604552+</h3>
                            </div>
                        </div>

                        <div class="col-sm-6 my-2">
                            <div class="box-container text-center">
                                <div class="box-title">
                                    <h4><i class="fa fa-arrow-down" style="color: orange"></i> Total withdrawal</h4>
                                </div>
                                <h3>$ 6197274530+</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row my-5 py-3 justify-content-center" style="padding-left: 50px; padding-right: 50px">
            <div class="col-sm-8 text-center">
                <h2>
                    Check out our latest Investment Packages
                </h2>
                <p class="" style="color: #96a1c2">
                    TradeFunds team understands the security and safety of there investors funds, that's why we are offering new range of investment packages with 100% principal returns

            </div>

        </div>

        <div class="row my-5 py-3 justify-content-center" style="padding-left: 2em; padding-right: 2em">
            @foreach ($investment_plans as $investment_plan)
            <div class="col-md-3 my-2">
                <div class="price green-bg text-center">
                    <h3>{{$investment_plan->name}}</h3>
                </div>
                <div class="plans">
                    <div class="" style="max-width: 100%">
                        <img src="{{ asset('assets/images/rocket.png') }}" alt="" style="width:200px; height: 200px"
                            class="img-responsive">
                    </div>
                    <h2>
                        {{$investment_plan->profit_percentage}}% After {{$investment_plan->days_duration}} days
                    </h2>
                    <ul style="list-style: none" class="text-start">
                        <li>
                            <h6 style="font-style: 14px"><i class="fa fa-plus" style="color: orange;"></i> Min Deposit: ${{number_format($investment_plan->amount,2)}} and more
                            </h6>
                        </li>
                        {{-- <li>
                            <h6><i class="fa fa-plus" style="color: orange;"></i> Max Deposit: ${{number_format($investment_plan->max_amount,2)}}</h6>
                        </li> --}}
                        <li>
                            <h6><i class="fa fa-plus" style="color: orange;"></i> Daily Earnings</h6>
                        </li>
                        <li>
                            <h6><i class="fa fa-plus" style="color: orange;"></i> Instant Withdrawals</h6>
                        </li>
                        <li>
                            <h6><i class="fa fa-plus" style="color: orange;"></i> {{$investment_plan->profit_percentage}}% Profit Return</h6>
                        </li>
                    </ul>
                    <a href="{{ route('customer.deposit') }}" class="my-3 custom-button">Deposit Now</a>
                </div>
            </div> 
            @endforeach
            
            
        </div>

        <div class="row my-5 py-3 justify-content-center" style="padding-left: 50px; padding-right: 50px">
            <h2 class="text-center">
                Click to watch the video
            </h2>
            <div class="col-lg-12">
                <video width="100%" height="400" controls>
                    <source src="{{ asset('assets/videos/sample.mp4') }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
        </div>
        <div class="row my-5 py-3 justify-content-center" style="padding-left: 2em; padding-right: empx">
            <div class="col-lg-12">
                <h2 class="text-center">
                    WHY CHOOSE<br>
                    TradeFunds
                </h2>

            </div>
            <div class="col-lg-12">
                <h6 class="text-center" style="color: #e0e2ff;">
                    our platform is 100% awesome
                </h6>

            </div>
        </div>
        <div class="row my-5 py-3" style="padding-left: 2.5em; padding-right: 2.5em">
            <div class="col-md-6">
                <div class="left-content">
                    <div class="features d-flex">
                        <div class="mt-2 mr-5 p-2">
                            <i style="width: 55px; height:50px; color: orange; padding-top: 4px; border: 1px solid rgba(255, 255, 255, 0.1)"
                                class="fa fa-paper-plane fa-2x  text-center align-middle"></i>
                        </div>

                        <div class="ml-2" style="margin-left:10px">
                            <h3 class="pl-5">
                                Automated Trading
                            </h3>
                            <p>
                                No need to stay up all night “trading”. The automated system will trade for you, send you
                                your
                                profits, you withdraw.
                            </p>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="left-content">
                    <div class="features d-flex">
                        <div class="mt-2 mr-5 p-2">
                            <i style="width: 55px; height:50px;color: orange; padding-top: 4px; border: 1px solid rgba(255, 255, 255, 0.1)"
                                class="fa fa-map fa-2x  text-center align-middle"></i>
                        </div>

                        <div class="ml-2" style="margin-left:10px">
                            <h3 class="pl-5">
                                TRANSPARENCY AND REPORTING
                            </h3>
                            <p>
                                You can access real-time reporting on your investment manager's performance in the
                                TradeFund Dashboard
                            </p>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 y-2">
                <div class="left-content">
                    <div class="features d-flex">
                        <div class="mt-2 mr-5 p-2">
                            <i style="width: 55px; height:50px;color: orange; padding-top: 4px; border: 1px solid rgba(255, 255, 255, 0.1)"
                                class="fa fa-users fa-2x  text-center align-middle"></i>
                        </div>

                        <div class="ml-2" style="margin-left:10px">
                            <h3 class="pl-5">
                                BACKED BY TOP INVESTORS
                            </h3>
                            <p>
                                Our investors include the New York Stock Exchange, Andreessen Horowitz, Union Square
                                Ventures, and more.
                            </p>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 my-2">
                <div class="left-content">
                    <div class="features d-flex">
                        <div class="mt-2 mr-5 p-2">
                            <i style="width: 55px; height:50px;color: orange; padding-top: 4px; border: 1px solid rgba(255, 255, 255, 0.1)"
                                class="fa fa-rocket fa-2x  text-center align-middle"></i>
                        </div>

                        <div class="ml-2" style="margin-left:10px">
                            <h3 class="pl-5">
                                FRAUD PROTECTION
                            </h3>
                            <p>
                                Our algorithm detects and protects you from online predators.
                            </p>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 my-2">
                <div class="left-content">
                    <div class="features d-flex">
                        <div class="mt-2 mr-5 p-2">
                            <i style="width: 55px; height:50px;color: orange; padding-top: 4px; border: 1px solid rgba(255, 255, 255, 0.1)"
                                class="fa fa-user fa-2x  text-center align-middle"></i>
                        </div>

                        <div class="ml-2" style="margin-left:10px">
                            <h3 class="pl-5">
                                SAFE AND SECURE
                            </h3>
                            <p>
                                We undergo regular IT security and financial audits. In addition, 98% of customer digital
                                assets are stored entirely offline.
                            </p>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 my-2">
                <div class="left-content">
                    <div class="features d-flex">
                        <div class="mt-2 mr-5 p-2">
                            <i style="width: 55px; height:50px;color: orange; padding-top: 4px; border: 1px solid rgba(255, 255, 255, 0.1)"
                                class="fa fa-envelope fa-2x  text-center align-middle"></i>
                        </div>

                        <div class="ml-2" style="margin-left:10px">
                            <h3 class="pl-5">
                                FLEXIBILITY OF TRANSACTIONS
                            </h3>
                            <p>
                                You can make a deposit or withdraw money from your account at any time at the daily
                                rollover. No charges.
                            </p>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="container-fluid px-5 pt-4" style="background-color: #095d91">

        <div class="row">
            <div class="col-md-6">

            </div>
            <div class="col-md-6">
                <h2>
                    Three Steps To Start Earning
                </h2>
            </div>
        </div>
        <div class="row py-4" style="background-color: #065892; opacity: 1;">
            <div class="col-md-6">

            </div>
            <div class="col-md-6">
                <h3 style="color: orange; border-bottom: 1px solid rgba(255, 255, 255, 0.1)" class="text-center pb-3">
                    HOW IT WORKS
                </h3>
                <div class="row my-3">
                    <div class="col-sm-2">
                        <div class="rounded-circle"
                            style="background-color: #095d91; width: 40px; height: 40px; padding: 10px; color: orange">
                            <i class="fa fa-check"></i>
                        </div>

                    </div>
                    <div class="col-sm-10" style="">
                        <h3>
                            CREATE YOUR ACCOUNT
                        </h3>
                        <p class="pl-3">
                            join our platform, create an account
                        </p>
                    </div>
                    <div class="row my-3">
                        <div class="col-sm-2">
                            <div class="rounded-circle"
                                style="background-color: #095d91; width: 40px; height: 40px; padding: 10px; color: orange">
                                <i class="fa fa-check"></i>
                            </div>

                        </div>
                        <div class="col-sm-10" style="">
                            <h3>
                                Make Payment
                            </h3>
                            <p class="pl-3">
                                Deposit money to your digital wallet.
                            </p>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-sm-2">
                            <div class="rounded-circle"
                                style="background-color: #095d81; width: 40px; height: 40px; padding: 10px; color: orange">
                                <i class="fa fa-check"></i>
                            </div>

                        </div>
                        <div class="col-sm-10" style="">
                            <h3>
                                WITHDRAW PROFITS
                            </h3>
                            <p class="">
                                You can withdraw your balance at any time.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 my-2">
                <img src="{{ asset('assets/images/off.jpg') }}" alt="" class="img-fluid">
            </div>
            <div class="col-md-6 my-2">
                <h2>
                    Our Services
                </h2>

                <p style="font-size: 20px"> Get to know how we can help you change your story</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 my-2">
                <div class="box-container box1 text-center">
                    <div ca>
                        <i class="fa fa-microchip"
                            style="
                            font-size: 65px;
                            margin: 50px 0 30px;
                            color: #fff;
                       "></i>
                    </div>
                    <h3>Crypto Investment</h3>
                    <h6 class="px-4" style="line-height: 1.5">
                        At TradeFund.com, we are poised to take our investors to a higher level of financial
                        independence. We achieve these with an array of carefully planned investment plans that suite all
                        pocket sizes
                    </h6>
                    <div class="button">
                        <a href="{{route('register')}}" class="btn btn-outline-secondary btn-large" style="color: #fff;">Get more
                            information</a>
                    </div>
                </div>

            </div>


            <div class="col-md-4 my-2">
                <div class="box-container box2 text-center">
                    <div ca>
                        <i class="fa fa-microchip"
                            style="
                            font-size: 65px;
                            margin: 50px 0 30px;
                            color: #fff;
                       "></i>
                    </div>
                    <h3>Financial Planning</h3>
                    <h6 class="px-4" style="line-height: 1.5">
                        Financial planning is the task of determining how a business will afford to achieve its strategic goals and objectives. Usually, at Cimishfx-investment.com, we have a set of experienced financial experts that do this.
                    </h6>
                    <div class="button">
                        <a href="{{route('register')}}" class="btn btn-outline-secondary btn-large" style="color: #fff;">Get more
                            information</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 my-2">
                <div class="box-container box3 text-center">
                    <div ca>
                        <i class="fa fa-user"
                            style="
                            font-size: 65px;
                            margin: 50px 0 30px;
                            color: #fff;
                       "></i>
                    </div>
                    <h3>Financial Advice</h3>
                    <h6 class="px-4" style="line-height: 1.5">
                        We provided good financial advice to all our investors to aid them make the right investments at the
                        right time. The overall goal is to always smile home with good returns at the end of the day.
                    </h6>
                    <div class="button">
                        <a href="{{route('register')}}" class="btn btn-outline-secondary btn-large" style="color: #fff;">Get more
                            information</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center my-2">
            <div class="col-md-8 text-center">
                <h2>
                    TRADEFUNDS-INVESTMENT Offers Top of the line Services
                </h2>
                <p>
                    we are giving offeres that no one is giving to there customers.
                </p>
            </div>
        </div>

        <div class="row justify-content-center my-4">
            <div class="col-md-3 justify-item-center">
                <div class="text-container">
                    <div class="text-center px-5">
                        <div class="rounded-circle"
                            style="background-color: #166485; margin-top: -60px; padding:10px; width: 55px; height:55px;">
                            <i class="fa fa-envelope fa-2x" style="
                            color: orange;"></i>
                        </div>
                        <div class="my-2">
                            <h3>
                                24/7 Free Consulting
                            </h3>

                        </div>
                        <div>
                            We have a customer care unit that will be there for you at all time. We respond within seconds
                            once you have any need to contact us.
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 my-2">
                <div class="text-container">
                    <div class="text-center px-5">
                        <div class="rounded-circle "
                            style="background-color: #166485; margin-top: -60px; padding:10px; width: 55px; height:55px;">
                            <i class="fa fa-rocket fa-2x" style="
                            color: orange;"></i>
                        </div>
                        <div class="my-2">
                            <h3>
                                More Than 5 Years EXPERIENCE
                            </h3>

                        </div>
                        <div>
                            Our investment sustainability is assured judging by the amount of experience we have gathered
                            over the years in cryptocurrency trading.
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 my-2">
                <div class="text-container">
                    <div class="text-center px-5">
                        <div class="rounded-circle"
                            style="background-color: #166485; margin-top: -60px; padding:10px; width: 55px; height:55px;">
                            <i class="fa fa-comment fa-2x" style="
                            color: orange;"></i>
                        </div>
                        <div class="my-2">
                            <h3>
                                24/7 Livechat Support
                            </h3>

                        </div>
                        <div>
                            Need a quick go through make a quick live chat with our sales agent for query.
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 my-2">
                <div class="text-container">
                    <div class="text-center px-5">
                        <div class="rounded-circle"
                            style="background-color: #166485; margin-top: -60px; padding:10px; width: 55px; height:55px;">
                            <i class="fa fa-comment fa-2x" style="
                            color: orange;"></i>
                        </div>
                        <div class="my-2">
                            <h3>
                                Instant Withdrawal
                            </h3>

                        </div>
                        <div>
                            No Limits for withdrawals with 100% Uptime Instant Withdrawals for all Payment methods
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row my-5">
            <div class="col-md-3">
                <div class="text-container">
                    <div class="text-center px-5">
                        <div class="rounded-circle"
                            style="background-color: #166485; margin-top: -60px; padding:10px; width: 55px; height:55px;">
                            <i class="fa fa-hdd-o fa-2x" aria-hidden="true"
                                style="
                            color: orange;"></i>
                        </div>
                        <div class="my-2">
                            <h3>
                                Trust Site lock
                            </h3>

                        </div>
                        <div>
                            Site Lock
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="text-container">
                    <div class="text-center px-5">
                        <div class="rounded-circle"
                            style="background-color: #166485; margin-top: -60px; padding:10px; width: 55px; height:55px;">
                            <i class="fa fa-server fa-2x" style="
                            color: orange;"></i>
                        </div>
                        <div class="my-2">
                            <h3>
                                24/7 Account Access
                            </h3>

                        </div>
                        <div>
                            Login - Deposit - Withdraw anytime.
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="text-container">
                    <div class="text-center px-5">
                        <div class="rounded-circle"
                            style="background-color: #166485; margin-top: -60px; padding:10px; width: 55px; height:55px;">
                            <i class="fa fa-database fa-2x" style="
                            color: orange;"></i>
                        </div>
                        <div class="my-2">
                            <h3>
                                No Fees
                            </h3>

                        </div>
                        <div>
                            We have no fees for any operation
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 my-2">
                <div class="text-container">
                    <div class="text-center px-5">
                        <div class="rounded-circle"
                            style="background-color: #166485; margin-top: -60px; padding:10px; width: 55px; height:55px;">
                            <i class="fa fa-exchange fa-2x" style="
                            color: orange;"></i>
                        </div>
                        <div class="my-2">
                            <h3>
                                SSL Protection
                            </h3>

                        </div>
                        <div>
                            Secured with the best SSL
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 my-2 text-center">


                <a href="btn btn-primary">
                    Get more information <i class="fa fa-arrow-right"></i>
                </a>
            </div>
        </div>

        <div class="row py-3">
            <div class="col-md-6 py-3" style=" background: #065892;">
                <h3 class="text-center">
                    Short FAQ
                </h3>
                <div class="row">
                    <div class="col-sm-6 my-2">
                        <h6 style="color: #be7b2e ">
                            Do I need any trading skills?
                        </h6>
                        <p>
                            Absolutely not, our asset management system works in such a way that our traders manage your
                            funds and professionally invest them, providing you with a guaranteed daily profit. This is 100%
                            passive income, regardless of your knowledge or skills.
                        </p>
                    </div>
                    <div class="col-sm-6 my-2">
                        <h6 style="color: #be7b2e">
                            What minimum and maximum amount can I invest?
                        </h6>
                        <p>
                            Minimum deposit amount: for the ALPHA plan it is $50, If you make a deposit using
                            cryptocurrencies, the declared amount will be converted at the current market exchange rate.
                        </p>
                    </div>
                    <div class="col-sm-12 my-2">
                        <h6 style="color: #be7b2e">
                            How long do I have to wait for withdrawal?
                        </h6>
                        <p>
                            The waiting time for withdrawal does not exceed 24 hours on all days of the year (including
                            weekends and holidays). In our 24/7 work, our operators always make payouts as quickly as
                            possible.
                        </p>
                    </div>

                    <div class="col-sm-12 my-2">
                        <h6 style="color: #be7b2e">
                            Minimum withdrawal amount:
                        </h6>
                        <p>
                            There is no maximum withdrawal amount. If you make a withdrawal using cryptocurrencies amount
                            will be converted at the current rate.
                        </p>
                    </div>
                </div>

            </div>
            <div class="col-md-6"></div>
        </div>
        <div class="row my-5 py-3" style="padding-left: 50px; padding-right: 50px">
            <div class="col-md-4 my-2">
                <div class="left-content">
                    <div class="features d-flex">
                        <div class="mt-2 mr-5 p-2">
                            <i style="width: 55px; height:50px;color: orange; padding-top: 4px; border: 1px solid rgba(255, 255, 255, 0.1)"
                                class="fa fa-cloud fa-2x  text-center align-middle"></i>
                        </div>

                        <div class="ml-2" style="margin-left:10px">
                            <h3 class="pl-5">
                                We're global
                            </h3>
                            <p>
                                We are team of global investment world, having a coverage of over 90% investment world
                            </p>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 my-2">
                <div class="left-content">
                    <div class="features d-flex">
                        <div class="mt-2 mr-5 p-2">
                            <i style="width: 55px; height:50px;color: orange; padding-top: 4px; border: 1px solid rgba(255, 255, 255, 0.1)"
                                class="fa fa-hdd-o fa-2x  text-center align-middle"></i>
                        </div>

                        <div class="ml-2" style="margin-left:10px">
                            <h3 class="pl-5">
                                best support
                            </h3>
                            <p>
                                We understand how important having reliable support service is to you. Please don't hesitate
                                to contact us should you have any questions and we will get back to you in 24 Hours!
                            </p>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 my-2">
                <div class="left-content">
                    <div class="features d-flex">
                        <div class="mt-2 mr-5 p-2">
                            <i style="width: 55px; height:50px;color: orange; padding-top: 4px; border: 1px solid rgba(255, 255, 255, 0.1)"
                                class="fa fa-rocket fa-2x  text-center align-middle"></i>
                        </div>

                        <div class="ml-2" style="margin-left:10px">
                            <h3 class="pl-5">
                                Litespeed Dedicated Servers
                            </h3>
                            <p>
                                We Accept Moderm crypto currency like Bitcoin etc .
                            </p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row py-5 " style="background-color: #065892;">
            <div class="col-sm-12 my-4 text-center">
                <h3>
                    Refferal Commission and Membership Level
                </h3>
            </div>
            <div class="col-sm-12 custom-earning-container">
                <div class="row">
                    <div class="col-md-3 px-2">

                        <div class="offset text-center py-2 px-4">
                            <img src="{{ asset('assets/images/f.png') }}" class="my-5" alt=""
                                style="width: 70px; height:70px">
                            <h3>
                                DIRECT REFERRAL - 10%
                            </h3>
                            <p>
                                Get On First Level Refferal Commission
                            </p>

                            <a href="btn btn-primary"> Get the deal</a>
                        </div>
                    </div>
                    <div class="col-md-6 py-5 px-5 app-bg-color1">
                        <h2>
                            Need help? Contact our award-winning support team
                        </h2>

                        <p>
                            Login to your account and create a support ticket our award wining support team will solve your
                            issue in maximum 8 hours.
                        </p>
                        <div class="mt-4">
                            <a href="#" class="btn btn-primary">
                                Contact us now <i></i>
                            </a>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-md-4  text-center" style="margin-top: 80px">
                <h3 class="my-5">
                    What our clients are saying?
                </h3>
                <div>
                    <a href="#" class="btn btn-primary" style="background-color: #be7b2e">
                        Check out all reviews
                    </a>
                </div>

            </div>

            <div class="col-md-8">
                <div id="carouselExampleSlidesOnly" class="row carousel slide" data-bs-ride="carousel">

                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row">
                                <div class="col-md-6 px-4 text-center " style="margin-top: 100px">
                                    <div class="py-3" style="background-color: #035482;">
                                        <img src="{{ asset('assets/images/tes3.jpg') }}" class="rounded-circle" alt=""
                                            style="width: 80px; height: 80px; margin-top: -40px">
            
                                        <div class="my-4 px-3">
                                            <blockquote>
                                                Tradefunds-investment.com is a good broker, investment deposits and withdrawals service is
                                                very
                                                fast. Investment is nice on their web platform, i like this
                                            </blockquote>
                                            <br>
                                            <div class="text-start">
                                                - Luther Eklund
                                            </div>
            
                                        </div>
                                    </div>
            
                                </div>
                                <div class="col-md-6 px-4 text-center " style="margin-top: 100px">
                                    <div class="py-3" style="background-color: #035482;">
                                        <img src="{{ asset('assets/images/tes4.jpg') }}" class="rounded-circle" alt=""
                                            style="width: 80px; height: 80px; margin-top: -40px">
            
                                        <div class="my-4 px-3">
                                            <blockquote>
                                                They are very responsive, open, and would go out of their way to assist. That is the most important bit for me. I haven't had any issues with the couple of withdrawals I've made so far, so it's a five from me
                                            </blockquote>
                                            <br>
                                            <div class="text-start">
                                                - Jules Ferrer
                                            </div>
            
                                        </div>
                                    </div>
            
            
            
            
                                </div>
                                
                            </div>
                            
                        </div>
                        <div class="carousel-item">
                            <div class="row">
                                <div class="col-md-6 px-4 text-center " style="margin-top: 100px">
                                    <div class="py-3" style="background-color: #035482;">
                                        <img src="{{ asset('assets/images/tes1.jpg') }}" class="rounded-circle" alt=""
                                            style="width: 80px; height: 80px; margin-top: -40px">
            
                                        <div class="my-4 px-3">
                                            <blockquote>
                                                Tradefunds-investment team is very professional, I have started to recommend to family, friends, and build my own team, to get passive income
                                            </blockquote>
                                            <br>
                                            <div class="text-start">
                                                - Mohammed Guti
                                            </div>
            
                                        </div>
                                    </div>
            
            
            
            
                                </div>
                                <div class="col-md-6 px-4 text-center " style="margin-top: 100px">
                                    <div class="py-3" style="background-color: #035482;">
                                        <img src="{{ asset('assets/images/tes2.jpg') }}" class="rounded-circle" alt=""
                                            style="width: 80px; height: 80px; margin-top: -40px">
            
                                        <div class="my-4 px-3">
                                            <blockquote>
                                                They are everything I was looking for! Stable platform, fast deposit, and fast withdrawal, great and ultra-responsive customer support. To be honest, at first I didn't think that I would like their service, but I'm glad I gave them a chance and I'm enjoying their service a lot!
                                            </blockquote>
                                            <br>
                                            <div class="text-start">
                                                - Rose Berry
                                            </div>
            
                                        </div>
                                    </div>
            
                                </div>
                            </div>
                        </div>
                        
                    </div>


                    
                </div>
            </div>


            <div class="row mt-5">
                <div class="col-sm-12 text-center py-5" style="background-color: #035482;">
                    <h2>
                        Stats Table
                    </h2>
                </div>
            </div>
            <div class="col-sm-12 my-4">
                <div class="row" style="background-color: #be7b2e;">
                    <div class="col-sm-6  py-5 px-5">
                        <h2>
                            Invest with confidence
                        </h2>

                        It's never to late to start investing in Crypto Currencies with Hedge Funds Companies like
                        Tradefunds-investment.com Germany Business Number is # 31642821092
                    </div>
                    <div class="col-sm-6 text-center py-3">
                        <h2>
                            <a href="#" class="btn btn-outline-secondary">Check Company's Certificate</a>
                        </h2>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
@section('price-marquee')
    <div class="price-section"
        style="background-color: #FFFFFF; overflow:hidden; box-sizing: border-box; border: 1px solid #56667F; border-radius: 4px; text-align: right; line-height:14px; block-size:40px; font-size: 12px; font-feature-settings: normal; text-size-adjust: 100%; box-shadow: inset 0 -20px 0 0 #56667F;padding:1px;padding: 0px; margin: 0px; width: 100%;">
        <div style="height:40px; padding:0px; margin:0px; width: 100%;"><iframe
                src="https://widget.coinlib.io/widget?type=horizontal_v2&theme=light&pref_coin_id=1505&invert_hover="
                width="100%" height="36px" scrolling="auto" marginwidth="0" marginheight="0" frameborder="0"
                border="0" style="border:0;margin:0;padding:0;"></iframe>
        </div>
    </div>
@endsection
