<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Table Data User</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <button type="button" class="btn btn-primary buttonTambahuser" data-toggle="modal" data-target="#modaluser">Tambah User</button>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>USERNAME</th>
                            <th>NAMA</th>
                            <th>EMAIL</th>
                            <th>NO HP</th>
                            <th>PASSWORD</th>
                            <th>LEVEL</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT * FROM user";
                        $result = mysqli_query($connection, $query);

                        if (!$result) {
                            die("gak bisa");
                        }
                        $no = 0;
                        while ($row = mysqli_fetch_array($result)) {
                            $no++;
                        ?>
                            <tr>
                                <td><?php echo $no ?></td>
                                <td><?php echo $row['kode']; ?></td>
                                <td><?php echo $row['nama']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['hp']; ?></td>
                                <td><?php echo $row['password']; ?></td>
                                <?php
                                if ($row['level'] == 2) {
                                ?>
                                    <td>Admin</td>
                                <?php
                                } else {
                                ?>
                                    <td>Operator</td>
                                <?php
                                }
                                ?>
                                <td>
                                    <a href="" class="badge badge-warning float-right ml-1 tomboleditakun" data-toggle="modal" data-target="#modaluser" data-id="<?php echo $row['id']; ?>">Edit</a>
                                    <a href="../system/edit_akun.php?m=<?php echo $row['id']; ?>" class="badge badge-danger float-right ml-1" onclick="return confirm('Apakah anda Akan menghapus user <?php echo $row['nama']; ?>')">Delete</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<!-- Modal -->
<div class="modal fade" id="modaluser" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judulModal">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="../system/akun.php" method="post">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="nim">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Password</label>
                        <input type="text" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="jurusan">Level</label>
                        <select class="form-control" id="level" name="level" required>
                            <option>Operator</option>
                            <option>Admin</option>
                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="tambah" class="btn btn-primary buttonFormModal">Understood</button>
                </form>
            </div>
        </div>
    </div>
</div>




<!-- Bootstrap core JavaScript-->
<script src="assets/vendor/jquery/jquery.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="assets/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="assets/js/demo/datatables-demo.js"></script>
<script src="assets/js/demo/script.js"></script>