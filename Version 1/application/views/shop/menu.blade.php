<nav id="mainMenu">
	<h4 class="menuTitle">Kategorier</h4>
	<ul>
		@forelse ($categories as $category)
    		<li><a href="startShop.html">{{ $category->name }}</a></li>    
    	@empty
    	    <p>Inga kategorier tillgängliga</p>
    	@endforelse
	</ul>
</nav>