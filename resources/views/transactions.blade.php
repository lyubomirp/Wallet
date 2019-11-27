@extends('layouts.layout')
@section('content')
    <div class="vertical-center">
        <div class="container text-center">
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Date</th>
                            <th scope="col">Commission fee</th>
                            <th scope="col">Requested amount</th>
                            <th scope="col">Total Balance</th>
                            <th scope="col">Currency</th>
                            <th scope="col">Type</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($transactions as $transaction)
                                <tr>
                                    <th scope="row">{{ date("d M Y", strtotime($transaction->created_at)) }}</th>
                                    <td>{{$transaction->commission_fee}}</td>
                                    <td>{{$transaction->requested_amount}}</td>
                                    <td>{{$transaction->total_balance}}</td>
                                    <td>{{$transaction->currency}}</td>
                                    <td>{{$transaction->type}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{asset('js/index_scripts.js')}}"></script>
@endsection