<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Detail Data</h3>
                </div>
                <!-- /.box-header -->

                <div class="detail box-body">
                    <div class="col-sm-4">
                        <img width="100%" src="<?= base_url() ?>assets/img/<?= !empty($pengaduan->image_aduan) ? 'pengaduan/' . $pengaduan->image_aduan : 'no_image.png'  ?>">
                    </div>
                    <div class="col-sm-8 row">

                        <label class="col-sm-2">Nama</label>
                        <div class="col-sm-10">
                            <p><?= !empty($pengaduan->nama) ? $pengaduan->nama : '-' ?></p>
                        </div>


                        <label class="col-sm-2">Subject</label>
                        <div class="col-sm-10">
                            <p><?= !empty($pengaduan->subject) ? $pengaduan->subject : '-' ?></p>
                        </div>

                        <label class="col-sm-2">Isi</label>
                        <div class="col-sm-10">
                            <p><?= !empty($pengaduan->isi) ? $pengaduan->isi : '-' ?></p>
                        </div>

                        <label class="col-sm-2">Kategori</label>
                        <div class="col-sm-10">
                            <p><?= !empty($pengaduan->kategori) ? $pengaduan->kategori : '-' ?></p>
                        </div>

                        <label class="col-sm-2">SKPD</label>
                        <div class="col-sm-10">
                            <p><?= !empty($pengaduan->skpd) ? $pengaduan->skpd : '-' ?></p>
                        </div>
                        
                        <label class="col-sm-2">Lat/Lng</label>
                        <div class="col-sm-10">
                            <p><?= !empty($pengaduan->latitude) ? $pengaduan->latitude : '-' ?>/<?= !empty($pengaduan->longitude) ? $pengaduan->longitude : '-' ?></p>
                        </div>

                        <label class="col-sm-2">Lokasi</label>
                        <div class="col-sm-10">
                            <p><?= !empty($pengaduan->lokasi) ? $pengaduan->lokasi : '-' ?></p>
                        </div>

                        <label class="col-sm-2">Publish</label>
                        <div class="col-sm-10">
                            <p><?= !empty($pengaduan->publish) ? format_publish($pengaduan->publish) : '-' ?></p>
                        </div>

                        <label class="col-sm-2">Status</label>
                        <div class="col-sm-10">
                            <p><?= !empty($pengaduan->status) ? format_status($pengaduan->status) : '-' ?></p>
                        </div>

                        <label class="col-sm-2">Tanggal</label>
                        <div class="col-sm-10">
                            <p><?= !empty($pengaduan->tanggal) ? $pengaduan->tanggal: '-' ?></p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>