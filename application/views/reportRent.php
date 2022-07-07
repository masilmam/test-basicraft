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
              <th>Tgl Pinjam</th>
              <th>Tgl Kembali</th>
              <th>Tgl Kembali (Aktual)</th>
              <th>Status</th>
              <th>Member Name</th>
              <th>Denda</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($bookRentList as $b) {
              $late = 0;
              if ($b->date_in_actual != NULL) {
                $actual = date_create($b->date_in_actual);
                $in = date_create($b->date_in);

                $late = date_diff($actual, $in);
              }
            ?>
              <tr>
                <td><?= $b->title; ?></td>
                <td><?= $b->author; ?></td>
                <td><?= $b->isbn; ?></td>
                <td><?= $b->published; ?></td>
                <td><?= $b->date_out; ?></td>
                <td><?= $b->date_in; ?></td>
                <td><?= $b->date_in_actual; ?></td>
                <td><?= ($b->date_in_actual == NULL) ? 'Masih Dipinjam' : 'Sudah Dikembalikan'; ?></td>
                <td><?= $b->fullname; ?></td>
                <td><?= 'Rp' . $late->format('%d') * 2000; ?></td>
                <?php if ($b->date_out == NULL) { ?>
                  <td><a href="<?= base_url('Welcome/editRent/') . $b->id_books_out; ?>">Peminjaman Buku</a></td>
                <?php } else { ?>
                  <td><a href="<?= base_url('Welcome/returnRent/') . $b->id_books_out; ?>">Pengembalian Buku</a></td>
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