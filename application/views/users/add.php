<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex">
                <h3 class="card-title">Tambah User <?= $level ?></h3>
            </div>
            <div class="card-block">
                <form action="<?= base_url('user/store') ?>" method="post">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-2 col-md-4 col-sm-12">
                                <label for="nama">Nama Lengkap</label>
                            </div>
                            <div class="col-lg-10 col-md-8 col-sm-12">
                                <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukan Nama Lengkap User" required>
                                <input type="hidden" name="level" value="<?= $level ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-2 col-md-4 col-sm-12">
                                <label for="username">Username</label>
                            </div>
                            <div class="col-lg-10 col-md-8 col-sm-12">
                                <input type="text" name="username" id="username" class="form-control" placeholder="Masukan Username" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-2 col-md-4 col-sm-12">
                                <label for="password">Password</label>
                            </div>
                            <div class="col-lg-10 col-md-8 col-sm-12">
                                <input type="password" name="password" id="password" class="form-control" placeholder="***********" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="reset" class="btn btn-info">Kosongkan <i class="fa fa-refresh"></i></button>
                        <button type="submit" class="btn btn-success">Simpan <i class="fa fa-send"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>