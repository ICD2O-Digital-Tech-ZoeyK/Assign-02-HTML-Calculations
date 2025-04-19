<?php
// Copyright (c) 2025 Zoey Kariyal
// Created by: Zoey Kariyal
// Created on: April 2025
// This file contains the PHP functions for index.html

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Get POST values
$amount = isset($_POST['amount']) ? floatval($_POST['amount']) : 0;
$currency = isset($_POST['currency']) ? $_POST['currency'] : "";

// Exchange rates
$exchangeRates = [
  "USD" => 0.7224572220,
  "AUD" => 1.1308850000,
  "EUR" => 0.6352850000,
];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="description" content="My First Website">
    <meta name="keywords" content="immaculata, ics2o">
    <meta name="author" content="Zoey Kariyal">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="../Favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../Favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../Favicon/favicon-16x16.png">
    <link rel="manifest" href="../Favicon/site.webmanifest">

    <title>Conversion Result</title>
    <link rel="stylesheet" href="../css/style.css">
  </head>
  <body>
    <h1>Conversion Result</h1>

    <div class="converter">
      <?php
        if ($amount <= 0) {
          echo "<p>Please enter a valid amount.</p>";
        } elseif (!array_key_exists($currency, $exchangeRates)) {
          echo "<p>Unsupported currency selected.</p>";
        } else {
          $rate = $exchangeRates[$currency];
          $convertedAmount = $amount * $rate;
          $convertedBonus = $convertedAmount * 10;

          echo "<p>" . number_format($amount, 2) . " CAD = " . number_format($convertedAmount, 2) . " $currency</p>";
          echo "<p>(Rate: 1 CAD = " . number_format($rate, 2) . " $currency)</p>";

          if ($amount >= 100) {
            echo "<p>Wow! Exchanging " . number_format($amount, 2) . " CAD would give you " . number_format($convertedBonus, 2) . " $currency over 10 conversions!</p>";
          } else {
            echo "<p>For comparison: 10x this amount = " . number_format($convertedBonus, 2) . " $currency</p>";
          }
        }
      ?>

      <br>
      <a href="../index.html">← Back to Converter</a>
    </div>
  </body>
</html>



