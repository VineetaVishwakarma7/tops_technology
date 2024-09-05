<?php

    include_once('model.php');

 class control extends model
 {
 	function __construct()
 	{
        session_start();
        model::__construct();

 		$url=$_SERVER['PATH_INFO'];
        switch($url)
        {
            
            case'/admin':
            if(isset($_REQUEST['submit']))
            {
                $email=$_REQUEST['email'];
                $password=md5($_REQUEST['password']);
               
                
                $where=array("email"=>$email,"password"=>$password);
                $run=$this->select_where('admins',$where);
                
                $res=$run->num_rows; // check cond by rows
                if($res==1) // 1 means true
                {
                   
                    
                    echo "<script> 
                        alert('Login Success') 
                        window.location='manage_customer';
                        </script>";
                    
                }
                else
                {
                    echo "<script> 
                        alert('Login Failed due wrong credebntial') 
                        window.location='index';
                        </script>";
                }
            }
            
            include_once('index.php');
            break;



            

            case'/add_customer':
            if(isset($_REQUEST['submit']))
            {
                $name=$_REQUEST['name'];
                $email=$_REQUEST['email'];
                $address=$_REQUEST['address'];
                $mobile=$_REQUEST['mobile'];


                // image uploading
                $file=$_FILES['file']['name'];  // get only input type="file"
                $path='img/'.$file;
                $dup_file=$_FILES['file']['tmp_name'];// duplicate file get 
                move_uploaded_file($dup_file,$path);

                $password=md5($_REQUEST['password']);

                $arr_data=array("name"=>$name,"email"=>$email ,"address"=>$address, "mobile"=>$mobile,"file"=>$file,"password"=>$password);

                $res=$this->insert('customer',$arr_data);  
                if($res)
                {
                    echo "
                            <script>
                                alert('Submit SuccessFully');
                            </script>
                            ";
                }
                else
                {
                    echo "Error";
                }
            }
            include_once('add_customer.php');
            break;

            case'/delete':

            if(isset($_REQUEST['del_cust_id']))
            {
                $cust_id=$_REQUEST['del_cust_id'];
                $where=array("cust_id"=>$cust_id);
                $res=$this->delete_where('customer',$where);
                if($res) // 1 means true
                {
                    echo "<script> 
                        alert('Delete Success') 
                        window.location='manage_customer';
                        </script>";
                }
            }

            break;

            case '/edit_customer':
           if(isset($_REQUEST['edit_cust_id']))
            {
                $cust_id=$_REQUEST['edit_cust_id'];
                $where=array("cust_id"=>$cust_id);
                $run=$this->select_where('customer',$where);
                $fetch=$run->fetch_object();
                $old_file=$fetch->file;
                
                if(isset($_REQUEST['submit']))
                {
                    
                    $name=$_REQUEST['name'];
                    $email=$_REQUEST['email'];
                    $address=$_REQUEST['address'];                    
                    $mobile=$_REQUEST['mobile'];

                    
                    if($_FILES['file']['size']>0)
                    {
                        $file=$_FILES['file']['name'];  // get only input type="file"
                        $path='img/customer/'.$file;
                        $dup_file=$_FILES['file']['tmp_name'];// duplicate file get 
                        move_uploaded_file($dup_file,$path);
                        
                        $arr=array("name"=>$name,"email"=>$email,"address"=>$address,"file"=>$file);
                        $res=$this->update('customer',$arr,$where);
                        if($res)
                        {
                            unlink('upload/customer/'.$old_file);
                            echo "<script> 
                            alert('Update Success'); 
                            window.location='manage_customer';
                            </script>";
                        }
                    }
                    else
                    {
                        $arr=array("name"=>$name,"email"=>$email,"address"=>$address);
                        $res=$this->update('customer',$arr,$where);
                        if($res)
                        {
                            echo "<script> 
                            alert('Update Success'); 
                            window.location='manage_customer';
                            </script>";
                        }
                    }
                }
                
            }
            include_once('edit_customer.php');    
            break;


            case '/status':
            if(isset($_REQUEST['statusuidbtn']))
            {
                $cust_id=$_REQUEST['statusuidbtn'];
                $where=array("cust_id"=>$cust_id);
    
                $run=$this->select_where('customer',$where);
                $fetch=$run->fetch_object();
                $status=$fetch->status;
                if($status=="Block")
                {
                    $data=array("status"=>"Unblock");
                    $res=$this->update('customer',$data,$where);
                    if($res)
                    {
                        echo "<script>
                            alert('Unblock Success');
                            window.location='manage_customer';
                            </script>";
                    }
                }
                else
                {
                    $data=array("status"=>"Block");
                    $res=$this->update('customer',$data,$where);
                    if($res)
                    {
                        
                        echo "<script>
                            alert('Block Success');
                            window.location='manage_customer';
                            </script>";
                    }
                }
            }
            
            break;

            case'/manage_customer':
            $customer_arr=$this->selectall('customer');
            include_once('manage_customer.php');
            break;

            
        }
 	}

 }
 $obj=new control;

?>