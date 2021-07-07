<?php
require 'vendor/autoload.php';

use App\King;
use App\Queen;

$king = new King(4,3);
$queen = new Queen(1,1);

$king->move(3,3);
$king->move(2,2);
echo "King позиция {$king->getPosition()}<br>"; 

$queen->move(7,1);
$queen->move(7,3);
echo "Queen позиция {$queen->getPosition()}";

