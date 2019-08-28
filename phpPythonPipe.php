<?PHP
  // Inlining python from command line (Use an ANSI C-quoted string ($'...')),
  // which allows using \n to represent newlines that are expanded to actual
  // newlines before the string is passed to python:
  // https://stackoverflow.com/questions/2043453/executing-multi-line-statements-in-the-one-line-command-line/2043633#2043633

  // Viewing all defined variables
  // https://stackoverflow.com/questions/633127/viewing-all-defined-variables

$path_to_python = "/home/filipi/anaconda3/bin/python";

$pythonCode  = "import sys\n";
$pythonCode .= "print(\"Hello\")\n";

//$program = "'import sys\nfor r in range(10):\n\tprint(\"\$result[]=\\\"rob\\\";\")'";
//$program = "'import sys\nfor r in range(10):\n\tprint(\"\$result[]=\\\"rob\\\";\")'";
$command = $path_to_python . " -c '" . $pythonCode . "'";

$python_output =  `$command`;
echo $python_output;

//eval($python_output);
//var_dump($result);

echo "==============================\n";

require_once("class.phpPythonPipe.php");
$python = new phpPythonPipe();
$python->kernelPath = $path_to_python;
$python->code = $pythonCode;
$python->exec();
$python->print();

?>