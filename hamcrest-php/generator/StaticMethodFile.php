<?php

/*
 Copyright (c) 2009 hamcrest.org
 */

class StaticMethodFile extends FactoryFile
{
  /**
   * @var array of file names
   */
  private $imports;

  /**
   * @var string containing method definitions
   */
  private $methods;

  public function __construct($file) {
    parent::__construct($file, '  ');
    $this->imports = array();
    $this->methods = '';
  }

  public function addCall(FactoryCall $call) {
    $this->imports[] = $call->getMethod()->getClass()->getFile();
    $this->methods .= PHP_EOL . $this->generateFactoryCall($call);
  }

  public function getDeclarationModifiers() {
    return 'public static ';
  }

  public function build() {
    $this->addFileHeader();
    $this->addPart('matchers_imports');
//    $this->addImports();
    $this->addPart('matchers_header');
    $this->addCode($this->methods);
    $this->addPart('matchers_footer');
  }

  public function addImports() {
    $this->imports = array_unique($this->imports, SORT_STRING);
    foreach ($this->imports as $import) {
      $this->addCode(PHP_EOL . 'require_once \'' . $import . '\';');
    }
  }
}
