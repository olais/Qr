<!DOCTYPE html>
<html lang="en">
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" href="css/bootstrap.css" type="text/css">
		<script type="text/javascript" src="js/jquery-1.12.3.min.js"></script>
	    <script type="text/javascript" src="js/login.js"></script>

  <style type="text/css">
  	@import '../../shared/mixins',
        '../../shared/reset',
        '../../shared/about-light';

 

body {
  font: 13px/20px 'Lucida Grande', Tahoma, Verdana, sans-serif;
  color: #404040;
  background: #F2F2F2;
}

.container {
  margin: 80px auto;
  width: 640px;
}

.login {
  position: relative;
  text-align: center;
  margin: 0 auto;
  padding: 30px;
  width: 400px;
  background: white;
  border-radius: 9px;
  @include box-shadow(0 0 200px rgba(white, .5), 0 1px 2px rgba(black, .3));

  &:before {
    content: '';
    position: absolute;
    top: -8px; right: -8px; bottom: -8px; left: -8px;
    z-index: -1;
    background: rgba(black, .08);
    border-radius: 4px;
  }

  h1 {
    margin: -20px -20px 21px;
    line-height: 40px;
    font-size: 15px;
    font-weight: bold;
    color: #555;
    text-align: center;
    text-shadow: 0 1px white;
    background: #f3f3f3;
    border-bottom: 1px solid #cfcfcf;
    border-radius: 3px 3px 0 0;
    @include linear-gradient(top, whiteffd, #eef2f5);
    @include box-shadow(0 1px #f5f5f5);
  }

  p { margin: 20px 0 0; }
  p:first-child { margin-top: 0; }

  input[type=text], input[type=password] { width: 278px; }

  p.remember_me {
    float: left;
    line-height: 31px;

    label {
      font-size: 12px;
      color: #777;
      cursor: pointer;
    }

    input {
      position: relative;
      bottom: 1px;
      margin-right: 4px;
      vertical-align: middle;
    }
  }

  p.submit { text-align: right; }
}

.login-help {
  margin: 20px 0;
  font-size: 11px;
  color: white;
  text-align: center;
  text-shadow: 0 1px #2a85a1;

  a {
    color: #cce7fa;
    text-decoration: none;

    &:hover { text-decoration: underline; }
  }
}

:-moz-placeholder {
  color: #c9c9c9 !important;
  font-size: 13px;
}

::-webkit-input-placeholder {
  color: #ccc;
  font-size: 13px;
}

input {
  font-family: 'Lucida Grande', Tahoma, Verdana, sans-serif;
  font-size: 14px;
}

input[type=text], input[type=password] {
  margin: 5px;
  padding: 0 10px;
  width: 200px;
  height: 34px;
  color: #404040;
  background: white;
  border: 1px solid;
  border-color: #c4c4c4 #d1d1d1 #d4d4d4;
  border-radius: 2px;
  outline: 5px solid #eff4f7;
  -moz-outline-radius: 3px; // Can we get this on WebKit please?
  @include box-shadow(inset 0 1px 3px rgba(black, .12));

  &:focus {
    border-color: #7dc9e2;
    outline-color: #dceefc;
    outline-offset: 0; // WebKit sets this to -1 by default
  }
}

input[type=submit] {
  padding: 0 18px;
  height: 29px;
  font-size: 12px;
  font-weight: bold;
  color: #527881;
  text-shadow: 0 1px #e3f1f1;
  background: #cde5ef;
  border: 1px solid;
  border-color: #b4ccce #b3c0c8 #9eb9c2;
  border-radius: 16px;
  outline: 0;
  @include box-sizing(content-box); // Firefox sets this to border-box by default
  @include linear-gradient(top, #edf5f8, #cde5ef);
  @include box-shadow(inset 0 1px white, 0 1px 2px rgba(black, .15));

  &:active {
    background: #cde5ef;
    border-color: #9eb9c2 #b3c0c8 #b4ccce;
    @include box-shadow(inset 0 0 3px rgba(black, .2));
  }
}

.lt-ie9 {
  input[type=text], input[type=password] { line-height: 34px; }
}


  </style>
</head>
<body>
  <section class="container">
    <div class="login" >
      <h1 style="text-align: center;color:#c9c9c9;font-size: 24px;" >Mi App en Línea</h1>
      <form method="post" name="login" id="login">
        <p><input type="text" name="user"  placeholder="Usuario"></p>
        <p><input type="password" name="password" value="" placeholder="Password"></p>
        <p class="submit"><input type="submit" name="guardar" value="Entrar"></p>
        <div id='msj' style="color:red; font-size: 17px;"></div>
      </form>
    </div>

  </section>

</body>
</html>