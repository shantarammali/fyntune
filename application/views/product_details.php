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

		<div class="row"><br>
			<span><?php echo anchor(base_url(), 'Products Listing', ['class'=>"btn btn-info ",'style'=>'float:right']);	?></span>
			<?php echo form_open(base_url('products/add_products/'.$product->id), 'class="email" id="myform"'); ?>
				<div class='col-md-3'>
		 			<img src="<?php echo $product->image; ?>" width="300px" height="300px">
		 		</div>
		 		<div class='col-md-1'></div>
		 		<div class='col-md-4' style="margin-top: 62px;">
		 			  <span><b><?php echo $product->title; ?></span></b><br><br>
		 			  <span><?php echo $product->description; ?></span><br><br>
		 			  <span style="color:red">$<?php echo $product->price; ?></span>
		 			  <!-- <span class=""><a class="btn btn-success" href="<?php echo base_url('products/add_products/'.$product->id); ?>">Add TO Cart</a></span> -->

		 			 <?php echo form_input('image',$product->image,['class'=>'hidden']);?>
			 		<?php echo form_input('title',$product->title,['class'=>'hidden']);?>
			 		<?php echo form_input('description',$product->description,['class'=>'hidden']);?>
			 		<?php echo form_input('price',$product->price,['class'=>'hidden']);?>
			 		<?php echo form_submit('add_to_cart','Add To Cart','class="btn btn-success"'); ?>
		 		</div>

	 		<?php echo form_close();?>
		</div>
    </div>
</body>
</html>