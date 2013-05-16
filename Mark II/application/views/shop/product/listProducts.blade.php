@layout('shop.template')

@section('title')
	
	Gotteboet Retro

	@if($currentCategory)
	     - {{ $currentCategory->name }}
	@endif
    
@endsection

@section('shopContent')

	{{ render('shop.product.listProductsTemplate', array('products' => $products)) }}
    
@endsection

	   