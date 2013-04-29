@layout('admin/template')

@section('title')

    Redigera kategori
    
@endsection

@section('submenu')

    {{ render('admin.category.submenu') }}
    
@endsection

@section('main_content')
	<section>
		<article>
			<h1>Redigera kategori: {{ $category->name }}</h1>
			{{ Form::open() }}
				{{ Form::token() }}

				{{ Form::hidden('category_id', $category->id) }}
				<!-- name field -->
		        <div class="inputWrapper">
			        <div class="inputContainer">
			        	<p>{{ Form::label('name', 'Namn:') }}</p>
			        	{{ $errors->first('name', '<p class="error">:message</p>') }}
			        	<p>{{ Form::text('name', $category->name) }}</p>
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