<?php include 'application/views/header.php' ?>
<?php include 'application/views/sidebar.php' ?>

<div class="content-wrapper">
<section class="content col-md-12">
<div class="box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Discussion</h3>
                </div><!-- /.box-header -->
                <div class="box-body">


                <h3>Discussion</h3>

                <table class="table table-striped table-bordered">
                    <tbody>
                    <tr>
                      <th>ID</th>
                      <th>Full Name</th>
                      <th>Title</th>
                      <th>Status</th>
                      <th>Created</th>
                      <th>Action</th>
                    </tr>
                    <?php foreach ($discussion as $data): ?>
                      <?php 
                      $status = switchstatus($data->status);
                      ?>
                    <tr>
                      <td><?php echo $data->id_discussion ?></td>
                      <td><?php echo $data->fullname ?></td>
                      <td><?php echo $data->title ?></td>
                      <td><span class="badge <?php echo $status['class'] ?>"><?php echo $status['title'] ?></span></td>
                      <td><?php echo $data->created_at ?></td>
                      <td>
                        <a class="btn btn-xs btn-primary" href="<?php echo site_url('discussion/view_discussion/'.$data->id_discussion) ?>">View</a>
                        <a class="btn btn-xs btn-success" href="<?php echo site_url('admin/print') ?>">Print Report</a>
                      </td>
                    </tr>
                    <?php endforeach ?>
                  </tbody>
                  </table>