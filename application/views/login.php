<div  class="container">
          <div class="row">
            <!-- left column -->
            <div class="col-sm-offset-3 col-md-6">
              <!-- general form elements -->
              <div class="">
                <div class="box-header with-border">
                  <h3 class="box-title">Login</h3>
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
            <?php echo form_open('',['class'=>'form-horizontal','id'=>'userLoginForm']);?>
            <div class="box-body">                    
                <div class="form-group">
                  <?php echo form_label('Email','',['class'=>"col-sm-2 control-label"]);
    							echo form_input('email','','class="form-control" placeholder="email" id="email"');?>
    							<?php echo form_error('email','<div class="error" style="color:red">','</div>');?>
                  <span id="email_error" class="text-danger"></span>
                </div>					
			           <div class="form-group">
                  <?php echo form_label('password','',['class'=>"col-sm-2 control-label"]);
    							echo form_password('password','','class="form-control" placeholder="password" id="password"' );?>
    							<?php echo form_error('password','<div class="error" style="color:red">','</div>');?>
                  <span id="password_error" class="text-danger"></span>
                </div>             
    				    <div class="box-footer">
                    <?php echo form_submit('Login','submit','class="btn btn-primary"'); ?>

                     <?php echo anchor(base_url(),'Home',['class'=>"btn btn-info pull-right",'style'=>'margin-right: 23px;
']); ?>
                    <?php echo anchor(base_url().'user/signup','Signup',['class'=>"btn btn-info pull-right",'style'=>'margin-right: 25px;
']); ?>
          				
                </div>
            </div><!-- /.box -->
              <?php echo form_close(); ?>
            
			  
         
            </div><!--/.col (left) -->
            <!-- right column -->
            <!--/.col (right) -->
          </div>   <!-- /.row -->
</div>