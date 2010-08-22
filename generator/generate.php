<?php
require_once('Text/Parser/BNF.php');
require_once('Text/Parser/BNF/Tokenizer.php');
require_once('Text/Tokenizer/Regex/Matcher/Php.php');
require_once('Text/Parser/Generator/LALR.php');
$bnfParser = new Text_Parser_BNF(
	new Text_Parser_BNF_Tokenizer(
	    file_get_contents(realpath(dirname(__FILE__)) .'/css_grammar.bnf'),
		new Text_Tokenizer_Regex_Matcher_Php()));
$grammar = $bnfParser->parse()->getValue();
$generator = new Text_Parser_Generator_LALR($grammar);
$code = sprintf("<?php\n%s\n?>", $generator->generate('Text_Parser_CSS'));
file_put_contents(realpath(dirname(__FILE__) . '/../') . '/Text/Parser/CSS.php', $code);
?>
