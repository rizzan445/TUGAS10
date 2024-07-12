<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel Nilai</title>
    <style>
        table {
            width: 80%;
            border-collapse: collapse;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid #000;
            text-align: center;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        input {
            width: 80%;
            padding: 5px;
        }
        button {
            padding: 5px 10px;
            margin: 10px 0;
        }
    </style>
</head>
<body>

    <form method="post">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>NILAI ANGKA</th>
                    <th>NILAI HURUF</th>
                    <th>NILAI NUMERIK</th>
                </tr>
            </thead>
            <tbody id="nilaiTable">
                <?php for ($i = 1; $i <= 3; $i++): ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><input type="number" name="nilaiAngka<?php echo $i; ?>" min="0" max="100" step="0.01" placeholder="Masukkan Nilai"></td>
                        <td><?php echo isset($_POST["nilaiHuruf$i"]) ? $_POST["nilaiHuruf$i"] : '-'; ?></td>
                        <td><?php echo isset($_POST["nilaiNumerik$i"]) ? $_POST["nilaiNumerik$i"] : '-'; ?></td>
                    </tr>
                <?php endfor; ?>
            </tbody>
        </table>
        <div style="text-align: center;">
            <button type="submit" name="hitungNilai">Hitung Nilai</button>
        </div>
    </form>

    <?php
    if (isset($_POST['hitungNilai'])) {
        echo '<table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>NILAI ANGKA</th>
                    <th>NILAI HURUF</th>
                    <th>NILAI NUMERIK</th>
                </tr>
            </thead>
            <tbody>';

        for ($i = 1; $i <= 3; $i++) {
            $nilai = isset($_POST['nilaiAngka' . $i]) ? (float)$_POST['nilaiAngka' . $i] : 0;
            $nilaiHuruf = '-';
            $nilaiNumerik = '-';

            if ($nilai >= 80.00 && $nilai <= 100.00) {
                $nilaiHuruf = 'A';
                $nilaiNumerik = 4.00;
            } elseif ($nilai >= 76.25 && $nilai < 80.00) {
                $nilaiHuruf = 'A -';
                $nilaiNumerik = 3.67;
            } elseif ($nilai >= 68.75 && $nilai < 76.25) {
                $nilaiHuruf = 'B+';
                $nilaiNumerik = 3.33;
            } elseif ($nilai >= 65.00 && $nilai < 68.75) {
                $nilaiHuruf = 'B';
                $nilaiNumerik = 3.00;
            } elseif ($nilai >= 62.50 && $nilai < 65.00) {
                $nilaiHuruf = 'B -';
                $nilaiNumerik = 2.67;
            } elseif ($nilai >= 57.50 && $nilai < 62.50) {
                $nilaiHuruf = 'C+';
                $nilaiNumerik = 2.33;
            } elseif ($nilai >= 55.00 && $nilai < 57.50) {
                $nilaiHuruf = 'C';
                $nilaiNumerik = 2.00;
            } elseif ($nilai >= 51.25 && $nilai < 55.00) {
                $nilaiHuruf = 'C -';
                $nilaiNumerik = 1.67;
            } elseif ($nilai >= 43.75 && $nilai < 51.25) {
                $nilaiHuruf = 'D+';
                $nilaiNumerik = 1.33;
            } elseif ($nilai >= 40.00 && $nilai < 43.75) {
                $nilaiHuruf = 'D';
                $nilaiNumerik = 1.00;
            } elseif ($nilai >= 0.00 && $nilai < 40.00) {
                $nilaiHuruf = 'E';
                $nilaiNumerik = 0.00;
            }

            echo "<tr>
                    <td>{$i}</td>
                    <td>{$nilai}</td>
                    <td>{$nilaiHuruf}</td>
                    <td>{$nilaiNumerik}</td>
                </tr>";
        }

        echo '</tbody></table>';
    }
    ?>

</body>
</html>
