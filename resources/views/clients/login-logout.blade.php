<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/ll.css')}}"><link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;800&display=swap" rel="stylesheet">
  </head>
  <body>
    <div class="main">
      <div class="container a-container" id="a-container">
        <form class="form" id="a-form" method="" action="{{asset('/')}}">
          <h2 class="form_title title">Create Account</h2>
          <input class="form__input" type="text" placeholder="Name">
          <input class="form__input" type="text" placeholder="Email">
          <input class="form__input" type="password" placeholder="Password">
          <!-- <button class="form__button button submit" type="submit">SIGN UP</button> -->
          <button class="btn btn-primary">SIGN UP</button>
        </form>
      </div>
      <div class="container b-container" id="b-container">
        <form class="form" id="b-form" method="" action="{{asset('/')}}">
          <h2 class="form_title title">Sign in to Website</h2>
          <input class="form__input" type="text" placeholder="Email">
          <input class="form__input" type="password" placeholder="Password"><a class="form__link">Forgot your password?</a>
          <!-- <button class="form__button button submit">SIGN IN</button> -->
          <button class="btn btn-primary">SIGN IN</button>
        </form>
      </div>
      <div class="switch" id="switch-cnt">
        <div class="switch__circle"></div>
        <div class="switch__circle switch__circle--t"></div>
        <div class="switch__container" id="switch-c1">
          <h2 class="switch__title title">Welcome Back !</h2>
          <p class="switch__description description">To keep connected with us please login with your personal info</p>
          <button class="switch__button button switch-btn">SIGN IN</button>
          <a href="{{asset('/')}}" class="btn btn-info">Về trang chủ</a>
        </div>
        <div class="switch__container is-hidden" id="switch-c2">
          <h2 class="switch__title title">Hello Friend !</h2>
          <p class="switch__description description">Enter your personal details and start journey with us</p>
          <button class="switch__button button switch-btn">SIGN UP</button>
          <a href="{{asset('/')}}" class="btn btn-info">Về trang chủ</a>
        </div>
      </div>
    </div>
    <script src="{{asset('/js/ll.js')}}"></script>
  </body>
</html>