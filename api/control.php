
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
			
			
			
			case '/manage_customer':	
				$res=$this->select('customer');
				$count=count($res); 
				if($count > 0)
				{	
					echo json_encode($res);
				}
				else
				{	
					echo json_encode(array("message" => "No Customer Found.", "status" => false));
				}
			break;
			
			case '/customer_single_get':	
	
				$id = $_GET['cust_id'];			
				$where=array("cust_id"=>$cust_id);
				$chk=$this->select_where('customer',$where);
				$res=$chk->fetch_object();
				if($res)
				{	
					echo json_encode($res);
				}
				else
				{	
					echo json_encode(array("message" => "No Customer Found.", "status" => false));
				}
			break;
			
			case '/customer_post':	
			
				$data_arr = json_decode(file_get_contents("php://input"), true);
				$name = $data_arr["name"]; 
                $email = $data_arr["email"];
				$address = $data_arr["address"];
				$mobile = $data_arr["mobile"];
				$file = $data_arr["file"];
				
				$file=$_POST['file']['name'];
				$path='../img/'.$file;
				$tmp_path=$_POST['file']['tmp_name'];
				move_uploaded_file($path,$tmp_path);
				
				
				
				$arr=array("name"=>$name,"email"=>$email,"address"=>$address,"mobile"=>$mobile,"file"=>$file);
				
				$res=$this->insert('customer',$arr);
				if($res or die("Insert Query Failed"))
				{
					echo json_encode(array("message" => "Customer Inserted Successfully", "status" => true));	
				}
				else
				{
					echo json_encode(array("message" => "Customer Contacts Not Inserted ", "status" => false));	
				}
			break;
			
			case '/customer_delete':	
			
				$id = $_GET['cust_id'];
				$where=array("cust_id"=>$cust_id);
				$res=$this->delete('customer',$where);
				if($res or die("Delete Query Failed"))
				{	
					echo json_encode(array("message" => "Customer Delete Successfully", "status" => true));	
				}
				else
				{	
					echo json_encode(array("message" => "Failed Customer Not Deleted", "status" => false));	
				}
			break;
			
			case '/customer_put':	
				
				$data_arr = json_decode(file_get_contents("php://input"), true);
				
				$cust_id = $data_arr["cust_id"];
				$name = $data_arr["name"];
                $email=$data_arr["email"];
				$address = $data_arr["address"];
				$mobile = $data_arr["mobile"];
				$file = $data_arr["file"];
				
				
				$arr=array("name"=>$name,"email"=>$email,"address"=>$address,"mobile"=>$mobile,"file"=>$file);
				$where=array("cust_id"=>$cust_id);
				
				$res=$this->update_where('customer',$arr,$where);
				
				if($res or die("Update Query Failed"))
				{	
					echo json_encode(array("message" => "Customer Update Successfully", "status" => true));	
				}
				else
				{	
					echo json_encode(array("message" => "Failed Customer Not Update", "status" => false));	
				}
			break;				
		}
	}
}

$obj=new control;

?>