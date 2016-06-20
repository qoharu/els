<?php include 'application/views/header.php' ?>
<?php include 'application/views/sidebar.php' ?>

<div class="content-wrapper">
<section class="content col-md-12">
<div class="box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">journal</h3>
                </div><!-- /.box-header -->
                <div class="box-body">

                <?php if (issuperadmin()): ?>
                  
                <h3>Pending</h3>
                <table class="table table-striped table-bordered">
                    <thead>
                      
                    <tr>
                      <th>ID</th>
                      <th>Fullname</th>
                      <th>Title</th>
                      <th>File</th>
                      <th>View</th>
                      <th>Created</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                  <?php foreach ($pending_journal as $data): ?>
                    <?php if ($admin_scope == $data->id_scope || $this->session->userdata('username') == 'superadmin'): ?>
                      
                    <?php
                      if (empty($data->fullname)) {
                        $data->fullname = explode('@', $data->email)[0];
                      }
                    ?>
                    <tr>
                      <td><?php echo $data->id_journal ?></td>
                      <td><?php echo $data->fullname ?></td>
                      <td><?php echo $data->title ?></td>
                      <td><a class="btn btn-xs btn-primary" target="_blank" href="<?php echo base_url('uploads/'.$data->file) ?>">Download / View</a></td>
                      <td><?php echo $data->views ?></td>
                      <td><?php echo $data->created_at ?></td>
                      <td>
                        <a class="btn btn-xs btn-success " href="<?php echo site_url('admin/approve_journal/'.$data->id_journal) ?>"> Approve</a>
                        <a class="btn btn-xs btn-danger" href="<?php echo site_url('admin/decline_journal/'.$data->id_journal) ?>"> Decline</a>
                      </td>
                    </tr>
                    <?php endif ?>
                  <?php endforeach ?>
                  </tbody>
                  </table>
                <?php endif ?>

                  <h3>Published Journal</h3>
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                      <th>ID</th>
                      <th>Fullname</th>
                      <th>Title</th>
                      <th>File</th>
                      <th>View</th>
                      <th>Status</th>
                      <th>Created</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                  <?php foreach ($journal as $data): ?>
                    <?php
                      if (empty($data->fullname)) {
                        $data->fullname = explode('@', $data->email)[0];
                      }
                    ?>
                    <tr>
                      <td><?php echo $data->id_journal ?></td>
                      <td><?php echo $data->fullname ?></td>
                      <td><?php echo $data->title ?></td>
                      <td><a class="btn btn-xs btn-primary" target="_blank" href="<?php echo base_url('uploads/'.$data->file) ?>">Download / View</a></td>
                      <td><?php echo $data->views ?></td>
                      <td><?php echo $data->status ?></td>
                      <td><?php echo $data->created_at ?></td>
                      <td></td>
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