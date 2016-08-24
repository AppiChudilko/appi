<?php

namespace Appi;

/**
* Template
*/
class Template
{
	protected $path;

	protected $template;

	protected $vars = [];

	public function __construct($path = '') {
		$this->path = $_SERVER['DOCUMENT_ROOT'] . $path;
	}

	public function __get($name) {
		if (isset($this->vars[$name])) return $this->vars[$name];
		return '';
	}

	public function set($name, $value) {
		$this->vars[$name] = $value;
	}

	public function display($dir, $strip = true) {

		$this->template = $this->path.$dir;
		if (!file_exists($this->template)) die('Template '.$this->template.' does not exist');

		if (!file_exists($this->path.'cache')) {
		    mkdir($this->path.'cache', 0777, true);
		}

		$output = file_get_contents($this->template, true);
		$output = ($strip) ? $this->replaceReg($this->replaceTag($output)) : $this->replaceTag($output);

		$fp = fopen ($this->path.'cache/'.md5($dir).Config::Template, 'w');   
		fwrite($fp,$output);   
		fclose($fp);  

		ob_start();
		include_once($this->path.'cache/'.md5($dir).Config::Template);
		echo ob_get_clean();
	}

	private function replaceTag($buffer) {
		$replaceTwig = ["{{", "}}", "{*", "*}", "{!", "!}"];
		$replaceFinal = ["<?php", "?>", "<?php /*", "*/ ?>", "{{", "}}"];
		return str_replace($replaceTwig, $replaceFinal, $buffer);
	}

	private function replaceReg($data) {
		$lit = ["\\t", "\\n", "\\n\\r", "\\r\\n", "  "];
		$sp = ['', '', '', '', ''];
		return str_replace($lit, $sp, $data);
	}
}