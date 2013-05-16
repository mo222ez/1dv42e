<div id="cartContentText">
    {{ HTML::image('layout/cart.png') }}
    <p>Du har <span class="blueText bold">{{ $totalAmountOfProducts }}</span> produkter i din kundvagn, summa 
    <span class="blueText bold"> {{ $sum }} kr</span></p>
</div>

<div id="goToCart">
    {{ HTML::link_to_route('view_cart', 'Visa kundvagn') }}
    {{ HTML::link_to_route('checkout', 'Till Kassan') }}
</div>