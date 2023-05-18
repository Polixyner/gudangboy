<?php if ((isset($_POST['idBarang']))) : ?>
    <?php
    include_once 'koneksi.php';
    global $mysqli;
    $idBarang = $_POST['idBarang'];
    $tampil = mysqli_query($mysqli, "SELECT stokBarang FROM tblbarang WHERE idBarang='$idBarang'")->fetch_assoc();;
    $jml = $tampil['stokBarang'];

    ?>
    <option disabled selected value>0</option>
    <?php for ($i = 1; $i <= $jml; $i++) : ?>
        <option value="<?= $i ?>"><?= $i ?></option>
    <?php endfor ?>
<?php else : ?>
    <script>
        window.location.href = "../index.php";
    </script>';
<?php endif; ?>