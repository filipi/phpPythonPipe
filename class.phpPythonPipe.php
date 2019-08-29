<?php
  /****************************************************************************
   * 
   *
   */
class phpPythonPipe{
  public $kernelPath = '/usr/bin/python';
  public $code = '';
  public $output = '';

  public $debugLevel = 0;

  private $blackListCommands = array();  

  /**
   * https://www.owasp.org/index.php/Testing_for_Command_Injection_(OTG-INPVAL-013)
   * black list system near commands:
   */
  public function __construct(){
    $this->blackListCommands['python'][] = "eval";  
    $this->blackListCommands['python'][] = "os.system";  
    $this->blackListCommands['python'][] = "os.popen";  
    $this->blackListCommands['python'][] = "subprocess.popen";  
    $this->blackListCommands['python'][] = "subprocess.call";  
 
    $this->blackListCommands['PHP'][] = "system";  
    $this->blackListCommands['PHP'][] = "shell_exec";  
    $this->blackListCommands['PHP'][] = "exec";  
    $this->blackListCommands['PHP'][] = "proc_open";  
    $this->blackListCommands['PHP'][] = "eval";  
    $this->blackListCommands['PHP'][] = "passthru";  
    $this->blackListCommands['PHP'][] = "proc_open";  
    $this->blackListCommands['PHP'][] = "expect_open";  
    $this->blackListCommands['PHP'][] = "ssh2_exec";  
    $this->blackListCommands['PHP'][] = "popen";        
  }
  
  private function codeInjectionCheck(){
    foreach($this->blackListCommands['python'] as $command){
      $this->code = str_replace( $command, '', $this->code);
      if ($this->debugLevel > 3){
        echo "-------------------------\n";
        echo "CODE: " . $this->code;
        echo "-------------------------\n";
      }
    }
  }  
  
  public function exec() {
    $this->codeInjectionCheck();      
    $command = $this->kernelPath . " -c '" . $this->code . "'";
    $this->output = `$command`;
  }

  public function print(){
    echo $this->output;
  }
}

?>
