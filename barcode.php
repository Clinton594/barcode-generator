<?php
require 'vendor/autoload.php';

use Picqer\Barcode\BarcodeGeneratorHTML;
use Picqer\Barcode\BarcodeGeneratorPNG;

function generateBarcode(string $barcodeData)
{
  $generator = new BarcodeGeneratorHTML();
  $barcode = $generator->getBarcode($barcodeData, $generator::TYPE_CODE_128);
  return  [$barcode, $barcodeData];
}

// Data for the barcode
// $barcodeData = '123456789012';

// // Create an instance of the BarcodeGenerator
// $generator = new BarcodeGeneratorPNG(); // Use BarcodeGeneratorHTML() for HTML output

// // Generate the barcode
// $barcode = $generator->getBarcode($barcodeData, $generator::TYPE_CODE_128);

// // Save the barcode as a PNG file
// file_put_contents('barcode.png', $barcode);

// // Output the barcode as an image
// header('Content-Type: image/png');
// // echo $barcode;

// If you want to display the barcode in HTML format
