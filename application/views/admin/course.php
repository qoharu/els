<?php include 'application/views/header.php' ?>
<?php include 'application/views/sidebar.php' ?>

<div class="content-wrapper">
<section class="content col-md-12">
<div class="box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Course</h3>
                </div><!-- /.box-header -->
                <div class="box-body">

                <h3>Course</h3>
                <table class="table table-striped table-bordered">
                    <tbody><tr>
                      <th>ID</th>
                      <th>Fullname</th>
                      <th>Title</th>
                      <th>Participant</th>
                      <th>Quota</th>
                      <th>Date Time</th>
                      <th>Action</th>
                    </tr>
                  <?php foreach ($course as $data): ?>
                    <tr>
                      <td><?php echo $data->id_course ?></td>
                      <td><?php echo $data->fullname ?></td>
                      <td><?php echo $data->title ?></td>
                      <td><?php echo $data->count ?></td>
                      <td><?php echo $data->quota ?></td>
                      <td><?php echo $data->datetime ?></td>
                      <td></td>
                    </tr>
                  <?php endforeach ?>
                  </tbody>
                  </table>

                </div>
                </div>
                </section>
                </div>
