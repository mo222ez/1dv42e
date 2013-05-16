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
			{{ Form::open() }}
		    	{{ Form::token() }}
		    	<h2>Produkt</h2>
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

		        <!-- short_desc field -->
		        <div class="inputWrapper">
			        <div class="inputContainer">
				        <p>{{ Form::label('short_desc', '"Kort" beskrivning:') }}</p>
				        {{ $errors->first('short_desc', '<p class="error">:message</p>') }}
				        <p>{{ Form::text('short_desc', Input::old('short_desc')) }}</p>
			        </div>
		        	
		        	<div class="helpText">
		        		<p>Skriv en kort beskrivning om din produkt.</p>
	        		</div>
	    		</div>

		        <!-- long_desc field 
		        <div class="inputWrapper">
			        <div class="inputContainer">
				        <p>{{ Form::label('long_desc', 'Lång beskrivning:') }}</p>
				        {{ $errors->first('long_desc', '<p class="error">:message</p>') }}
				        <p>{{ Form::text('long_desc', Input::old('long_desc')) }}</p>
			        </div>
		        	
		        	<div class="helpText">
		        		<p>Skriv en kort beskrivning om din produkt.</p>
	        		</div>
	    		</div>-->

		        <h2>SEO</h2>
		        <!-- tags field 
		        <div class="inputWrapper">
			        <div class="inputContainer">
				        <p>{{ Form::label('tags', 'Taggar:') }}</p>
				        {{ $errors->first('tags', '<p class="error">:message</p>') }}
				        <p>{{ Form::text('tags', Input::old('tags')) }}</p>				    
				    </div>
		        	
		        	<div class="helpText">
		        		<p>Skriv en kort beskrivning om din produkt.</p>
	        		</div>
	    		</div>-->

		        <h2>Övrigt</h2>
		        <!-- 
		        <p>{{ Form::label('show_on_news', 'Visa denna produkt på nyhetssidan:') }}</p>
		        {{ $errors->first('show_on_news', '<p class="error">:message</p>') }}
		        <p>{{ Form::text('show_on_news', Input::old('show_on_news')) }}</p>
		        
		        
		        <p>{{ Form::label('show_as_offer', 'Visa denna produkt som ett erbjudande:') }}</p>
		        {{ $errors->first('show_as_offer', '<p class="error">:message</p>') }}
		        <p>{{ Form::text('show_as_offer', Input::old('show_as_offer')) }}</p>

		        
		        <p>{{ Form::label('manufacturer', 'Tillverkare:') }}</p>
		        {{ $errors->first('manufacturer', '<p class="error">:message</p>') }}
		        <p>{{ Form::text('manufacturer', Input::old('manufacturer')) }}</p>

		        
		        <p>{{ Form::label('related_products', 'Relaterade produkter:') }}</p>
		        {{ $errors->first('related_products', '<p class="error">:message</p>') }}
		        <p>{{ Form::text('related_products', Input::old('related_products')) }}</p>-->

		        <h2>Värden</h2>
		        <!-- articelnr field -->
			    <div class="inputWrapper">
			        <div class="inputContainer">    
				        <p>{{ Form::label('articelnr', 'Art. nr:') }}</p>
				        {{ $errors->first('articelnr', '<p class="error">:message</p>') }}
				        <p>{{ Form::text('articelnr', Input::old('articelnr')) }}</p>
			        </div>
		        	
		        	<div class="helpText">
		        		<p>Tillåtna tecken: [ A - Ö ]  [ 0-9 ]  [ - ]  [ . ]</p>
	        		</div>
	    		</div>

		        <!-- ean_code field 
		        <p>{{ Form::label('ean_code', 'EAN / Tillv.art.nr:') }}</p>
		        {{ $errors->first('ean_code', '<p class="error">:message</p>') }}
		        <p>{{ Form::text('ean_code', Input::old('ean_code')) }}</p>-->

		        <!-- selling_price field -->
		        <div class="inputWrapper">
			        <div class="inputContainer">
				        <p>{{ Form::label('selling_price', 'Pris (exkl. moms):') }}</p>
				        {{ $errors->first('selling_price', '<p class="error">:message</p>') }}
				        <p>{{ Form::text('selling_price', Input::old('selling_price')) }}</p>

			        </div>
		        	
		        	<div class="helpText">
		        		<p>Formatering: siffor, 333:33</p>
	        		</div>
	    		</div>

		        <!-- purchase_price field -->
		        <div class="inputWrapper">
			        <div class="inputContainer">
				        <p>{{ Form::label('purchase_price', 'Inköpspris (exkl. moms):') }}</p>
				        {{ $errors->first('purchase_price', '<p class="error">:message</p>') }}
				        <p>{{ Form::text('purchase_price', Input::old('purchase_price')) }}</p>
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
		        		<p>Endast siffror.</p>
	        		</div>
	    		</div>


				<!-- weight field -->
				<div class="inputWrapper">
			        <div class="inputContainer">
						<p>{{ Form::label('weight', 'Vikt:') }}</p>
						{{ $errors->first('weight', '<p class="error">:message</p>') }}
						<p>{{ Form::text('weight', Input::old('weight')) }}</p>
					</div>
		        	
		        	<div class="helpText">
		        		<p>Ange vikt i gram.</p>
	        		</div>
	    		</div>


				<!-- vat field -->
				<div class="inputWrapper">
			        <div class="inputContainer">
						<p>{{ Form::label('vat', 'Moms:') }}</p>
						{{ $errors->first('vat', '<p class="error">:message</p>') }}
						<p>{{ Form::text('vat', Input::old('vat')) }}</p>
					</div>
		        	
		        	<div class="helpText">
		        		<p>Välj rätt moms.</p>
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
		        		<p>Välj vilken kategori produkten ska hamn under.</p>
	        		</div>
	    		</div>


		        <!-- submit button -->
		        <div id='registerButton'>
		        	{{ Form::submit('Spara den nya produkten', array('class' => 'btn btn-success', 'id' => 'register')) }}
                </div>
		    {{ Form::close() }}
		</article>
	</section>
    
@endsection