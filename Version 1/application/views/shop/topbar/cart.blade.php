<div id="cartContentText">
    {{ HTML::image('layout/cart.png') }}
    <p>Du har <span>2</span> produkter i din kundvagn, summa 
    <span> 700,00 kr</span></p>
</div>

<div id="goToCart">
    {{ HTML::link_to_route('viewCart', 'Visa kundvagn') }}
    {{ HTML::link_to_route('checkout', 'Till Kassan') }}
</div>