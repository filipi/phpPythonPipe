<?PHP
require_once("class.phpPythonPipe.php");

$path_to_python = "/home/filipi/anaconda3/bin/python";

if (!isset($_GET['pythonCode'])){
  $pythonCode  = "import sys\n";
  $pythonCode .= "print(\"Hello\")\n";
}
 else
   $pythonCode = $_GET['pythonCode'];

?>
<html>
  <body>
    <form method="POST">
    <textarea name="pythonCode">
  <?php echo $pythonCode; ?>
    </textarea>
    <input type="submit" value="submit">
    </form>  
<?php  
$python = new phpPythonPipe();
$python->kernelPath = $path_to_python;
$python->code = $pythonCode;
$python->exec();
$python->print();
?>
</body>
</html>