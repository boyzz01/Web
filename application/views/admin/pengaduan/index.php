<section class="content">
    <?= $this->session->flashdata('msg');?> 
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
           
            </div>
            
            <div class="box-body table-responsive">
            <table id="datatable" class="table table-bordered table-striped ">
                <thead>
                    <tr>
                        <th width="1">No</th>
                        <th>Nama</th>
                        <th>Subject</th>
                        <th>Tanggal</th>
                        <th>SKPD</th>
                        <th>Publish</th>
                        <th>Status</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>

                    <?php if(!empty($pengaduan)){ ?>
                        <?php $no = 0; ?>
                        <?php foreach($pengaduan as $data){ ?>
                            <?php ++$no ?>
                            <tr>
                                <td><?= $no; ?></td>
                                
                                <td><?= !empty($data->nama) ? $data->nama: "-"; ?></td>
                                <td><?= !empty($data->subject) ? $data->subject: "-"; ?></td>
                                <td><?= !empty($data->tgl) ? $data->tgl: "-"; ?></td>
                                <td><?= !empty($data->skpd) ? $data->skpd: "-"; ?></td>
                                <td><?= isset($data->publish) ? format_publish($data->publish): "-"; ?></td>
                                <td><?= !empty($data->status) ? format_status($data->status): "-"; ?></td>
                                <td>
                                    <a href="<?= base_url() ?>pengaduan/edit/<?= $data->id_pengaduan ?>" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                                    <a href="<?= base_url() ?>pengaduan/detail/<?= $data->id_pengaduan ?>" class="btn btn-info"><i class="fa fa-info"></i></a>
                                    <a href="<?= base_url() ?>pengaduan/hapus/<?= $data->id_pengaduan ?>" class="delete-link btn btn-danger"><i class="fa fa-trash"></i></a>
                                
                                </td>
                            </tr>
                        <?php } ?>      
                    <?php } else { ?>

                    <?php } ?>
                </tbody>
                
              </table>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
 
      </div>
      <!-- /.box -->

    </section>