<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-5">
            <h1>Daftar Orang</h1>
            <form action="" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Masukan Keyword Pencarian.." name="keyword">
                    <button class="btn btn-outline-secondary" type="submit" name="submit">Search</button>
                </div>
        </div>
        </form>
    </div>
    <div class="row">
        <div class="col">
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 + (10 * ($currentPage - 1)); ?>
                    <?php foreach ($orang as $o) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $o['nama']; ?></td>
                            <td><?= $o['alamat']; ?></td>
                            <td>
                                <a href="" class="btn btn-success">Details</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
            <?= $pager->links('orang', 'orang_pagination') ?>

        </div>
    </div>
</div>

<?= $this->endSection(); ?>