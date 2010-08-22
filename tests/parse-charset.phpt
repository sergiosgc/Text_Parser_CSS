--TEST--
Parse parse-charset.css
--FILE--
<?php
dl('Text_Tokenizer_Regex_Matcher_Ext.so');
ini_set('include_path', sprintf('%s:%s', 
    realpath(dirname(__FILE__) . '/../'),
    ini_get('include_path')));
require_once('Text/Tokenizer/Regex/Matcher/Php.php');
require_once('Text/Parser/CSS/Tokenizer.php');
require_once('Text/Parser/CSS.php');
$tokenizer = new Text_Parser_CSS_Tokenizer(file_get_contents(dirname(__FILE__) . '/input/charset.css'), new Text_Tokenizer_Regex_Matcher_Ext());

$parser = new Text_Parser_CSS($tokenizer);
print((string) $parser->parse()->getValue());
?>
--EXPECT--
@charset