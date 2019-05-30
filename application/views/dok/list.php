<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex">
                <h3 class="card-title"><?= $page_title ?></h3>
                <?php if (is_level('Front Desk')): ?>
                    <div class="pull-right ml-auto">
                        <a href="<?= base_url('dok/add/') ?>" class="btn btn-primary">Tambah</a>
                    </div>
                <?php endif; ?>
            </div>
            <div class="card-block">
                <table class="table table-bordered table-striped">
                    <thead>
                        <th>No</th>
                        <th>No Agenda</th>
                        <th>Perihal</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        <?php foreach ($docs as $i => $doc): ?>
                            <tr>
                                <td><?= ($i+1) ?></td>
                                <td><?= $doc->no_agenda ?></td>
                                <td><?= $doc->perihal ?></td>
                                <td>
                                    <?php if ($doc->status == '1'): ?>
                                        <span class="badge badge-warning"><?= $doc->keterangan ?></span>
                                    <?php elseif ($doc->status == '2'): ?>
                                        <span class="badge badge-info"><?= $doc->keterangan ?></span>
                                    <?php elseif ($doc->status == '3'): ?>
                                        <span class="badge badge-primary"><?= $doc->keterangan ?></span>
                                    <?php elseif ($doc->status == '4'): ?>
                                        <span class="badge badge-success"><?= $doc->keterangan ?></span>
                                    <?php elseif ($doc->status == '5'): ?>
                                        <span class="badge badge-danger"><?= $doc->keterangan ?></span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if (is_level('Admin') OR is_level('Front Desk')): ?>
                                        <button type="button" class="btn btn-info detail" data-toggle="modal" data-target="#detail" data-doc="<?= $this->enc->encode($doc->no_agenda) ?>">
                                            <i class="ti-search" data-toggle="tooltip" data-placement="top" title="Detail"></i>
                                        </button>
                                    <?php elseif (is_level('P2') OR is_level('PKC')): ?>
                                        <button type="button" class="btn btn-info <?= is_level('P2') ? 'processing' : 'accept' ?>" data-toggle="modal" data-target="#processing" data-url="<?= is_level('P2') ? 'processing' : 'accept' ?>" data-doc="<?= $this->enc->encode($doc->no_agenda) ?>" data-docid="<?= $this->enc->encode($doc->doc_id) ?>">
                                            <i class="mdi mdi-check" data-toggle="tooltip" data-placement="top" title="Proses"></i>
                                        </button>
                                        <button type="button" class="btn btn-danger abort" data-toggle="modal" data-target="#processing" data-url="abort" data-doc="<?= $this->enc->encode($doc->no_agenda) ?>" data-docid="<?= $this->enc->encode($doc->doc_id) ?>">
                                            <i class="mdi mdi-window-close" data-toggle="tooltip" data-placement="top" title="Tolak"></i>
                                        </button>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php if (is_level('Admin') OR is_level('Front Desk')): ?>
    <div class="modal fade" id="detail" tabindex="-1" role="dialog" aria-labelledby="detailTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailTitle">Detail Dokumen</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="detail-dok"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php elseif (is_level('P2') OR is_level('PKC')): ?>
    <div class="modal fade" id="processing" tabindex="-1" role="dialog" aria-labelledby="processingTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form id="formProcess" action="<?= base_url('dok/') ?>" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="processTitle">Proses Dokumen</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id="detail-dok"></div>
                        <div class="form-group"><label for="note">Catatan :</label><textarea name="note" id="note" rows="5" class="form-control" placeholder="Masukan catatan"></textarea></div>
                        <input type="hidden" name="doc_id" id="doc_id">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php endif; ?>
