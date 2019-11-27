@extends('layouts.layout')
@section('content')
    <div class="vertical-center">
    <div class="container text-center">
        <div class="card">
            @if (\Session::has('success'))
                <div id="successMessage" class="alert alert-success">
                    <h4>{!! \Session::get('success') !!}</h4>
                </div>
            @endif
            <div class="card-body">
                <h5 class="card-title float-left p-4">Wallet Control Panel</h5>
                <div class="currency_changer float-right form-group">
                    <label for="selected_currency">Selected currency</label>
                    <select id="selected_currency" class="form-control">
                        <option selected value="usd">Dollar (USD)</option>
                        <option  value="eur">Euro (Eur)</option>
                        <option  value="gbp">British Pound (GBP)</option>
                    </select>
                </div>
                <p class="card-text inline-block">Current balance: <b>{{ $balance }} {{$currency ?? ''}}</b></p>

                <a href="{{route('deposit')}}" class="btn btn-primary">Deposit</a>
                <a href="{{route('withdraw')}}" class="btn btn-primary">Withdraw</a>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script src="{{asset('js/index_scripts.js')}}"></script>
@endsection