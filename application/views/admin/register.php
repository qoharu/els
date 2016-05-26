<?php include 'application/views/header.php' ?>
<?php include 'application/views/sidebar.php' ?>

<div class="content-wrapper">
  <section class="content col-md-12">
    <div class="box box-solid">
      <div class="box-header with-border">
        <h3 class="box-title">Register New User</h3>
      </div>

      <div class="box-body">
      <div class="row">
        <div class="col-md-5 content-left">
          <form action="<?php echo site_url('admin/register_post') ?>" method="post" >
          <h4 class="col-md-12">Fill form</h4>
              <div class="form-group col-md-12">
                <input class="form-control input-md" type="text" name="fullname" placeholder="Full Name" required="">
              </div>

              <div class="form-group col-md-12">
                <input class="form-control input-md" type="email" name="email" placeholder="Email" required="">
              </div>

              <div class="form-group col-md-12">
                <div class="input-group">
                  <input class="form-control input-md" type="password" id="password" name="password" placeholder="Password" required="">
                  <span class="input-group-btn">
                    <a class="btn btn-flat btn-default" id="passbtn" ><i class="fa fa-eye"></i></a>
                  </span>
                  
                </div>
              </div>

              <div class="form-group col-md-12">
                <select class="form-control input-md" name="level">
                  <option value="2">Business Expert</option>
                  <option value="3">Karyawan</option>
                </select>
              </div>
              <div class="form-group col-md-4 pull-right">
                <input class="btn btn-block btn-primary btn-flat" type="submit">
              </div>
            </form>
        </div>
        <div class="content-reg col-md-2 text-center">
        <h2>OR</h2>
          
        </div>
        <div class="col-md-5 content-right">
          <form action="<?php echo site_url('admin/register_file') ?>" method="post" enctype="multipart/form-data" >
            <h4 class="col-md-12">Upload CSV</h4>
              <div class="form-group col-md-12">
                <input class="form-control input-md" type="file" name="file_csv" placeholder="Full Name" required="">
              </div>

              <div class="form-group col-md-4 pull-right">
                <input class="btn btn-block btn-primary btn-flat" type="submit" value="Upload">
              </div>
            </form>
        </div>

      </div>
      </div>
    </div>
  </section>
</div>

<script type="text/javascript">
$("#passbtn").click(function(){
  if ($("#password").attr('type') == "password") {
    $("#password").attr('type', 'text');
    $("#passbtn").html("<i class='fa fa-eye-slash'></i>");
  }else{
    $("#password").attr('type', 'password');
    $("#passbtn").html("<i class='fa fa-eye'></i>");
  }
});
</script>