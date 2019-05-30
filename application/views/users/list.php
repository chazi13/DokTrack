<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex">
                <h3 class="card-title">User <?= $level ?></h3>
                <div class="pull-right ml-auto">
                    <a href="<?= base_url('user/add/' . $this->uri->segment(3)) ?>" class="btn btn-primary">Tambah</a>
                </div>
            </div>
            <div class="card-block">
                <table class="table table-bordered table-striped">
                    <thead>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $i => $user): ?>
                            <tr>
                                <td><?= ($i+1) ?></td>
                                <td><?= $user->nama ?></td>
                                <td><?= $user->username ?></td>
                                <td>
                                    <a href="<?= base_url('user/edit/?uid=' . $this->enc->encode($user->user_id)) ?>" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Edit">
                                        <i class="mdi mdi-pencil"></i>
                                    </a>
                                    <a href="<?= base_url('user/destroy/?uid=' . $this->enc->encode($user->user_id)) ?>" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Hapus" onclick="return confirm('Yakin Hapus User?')">
                                        <i class="mdi mdi-delete"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>