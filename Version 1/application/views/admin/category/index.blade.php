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
			<pre>
				{{ var_dump($category_products) }}
			</pre>
			<table id="tableProducts">
            	<thead>
                    <tr>
                        <th>Id:</th>
                        <th>Namn:</th>
                        <th>Edit:</th>
                        <th>Inställning:</th>
                    </tr>
                </thead>
                <tbody>
                	@forelse ($categories as $category)
                	    <tr>
	                        <td>{{ $category->id }}</td>
	                        <td>{{ $category->name }}</td>
	                        <td>
	                        	<a href="{{ URL::to_route('admin_edit_category', $category->id) }}">
	                        		{{ HTML::image('layout/edit.ico', 'editIcon', array('class' => 'tableIcon')) }}
	                        	</a>
	                       	</td>
	                        <td>
	                        	<a href="">
	                        		{{ HTML::image('layout/settings.ico', 'settingsIcon', array('class' => 'tableIcon')) }}
	                        	</a>
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