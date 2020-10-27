<style>
* {box-sizing: border-box;}

body { 
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.header {
  overflow: hidden;
  background-color: #acace4;
  padding: 00px 10px;
}

.header a {
  float: left;
  color: black;
  text-align: center;
  padding: 12px;
  text-decoration: none;
  font-size: 18px; 
  line-height: 25px;
  border-radius: 4px;
}

.header a.logo {
  font-size: 25px;
  font-weight: bold;
}

.header a:hover {
  background-color: #ddd;
  color: black;
}

.header a.active {
  background-color: dodgerblue;
  color: white;
}

.header-right {
  float: right;
}

@media screen and (max-width: 500px) {
  .header a {
    float: none;
    display: block;
    text-align: left;
  }
  
  .header-right {
    float: none;
  }
}
</style>

<body>

<div class="header">
  <?php echo anchor(base_url(), 'Fyntune', ['class'=>"logo",'style'=>'']);  ?>
  <div class="header-right">
    <?php echo anchor(base_url('user/order_listing'), 'Order Listing', ['class'=>"",'style'=>'']);  ?>
    <?php if(($this->session->userdata['user_data']!='')) {
         echo "<span>".$this->session->userdata['user_data']['name']."<span>"; ?>
         <span><?php echo anchor(base_url('user/logout'), 'LOGOUT', ['class'=>"btn btn-info ",'style'=>'float:right']);  ?></span>
         <?php 
     }else{
      ?>
      <span><?php echo anchor(base_url('user/login'), 'LOGIN', ['class'=>"btn btn-info ",'style'=>'float:right']);  ?></span>
      <?php  } ?>
    <!-- <a class="active" href="#home">Home</a>
    <a href="#contact">Contact</a>
    <a href="#about">About</a> -->
  </div>
</div>

