<?php

// if(isset($_SESSION['admin']))
// {
  
// }
// else
// {
//   echo "<script>
//   window.location='index';
//   </script>";
// }
?>
<?php
  include_once('header.php');
?>
<div class="container mt-5">
  <div class="row">
    
    <div class="col-md-12">

                    <form class="main_form" action ="" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <input class="form-control" placeholder="Your name" type="text" name="name">
                            </div><br><br>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <input class="form-control" placeholder="Email" type="email" name="email">
                            </div><br><br>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <input class="form-control" placeholder="address" type="text" name="address">
                            </div><br><br>
                            
                            <div class=" col-md-12">
                                <input class="form-control" placeholder="Mobile Number" type="number" name="mobile">
                            </div><br><br>
                            <div class=" col-md-12">
                                <input class="form-control" placeholder="Image" type="file" name="file">
                            </div><br><br>
                            <div class=" col-md-12">
                            <div class=" col-md-12">
                                <input class="form-control" placeholder="Password" type="text" name="password">
                            </div><br><br>
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