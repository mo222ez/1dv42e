<!DOCTYPE html>
  <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
      <title>
        @yield('title')
      </title>
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width">
      {{ Asset::container('shop')->styles() }}
      {{ Asset::container('shop')->scripts() }}  
  </head>

  <body>
    <div id="topWrapper">
        <div id="topBar">
            <div id="searchContainer">
              {{ render('shop.topbar.search') }}
            </div>
            
            <div id="cartContainer">
              {{ render('shop.topbar.cart') }}
            </div>
        </div>
    </div><!-- END TOP WRAPPER -->
    <div class="clear"></div>

    <div id="mainWrapper">
        <div id="headerBar">
            <header>
              {{ render('shop.header.headerTitle') }}
            </header>
            {{ render('shop.header.headerInfo') }}
        </div>
        
        <div id="menuAndSectionContainer">
            
            {{ render('shop.menu', array('categories' => Category::get())) }}

            <section>
              <div id="sortBar">
                {{ render('shop.sortbar.sortbar') }}
              </div>

              <!-- Här ska allt det fin fina innehållet hamna -->
              @yield('shopContent')
            </section>
        </div>
        
        <footer>
          {{ render('shop.footer.footer') }}
        </footer>

        <div id="copyright">
          {{ render('shop.copyright.copyright') }}
        </div>

    </div> <!-- END WRAPPER -->    
  </body>
</html>