
<style>
	@import url('https://fonts.googleapis.com/css2?family=Lora&family=Ubuntu:wght@300&display=swap');
	.collapse a{
		text-indent:10px;
	}
	nav#sidebar{
		background: url(assets/uploads/<?php echo $_SESSION['system']['cover_img'] ?>) !important
	}
</style>

<nav id="sidebar" class='mx-lt-5'  style="-webkit-box-shadow: 6px 0px 26px 5px rgba(0,0,0,0.34); 
box-shadow: 6px 0px 26px 5px rgba(0,0,0,0.34); margin-top:19px;"
>
		
		<div class="sidebar-list" style="font-family: 'Ubuntu', sans-serif;">
				<a href="index.php?page=home" class="nav-item nav-home" style="border: 0px solid #5A5A5A;
border-radius: 18px 18px 16px 18px; margin:10px;-webkit-box-shadow: 5px 6px 32px 1px rgba(0,0,0,0.36); 
box-shadow: 5px 6px 32px 1px rgba(0,0,0,0.36);"><span class='icon-field'><i class="fa fa-home"></i></span> Home</a>
				<a href="index.php?page=members" class="nav-item nav-members" style="border: 0px solid #5A5A5A;
border-radius: 18px 18px 16px 18px; margin:10px;-webkit-box-shadow: 5px 6px 32px 1px rgba(0,0,0,0.36); 
box-shadow: 5px 6px 32px 1px rgba(0,0,0,0.36);"><span class='icon-field'><i class="fa fa-user-friends"></i></span> Personnels</a>
				
				<a href="index.php?page=schedule" class="nav-item nav-schedule" style="border: 0px solid #5A5A5A;
border-radius: 18px 18px 16px 18px; margin:10px;-webkit-box-shadow: 5px 6px 32px 1px rgba(0,0,0,0.36); 
box-shadow: 5px 6px 32px 1px rgba(0,0,0,0.36);"><span class='icon-field'><i class="fa fa-calendar-day"></i></span>  Calender</a>
				<?php if($_SESSION['login_type'] == 1): ?>
				<!-- <a href="index.php?page=plans" class="nav-item nav-plans" style="border:0px solid #5A5A5A;
border-radius: 18px 18px 16px 18px; margin:10px;-webkit-box-shadow: 5px 6px 32px 1px rgba(0,0,0,0.36); 
box-shadow: 5px 6px 32px 1px rgba(0,0,0,0.36);"><span class='icon-field'><i class="fa fa-th-list"></i></span> Plans</a> -->
				<a href="index.php?page=packages" class="nav-item nav-packages" style="border: 0px solid #5A5A5A;
border-radius: 18px 18px 16px 18px; margin:10px;-webkit-box-shadow: 5px 6px 32px 1px rgba(0,0,0,0.36); 
box-shadow: 5px 6px 32px 1px rgba(0,0,0,0.36);"><span class='icon-field'><i class="fa fa-list"></i></span> Duty Plan</a>
				<a href="index.php?page=trainer" class="nav-item nav-trainer" style="border: 0px solid #5A5A5A;
border-radius: 18px 18px 16px 18px; margin:10px;-webkit-box-shadow: 5px 6px 32px 1px rgba(0,0,0,0.36); 
box-shadow: 5px 6px 32px 1px rgba(0,0,0,0.36);"><span class='icon-field'><i class="fa fa-user"></i></span> Activity Data</a>
				<a href="index.php?page=users" class="nav-item nav-users" style="border: 0px solid #5A5A5A;
border-radius: 18px 18px 16px 18px; margin:10px;-webkit-box-shadow: 5px 6px 32px 1px rgba(0,0,0,0.36); 
box-shadow: 5px 6px 32px 1px rgba(0,0,0,0.36);"><span class='icon-field'><i class="fa fa-users"></i></span> Commanders</a>
			<?php endif; ?>
		</div>

</nav>
<script>
	$('.nav_collapse').click(function(){
		console.log($(this).attr('href'))
		$($(this).attr('href')).collapse()
	})
	$('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active')
</script>
