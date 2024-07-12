<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Segitiga Bintang</title>
    <style>
        .output {
            font-size: 1.5em;
            white-space: pre;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h2>Segitiga Bintang</h2>
    <form method="post">
        <label for="input">Masukkan tinggi segitiga:</label>
        <input type="number" id="input" name="tinggi" min="1" required>
        <button type="submit" name="generate">Generate</button>
    </form>

    <div class="output">
        <?php
        if (isset($_POST['generate'])) {
            $tinggi = $_POST['tinggi'];

            for ($i = 1; $i <= $tinggi; $i++) {
                for ($j = 1; $j <= $i; $j++) {
                    echo '* ';
                }
                echo "<br>";
            }
        }
        ?>
    </div>
</body>
</html>
