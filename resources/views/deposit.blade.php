@extends('layouts.layout')
@section('content')
    <div class="login100-form validate-form d-w-form">
        <div class="container-login100-form-btn w-100 swap">
            <a href="{{route('withdraw')}}" class="login100-form-btn">
                Swap to withdraw
            </a>
        </div>
        <span class="login100-form-title">
						Deposit
					</span>
        <div class="vertical-center">
            <div class="container text-center">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('submit_deposit')}}" method="POST">
                            {!! csrf_field() !!}
                            <input type="hidden" id="commission_rate" value="{{$commission_rate}}">
                            <input type="hidden" id="max_commission" value="{{$max_commission}}">
                            <div class="form-group">
                                <div class="wrap-input100 validate-input">
                                    <input class="input100" type="number" id="requested_amount"
                                           aria-describedby="requested_amount" name="requested_amount" step=".01"
                                           placeholder="Deposit amount">
                                    <span class="focus-input100"></span>
                                </div>
                                @if($errors->has('requested_amount'))
                                    <div class="error">{{ $errors->first('requested_amount') }}</div>
                                @endif
                            </div>
                            <div class="wrap-input100">
                                <i class="fa fa-chevron-down m-l-5 dropdown-arrow" aria-hidden="true"></i>
                                <select id="currency" name="currency" class="input100">
                                    <option selected value="eur">Euro (EUR)</option>
                                    <option value="usd">Dollar (USD)</option>
                                    <option value="gbp">Pound (GBP)</option>
                                </select>

                                <span class="focus-input100"></span>
                                <span class="symbol-input100">
							<i class="fa fa-money" aria-hidden="true"></i>
						</span>
                            </div>
                            @if($errors->has('currency'))
                                <div class="error">{{ $errors->first('currency') }}</div>
                            @endif
                            <small class="rate usd_rate">Current Euro to USD rate: <b>{{$result['rates']['USD']}}</b>
                            </small>
                            <small class="rate gbp_rate">Current Euro to GBP rate: <b>{{$result['rates']['GBP']}}</b>
                            </small>
                            <div class="form-group">
                                <div class="wrap-input100 validate-input">
                                    <input class="input100" type="number" name="commission_fee"
                                           id="commission_fee"
                                           aria-describedby="commission_fee" readonly placeholder="Our commission fee"
                                           step=".01">
                                    <span class="focus-input100"></span>
                                </div>
                                @if($errors->has('commission_fee'))
                                    <div class="error">{{ $errors->first('commission_fee') }}</div>
                                @endif

                                <small class="commission_fee_disclaimer">Our commission fee is 0.03% of every deposit
                                    and it
                                    will NEVER exceed <b>5 eur</b></small>
                            </div>
                            <div class="container-login100-form-btn w-50">
                                <button type="submit" class="login100-form-btn">
                                    Deposit
                                </button>
                            </div>
                            <div class="text-center p-t-12">
                                <a class="txt2" href="{{route('index')}}">
                                    Back to home
                                    <i class="fa fa-long-arrow-left m-l-5" aria-hidden="true"></i>
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{asset('js/deposit_scripts.js')}}"></script>
@endsection