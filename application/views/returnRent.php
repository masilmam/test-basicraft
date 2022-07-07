<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
  </div>

  <form action="<?= base_url('Welcome/doEditRent'); ?>" method="POST">
    <input type="hidden" name="id_books_out" value="<?= $bookRent->id_books_out; ?>">
    <!-- DataTales -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
      </div>
      <div class="card-body">
        <label for="title">Judul Buku</label>
        <div class="input-group mb-3">
          <input type="text" name="title" id="title" class="form-control" aria-describedby="basic-addon3" value="<?= $bookRent->title; ?>" readonly>
        </div>
        <label for="author">Pengarang</label>
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="author" id="author" aria-describedby="basic-addon3" value="<?= $bookRent->author; ?>" readonly>
        </div>
        <label for="isbn">ISBN</label>
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="isbn" id="isbn" aria-describedby="basic-addon3" value="<?= $bookRent->isbn; ?>" readonly>
        </div>
        <label for="published">Tahun Publikasi</label>
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="published" id="published" aria-describedby="basic-addon3" value="<?= $bookRent->published; ?>" readonly>
        </div>
        <label for="id_member">Nama Peminjam</label>
        <div class="input-group mb-3">
          <select name="id_member" id="id_member" class="form-control custom-selcet" readonly>
            <?php foreach ($memberList as $m) { ?>
              <option value="<?= $m->id_member; ?>"><?= $m->fullname; ?></option>
            <?php } ?>
          </select>
        </div>
        <label for="date_out">Tanggal Pinjam</label>
        <div class="input-group mb-3">
          <input type="date" class="form-control" name="date_out" id="date_out" aria-describedby="basic-addon3" value="<?= $bookRent->date_out; ?>" readonly>
        </div>
        <label for="date_in_actual">Tanggal Kembali Aktual</label>
        <div class="input-group mb-3">
          <input type="date" class="form-control" name="date_in_actual" id="date_in_actual" aria-describedby="basic-addon3" value="<?= $bookRent->date_in_actual; ?>">
        </div>
        <input type="submit" value="Submit" class="btn btn-primary">
      </div>
    </div>
  </form>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->