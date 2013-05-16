@layout('admin/template')

@section('title')

    Kategorier
    
@endsection

@section('submenu')

    {{ render('admin.category.submenu') }}
    
@endsection

@section('main_content')
	<section>
		<article>
			<h1>Alla kategorier</h1>
			<table id="tableProducts">
            	<thead>
                    <tr>
                        <th>Id:</th>
                        <th>Namn:</th>
                        <th>Antal produkter:</th>
                        <th>Edit:</th>
                        <th>Inställning:</th>
                    </tr>
                </thead>
                <tbody>
                	@forelse ($categories as $category)
                	    <tr>
	                        <td>{{ $category->id }}</td>
	                        <td>{{ $category->name }}</td>
	                        <td>{{ count($category->products) }}</td>
	                        <td>
	                        	<a href="{{ URL::to_route('admin_edit_category', $category->id) }}">
	                        		{{ HTML::image('layout/edit.ico', 'editIcon', array('class' => 'tableIcon')) }}
	                        	</a>
	                       	</td>
	                        <td>
	                        	{{ Form::open(URL::to_route('admin_delete_category', $category->id), 'DELETE') }}
	                        		{{ Form::submit('Radera', array('class' => 'btn btn-alert btn-M')) }}
	                        	{{ Form::close() }}
	                        </td>
	                    </tr>
                	@empty
                	    <h3>Inga kategorier tillgängliga</h3>
                	@endforelse

                </tbody>
            </table>
		</article>
	</section>
    
@endsection