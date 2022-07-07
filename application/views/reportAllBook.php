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
              <th>Published</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($bookList as $b) {
              $qstatus = $this->M_depan->read_book_joinMember_condition(['bo.id_book' => $b->id_book]);
              if ($qstatus->num_rows() > 0) {
                $status = 'Masih Dipinjam';
              } else {
                $status = 'Tidak Dipinjam';
              }
            ?>
              <tr>
                <td><?= $b->title; ?></td>
                <td><?= $b->author; ?></td>
                <td><?= $b->isbn; ?></td>
                <td><?= $b->published; ?></td>
                <td><?= $status; ?></td>
                <?php if ($status == 'Masih Dipinjam') { ?>
                  <td><a href="<?= base_url('Welcome/returnRent/') . $b->id_book; ?>">Pengembalian Buku</a></td>
                <?php } else { ?>
                  <td><a href="<?= base_url('Welcome/editRent/') . $b->id_book; ?>">Peminjaman Buku</a></td>
                <?php } ?>
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