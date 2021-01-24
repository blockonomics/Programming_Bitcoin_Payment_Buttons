@extends('layouts.app')

@section('content')
    <div class="container" id="section-01">
        <div class = 'jumbotron'>
            <h1 style='text-align:center;'> Flash Sale!</h1>
            <hr>
            <div class='row justify-content-center' style="text-align: center;">
                @foreach($products as $product)
                <div class="card col-lg-3 col-md-1 m-2 p-2" style="background: #ccd9ff">
                    <img class="card-img-top" src="{{ Storage::url($product->image) }}.jpg" alt="Card image cap" width="50%" height="50%">
                    <div class="card-body">
                        <h5 class="card-title">{{$product->title}}</h5>
                        <p class="card-text">Click on below button to see an exciting purchase offer!</p>
                        <button type="button" class="btn btn-primary btnsubmit" style="width: 100%" value="{{$product->price}}" product="{{$product->title}}" >Price: {{$product->price}} USD</button>
                        
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="container" id="section-02" style="display:none">
        <div class = 'jumbotron'>
                <h1 style='text-align:center;'> Flash Sale!</h1><hr>
                <table class="table table-bordered table-hovered">
                    <thead>
                        <tr>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <th scope="row">Product</th>
                        <td id="productname">Otto</td>
                        </tr>
                        <tr>
                        <th scope="row">Current Price</th>
                        <td id="productval">Thornton</td>
                        </tr>
                        <tr>
                        <th scope="row">Color</th>
                        <td>
                            <div class="input-group">
                                <select class="custom-select" id="productclr">
                                    <option selected value="black"> Black</option>
                                    <option value="white">White</option>
                                    <option value="blue">Blue</option>
                                </select>
                            </div>
                        </td>
                        </tr>
                        <tr>
                        <th scope="row">Offer</th>
                        <td>
                            <div class="input-group">
                                <select class="custom-select" id="offer">
                                    <option selected value="0">-</option>
                                    <option value="1">OFFER25 - Get Flat 25% off upto 75USD</option>
                                    <option value="2">OFFER50 - Get 50 USD off</option>
                                    <option value="3">OFFER10 - Get Flat 10% off</option>
                                </select>
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="submit" id="offerbtn">Apply</button>
                                </div>
                            </div>
                        </td>
                        </tr>
                        <tr class="post-offer" style="display:none">
                        <th scope="row">New Price</th>
                        <td id="offeredprice">@twitter</td>
                        </tr>
                        <tr class="post-offer" style="display:none">
                        <th scope="row">Payment Link</th>
                        <td><a href="#" target="_blank" id="paymentlink">Click Here to Pay</a></td>
                        </tr>
                    </tbody>
                </table>

        </div>
    </div>

<script type="text/javascript">
    $(document).ready(function (){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $('.btnsubmit').on('click',function(e){
            e.preventDefault();
            $('#section-01').hide();
            $('#section-02').show();
            var productname = $(this).attr("product");
            var productval = $(this).attr("value") + " USD";
            $('#productname').text(productname);
            $('#productname').attr('name',productname);
            $('#productval').text(productval);
            $('#productval').attr('name',productval);
            $('#offeredprice').text(productval);
            $('#offeredprice').attr('name',productval);
        });
        $('#offerbtn').on('click',function(e){
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: "{{ route('new_link') }}",
                data: {
                    _token: CSRF_TOKEN,
                    product:  $('#productname').attr('name'),
                    value: $('#productval').attr('name'),
                    offer: $("#offer").val(),
                    color: $("#productclr").val(),
                },
                dataType: 'JSON',
                success: function(data){
                    $("#paymentlink").attr("href",data.link);
                    $("#offeredprice").text(data.price + " USD");
                    $('.post-offer').show();
                },
            });
        });
    });
</script>
@endsection