<section class="content">
<?= $this->session->flashdata('msg');?> 
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
                        <div class="col-lg-2 col-md-2">
                            <ul class="slideshow_thumbs desoslide-thumbs-vertical list-inline text-center">
                                <li>
                                    <?php if (!empty($pengaduan->image_aduan)) { ?>
                                    <a href="<?= base_url() ?>assets/img/<?= !empty($pengaduan->image_aduan) ? 'pengaduan/' . $pengaduan->image_aduan : 'no_image.png'  ?>">
                                        <img width="100%" src="<?= base_url() ?>assets/img/<?= !empty($pengaduan->image_aduan) ? 'pengaduan/' . $pengaduan->image_aduan : 'no_image.png'  ?>" alt="<?= $pengaduan->nama ?>" data-desoslide-caption-title="<?= $pengaduan->nama ?>">
                                    </a>
                                    <?php } ?>
                                    <?php if (!empty($pengaduan->image_aduan2)) { ?>
                                        <a href="<?= base_url() ?>assets/img/<?= !empty($pengaduan->image_aduan2) ? 'pengaduan/' . $pengaduan->image_aduan2 : 'no_image.png'  ?>">
                                            <img width="100%" src="<?= base_url() ?>assets/img/<?= !empty($pengaduan->image_aduan2) ? 'pengaduan/' . $pengaduan->image_aduan2 : 'no_image.png'  ?>" alt="<?= $pengaduan->nama ?>" data-desoslide-caption-title="<?= $pengaduan->nama ?>">
                                        </a>
                                    <?php } ?>
                                    <?php if (!empty($pengaduan->image_aduan3)) { ?>
                                        <a href="<?= base_url() ?>assets/img/<?= !empty($pengaduan->image_aduan3) ? 'pengaduan/' . $pengaduan->image_aduan3 : 'no_image.png'  ?>">
                                            <img width="100%" src="<?= base_url() ?>assets/img/<?= !empty($pengaduan->image_aduan3) ? 'pengaduan/' . $pengaduan->image_aduan3 : 'no_image.png'  ?>" alt="<?= $pengaduan->nama ?>" data-desoslide-caption-title="<?= $pengaduan->nama ?>">
                                        </a>
                                    <?php } ?>
                                </li>
                            </ul>
                        </div>
                        <div id="slideshow" class="col-lg-8 col-md-8"></div>

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
                            <p><?= !empty($pengaduan->tanggal) ? $pengaduan->tanggal : '-' ?></p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Tanggapan</h3>
                    <div class="box-tools pull-right">
                        <a href="<?= base_url() ?>tanggapan/tambah/<?= $this->uri->segment(3) ?>" class="btn btn-primary">
                            Tambah Tanggapan
                        </a>
                    </div>
                </div>

                <!-- /.box-header -->

                <div class="detail box-body">
                    <table id="datatable" class="table table-bordered table-striped ">
                        <thead>
                            <tr>
                                <th width="1">No</th>
                                <th>Tanggal</th>
                                <th>Tanggapan</th>
                                <th>User</th>

                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php if (!empty($tanggapan)) { ?>
                                <?php $no = 0; ?>
                                <?php foreach ($tanggapan as $data) { ?>
                                    <?php ++$no ?>
                                    <tr>
                                        <td><?= $no; ?></td>
                                        <td><?= !empty($data->tgl) ? $data->tgl : "-"; ?></td>
                                        <td><?= !empty($data->tanggapan) ? $data->tanggapan : "-"; ?></td>
                                        <td><?= !empty($data->nama_user) ? $data->nama_user : "-"; ?></td>


                                        <td>
                                            <a href="<?= base_url() ?>tanggapan/edit/<?= $data->id_tanggapan ?>" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                                            <a href="<?= base_url() ?>tanggapan/hapus/<?= $data->id_tanggapan ?>" class="delete-link btn btn-danger"><i class="fa fa-trash"></i></a>

                                        </td>
                                    </tr>
                                <?php } ?>
                            <?php } else { ?>

                            <?php } ?>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</section>