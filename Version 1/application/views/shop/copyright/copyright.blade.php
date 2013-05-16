<p>
	Denna sidan är gjord av <a href="#">BUTIKEN</a> i samarbete med <a href="#">MaDEastman</a>
	@if(Auth::check())
		<span style='float:right; margin-right: 25px; margin-left: -155px;'>
        	{{ HTML::link_to_route('admin', 'Gå till admin') }}
        </span>
    @endif
</p>