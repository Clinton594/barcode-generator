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

    :root {
      --width: 62mm;
      --height: 23mm;
    }

    @media print {
      @page {
        margin: 0 !important;
        padding: 0 !important;
        box-sizing: border-box;
        size: var(--width) var(--height);
        transform: scale(0.5);
      }
    }

    body>div {
      width: 350px;
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
        <div style="position: relative;display: flex;flex-direction: column;align-items: center;">
          <img src="<?= $code ?>" alt="" srcset="">
          <small><?= $number ?></small>
        </div>
      </div>
      <div>
        <button id="printnow">Print</button>
      </div>
    <?php } ?>
  </div>
  <script src="./jquery-3.3.1.min.js"></script>
  <script>
    $(document).ready(() => {
      $("#printnow").click(() => {
        print_barcode("barcodes")
      })
    })

    function print_barcode(BarCodePrintDiv) {
      var body = document.body.innerHTML;
      var data = document.getElementById(BarCodePrintDiv).innerHTML;
      document.body.innerHTML = data;
      window.print();
      document.body.innerHTML = body;
    }
  </script>
</body>

</html>