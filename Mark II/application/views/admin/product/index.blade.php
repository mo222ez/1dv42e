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
	        @if($products)
        	    <table id="tableProducts">
		        	<thead>
		                <tr>
		                	<th>Bild</th>
		                    <th>Art.nr</th>
		                    <th>Namn</th>
		                    <th>Kategori</th>
		                    <th>Försälj. pris inkl. moms</th>
		                    
		                    <th>{{ $types[1]->name }}</th>
		                    <th>Lager</th>

		                    <th>Moms</th>
		                    <th>Redigera</th>
		                    <th>Ta bort</th>
		                </tr>
		            </thead>
		            <tbody>
		                @forelse ($products->results as $product)
		                	<tr>
		                		@if($product->media)
		                			<td>{{ HTML::image('uploads/images/small/' . $product->media[0]->name, '', array('class' => 'productThumbnail')) }}</td>
		                		@else
		                			<td>Ingen bild</td>
		                		@endif
		                		<td>{{ $product->articlenr }}</td>
			                    <td>{{ $product->name }}</td>
			                    <td>{{ $product->category->name }}</td>
			                    <td>{{ $product->prices[1]->value * (($product->tax->value / 100) + 1) }}</td>
			                    <td>{{ $sortedDetails[$product->id][1]->value }} g</td>
			                    <td>{{ $product->stock->value }} st</td>
			                    <td>{{ $product->tax->value }} %</td>
			                    <td>
			                    	<a href="{{ URL::to_route('admin_edit_product', $product->id) }}">
			                    		{{ HTML::image('layout/edit.ico', 'editIcon', array('class' => 'tableIcon')) }}
			                    	</a>
			                    </td>
			                    <td>
			                    	{{ Form::open(URL::to_route('admin_delete_product', $product->id), 'DELETE', array('class' => 'deleteForm')) }}
		                        		{{ Form::submit('Radera', array('class' => 'btn btn-alert btn-M deleteFormButton')) }}
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

        	{{ $products->links() }}
	    </article> 
    </section>   
@endsection