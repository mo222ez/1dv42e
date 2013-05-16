@layout('shop.template')

@section('title')

    {{ $product->name }} - Gotteboet Retro
    
@endsection

@section('shopContent')

<div id="singleProduct">
    <div id="singleProductImage">
        <a href="#" class="bigImage" >
            {{ HTML::image('uploads/images/big/' . $product->media[0]->name) }}
        </a>

        <div id="singleProductImageThumb">
            <a href="#" class="thumbNails" >
                {{ HTML::image('uploads/images/thumb/' . $product->media[0]->name) }}
            </a>
        </div>
    </div>


    <div id="singleProductDescription">
        <h4 class="singleProductTitle">{{ $product->name }}</h4>
        <p>{{ $product->short_description }}</p>
        <p class="singleProductPrice">{{ $product->prices[1]->value * (($product->tax->value / 100) + 1)}} kr</p>

        <div id="buyOptions">
            <table>
                {{ Form::open(URL::to_route('add_product_to_cart', $product->id), 'POST', array('class' => '')) }}    
                    <tr>
                        <td><strong>Antal</strong></td>
                    </tr>
                    <tr>
                        <td>
                            {{ Form::text('amount', '1', array('size' => '2')) }}
                        </td>
                        <td>
                            {{ Form::hidden('productID', $product->id) }}
                            {{ Form::submit('Lägg i kundvagnen', array('class' => 'singleProductBuyButton btn btn-success')) }}
                        </td>
                    </tr>
                {{ Form::close() }}           
            </table>
            <table>
                <tr>
                    <td>
                        <p class="singleProductStockInfo">
                            @if(intval($product->stock->value) >= 25)
                                <span class="stock-high bold">{{ $product->stock->value }}</span> i lager
                            @endif

                            @if(intval($product->stock->value) < 25 && intval($product->stock->value) >= 10 )
                                <span class="stock-medium bold">{{ $product->stock->value }}</span> i lager
                            @endif

                            @if(intval($product->stock->value) < 10 && intval($product->stock->value) > 1)
                                <span class="stock-low bold">{{ $product->stock->value }}</span> i lager
                            @endif
                            
                            @if(intval($product->stock->value) == 0)
                                <span class="stock-low bold">Slutsålt</span>
                            @endif
                        </p>
                        <p class="singleProductShipmentInfo">Leveranstid: <span>1-3 dagar</span></p>
                    </td>
                </tr>
            </table>
        </div>

        <div id="singleProductAllText"> 
            {{ $product->long_description }}
        </div> 
    </div><!-- END singleProductDescription -->
</div>
<!--<div id="singleProductInformation">
    <h3>Specifikationer</h3>
    <p>{{ $product->long_description }}</p>
</div>-->
@endsection