<li><a href="{{ URL::to_route('admin_profile_settings') }}" class="{{ URI::is('admin/settings/profile*') ? 'active' : '' }}">Profil</a></li>

<li><a href="{{ URL::to_route('admin_payment_methods_settings') }}" class="{{ URI::is('admin/settings/payment_methods*') ? 'active' : '' }}">Beställningssätt</a></li>

<li><a href="{{ URL::to_route('admin_shipping_methods_settings') }}" class="{{ URI::is('admin/settings/shipping_methods*') ? 'active' : '' }}">Fraktsätt</a></li>

<li><a href="{{ URL::to_route('admin_seo_settings') }}" class="{{ URI::is('admin/settings/seo*') ? 'active' : '' }}">SEO / Meta</a></li>

<li><a href="{{ URL::to_route('admin_tax_settings') }}" class="{{ URI::is('admin/settings/tax*') ? 'active' : '' }}">Moms</a></li>

<li><a href="{{ URL::to_route('admin_email_settings') }}" class="{{ URI::is('admin/settings/email*') ? 'active' : '' }}">E-post</a></li>