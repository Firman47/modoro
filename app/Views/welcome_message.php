<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome to CodeIgniter 4!</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style type="text/css">
        body{
            background: rgba(0, 0, 0, .8);
            font-family: sans-serif;
            color: white;
        }
        a{
            text-decoration: none;
            color: blue;
        }
        a.hapus{
            color: red;
        }
        form{
            display: flex;
            flex-direction: column;
            gap: 20px;
        }
        form div{
            display: flex;
            flex-direction: column;
            width: 300px;
        }
        table{
            border-spacing: 0;
            border-collapse: collapse;
        }
         table , th, td{
          border: 1px solid white;
          padding: 10px;
        }
        th{
            background: red;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container" style=" display: flex; gap: 20px;">
        <table >
            <tr>
                <th>no</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Action</th>
            </tr>
            <?php $i = 1; ?>
             <?php foreach($produk as $p) : ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $p['NamaProduk']; ?></td>
                    <td><?= $p['Harga']; ?></td>
                    <td><?= $p['Stok']; ?></td>
                    <td>
                        <a href="/edit/<?= $p['ProdukID']; ?>">EEDIT |</a>
                        <a href="" class="hapus">| HAPUS</a>
                    </td>
                </tr>
            <?php endforeach; ?>

        </table>
        <div class="form">
            <form action="/produk/<?= !empty($editP) ? $editP['ProdukID'] : ''; ?>" method="post">
                <?= csrf_field(); ?>
                 <div >
                    <label>Nama produk</label>
                    <input type="text" name="nama" value="<?= !empty($editP) ? $editP['NamaProduk'] : ''; ?>">
                </div>
                <div>
                    <label>Harga produk</label>
                    <input type="text" name="harga" value="<?= !empty($editP) ? $editP['Harga'] : ''; ?>">
                </div>
                <div>
                    <label>Stok produk</label>
                    <input type="text" name="stok" value="<?= !empty($editP) ? $editP['Stok'] : ''; ?>">
                </div>
                <button type="submit" name="submit">Tambah</button>
            </form>
        </div>
       
    </div>
</body>
</html>
