@layout('admin/template')

@section('title')

    Lägg till en ny produkt
    
@endsection

@section('submenu')

    {{ render('admin.product.submenu') }}
    
@endsection

@section('main_content')
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
				        <p>{{ Form::label('description', '"Kort" beskrivning:') }}</p>
				        {{ $errors->first('description', '<p class="error">:message</p>') }}
				        <p>{{ Form::text('description', Input::old('description')) }}</p>
			        </div>
		        	
		        	<div class="helpText">
		        		<p>Skriv en kort beskrivning om din produkt.</p>
	        		</div>
	    		</div>

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
		        	{{ Form::submit('Spara den nya produkten', array('class' => 'btn btn-XL btn-success', 'id' => 'register')) }}
                </div>

                <div id='registerButton'>
		        	{{ Form::submit('Spara den nya produkten', array('class' => 'btn btn-XL btn-warning', 'id' => 'register')) }}
                </div>

                <div id='registerButton'>
		        	{{ Form::submit('Spara den nya produkten', array('class' => 'btn btn-XL btn-alert', 'id' => 'register')) }}
                </div>

                <div id='registerButton'>
		        	{{ Form::submit('Spara den nya produkten', array('class' => 'btn btn-XL btn-primary', 'id' => 'register')) }}
                </div>
		    {{ Form::close() }}
		</article>
	</section>
    
@endsection