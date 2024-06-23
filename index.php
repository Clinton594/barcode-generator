<?php
require_once("barcode.php");

if (!empty($_GET["barcode"])) {
  list($code, $number) = generateBarcode($_GET["barcode"]);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bar Code</title>

  <style>
    * {
      box-sizing: border-box;
    }

    body {
      background-color: antiquewhite;
      display: flex;
      justify-content: center;
      height: 100vh;

      margin: 0;
    }

    body>div {
      width: 300px;
      background-color: white;
      overflow-y: auto;
      padding: 20px;
    }

    form>div {
      display: flex;
      gap: 5px;
      align-items: center;
      justify-content: center;
    }

    input,
    button {
      height: 40px;
      padding: 6px;
      width: 100%;
      border-radius: 3px;
      border: solid 1px lightgray;
    }

    #barcodes {
      margin-top: 30px;
      display: flex;
      flex-direction: column;
      gap: 20px;
      align-items: center;
    }
  </style>

</head>

<body>
  <div>
    <form action="">
      <div>
        <input type="text" max=12 name=barcode placeholder="Enter OEM Number">
        <button type="submit">Generate</button>
      </div>
    </form>
    <?php if (!empty($code)) { ?>
      <div id="barcodes">
        <?php for ($i = 0; $i < 20; $i++) { ?>
          <div style="position: relative;display: flex;flex-direction: column;align-items: center;">
            <?= $code ?>
            <small><?= $number ?></small>
          </div>
        <?php } ?>
      </div>
    <?php } ?>
  </div>
</body>

</html>