@layout('admin/template')

@section('title')

    Lägg till en ny kategori
    
@endsection

@section('submenu')

    {{ render('admin.category.submenu') }}
    
@endsection

@section('main_content')
	<section>
		<article>
			<h1>Lägg till en ny kategori</h1>
			{{ Form::open(URL::to_route('admin_create_category'),'POST', array('class' => 'styleForm')) }}
				{{ Form::token() }}
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

	    		<!-- submit button -->
		        <div id='registerButton'>
		        	{{ Form::submit('Spara den nya kategorin', array('class' => 'btn btn-success btn-XL', 'id' => 'register')) }}
                </div>

		    {{ Form::close() }}
		</article>
	</section>
    
@endsection