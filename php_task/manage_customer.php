
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
// ?>
<?php
  include_once('header.php');
?>
<div class="panel panel-default">
                        <div class="panel-heading">
                        
                        </div>
                        <hr>
                        <center><b>Manage Customer</b></center>
                         <hr>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>User Name</th>
                                            <th>User Email</th>
                                            <th>User Address</th>
                                            <th>User Mobile</th>
                                            <th>User Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                      if(!empty($customer_arr))
                                      {
                                      foreach ($customer_arr as $data) 
                                      {
                                    ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $data->cust_id;?></td>
                                            <td><?php echo $data->name;?></td>
                                            <td><?php echo $data->email;?></td>
                                            <td><?php echo $data->address;?></td>
                                            <td class="center"><?php echo $data->mobile;?></td>
                                            <td class="center"><img src="img/<?php echo $data->file;?>width="30px" height="30px/>"/></td>
                                            <td class="center">
                                                <a href="edit_customer?edit_cust_id=<?php echo $data->cust_id;?>"class="btn btn-primary">Edit</a>
                                                <a href="delete?del_cust_id=<?php echo $data->cust_id;?>"class="btn btn-danger">Delete</a>
                                                <a href="status?statusuidbtn=<?php echo $data->cust_id;?>"class="btn btn-dark">Status</a>                 
                                            </td>
                                        </tr>
                                    <?php
                                      }
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
