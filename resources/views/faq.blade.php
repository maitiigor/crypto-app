@extends('layouts.frontend-app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            
            <div class="col-lg-12">
                <div class="faq-title-conatiner px-5 py-5">
                    <h1>
                        Frequently Asked Questions
                    </h1>
                </div>
                
            </div>
        </div>      
    </div> 
    <div class="container">
        <div class="pt-5 pb-3">
            <h3>Frequently Aksed Questions</h3>
        </div>
        <div class="accordion" id="accordionExample" style="background-color: #19233f">
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    What is TradeFund investment?
                </button>
              </h2>
              <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <strong>Does TradeFund investment have any liability to the investor?</strong><br>
                  Yes, the company is under the government regulator Companies House.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Can users register before 18?
                </button>
              </h2>
              <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <strong>No, Services are Provided to adults only </strong>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Do you have a business license?
                </button>
              </h2>
              <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <strong>Yes, the company has permission from Companies House, For More information can be found on the government website of the UK Registration Chamber - https://Cimishfx-investment.com/images/certificate.jpg</strong>
                </div>
              </div>
              
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="headingFour">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseThree">
                    Minimum and maximum investment?
                  </button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    <strong>An Investment can be any amount from 0.001 BTC to 10 BTC</strong>
                  </div>
                </div>
                
              </div>
          </div>

          <div class="accordion-item">
            <h2 class="accordion-header" id="headingFive">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseThree">
                Is it possible to register without a sponsor?
              </button>
            </h2>
            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <strong>Yes, You can register without a Sponsor.</strong>
              </div>
            </div>
            
          </div>

          <div class="accordion-item">
            <h2 class="accordion-header" id="headingSix">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseThree">
                How much does it cost to open an account?
              </button>
            </h2>
            <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <strong>Applications for withdrawal of funds will be processed instantly.</strong>
              </div>
            </div>
            
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingSeven">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseThree">
                Can I make several Investments at the same time?
              </button>
            </h2>
            <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <strong>If I become your representative, what benefits do I get?</strong>
              </div>
            </div>
            
          </div>

          <div class="accordion-item">
            <h2 class="accordion-header" id="headingEight">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseThree">
               I made a deposit from my cryptocurrency wallet, but it still isn't credited to my account. Why?
              </button>
            </h2>
            <div id="collapseEight" class="accordion-collapse collapse" aria-labelledby="headingEight" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <strong>Because you must always wait until 2 confirmations before it's credited to your traders-coin.com account, and it only depends on the speed of the Bitcoin network. These links are very useful for you: https://www.blockchain.com/btc/tx and https://www.blockchain.com/btc/unconfirmed-transactions.</strong>
              </div>
            </div>
            
          </div>
      </div>
    </div>       
@endsection