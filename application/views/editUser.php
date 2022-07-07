<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
  </div>

  <form action="<?= base_url('Welcome/doEditUser'); ?>" method="POST">
    <input type="hidden" name="id_user" value="<?= $userList->id_user; ?>">
    <!-- DataTales -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
      </div>
      <div class="card-body">
        <label for="username">Username</label>
        <div class="input-group mb-3">
          <input type="text" name="username" id="username" class="form-control" aria-describedby="basic-addon3" value="<?= $userList->username; ?>">
        </div>
        <label for="password">Ubah Password</label>
        <div class="input-group mb-3">
          <input type="password" name="password" id="password" class="form-control" aria-describedby="basic-addon3">
        </div>
        <input type="submit" value="Submit" class="btn btn-primary">
      </div>
    </div>
  </form>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->