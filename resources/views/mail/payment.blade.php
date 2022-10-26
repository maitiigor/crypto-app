<div style="padding: 10px">
    <div style="text-align:center">
        <img src="{{ asset('assets/images/logo.jpeg') }}" style="width: 100vw; height: 200px" alt="" /> <br />
    </div>
    <br>
        Hello <strong>{{$payment->withdrawal->user->name}}</strong>, <br><br>

        Tradefunds-investment withdrawal of <strong>${{$payment->withdrawal->amount}}</strong> has been successfully sent to your {{$payment->withdrawal->address_type}} address you provided.<br><br>
        withdrawal account details <br>
        Wallet Address : {{$payment->withdrawal->address}}.<br><br>
        
   
    <div style="text-align: center">
        <strong style="text-align: center">Thanks for using Tradefunds-investment.com as your choice!!!.</strong><br>
        Copyrights 2016 <a href="https://tradefunds-investment.com" target="_blank" rel="noopener noreferrer">http://tradefunds-investment.com</a>
    </div>
</div>




