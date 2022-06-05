<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mata Kuliah</title>
    <script>
        function hapusMatakuliah(pesan){
            if(confirm(pesan)) {
                return true;
            }else{
                return false;
            }
        }
    </script>
</head>
<body>
        <div class="col-md-12">
        <h3>Daftar Mata Kuliah</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>SKS</th>
                    <th>Kode</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $nomor=1;
                foreach($matakuliah as $mt){
            ?>
                <tr>
                    <td><?php echo $nomor ?></td>
                    <td><?php echo $mt->nama ?></td>
                    <td><?php echo $mt->sks ?></td>
                    <td><?php echo $mt->kode ?></td>
                    <td>
                    <a href= <?php echo base_url("index.php/matakuliah/edit/$mt->id") ?>
                        class="btn btn-success btn-lg active" role="button" aria-pressed="true">Edit</a>
                        &nbsp;
                        <a href= <?php echo base_url("index.php/matakuliah/delete/$mt->id") ?>
                        class="btn btn-danger btn-lg active" onclick="return hapusMatakuliah('Anda yakin ingin menghapus mata kuliah <?php echo $mt->nama ?> ')">Hapus</a>
                    </td>
                </tr>
            <?php
            $nomor++;
            }
            ?>
            </tbody>
        </table>
        <a href=<?php echo base_url("index.php/matakuliah/form") ?> class="btn btn-primary btn-lg active">Tambah</a>
        </div>
</body>
</html>
