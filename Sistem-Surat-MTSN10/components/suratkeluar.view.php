<?php
class SuratkeluarView extends View
{
    function index($result)
    {
?>
<div class="container-fluid app-container">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="pmd-card app-index-card">
                <div class="pmd-card-title">
                    <div class="pull-left">
                        <h2 style="margin-top:7px;">SURAT KELUAR</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-success" href="admin.php?component=Suratkeluar&action=add">Entri</a>
                    </div>
                    <div style="clear:both;"></div>
                </div>
                <div class="pmd-card-body" style="padding-top:30px;">
                    <div class="pmd-table-card">
                        <table cellspacing="0" cellpadding="0"
                            class="table table-sm pmd-table table-striped table-hover table-bordered table-selected table-header-sticked"
                            id="table-propeller">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th></th>
                                    <th>Kode Surat</th>
                                    <th>Tanggal Surat</th>
                                    <th>Jenis Surat</th>
                                    <th>Nama Pemohon</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                        $no = 1;
                                        if (count($result) > 0) {
                                            foreach ($result as $data) {
                                        ?>
                                <tr>
                                    <td data-title="No"><?php echo $no; ?></td>
                                    <td data-title="">
                                        <a
                                            href="admin.php?component=Suratkeluar&action=edit&id=<?php echo $data->id; ?>"><i
                                                class="material-icons md-dark pmd-xs">mode_edit</i></a>
                                        <a
                                            href="javascript:hapus(<?php echo $data->id; ?>, '<?php echo addslashes($data->username); ?>')"><i
                                                class="material-icons md-dark pmd-xs">delete_forever</i></a>
                                    </td>
                                    <td data-title="Kode_Surat"><?php echo $data->kode_surat; ?></td>
                                    <td data-title="Tanggal_Keluar"><?php echo $data->tanggal_keluar; ?></td>
                                    <td data-title="Jenis_Surat"><?php echo $data->jenis_surat; ?></td>
                                    <td data-title="Nama_Pemohon"><?php echo $data->nama_pemohon; ?></td>
                                </tr>
                                <?php
                                                $no++;
                                            }
                                        } else {
                                            ?>
                                <tr>
                                    <td colspan="5">Tidak ada</td>
                                </tr>
                                <?php
                                        }
                                        ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
function hapus(id, username) {
    if (confirm("Hapus " + username)) {
        window.open('admin.php?component=Suratkeluar&action=delete&id=' + id, '_self');
    }
}
</script>
<?php
    }

    function entry($result)
    {
    ?>
<div class="container-fluid app-container">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <form action="admin.php?component=Suratkeluar&action=save" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $result->id; ?>">
                <div class="pmd-card app-entry-card">
                    <div class="pmd-card-title">
                        <div class="pull-left">
                            <h2 style="margin-top:7px;">SURAT KELUAR</h2>
                        </div>
                        <div style="clear:both;"></div>
                    </div>
                    <div class="pmd-card-body">
                        <div class="group-fields clearfix row">
                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                <div class="form-group form-group-sm">
                                    <label for="kode_surat" class="control-label">
                                        KODE SURAT
                                    </label>
                                    <input class="form-control" id="kode_surat" name="kode_surat" maxlength="50"
                                        value="<?php echo $result->kode_surat; ?>" required autofocus>
                                    <span class="pmd-textfield-focused"></span>
                                </div>
                            </div>
                        </div>
                        <div class="group-fields clearfix row">
                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                <div class="form-group form-group-sm">
                                    <label for="tanggal_keluar" class="control-label">
                                        TANGGAL SURAT
                                    </label>
                                    <input class="form-control" id="tanggal_keluar" name="tanggal_keluar" maxlength="50"
                                        value="<?php echo $result->tanggal_keluar; ?>" required>
                                    <span class="pmd-textfield-focused"></span>
                                </div>
                            </div>
                        </div>
                        <div class="group-fields clearfix row">
                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                <div class="form-group form-group-sm">
                                    <label for="jenis_surat" class="control-label">
                                        JENIS SURAT
                                    </label>
                                    <select class="form-control" id="jenis_surat" name="jenis_surat">

                                        <?php
                                                $options = array(
                                                    '1' => 'Surat Aktif Selolah',
                                                    '2' => 'Surat Bebas Beasiswa',
                                                    '3' => 'Surat Berkelakuan Baik'
                                                );
                                                foreach ($options as $value => $text) {
                                                ?>
                                        <option value="<?php echo $value; ?>"
                                            <?php echo ($value == $result->jenis_surat) ? 'selected' : ''; ?>>
                                            <?php echo $text; ?></option>
                                        <?php
                                                }
                                                ?>
                                    </select>
                                    <span class="pmd-textfield-focused"></span>
                                </div>
                            </div>
                        </div>
                        <div class="section-inner clearfix row">
                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                <div class="form-group form-group-sm">
                                    <label for="nama_pemohon" class="control-label">
                                        NAMA PEMOHON
                                    </label>
                                    <input class="form-control" id="nama_pemohon" name="nama_pemohon" maxlength="50"
                                        value="<?php echo $result->nama_pemohon; ?>">
                                    <span class="pmd-textfield-focused"></span>
                                </div>
                            </div>
                        </div>
                        <div class="pmd-card-actions">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a class="btn btn-default" href="admin.php?component=Suratkeluar">Batal</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
    }
}
?>