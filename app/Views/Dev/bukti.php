<div class="container mt-5">
    <h3 class="mb-4">Daftar Transaksi</h3>
    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Meja</th>
                    <th>Tempat</th>
                    <th>Bukti</th>
                    <th>Total Harga</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($bukti as $row): ?>
                    <tr>
                        <td><?= esc($row['id']) ?></td>
                        <td><?= esc($row['nama']) ?></td>
                        <td><?= esc($row['email']) ?></td>
                        <td><?= esc($row['meja']) ?></td>
                        <td><?= esc($row['tempat']) ?></td>
                        <td>
                            <?php if ($row['bukti']): ?>
                                <img src="/upload/bukti/<?= $row['bukti']; ?>" alt="Bukti" class="img-thumbnail"
                                    style="max-width: 80px; max-height: 80px;">
                            <?php else: ?>
                                <span class="text-muted">-</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            error
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>