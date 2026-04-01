<?php
require_once 'TransferBank.php';
require_once 'Ewallet.php';
require_once 'QRIS.php';
require_once 'COD.php';
require_once 'VirtualAccount.php';

$hasil = "";

if (isset($_POST['submit'])) {
    $jumlah = $_POST['jumlah'];
    $metode = $_POST['metode'];

    switch ($metode) {
        case "transfer":
            $bayar = new TransferBank($jumlah);
            break;
        case "ewallet":
            $bayar = new Ewallet($jumlah);
            break;
        case "qris":
            $bayar = new QRIS($jumlah);
            break;
        case "cod":
            $bayar = new COD($jumlah);
            break;
        case "va":
            $bayar = new VirtualAccount($jumlah);
            break;
    }

    $hasil = $bayar->prosesPembayaran() . "<br>" . $bayar->cetakStruk();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pembayaran</title>
</head>
<body>

<h2>Form Pembayaran</h2>

<form method="POST">
    Jumlah: <br>
    <input type="number" name="jumlah" required><br><br>

    Metode: <br>
    <select name="metode">
        <option value="transfer">Transfer Bank</option>
        <option value="ewallet">E-Wallet</option>
        <option value="qris">QRIS</option>
        <option value="cod">COD</option>
        <option value="va">Virtual Account</option>
    </select><br><br>

    <button type="submit" name="submit">Bayar</button>
</form>

<hr>

<h3>Hasil:</h3>
<?php echo $hasil; ?>

</body>
</html>