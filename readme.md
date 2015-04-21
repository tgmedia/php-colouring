# PHP colour manipulation library

## Example
```
<?php
use Tgmedia\PhpColouring\Colouring;

// initiate class passing through colour as hex
$colouring = new Colouring('#666666');

// darken colour by 40%
echo $colouring->luminance(-0.4);

// lighten colour by 20%
echo $colouring->luminance(0.2);
?>
```