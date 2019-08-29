<?php
  /****************************************************************************
   * 
   *
   */
class phpPythonPipe{
  public $kernelPath = '/usr/bin/python';
  public $code = '';
  public $output = '';

  /*
  https://www.owasp.org/index.php/Testing_for_Command_Injection_(OTG-INPVAL-013)
  black list system near commands:
  PYTHON
  exec
  eval
  os.system
  os.popen
  subprocess.popen
  subprocess.call
  
  PHP
  system
  shell_exec
  exec
  proc_open
  eval
  passthru
  proc_open
  expect_open
  ssh2_exec
  popen
  */
  public function exec() {
    $command = $this->kernelPath . " -c '" . $this->code . "'";
    $this->output = `$command`;
  }

  public function print(){
    echo $this->output;
  }
}

?>
