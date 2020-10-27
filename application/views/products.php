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

	<p><h2>Product Listing Page</h2></p>
	<span><?php echo anchor(base_url('products/cart'), 'Cart', ['class'=>"btn btn-info ",'style'=>'float:right']);	?></span>
		 <table class="table" >
		  <tr>
		  	<th>ID </th>
		    <th>Title</th>
		    <th>Price</th> 
		    <th>Description</th>
		    <th>Category</th>
		    <th>Image</th>
		    <th>Operation</th>
		  </tr>
		  <?php foreach($products as $product ) { ?>
		  <tr>
		  	<td><?php echo $product->id; ?></td>
		    <td><?php echo $product->title; ?></td>
		    <td><?php echo $product->price; ?></td>
		    <td><?php echo $product->description; ?></td>
		    <td><?php echo $product->category; ?></td>
		    <td><img src="<?php echo $product->image; ?>" width="50px" height="50px"> </img></td>
		    <td>
		    	<?php echo anchor(base_url('products/product_details/'.$product->id), 'Details Info', 'title="Details Info"');	?>
		    </td>
		  </tr>
		<?php } ?>
		 
		 </table>
    </div>
</body>
</html>