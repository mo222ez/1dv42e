@layout('admin/template')

@section('title')

    Produkter
    
@endsection

@section('submenu')

    {{ render('admin.product.submenu') }}
    
@endsection

@section('mainContent')
	<section>
	    <article>    
	        
	        <h3>Tillgängliga produkter</h3>
	        <div class="debug">
{{ var_dump($product->details) }}
			</div>


	    </article> 
    </section>   
@endsection