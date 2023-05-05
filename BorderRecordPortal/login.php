<!DOCTYPE html>
<html lang="en">
<?php 
session_start();
include('./db_connect.php');
ob_start();
if(!isset($_SESSION['system'])){
	// $system = $conn->query("SELECT * FROM system_settings limit 1")->fetch_array();
	// foreach($system as $k => $v){
	// 	$_SESSION['system'][$k] = $v;
	// }
}
ob_end_flush();
?>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Border Surveillance Portal</title>
 	

<?php include('./header.php'); ?>
<?php 
if(isset($_SESSION['login_id']))
header("location:index.php?page=home");

?>

</head>
<style>
	/* body{
		
		width: 100%;
	    height: calc(100%);
	    background: #007bff;
	}
	main#main{
		width:100%;
		height: calc(100%);
		background:white;
	}
	#login-right{
		position: absolute;
		right:0;
		width:40%;
		height: calc(100%);
		background:white;
		display: flex;
		align-items: center;
	}
	#login-left{
		position: absolute;
		left:0;
		width:60%;
		height: calc(100%);
		background:black;
		display: flex;
		align-items: center;
		background: url('https://images.pexels.com/photos/4553611/pexels-photo-4553611.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1');

	    background-repeat: no-repeat;
	    background-size: 200vh;
	}
	#login-right .card{
		margin: auto;
		z-index: 1
	}
	.logo {
    margin: auto;
    font-size: 8rem;
    background: white;
    padding: .5em 0.7em;
    border-radius: 50% 50%;
    color: #000000b3;
    z-index: 10;
}
div#login-right::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: calc(100%);
    height: calc(100%);
    background: #5fa2d37a;
}
.card{
	border:none;
	border-radius: 1.25rem;
	
} */




* {
	 font-family: -apple-system, BlinkMacSystemFont, "San Francisco", Helvetica, Arial, sans-serif;
	 font-weight: 300;
	 margin: 0;
	 
}
 html, body {
	 height: 100vh;
	 width: 100vw;
	 margin: auto;
	 display: flex;
	 align-items: center;
	 justify-content: center;
	 background: #f3f2f2;
	 background-image: url("https://i.pinimg.com/originals/80/dc/39/80dc39f59f3d3af1ca8c0eba50a98e20.jpg");
	 
}
 h4 {
	 font-size: 24px;
	 font-weight: 600;
	 color: #000;
	 opacity: 0.85;
}
 label {
	 font-size: 12.5px;
	 color: #000;
	 opacity: 0.8;
	 font-weight: 400;
}
 form {
	 padding: 40px 30px;
	 background: #fefefe;
	 display: flex;
	 flex-direction: column;
	 align-items: flex-start;
	 padding-bottom: 20px;
	 width: 600px;
}
 form h4 {
	 margin-bottom: 20px;
	 color: rgba(0, 0, 0, .5);
}
 form h4 span {
	 color: rgba(0, 0, 0, 1);
	 font-weight: 700;
}
 form p {
	 line-height: 155%;
	 margin-bottom: 5px;
	 font-size: 14px;
	 color: #000;
	 opacity: 0.65;
	 font-weight: 400;
	 max-width: 200px;
	 margin-bottom: 40px;
}
 a.discrete {
	 color: rgba(0, 0, 0, .4);
	 font-size: 14px;
	 border-bottom: solid 1px rgba(0, 0, 0, .0);
	 padding-bottom: 4px;
	 margin-left: auto;
	 font-weight: 300;
	 transition: all 0.3s ease;
	 margin-top: 40px;
}
 a.discrete:hover {
	 border-bottom: solid 1px rgba(0, 0, 0, .2);
}
 button {
	 -webkit-appearance: none;
	 width: auto;
	 min-width: 100px;
	 border-radius: 24px;
	 text-align: center;
	 padding: 15px 40px;
	 margin-top: 5px;
	 background-color: #202728;
	 color: #fff;
	 font-size: 14px;
	 margin-left: auto;
	 font-weight: 500;
	 box-shadow: 0px 2px 6px -1px rgba(0, 0, 0, .13);
	 border: none;
	 transition: all 0.3s ease;
	 outline: 0;
}
 button:hover {
	 transform: translateY(-3px);
	 box-shadow: 0 2px 6px -1px rgba(182, 157, 230, .65);
}
 button:hover:active {
	 transform: scale(0.99);
}
 input {
	 font-size: 16px;
	 padding: 20px 0px;
	 height: 56px;
	 border: none;
	 border-bottom: solid 1px rgba(0, 0, 0, .1);
	 background: #fff;
	 width: 280px;
	 box-sizing: border-box;
	 transition: all 0.3s linear;
	 color: #000;
	 font-weight: 400;
	 -webkit-appearance: none;
}
 input:focus {
	 border-bottom: solid 1px #b69de6;
	 outline: 0;
	 box-shadow: 0 2px 6px -8px rgba(182, 157, 230, .45);
}
 .floating-label {
	 position: relative;
	 margin-bottom: 10px;
	 width: 100%;
}
 .floating-label label {
	 position: absolute;
	 top: calc(50% - 7px);
	 left: 0;
	 opacity: 0;
	 transition: all 0.3s ease;
	 padding-left: 44px;
}
 .floating-label input {
	 width: calc(100% - 44px);
	 margin-left: auto;
	 display: flex;
}
 .floating-label .icon {
	 position: absolute;
	 top: 0;
	 left: 0;
	 height: 56px;
	 width: 44px;
	 display: flex;
}
 .floating-label .icon svg {
	 height: 30px;
	 width: 30px;
	 margin: auto;
	 opacity: 0.15;
	 transition: all 0.3s ease;
}
 .floating-label .icon svg path {
	 transition: all 0.3s ease;
}
 .floating-label input:not(:placeholder-shown) {
	 padding: 28px 0px 12px 0px;
}
 .floating-label input:not(:placeholder-shown) + label {
	 transform: translateY(-10px);
	 opacity: 0.7;
}
 .floating-label input:valid:not(:placeholder-shown) + label + .icon svg {
	 opacity: 1;
}
 .floating-label input:valid:not(:placeholder-shown) + label + .icon svg path {
	 fill: #b69de6;
}
 .floating-label input:not(:valid):not(:focus) + label + .icon {
	 animation-name: shake-shake;
	 animation-duration: 0.3s;
}
 @keyframes shake-shake {
	 0% {
		 transform: translateX(-3px);
	}
	 20% {
		 transform: translateX(3px);
	}
	 40% {
		 transform: translateX(-3px);
	}
	 60% {
		 transform: translateX(3px);
	}
	 80% {
		 transform: translateX(-3px);
	}
	 100% {
		 transform: translateX(0px);
	}
}
 .session {
	 display: flex;
	 flex-direction: row;
	 width: 600px;
	 height: auto;
	 margin: auto auto;
	 background: #fff;
	 border-radius: 205px;
	 box-shadow: 0px 2px 6px -1px rgba(0, 0, 0, .12);
}
 .left {
	 width: 400px;
	 height: auto;
	 min-height: 100%;
	 position: relative;
	 background-image: url("");
	 background-size: cover;
	 border-top-left-radius: 4px;
	 border-bottom-left-radius: 4px;
}
 .left svg {
	 height: 40px;
	 width: auto;
	 margin: 20px;
}
 




</style>

<body>



  <!-- <main id="main" class=" bg-dark">
  		<div id="login-left">
  		</div>
		
		  
  		<div id="login-right" >
			  
  			<div class="card col-md-8" style="-webkit-box-shadow: 0px 0px 9px 7px rgba(28,128,199,1);
-moz-box-shadow: 0px 0px 9px 7px rgba(28,128,199,1);
box-shadow: 0px 0px 9px 7px rgba(28,128,199,1)"; >
  				<div class="card-body"  >
  						
  					<form id="login-form" >
  						<div class="form-group">
  							<label for="username" class="control-label">Username</label>
  							<input type="text" id="username" name="username" class="form-control">
  						</div>
  						<div class="form-group">
  							<label for="password" class="control-label">Password</label>
  							<input type="password" id="password" name="password" class="form-control">
  						</div>
  						<center><button class="btn-sm btn-block btn-wave col-md-4 btn-primary">Login</button></center>
  					</form>
  				</div>
  			</div>
  		</div>
   

  </main> -->



  <main id="main" class=" bg-dark">
  <div class="session" style="-webkit-box-shadow: 5px 5px 28px 9px #787878; 
box-shadow: 5px 5px 28px 9px #787878; ">
    
    <form  id="login-form" class="log-in" autocomplete="off"> 
      <h4> <span style="font-size:20px"><b >Ministry of Defence</b></span>
        </h4>
      <p>Welcome to border surveillance portal<br> Log in to access Border Surviellance Portal</p>
      <div class="floating-label">
        <input placeholder="Commander ID"  name="username" autocomplete="off" id="username">
        <label for="email">Commander ID:</label>
        <div class="icon">
<?xml version="1.0" encoding="UTF-8"?>
<svg enable-background="new 0 0 100 100" version="1.1" viewBox="0 0 100 100" xml:space="preserve" xmlns="">
<style type="text/css">
	.st0{fill:none;}
</style>
<g transform="translate(0 -952.36)">
	<path d="m17.5 977c-1.3 0-2.4 1.1-2.4 2.4v45.9c0 1.3 1.1 2.4 2.4 2.4h64.9c1.3 0 2.4-1.1 2.4-2.4v-45.9c0-1.3-1.1-2.4-2.4-2.4h-64.9zm2.4 4.8h60.2v1.2l-30.1 22-30.1-22v-1.2zm0 7l28.7 21c0.8 0.6 2 0.6 2.8 0l28.7-21v34.1h-60.2v-34.1z"/>
</g>
<rect class="st0" width="100" height="100"/>
</svg>

        </div>
      </div>
      <div class="floating-label">
        <input placeholder="Password" type="password" name="password"  id="password" autocomplete="off">
        <label for="password">Password:</label>
        <div class="icon">
          
          <?xml version="1.0" encoding="UTF-8"?>
          <svg enable-background="new 0 0 24 24" version="1.1" viewBox="0 0 24 24" xml:space="preserve"              xmlns="http://www.w3.org/2000/svg">
<style type="text/css">
	.st0{fill:none;}
	.st1{fill:#010101;}
</style>
		<rect class="st0" width="24" height="24"/>
		<path class="st1" d="M19,21H5V9h14V21z M6,20h12V10H6V20z"/>
		<path class="st1" d="M16.5,10h-1V7c0-1.9-1.6-3.5-3.5-3.5S8.5,5.1,8.5,7v3h-1V7c0-2.5,2-4.5,4.5-4.5s4.5,2,4.5,4.5V10z"/>
		<path class="st1" d="m12 16.5c-0.8 0-1.5-0.7-1.5-1.5s0.7-1.5 1.5-1.5 1.5 0.7 1.5 1.5-0.7 1.5-1.5 1.5zm0-2c-0.3 0-0.5 0.2-0.5 0.5s0.2 0.5 0.5 0.5 0.5-0.2 0.5-0.5-0.2-0.5-0.5-0.5z"/>
</svg>
        </div>
        
      </div>
      <button type="submit" >Log in</button>
      
    </form>
  </div>

</main>



  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>


</body>
<script>
	$('#login-form').submit(function(e){
		e.preventDefault()
		$('#login-form button[type="button"]').attr('disabled',true).html('Logging in...');
		if($(this).find('.alert-danger').length > 0 )
			$(this).find('.alert-danger').remove();
		$.ajax({
			url:'ajax.php?action=login',
			method:'POST',
			data:$(this).serialize(),
			error:err=>{
				console.log(err)
		$('#login-form button[type="button"]').removeAttr('disabled').html('Login');

			},
			success:function(resp){
				if(resp == 1){
					location.href ='index.php?page=home';
				}else{
					$('#login-form').prepend('<div class="alert alert-danger">Personnel ID or password is incorrect.</div>')
					$('#login-form button[type="button"]').removeAttr('disabled').html('Login');
				}
			}
		})
	})
</script>	
</html>