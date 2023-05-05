<?php include('db_connect.php');?>

<div class="container-fluid" style="font-family: 'Ubuntu', sans-serif;">
<style>@import url('https://fonts.googleapis.com/css2?family=Lora&family=Ubuntu:wght@300&display=swap');

	input[type=checkbox]
{
  /* Double-sized Checkboxes */
  -ms-transform: scale(1.5); /* IE */
  -moz-transform: scale(1.5); /* FF */
  -webkit-transform: scale(1.5); /* Safari and Chrome */
  -o-transform: scale(1.5); /* Opera */
  transform: scale(1.5);
  padding: 10px;
}
</style>
	<div class="col-lg-12">
		<div class="row mb-4 mt-4">
			<div class="col-md-12">
				
			</div>
		</div>
		<div class="row">
			<!-- FORM Panel -->

			<!-- Table Panel -->
			<div class="col-md-12">
				<div class="card" style="-webkit-box-shadow: 10px 10px 13px 7px rgba(0,0,0,0.35); 
box-shadow: 10px 10px 13px 7px rgba(0,0,0,0.35);
border: 0px solid #1C6EA4;
border-radius: 40px 10px 40px 10px;">
					<div class="card-header">
						<b>Active Member List</b>
						<span class="">

							<button class="btn  btn-block btn-sm col-sm-2 float-right" style="background:#4e4e4e; color:white;" type="button" id="new_member">
					<i class="fa fa-plus"></i> New</button>
				</span>
					</div>
					<div class="card-body">
						
						
					</div>
				</div>
			</div>
			<!-- Table Panel -->
		</div>
	</div>	

</div>
<style>
	
	td{
		vertical-align: middle !important;
	}
	td p{
		margin: unset
	}
	img{
		max-width:100px;
		max-height: :150px;
	}
</style>
<script>
	$(document).ready(function(){
		$('table').dataTable()
	})
	$('#new_member').click(function(){
		uni_modal("<i class='fa fa-plus'></i> New Membership Plan","manage_membership.php",'')
	})
	$('.view_member').click(function(){
		uni_modal("<i class='fa fa-address-card'></i> Member Plan Details","view_pdetails.php?id="+$(this).attr('data-id'),'')
		
	})
	$('.edit_member').click(function(){
		uni_modal("<i class='fa fa-edit'></i> Manage Member Details","manage_member.php?id="+$(this).attr('data-id'),'mid-large')
		
	})
	$('.delete_member').click(function(){
		_conf("Are you sure to delete this topic?","delete_member",[$(this).attr('data-id')],'mid-large')
	})

	function delete_member($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_member',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully deleted",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}
</script>