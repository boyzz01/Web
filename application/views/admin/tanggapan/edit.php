<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Tambah Data</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    <div class="box-body">

                        <div class="form-group <?= !empty(form_error('tanggapan')) ? 'has-error':null ?>">
                            <label class="label-control col-sm-2">Tanggapan</label>
                            <div class="col-sm-6">
                            <textarea name="tanggapan" class="form-control" row="5"><?= !empty($tanggapan->tanggapan)?$tanggapan->tanggapan:null ?></textarea>
                            <span class="help-block"><?= form_error('tanggapan') ?></span>
                            </div>
                        </div>    

                    </div>

                    <div class="box-footer">
                        <div class="col-sm-2"></div>
                        <button type="submit" class="btn btn-primary">SIMPAN</button>
                        <a href="<?= base_url() ?>pengaduan" class="btn btn-default">BATAL</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</section>