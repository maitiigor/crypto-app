@php
$current_user = auth()->user();
@endphp
<aside class="cps-nav-sidebar" id="cps-nav">
    <ul>
        <li>

            <a href="">
                <i class="fa fa-dashboard nav-icon"></i>
                Dashboard
            </a>

        </li>
        <li>
            <a href="#" class="dropdown-btn">
                <i class="fa fa-money nav-icon"></i>
                Deposit
                <span class="text-light" style="margin-left: 45px"><i class="fa fa-chevron-left"></i></span>
            </a>
            <ul class="drop-downlist d-none">
                @if ($current_user->hasRole('customer'))
                    <li class="">
                        <a href="{{ route('customer.deposit') }}"> Deposit </a>
                    </li>
                @endif

                <li class="">
                    <a
                        href={{ $current_user->hasRole('admin') ? route('deposits.index') : route('customer.deposit-list') }}>Deposit
                        list</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="{{ route('profile') }}">
                <i class="fa fa-list nav-icon"></i>
               <span>Account</span> 
            </a>

        </li>
        @if ($current_user->hasRole('admin'))
            <li class="">
                <a href="{{ route('payment_methods.index') }}" class="">
                    <i class="fa fa-money nav-icon"></i>
                    <span>  Payment Method </span>
                </a>

            </li>
        @endif

        @if ($current_user->hasRole('admin'))
        <li>
            <a href="{{ route('investment_plans.index') }}">
                <i class="fa fa-briefcase nav-icon"></i>
                <span> Investment Plans </span>
            </a>

        </li>
    @endif
        <li>
            <a href="{{  $current_user->hasRole('admin') ? route('referals.index') : route('customer.referals') }}">
                <i class="fa fa-users nav-icon"></i>
                <span> Referals </span>
            </a>
        </li>


        <li>
            <a href="{{ $current_user->hasRole('admin') ? route('earnings.index') : route('customer.earnings')   }}">
                <i class="fa fa-money nav-icon"></i>
                <span> Earnings </span>
            </a>
        </li>
        <li>
            <a href={{ $current_user->hasRole('customer') ? route('withdrawal') : route('withdrawals.index') }}>
                <i class="fa fa-dollar nav-icon"></i>
                <span> Withdrawals </span>
            </a>

        </li>
        @if ($current_user->hasRole('admin'))
            <li>
                <a href="{{ route('users.index') }}">
                    <i class="fa fa-users nav-icon"></i>
                    <span> Users </span>
                </a>
            </li>
        @endif

       {{--  <li>
            <a href="#">
                <i class="fa fa-ticket nav-icon"></i>
                Security
            </a>

        </li> --}}
        <li>
            <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                <i class="fa fa-user nav-icon"></i>
                <span> logout </span>
            </a>

        </li>
    </ul>

</aside>
