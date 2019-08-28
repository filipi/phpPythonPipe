<?php
  /****************************************************************************
   * 
   *
   */
class phpPythonPipe{
  public $kernelPath = '/usr/bin/python';
  public $code = '';
  public $output = '';

  public function exec() {
    $command = $this->kernelPath . " -c '" . $this->code . "'";
    $this->output = `$command`;
  }

  public function print(){
    echo $this->output;
  }
}

?>