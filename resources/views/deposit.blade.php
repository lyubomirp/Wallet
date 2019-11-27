@extends('layouts.layout')
@section('content')
    <div class="vertical-center">
    <div class="container text-center">
        <div class="card">
            <div class="card-body">
                <button class="btn btn-info position-absolute swap"
                        onclick="window.location.href='{{route('withdraw')}}'">Swap to withdraw</button>
                <h5 class="card-title">Deposit</h5>
                <form action="{{route('submit_deposit')}}" method="POST">
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <label for="requested_amount">Deposit Amount</label>
                        <div class="d-flex justify-content-center">
                        <input type="number" class="form-control" id="requested_amount"
                               aria-describedby="requested_amount" name="requested_amount" step=".01" placeholder="Amount you want to deposit">
                        </div>
                        @if($errors->has('requested_amount'))
                            <div class="error">{{ $errors->first('requested_amount') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="currency">Currency</label>
                        <div class="d-flex justify-content-center">
                            <select id="currency" name="currency" class="form-control">
                                <option selected value="eur">Euro (EUR)</option>
                                <option value="usd">Dollar (USD)</option>
                                <option value="gbp">Pound (GBP)</option>
                            </select>
                        </div>
                        @if($errors->has('currency'))
                            <div class="error">{{ $errors->first('currency') }}</div>
                        @endif
                        <small class="rate usd_rate">Current Euro to USD rate: <b>{{$result['rates']['USD']}}</b></small>
                        <small class="rate gbp_rate">Current Euro to GBP rate: <b>{{$result['rates']['GBP']}}</b></small>
                    </div>
                    <div class="form-group">
                        <label for="commission_fee">Commission fee</label>
                        <div class="d-flex justify-content-center">
                            <input type="number" name="commission_fee" readonly class="form-control" id="commission_fee"
                                   aria-describedby="commission_fee" placeholder="Our commission fee">
                        </div>
                        @if($errors->has('commission_fee'))
                            <div class="error">{{ $errors->first('commission_fee') }}</div>
                        @endif
                        <small class="commission_fee_disclaimer">Our commission fee is 0.03% of every deposit and it will NEVER exceed <b>5 eur</b></small>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Make deposit">
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
@section('scripts')
    <script src="{{asset('js/deposit_scripts.js')}}"></script>
@endsection