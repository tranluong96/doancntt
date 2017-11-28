@extends('templates.public.templates_index')
@section('title')
    products news 
@stop
@section('content')	
<div class="features_items"><!--features_items-->
    <h2 class="title text-center">Features Items</h2>
    @foreach( $products as $key => $value )
    <?php 
        $price = number_format($value->price,0,',','.');
        $chieckhau=0;
        $slug = str_slug($value->name); 
        if ($value->discount  > 0) {
            $phantram = 100 - $value->discount;
            $chieckhau =($value->price * $phantram)/100;
        }
    ?>
        @if($value->picture != "")
        @if( $value->active == 1 )
        <div class="col-sm-4">
            <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                        <img src="{{ asset('storage/products/'.$value->picture) }}" alt="" />
                        @if($value->discount > 0 )
                            <h2>${{ $chieckhau }}</h2>
                        @else
                            <h2>${{ $price }}</h2>
                        @endif
                        <p>{{ $value->name }}</p>
                        <a href="" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                    </div>
                    <div class="product-overlay">
                        <div class="overlay-content">
                            @if($value->discount > 0 )
                                <h2>${{ $chieckhau }}</h2>
                            @else
                                <h2>${{ $price }}</h2>
                            @endif
                            <p>{{ $value->name }}</p>
                            <a href="" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                        </div>
                    </div>
                </div>
                <div class="choose">
                    <ul class="nav nav-pills nav-justified">
                        <li><a href="{{ route('public.product_detail',['slug'=>$slug,'id'=>$value->id]) }}" class="btn btn-yellow"><i class="fa fa-list"></i>View detail</a></li>
                    </ul>
                </div>
            </div>
        </div>
        @endif
        @endif
    @endforeach
    
    
</div><!--features_items-->

<div class="row">
    <ul class="pagination">
        {{ $products->links() }}
    </ul>
</div>

@stop