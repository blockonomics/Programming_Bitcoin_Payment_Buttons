@extends('layouts.app')

@section('content')
    <div class="container">
        <div class = 'jumbotron'>
            <h1 style='text-align:center;'> Purchase History</h1>
            <hr>
            <table class="table table-bordered">
                <thead>
                    <tr>
                    <th scope="col">Product Name</th>
                    <th scope="col">Color</th>
                    <th scope="col">Price</th>
                    <th scope="col">Status</th>
                    <th scope="col">Date</th>
                    <th scope="col">Bitcoin Address</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transactions as $transaction)
                    <tr>
                    <th scope="row">{{$transaction->product_name}}</th>
                    <td>{{$transaction->color}}</td>
                    <td>{{$transaction->offered_price}}</td>
                    <td>
                        @if ($transaction->status === '-2') Expired
                        @elseif ($transaction->status === '-1') Error
                        @elseif ($transaction->status === '0') Unpaid
                        @elseif ($transaction->status === '1') In Process
                        @elseif ($transaction->status === '2') Paid
                        @endif
                    </td>
                    <td>{{$transaction->created_at}}</td>
                    <td>{{$transaction->address}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection