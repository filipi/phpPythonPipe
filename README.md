# phpPythonPipe

Usage:

```
<?php
require_once("class.phpPythonPipe.php");

$pythonCode  = "import sys\n";
$pythonCode .= "print(\"Hello\")\n";

$python = new phpPythonPipe();
$python->kernelPath = "~/anaconda3/bin/python";
$python->code = $pythonCode;
$python->exec();
$python->print();
?>

```
