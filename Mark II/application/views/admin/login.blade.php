<!DOCTYPE html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Logga in</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">
    {{ Asset::container('login')->styles(); }}
  </head>
  <body>
    <div id="wrapper">
      <div id="login-wrapper">

        <h3>Logga in</h3>
        {{ Form::open('login', 'POST', array('id' => '')) }}
          {{ Form::token() }}
          <!-- check for login errors flash var -->
          @if (Session::has('login_errors'))
              <span class="error">Fel användarnamn/lösenord</span>
          @endif

          <!-- username field -->
          {{ Form::text('email', '', array('class' => 'input', 'placeholder' => 'email')) }}

          <!-- password field -->
          {{ Form::password('password', array('class' => 'input', 'placeholder' => 'lösenord')) }}

          <!-- submit button -->
          {{ Form::submit('Logga in', array('class' => 'btn', 'placeholder' => 'lösenord')) }}

      {{ Form::close() }}
      </div>
    </div>
  </body>
</html>