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
        </div>  

        <div id="slideshowNavigation">                           
            <a href="" class="arrowLeft"></a>
            <a href="" class="square slideItemNavigation"></a>
            <a href="" class="square slideItemNavigation"></a>
            <a href="" class="square slideItemNavigation"></a>
            <a href="" class="square slideItemNavigation"></a>
            <a href="" class="square slideItemNavigation"></a>
            <a href="" class="arrowRight"></a>
        </div>                     
    </div>
    
    {{ render('shop.product.listProductsTemplate', array('products' => $products)) }}    
@endsection