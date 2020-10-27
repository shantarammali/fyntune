
        <!-- Main content -->
        <div  class="container">
          <div class="row">
            <!-- left column -->
            <div class="col-sm-offset-3 col-md-6">
              <!-- general form elements -->
              <div class="">
                <div class="box-header with-border">
                  <h3 class="box-title">Check Out As Guest</h3>
                  <span class="pull-right"><b>Order Total: $<?php echo $order_total;?></b></span>
                </div><!-- /.box-header -->
				        <?php 
			
                 if ($this->session->flashdata('error')) {
                  ?>
                  <div class="alert alert-danger">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      <strong>Error!</strong> <?php echo $this->session->flashdata('error'); ?>
                  </div>
                  <?php
                  $this->session->unset_userdata('error');
                  $this->session->unset_userdata('success');
                 } ?>

      				<?php 			
               if ($this->session->flashdata('success')) {
                ?>
                <div class="alert alert-success">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Success!</strong> <?php echo $this->session->flashdata('success'); ?>
                </div>
                <?php
                $this->session->unset_userdata('error');
                $this->session->unset_userdata('success');
                }
				    ?>
				
                <!-- form start -->
                <?php echo form_open('user/guestUser',['class'=>'form-horizontal','id'=>'loginForm']);?>
                <div class="box-body"> 
                      <div class="form-group">
                          <?php echo form_label('Name','',['class'=>"col-sm-2 control-label"]);
                           echo form_input('name',($reset)?"":set_value('name'),'class="form-control" placeholder="Name"');?>
                          <?php echo form_error('name','<div class="error" style="color:red">','</div>');?>
                      </div>  
                      <div class="form-group">
                          <?php echo form_label('Phone','',['class'=>"col-sm-2 control-label"]);
                           echo form_input('phone',($reset)?"":set_value('phone'),'class="form-control" placeholder="Phone"');?>
                          <?php echo form_error('phone','<div class="error" style="color:red">','</div>');?>
                      </div>                     
                      <div class="form-group">
                          <?php echo form_label('Email','',['class'=>"col-sm-2 control-label"]);
    							         echo form_input('email',($reset)?"":set_value('email'),'class="form-control" placeholder="Email"');?>
    							        <?php echo form_error('email','<div class="error" style="color:red">','</div>');?>
                      </div>	
                      <div class="form-group">
                          <?php echo form_label('Address','',['class'=>"col-sm-2 control-label"]);
                           echo form_input('address',($reset)?"":set_value('address'),'class="form-control" placeholder="Address"');?>
                          <?php echo form_error('address','<div class="error" style="color:red">','</div>');?>
                      </div> 				
          					 
          				    <div class="box-footer">
                              <?php echo form_submit('submit','submit and place order with COD','class="btn btn-primary"'); ?>
                               <?php echo anchor(base_url(),'Home',['class'=>"btn btn-info pull-right",'style'=>'margin-right: 23px;
']); ?>
                              
                					
                     </div>
                 
                </div><!-- /.box -->
                <?php echo form_close(); ?>
			  
         
            </div><!--/.col (left) -->
            <!-- right column -->
            <!--/.col (right) -->
          </div>   <!-- /.row -->
        </div><!-- /.content -->
      
      