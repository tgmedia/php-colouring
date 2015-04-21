# PHP colour manipulation library

## Example
```
<?php
use Tgmedia\PhpColouring\Colouring;

// initiate class passing through colour as hex
$colouring = new Colouring('#666666');

// darken colour by 40%
echo $colouring->darken(40);

// lighten colour by 20%
echo $colouring->lighten(20);
?>
```