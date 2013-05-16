@layout('shop.template')

@section('title')

    Kundvagn
    
@endsection

@section('shopContent')
    {{ render('shop.cart.cartTemplate', array('cart' => $cart, 'sum' => $sum, 'totalAmountOfProducts' => $totalAmountOfProducts)) }}
    
    <div>
        {{ HTML::link_to_route('checkout', 'Till Kassan', '', array('class' => 'btn btn-success btn-XL')) }}
    </div>
@endsection