<img width="300" align="right" style="float: left; margin: 0 10px 0 0;" alt="screenshot" src="https://github.com/filipi/phpPythonPipe/blob/master/images/little-prince-boa.jpg">                                

# phpPythonPipe

A simple way to execute python code from PHP without using temp files.

phpPythonPipe uses unix pipes to redirect the Python output to a PHP script.

An easy way to integrate Python scripts into PHP.

## Usage:

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
