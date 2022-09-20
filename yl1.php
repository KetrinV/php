<?php

$eek = $_GET['eek'];

$eek = 100;
$eur = number_format(round($eek / 15.6466, 2), 2, ',', '');
echo "$eur €";