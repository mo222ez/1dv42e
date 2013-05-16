<ol class="productList">
        
        @forelse ($products as $product)
    		<li>
	            <article>
	                <a href="#">
	                	{{ HTML::image('uploads/images/small/' . $product->media[0]->name) }}
	                </a>
	                
	                <div class="productDescription">
	                    <h4 class="productTitle">{{ $product->name }}</h4>
	                    <p class="productText">{{ $product->description }}</p>
	                </div>
	                
	                <div class="productBuyAndPrice">
	                    <a href="#" class="productBuyButton btn btn-success">Köp</a>
	                    <p class="productPrice">{{ $product->prices[1]->value * (($product->tax->value / 100) + 1)}} kr</p>
	                </div>
	            </article>
	        </li>   
    	@empty
    	    <p>Inga produkter tillgängliga</p>
    	@endforelse                                                     
    </ol>    