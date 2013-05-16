<nav id="mainMenu">
	<h4 class="menuTitle">Kategorier</h4>
	<ul>
		@forelse ($categories as $category)
			<li><a href="{{ URL::to_route('category_products', $category->id) }}" class='{{ URI::is("categories/$category->id*") ? "active" : "" }}'>{{ $category->name }}</a></li>
    	@empty
    	    <p>Inga kategorier tillgängliga</p>
    	@endforelse
	</ul>
</nav>