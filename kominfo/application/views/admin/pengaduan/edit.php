<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit Data</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    <div class="box-body">

                        <div class="form-group">
                            <label class="label-control col-sm-2">Publish</label>
                            <div class="col-sm-6">
                            <select name="publish" class="form-control">
                                <option <?= isset($pengaduan->publish) && $pengaduan->publish == "1"? 'selected':null ?> value="1">public</option>
                                <option <?= isset($pengaduan->publish) && $pengaduan->publish == "0"? 'selected':null ?> value="0">private</option>
                            </select>
                            </div>
                        </div>    

                        <div class="form-group">
                            <label class="label-control col-sm-2">Status</label>
                            <div class="col-sm-6">
                            <select name="status" class="form-control">
                                <option <?= !empty($pengaduan->status) && $pengaduan->status == '1'? 'selected':null ?> value="1">Proses</option>
                                <option <?= !empty($pengaduan->status) && $pengaduan->status == '2'? 'selected':null ?> value="2">Belum Ditanggapi</option>
                                <option <?= !empty($pengaduan->status) && $pengaduan->status == '3'? 'selected':null ?> value="3">Sudah Ditangani</option>
                            </select>
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