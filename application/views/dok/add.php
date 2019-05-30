<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex">
                <h3 class="card-title">Tambah Dokumen</h3>
            </div>
            <div class="card-block">
                <form action="<?= base_url('dok/store') ?>" method="post">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-2 col-md-4 col-sm-12">
                                <label for="no_agenda">No Agenda</label>
                            </div>
                            <div class="col-lg-10 col-md-8 col-sm-12">
                                <input type="text" name="no_agenda" id="no_agenda" class="form-control" placeholder="Masukan No Agenda Dokumen" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-2 col-md-4 col-sm-12">
                                <label for="no_surat">No Surat</label>
                            </div>
                            <div class="col-lg-10 col-md-8 col-sm-12">
                                <input type="text" name="no_surat" id="no_surat" class="form-control" placeholder="Masukan No Surat" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-2 col-md-4 col-sm-12">
                                <label for="perihal">Perihal</label>
                            </div>
                            <div class="col-lg-10 col-md-8 col-sm-12">
                                <input type="text" name="perihal" id="perihal" class="form-control" placeholder="Masukan Perihal" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-2 col-md-4 col-sm-12">
                                <label for="perusahaan">Perusahaan</label>
                            </div>
                            <div class="col-lg-10 col-md-8 col-sm-12">
                                <input type="text" name="perusahaan" id="perusahaan" class="form-control" placeholder="Masukan Perusahaan" required>
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