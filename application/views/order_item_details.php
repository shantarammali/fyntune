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

	<p><h2>Orders Item Listing Page</h2></p>
		 <table class="table" >
		  <tr>
		  	<th>Sr No.</th>
		  	<th>title</th>
		  	 <th>description</th>
		  	<th>image</th> 
		    <th>price</th>
		    
		  </tr>
		  <?php if(empty($itemDetails)){ 
		  	 echo "<tr><td>Record Not Found</td></tr>";
		    }else { ?>
		  <?php 	
		  $count=0;
		  foreach($itemDetails as $itemDetail ) { ?>
		  <tr>
		  	<td><?php echo ++$count;?></td>
		  	<td><?php echo $itemDetail->title; ?></td>
		  	<td><?php echo $itemDetail->description; ?></td>
		  	<td><?php echo $itemDetail->image; ?></td>
		  
		    <td><?php echo $itemDetail->price; ?></td>
		    
		   
		  </tr>
		<?php }
	      } ?>
		 
		 </table>
    </div>
</body>
</html>