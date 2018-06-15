<?php include('header.php') ?>

<!-- ============================================================== -->
<!-- Page Content -->
<!-- ============================================================== -->
<div id="page-wrapper">
    <div class="container-fluid">       
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Dashboard <i class="ti-angle-double-right"></i> Add Car Color</h4> 
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <button class="right-side-toggle waves-effect waves-light btn-info btn-circle pull-right m-l-20"><i class="ti-settings text-white"></i></button>
                <ol class="breadcrumb">
                    <li><a href="dashboard.php">Dashboard</a></li>                    
                    <li class="active">Car Color</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->

        <!-- ============================================================== -->
        <!-- Different data widgets -->
        <!-- ============================================================== -->
        <!--.row-->                       
        <div class="col-md-12">
            <div class="white-box">
                <!-- <div class="panel panel-info">
                    <div class="panel-heading"><i class="mdi mdi-account-plus"></i> New Customer</div>                            
                </div>  -->

                <div class="panel panel-info">
                    <div class="panel-heading" style="margin-bottom: 15px;">
                        <h3 class="panel-title"><i class="mdi mdi-car"></i> Add Car Color
                            <p class="pull-right">                                
                                <a href="manage_car_color.php" class="btn btn-success"><span class="hide-menu">  View Car Color</span></a>
                            </p>
                        </h3>
                    </div>              
                    <form class="form-horizontal" name="myCarColor" method="post" action="<?=base_url?>operation.php?func=car_color">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Car Color English*</label>
                            <div class="col-sm-9">                                
                                <input type="text" class="form-control" name="carColor_eng" placeholder="Enter car Color english" required data-parsley-required-message="Please enter your car color english.">                                
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Car Color Arabic*</label>
                            <div class="col-sm-9">                                
                                <input type="text" class="form-control" name="carColor_arb" placeholder="Enter car Color arabic" required data-parsley-required-message="Please enter your car color arabic.">                                
                            </div>
                        </div>        
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-9">
                                <button Color="submit" name="submit" class="btn btn-info waves-effect waves-light m-t-10">Add Car Color</button>
                            </div>
                        </div>
                        <br>
                    </form>
                </div>
            </div>
        </div>

    </div>
        <!--./row-->
        <!-- ============================================================== -->
        <!-- end right sidebar -->
        <!-- ============================================================== -->

    </div>
    <!-- /.container-fluid -->
            
<?php include('footer.php'); ?>

<script type="text/javascript">
    
    $(document).ready(function() {

        $("form[name=myCarColor]").parsley();

        $("form[name=myCarColor]").on('submit', function(e) {
            e.preventDefault();

            var f = $(this);
            f.parsley().validate();

            if (f.parsley().isValid()) {            

                var formData = new FormData(this);

                $.ajax({
                    type:'POST',
                    url: $(this).attr('action'),
                    data:formData,
                    cache:false,
                    contentType: false,
                    processData: false,
                    success:function(data){
                        console.log("success");
                        console.log(data); 
                        toastr.success('Car Color Record Inserted.', 'SADIK NOW SAYS!',{
                          timeOut: 2000,
                          extendedTimeOut: 1000,
                          positionClass: 'toast-top-right',
                          closeButton: true,
                        });                    
                        setTimeout(function(){ 
                            window.location.href = '<?=base_url?>' + 'manage_car_color.php';  
                        }, 1000);                   
                    },
                    error: function(data){
                        console.log("error");
                        console.log(data);
                    }
                });
               
            }
        });
    });

</script>