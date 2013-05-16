@layout('admin/template')

@section('title')

    Redigera produkt: {{ $product->name }}
    
@endsection

@section('submenu')

    {{ render('admin.product.submenu') }}
    
@endsection

@section('mainContent')
	<section>
		<article>
			{{ Form::open_for_files(URL::to_route('admin_edit_save_product', $product->id), 'POST', array('class' => 'styleForm')) }}
		    	{{ Form::token() }}
		    	{{ Form::hidden('productID', $product->id) }}
		    	<h2>Produkt</h2>
		        <!-- name field -->
		        <div class="inputWrapper">
			        <div class="inputContainer">
			        	<p>{{ Form::label('name', 'Namn:') }}</p>
			        	{{ $errors->first('name', '<p class="error">:message</p>') }}
			        	<p>{{ Form::text('name', $product->name) }}</p>
			        </div>
			        <div class="helpText">
			        	<p>Endast bokstäver.</p>
			        </div>
	    		</div>

		        <h2>Värden</h2>
		        <!-- articlenr field -->
			    <div class="inputWrapper">
			        <div class="inputContainer">    
				        <p>{{ Form::label('articlenr', 'Art. nr:') }}</p>
				        {{ $errors->first('articlenr', '<p class="error">:message</p>') }}
				        <p>{{ Form::text('articlenr', $product->articlenr) }}</p>
			        </div>
		        	
		        	<div class="helpText">
		        		<p>Tillåtna tecken: [ A - Ö ]  [ 0-9 ]  [ - ]  [ . ]</p>
	        		</div>
	    		</div>

		        <!-- productdetails -->
		        @forelse ($details as $detail)
		            <div class="inputWrapper">
		            	<div class="inputContainer">
		            		<p>{{ Form::label('productdetailtype_' . $detail->detailtype_id, $detail->detailtype->name) }}</p>
		            		<p>{{ Form::text('productdetailtype_' . $detail->detailtype_id, $detail->value) }}</p>
		            	</div>
		            	<div class="helpText">
		            		<!-- <p>Tillåtna tecken: [ A - Ö ]  [ 0-9 ]  [ - ]  [ . ]</p> -->
		            	</div>
		            </div>
		        @empty
		            <h3>Nåt är nog fel...</h3>
		        @endforelse

		        <!-- purchasePrice field -->
		        <div class="inputWrapper">
			        <div class="inputContainer">
				        <p>{{ Form::label('purchasePrice', 'Inköpspris (exkl. moms):') }}</p>
				        {{ $errors->first('purchasePrice', '<p class="error">:message</p>') }}
				        <p>{{ Form::text('purchasePrice', $product->prices[0]->value) }}</p>
			        </div>
		        	
		        	<div class="helpText">
		        		<p>Formatering: siffor, 333:33</p>
	        		</div>
	    		</div>

		        <!-- sellingPrice field -->
		        <div class="inputWrapper">
			        <div class="inputContainer">
				        <p>{{ Form::label('sellingPrice', 'Pris (exkl. moms):') }}</p>
				        {{ $errors->first('sellingPrice', '<p class="error">:message</p>') }}
				        <p>{{ Form::text('sellingPrice', $product->prices[1]->value) }}</p>

			        </div>
		        	
		        	<div class="helpText">
		        		<p>Formatering: siffor, 333:33</p>
	        		</div>
	    		</div>

		        <!-- stock field -->
			    <div class="inputWrapper">
			        <div class="inputContainer">    
				        <p>{{ Form::label('stock', 'Lager:') }}</p>
				        {{ $errors->first('stock', '<p class="error">:message</p>') }}
				        <p>{{ Form::text('stock', $product->stock->value) }}</p>
			        </div>
		        	
		        	<div class="helpText">
		        		<p>Tillåtna tecken: [ 0-9 ] </p>
	        		</div>
	    		</div>

	    		<!-- tax field -->
	    		<div class="inputWrapper">
			        <div class="inputContainer">
						<p>{{ Form::label('tax', 'Moms:') }}</p>
						{{ $errors->first('tax', '<p class="error">:message</p>') }}
						<p>{{ Form::select('tax', $taxes, $product->tax_id) }}</p>
					</div>
		        	
		        	<div class="helpText">
		        		<p>Välj vilken moms produkten ska ha.</p>
	        		</div>
	    		</div>


				<h2>Kategori</h2>

				<!-- category field -->
				<div class="inputWrapper">
			        <div class="inputContainer">
						<p>{{ Form::label('category', 'Kategori:') }}</p>
						{{ $errors->first('category', '<p class="error">:message</p>') }}
						<p>{{ Form::select('category', $categories, $product->category_id) }}</p>
					</div>
		        	
		        	<div class="helpText">
		        		<p>Välj vilken kategori produkten ska hamna under.</p>
	        		</div>
	    		</div>

	    		<!-- image -->
	    		<h2>Bilder</h2>
	    		{{ HTML::image('uploads/images/big/' . $product->media[0]->name) }}
                <div id="formImageContainer">
                    <div class="formImagePosition">
                        {{ Form::label('image', 'Bild 1:', array('class' => 'formImageName')) }}
                        {{ Form::file('image', array('class' => 'formImageInput')) }}
                    </div>
                </div>

                <!-- description -->
	    		<h2>Beskrivning</h2>
                <!-- short_desc field -->
		        <div class="inputWrapper">
			        <div class="inputContainer">
				        <p>{{ Form::label('shortDescription', '"Kort" beskrivning:') }}</p>
				        {{ $errors->first('shortDescription', '<p class="error">:message</p>') }}
				        <p>{{ Form::text('shortDescription', $product->short_description) }}</p>
			        </div>
		        	
		        	<div class="helpText">
		        		<p>Skriv en kort beskrivning om din produkt.</p>
	        		</div>
	    		</div>

	    		<!-- long_desc field -->
		        <div class="inputWrapper">
			        <div class="inputContainer">				        
				        {{ $errors->first('longDescription', '<p class="error">:message</p>') }}
				    	{{ Form::textarea('longDescription', $product->long_description) }}
			        </div>
		        	
		        	<div class="helpText">
		        		<p>Skriv en lång beskrivning som visas på produktens egna sida.</p>
	        		</div>
	    		</div>

		        <!-- submit button -->
		        <div id='registerButton'>
		        	{{ Form::submit('Spara produkten', array('class' => 'btn btn-XL btn-success', 'id' => 'register')) }}
                </div>
		    {{ Form::close() }}
		</article>
	</section>
    
@endsection