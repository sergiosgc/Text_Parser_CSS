<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 foldmethod=marker: */
require_once('Text/Tokenizer/Regex.php');
/**
 * A tokenizer for a CSS parser. Companion to Text_Parser_CSS.
 */
class Text_Parser_CSS_Tokenizer extends Text_Tokenizer_Regex
{
    /*     __construct {{ { */
    /**
     * Constructor
     *
     * @param string Input text to tokenize
     * @param Text_Tokenizer_Regex_Matcher (optional) Matcher to use 
     */
    public function __construct($input = null, $matcher = null)
    {
        parent::__construct($matcher);
        if (!is_null($input)) $this->setInput($input);
        $this->addRegex('@[ \\t\\r\\n\\f]*\\{@', 
                        '<LBRACE>');
        $this->addRegex('@;@', 
                        '<SEMICOLON>');
        $this->addRegex('@\.@', 
                        '<DOT>');
        $this->addRegex('@:@', 
                        '<COLON>');
        $this->addRegex('@=@', 
                        '<EQUAL>');
        $this->addRegex('@\\*@', 
                        '<STAR>');
        $this->addRegex('@/@', 
                        '<SLASH>');
        $this->addRegex('@\\[@', 
                        '<LBRACKET>');
        $this->addRegex('@\\]@', 
                        '<RBRACKET>');
        $this->addRegex('@-@', 
                        '<MINUS>');
        $this->addRegex('@;?[ \\t\\r\\n\\f]*\\}@', 
                        '<RBRACE>');
        $this->addRegex('@\\)@', 
                        '<RPAREN>');
        $this->addRegex('@>@', 
                        '<GREATER>');
        $this->addRegex('@,@', 
                        '<COMMA>');
        $this->addRegex('@\\+@', 
                        '<PLUS>');

        $this->addRegex('@([ \\t\\r\\n\\f])+@', 
                        '<SS>');

        $this->addRegex('@/\\*[^*]*\\*+([^/*][^*]*\\*+)*/@', 
                        '<COMMENT>');

        $this->addRegex('@<!--@', 
                        '<CDO>');
        $this->addRegex('@-->@', 
                        '<CDC>');
        $this->addRegex('@~=@', 
                        '<INCLUDES>');
        $this->addRegex('@\\|=@', 
                        '<DASHMATCH>');

        $this->addRegex('@(\\"([^\\n\\r\\f\\\\"]|\\\\(\\n|\\r\\n|\\r|\\f)|((\\\\([0-9a-fA-F]){1,6}(\\r\\n|[ \\t\\r\\n\\f])?)|\\\\[^\\r\\n\\f0-9a-fA-F]))*\\")|(\\\'([^\\n\\r\\f\\\\\']|\\\\(\\n|\\r\\n|\\r|\\f)|((\\\\([0-9a-fA-F]){1,6}(\\r\\n|[ \\t\\r\\n\\f])?)|\\\\[^\\r\\n\\f0-9a-fA-F]))*\\\')@', 
                        '<STRING>');

        $this->addRegex('@(-?([_a-z]|([\\200-\\377])|((\\\\([0-9a-f]){1,6}(\\r\\n|[ \\t\\r\\n\\f])?)|\\\\[^\\r\\n\\f0-9a-f]))([_a-z0-9-]|([\\200-\\377])|((\\\\([0-9a-f]){1,6}(\\r\\n|[ \\t\\r\\n\\f])?)|\\\\[^\\r\\n\\f0-9a-f]))*)\\(@', 
                        '<CSSFUNCTION>'); // Out of order, relative to the spec, in order for the global regexp to match. Does not affect lexing, as far as tests show
        $this->addRegex('@url\\(([ \\t\\r\\n\\f]+)?((\\"([^\\n\\r\\f\\\\"]|\\\\(\\n|\\r\\n|\\r|\\f)|((\\\\([0-9a-fA-F]){1,6}(\\r\\n|[ \\t\\r\\n\\f])?)|\\\\[^\\r\\n\\f0-9a-fA-F]))*\\")|(\\\'([^\\n\\r\\f\\\\\']|\\\\(\\n|\\r\\n|\\r|\\f)|((\\\\([0-9a-fA-F]){1,6}(\\r\\n|[ \\t\\r\\n\\f])?)|\\\\[^\\r\\n\\f0-9a-fA-F]))*\\\'))([ \\t\\r\\n\\f]+)?\\)|url\\(([ \\t\\r\\n\\f]+)?(([!#$%&*-~]|([\\200-\\377])|((\\\\([0-9a-fA-F]){1,6}(\\r\\n|[ \\t\\r\\n\\f])?)|\\\\[^\\r\\n\\f0-9a-fA-F]))*)([ \\t\\r\\n\\f]+)?\\)@', 
                        '<URI>'); // Out of order, relative to the spec, in order for the global regexp to match. Does not affect lexing, as far as tests show
        $this->addRegex('@-?([_a-zA-Z]|([\\200-\\377])|((\\\\([0-9a-fA-F]){1,6}(\\r\\n|[ \\t\\r\\n\\f])?)|\\\\[^\\r\\n\\f0-9a-fA-F]))([_a-zA-Z0-9-]|([\\200-\\377])|((\\\\([0-9a-fA-F]){1,6}(\\r\\n|[ \\t\\r\\n\\f])?)|\\\\[^\\r\\n\\f0-9a-fA-F]))*@', 
                        '<IDENT>');

        $this->addRegex('@#[a-fA-F0-9]{6}@', '<HASH>');
        $this->addRegex('@#([_a-zA-Z0-9-]|[\\200-\\377]|\\\\[0-9a-fA-F]{1,6}(\\r\\n|[ \\t\\r\\n\\f])?|\\\\[^\\r\\n\\f0-9a-fA-F])+@',
                        '<HASH>');

        $this->addRegex('@\@import@',
                        '<IMPORT_SYM>');
        $this->addRegex('@\@page@',
                        '<PAGE_SYM>');
        $this->addRegex('@\@media@',
                        '<MEDIA_SYM>');
        $this->addRegex('@\@charset@',
                        '<CHARSET_SYM>');

        $this->addRegex('@!(([ \\t\\r\\n\\f])|(/\\*[^*]*\\*+([^/*][^*]*\\*+)*/))*important@', 
                        '<IMPORTANT_SYM>');

        $this->addRegex('@([0-9]+|[0-9]*\\.[0-9]+)em@', 
                        '<EMS>');
        $this->addRegex('@([0-9]+|[0-9]*\\.[0-9]+)ex@', 
                        '<EXS>');
        $this->addRegex('@([0-9]+|[0-9]*\\.[0-9]+)(px|cm|mm|in|pt|pc)@', 
                        '<LENGTH>');
        $this->addRegex('@([0-9]+|[0-9]*\\.[0-9]+)(deg|rad|grad)@', 
                        '<ANGLE>');
        $this->addRegex('@([0-9]+|[0-9]*\\.[0-9]+)(ms|s)@', 
                        '<TIME>');
        $this->addRegex('@([0-9]+|[0-9]*\\.[0-9]+)(hz|khz)@', 
                        '<FREQ>');
        $this->addRegex('@([0-9]+|[0-9]*\\.[0-9]+)-?([_a-z]|([\\200-\\377])|((\\\\([0-9a-f]){1,6}(\\r\\n|[ \\t\\r\\n\\f])?)|\\\\[^\\r\\n\\f0-9a-f]))([_a-z0-9-]|([\\200-\\377])|((\\\\([0-9a-f]){1,6}(\\r\\n|[ \\t\\r\\n\\f])?)|\\\\[^\\r\\n\\f0-9a-f]))*@', 
                        '<DIMENSION>');
        $this->addRegex('@([0-9]+|[0-9]*\\.[0-9]+)%@', 
                        '<PERCENTAGE>');
        $this->addRegex('@([0-9]*\\.[0-9]+)@', 
                        '<NUMBER>');
        $this->addRegex('@([0-9]+)@', 
                        '<NUMBER>');


        $this->setSelectionCriteria(Text_Tokenizer_Regex::SELECTFIRST);
    }
    /* }}} */
}
?>
