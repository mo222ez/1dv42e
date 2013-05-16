@layout('admin/template')

@section('title')

    Lagerstatus för produkter
    
@endsection

@section('submenu')

    {{ render('admin.product.submenu') }}
    
@endsection

@section('mainContent')
	<section>
	    <article>    
	        
	        <h3>Lagerstatus</h3>
	        @if($products)
        	    <table id="tableProducts">
		        	<thead>
		                <tr>
		                	<th>Bild</th>
		                    <th>Art.nr</th>
		                    <th>Namn</th>
		                    <th>Lager</th>
		                    <th>Redigera</th>
		                    <!-- <th>Inställning:</th> -->
		                    <th>Ta bort</th>
		                </tr>
		            </thead>
		            <tbody>
		                @forelse ($products as $product)
		                	<tr>
		                		@if($product->media)
		                			<td>{{ HTML::image('uploads/images/small/' . $product->media[0]->name, '', array('class' => 'productThumbnail')) }}</td>
		                		@else
		                			<td>Ingen bild</td>
		                		@endif
		                		<td>{{ $product->articlenr }}</td>
			                    <td>{{ $product->name }}</td>
			                    <td>{{ $product->stock->value }} st</td>
			                    <td>
			                    	<a href="{{ URL::to_route('admin_edit_product', $product->id) }}">
			                    		{{ HTML::image('layout/edit.ico', 'editIcon', array('class' => 'tableIcon')) }}
			                    	</a>
			                    </td>
			                    <!-- <td>
			                    	<a href="#.html">
			                    		{{ HTML::image('layout/settings.ico', 'settingsIcon', array('class' => 'tableIcon')) }}
			                    	</a>
			                    </td> -->

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