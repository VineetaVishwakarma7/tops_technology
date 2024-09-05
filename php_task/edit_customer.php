
<?php
  include_once('header.php');
?>
<div class="container mt-5">
  <div class="row"><hr>
    <center><b>Edit Customer</b></center><hr><br><br><br>
    <div class="col-md-12">

                    <form class="main_form" action ="" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <input class="form-control" placeholder="Your name"value="<?php echo $fetch->name;?>" type="text" name="name">
                            </div><br><br>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <input class="form-control" placeholder="Email" value="<?php echo $fetch->email;?>"type="email" name="email">
                            </div><br><br>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <input class="form-control" placeholder="address"value="<?php echo $fetch->address;?>" type="text" name="address">
                            </div><br><br>
                            
                            <div class=" col-md-12">
                                <input class="form-control" placeholder="Mobile Number"value="<?php echo $fetch->mobile;?>" type="number" name="mobile">
                            </div><br><br>
                            <div class=" col-md-12">
                                <input class="form-control" value=<img src="img/<?php echo $fetch->file;?>"placeholder="Image" type="file" name="img"/>
                            </div><br><br>
                            <div class=" col-md-12">
                               
                               <div>
                                <button class="btn btn-primary py-1 px-5"name="submit" value="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
  </div>
</div>

<?php
  include_once('footer.php');
?>
