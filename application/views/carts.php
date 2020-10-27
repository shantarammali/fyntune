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

	<p><h2>Cart</h2></p>
	<span><?php echo anchor(base_url('products/clearCart'), 'Clear Cart', ['class'=>"btn btn-info ",'style'=>'margin-left:80%']);	?></span>
	<span><?php echo anchor(base_url(), 'Products Listing', ['class'=>"btn btn-info ",'style'=>'float:right']);	?></span>
		 <table class="table" >
		  <tr>
		  	<th>Image</th>
		    <th>Title</th> 
		    <th>Price</th>
		   </tr>
		  <?php 
		  $total=0;
		  if(empty($carts['order_item_details'])){
		  	echo "<tr><td><b>No Data In Cart</b></td></tr>";
		  }
		  foreach($carts['order_item_details'] as $key => $product ){
		   ?>
		  <tr>
		  	<td><img src="<?php echo $product['image']; ?>" width="50px" height="50px"> </img></td>
		  	<td><?php echo $product['title']; ?></td>
		    <td><?php echo $product['price']; ?></td>
		    
		  </tr>
		<?php 
			$total=$total+$product['price'];
	     } 
	     $this->session->set_userdata('order_total',$total);
	     ?>
		 </table>
		 <div class="row">
		 	<div class="col-md-12">
		 		<span style="margin-left: 91%;"><b>Total: $<?php echo $total; ?></b></span>
		 		<span style="margin-left: 91%;">
		 			<?php 
				       if(!empty($carts['order_item_details']) && ($this->session->userdata['user_data']!='')){
						  	echo anchor(base_url().'products/placeorder','Placeorder With COD','class="btn btn-info "');
						}else if($this->session->userdata['user_data']!=''){
							
						}
						else{
							?>
							<button class="btn btn-info" id="checkout" data-toggle="modal" data-target="#myModal">Checkout</button></span>
						<?php }
				       ?>

		 	</div>
		 </div>
    </div>

    <!-- Trigger the modal with a button -->


<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Checkout</h4>
      </div>
      <!-- <div class="modal-body">
        <p>Login User</p>
        <?php echo form_open(base_url('user/login'), 'class="" id="myform"'); ?>
        <?php echo form_input('email','',['class'=>'form-control','placeholder'=>'Enter Email']);?><br>
        <?php echo form_password('password','','class="form-control" placeholder="password" id="password"' );?> <br>
        <?php echo form_submit('Login','Login','class="btn btn-primary"'); ?>
        <?php echo form_close();?>
      </div> -->
      <div class="modal-body">
       <?php echo anchor(base_url().'user/login','Login','class="btn btn-info "'); ?>
       <?php echo anchor(base_url().'user/signup','Signup','class="btn btn-info "'); ?>

      <?php echo anchor(base_url().'user/guestUser','Checkout As Guest','class="btn btn-info "'); ?>
		
      	<?php //echo anchor(base_url().'user/guestUser','Checkout As Guest','class="btn btn-info "'); ?>
      </div>
      <div class="modal-footer">
      	
      	
      	<button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

</body>
</html>