<!DOCTYPE html>
  <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
      <title>
        @yield('title')
      </title>
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width">
      {{ Asset::styles() }}
      {{ Asset::scripts() }}
  </head>
  <body>
    <div id="topContainer">

      <div id="log">
        <form method="link" action="{{ URL::to_route('admin_logout') }}">
          <input class="btn btn-XS btn-primary" type="submit" value="Logga ut" />
        </form>

        <!--{{ HTML::link_to_route('admin_logout', 'Logga ut') }}-->
      </div>

      <div id="topLink">
        <a href="#.php">Öppna butiksdelen</a>
      </div>


    </div>

    <header>Butiken.se</header>
      
    <div id="menuContainer">
      <nav id="mainMenu">
        <li><a href="{{ URL::to_route('admin') }}" class="{{ URI::is('admin') ? 'active' : '' }}">Start</a></li>
        <li><a href="{{ URL::to_route('admin_products') }}" class="{{ URI::is('admin/products*') ? 'active' : '' }}">Produkter</a></li>
        <li><a href="{{ URL::to_route('admin_categories') }}" class="{{ URI::is('admin/categories*') ? 'active' : '' }}">Kategorier</a></li>
        <li><a href="{{ URL::to_route('admin_orders') }}" class="{{ URI::is('admin/orders*') ? 'active' : '' }}">Beställningar</a></li>
        <li><a href="{{ URL::to_route('admin_customers') }}" class="{{ URI::is('admin/customers*') ? 'active' : '' }}">Kunder</a></li>
        <li><a href="{{ URL::to_route('admin_statistics') }}" class="{{ URI::is('admin/statistics*') ? 'active' : '' }}">Statistik</a></li>
        <li><a href="{{ URL::to_route('admin_settings') }}" class="{{ URI::is('admin/settings*') ? 'active' : '' }}">Inställningar</a></li>
      </nav>           

      <nav id="subMenu">
        <ul class="subMenu">
          @yield('submenu')
        </ul>       
      </nav>
    </div>

    <div id="wrapper">
      @yield('main_content')
    </div>

    <footer>
      <div id="topBorderPointer"></div>
      <div id="somethingSomethingDarkSide">
        <p class="footerText"> Här kan vi lägga in fin fin information om vad fasen som helst. Något som skulle passa in helt enkelt. Lite mera informaton som kan vara behövlig, till exempel hur man får tag på oss som utvecklare om de har några frågor eller så.</p>
        </div>

                        
        <div id="someone">
        <p class="footerText">BUTIKEN.SE Copyright MaDEastman 2013</p>
      </div>
    </footer>       
  </body>
</html>