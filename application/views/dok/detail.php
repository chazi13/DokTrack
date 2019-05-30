<?php if($doc && $trace): ?>
    <table class="table table-bordered table-striped">
        <tr>
            <td>No. Agenda</td>
            <td>:</td>
            <td><?= $doc->no_agenda ?></td>
        </tr>
        <tr>
            <td>No. Surat</td>
            <td>:</td>
            <td><?= $doc->no_surat ?></td>
        </tr>
        <tr>
            <td>Perihal</td>
            <td>:</td>
            <td><?= $doc->perihal ?></td>
        </tr>
        <tr>
            <td>Perusahaan</td>
            <td>:</td>
            <td><?= $doc->perusahaan ?></td>
        </tr>
        <tr>
            <td>Status</td>
            <td>:</td>
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
        </tr>
        <?php if ($doc->note !== ''): ?>
            <tr>
                <td>Catatan</td>
                <td>:</td>
                <td>
                    <div class="alert alert-info" role="alert">
                        <?= $doc->note ?>
                    </div>
                </td>
            </tr>
        <?php endif; ?>
    </table>

    <?php if (!is_level('P2') AND !is_level('PKC')): ?>
        <ul>
            <?php foreach ($trace as $t): ?>
                <li>
                    <div class="card border-primary rounded">
                        <div class="card-block p-1">
                            <h6><?= date('d-F-Y H:i:s', strtotime($t->time)) ?></h6>
                            <p><?= $t->keterangan ?></p>
                            <?php if ($t->note): ?>
                                <div class="alert alert-info" role="alert">
                                    <?= $t->note ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <hr>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
<?php else: ?>
<h3>Tidak Ada data</h3>
<?php endif; ?>