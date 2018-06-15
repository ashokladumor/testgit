<?php include('header.php') ?>

<!-- ============================================================== -->
<!-- Page Content -->
<!-- ============================================================== -->
<div id="page-wrapper">
    <div class="container-fluid">        
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Dashboard <i class="ti-angle-double-right"></i> Add Car Brand</h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <button class="right-side-toggle waves-effect waves-light btn-info btn-circle pull-right m-l-20"><i class="ti-settings text-white"></i></button>
                <ol class="breadcrumb">
                    <li><a href="dashboard.php">Dashboard</a></li>                    
                    <li class="active">Car Brand</li>
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
                        <h3 class="panel-title"><i class="mdi mdi-car"></i> Add Car Brand
                            <p class="pull-right">                                
                                <a href="manage_car_Brand.php" class="btn btn-success"><span class="hide-menu">  View Car Brand</span></a>
                            </p>
                        </h3>
                    </div>              
                    <form class="form-horizontal" name="myBrand" action="<?=base_url?>/operation.php?func=car_Brand"  method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Car Brand English*</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="carbrand_eng" placeholder="Enter car Brand english" required data-parsley-required-message="Please enter your car brand english."> 
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Car Brand Arabic*</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="carbrand_arb" placeholder="Enter car Brand arabic" required data-parsley-required-message="Please enter your car brand arabic."> 
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Car Brand Image</label>
                            <div class="col-sm-9">
                                <span class="btn btn-default btn-file"><span>Choose file</span><input type="file" name="carbrand_img" /></span>
                                <span class="fileinput-filename"></span><span class="fileinput-new">No file chosen</span>
                            </div>
                        </div>            
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-9">
                                <button type="submit" name="submit" class="btn btn-info waves-effect waves-light m-t-10">Add Car Brand</button>
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

        $("form[name=myBrand]").parsley();

        $("form[name=myBrand]").on('submit', function(e) {

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
                        toastr.success('Car Brand Record Inserted.', 'SADIK NOW SAYS!',{
                          timeOut: 2000,
                          extendedTimeOut: 1000,
                          positionClass: 'toast-top-right',
                          closeButton: true,
                        });                    
                        setTimeout(function(){ 
                            window.location.href = '<?=base_url?>' + 'manage_car_brand.php';  
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