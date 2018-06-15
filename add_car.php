<?php include('header.php');

// mysqli_query("ALTER TABLE `pavan_customer` ADD `verifyCode` VARCHAR(150) NOT NULL AFTER `lang_status`");

$queryCarType = mysqli_query($con,"SELECT * FROM `pavan_car_type` WHERE is_delete = 0");
$queryCarBrand = mysqli_query($con,"SELECT * FROM `pavan_car_brand` WHERE is_delete = 0");
$querycarEngine = mysqli_query($con,"SELECT * FROM `pavan_engine_type` WHERE is_delete = 0");
$querycarColor = mysqli_query($con,"SELECT * FROM `pavan_color` WHERE is_delete = 0");

?>

<!-- ============================================================== -->
<!-- Page Content -->
<!-- ============================================================== -->
<div id="page-wrapper">
    <div class="container-fluid">       
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Dashboard <i class="ti-angle-double-right"></i> Add Car</h4> 
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <button class="right-side-toggle waves-effect waves-light btn-info btn-circle pull-right m-l-20"><i class="ti-settings text-white"></i></button>
                <ol class="breadcrumb">
                    <li><a href="dashboard.php">Dashboard</a></li>                    
                    <li class="active">Car</li>
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
                <div class="panel panel-info">
                    <div class="panel-heading" style="margin-bottom: 15px;">
                        <h3 class="panel-title"><i class="mdi mdi-car"></i> Add Car
                            <p class="pull-right">                                
                                <a href="manage_car.php" class="btn btn-success"><span class="hide-menu">  View Car</span></a>
                            </p>
                        </h3>
                    </div>              
                    <form class="form-horizontal" name="myCar" method="post" enctype="multipart/form-data" action="<?=base_url?>operation.php?func=addCar">                    
                    	<div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Select Car Type*</label>
                            <div class="col-sm-9">
                                <select class="selectpicker form-control" name="carType" data-live-search="true" required="" data-parsley-required-message="Please select car type.">
                                        <option value="">Select car type</option>                                          
                                        <?php while ($rowCarType = mysqli_fetch_assoc($queryCarType)) {  ?>
                                          
                                            <option value="<?=$rowCarType['id']?>" data-tokens="<?=$rowCarType['id']?>"><?=$rowCarType['car_type_e']?></option>

                                        <?php } ?>                                        
                                 </select>
                            </div>
                        </div>    
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Select Brand*</label>
                            <div class="col-sm-9" >
                                <select class="selectpicker form-control" name="carBrand" data-live-search="true" required="" data-parsley-required-message="Please select Brand.">
                                        <option value="">Select Brand</option>                                         
                                         <?php while ($rowCarBrand = mysqli_fetch_assoc($queryCarBrand)) {  ?>
                                          
                                            <option value="<?=$rowCarBrand['id']?>" data-tokens="<?=$rowCarBrand['id']?>"><?=$rowCarBrand['brand_name_e']?></option>

                                        <?php } ?>                                          
                                 </select>
                            </div>
                        </div>         
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Model Name English*</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="modelname_eng" placeholder="Enter Car english" required="" data-parsley-required-message="Please enter model name english."> 
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Model Name Arabic*</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="modelname_arb" placeholder="Enter Car arabic" required="" data-parsley-required-message="Please enter model name arabic."> 
                            </div>
                        </div>                  
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Model Year</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="modelname_year" placeholder="Enter model year" required="" data-parsley-required-message="Please enter model year."> 
                            </div>
                        </div>  
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Select Engine Type</label>
                            <div class="col-sm-9">
                                <select class="selectpicker form-control" name="engineType" data-live-search="true">
                                    <option value="">Select Engine Type</option>                                         
                                    <?php while ($rowCarEngine = mysqli_fetch_assoc($querycarEngine)) {  ?>
                                          
                                            <option value="<?=$rowCarEngine['id']?>" data-tokens="<?=$rowCarEngine['id']?>"><?=$rowCarEngine['engine_type_e']?></option>

                                    <?php } ?>                                         
                                 </select>
                            </div>
                        </div>  
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Car Image</label>
                            <div class="col-sm-9">
                                <span class="btn btn-default btn-file"><span>Choose file</span><input type="file" name="carImage" /></span>
                                <span class="fileinput-filename"></span><span class="fileinput-new">No file chosen</span>
                            </div>
                        </div>                          
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Select Color*</label>
                            <div class="col-sm-9 error-span">
                                <select class="" multiple name="colors[]" required="" data-parsley-required-message="Please select your services.">                                                          
                                  <?php while ($rowCarColor = mysqli_fetch_assoc($querycarColor)) {  ?>
                                          
                                            <option value="<?=$rowCarColor['id']?>"><?=$rowCarColor['color_e']?></option>

                                    <?php } ?>  
                                </select>
                                 <button class="submitBtn" type="submit">Submit</button>
                                <script>
                                    $('.multipleSelect').fastselect();
                                </script>
                            </div>
                        </div> 
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Transmission</label>
                            <div class="col-sm-9">
                                <div class="radio-list">
                                    <label class="radio-inline">
                                        <input type="radio" name="transmission" value="1"> Auto </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="transmission" value="2"> Manual </label>
                                </div>
                            </div>
                        </div>  
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Fuel type*</label>
                            <div class="col-sm-9">
                                <div class="checkbox-list">                                    
                                    <label class="radio-inline">
                                        <input type="checkbox" name="fuleType[]" value="Petrol"> Petrol </label>
                                    <label class="radio-inline">
                                        <input type="checkbox" name="fuleType[]" value="PetrolDiesel"> PetrolDiesel </label>
                                    <label class="radio-inline">
                                        <input type="checkbox" name="fuleType[]" value="LPG/Autogas"> LPG/Autogas </label>
                                    <label class="radio-inline">
                                        <input type="checkbox" name="fuleType[]" value="Electric"> Electric </label>
                                    <label class="radio-inline">
                                        <input type="checkbox" name="fuleType[]" value="Hybrid"> Hybrid </label>
                                    <label class="radio-inline">
                                        <input type="checkbox" name="fuleType[]" value="Hydrogen"> Hydrogen </label>
                                </div>
                            </div>
                        </div> 
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Description English</label>
                            <div class="col-sm-9">                                
                                <textarea class="summernote input-block-level" id="description_eng" name="description_eng" rows="10" cols="100"></textarea>
                            </div>
                        </div>  
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Description Arabic</label>
                            <div class="col-sm-9">
                                <!-- <div class="summernote">
                                    <h3>Description Arabic</h3> 
                                </div> -->
                                <textarea class="summernote input-block-level" id="description_arb" name="description_arb" rows="10" cols="100"></textarea>
                            </div>
                        </div>                                                                                      
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-9">
                                <button type="submit" name="submit" class="btn btn-info waves-effect waves-light m-t-10">Add Car</button>
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

        $("form[name=myCar]").parsley();

        $("form[name=myCar]").on('submit', function(e) {

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
                        toastr.success('Car Record Inserted.', 'SADIK NOW SAYS!',{
                          timeOut: 2000,
                          extendedTimeOut: 1000,
                          positionClass: 'toast-top-right',
                          closeButton: true,
                        });                          
                        setTimeout(function(){ 
                            window.location.href = '<?=base_url?>' + 'manage_car.php';  
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