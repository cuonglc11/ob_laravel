@extends('layouts.admin')

@section('content')
    <div class="row list_content" >
        <div class="col-lg-3 item_dash">
            <img src="{{asset('admin/img/xu.svg')}}"/> <span>Purchase 0B Token Now</span>
            <div class="content_item">
                <p class="private">Private Sale is Live!</p>
                <p>Purchase 0B at the lowest price at 0.40 USDT. Available to a limited number of users. Hurry up and buy now!</p>

            </div>
          <div>
            <button>Purchase Now!</button>
          </div>

        </div>
        <div class="col-lg-3 item_dash">
            <img src="{{asset('admin/img/token_3d.svg')}}"/> <span>Airdrop starts in:</span>
            <div class="content_item">
            <p>Airdrop is ongoing! <br/>
                Do the tasks and get a chance to win.</p>
            </div>
            <div class="button_div">
            <button>Take Part In Airdrop</button>
            </div>
        </div>
        <div class="col-lg-3 item_dash">
            <img src="{{asset('admin/img/token_4d.svg')}}"/> <span>Take Part in Referral Program</span>
            <div class="content_item">
            <p>Earn up to 10% of each purchase your friends make  <br/>
                in  BNB or 0B!</p>
            </div>
            <div class="button_div">
            <button>Take Part</button>
            </div>

        </div>

    </div>
    <div class="row  item_content_2">
     <div class="col-md-6">cdcsd</div>
     <div class="col-md-6">cdcsd</div>

    </div>
@endsection
