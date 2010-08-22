--TEST--
Parse a.css
--FILE--
<?php
dl('Text_Tokenizer_Regex_Matcher_Ext.so');
ini_set('include_path', sprintf('%s:%s', 
    realpath(dirname(__FILE__) . '/../'),
    ini_get('include_path')));
require_once('Text/Tokenizer/Regex/Matcher/Php.php');
require_once('Text/Parser/CSS/Tokenizer.php');
require_once('Text/Parser/CSS.php');
$tokenizer = new Text_Parser_CSS_Tokenizer(file_get_contents(dirname(__FILE__) . '/input/a.css'), new Text_Tokenizer_Regex_Matcher_Ext());

$parser = new Text_Parser_CSS($tokenizer);
$parser->setDebugLevel(10);
$parser->parse();
?>
--EXPECT--
Read token <IDENT>(a) state []
Shifting to state 33
Read token <LBRACE>(
{) state [33]
Reducing using reduce_rule_104 state [33] Result state [31]
Reducing using reduce_rule_94 state [31] Result state [30]
Reducing using reduce_rule_92 state [30] Result state [28]
Reducing using reduce_rule_84 state [28] Result state [25]
Shifting to state 63
Read token <SS>(
 ) state [25 63]
Shifting to state 55
Read token <IDENT>(border) state [25 63 55]
Reducing using reduce_rule_9 state [25 63 55] Result state [25 63 95]
Shifting to state 101
Read token <COLON>(:) state [25 63 95 101]
Reducing using reduce_rule_79 state [25 63 95 101] Result state [25 63 95 100]
Shifting to state 135
Read token <SS>( ) state [25 63 95 100 135]
Shifting to state 55
Read token <LENGTH>(1px) state [25 63 95 100 135 55]
Reducing using reduce_rule_9 state [25 63 95 100 135 55] Result state [25 63 95 100 135 158]
Shifting to state 174
Read token <SS>( ) state [25 63 95 100 135 158 174]
Shifting to state 55
Read token <IDENT>(solid) state [25 63 95 100 135 158 174 55]
Reducing using reduce_rule_9 state [25 63 95 100 135 158 174 55] Result state [25 63 95 100 135 158 174 205]
Reducing using reduce_rule_146 state [25 63 95 100 135 158 174 205] Result state [25 63 95 100 135 158 164]
Reducing using reduce_rule_140 state [25 63 95 100 135 158 164] Result state [25 63 95 100 135 158 161]
Reducing using reduce_rule_137 state [25 63 95 100 135 158 161] Result state [25 63 95 100 135 158 160]
Reducing using reduce_rule_134 state [25 63 95 100 135 158 160] Result state [25 63 95 100 135 158 191]
Shifting to state 166
Read token <SS>( ) state [25 63 95 100 135 158 191 166]
Shifting to state 55
Read token <IDENT>(red) state [25 63 95 100 135 158 191 166 55]
Reducing using reduce_rule_9 state [25 63 95 100 135 158 191 166 55] Result state [25 63 95 100 135 158 191 166 201]
Reducing using reduce_rule_162 state [25 63 95 100 135 158 191 166 201] Result state [25 63 95 100 135 158 191 162]
Reducing using reduce_rule_138 state [25 63 95 100 135 158 191 162] Result state [25 63 95 100 135 158 191 193]
Reducing using reduce_rule_135 state [25 63 95 100 135 158 191 193] Result state [25 63 95 100 135 158 191]
Shifting to state 166
Read token <SEMICOLON>(;) state [25 63 95 100 135 158 191 166]
Reducing using reduce_rule_161 state [25 63 95 100 135 158 191 166] Result state [25 63 95 100 135 158 191 162]
Reducing using reduce_rule_138 state [25 63 95 100 135 158 191 162] Result state [25 63 95 100 135 158 191 193]
Reducing using reduce_rule_135 state [25 63 95 100 135 158 191 193] Result state [25 63 95 100 135 158 191]
Reducing using reduce_rule_128 state [25 63 95 100 135 158 191] Result state [25 63 95 99]
Reducing using reduce_rule_126 state [25 63 95 99] Result state [25 63 95 133]
Reducing using reduce_rule_68 state [25 63 95 133] Result state [25 63 97]
Reducing using reduce_rule_65 state [25 63 97] Result state [25 63 96]
Shifting to state 134
Read token <RBRACE>(
}) state [25 63 96 134]
Reducing using reduce_rule_64 state [25 63 96 134] Result state [25 63 93]
Shifting to state 130
Read token <SS>(
) state [25 63 93 130]
Shifting to state 55
Read token () state [25 63 93 130 55]
Reducing using reduce_rule_9 state [25 63 93 130 55] Result state [25 63 93 130 155]
Reducing using reduce_rule_82 state [25 63 93 130 155] Result state [21]
Reducing using reduce_rule_81 state [21] Result state [13]
Reducing using reduce_rule_24 state [13] Result state [8]
Reducing using reduce_rule_19 state [8] Result state [3]
Reducing using reduce_rule_3 state [3] Result state [1]
Accepting