<style>
  @import url('https://fonts.googleapis.com/css2?family=Lora&family=Ubuntu:wght@300&display=swap');
  @import url('https://fonts.googleapis.com/css2?family=Rubik+Glitch&display=swap');
  @import url('https://fonts.googleapis.com/css2?family=Beau+Rivage&family=Rubik+Glitch&display=swap');
  @import url('https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap');
	.logo {
    margin: auto;
    font-size: 20px;
    background: white;
    padding: 7px 11px;
    border-radius: 50% 50%;
    color: #000000b3;
}
.dropdown-item{
  color:white;
}
</style>

<nav class="navbar navbar-light fixed-top bg-primary" style="padding:0;min-height: 3.5rem;background:black!important; -webkit-box-shadow: 5px 6px 32px 7px rgba(0,0,0,0.36); 
box-shadow: 5px 6px 32px 7px rgba(0,0,0,0.36);">
  <div class="container-fluid mt-2 mb-2">
  	<div class="col-lg-12">
  		<div class="col-md-1 float-left" style="display: flex;">
  		
  		</div>
      <div class="col-md-4 float-left text-white" style="margin-top:4px" >
        <!-- <span style="font-size:36px; font-family: 'Rubik Glitch', cursive;"><b >BODY</b></span>         -->
        <!-- <span style="font-size:34px; font-family: 'Dancing Script', cursive;">Station  </span> -->
        <span style="font-size:27px; "><b >Border Surveillance Portal</b></span>
      </div>
	  	<div class="float-right" style="margin-top:12px">
        <div class=" dropdown mr-4">
            <a href="#" class="text-white dropdown-toggle"  id="account_settings" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-family: 'Ubuntu', sans-serif;"><?php echo $_SESSION['login_name'] ?> </a>
              <div class="dropdown-menu" aria-labelledby="account_settings" style="left: -2.5em; background:black; font-family: 'Ubuntu', sans-serif;">
                <a class="dropdown-item" href="javascript:void(0)" id="manage_my_account"><i class="fa fa-cog"></i> Manage Account</a>
                <a class="dropdown-item" href="ajax.php?action=logout"><i class="fa fa-power-off"></i> Logout</a>
              </div>
        </div>
      </div>
  </div>
  
</nav>

<script>
  $('#manage_my_account').click(function(){
    uni_modal("Manage Account","manage_user.php?id=<?php echo $_SESSION['login_id'] ?>&mtype=own")
  })
</script>