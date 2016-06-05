<?php include 'application/views/header.php' ?>
<?php include 'application/views/sidebar.php' ?>

<div class="content-wrapper">
<section class="content col-md-12">
<div class="box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Users</h3>
                </div>
                <div class="box-body">
                <?php if (issuperadmin()): ?>
                  
                <a class="btn btn-primary pull-right" href="<?php echo site_url('admin/register') ?>">Register</a>
                <?php endif ?>

                <?php if (issuperadmin()): ?>
                <h3>Pending edit</h3>
                  <table class="table table-striped table-bordered" id="datatable">
                  <thead>
                    
                    <tr>
                      <th>ID</th>
                      <th>Full Name</th>
                      <th>Email</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                    <tbody>
                    <?php foreach ($pending as $data): ?>
                    <tr>
                      <td><?php echo $data->id_user ?></td>
                      <td><?php echo $data->fullname ?></td>
                      <td><?php echo $data->email ?></td>
                      <td>
                        <a class="btn btn-xs btn-primary" href="<?php echo site_url('admin/view_pending/'.$data->id_profile) ?>">view</a>
                        <a class="btn btn-xs btn-success" href="<?php echo site_url('admin/approve_pending/'.$data->id_pending) ?>">approve</a>
                        <a class="btn btn-xs btn-danger" href="<?php echo site_url('admin/decline_pending/'.$data->id_pending) ?>">decline</a></td>
                    </tr>
                    <?php endforeach ?>
                  </tbody>
                  </table>

                  <h3>Profile experience</h3>
                  <table class="table table-striped table-bordered" id="datatable">
                    <thead>
                    <tr>
                      <th>ID</th>
                      <th>Full Name</th>
                      <th>Keterangan</th>
                      <th>File</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($exp as $data): ?>
                    <tr>
                      <td><?php echo $data->id_exp ?></td>
                      <td><?php echo $data->fullname ?></td>
                      <td><?php echo $data->keterangan ?></td>
                      <td>
                        <a class="btn btn-xs btn-success" href="<?php echo base_url('uploads/experience/'.$data->file) ?>">View</a>
                      </td>
                      <td>
                        <a class="btn btn-xs btn-success" href="<?php echo site_url('admin/approve_exp/'.$data->id_exp) ?>">approve</a>
                        <a class="btn btn-xs btn-danger" href="<?php echo site_url('admin/decline_exp/'.$data->id_exp) ?>">decline</a></td>
                    </tr>
                    <?php endforeach ?>
                  </tbody>
                  </table>

                <?php endif ?>

			<h3>Business Expert</h3>
				<table class="table table-striped" id="datatable">
                    <thead>
                    <tr>
                      <th>ID</th>
                      <th>NIK</th>
                      <th>Fullname</th>
                      <th>Email</th>
                      <th>Registered</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                  <?php foreach ($be as $data): ?>
                    <tr>
                      <td><?php echo $data->id_user ?></td>
                      <td><?php echo $data->nik ?></td>
                      <td><?php echo $data->fullname ?></td>
                      <td><?php echo $data->email ?></td>
                      <td><?php echo $data->registered_at ?></td>
                      <td><?php echo $data->stat ?></td>
                      <td>
                        <a class="btn btn-xs btn-primary" href="<?php echo site_url('profile/'.$data->id_user) ?>">view</a>
                        <?php if (issuperadmin()): ?>
                        <a class="btn btn-xs btn-success" href="">reset password</a>
                          <?php if ($data->stat): ?>
                            <a class="btn btn-xs btn-danger" href="<?php echo site_url('admin/deactivate/'.$data->id_user) ?>">deactivate</a>
                          <?php else: ?>
                            <a class="btn btn-xs btn-success" href="<?php echo site_url('admin/activate/'.$data->id_user) ?>">activate</a>
                          <?php endif ?>
                        <?php endif ?>
                        </td>
                    </tr>
                  <?php endforeach ?>
                  </tbody>
                  </table>

			<h3>Karyawan</h3>
				<table class="table table-striped" id="datatable">
                    <thead>
                    <tr>
                      <th>ID</th>
                      <th>Email</th>
                      <th>Registered</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($karyawan as $data): ?>
                      <tr>
                        <td><?php echo $data->id_user ?></td>
                        <td><?php echo $data->email ?></td>
                        <td><?php echo $data->registered_at ?></td>
                        <td><?php echo $data->stat ?></td>
                        <td>
                        <?php if (issuperadmin()): ?> 
                          <?php if ($data->stat): ?>
                          <a class="btn btn-xs btn-danger" href="<?php echo site_url('admin/deactivate/'.$data->id_user) ?>">deactivate</a>
                        <?php else: ?>
                          <a class="btn btn-xs btn-success" href="<?php echo site_url('admin/activate/'.$data->id_user) ?>">activate</a>
                        <?php endif ?>
                        <?php endif ?>
                          </td>
                      </tr>
                    <?php endforeach ?>
                  </tbody>
                  </table>

</div>
</div>
</section>
</div>

<script type="text/javascript">
  $('table').DataTable();
</script>