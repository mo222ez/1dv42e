@layout('admin/template')

@section('title')

    Lägg till en ny produkt
    
@endsection

@section('submenu')

    {{ render('admin.product.submenu') }}
    
@endsection

@section('mainContent')
	<section>
		<article>
			{{ Form::open_for_files(URL::to_route('admin_create_product'), 'POST', array('class' => 'styleForm')) }}
		    	{{ Form::token() }}
		    	<h1>Ny produkt</h1>
		        <!-- name field -->
		        <div class="inputWrapper">
			        <div class="inputContainer">
			        	<p>{{ Form::label('name', 'Namn:') }}</p>
			        	{{ $errors->first('name', '<p class="error">:message</p>') }}
			        	<p>{{ Form::text('name', Input::old('name')) }}</p>
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
				        <p>{{ Form::text('articlenr', Input::old('articlenr')) }}</p>
			        </div>
		        	
		        	<div class="helpText">
		        		<p>Tillåtna tecken: [ A - Ö ]  [ 0-9 ]  [ - ]  [ . ]</p>
	        		</div>
	    		</div>

		        <!-- productdetails -->
		        @forelse ($detailtypes as $detailtype)
					<div class="inputWrapper">
				        <div class="inputContainer">
					        <p>{{ Form::label('productdetailtype_' . $detailtype->id, $detailtype->name) }}</p>
					        <p>{{ Form::text('productdetailtype_' . $detailtype->id) }}</p>
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
				        <p>{{ Form::text('purchasePrice', Input::old('purchasePrice')) }}</p>
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
				        <p>{{ Form::text('sellingPrice', Input::old('sellingPrice')) }}</p>

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
				        <p>{{ Form::text('stock', Input::old('stock')) }}</p>
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
						<p>{{ Form::select('tax', $taxes, 4) }}</p>
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
						<p>{{ Form::select('category', $categories) }}</p>
					</div>
		        	
		        	<div class="helpText">
		        		<p>Välj vilken kategori produkten ska hamna under.</p>
	        		</div>
	    		</div>

	    		<!-- image -->
	    		<h2>Bilder</h2>
                <div id="formImageContainer">
                    <div class="formImagePosition">
                        {{ Form::label('image', 'Bild 1:', array('class' => 'formImageName')) }}
                        {{ Form::file('image', array('class' => 'formImageInput')) }}
                    </div>
                </div>

                <!-- description -->
	    		<h2>Beskrivning</h2>
                <!-- shortDescription field -->
		        <div class="inputWrapper">
			        <div class="inputContainer">
				        <p>{{ Form::label('shortDescription', '"Kort" beskrivning:') }}</p>
				        {{ $errors->first('shortDescription', '<p class="error">:message</p>') }}
				        <p>{{ Form::text('shortDescription', Input::old('shortDescription')) }}</p>
			        </div>
		        	
		        	<div class="helpText">
		        		<p>Skriv en kort text som visas under din produkt vid översiktsvyn/produktlistan.</p>
	        		</div>
	    		</div>

	    		<!-- longDescription field -->
		        <div class="inputWrapper">
			        <div class="inputContainer">				        
				        {{ $errors->first('longDescription', '<p class="error">:message</p>') }}
				    	{{ Form::textarea('longDescription', Input::old('longDescription')) }}
			        </div>
		        	
		        	<div class="helpText">
		        		<p>Skriv en lång beskrivning som visas på produktens egna sida.</p>
	        		</div>
	    		</div>

		        <!-- submit button -->
		        <div id='registerButton'>
		        	{{ Form::submit('Spara den nya produkten', array('class' => 'btn btn-XL btn-success', 'id' => 'register')) }}
                </div>
		    {{ Form::close() }}
		</article>
	</section>
    
@endsection