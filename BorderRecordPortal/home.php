<?php include 'db_connect.php' ?>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Lora&family=Ubuntu:wght@300&display=swap');
   span.float-right.summary_icon {
    font-size: 3rem;
    position: absolute;
    right: 1rem;
    color: #ffffff96;
}
.imgs{
		margin: .5em;
		max-width: calc(100%);
		max-height: calc(100%);
	}
	.imgs img{
		max-width: calc(100%);
		max-height: calc(100%);
		cursor: pointer;
	}
	#imagesCarousel,#imagesCarousel .carousel-inner,#imagesCarousel .carousel-item{
		height: 60vh !important;background: black;
	}
	#imagesCarousel .carousel-item.active{
		display: flex !important;
	}
	#imagesCarousel .carousel-item-next{
		display: flex !important;
	}
	#imagesCarousel .carousel-item img{
		margin: auto;
	}
	#imagesCarousel img{
		width: auto!important;
		height: auto!important;
		max-height: calc(100%)!important;
		max-width: calc(100%)!important;
	}

    .card{
        border: 0px solid rgba(0,0,0,.125);
        background-color: #dcdcdc;
    }
</style>

<div class="containe-fluid" style="font-family: 'Ubuntu', sans-serif;">
	<div class="row mt-3 ml-3 mr-3">
        <div class="col-lg-12">
            <div class="card" style="background-color:#dcdcdc">
                <div class="card-body"   >
                    <?php echo "<b>Welcome To The Border Survillance Portal: &nbsp ". $_SESSION['login_name']." "  ?></b>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card" >
                                <div class="card-body " style="background:#14a87f; border-radius: 1000px; -webkit-box-shadow: 1px 2px 13px 4px rgba(0,0,0,0.53);
-moz-box-shadow: 1px 2px 13px 4px rgba(0,0,0,0.53);
box-shadow: 1px 2px 13px 4px rgba(0,0,0,0.53); ">
                                    <div class="card-body text-white">
                                        <span class="float-right summary_icon"><i class="fa fa-users"></i></span>
                                        <h4><b>
                                            <?php echo $conn->query("SELECT * FROM registration_info where status = 1")->num_rows; ?>
                                        </b></h4>
                                        <p><b>Number of Personnels</b></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body " style="background:#cb3bc4;border-radius: 1000px; -webkit-box-shadow: 1px 2px 13px 4px rgba(0,0,0,0.53);
-moz-box-shadow: 1px 2px 13px 4px rgba(0,0,0,0.53);
box-shadow: 1px 2px 13px 4px rgba(0,0,0,0.53); " >
                                    <div class="card-body text-white">
                                        <span class="float-right summary_icon"><i class="fa fa-list"></i></span>
                                        <h4><b>
                                            <?php echo $conn->query("SELECT * FROM packages")->num_rows; ?>
                                        </b></h4>
                                        <p><b>Number of Duty Plans</b></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>	

                    
                </div>
            </div>      			
        </div>
    </div>
</div>
<script>
	$('#manage-records').submit(function(e){
        e.preventDefault()
        start_load()
        $.ajax({
            url:'ajax.php?action=save_track',
            data: new FormData($(this)[0]),
            cache: false,
            contentType: false,
            processData: false,
            method: 'POST',
            type: 'POST',
            success:function(resp){
                resp=JSON.parse(resp)
                if(resp.status==1){
                    alert_toast("Data successfully saved",'success')
                    setTimeout(function(){
                        location.reload()
                    },800)

                }
                
            }
        })
    })
    $('#tracking_id').on('keypress',function(e){
        if(e.which == 13){
            get_person()
        }
    })
    $('#check').on('click',function(e){
            get_person()
    })
    function get_person(){
            start_load()
        $.ajax({
                url:'ajax.php?action=get_pdetails',
                method:"POST",
                data:{tracking_id : $('#tracking_id').val()},
                success:function(resp){
                    if(resp){
                        resp = JSON.parse(resp)
                        if(resp.status == 1){
                            $('#name').html(resp.name)
                            $('#address').html(resp.address)
                            $('[name="person_id"]').val(resp.id)
                            $('#details').show()
                            end_load()

                        }else if(resp.status == 2){
                            alert_toast("Unknow tracking id.",'danger');
                            end_load();
                        }
                    }
                }
            })
    }
</script>