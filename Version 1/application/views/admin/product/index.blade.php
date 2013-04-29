@layout('admin/template')

@section('title')

    Produkter
    
@endsection

@section('submenu')

    {{ render('admin.product.submenu') }}
    
@endsection

@section('main_content')
	<section>
	    <article>    
	        
	        <h3>Tillgängliga produkter</h3>
	        
	        <div class="debug">

	        	{{ var_dump($products[0]->details()->where('detailtype_id', '=', '5')->get()) }}
	        </div>
	        <table id="tableProducts">
	        	<thead>
	                <tr>
	                    <th>Art.nr:</th>
	                    <th>Namn:</th>
	                    <th>Kategori:</th>
	                    <th>Pris:</th>
	                    
	                    <th>Vikt:</th>
	                    <th>Lager:</th>

	                    <th>Moms:</th>
	                    <th>Edit:</th>
	                    <th>Inställning:</th>
	                </tr>
	            </thead>
	            <tbody>
	                @forelse ($products as $product)
	                    
	                    <td> kr</td>                                
	                    <td>0.05 kg</td>
	                    <td>10 st</td>                                
	                    <td>25 %</td>
	                    <td><a href="#.html"><img class="tableIcon" src="layout/edit.ico" alt="editIcon"/></a></td>
	                    <td><a href="#.html"><img class="tableIcon" src="layout/settings.ico" alt="settingsIcon"/></a></td>
	                @empty
	                    <h4>
	                    	{{ HTML::link_to_route('admin_new_product', "Inga produkter, lägg till några!") }}
	                    </h4>
	                @endforelse
	                <tr>
	                    
	                </tr>

	            </tbody>
	        </table>


	    </article> 
    </section>   
@endsection