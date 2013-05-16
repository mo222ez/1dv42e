<ol class="productList"> 
    @forelse ($products as $product)
		<li>
            <article>
                <a href="{{ URL::to_route('view_product', $product->id) }}">
                	{{ HTML::image('uploads/images/small/' . $product->media[0]->name) }}
                </a>
                
                <div class="productDescription">
                    <h4 class="productTitle" contenteditable="true" >
                        @if(strlen($product->name) >= 20)
                            {{ substr($product->name, 0, 17) . '...' }}
                        @else
                            {{ $product->name }}
                        @endif
                    </h4>
                    <p class="productText">
                        @if(strlen($product->short_description) >= 50)
                            {{ substr($product->short_description, 0, 47) . '...' }}
                        @else
                            {{ $product->short_description }}
                        @endif
                    </p>
                </div>
                
                <div class="productBuyAndPrice">
                    {{ Form::open(URL::to_route('add_product_to_cart'), 'POST', array('class' => 'left')) }}
                        {{ Form::submit('Köp', array('class' => 'productBuyButton btn btn-success')) }}
                        <!-- <a href="#" class="productBuyButton btn btn-success">Köp</a> -->
                    {{ Form::close() }}
                    <p class="productPrice">{{ $product->prices[1]->value * (($product->tax->value / 100) + 1)}} kr</p>
                </div>
            </article>
        </li>   
	@empty
	    <p>Inga produkter tillgängliga</p>
	@endforelse                                                     
</ol> 