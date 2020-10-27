<!DOCTYPE html>
<html>
<head>
<title><?php echo $title; ?></title>
</head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<body>
	<?php  $this->load->view('header');  ?>
	<div class="container">

	<p><h2>Orders Listing Page</h2></p>
		 <table class="table" >
		  <tr>
		  	<th>User Id </th>
		  	<th>User Name </th>
		  	 <th>Address</th>
		  	<th>UserType</th> 
		    <th>OrderId</th>
		    
		    <th>Order Total</th>
		    <th>VIEW</th>
		   
		   
		  </tr>
		  <?php if(empty($userProductDetails)){ 
		  	 echo "<tr><td>Record Not Found</td></tr>";
		    }else { ?>
		  <?php 	

		  foreach($userProductDetails as $userProductDetail ) { ?>
		  <tr>
		  	<td><?php echo $userProductDetail->id; ?></td>
		  	<td><?php echo $userProductDetail->name; ?></td>
		  	<td><?php echo $userProductDetail->address; ?></td>
		  	<td><?php 
		    	if($userProductDetail->user_type==0){
		             echo "Customer"; 
		        }else{
		        	 echo "Guest"; 	
		        }
		    ?></td>
		    <td><?php echo $userProductDetail->order_id; ?></td>
		    
		    <td>$<?php echo $userProductDetail->total; ?></td>
		   <td>
		    	<?php echo anchor(base_url('user/item_details/'.$userProductDetail->order_id), 'Order Item Details', 'title="Details Info"');	?>
		    </td>
		   
		  </tr>
		<?php }
	      } ?>
		 
		 </table>
    </div>
</body>
</html>