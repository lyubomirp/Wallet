@extends('layouts.layout')
@section('content')
    <div class="login100-pic js-tilt" data-tilt>
        <img src="images/img-01.png" alt="IMG">
    </div>

    <div class="login100-form validate-form">
    @if (\Session::has('success'))
        <div id="successMessage" class="alert alert-success">
            <span class="login100-form-title success">{!! \Session::get('success') !!}</span>
        </div>
    @endif
    <span class="login100-form-title">
						Wallet Control Panel
					</span>

    <div class="wrap-input100">
        <select id="selected_currency" class="input100">
            <option selected value="usd">Dollar (USD)</option>
            <option value="eur">Euro (Eur)</option>
            <option value="gbp">British Pound (GBP)</option>
        </select>
        <span class="focus-input100"></span>
        <span class="symbol-input100">
							<i class="fa fa-money" aria-hidden="true"></i>
						</span>
    </div>
    <div class="wrap-input100 validate-input">
        <p class="card-text inline-block input100">Balance: <b>{{ $balance }} {{$currency ?? ''}}</b></p>
        <span class="focus-input100"></span>
        <span class="symbol-input100">
							<i id="currency_symbol" class="fa fa-{{$currency ?? ''}}" aria-hidden="true"></i>
						</span>
    </div>


    <div class="container-login100-form-btn">
        <a href="{{route('deposit')}}" class="login100-form-btn">
            Deposit
        </a>
    </div>

    <div class="container-login100-form-btn w-50">
        <a href="{{route('withdraw')}}" class="login100-form-btn">
            Withdraw
        </a>
    </div>
    </div>

@endsection
@section('scripts')
    <script src="{{asset('js/index_scripts.js')}}"></script>
@endsection