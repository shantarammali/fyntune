<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $title; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  

  </head>
  <style type="text/css">
      .manage_button{
        margin-right: 8px
      }
  </style>
  <body class="hold-transition skin-blue sidebar-mini" style="background-color:white">
    <div class="wrapper" style="background-color:white">

      
       <?php  $this->load->view($page);  ?>
	  
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->
     <!-- jQuery 2.1.4 -->
   
  </body>
</html>

