<?php include 'application/views/header.php' ?>
<?php include 'application/views/sidebar.php' ?>

<div class="content-wrapper">
<section class="content col-md-12">
<div class="box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Users</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                <a class="btn btn-primary pull-right" href="<?php echo site_url('admin/register') ?>">Register</a>

                <h3>Pending edit</h3>
				<table class="table table-striped table-bordered">
                    <tbody>
                    <tr>
                      <th>ID</th>
                      <th>Full Name</th>
                      <th>Email</th>
                      <th>Action</th>
                    </tr>
                    <tr>
                      <td>1</td>
                      <td>Dummy user blablabla</td>
                      <td>user.dummy@gmail.com</td>
                      <td>
                      	<a class="btn btn-xs btn-primary" href="">view</a>
                      	<a class="btn btn-xs btn-success" href="">approve</a>
                      	<a class="btn btn-xs btn-danger" href="">decline</a></td>
                    </tr>
                  </tbody>
                  </table>

			<h3>Business Expert</h3>
				<table class="table table-striped">
                    <tbody><tr>
                      <th>ID</th>
                      <th>NIK</th>
                      <th>Fullname</th>
                      <th>Email</th>
                      <th>Registered</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
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
                        <a class="btn btn-xs btn-success" href="">edit</a>
                        <?php if ($data->stat): ?>
                          <a class="btn btn-xs btn-danger" href="<?php echo site_url('admin/deactivate/'.$data->id_user) ?>">deactivate</a>
                        <?php else: ?>
                          <a class="btn btn-xs btn-success" href="<?php echo site_url('admin/activate/'.$data->id_user) ?>">activate</a>
                        <?php endif ?>
                        </td>
                    </tr>
                  <?php endforeach ?>
                  </tbody>
                  </table>

			<h3>Karyawan</h3>
				<table class="table table-striped">
                    <tbody><tr>
                      <th>ID</th>
                      <th>Email</th>
                      <th>Registered</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                    <?php foreach ($karyawan as $data): ?>
                      <tr>
                        <td><?php echo $data->id_user ?></td>
                        <td><?php echo $data->email ?></td>
                        <td><?php echo $data->registered_at ?></td>
                        <td><?php echo $data->stat ?></td>
                        <td>
                          <?php if ($data->stat): ?>
                          <a class="btn btn-xs btn-danger" href="<?php echo site_url('admin/deactivate/'.$data->id_user) ?>">deactivate</a>
                        <?php else: ?>
                          <a class="btn btn-xs btn-success" href="<?php echo site_url('admin/activate/'.$data->id_user) ?>">activate</a>
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