<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>ADMIN MODULE</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" media="screen" title="no title">
  </head>
  <body>
 
    <div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">ALTER USER STATUS</h3>
                </div>
                <?php
              $success_msg= $this->session->flashdata('success_msg');
              $error_msg= $this->session->flashdata('error_msg');
 
                  if($success_msg){
                    ?>
                    <div class="alert alert-success">
                      <?php echo $success_msg; ?>
                    </div>
                  <?php
                  }
                  if($error_msg){
                    ?>
                    <div class="alert alert-danger">
                      <?php echo $error_msg; ?>
                    </div>
                    <?php
                  }
                  ?>
 
                <div class="panel-body">
                    <form role="form" method="post" action="<?php echo base_url('user/alt_user'); ?>">
                        <fieldset>
                            <div class="form-group"  >
                                <input class="form-control" placeholder="Username" name="username" type="text" autofocus>
                            </div>
                      <h4 class ="panel-title">CHOOSE NEW STATUS</h4>
                            <br>
                            Buyer
                            <div class="form-group">
                                <input class="form-control" name="status" type="radio" value="buyer">
                                   </div>
                            Admin
                                <div class="form-group">
                                <input class="form-control" name="status" type="radio" value="admin">
                                       </div>
                            Seller
                            <div class="form-group">
                                <input class="form-control" name="status" type="radio" value="seller">
                                       </div>

                                <input class="btn btn-lg btn-success btn-block" type="submit" value="Alter" name="Alter" />
 
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
 
 
  </body>
</html>