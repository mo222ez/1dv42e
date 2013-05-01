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
	        
	        @if($products)
        	    <table id="tableProducts">
		        	<thead>
		                <tr>
		                    <th>Art.nr:</th>
		                    <th>Namn:</th>
		                    <th>Kategori:</th>
		                    <th>{{ $types[1]->name }}</th>
		                    
		                    <th>{{ $types[3]->name }}</th>
		                    <th>Lager</th>

		                    <th>Moms</th>
		                    <th>Edit:</th>
		                    <th>Inställning:</th>
		                    <th>Ta bort</th>
		                </tr>
		            </thead>
		            <tbody>
		                @forelse ($products as $product)
		                	<tr>
		                		<td>{{ $product->articlenr }}</td>
			                    <td>{{ $product->name }}</td>
			                    <td>{{ $product->category->name }}</td>
			                    <td>{{ $sorted_details[$product->id][1]->value }} kr</td>
			                    <td>{{ $sorted_details[$product->id][3]->value }} kg</td>
			                    <td>{{ $product->stock->value }} st</td>
			                    <td>{{ $product->tax->value }} %</td>
			                    <td>
			                    	<a href="#.html">
			                    		{{ HTML::image('layout/edit.ico', 'editIcon', array('class' => 'tableIcon')) }}
			                    	</a>
			                    </td>
			                    <td>
			                    	<a href="#.html">
			                    		{{ HTML::image('layout/settings.ico', 'settingsIcon', array('class' => 'tableIcon')) }}
			                    	</a>
			                    </td>

			                    <td>
			                    	{{ Form::open(URL::to_route('admin_delete_product', $product->id), 'DELETE') }}
		                        		{{ Form::submit('Radera', array('class' => 'btn btn-alert btn-M')) }}
		                        	{{ Form::close() }}
			                    </td>
		                    </tr>
		                @empty
		                    <h4>
		                    	{{ HTML::link_to_route('admin_new_product', "Inga produkter, lägg till några!") }}
		                    </h4>
		                @endforelse

		            </tbody>
		        </table>
		    @else
		    	<h4>
                	{{ HTML::link_to_route('admin_new_product', "Inga produkter, lägg till några!") }}
                </h4>
        	@endif

	    </article> 
    </section>   
@endsection