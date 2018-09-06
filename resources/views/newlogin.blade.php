@extends('layouts.app')

<style>
@import url('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400');
@import url('https://fonts.googleapis.com/css?family=Playfair+Display');

$font: 'Source Sans Pro', sans-serif;
$blue: #809BCE;
$purple: #9893DA;
$grey: #C3C3D8;

body, .message, .form, form {
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
}


body {
  height: 100vh;
  background: #E8E8E8;
  font-family: $font;
  overflow: hidden;
}
.container {
  width: 700px;
  height: 400px;
  background: white;
  position: relative;
  display: grid;
  grid-template: 100% / 50% 50%;
  box-shadow: 2px 2px 10px 0 rgba(#333, 0.2);
}

.message {
  position: absolute;
  background: white;
  width: 50%;
  height: 100%;
  transition: 0.5s all ease;
  transform: translateX(100%);
  z-index: 4;
  
  &:before {
    position: absolute;
    content: '';
    width: 1px;
    height: 70%;
    background: $grey;
    opacity: 0;
    left: 0;
    top:15%;
  }
  
  .button {
    margin: 5px 0;
  }
}

.signup {
  &:before {
    opacity: 0.3;
    left: 0;
  }
}

.login {
  &:before {
    opacity: 0.3;
    left: 100%;
  }
}


.btn-wrapper {
  width: 60%;
}

.form {
  width: 100%;
  height: 100%;

  &--heading {
    font-size: 18px;
    height: 50px;
    color: $blue;
    font-family: 'Playfair Display', serif;
  }
}

form {
  width: 70%;
  > * {
    margin: 10px;
  }
  input {
    width: 90%;
    border: 0;
    border-bottom: 1px solid rgba($grey, 0.5);
    font-size: 13px;
    font-weight: 300;
    color: #797A9E;
    letter-spacing: 0.11em;

    &::placeholder {
      color: #C3C3D8;
      font-size: 10px;
    }

    &:focus {
      outline: 0;
      border-bottom: 1px solid rgba($blue, 0.7);
      transition: 0.6s all ease;
    }
  }
}

.button {
  width: 100%;
  height: 30px;
  border: 0;
  outline: 0;
  color: white;
  font-size: 15px;
  font-weight: 300;
  position: relative;
  z-index: 3;
  letter-spacing: 2px;
  background: linear-gradient(45deg, $blue, $purple);
  font-family: 'Playfair Display', serif;
  
  &:hover {
    transform: translateY(4px);
    transition: 0.4s all ease;
  }
}


@media (max-width: 750px){
  .container {
    transform: scale(0.8);
  }
}
</style>
@section('new')
<div class="container">
        <div class="message signup">
          <div class="btn-wrapper">
            <button class="button" id="signup">SignUp</button>
            <button class="button" id="login"> Login</button>
          </div>
        </div>
        <div class="form form--signup">
          <div class="form--heading">Welcome! Sign Up</div>
          <form autocomplete="off">
            <input type="text" placeholder="Name">
            <input type="email" placeholder="Email">
            <input type="password" placeholder="Password">
            <button class="button">Sign Up</button>
          </form>
        </div>
        <div class="form form--login">
          <div class="form--heading">Welcome back! </div>
          <form autocomplete="off">
            <input type="text" placeholder="Name">
            <input type="password" placeholder="Password">
            <button class="button">Login</button>
          </form>
        </div>
      </div>
@endsection
<script>
$("#signup").click(function() {
  $(".message").css("transform", "translateX(100%)");
  if ($(".message").hasClass("login")) {
    $(".message").removeClass("login");
  }
  $(".message").addClass("signup");
});

$("#login").click(function() {
  $(".message").css("transform", "translateX(0)");
  if ($(".message").hasClass("login")) {
    $(".message").removeClass("signup");
  }
  $(".message").addClass("login");
});

</script>