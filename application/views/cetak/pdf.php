<?php
$pathptpn7 = base_url('./assets/img/brand/ptpn7.png');
$type1 = pathinfo($pathptpn7, PATHINFO_EXTENSION);
$data1 = file_get_contents($pathptpn7);
if (isset($user['photourl'])) {
    $pathprofil = base_url('./assets/img/profil/' . $user['photourl']);
} else {
    $pathprofil = base_url('./assets/img/profil/default.png');
}
$type2 = pathinfo($pathprofil, PATHINFO_EXTENSION);
$data2 = file_get_contents($pathprofil);

$ptpn7 = 'data:image/' . $type1 . ';base64,' . base64_encode($data1);
$profil = 'data:image/' . $type2 . ';base64,' . base64_encode($data2);
// var_dump($form);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak data Karyawan</title>
</head>

<body>
    <table style="border-bottom: 3px solid #bbb; padding-bottom:10px;">
        <td><img src="<?= $ptpn7 ?>" width="100" height="60" /></td>
        <td style="text-align:center;">
            <p style="font-size: 18; margin-top:0px; margin-bottom:0px">PT. Perkebunan Nusantara VII</p>
            <p style="font-size: 14 ;margin-top:0px; margin-bottom:0px">Jalan Teuku Umar No.300 Bandar Lampung - 35141 Provinsi Lampung - Indonesia.</p>
        </td>
    </table>
    <center>
        <p style="font-size: 15; margin-top:30px; margin-bottom:0px">Data Karyawan</p>
        <p style="font-size: 12 ;margin-top:0px; margin-bottom:3px">Pers NO : <?= $karyawan['Pers_No']; ?></p>
        <img src="<?= $profil ?>" width="200" height="200" style="margin-top: 15px;" />
    </center>

    <h3>Data Personal</h3>
    <table style=" width:70%">
        <tr>
            <td>1</td>
            <td>Nama</td>
            <td>:</td>
            <td><?= $karyawan['Personnel_Number']; ?></td>
        </tr>
        <tr>
            <td>2</td>
            <td>Tanggal Lahir</td>
            <td>:</td>
            <td><?= $karyawan['Birth_date']; ?></td>
        </tr>
        <tr>
            <td>3</td>
            <td>Jenis Kelamin</td>
            <td>:</td>
            <td><?= $karyawan['Gender_Key']; ?></td>
        </tr>
        <tr>
            <td>4</td>
            <td>Education</td>
            <td>:</td>
            <td><?= $karyawan['Education']; ?></td>
        </tr>
    </table>
    <h3>Data Pekerjaan</h3>
    <table style=" width:70%">
        <tr>
            <td>1</td>
            <td>Position</td>
            <td>:</td>
            <td><?= $karyawan['Position']; ?></td>
        </tr>
        <tr>
            <td>2</td>
            <td>Organizational_Unit</td>
            <td>:</td>
            <td><?= $karyawan['Organizational_Unit']; ?></td>
        </tr>
        <tr>
            <td>3</td>
            <td>Personnel_Area</td>
            <td>:</td>
            <td><?= $karyawan['Personnel_Area']; ?></td>
        </tr>
        <tr>
            <td>4</td>
            <td>Personnel_Subarea</td>
            <td>:</td>
            <td><?= $karyawan['Personnel_Subarea']; ?></td>
        </tr>
        <tr>
            <td>5</td>
            <td>PS_group</td>
            <td>:</td>
            <td><?= $karyawan['PS_group']; ?></td>
        </tr>
        <tr>
            <td>6</td>
            <td>Lv"</td>
            <td>:</td>
            <td><?= $karyawan['Lv']; ?></td>
        </tr>
        <tr>
            <td>7</td>
            <td>Strata"</td>
            <td>:</td>
            <td><?= $karyawan['Strata']; ?></td>
        </tr>
        <tr>
            <td>8</td>
            <td>Employee_Group</td>
            <td>:</td>
            <td><?= $karyawan['Employee_Group']; ?></td>
        </tr>
    </table>
</body>

</html>