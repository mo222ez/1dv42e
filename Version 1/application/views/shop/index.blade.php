@layout('shop/template')

@section('title')

	Gotteboet Retro

@endsection

@section('shopContent')    
    
    <div id="firstPageNews"> 
        <div id="slideshow">
        	{{ HTML::image('layout/slideshowNews/1.jpg', '', array('class' => 'slideItem')) }}
        	{{ HTML::image('layout/slideshowNews/2.jpg', '', array('class' => 'slideItem')) }}
        	{{ HTML::image('layout/slideshowNews/3.jpg', '', array('class' => 'slideItem')) }}
        	{{ HTML::image('layout/slideshowNews/4.jpg', '', array('class' => 'slideItem')) }}
        	{{ HTML::image('layout/slideshowNews/5.jpg', '', array('class' => 'slideItem')) }}
        	{{ HTML::image('layout/slideshowNews/6.jpg', '', array('class' => 'slideItem')) }}
        	{{ HTML::image('layout/slideshowNews/7.jpg', '', array('class' => 'slideItem')) }}       	
        </div>  

        <div id="slideshowNavigation">                           
            <a href="" class="arrowLeft"></a>
            <a href="" class="square slideItemNavigation"></a>
            <a href="" class="square slideItemNavigation"></a>
            <a href="" class="square slideItemNavigation"></a>
            <a href="" class="square slideItemNavigation"></a>
            <a href="" class="square slideItemNavigation"></a>
            <a href="" class="square slideItemNavigation"></a>
            <a href="" class="square slideItemNavigation"></a>
            <a href="" class="arrowRight"></a>
        </div>                     
    </div>
    
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
@endsection