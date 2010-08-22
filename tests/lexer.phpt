--TEST--
Test for CSS lexer
--FILE--
<?php
dl('Text_Tokenizer_Regex_Matcher_Ext.so');
ini_set('include_path', sprintf('%s:%s', 
    realpath(dirname(__FILE__) . '/../'),
    ini_get('include_path')));
require_once('Text/Tokenizer/Regex/Matcher/Php.php');
require_once('Text/Parser/CSS/Tokenizer.php');
$lexer = new Text_Parser_CSS_Tokenizer(file_get_contents(dirname(__FILE__) . '/input/a.css'), new Text_Tokenizer_Regex_Matcher_Ext());
//$lexer->setSelectionCriteria(Text_Tokenizer_Regex::SELECTFIRST);
while ($token = $lexer->getNextToken()) {
    printf("Lexer output token {%s, '%s'}\n", $token->getId(), addcslashes($token->getValue(), "\0..\37!@\177..\377"));
}
?>
--EXPECT--
Lexer output token {<IDENT>, 'a'}
Lexer output token {<LBRACE>, '\n{'}
Lexer output token {<SS>, '\n '}
Lexer output token {<IDENT>, 'border'}
Lexer output token {<COLON>, ':'}
Lexer output token {<SS>, ' '}
Lexer output token {<LENGTH>, '1px'}
Lexer output token {<SS>, ' '}
Lexer output token {<IDENT>, 'solid'}
Lexer output token {<SS>, ' '}
Lexer output token {<IDENT>, 'red'}
Lexer output token {<SEMICOLON>, ';'}
Lexer output token {<RBRACE>, '\n}'}
Lexer output token {<SS>, '\n'}