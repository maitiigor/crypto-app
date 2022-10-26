
    <div style="padding: 10px">
        <div style="text-align:center">
            <img src="{{ asset('assets/images/logo.jpeg') }}" style="width: 100vw; height: 200px" alt="" /> <br />
        </div>
        <br>
        Hello <strong>{{ $deposit->user->name }}</strong>, <br /><br>

        Your deposit of ${{ $deposit->amount }} via {{ $deposit->network }} has been successfully confirmed <br>
        <strong>Details of your Transaction</strong> <br />

        Amount: ${{ $deposit->amount }} <br />
        Plan: {{ $deposit->investment_plan->name }} <br />
        Payment Method: {{strtoupper($deposit->network)}} <br/>

       
        <br />
        <div style="text-align: center">
            <strong> Thanks for using Tradefunds-investment.com as your choice!!!. </strong><br>
            Copyrights 2016 <a href="https://tradefunds-investment.com" target="_blank"
                rel="noopener noreferrer">tradefunds-investment</a>
        </div>
   
    </div>
        
