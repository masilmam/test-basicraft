<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
  </div>

  <!-- DataTales -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Title</th>
              <th>Author</th>
              <th>ISBN</th>
              <th>Member Name</th>
              <th colspan="2">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($bookRentList as $b) {
            ?>
              <tr>
                <td><?= $b->title; ?></td>
                <td><?= $b->author; ?></td>
                <td><?= $b->isbn; ?></td>
                <td><?= $b->fullname; ?></td>
                <td><a href="<?= base_url('Welcome/editRent/' . $b->id_books_out); ?>" class="btn btn-primary"> Peminjaman</a></td>
                <td><a href="<?= base_url('Welcome/returnRent/' . $b->id_books_out); ?>" class="btn btn-primary"> Pengembalian</a></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->