<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 foldmethod=marker: */
require_once('Text/Parser/LALR.php');
/**
 *
 * This is an automatically generated parser for the following grammar:
 *
 * [0] <start>-><stylesheet>
 * [1] <stylesheet>-><stylesheet_1><stylesheet_2>
 * [2] <stylesheet>-><stylesheet_1>
 * [3] <stylesheet>-><stylesheet_2>
 * [4] <stylesheet_1>-><stylesheet_charset><s_cdo_cdc_plus>
 * [5] <stylesheet_1>-><s_cdo_cdc_plus>
 * [6] <stylesheet_charset>-><charset_sym_sstar><string_sstar><SEMICOLON>
 * [7] <charset_sym_sstar>-><CHARSET_SYM>
 * [8] <charset_sym_sstar>-><CHARSET_SYM><splus>
 * [9] <splus>-><SS>
 * [10] <splus>-><SS><splus>
 * [11] <string_sstar>-><STRING>
 * [12] <string_sstar>-><STRING><splus>
 * [13] <s_cdo_cdc_plus>-><s_cdo_cdc>
 * [14] <s_cdo_cdc_plus>-><s_cdo_cdc_plus><s_cdo_cdc>
 * [15] <s_cdo_cdc>-><SS>
 * [16] <s_cdo_cdc>-><CDO>
 * [17] <s_cdo_cdc>-><CDC>
 * [18] <stylesheet_2>-><stylesheet_import><stylesheet_ruleset_media_page>
 * [19] <stylesheet_2>-><stylesheet_ruleset_media_page>
 * [20] <stylesheet_import>-><import><s_cdo_cdc_plus>
 * [21] <stylesheet_import>-><import>
 * [22] <stylesheet_import>-><stylesheet_import><import><s_cdo_cdc_plus>
 * [23] <stylesheet_import>-><stylesheet_import><import>
 * [24] <stylesheet_ruleset_media_page>-><ruleset>
 * [25] <stylesheet_ruleset_media_page>-><media>
 * [26] <stylesheet_ruleset_media_page>-><page>
 * [27] <stylesheet_ruleset_media_page>-><stylesheet_ruleset_media_page><ruleset>
 * [28] <stylesheet_ruleset_media_page>-><stylesheet_ruleset_media_page><media>
 * [29] <stylesheet_ruleset_media_page>-><stylesheet_ruleset_media_page><page>
 * [30] <import>-><import_sym_sstar><string_or_uri_sstar><SEMICOLON>
 * [31] <import>-><import_sym_sstar><string_or_uri_sstar><medialist><SEMICOLON>
 * [32] <import_sym_sstar>-><IMPORT_SYM>
 * [33] <import_sym_sstar>-><IMPORT_SYM><splus>
 * [34] <string_or_uri_sstar>-><string_sstar>
 * [35] <string_or_uri_sstar>-><URI><splus>
 * [36] <string_or_uri_sstar>-><URI>
 * [37] <medialist>-><medium>
 * [38] <medialist>-><medialist><COMMA><medium>
 * [39] <medialist>-><medialist><COMMA><splus><medium>
 * [40] <media>-><media_sym_sstar><medialist><LBRACE><splus><rulesetplus><RBRACE>
 * [41] <media>-><media_sym_sstar><medialist><LBRACE><splus><rulesetplus><RBRACE><splus>
 * [42] <media>-><media_sym_sstar><medialist><LBRACE><rulesetplus><RBRACE>
 * [43] <media>-><media_sym_sstar><medialist><LBRACE><rulesetplus><RBRACE><splus>
 * [44] <media>-><media_sym_sstar><medialist><LBRACE><splus><RBRACE>
 * [45] <media>-><media_sym_sstar><medialist><LBRACE><splus><RBRACE><splus>
 * [46] <media>-><media_sym_sstar><medialist><LBRACE><RBRACE>
 * [47] <media>-><media_sym_sstar><medialist><LBRACE><RBRACE><splus>
 * [48] <media_sym_sstar>-><MEDIA_SYM>
 * [49] <media_sym_sstar>-><MEDIA_SYM><splus>
 * [50] <rulesetplus>-><ruleset>
 * [51] <rulesetplus>-><rulesetplus><ruleset>
 * [52] <medium>-><IDENT>
 * [53] <medium>-><IDENT><splus>
 * [54] <page>-><ppage>
 * [55] <ppage>-><pagesym_sstar><pseudo_page><splus><LBRACE><declarations_optional_semicolon><RBRACE>
 * [56] <ppage>-><pagesym_sstar><pseudo_page><splus><LBRACE><declarations_optional_semicolon><RBRACE><splus>
 * [57] <ppage>-><pagesym_sstar><pseudo_page><LBRACE><declarations_optional_semicolon><RBRACE>
 * [58] <ppage>-><pagesym_sstar><pseudo_page><LBRACE><declarations_optional_semicolon><RBRACE><splus>
 * [59] <ppage>-><pagesym_sstar><LBRACE><declarations_optional_semicolon><RBRACE>
 * [60] <ppage>-><pagesym_sstar><LBRACE><declarations_optional_semicolon><RBRACE><splus>
 * [61] <pagesym_sstar>-><PAGE_SYM>
 * [62] <pagesym_sstar>-><PAGE_SYM><splus>
 * [63] <declarations_optional_semicolon>-><declarations>
 * [64] <declarations_optional_semicolon>-><declarations><SEMICOLON>
 * [65] <declarations>-><sstar_declaration>
 * [66] <declarations>-><declarations><SEMICOLON><sstar_declaration>
 * [67] <sstar_declaration>-><declaration>
 * [68] <sstar_declaration>-><splus><declaration>
 * [69] <pseudo_page>-><COLON><IDENT>
 * [70] <operator>-><SLASH>
 * [71] <operator>-><SLASH><splus>
 * [72] <operator>-><COMMA>
 * [73] <operator>-><COMMA><splus>
 * [74] <combinator>-><GREATER><splus>
 * [75] <combinator>-><PLUS><splus>
 * [76] <combinator>-><SS>
 * [77] <unary_operator>-><MINUS>
 * [78] <unary_operator>-><PLUS>
 * [79] <property>-><IDENT>
 * [80] <property>-><IDENT><splus>
 * [81] <ruleset>-><rruleset>
 * [82] <rruleset>-><selectors><LBRACE><declarations_optional_semicolon><RBRACE><splus>
 * [83] <rruleset>-><selectors><LBRACE><declarations_optional_semicolon><RBRACE>
 * [84] <selectors>-><selector>
 * [85] <selectors>-><selectors><comma_sstar><selector>
 * [86] <comma_sstar>-><COMMA>
 * [87] <comma_sstar>-><COMMA><splus>
 * [88] <rruleset>-><selectors><LBRACE><RBRACE>
 * [89] <rruleset>-><selectors><LBRACE><splus><RBRACE>
 * [90] <rruleset>-><selectors><LBRACE><RBRACE><splus>
 * [91] <rruleset>-><selectors><LBRACE><splus><RBRACE><splus>
 * [92] <selector>-><simple_selector>
 * [93] <selector>-><simple_selector><combinator><selector>
 * [94] <simple_selector>-><element_name>
 * [95] <simple_selector>-><element_name><hash_class_attrib_pseudo_plus>
 * [96] <simple_selector>-><hash_class_attrib_pseudo_plus>
 * [97] <hash_class_attrib_pseudo_plus>-><hash_class_attrib_pseudo>
 * [98] <hash_class_attrib_pseudo_plus>-><hash_class_attrib_pseudo_plus><hash_class_attrib_pseudo>
 * [99] <hash_class_attrib_pseudo>-><HASH>
 * [100] <hash_class_attrib_pseudo>-><class>
 * [101] <hash_class_attrib_pseudo>-><attrib>
 * [102] <hash_class_attrib_pseudo>-><pseudo>
 * [103] <class>-><DOT><IDENT>
 * [104] <element_name>-><IDENT>
 * [105] <element_name>-><STAR>
 * [106] <attrib>-><LBRACKET><trimmed_ident><RBRACKET>
 * [107] <attrib>-><LBRACKET><trimmed_ident><attrib_operator_sstar><attrib_operator_rhand_sstar><RBRACKET>
 * [108] <attrib>-><LBRACKET><trimmed_ident><attrib_operator_sstar><RBRACKET>
 * [109] <trimmed_ident>-><IDENT>
 * [110] <trimmed_ident>-><splus><IDENT>
 * [111] <trimmed_ident>-><IDENT><splus>
 * [112] <trimmed_ident>-><splus><IDENT><splus>
 * [113] <attrib_operator_sstar>-><attrib_operator>
 * [114] <attrib_operator_sstar>-><attrib_operator><splus>
 * [115] <attrib_operator>-><INCLUDES>
 * [116] <attrib_operator>-><DASHMATCH>
 * [117] <attrib_operator>-><EQUAL>
 * [118] <attrib_operator_rhand_sstar>-><attrib_operator_rhand>
 * [119] <attrib_operator_rhand_sstar>-><attrib_operator_rhand><splus>
 * [120] <attrib_operator_rhand>-><STRING>
 * [121] <attrib_operator_rhand>-><IDENT>
 * [122] <pseudo>-><COLON><IDENT>
 * [123] <pseudo>-><COLON><CSSFUNCTION><trimmed_ident><RPAREN>
 * [124] <pseudo>-><COLON><CSSFUNCTION><splus><RPAREN>
 * [125] <pseudo>-><COLON><CSSFUNCTION><RPAREN>
 * [126] <declaration>-><ddeclaration>
 * [127] <ddeclaration>-><property><COLON><splus><expr><prio>
 * [128] <ddeclaration>-><property><COLON><splus><expr>
 * [129] <ddeclaration>-><property><COLON><expr><prio>
 * [130] <ddeclaration>-><property><COLON><expr>
 * [131] <prio>-><important_sym_sstar>
 * [132] <important_sym_sstar>-><IMPORTANT_SYM>
 * [133] <important_sym_sstar>-><IMPORTANT_SYM><splus>
 * [134] <expr>-><term>
 * [135] <expr>-><expr><term>
 * [136] <expr>-><expr><operator><term>
 * [137] <term>-><term_numeric>
 * [138] <term>-><term_nonnumeric>
 * [139] <term_numeric>-><unary_operator><term_numeric_number>
 * [140] <term_numeric>-><term_numeric_number>
 * [141] <term_numeric_number>-><NUMBER>
 * [142] <term_numeric_number>-><NUMBER><splus>
 * [143] <term_numeric_number>-><PERCENTAGE>
 * [144] <term_numeric_number>-><PERCENTAGE><splus>
 * [145] <term_numeric_number>-><LENGTH>
 * [146] <term_numeric_number>-><LENGTH><splus>
 * [147] <term_numeric_number>-><EMS>
 * [148] <term_numeric_number>-><EMS><splus>
 * [149] <term_numeric_number>-><EXS>
 * [150] <term_numeric_number>-><EXS><splus>
 * [151] <term_numeric_number>-><ANGLE>
 * [152] <term_numeric_number>-><ANGLE><splus>
 * [153] <term_numeric_number>-><TIME>
 * [154] <term_numeric_number>-><TIME><splus>
 * [155] <term_numeric_number>-><FREQ>
 * [156] <term_numeric_number>-><FREQ><splus>
 * [157] <term_numeric_number>-><DIMENSION>
 * [158] <term_numeric_number>-><DIMENSION><splus>
 * [159] <term_nonnumeric>-><STRING>
 * [160] <term_nonnumeric>-><STRING><splus>
 * [161] <term_nonnumeric>-><IDENT>
 * [162] <term_nonnumeric>-><IDENT><splus>
 * [163] <term_nonnumeric>-><URI>
 * [164] <term_nonnumeric>-><URI><splus>
 * [165] <term_nonnumeric>-><hexcolor>
 * [166] <term_nonnumeric>-><function>
 * [167] <hexcolor>-><HASH>
 * [168] <hexcolor>-><HASH><splus>
 * [169] <function>-><CSSFUNCTION><splus><expr><RPAREN><splus>
 * [170] <function>-><CSSFUNCTION><splus><expr><RPAREN>
 * [171] <function>-><CSSFUNCTION><expr><RPAREN><splus>
 * [172] <function>-><CSSFUNCTION><expr><RPAREN>
 * [173] <stylesheet>-><placeholder>
 * [174] <placeholder>-><COMMENT>
 *
 * -- Finite State Automaton States --
 * ----------- 0 -----------
 *   --Itemset--
 *     <start>->•<stylesheet>
 *    +<stylesheet>->•<stylesheet_1><stylesheet_2>
 *    +<stylesheet>->•<stylesheet_1>
 *    +<stylesheet>->•<stylesheet_2>
 *    +<stylesheet>->•<placeholder>
 *    +<stylesheet_1>->•<stylesheet_charset><s_cdo_cdc_plus>
 *    +<stylesheet_1>->•<s_cdo_cdc_plus>
 *    +<stylesheet_2>->•<stylesheet_import><stylesheet_ruleset_media_page>
 *    +<stylesheet_2>->•<stylesheet_ruleset_media_page>
 *    +<placeholder>->•<COMMENT>
 *    +<stylesheet_charset>->•<charset_sym_sstar><string_sstar><SEMICOLON>
 *    +<s_cdo_cdc_plus>->•<s_cdo_cdc>
 *    +<s_cdo_cdc_plus>->•<s_cdo_cdc_plus><s_cdo_cdc>
 *    +<stylesheet_import>->•<import><s_cdo_cdc_plus>
 *    +<stylesheet_import>->•<import>
 *    +<stylesheet_import>->•<stylesheet_import><import><s_cdo_cdc_plus>
 *    +<stylesheet_import>->•<stylesheet_import><import>
 *    +<stylesheet_ruleset_media_page>->•<ruleset>
 *    +<stylesheet_ruleset_media_page>->•<media>
 *    +<stylesheet_ruleset_media_page>->•<page>
 *    +<stylesheet_ruleset_media_page>->•<stylesheet_ruleset_media_page><ruleset>
 *    +<stylesheet_ruleset_media_page>->•<stylesheet_ruleset_media_page><media>
 *    +<stylesheet_ruleset_media_page>->•<stylesheet_ruleset_media_page><page>
 *    +<charset_sym_sstar>->•<CHARSET_SYM>
 *    +<charset_sym_sstar>->•<CHARSET_SYM><splus>
 *    +<s_cdo_cdc>->•<SS>
 *    +<s_cdo_cdc>->•<CDO>
 *    +<s_cdo_cdc>->•<CDC>
 *    +<import>->•<import_sym_sstar><string_or_uri_sstar><SEMICOLON>
 *    +<import>->•<import_sym_sstar><string_or_uri_sstar><medialist><SEMICOLON>
 *    +<ruleset>->•<rruleset>
 *    +<media>->•<media_sym_sstar><medialist><LBRACE><splus><rulesetplus><RBRACE>
 *    +<media>->•<media_sym_sstar><medialist><LBRACE><splus><rulesetplus><RBRACE><splus>
 *    +<media>->•<media_sym_sstar><medialist><LBRACE><rulesetplus><RBRACE>
 *    +<media>->•<media_sym_sstar><medialist><LBRACE><rulesetplus><RBRACE><splus>
 *    +<media>->•<media_sym_sstar><medialist><LBRACE><splus><RBRACE>
 *    +<media>->•<media_sym_sstar><medialist><LBRACE><splus><RBRACE><splus>
 *    +<media>->•<media_sym_sstar><medialist><LBRACE><RBRACE>
 *    +<media>->•<media_sym_sstar><medialist><LBRACE><RBRACE><splus>
 *    +<page>->•<ppage>
 *    +<import_sym_sstar>->•<IMPORT_SYM>
 *    +<import_sym_sstar>->•<IMPORT_SYM><splus>
 *    +<rruleset>->•<selectors><LBRACE><declarations_optional_semicolon><RBRACE><splus>
 *    +<rruleset>->•<selectors><LBRACE><declarations_optional_semicolon><RBRACE>
 *    +<rruleset>->•<selectors><LBRACE><RBRACE>
 *    +<rruleset>->•<selectors><LBRACE><splus><RBRACE>
 *    +<rruleset>->•<selectors><LBRACE><RBRACE><splus>
 *    +<rruleset>->•<selectors><LBRACE><splus><RBRACE><splus>
 *    +<media_sym_sstar>->•<MEDIA_SYM>
 *    +<media_sym_sstar>->•<MEDIA_SYM><splus>
 *    +<ppage>->•<pagesym_sstar><pseudo_page><splus><LBRACE><declarations_optional_semicolon><RBRACE>
 *    +<ppage>->•<pagesym_sstar><pseudo_page><splus><LBRACE><declarations_optional_semicolon><RBRACE><splus>
 *    +<ppage>->•<pagesym_sstar><pseudo_page><LBRACE><declarations_optional_semicolon><RBRACE>
 *    +<ppage>->•<pagesym_sstar><pseudo_page><LBRACE><declarations_optional_semicolon><RBRACE><splus>
 *    +<ppage>->•<pagesym_sstar><LBRACE><declarations_optional_semicolon><RBRACE>
 *    +<ppage>->•<pagesym_sstar><LBRACE><declarations_optional_semicolon><RBRACE><splus>
 *    +<selectors>->•<selector>
 *    +<selectors>->•<selectors><comma_sstar><selector>
 *    +<pagesym_sstar>->•<PAGE_SYM>
 *    +<pagesym_sstar>->•<PAGE_SYM><splus>
 *    +<selector>->•<simple_selector>
 *    +<selector>->•<simple_selector><combinator><selector>
 *    +<simple_selector>->•<element_name>
 *    +<simple_selector>->•<element_name><hash_class_attrib_pseudo_plus>
 *    +<simple_selector>->•<hash_class_attrib_pseudo_plus>
 *    +<element_name>->•<IDENT>
 *    +<element_name>->•<STAR>
 *    +<hash_class_attrib_pseudo_plus>->•<hash_class_attrib_pseudo>
 *    +<hash_class_attrib_pseudo_plus>->•<hash_class_attrib_pseudo_plus><hash_class_attrib_pseudo>
 *    +<hash_class_attrib_pseudo>->•<HASH>
 *    +<hash_class_attrib_pseudo>->•<class>
 *    +<hash_class_attrib_pseudo>->•<attrib>
 *    +<hash_class_attrib_pseudo>->•<pseudo>
 *    +<class>->•<DOT><IDENT>
 *    +<attrib>->•<LBRACKET><trimmed_ident><RBRACKET>
 *    +<attrib>->•<LBRACKET><trimmed_ident><attrib_operator_sstar><attrib_operator_rhand_sstar><RBRACKET>
 *    +<attrib>->•<LBRACKET><trimmed_ident><attrib_operator_sstar><RBRACKET>
 *    +<pseudo>->•<COLON><IDENT>
 *    +<pseudo>->•<COLON><CSSFUNCTION><trimmed_ident><RPAREN>
 *    +<pseudo>->•<COLON><CSSFUNCTION><splus><RPAREN>
 *    +<pseudo>->•<COLON><CSSFUNCTION><RPAREN>
 *   --Transitions--
 *    Goto on <stylesheet> to 1 because of <start>->•<stylesheet>
 *    Goto on <stylesheet_1> to 2 because of <stylesheet>->•<stylesheet_1><stylesheet_2>
 *    Goto on <stylesheet_1> to 2 because of <stylesheet>->•<stylesheet_1>
 *    Goto on <stylesheet_2> to 3 because of <stylesheet>->•<stylesheet_2>
 *    Goto on <placeholder> to 4 because of <stylesheet>->•<placeholder>
 *    Goto on <stylesheet_charset> to 5 because of <stylesheet_1>->•<stylesheet_charset><s_cdo_cdc_plus>
 *    Goto on <s_cdo_cdc_plus> to 6 because of <stylesheet_1>->•<s_cdo_cdc_plus>
 *    Goto on <stylesheet_import> to 7 because of <stylesheet_2>->•<stylesheet_import><stylesheet_ruleset_media_page>
 *    Goto on <stylesheet_ruleset_media_page> to 8 because of <stylesheet_2>->•<stylesheet_ruleset_media_page>
 *    Shift on <COMMENT> to 9 because of <placeholder>->•<COMMENT> 
 *    Goto on <charset_sym_sstar> to 10 because of <stylesheet_charset>->•<charset_sym_sstar><string_sstar><SEMICOLON>
 *    Goto on <s_cdo_cdc> to 11 because of <s_cdo_cdc_plus>->•<s_cdo_cdc>
 *    Goto on <s_cdo_cdc_plus> to 6 because of <s_cdo_cdc_plus>->•<s_cdo_cdc_plus><s_cdo_cdc>
 *    Goto on <import> to 12 because of <stylesheet_import>->•<import><s_cdo_cdc_plus>
 *    Goto on <import> to 12 because of <stylesheet_import>->•<import>
 *    Goto on <stylesheet_import> to 7 because of <stylesheet_import>->•<stylesheet_import><import><s_cdo_cdc_plus>
 *    Goto on <stylesheet_import> to 7 because of <stylesheet_import>->•<stylesheet_import><import>
 *    Goto on <ruleset> to 13 because of <stylesheet_ruleset_media_page>->•<ruleset>
 *    Goto on <media> to 14 because of <stylesheet_ruleset_media_page>->•<media>
 *    Goto on <page> to 15 because of <stylesheet_ruleset_media_page>->•<page>
 *    Goto on <stylesheet_ruleset_media_page> to 8 because of <stylesheet_ruleset_media_page>->•<stylesheet_ruleset_media_page><ruleset>
 *    Goto on <stylesheet_ruleset_media_page> to 8 because of <stylesheet_ruleset_media_page>->•<stylesheet_ruleset_media_page><media>
 *    Goto on <stylesheet_ruleset_media_page> to 8 because of <stylesheet_ruleset_media_page>->•<stylesheet_ruleset_media_page><page>
 *    Shift on <CHARSET_SYM> to 16 because of <charset_sym_sstar>->•<CHARSET_SYM> 
 *    Shift on <CHARSET_SYM> to 16 because of <charset_sym_sstar>->•<CHARSET_SYM><splus> 
 *    Shift on <SS> to 17 because of <s_cdo_cdc>->•<SS> 
 *    Shift on <CDO> to 18 because of <s_cdo_cdc>->•<CDO> 
 *    Shift on <CDC> to 19 because of <s_cdo_cdc>->•<CDC> 
 *    Goto on <import_sym_sstar> to 20 because of <import>->•<import_sym_sstar><string_or_uri_sstar><SEMICOLON>
 *    Goto on <import_sym_sstar> to 20 because of <import>->•<import_sym_sstar><string_or_uri_sstar><medialist><SEMICOLON>
 *    Goto on <rruleset> to 21 because of <ruleset>->•<rruleset>
 *    Goto on <media_sym_sstar> to 22 because of <media>->•<media_sym_sstar><medialist><LBRACE><splus><rulesetplus><RBRACE>
 *    Goto on <media_sym_sstar> to 22 because of <media>->•<media_sym_sstar><medialist><LBRACE><splus><rulesetplus><RBRACE><splus>
 *    Goto on <media_sym_sstar> to 22 because of <media>->•<media_sym_sstar><medialist><LBRACE><rulesetplus><RBRACE>
 *    Goto on <media_sym_sstar> to 22 because of <media>->•<media_sym_sstar><medialist><LBRACE><rulesetplus><RBRACE><splus>
 *    Goto on <media_sym_sstar> to 22 because of <media>->•<media_sym_sstar><medialist><LBRACE><splus><RBRACE>
 *    Goto on <media_sym_sstar> to 22 because of <media>->•<media_sym_sstar><medialist><LBRACE><splus><RBRACE><splus>
 *    Goto on <media_sym_sstar> to 22 because of <media>->•<media_sym_sstar><medialist><LBRACE><RBRACE>
 *    Goto on <media_sym_sstar> to 22 because of <media>->•<media_sym_sstar><medialist><LBRACE><RBRACE><splus>
 *    Goto on <ppage> to 23 because of <page>->•<ppage>
 *    Shift on <IMPORT_SYM> to 24 because of <import_sym_sstar>->•<IMPORT_SYM> 
 *    Shift on <IMPORT_SYM> to 24 because of <import_sym_sstar>->•<IMPORT_SYM><splus> 
 *    Goto on <selectors> to 25 because of <rruleset>->•<selectors><LBRACE><declarations_optional_semicolon><RBRACE><splus>
 *    Goto on <selectors> to 25 because of <rruleset>->•<selectors><LBRACE><declarations_optional_semicolon><RBRACE>
 *    Goto on <selectors> to 25 because of <rruleset>->•<selectors><LBRACE><RBRACE>
 *    Goto on <selectors> to 25 because of <rruleset>->•<selectors><LBRACE><splus><RBRACE>
 *    Goto on <selectors> to 25 because of <rruleset>->•<selectors><LBRACE><RBRACE><splus>
 *    Goto on <selectors> to 25 because of <rruleset>->•<selectors><LBRACE><splus><RBRACE><splus>
 *    Shift on <MEDIA_SYM> to 26 because of <media_sym_sstar>->•<MEDIA_SYM> 
 *    Shift on <MEDIA_SYM> to 26 because of <media_sym_sstar>->•<MEDIA_SYM><splus> 
 *    Goto on <pagesym_sstar> to 27 because of <ppage>->•<pagesym_sstar><pseudo_page><splus><LBRACE><declarations_optional_semicolon><RBRACE>
 *    Goto on <pagesym_sstar> to 27 because of <ppage>->•<pagesym_sstar><pseudo_page><splus><LBRACE><declarations_optional_semicolon><RBRACE><splus>
 *    Goto on <pagesym_sstar> to 27 because of <ppage>->•<pagesym_sstar><pseudo_page><LBRACE><declarations_optional_semicolon><RBRACE>
 *    Goto on <pagesym_sstar> to 27 because of <ppage>->•<pagesym_sstar><pseudo_page><LBRACE><declarations_optional_semicolon><RBRACE><splus>
 *    Goto on <pagesym_sstar> to 27 because of <ppage>->•<pagesym_sstar><LBRACE><declarations_optional_semicolon><RBRACE>
 *    Goto on <pagesym_sstar> to 27 because of <ppage>->•<pagesym_sstar><LBRACE><declarations_optional_semicolon><RBRACE><splus>
 *    Goto on <selector> to 28 because of <selectors>->•<selector>
 *    Goto on <selectors> to 25 because of <selectors>->•<selectors><comma_sstar><selector>
 *    Shift on <PAGE_SYM> to 29 because of <pagesym_sstar>->•<PAGE_SYM> 
 *    Shift on <PAGE_SYM> to 29 because of <pagesym_sstar>->•<PAGE_SYM><splus> 
 *    Goto on <simple_selector> to 30 because of <selector>->•<simple_selector>
 *    Goto on <simple_selector> to 30 because of <selector>->•<simple_selector><combinator><selector>
 *    Goto on <element_name> to 31 because of <simple_selector>->•<element_name>
 *    Goto on <element_name> to 31 because of <simple_selector>->•<element_name><hash_class_attrib_pseudo_plus>
 *    Goto on <hash_class_attrib_pseudo_plus> to 32 because of <simple_selector>->•<hash_class_attrib_pseudo_plus>
 *    Shift on <IDENT> to 33 because of <element_name>->•<IDENT> 
 *    Shift on <STAR> to 34 because of <element_name>->•<STAR> 
 *    Goto on <hash_class_attrib_pseudo> to 35 because of <hash_class_attrib_pseudo_plus>->•<hash_class_attrib_pseudo>
 *    Goto on <hash_class_attrib_pseudo_plus> to 32 because of <hash_class_attrib_pseudo_plus>->•<hash_class_attrib_pseudo_plus><hash_class_attrib_pseudo>
 *    Shift on <HASH> to 36 because of <hash_class_attrib_pseudo>->•<HASH> 
 *    Goto on <class> to 37 because of <hash_class_attrib_pseudo>->•<class>
 *    Goto on <attrib> to 38 because of <hash_class_attrib_pseudo>->•<attrib>
 *    Goto on <pseudo> to 39 because of <hash_class_attrib_pseudo>->•<pseudo>
 *    Shift on <DOT> to 40 because of <class>->•<DOT><IDENT> 
 *    Shift on <LBRACKET> to 41 because of <attrib>->•<LBRACKET><trimmed_ident><RBRACKET> 
 *    Shift on <LBRACKET> to 41 because of <attrib>->•<LBRACKET><trimmed_ident><attrib_operator_sstar><attrib_operator_rhand_sstar><RBRACKET> 
 *    Shift on <LBRACKET> to 41 because of <attrib>->•<LBRACKET><trimmed_ident><attrib_operator_sstar><RBRACKET> 
 *    Shift on <COLON> to 42 because of <pseudo>->•<COLON><IDENT> 
 *    Shift on <COLON> to 42 because of <pseudo>->•<COLON><CSSFUNCTION><trimmed_ident><RPAREN> 
 *    Shift on <COLON> to 42 because of <pseudo>->•<COLON><CSSFUNCTION><splus><RPAREN> 
 *    Shift on <COLON> to 42 because of <pseudo>->•<COLON><CSSFUNCTION><RPAREN> 
 * ----------- 1 -----------
 *   --Itemset--
 *     <start>-><stylesheet>•
 *   --Transitions--
 *    Accept on  using <start>-><stylesheet>
 * ----------- 2 -----------
 *   --Itemset--
 *     <stylesheet>-><stylesheet_1>•<stylesheet_2>
 *     <stylesheet>-><stylesheet_1>•
 *    +<stylesheet_2>->•<stylesheet_import><stylesheet_ruleset_media_page>
 *    +<stylesheet_2>->•<stylesheet_ruleset_media_page>
 *    +<stylesheet_import>->•<import><s_cdo_cdc_plus>
 *    +<stylesheet_import>->•<import>
 *    +<stylesheet_import>->•<stylesheet_import><import><s_cdo_cdc_plus>
 *    +<stylesheet_import>->•<stylesheet_import><import>
 *    +<stylesheet_ruleset_media_page>->•<ruleset>
 *    +<stylesheet_ruleset_media_page>->•<media>
 *    +<stylesheet_ruleset_media_page>->•<page>
 *    +<stylesheet_ruleset_media_page>->•<stylesheet_ruleset_media_page><ruleset>
 *    +<stylesheet_ruleset_media_page>->•<stylesheet_ruleset_media_page><media>
 *    +<stylesheet_ruleset_media_page>->•<stylesheet_ruleset_media_page><page>
 *    +<import>->•<import_sym_sstar><string_or_uri_sstar><SEMICOLON>
 *    +<import>->•<import_sym_sstar><string_or_uri_sstar><medialist><SEMICOLON>
 *    +<ruleset>->•<rruleset>
 *    +<media>->•<media_sym_sstar><medialist><LBRACE><splus><rulesetplus><RBRACE>
 *    +<media>->•<media_sym_sstar><medialist><LBRACE><splus><rulesetplus><RBRACE><splus>
 *    +<media>->•<media_sym_sstar><medialist><LBRACE><rulesetplus><RBRACE>
 *    +<media>->•<media_sym_sstar><medialist><LBRACE><rulesetplus><RBRACE><splus>
 *    +<media>->•<media_sym_sstar><medialist><LBRACE><splus><RBRACE>
 *    +<media>->•<media_sym_sstar><medialist><LBRACE><splus><RBRACE><splus>
 *    +<media>->•<media_sym_sstar><medialist><LBRACE><RBRACE>
 *    +<media>->•<media_sym_sstar><medialist><LBRACE><RBRACE><splus>
 *    +<page>->•<ppage>
 *    +<import_sym_sstar>->•<IMPORT_SYM>
 *    +<import_sym_sstar>->•<IMPORT_SYM><splus>
 *    +<rruleset>->•<selectors><LBRACE><declarations_optional_semicolon><RBRACE><splus>
 *    +<rruleset>->•<selectors><LBRACE><declarations_optional_semicolon><RBRACE>
 *    +<rruleset>->•<selectors><LBRACE><RBRACE>
 *    +<rruleset>->•<selectors><LBRACE><splus><RBRACE>
 *    +<rruleset>->•<selectors><LBRACE><RBRACE><splus>
 *    +<rruleset>->•<selectors><LBRACE><splus><RBRACE><splus>
 *    +<media_sym_sstar>->•<MEDIA_SYM>
 *    +<media_sym_sstar>->•<MEDIA_SYM><splus>
 *    +<ppage>->•<pagesym_sstar><pseudo_page><splus><LBRACE><declarations_optional_semicolon><RBRACE>
 *    +<ppage>->•<pagesym_sstar><pseudo_page><splus><LBRACE><declarations_optional_semicolon><RBRACE><splus>
 *    +<ppage>->•<pagesym_sstar><pseudo_page><LBRACE><declarations_optional_semicolon><RBRACE>
 *    +<ppage>->•<pagesym_sstar><pseudo_page><LBRACE><declarations_optional_semicolon><RBRACE><splus>
 *    +<ppage>->•<pagesym_sstar><LBRACE><declarations_optional_semicolon><RBRACE>
 *    +<ppage>->•<pagesym_sstar><LBRACE><declarations_optional_semicolon><RBRACE><splus>
 *    +<selectors>->•<selector>
 *    +<selectors>->•<selectors><comma_sstar><selector>
 *    +<pagesym_sstar>->•<PAGE_SYM>
 *    +<pagesym_sstar>->•<PAGE_SYM><splus>
 *    +<selector>->•<simple_selector>
 *    +<selector>->•<simple_selector><combinator><selector>
 *    +<simple_selector>->•<element_name>
 *    +<simple_selector>->•<element_name><hash_class_attrib_pseudo_plus>
 *    +<simple_selector>->•<hash_class_attrib_pseudo_plus>
 *    +<element_name>->•<IDENT>
 *    +<element_name>->•<STAR>
 *    +<hash_class_attrib_pseudo_plus>->•<hash_class_attrib_pseudo>
 *    +<hash_class_attrib_pseudo_plus>->•<hash_class_attrib_pseudo_plus><hash_class_attrib_pseudo>
 *    +<hash_class_attrib_pseudo>->•<HASH>
 *    +<hash_class_attrib_pseudo>->•<class>
 *    +<hash_class_attrib_pseudo>->•<attrib>
 *    +<hash_class_attrib_pseudo>->•<pseudo>
 *    +<class>->•<DOT><IDENT>
 *    +<attrib>->•<LBRACKET><trimmed_ident><RBRACKET>
 *    +<attrib>->•<LBRACKET><trimmed_ident><attrib_operator_sstar><attrib_operator_rhand_sstar><RBRACKET>
 *    +<attrib>->•<LBRACKET><trimmed_ident><attrib_operator_sstar><RBRACKET>
 *    +<pseudo>->•<COLON><IDENT>
 *    +<pseudo>->•<COLON><CSSFUNCTION><trimmed_ident><RPAREN>
 *    +<pseudo>->•<COLON><CSSFUNCTION><splus><RPAREN>
 *    +<pseudo>->•<COLON><CSSFUNCTION><RPAREN>
 *   --Transitions--
 *    Goto on <stylesheet_2> to 43 because of <stylesheet>-><stylesheet_1>•<stylesheet_2>
 *    Reduce on  using <stylesheet>-><stylesheet_1> 
 *    Goto on <stylesheet_import> to 7 because of <stylesheet_2>->•<stylesheet_import><stylesheet_ruleset_media_page>
 *    Goto on <stylesheet_ruleset_media_page> to 8 because of <stylesheet_2>->•<stylesheet_ruleset_media_page>
 *    Goto on <import> to 12 because of <stylesheet_import>->•<import><s_cdo_cdc_plus>
 *    Goto on <import> to 12 because of <stylesheet_import>->•<import>
 *    Goto on <stylesheet_import> to 7 because of <stylesheet_import>->•<stylesheet_import><import><s_cdo_cdc_plus>
 *    Goto on <stylesheet_import> to 7 because of <stylesheet_import>->•<stylesheet_import><import>
 *    Goto on <ruleset> to 13 because of <stylesheet_ruleset_media_page>->•<ruleset>
 *    Goto on <media> to 14 because of <stylesheet_ruleset_media_page>->•<media>
 *    Goto on <page> to 15 because of <stylesheet_ruleset_media_page>->•<page>
 *    Goto on <stylesheet_ruleset_media_page> to 8 because of <stylesheet_ruleset_media_page>->•<stylesheet_ruleset_media_page><ruleset>
 *    Goto on <stylesheet_ruleset_media_page> to 8 because of <stylesheet_ruleset_media_page>->•<stylesheet_ruleset_media_page><media>
 *    Goto on <stylesheet_ruleset_media_page> to 8 because of <stylesheet_ruleset_media_page>->•<stylesheet_ruleset_media_page><page>
 *    Goto on <import_sym_sstar> to 20 because of <import>->•<import_sym_sstar><string_or_uri_sstar><SEMICOLON>
 *    Goto on <import_sym_sstar> to 20 because of <import>->•<import_sym_sstar><string_or_uri_sstar><medialist><SEMICOLON>
 *    Goto on <rruleset> to 21 because of <ruleset>->•<rruleset>
 *    Goto on <media_sym_sstar> to 22 because of <media>->•<media_sym_sstar><medialist><LBRACE><splus><rulesetplus><RBRACE>
 *    Goto on <media_sym_sstar> to 22 because of <media>->•<media_sym_sstar><medialist><LBRACE><splus><rulesetplus><RBRACE><splus>
 *    Goto on <media_sym_sstar> to 22 because of <media>->•<media_sym_sstar><medialist><LBRACE><rulesetplus><RBRACE>
 *    Goto on <media_sym_sstar> to 22 because of <media>->•<media_sym_sstar><medialist><LBRACE><rulesetplus><RBRACE><splus>
 *    Goto on <media_sym_sstar> to 22 because of <media>->•<media_sym_sstar><medialist><LBRACE><splus><RBRACE>
 *    Goto on <media_sym_sstar> to 22 because of <media>->•<media_sym_sstar><medialist><LBRACE><splus><RBRACE><splus>
 *    Goto on <media_sym_sstar> to 22 because of <media>->•<media_sym_sstar><medialist><LBRACE><RBRACE>
 *    Goto on <media_sym_sstar> to 22 because of <media>->•<media_sym_sstar><medialist><LBRACE><RBRACE><splus>
 *    Goto on <ppage> to 23 because of <page>->•<ppage>
 *    Shift on <IMPORT_SYM> to 24 because of <import_sym_sstar>->•<IMPORT_SYM> 
 *    Shift on <IMPORT_SYM> to 24 because of <import_sym_sstar>->•<IMPORT_SYM><splus> 
 *    Goto on <selectors> to 25 because of <rruleset>->•<selectors><LBRACE><declarations_optional_semicolon><RBRACE><splus>
 *    Goto on <selectors> to 25 because of <rruleset>->•<selectors><LBRACE><declarations_optional_semicolon><RBRACE>
 *    Goto on <selectors> to 25 because of <rruleset>->•<selectors><LBRACE><RBRACE>
 *    Goto on <selectors> to 25 because of <rruleset>->•<selectors><LBRACE><splus><RBRACE>
 *    Goto on <selectors> to 25 because of <rruleset>->•<selectors><LBRACE><RBRACE><splus>
 *    Goto on <selectors> to 25 because of <rruleset>->•<selectors><LBRACE><splus><RBRACE><splus>
 *    Shift on <MEDIA_SYM> to 26 because of <media_sym_sstar>->•<MEDIA_SYM> 
 *    Shift on <MEDIA_SYM> to 26 because of <media_sym_sstar>->•<MEDIA_SYM><splus> 
 *    Goto on <pagesym_sstar> to 27 because of <ppage>->•<pagesym_sstar><pseudo_page><splus><LBRACE><declarations_optional_semicolon><RBRACE>
 *    Goto on <pagesym_sstar> to 27 because of <ppage>->•<pagesym_sstar><pseudo_page><splus><LBRACE><declarations_optional_semicolon><RBRACE><splus>
 *    Goto on <pagesym_sstar> to 27 because of <ppage>->•<pagesym_sstar><pseudo_page><LBRACE><declarations_optional_semicolon><RBRACE>
 *    Goto on <pagesym_sstar> to 27 because of <ppage>->•<pagesym_sstar><pseudo_page><LBRACE><declarations_optional_semicolon><RBRACE><splus>
 *    Goto on <pagesym_sstar> to 27 because of <ppage>->•<pagesym_sstar><LBRACE><declarations_optional_semicolon><RBRACE>
 *    Goto on <pagesym_sstar> to 27 because of <ppage>->•<pagesym_sstar><LBRACE><declarations_optional_semicolon><RBRACE><splus>
 *    Goto on <selector> to 28 because of <selectors>->•<selector>
 *    Goto on <selectors> to 25 because of <selectors>->•<selectors><comma_sstar><selector>
 *    Shift on <PAGE_SYM> to 29 because of <pagesym_sstar>->•<PAGE_SYM> 
 *    Shift on <PAGE_SYM> to 29 because of <pagesym_sstar>->•<PAGE_SYM><splus> 
 *    Goto on <simple_selector> to 30 because of <selector>->•<simple_selector>
 *    Goto on <simple_selector> to 30 because of <selector>->•<simple_selector><combinator><selector>
 *    Goto on <element_name> to 31 because of <simple_selector>->•<element_name>
 *    Goto on <element_name> to 31 because of <simple_selector>->•<element_name><hash_class_attrib_pseudo_plus>
 *    Goto on <hash_class_attrib_pseudo_plus> to 32 because of <simple_selector>->•<hash_class_attrib_pseudo_plus>
 *    Shift on <IDENT> to 33 because of <element_name>->•<IDENT> 
 *    Shift on <STAR> to 34 because of <element_name>->•<STAR> 
 *    Goto on <hash_class_attrib_pseudo> to 35 because of <hash_class_attrib_pseudo_plus>->•<hash_class_attrib_pseudo>
 *    Goto on <hash_class_attrib_pseudo_plus> to 32 because of <hash_class_attrib_pseudo_plus>->•<hash_class_attrib_pseudo_plus><hash_class_attrib_pseudo>
 *    Shift on <HASH> to 36 because of <hash_class_attrib_pseudo>->•<HASH> 
 *    Goto on <class> to 37 because of <hash_class_attrib_pseudo>->•<class>
 *    Goto on <attrib> to 38 because of <hash_class_attrib_pseudo>->•<attrib>
 *    Goto on <pseudo> to 39 because of <hash_class_attrib_pseudo>->•<pseudo>
 *    Shift on <DOT> to 40 because of <class>->•<DOT><IDENT> 
 *    Shift on <LBRACKET> to 41 because of <attrib>->•<LBRACKET><trimmed_ident><RBRACKET> 
 *    Shift on <LBRACKET> to 41 because of <attrib>->•<LBRACKET><trimmed_ident><attrib_operator_sstar><attrib_operator_rhand_sstar><RBRACKET> 
 *    Shift on <LBRACKET> to 41 because of <attrib>->•<LBRACKET><trimmed_ident><attrib_operator_sstar><RBRACKET> 
 *    Shift on <COLON> to 42 because of <pseudo>->•<COLON><IDENT> 
 *    Shift on <COLON> to 42 because of <pseudo>->•<COLON><CSSFUNCTION><trimmed_ident><RPAREN> 
 *    Shift on <COLON> to 42 because of <pseudo>->•<COLON><CSSFUNCTION><splus><RPAREN> 
 *    Shift on <COLON> to 42 because of <pseudo>->•<COLON><CSSFUNCTION><RPAREN> 
 * ----------- 3 -----------
 *   --Itemset--
 *     <stylesheet>-><stylesheet_2>•
 *   --Transitions--
 *    Reduce on  using <stylesheet>-><stylesheet_2> 
 * ----------- 4 -----------
 *   --Itemset--
 *     <stylesheet>-><placeholder>•
 *   --Transitions--
 *    Reduce on  using <stylesheet>-><placeholder> 
 * ----------- 5 -----------
 *   --Itemset--
 *     <stylesheet_1>-><stylesheet_charset>•<s_cdo_cdc_plus>
 *    +<s_cdo_cdc_plus>->•<s_cdo_cdc>
 *    +<s_cdo_cdc_plus>->•<s_cdo_cdc_plus><s_cdo_cdc>
 *    +<s_cdo_cdc>->•<SS>
 *    +<s_cdo_cdc>->•<CDO>
 *    +<s_cdo_cdc>->•<CDC>
 *   --Transitions--
 *    Goto on <s_cdo_cdc_plus> to 44 because of <stylesheet_1>-><stylesheet_charset>•<s_cdo_cdc_plus>
 *    Goto on <s_cdo_cdc> to 11 because of <s_cdo_cdc_plus>->•<s_cdo_cdc>
 *    Goto on <s_cdo_cdc_plus> to 44 because of <s_cdo_cdc_plus>->•<s_cdo_cdc_plus><s_cdo_cdc>
 *    Shift on <SS> to 17 because of <s_cdo_cdc>->•<SS> 
 *    Shift on <CDO> to 18 because of <s_cdo_cdc>->•<CDO> 
 *    Shift on <CDC> to 19 because of <s_cdo_cdc>->•<CDC> 
 * ----------- 6 -----------
 *   --Itemset--
 *     <stylesheet_1>-><s_cdo_cdc_plus>•
 *     <s_cdo_cdc_plus>-><s_cdo_cdc_plus>•<s_cdo_cdc>
 *    +<s_cdo_cdc>->•<SS>
 *    +<s_cdo_cdc>->•<CDO>
 *    +<s_cdo_cdc>->•<CDC>
 *   --Transitions--
 *    Reduce on <IMPORT_SYM> using <stylesheet_1>-><s_cdo_cdc_plus> 
 *    Reduce on <MEDIA_SYM> using <stylesheet_1>-><s_cdo_cdc_plus> 
 *    Reduce on <IDENT> using <stylesheet_1>-><s_cdo_cdc_plus> 
 *    Reduce on <PAGE_SYM> using <stylesheet_1>-><s_cdo_cdc_plus> 
 *    Reduce on <COLON> using <stylesheet_1>-><s_cdo_cdc_plus> 
 *    Reduce on <HASH> using <stylesheet_1>-><s_cdo_cdc_plus> 
 *    Reduce on <DOT> using <stylesheet_1>-><s_cdo_cdc_plus> 
 *    Reduce on <STAR> using <stylesheet_1>-><s_cdo_cdc_plus> 
 *    Reduce on <LBRACKET> using <stylesheet_1>-><s_cdo_cdc_plus> 
 *    Reduce on  using <stylesheet_1>-><s_cdo_cdc_plus> 
 *    Goto on <s_cdo_cdc> to 45 because of <s_cdo_cdc_plus>-><s_cdo_cdc_plus>•<s_cdo_cdc>
 *    Shift on <SS> to 17 because of <s_cdo_cdc>->•<SS> 
 *    Shift on <CDO> to 18 because of <s_cdo_cdc>->•<CDO> 
 *    Shift on <CDC> to 19 because of <s_cdo_cdc>->•<CDC> 
 * ----------- 7 -----------
 *   --Itemset--
 *     <stylesheet_2>-><stylesheet_import>•<stylesheet_ruleset_media_page>
 *     <stylesheet_import>-><stylesheet_import>•<import><s_cdo_cdc_plus>
 *     <stylesheet_import>-><stylesheet_import>•<import>
 *    +<stylesheet_ruleset_media_page>->•<ruleset>
 *    +<stylesheet_ruleset_media_page>->•<media>
 *    +<stylesheet_ruleset_media_page>->•<page>
 *    +<stylesheet_ruleset_media_page>->•<stylesheet_ruleset_media_page><ruleset>
 *    +<stylesheet_ruleset_media_page>->•<stylesheet_ruleset_media_page><media>
 *    +<stylesheet_ruleset_media_page>->•<stylesheet_ruleset_media_page><page>
 *    +<import>->•<import_sym_sstar><string_or_uri_sstar><SEMICOLON>
 *    +<import>->•<import_sym_sstar><string_or_uri_sstar><medialist><SEMICOLON>
 *    +<ruleset>->•<rruleset>
 *    +<media>->•<media_sym_sstar><medialist><LBRACE><splus><rulesetplus><RBRACE>
 *    +<media>->•<media_sym_sstar><medialist><LBRACE><splus><rulesetplus><RBRACE><splus>
 *    +<media>->•<media_sym_sstar><medialist><LBRACE><rulesetplus><RBRACE>
 *    +<media>->•<media_sym_sstar><medialist><LBRACE><rulesetplus><RBRACE><splus>
 *    +<media>->•<media_sym_sstar><medialist><LBRACE><splus><RBRACE>
 *    +<media>->•<media_sym_sstar><medialist><LBRACE><splus><RBRACE><splus>
 *    +<media>->•<media_sym_sstar><medialist><LBRACE><RBRACE>
 *    +<media>->•<media_sym_sstar><medialist><LBRACE><RBRACE><splus>
 *    +<page>->•<ppage>
 *    +<import_sym_sstar>->•<IMPORT_SYM>
 *    +<import_sym_sstar>->•<IMPORT_SYM><splus>
 *    +<rruleset>->•<selectors><LBRACE><declarations_optional_semicolon><RBRACE><splus>
 *    +<rruleset>->•<selectors><LBRACE><declarations_optional_semicolon><RBRACE>
 *    +<rruleset>->•<selectors><LBRACE><RBRACE>
 *    +<rruleset>->•<selectors><LBRACE><splus><RBRACE>
 *    +<rruleset>->•<selectors><LBRACE><RBRACE><splus>
 *    +<rruleset>->•<selectors><LBRACE><splus><RBRACE><splus>
 *    +<media_sym_sstar>->•<MEDIA_SYM>
 *    +<media_sym_sstar>->•<MEDIA_SYM><splus>
 *    +<ppage>->•<pagesym_sstar><pseudo_page><splus><LBRACE><declarations_optional_semicolon><RBRACE>
 *    +<ppage>->•<pagesym_sstar><pseudo_page><splus><LBRACE><declarations_optional_semicolon><RBRACE><splus>
 *    +<ppage>->•<pagesym_sstar><pseudo_page><LBRACE><declarations_optional_semicolon><RBRACE>
 *    +<ppage>->•<pagesym_sstar><pseudo_page><LBRACE><declarations_optional_semicolon><RBRACE><splus>
 *    +<ppage>->•<pagesym_sstar><LBRACE><declarations_optional_semicolon><RBRACE>
 *    +<ppage>->•<pagesym_sstar><LBRACE><declarations_optional_semicolon><RBRACE><splus>
 *    +<selectors>->•<selector>
 *    +<selectors>->•<selectors><comma_sstar><selector>
 *    +<pagesym_sstar>->•<PAGE_SYM>
 *    +<pagesym_sstar>->•<PAGE_SYM><splus>
 *    +<selector>->•<simple_selector>
 *    +<selector>->•<simple_selector><combinator><selector>
 *    +<simple_selector>->•<element_name>
 *    +<simple_selector>->•<element_name><hash_class_attrib_pseudo_plus>
 *    +<simple_selector>->•<hash_class_attrib_pseudo_plus>
 *    +<element_name>->•<IDENT>
 *    +<element_name>->•<STAR>
 *    +<hash_class_attrib_pseudo_plus>->•<hash_class_attrib_pseudo>
 *    +<hash_class_attrib_pseudo_plus>->•<hash_class_attrib_pseudo_plus><hash_class_attrib_pseudo>
 *    +<hash_class_attrib_pseudo>->•<HASH>
 *    +<hash_class_attrib_pseudo>->•<class>
 *    +<hash_class_attrib_pseudo>->•<attrib>
 *    +<hash_class_attrib_pseudo>->•<pseudo>
 *    +<class>->•<DOT><IDENT>
 *    +<attrib>->•<LBRACKET><trimmed_ident><RBRACKET>
 *    +<attrib>->•<LBRACKET><trimmed_ident><attrib_operator_sstar><attrib_operator_rhand_sstar><RBRACKET>
 *    +<attrib>->•<LBRACKET><trimmed_ident><attrib_operator_sstar><RBRACKET>
 *    +<pseudo>->•<COLON><IDENT>
 *    +<pseudo>->•<COLON><CSSFUNCTION><trimmed_ident><RPAREN>
 *    +<pseudo>->•<COLON><CSSFUNCTION><splus><RPAREN>
 *    +<pseudo>->•<COLON><CSSFUNCTION><RPAREN>
 *   --Transitions--
 *    Goto on <stylesheet_ruleset_media_page> to 46 because of <stylesheet_2>-><stylesheet_import>•<stylesheet_ruleset_media_page>
 *    Goto on <import> to 47 because of <stylesheet_import>-><stylesheet_import>•<import><s_cdo_cdc_plus>
 *    Goto on <import> to 47 because of <stylesheet_import>-><stylesheet_import>•<import>
 *    Goto on <ruleset> to 13 because of <stylesheet_ruleset_media_page>->•<ruleset>
 *    Goto on <media> to 14 because of <stylesheet_ruleset_media_page>->•<media>
 *    Goto on <page> to 15 because of <stylesheet_ruleset_media_page>->•<page>
 *    Goto on <stylesheet_ruleset_media_page> to 46 because of <stylesheet_ruleset_media_page>->•<stylesheet_ruleset_media_page><ruleset>
 *    Goto on <stylesheet_ruleset_media_page> to 46 because of <stylesheet_ruleset_media_page>->•<stylesheet_ruleset_media_page><media>
 *    Goto on <stylesheet_ruleset_media_page> to 46 because of <stylesheet_ruleset_media_page>->•<stylesheet_ruleset_media_page><page>
 *    Goto on <import_sym_sstar> to 20 because of <import>->•<import_sym_sstar><string_or_uri_sstar><SEMICOLON>
 *    Goto on <import_sym_sstar> to 20 because of <import>->•<import_sym_sstar><string_or_uri_sstar><medialist><SEMICOLON>
 *    Goto on <rruleset> to 21 because of <ruleset>->•<rruleset>
 *    Goto on <media_sym_sstar> to 22 because of <media>->•<media_sym_sstar><medialist><LBRACE><splus><rulesetplus><RBRACE>
 *    Goto on <media_sym_sstar> to 22 because of <media>->•<media_sym_sstar><medialist><LBRACE><splus><rulesetplus><RBRACE><splus>
 *    Goto on <media_sym_sstar> to 22 because of <media>->•<media_sym_sstar><medialist><LBRACE><rulesetplus><RBRACE>
 *    Goto on <media_sym_sstar> to 22 because of <media>->•<media_sym_sstar><medialist><LBRACE><rulesetplus><RBRACE><splus>
 *    Goto on <media_sym_sstar> to 22 because of <media>->•<media_sym_sstar><medialist><LBRACE><splus><RBRACE>
 *    Goto on <media_sym_sstar> to 22 because of <media>->•<media_sym_sstar><medialist><LBRACE><splus><RBRACE><splus>
 *    Goto on <media_sym_sstar> to 22 because of <media>->•<media_sym_sstar><medialist><LBRACE><RBRACE>
 *    Goto on <media_sym_sstar> to 22 because of <media>->•<media_sym_sstar><medialist><LBRACE><RBRACE><splus>
 *    Goto on <ppage> to 23 because of <page>->•<ppage>
 *    Shift on <IMPORT_SYM> to 24 because of <import_sym_sstar>->•<IMPORT_SYM> 
 *    Shift on <IMPORT_SYM> to 24 because of <import_sym_sstar>->•<IMPORT_SYM><splus> 
 *    Goto on <selectors> to 25 because of <rruleset>->•<selectors><LBRACE><declarations_optional_semicolon><RBRACE><splus>
 *    Goto on <selectors> to 25 because of <rruleset>->•<selectors><LBRACE><declarations_optional_semicolon><RBRACE>
 *    Goto on <selectors> to 25 because of <rruleset>->•<selectors><LBRACE><RBRACE>
 *    Goto on <selectors> to 25 because of <rruleset>->•<selectors><LBRACE><splus><RBRACE>
 *    Goto on <selectors> to 25 because of <rruleset>->•<selectors><LBRACE><RBRACE><splus>
 *    Goto on <selectors> to 25 because of <rruleset>->•<selectors><LBRACE><splus><RBRACE><splus>
 *    Shift on <MEDIA_SYM> to 26 because of <media_sym_sstar>->•<MEDIA_SYM> 
 *    Shift on <MEDIA_SYM> to 26 because of <media_sym_sstar>->•<MEDIA_SYM><splus> 
 *    Goto on <pagesym_sstar> to 27 because of <ppage>->•<pagesym_sstar><pseudo_page><splus><LBRACE><declarations_optional_semicolon><RBRACE>
 *    Goto on <pagesym_sstar> to 27 because of <ppage>->•<pagesym_sstar><pseudo_page><splus><LBRACE><declarations_optional_semicolon><RBRACE><splus>
 *    Goto on <pagesym_sstar> to 27 because of <ppage>->•<pagesym_sstar><pseudo_page><LBRACE><declarations_optional_semicolon><RBRACE>
 *    Goto on <pagesym_sstar> to 27 because of <ppage>->•<pagesym_sstar><pseudo_page><LBRACE><declarations_optional_semicolon><RBRACE><splus>
 *    Goto on <pagesym_sstar> to 27 because of <ppage>->•<pagesym_sstar><LBRACE><declarations_optional_semicolon><RBRACE>
 *    Goto on <pagesym_sstar> to 27 because of <ppage>->•<pagesym_sstar><LBRACE><declarations_optional_semicolon><RBRACE><splus>
 *    Goto on <selector> to 28 because of <selectors>->•<selector>
 *    Goto on <selectors> to 25 because of <selectors>->•<selectors><comma_sstar><selector>
 *    Shift on <PAGE_SYM> to 29 because of <pagesym_sstar>->•<PAGE_SYM> 
 *    Shift on <PAGE_SYM> to 29 because of <pagesym_sstar>->•<PAGE_SYM><splus> 
 *    Goto on <simple_selector> to 30 because of <selector>->•<simple_selector>
 *    Goto on <simple_selector> to 30 because of <selector>->•<simple_selector><combinator><selector>
 *    Goto on <element_name> to 31 because of <simple_selector>->•<element_name>
 *    Goto on <element_name> to 31 because of <simple_selector>->•<element_name><hash_class_attrib_pseudo_plus>
 *    Goto on <hash_class_attrib_pseudo_plus> to 32 because of <simple_selector>->•<hash_class_attrib_pseudo_plus>
 *    Shift on <IDENT> to 33 because of <element_name>->•<IDENT> 
 *    Shift on <STAR> to 34 because of <element_name>->•<STAR> 
 *    Goto on <hash_class_attrib_pseudo> to 35 because of <hash_class_attrib_pseudo_plus>->•<hash_class_attrib_pseudo>
 *    Goto on <hash_class_attrib_pseudo_plus> to 32 because of <hash_class_attrib_pseudo_plus>->•<hash_class_attrib_pseudo_plus><hash_class_attrib_pseudo>
 *    Shift on <HASH> to 36 because of <hash_class_attrib_pseudo>->•<HASH> 
 *    Goto on <class> to 37 because of <hash_class_attrib_pseudo>->•<class>
 *    Goto on <attrib> to 38 because of <hash_class_attrib_pseudo>->•<attrib>
 *    Goto on <pseudo> to 39 because of <hash_class_attrib_pseudo>->•<pseudo>
 *    Shift on <DOT> to 40 because of <class>->•<DOT><IDENT> 
 *    Shift on <LBRACKET> to 41 because of <attrib>->•<LBRACKET><trimmed_ident><RBRACKET> 
 *    Shift on <LBRACKET> to 41 because of <attrib>->•<LBRACKET><trimmed_ident><attrib_operator_sstar><attrib_operator_rhand_sstar><RBRACKET> 
 *    Shift on <LBRACKET> to 41 because of <attrib>->•<LBRACKET><trimmed_ident><attrib_operator_sstar><RBRACKET> 
 *    Shift on <COLON> to 42 because of <pseudo>->•<COLON><IDENT> 
 *    Shift on <COLON> to 42 because of <pseudo>->•<COLON><CSSFUNCTION><trimmed_ident><RPAREN> 
 *    Shift on <COLON> to 42 because of <pseudo>->•<COLON><CSSFUNCTION><splus><RPAREN> 
 *    Shift on <COLON> to 42 because of <pseudo>->•<COLON><CSSFUNCTION><RPAREN> 
 * ----------- 8 -----------
 *   --Itemset--
 *     <stylesheet_2>-><stylesheet_ruleset_media_page>•
 *     <stylesheet_ruleset_media_page>-><stylesheet_ruleset_media_page>•<ruleset>
 *     <stylesheet_ruleset_media_page>-><stylesheet_ruleset_media_page>•<media>
 *     <stylesheet_ruleset_media_page>-><stylesheet_ruleset_media_page>•<page>
 *    +<ruleset>->•<rruleset>
 *    +<media>->•<media_sym_sstar><medialist><LBRACE><splus><rulesetplus><RBRACE>
 *    +<media>->•<media_sym_sstar><medialist><LBRACE><splus><rulesetplus><RBRACE><splus>
 *    +<media>->•<media_sym_sstar><medialist><LBRACE><rulesetplus><RBRACE>
 *    +<media>->•<media_sym_sstar><medialist><LBRACE><rulesetplus><RBRACE><splus>
 *    +<media>->•<media_sym_sstar><medialist><LBRACE><splus><RBRACE>
 *    +<media>->•<media_sym_sstar><medialist><LBRACE><splus><RBRACE><splus>
 *    +<media>->•<media_sym_sstar><medialist><LBRACE><RBRACE>
 *    +<media>->•<media_sym_sstar><medialist><LBRACE><RBRACE><splus>
 *    +<page>->•<ppage>
 *    +<rruleset>->•<selectors><LBRACE><declarations_optional_semicolon><RBRACE><splus>
 *    +<rruleset>->•<selectors><LBRACE><declarations_optional_semicolon><RBRACE>
 *    +<rruleset>->•<selectors><LBRACE><RBRACE>
 *    +<rruleset>->•<selectors><LBRACE><splus><RBRACE>
 *    +<rruleset>->•<selectors><LBRACE><RBRACE><splus>
 *    +<rruleset>->•<selectors><LBRACE><splus><RBRACE><splus>
 *    +<media_sym_sstar>->•<MEDIA_SYM>
 *    +<media_sym_sstar>->•<MEDIA_SYM><splus>
 *    +<ppage>->•<pagesym_sstar><pseudo_page><splus><LBRACE><declarations_optional_semicolon><RBRACE>
 *    +<ppage>->•<pagesym_sstar><pseudo_page><splus><LBRACE><declarations_optional_semicolon><RBRACE><splus>
 *    +<ppage>->•<pagesym_sstar><pseudo_page><LBRACE><declarations_optional_semicolon><RBRACE>
 *    +<ppage>->•<pagesym_sstar><pseudo_page><LBRACE><declarations_optional_semicolon><RBRACE><splus>
 *    +<ppage>->•<pagesym_sstar><LBRACE><declarations_optional_semicolon><RBRACE>
 *    +<ppage>->•<pagesym_sstar><LBRACE><declarations_optional_semicolon><RBRACE><splus>
 *    +<selectors>->•<selector>
 *    +<selectors>->•<selectors><comma_sstar><selector>
 *    +<pagesym_sstar>->•<PAGE_SYM>
 *    +<pagesym_sstar>->•<PAGE_SYM><splus>
 *    +<selector>->•<simple_selector>
 *    +<selector>->•<simple_selector><combinator><selector>
 *    +<simple_selector>->•<element_name>
 *    +<simple_selector>->•<element_name><hash_class_attrib_pseudo_plus>
 *    +<simple_selector>->•<hash_class_attrib_pseudo_plus>
 *    +<element_name>->•<IDENT>
 *    +<element_name>->•<STAR>
 *    +<hash_class_attrib_pseudo_plus>->•<hash_class_attrib_pseudo>
 *    +<hash_class_attrib_pseudo_plus>->•<hash_class_attrib_pseudo_plus><hash_class_attrib_pseudo>
 *    +<hash_class_attrib_pseudo>->•<HASH>
 *    +<hash_class_attrib_pseudo>->•<class>
 *    +<hash_class_attrib_pseudo>->•<attrib>
 *    +<hash_class_attrib_pseudo>->•<pseudo>
 *    +<class>->•<DOT><IDENT>
 *    +<attrib>->•<LBRACKET><trimmed_ident><RBRACKET>
 *    +<attrib>->•<LBRACKET><trimmed_ident><attrib_operator_sstar><attrib_operator_rhand_sstar><RBRACKET>
 *    +<attrib>->•<LBRACKET><trimmed_ident><attrib_operator_sstar><RBRACKET>
 *    +<pseudo>->•<COLON><IDENT>
 *    +<pseudo>->•<COLON><CSSFUNCTION><trimmed_ident><RPAREN>
 *    +<pseudo>->•<COLON><CSSFUNCTION><splus><RPAREN>
 *    +<pseudo>->•<COLON><CSSFUNCTION><RPAREN>
 *   --Transitions--
 *    Reduce on  using <stylesheet_2>-><stylesheet_ruleset_media_page> 
 *    Goto on <ruleset> to 48 because of <stylesheet_ruleset_media_page>-><stylesheet_ruleset_media_page>•<ruleset>
 *    Goto on <media> to 49 because of <stylesheet_ruleset_media_page>-><stylesheet_ruleset_media_page>•<media>
 *    Goto on <page> to 50 because of <stylesheet_ruleset_media_page>-><stylesheet_ruleset_media_page>•<page>
 *    Goto on <rruleset> to 21 because of <ruleset>->•<rruleset>
 *    Goto on <media_sym_sstar> to 22 because of <media>->•<media_sym_sstar><medialist><LBRACE><splus><rulesetplus><RBRACE>
 *    Goto on <media_sym_sstar> to 22 because of <media>->•<media_sym_sstar><medialist><LBRACE><splus><rulesetplus><RBRACE><splus>
 *    Goto on <media_sym_sstar> to 22 because of <media>->•<media_sym_sstar><medialist><LBRACE><rulesetplus><RBRACE>
 *    Goto on <media_sym_sstar> to 22 because of <media>->•<media_sym_sstar><medialist><LBRACE><rulesetplus><RBRACE><splus>
 *    Goto on <media_sym_sstar> to 22 because of <media>->•<media_sym_sstar><medialist><LBRACE><splus><RBRACE>
 *    Goto on <media_sym_sstar> to 22 because of <media>->•<media_sym_sstar><medialist><LBRACE><splus><RBRACE><splus>
 *    Goto on <media_sym_sstar> to 22 because of <media>->•<media_sym_sstar><medialist><LBRACE><RBRACE>
 *    Goto on <media_sym_sstar> to 22 because of <media>->•<media_sym_sstar><medialist><LBRACE><RBRACE><splus>
 *    Goto on <ppage> to 23 because of <page>->•<ppage>
 *    Goto on <selectors> to 25 because of <rruleset>->•<selectors><LBRACE><declarations_optional_semicolon><RBRACE><splus>
 *    Goto on <selectors> to 25 because of <rruleset>->•<selectors><LBRACE><declarations_optional_semicolon><RBRACE>
 *    Goto on <selectors> to 25 because of <rruleset>->•<selectors><LBRACE><RBRACE>
 *    Goto on <selectors> to 25 because of <rruleset>->•<selectors><LBRACE><splus><RBRACE>
 *    Goto on <selectors> to 25 because of <rruleset>->•<selectors><LBRACE><RBRACE><splus>
 *    Goto on <selectors> to 25 because of <rruleset>->•<selectors><LBRACE><splus><RBRACE><splus>
 *    Shift on <MEDIA_SYM> to 26 because of <media_sym_sstar>->•<MEDIA_SYM> 
 *    Shift on <MEDIA_SYM> to 26 because of <media_sym_sstar>->•<MEDIA_SYM><splus> 
 *    Goto on <pagesym_sstar> to 27 because of <ppage>->•<pagesym_sstar><pseudo_page><splus><LBRACE><declarations_optional_semicolon><RBRACE>
 *    Goto on <pagesym_sstar> to 27 because of <ppage>->•<pagesym_sstar><pseudo_page><splus><LBRACE><declarations_optional_semicolon><RBRACE><splus>
 *    Goto on <pagesym_sstar> to 27 because of <ppage>->•<pagesym_sstar><pseudo_page><LBRACE><declarations_optional_semicolon><RBRACE>
 *    Goto on <pagesym_sstar> to 27 because of <ppage>->•<pagesym_sstar><pseudo_page><LBRACE><declarations_optional_semicolon><RBRACE><splus>
 *    Goto on <pagesym_sstar> to 27 because of <ppage>->•<pagesym_sstar><LBRACE><declarations_optional_semicolon><RBRACE>
 *    Goto on <pagesym_sstar> to 27 because of <ppage>->•<pagesym_sstar><LBRACE><declarations_optional_semicolon><RBRACE><splus>
 *    Goto on <selector> to 28 because of <selectors>->•<selector>
 *    Goto on <selectors> to 25 because of <selectors>->•<selectors><comma_sstar><selector>
 *    Shift on <PAGE_SYM> to 29 because of <pagesym_sstar>->•<PAGE_SYM> 
 *    Shift on <PAGE_SYM> to 29 because of <pagesym_sstar>->•<PAGE_SYM><splus> 
 *    Goto on <simple_selector> to 30 because of <selector>->•<simple_selector>
 *    Goto on <simple_selector> to 30 because of <selector>->•<simple_selector><combinator><selector>
 *    Goto on <element_name> to 31 because of <simple_selector>->•<element_name>
 *    Goto on <element_name> to 31 because of <simple_selector>->•<element_name><hash_class_attrib_pseudo_plus>
 *    Goto on <hash_class_attrib_pseudo_plus> to 32 because of <simple_selector>->•<hash_class_attrib_pseudo_plus>
 *    Shift on <IDENT> to 33 because of <element_name>->•<IDENT> 
 *    Shift on <STAR> to 34 because of <element_name>->•<STAR> 
 *    Goto on <hash_class_attrib_pseudo> to 35 because of <hash_class_attrib_pseudo_plus>->•<hash_class_attrib_pseudo>
 *    Goto on <hash_class_attrib_pseudo_plus> to 32 because of <hash_class_attrib_pseudo_plus>->•<hash_class_attrib_pseudo_plus><hash_class_attrib_pseudo>
 *    Shift on <HASH> to 36 because of <hash_class_attrib_pseudo>->•<HASH> 
 *    Goto on <class> to 37 because of <hash_class_attrib_pseudo>->•<class>
 *    Goto on <attrib> to 38 because of <hash_class_attrib_pseudo>->•<attrib>
 *    Goto on <pseudo> to 39 because of <hash_class_attrib_pseudo>->•<pseudo>
 *    Shift on <DOT> to 40 because of <class>->•<DOT><IDENT> 
 *    Shift on <LBRACKET> to 41 because of <attrib>->•<LBRACKET><trimmed_ident><RBRACKET> 
 *    Shift on <LBRACKET> to 41 because of <attrib>->•<LBRACKET><trimmed_ident><attrib_operator_sstar><attrib_operator_rhand_sstar><RBRACKET> 
 *    Shift on <LBRACKET> to 41 because of <attrib>->•<LBRACKET><trimmed_ident><attrib_operator_sstar><RBRACKET> 
 *    Shift on <COLON> to 42 because of <pseudo>->•<COLON><IDENT> 
 *    Shift on <COLON> to 42 because of <pseudo>->•<COLON><CSSFUNCTION><trimmed_ident><RPAREN> 
 *    Shift on <COLON> to 42 because of <pseudo>->•<COLON><CSSFUNCTION><splus><RPAREN> 
 *    Shift on <COLON> to 42 because of <pseudo>->•<COLON><CSSFUNCTION><RPAREN> 
 * ----------- 9 -----------
 *   --Itemset--
 *     <placeholder>-><COMMENT>•
 *   --Transitions--
 *    Reduce on  using <placeholder>-><COMMENT> 
 * ----------- 10 -----------
 *   --Itemset--
 *     <stylesheet_charset>-><charset_sym_sstar>•<string_sstar><SEMICOLON>
 *    +<string_sstar>->•<STRING>
 *    +<string_sstar>->•<STRING><splus>
 *   --Transitions--
 *    Goto on <string_sstar> to 51 because of <stylesheet_charset>-><charset_sym_sstar>•<string_sstar><SEMICOLON>
 *    Shift on <STRING> to 52 because of <string_sstar>->•<STRING> 
 *    Shift on <STRING> to 52 because of <string_sstar>->•<STRING><splus> 
 * ----------- 11 -----------
 *   --Itemset--
 *     <s_cdo_cdc_plus>-><s_cdo_cdc>•
 *   --Transitions--
 *    Reduce on <SS> using <s_cdo_cdc_plus>-><s_cdo_cdc> 
 *    Reduce on <CDO> using <s_cdo_cdc_plus>-><s_cdo_cdc> 
 *    Reduce on <CDC> using <s_cdo_cdc_plus>-><s_cdo_cdc> 
 *    Reduce on <IMPORT_SYM> using <s_cdo_cdc_plus>-><s_cdo_cdc> 
 *    Reduce on <MEDIA_SYM> using <s_cdo_cdc_plus>-><s_cdo_cdc> 
 *    Reduce on <IDENT> using <s_cdo_cdc_plus>-><s_cdo_cdc> 
 *    Reduce on <PAGE_SYM> using <s_cdo_cdc_plus>-><s_cdo_cdc> 
 *    Reduce on <COLON> using <s_cdo_cdc_plus>-><s_cdo_cdc> 
 *    Reduce on <HASH> using <s_cdo_cdc_plus>-><s_cdo_cdc> 
 *    Reduce on <DOT> using <s_cdo_cdc_plus>-><s_cdo_cdc> 
 *    Reduce on <STAR> using <s_cdo_cdc_plus>-><s_cdo_cdc> 
 *    Reduce on <LBRACKET> using <s_cdo_cdc_plus>-><s_cdo_cdc> 
 *    Reduce on  using <s_cdo_cdc_plus>-><s_cdo_cdc> 
 * ----------- 12 -----------
 *   --Itemset--
 *     <stylesheet_import>-><import>•<s_cdo_cdc_plus>
 *     <stylesheet_import>-><import>•
 *    +<s_cdo_cdc_plus>->•<s_cdo_cdc>
 *    +<s_cdo_cdc_plus>->•<s_cdo_cdc_plus><s_cdo_cdc>
 *    +<s_cdo_cdc>->•<SS>
 *    +<s_cdo_cdc>->•<CDO>
 *    +<s_cdo_cdc>->•<CDC>
 *   --Transitions--
 *    Goto on <s_cdo_cdc_plus> to 53 because of <stylesheet_import>-><import>•<s_cdo_cdc_plus>
 *    Reduce on <IMPORT_SYM> using <stylesheet_import>-><import> 
 *    Reduce on <MEDIA_SYM> using <stylesheet_import>-><import> 
 *    Reduce on <IDENT> using <stylesheet_import>-><import> 
 *    Reduce on <PAGE_SYM> using <stylesheet_import>-><import> 
 *    Reduce on <COLON> using <stylesheet_import>-><import> 
 *    Reduce on <HASH> using <stylesheet_import>-><import> 
 *    Reduce on <DOT> using <stylesheet_import>-><import> 
 *    Reduce on <STAR> using <stylesheet_import>-><import> 
 *    Reduce on <LBRACKET> using <stylesheet_import>-><import> 
 *    Goto on <s_cdo_cdc> to 11 because of <s_cdo_cdc_plus>->•<s_cdo_cdc>
 *    Goto on <s_cdo_cdc_plus> to 53 because of <s_cdo_cdc_plus>->•<s_cdo_cdc_plus><s_cdo_cdc>
 *    Shift on <SS> to 17 because of <s_cdo_cdc>->•<SS> 
 *    Shift on <CDO> to 18 because of <s_cdo_cdc>->•<CDO> 
 *    Shift on <CDC> to 19 because of <s_cdo_cdc>->•<CDC> 
 * ----------- 13 -----------
 *   --Itemset--
 *     <stylesheet_ruleset_media_page>-><ruleset>•
 *   --Transitions--
 *    Reduce on <MEDIA_SYM> using <stylesheet_ruleset_media_page>-><ruleset> 
 *    Reduce on <IDENT> using <stylesheet_ruleset_media_page>-><ruleset> 
 *    Reduce on <PAGE_SYM> using <stylesheet_ruleset_media_page>-><ruleset> 
 *    Reduce on <COLON> using <stylesheet_ruleset_media_page>-><ruleset> 
 *    Reduce on <HASH> using <stylesheet_ruleset_media_page>-><ruleset> 
 *    Reduce on <DOT> using <stylesheet_ruleset_media_page>-><ruleset> 
 *    Reduce on <STAR> using <stylesheet_ruleset_media_page>-><ruleset> 
 *    Reduce on <LBRACKET> using <stylesheet_ruleset_media_page>-><ruleset> 
 *    Reduce on  using <stylesheet_ruleset_media_page>-><ruleset> 
 * ----------- 14 -----------
 *   --Itemset--
 *     <stylesheet_ruleset_media_page>-><media>•
 *   --Transitions--
 *    Reduce on <MEDIA_SYM> using <stylesheet_ruleset_media_page>-><media> 
 *    Reduce on <IDENT> using <stylesheet_ruleset_media_page>-><media> 
 *    Reduce on <PAGE_SYM> using <stylesheet_ruleset_media_page>-><media> 
 *    Reduce on <COLON> using <stylesheet_ruleset_media_page>-><media> 
 *    Reduce on <HASH> using <stylesheet_ruleset_media_page>-><media> 
 *    Reduce on <DOT> using <stylesheet_ruleset_media_page>-><media> 
 *    Reduce on <STAR> using <stylesheet_ruleset_media_page>-><media> 
 *    Reduce on <LBRACKET> using <stylesheet_ruleset_media_page>-><media> 
 *    Reduce on  using <stylesheet_ruleset_media_page>-><media> 
 * ----------- 15 -----------
 *   --Itemset--
 *     <stylesheet_ruleset_media_page>-><page>•
 *   --Transitions--
 *    Reduce on <MEDIA_SYM> using <stylesheet_ruleset_media_page>-><page> 
 *    Reduce on <IDENT> using <stylesheet_ruleset_media_page>-><page> 
 *    Reduce on <PAGE_SYM> using <stylesheet_ruleset_media_page>-><page> 
 *    Reduce on <COLON> using <stylesheet_ruleset_media_page>-><page> 
 *    Reduce on <HASH> using <stylesheet_ruleset_media_page>-><page> 
 *    Reduce on <DOT> using <stylesheet_ruleset_media_page>-><page> 
 *    Reduce on <STAR> using <stylesheet_ruleset_media_page>-><page> 
 *    Reduce on <LBRACKET> using <stylesheet_ruleset_media_page>-><page> 
 *    Reduce on  using <stylesheet_ruleset_media_page>-><page> 
 * ----------- 16 -----------
 *   --Itemset--
 *     <charset_sym_sstar>-><CHARSET_SYM>•
 *     <charset_sym_sstar>-><CHARSET_SYM>•<splus>
 *    +<splus>->•<SS>
 *    +<splus>->•<SS><splus>
 *   --Transitions--
 *    Reduce on <STRING> using <charset_sym_sstar>-><CHARSET_SYM> 
 *    Goto on <splus> to 54 because of <charset_sym_sstar>-><CHARSET_SYM>•<splus>
 *    Shift on <SS> to 55 because of <splus>->•<SS> 
 *    Shift on <SS> to 55 because of <splus>->•<SS><splus> 
 * ----------- 17 -----------
 *   --Itemset--
 *     <s_cdo_cdc>-><SS>•
 *   --Transitions--
 *    Reduce on <SS> using <s_cdo_cdc>-><SS> 
 *    Reduce on <CDO> using <s_cdo_cdc>-><SS> 
 *    Reduce on <CDC> using <s_cdo_cdc>-><SS> 
 *    Reduce on <IMPORT_SYM> using <s_cdo_cdc>-><SS> 
 *    Reduce on <MEDIA_SYM> using <s_cdo_cdc>-><SS> 
 *    Reduce on <IDENT> using <s_cdo_cdc>-><SS> 
 *    Reduce on <PAGE_SYM> using <s_cdo_cdc>-><SS> 
 *    Reduce on <COLON> using <s_cdo_cdc>-><SS> 
 *    Reduce on <HASH> using <s_cdo_cdc>-><SS> 
 *    Reduce on <DOT> using <s_cdo_cdc>-><SS> 
 *    Reduce on <STAR> using <s_cdo_cdc>-><SS> 
 *    Reduce on <LBRACKET> using <s_cdo_cdc>-><SS> 
 *    Reduce on  using <s_cdo_cdc>-><SS> 
 * ----------- 18 -----------
 *   --Itemset--
 *     <s_cdo_cdc>-><CDO>•
 *   --Transitions--
 *    Reduce on <SS> using <s_cdo_cdc>-><CDO> 
 *    Reduce on <CDO> using <s_cdo_cdc>-><CDO> 
 *    Reduce on <CDC> using <s_cdo_cdc>-><CDO> 
 *    Reduce on <IMPORT_SYM> using <s_cdo_cdc>-><CDO> 
 *    Reduce on <MEDIA_SYM> using <s_cdo_cdc>-><CDO> 
 *    Reduce on <IDENT> using <s_cdo_cdc>-><CDO> 
 *    Reduce on <PAGE_SYM> using <s_cdo_cdc>-><CDO> 
 *    Reduce on <COLON> using <s_cdo_cdc>-><CDO> 
 *    Reduce on <HASH> using <s_cdo_cdc>-><CDO> 
 *    Reduce on <DOT> using <s_cdo_cdc>-><CDO> 
 *    Reduce on <STAR> using <s_cdo_cdc>-><CDO> 
 *    Reduce on <LBRACKET> using <s_cdo_cdc>-><CDO> 
 *    Reduce on  using <s_cdo_cdc>-><CDO> 
 * ----------- 19 -----------
 *   --Itemset--
 *     <s_cdo_cdc>-><CDC>•
 *   --Transitions--
 *    Reduce on <SS> using <s_cdo_cdc>-><CDC> 
 *    Reduce on <CDO> using <s_cdo_cdc>-><CDC> 
 *    Reduce on <CDC> using <s_cdo_cdc>-><CDC> 
 *    Reduce on <IMPORT_SYM> using <s_cdo_cdc>-><CDC> 
 *    Reduce on <MEDIA_SYM> using <s_cdo_cdc>-><CDC> 
 *    Reduce on <IDENT> using <s_cdo_cdc>-><CDC> 
 *    Reduce on <PAGE_SYM> using <s_cdo_cdc>-><CDC> 
 *    Reduce on <COLON> using <s_cdo_cdc>-><CDC> 
 *    Reduce on <HASH> using <s_cdo_cdc>-><CDC> 
 *    Reduce on <DOT> using <s_cdo_cdc>-><CDC> 
 *    Reduce on <STAR> using <s_cdo_cdc>-><CDC> 
 *    Reduce on <LBRACKET> using <s_cdo_cdc>-><CDC> 
 *    Reduce on  using <s_cdo_cdc>-><CDC> 
 * ----------- 20 -----------
 *   --Itemset--
 *     <import>-><import_sym_sstar>•<string_or_uri_sstar><SEMICOLON>
 *     <import>-><import_sym_sstar>•<string_or_uri_sstar><medialist><SEMICOLON>
 *    +<string_or_uri_sstar>->•<string_sstar>
 *    +<string_or_uri_sstar>->•<URI><splus>
 *    +<string_or_uri_sstar>->•<URI>
 *    +<string_sstar>->•<STRING>
 *    +<string_sstar>->•<STRING><splus>
 *   --Transitions--
 *    Goto on <string_or_uri_sstar> to 56 because of <import>-><import_sym_sstar>•<string_or_uri_sstar><SEMICOLON>
 *    Goto on <string_or_uri_sstar> to 56 because of <import>-><import_sym_sstar>•<string_or_uri_sstar><medialist><SEMICOLON>
 *    Goto on <string_sstar> to 57 because of <string_or_uri_sstar>->•<string_sstar>
 *    Shift on <URI> to 58 because of <string_or_uri_sstar>->•<URI><splus> 
 *    Shift on <URI> to 58 because of <string_or_uri_sstar>->•<URI> 
 *    Shift on <STRING> to 52 because of <string_sstar>->•<STRING> 
 *    Shift on <STRING> to 52 because of <string_sstar>->•<STRING><splus> 
 * ----------- 21 -----------
 *   --Itemset--
 *     <ruleset>-><rruleset>•
 *   --Transitions--
 *    Reduce on <RBRACE> using <ruleset>-><rruleset> 
 *    Reduce on <MEDIA_SYM> using <ruleset>-><rruleset> 
 *    Reduce on <IDENT> using <ruleset>-><rruleset> 
 *    Reduce on <PAGE_SYM> using <ruleset>-><rruleset> 
 *    Reduce on <COLON> using <ruleset>-><rruleset> 
 *    Reduce on <HASH> using <ruleset>-><rruleset> 
 *    Reduce on <DOT> using <ruleset>-><rruleset> 
 *    Reduce on <STAR> using <ruleset>-><rruleset> 
 *    Reduce on <LBRACKET> using <ruleset>-><rruleset> 
 *    Reduce on  using <ruleset>-><rruleset> 
 * ----------- 22 -----------
 *   --Itemset--
 *     <media>-><media_sym_sstar>•<medialist><LBRACE><splus><rulesetplus><RBRACE>
 *     <media>-><media_sym_sstar>•<medialist><LBRACE><splus><rulesetplus><RBRACE><splus>
 *     <media>-><media_sym_sstar>•<medialist><LBRACE><rulesetplus><RBRACE>
 *     <media>-><media_sym_sstar>•<medialist><LBRACE><rulesetplus><RBRACE><splus>
 *     <media>-><media_sym_sstar>•<medialist><LBRACE><splus><RBRACE>
 *     <media>-><media_sym_sstar>•<medialist><LBRACE><splus><RBRACE><splus>
 *     <media>-><media_sym_sstar>•<medialist><LBRACE><RBRACE>
 *     <media>-><media_sym_sstar>•<medialist><LBRACE><RBRACE><splus>
 *    +<medialist>->•<medium>
 *    +<medialist>->•<medialist><COMMA><medium>
 *    +<medialist>->•<medialist><COMMA><splus><medium>
 *    +<medium>->•<IDENT>
 *    +<medium>->•<IDENT><splus>
 *   --Transitions--
 *    Goto on <medialist> to 59 because of <media>-><media_sym_sstar>•<medialist><LBRACE><splus><rulesetplus><RBRACE>
 *    Goto on <medialist> to 59 because of <media>-><media_sym_sstar>•<medialist><LBRACE><splus><rulesetplus><RBRACE><splus>
 *    Goto on <medialist> to 59 because of <media>-><media_sym_sstar>•<medialist><LBRACE><rulesetplus><RBRACE>
 *    Goto on <medialist> to 59 because of <media>-><media_sym_sstar>•<medialist><LBRACE><rulesetplus><RBRACE><splus>
 *    Goto on <medialist> to 59 because of <media>-><media_sym_sstar>•<medialist><LBRACE><splus><RBRACE>
 *    Goto on <medialist> to 59 because of <media>-><media_sym_sstar>•<medialist><LBRACE><splus><RBRACE><splus>
 *    Goto on <medialist> to 59 because of <media>-><media_sym_sstar>•<medialist><LBRACE><RBRACE>
 *    Goto on <medialist> to 59 because of <media>-><media_sym_sstar>•<medialist><LBRACE><RBRACE><splus>
 *    Goto on <medium> to 60 because of <medialist>->•<medium>
 *    Goto on <medialist> to 59 because of <medialist>->•<medialist><COMMA><medium>
 *    Goto on <medialist> to 59 because of <medialist>->•<medialist><COMMA><splus><medium>
 *    Shift on <IDENT> to 61 because of <medium>->•<IDENT> 
 *    Shift on <IDENT> to 61 because of <medium>->•<IDENT><splus> 
 * ----------- 23 -----------
 *   --Itemset--
 *     <page>-><ppage>•
 *   --Transitions--
 *    Reduce on <MEDIA_SYM> using <page>-><ppage> 
 *    Reduce on <IDENT> using <page>-><ppage> 
 *    Reduce on <PAGE_SYM> using <page>-><ppage> 
 *    Reduce on <COLON> using <page>-><ppage> 
 *    Reduce on <HASH> using <page>-><ppage> 
 *    Reduce on <DOT> using <page>-><ppage> 
 *    Reduce on <STAR> using <page>-><ppage> 
 *    Reduce on <LBRACKET> using <page>-><ppage> 
 *    Reduce on  using <page>-><ppage> 
 * ----------- 24 -----------
 *   --Itemset--
 *     <import_sym_sstar>-><IMPORT_SYM>•
 *     <import_sym_sstar>-><IMPORT_SYM>•<splus>
 *    +<splus>->•<SS>
 *    +<splus>->•<SS><splus>
 *   --Transitions--
 *    Reduce on <STRING> using <import_sym_sstar>-><IMPORT_SYM> 
 *    Reduce on <URI> using <import_sym_sstar>-><IMPORT_SYM> 
 *    Goto on <splus> to 62 because of <import_sym_sstar>-><IMPORT_SYM>•<splus>
 *    Shift on <SS> to 55 because of <splus>->•<SS> 
 *    Shift on <SS> to 55 because of <splus>->•<SS><splus> 
 * ----------- 25 -----------
 *   --Itemset--
 *     <rruleset>-><selectors>•<LBRACE><declarations_optional_semicolon><RBRACE><splus>
 *     <rruleset>-><selectors>•<LBRACE><declarations_optional_semicolon><RBRACE>
 *     <rruleset>-><selectors>•<LBRACE><RBRACE>
 *     <rruleset>-><selectors>•<LBRACE><splus><RBRACE>
 *     <rruleset>-><selectors>•<LBRACE><RBRACE><splus>
 *     <rruleset>-><selectors>•<LBRACE><splus><RBRACE><splus>
 *     <selectors>-><selectors>•<comma_sstar><selector>
 *    +<comma_sstar>->•<COMMA>
 *    +<comma_sstar>->•<COMMA><splus>
 *   --Transitions--
 *    Shift on <LBRACE> to 63 because of <rruleset>-><selectors>•<LBRACE><declarations_optional_semicolon><RBRACE><splus> 
 *    Shift on <LBRACE> to 63 because of <rruleset>-><selectors>•<LBRACE><declarations_optional_semicolon><RBRACE> 
 *    Shift on <LBRACE> to 63 because of <rruleset>-><selectors>•<LBRACE><RBRACE> 
 *    Shift on <LBRACE> to 63 because of <rruleset>-><selectors>•<LBRACE><splus><RBRACE> 
 *    Shift on <LBRACE> to 63 because of <rruleset>-><selectors>•<LBRACE><RBRACE><splus> 
 *    Shift on <LBRACE> to 63 because of <rruleset>-><selectors>•<LBRACE><splus><RBRACE><splus> 
 *    Goto on <comma_sstar> to 64 because of <selectors>-><selectors>•<comma_sstar><selector>
 *    Shift on <COMMA> to 65 because of <comma_sstar>->•<COMMA> 
 *    Shift on <COMMA> to 65 because of <comma_sstar>->•<COMMA><splus> 
 * ----------- 26 -----------
 *   --Itemset--
 *     <media_sym_sstar>-><MEDIA_SYM>•
 *     <media_sym_sstar>-><MEDIA_SYM>•<splus>
 *    +<splus>->•<SS>
 *    +<splus>->•<SS><splus>
 *   --Transitions--
 *    Reduce on <IDENT> using <media_sym_sstar>-><MEDIA_SYM> 
 *    Goto on <splus> to 66 because of <media_sym_sstar>-><MEDIA_SYM>•<splus>
 *    Shift on <SS> to 55 because of <splus>->•<SS> 
 *    Shift on <SS> to 55 because of <splus>->•<SS><splus> 
 * ----------- 27 -----------
 *   --Itemset--
 *     <ppage>-><pagesym_sstar>•<pseudo_page><splus><LBRACE><declarations_optional_semicolon><RBRACE>
 *     <ppage>-><pagesym_sstar>•<pseudo_page><splus><LBRACE><declarations_optional_semicolon><RBRACE><splus>
 *     <ppage>-><pagesym_sstar>•<pseudo_page><LBRACE><declarations_optional_semicolon><RBRACE>
 *     <ppage>-><pagesym_sstar>•<pseudo_page><LBRACE><declarations_optional_semicolon><RBRACE><splus>
 *     <ppage>-><pagesym_sstar>•<LBRACE><declarations_optional_semicolon><RBRACE>
 *     <ppage>-><pagesym_sstar>•<LBRACE><declarations_optional_semicolon><RBRACE><splus>
 *    +<pseudo_page>->•<COLON><IDENT>
 *   --Transitions--
 *    Goto on <pseudo_page> to 67 because of <ppage>-><pagesym_sstar>•<pseudo_page><splus><LBRACE><declarations_optional_semicolon><RBRACE>
 *    Goto on <pseudo_page> to 67 because of <ppage>-><pagesym_sstar>•<pseudo_page><splus><LBRACE><declarations_optional_semicolon><RBRACE><splus>
 *    Goto on <pseudo_page> to 67 because of <ppage>-><pagesym_sstar>•<pseudo_page><LBRACE><declarations_optional_semicolon><RBRACE>
 *    Goto on <pseudo_page> to 67 because of <ppage>-><pagesym_sstar>•<pseudo_page><LBRACE><declarations_optional_semicolon><RBRACE><splus>
 *    Shift on <LBRACE> to 68 because of <ppage>-><pagesym_sstar>•<LBRACE><declarations_optional_semicolon><RBRACE> 
 *    Shift on <LBRACE> to 68 because of <ppage>-><pagesym_sstar>•<LBRACE><declarations_optional_semicolon><RBRACE><splus> 
 *    Shift on <COLON> to 69 because of <pseudo_page>->•<COLON><IDENT> 
 * ----------- 28 -----------
 *   --Itemset--
 *     <selectors>-><selector>•
 *   --Transitions--
 *    Reduce on <COMMA> using <selectors>-><selector> 
 *    Reduce on <LBRACE> using <selectors>-><selector> 
 * ----------- 29 -----------
 *   --Itemset--
 *     <pagesym_sstar>-><PAGE_SYM>•
 *     <pagesym_sstar>-><PAGE_SYM>•<splus>
 *    +<splus>->•<SS>
 *    +<splus>->•<SS><splus>
 *   --Transitions--
 *    Reduce on <LBRACE> using <pagesym_sstar>-><PAGE_SYM> 
 *    Reduce on <COLON> using <pagesym_sstar>-><PAGE_SYM> 
 *    Goto on <splus> to 70 because of <pagesym_sstar>-><PAGE_SYM>•<splus>
 *    Shift on <SS> to 55 because of <splus>->•<SS> 
 *    Shift on <SS> to 55 because of <splus>->•<SS><splus> 
 * ----------- 30 -----------
 *   --Itemset--
 *     <selector>-><simple_selector>•
 *     <selector>-><simple_selector>•<combinator><selector>
 *    +<combinator>->•<GREATER><splus>
 *    +<combinator>->•<PLUS><splus>
 *    +<combinator>->•<SS>
 *   --Transitions--
 *    Reduce on <COMMA> using <selector>-><simple_selector> 
 *    Reduce on <LBRACE> using <selector>-><simple_selector> 
 *    Goto on <combinator> to 71 because of <selector>-><simple_selector>•<combinator><selector>
 *    Shift on <GREATER> to 72 because of <combinator>->•<GREATER><splus> 
 *    Shift on <PLUS> to 73 because of <combinator>->•<PLUS><splus> 
 *    Shift on <SS> to 74 because of <combinator>->•<SS> 
 * ----------- 31 -----------
 *   --Itemset--
 *     <simple_selector>-><element_name>•
 *     <simple_selector>-><element_name>•<hash_class_attrib_pseudo_plus>
 *    +<hash_class_attrib_pseudo_plus>->•<hash_class_attrib_pseudo>
 *    +<hash_class_attrib_pseudo_plus>->•<hash_class_attrib_pseudo_plus><hash_class_attrib_pseudo>
 *    +<hash_class_attrib_pseudo>->•<HASH>
 *    +<hash_class_attrib_pseudo>->•<class>
 *    +<hash_class_attrib_pseudo>->•<attrib>
 *    +<hash_class_attrib_pseudo>->•<pseudo>
 *    +<class>->•<DOT><IDENT>
 *    +<attrib>->•<LBRACKET><trimmed_ident><RBRACKET>
 *    +<attrib>->•<LBRACKET><trimmed_ident><attrib_operator_sstar><attrib_operator_rhand_sstar><RBRACKET>
 *    +<attrib>->•<LBRACKET><trimmed_ident><attrib_operator_sstar><RBRACKET>
 *    +<pseudo>->•<COLON><IDENT>
 *    +<pseudo>->•<COLON><CSSFUNCTION><trimmed_ident><RPAREN>
 *    +<pseudo>->•<COLON><CSSFUNCTION><splus><RPAREN>
 *    +<pseudo>->•<COLON><CSSFUNCTION><RPAREN>
 *   --Transitions--
 *    Reduce on <SS> using <simple_selector>-><element_name> 
 *    Reduce on <COMMA> using <simple_selector>-><element_name> 
 *    Reduce on <LBRACE> using <simple_selector>-><element_name> 
 *    Reduce on <GREATER> using <simple_selector>-><element_name> 
 *    Reduce on <PLUS> using <simple_selector>-><element_name> 
 *    Goto on <hash_class_attrib_pseudo_plus> to 75 because of <simple_selector>-><element_name>•<hash_class_attrib_pseudo_plus>
 *    Goto on <hash_class_attrib_pseudo> to 35 because of <hash_class_attrib_pseudo_plus>->•<hash_class_attrib_pseudo>
 *    Goto on <hash_class_attrib_pseudo_plus> to 75 because of <hash_class_attrib_pseudo_plus>->•<hash_class_attrib_pseudo_plus><hash_class_attrib_pseudo>
 *    Shift on <HASH> to 36 because of <hash_class_attrib_pseudo>->•<HASH> 
 *    Goto on <class> to 37 because of <hash_class_attrib_pseudo>->•<class>
 *    Goto on <attrib> to 38 because of <hash_class_attrib_pseudo>->•<attrib>
 *    Goto on <pseudo> to 39 because of <hash_class_attrib_pseudo>->•<pseudo>
 *    Shift on <DOT> to 40 because of <class>->•<DOT><IDENT> 
 *    Shift on <LBRACKET> to 41 because of <attrib>->•<LBRACKET><trimmed_ident><RBRACKET> 
 *    Shift on <LBRACKET> to 41 because of <attrib>->•<LBRACKET><trimmed_ident><attrib_operator_sstar><attrib_operator_rhand_sstar><RBRACKET> 
 *    Shift on <LBRACKET> to 41 because of <attrib>->•<LBRACKET><trimmed_ident><attrib_operator_sstar><RBRACKET> 
 *    Shift on <COLON> to 42 because of <pseudo>->•<COLON><IDENT> 
 *    Shift on <COLON> to 42 because of <pseudo>->•<COLON><CSSFUNCTION><trimmed_ident><RPAREN> 
 *    Shift on <COLON> to 42 because of <pseudo>->•<COLON><CSSFUNCTION><splus><RPAREN> 
 *    Shift on <COLON> to 42 because of <pseudo>->•<COLON><CSSFUNCTION><RPAREN> 
 * ----------- 32 -----------
 *   --Itemset--
 *     <simple_selector>-><hash_class_attrib_pseudo_plus>•
 *     <hash_class_attrib_pseudo_plus>-><hash_class_attrib_pseudo_plus>•<hash_class_attrib_pseudo>
 *    +<hash_class_attrib_pseudo>->•<HASH>
 *    +<hash_class_attrib_pseudo>->•<class>
 *    +<hash_class_attrib_pseudo>->•<attrib>
 *    +<hash_class_attrib_pseudo>->•<pseudo>
 *    +<class>->•<DOT><IDENT>
 *    +<attrib>->•<LBRACKET><trimmed_ident><RBRACKET>
 *    +<attrib>->•<LBRACKET><trimmed_ident><attrib_operator_sstar><attrib_operator_rhand_sstar><RBRACKET>
 *    +<attrib>->•<LBRACKET><trimmed_ident><attrib_operator_sstar><RBRACKET>
 *    +<pseudo>->•<COLON><IDENT>
 *    +<pseudo>->•<COLON><CSSFUNCTION><trimmed_ident><RPAREN>
 *    +<pseudo>->•<COLON><CSSFUNCTION><splus><RPAREN>
 *    +<pseudo>->•<COLON><CSSFUNCTION><RPAREN>
 *   --Transitions--
 *    Reduce on <SS> using <simple_selector>-><hash_class_attrib_pseudo_plus> 
 *    Reduce on <COMMA> using <simple_selector>-><hash_class_attrib_pseudo_plus> 
 *    Reduce on <LBRACE> using <simple_selector>-><hash_class_attrib_pseudo_plus> 
 *    Reduce on <GREATER> using <simple_selector>-><hash_class_attrib_pseudo_plus> 
 *    Reduce on <PLUS> using <simple_selector>-><hash_class_attrib_pseudo_plus> 
 *    Goto on <hash_class_attrib_pseudo> to 76 because of <hash_class_attrib_pseudo_plus>-><hash_class_attrib_pseudo_plus>•<hash_class_attrib_pseudo>
 *    Shift on <HASH> to 36 because of <hash_class_attrib_pseudo>->•<HASH> 
 *    Goto on <class> to 37 because of <hash_class_attrib_pseudo>->•<class>
 *    Goto on <attrib> to 38 because of <hash_class_attrib_pseudo>->•<attrib>
 *    Goto on <pseudo> to 39 because of <hash_class_attrib_pseudo>->•<pseudo>
 *    Shift on <DOT> to 40 because of <class>->•<DOT><IDENT> 
 *    Shift on <LBRACKET> to 41 because of <attrib>->•<LBRACKET><trimmed_ident><RBRACKET> 
 *    Shift on <LBRACKET> to 41 because of <attrib>->•<LBRACKET><trimmed_ident><attrib_operator_sstar><attrib_operator_rhand_sstar><RBRACKET> 
 *    Shift on <LBRACKET> to 41 because of <attrib>->•<LBRACKET><trimmed_ident><attrib_operator_sstar><RBRACKET> 
 *    Shift on <COLON> to 42 because of <pseudo>->•<COLON><IDENT> 
 *    Shift on <COLON> to 42 because of <pseudo>->•<COLON><CSSFUNCTION><trimmed_ident><RPAREN> 
 *    Shift on <COLON> to 42 because of <pseudo>->•<COLON><CSSFUNCTION><splus><RPAREN> 
 *    Shift on <COLON> to 42 because of <pseudo>->•<COLON><CSSFUNCTION><RPAREN> 
 * ----------- 33 -----------
 *   --Itemset--
 *     <element_name>-><IDENT>•
 *   --Transitions--
 *    Reduce on <SS> using <element_name>-><IDENT> 
 *    Reduce on <COMMA> using <element_name>-><IDENT> 
 *    Reduce on <LBRACE> using <element_name>-><IDENT> 
 *    Reduce on <COLON> using <element_name>-><IDENT> 
 *    Reduce on <GREATER> using <element_name>-><IDENT> 
 *    Reduce on <PLUS> using <element_name>-><IDENT> 
 *    Reduce on <HASH> using <element_name>-><IDENT> 
 *    Reduce on <DOT> using <element_name>-><IDENT> 
 *    Reduce on <LBRACKET> using <element_name>-><IDENT> 
 * ----------- 34 -----------
 *   --Itemset--
 *     <element_name>-><STAR>•
 *   --Transitions--
 *    Reduce on <SS> using <element_name>-><STAR> 
 *    Reduce on <COMMA> using <element_name>-><STAR> 
 *    Reduce on <LBRACE> using <element_name>-><STAR> 
 *    Reduce on <COLON> using <element_name>-><STAR> 
 *    Reduce on <GREATER> using <element_name>-><STAR> 
 *    Reduce on <PLUS> using <element_name>-><STAR> 
 *    Reduce on <HASH> using <element_name>-><STAR> 
 *    Reduce on <DOT> using <element_name>-><STAR> 
 *    Reduce on <LBRACKET> using <element_name>-><STAR> 
 * ----------- 35 -----------
 *   --Itemset--
 *     <hash_class_attrib_pseudo_plus>-><hash_class_attrib_pseudo>•
 *   --Transitions--
 *    Reduce on <SS> using <hash_class_attrib_pseudo_plus>-><hash_class_attrib_pseudo> 
 *    Reduce on <COMMA> using <hash_class_attrib_pseudo_plus>-><hash_class_attrib_pseudo> 
 *    Reduce on <LBRACE> using <hash_class_attrib_pseudo_plus>-><hash_class_attrib_pseudo> 
 *    Reduce on <COLON> using <hash_class_attrib_pseudo_plus>-><hash_class_attrib_pseudo> 
 *    Reduce on <GREATER> using <hash_class_attrib_pseudo_plus>-><hash_class_attrib_pseudo> 
 *    Reduce on <PLUS> using <hash_class_attrib_pseudo_plus>-><hash_class_attrib_pseudo> 
 *    Reduce on <HASH> using <hash_class_attrib_pseudo_plus>-><hash_class_attrib_pseudo> 
 *    Reduce on <DOT> using <hash_class_attrib_pseudo_plus>-><hash_class_attrib_pseudo> 
 *    Reduce on <LBRACKET> using <hash_class_attrib_pseudo_plus>-><hash_class_attrib_pseudo> 
 * ----------- 36 -----------
 *   --Itemset--
 *     <hash_class_attrib_pseudo>-><HASH>•
 *   --Transitions--
 *    Reduce on <SS> using <hash_class_attrib_pseudo>-><HASH> 
 *    Reduce on <COMMA> using <hash_class_attrib_pseudo>-><HASH> 
 *    Reduce on <LBRACE> using <hash_class_attrib_pseudo>-><HASH> 
 *    Reduce on <COLON> using <hash_class_attrib_pseudo>-><HASH> 
 *    Reduce on <GREATER> using <hash_class_attrib_pseudo>-><HASH> 
 *    Reduce on <PLUS> using <hash_class_attrib_pseudo>-><HASH> 
 *    Reduce on <HASH> using <hash_class_attrib_pseudo>-><HASH> 
 *    Reduce on <DOT> using <hash_class_attrib_pseudo>-><HASH> 
 *    Reduce on <LBRACKET> using <hash_class_attrib_pseudo>-><HASH> 
 * ----------- 37 -----------
 *   --Itemset--
 *     <hash_class_attrib_pseudo>-><class>•
 *   --Transitions--
 *    Reduce on <SS> using <hash_class_attrib_pseudo>-><class> 
 *    Reduce on <COMMA> using <hash_class_attrib_pseudo>-><class> 
 *    Reduce on <LBRACE> using <hash_class_attrib_pseudo>-><class> 
 *    Reduce on <COLON> using <hash_class_attrib_pseudo>-><class> 
 *    Reduce on <GREATER> using <hash_class_attrib_pseudo>-><class> 
 *    Reduce on <PLUS> using <hash_class_attrib_pseudo>-><class> 
 *    Reduce on <HASH> using <hash_class_attrib_pseudo>-><class> 
 *    Reduce on <DOT> using <hash_class_attrib_pseudo>-><class> 
 *    Reduce on <LBRACKET> using <hash_class_attrib_pseudo>-><class> 
 * ----------- 38 -----------
 *   --Itemset--
 *     <hash_class_attrib_pseudo>-><attrib>•
 *   --Transitions--
 *    Reduce on <SS> using <hash_class_attrib_pseudo>-><attrib> 
 *    Reduce on <COMMA> using <hash_class_attrib_pseudo>-><attrib> 
 *    Reduce on <LBRACE> using <hash_class_attrib_pseudo>-><attrib> 
 *    Reduce on <COLON> using <hash_class_attrib_pseudo>-><attrib> 
 *    Reduce on <GREATER> using <hash_class_attrib_pseudo>-><attrib> 
 *    Reduce on <PLUS> using <hash_class_attrib_pseudo>-><attrib> 
 *    Reduce on <HASH> using <hash_class_attrib_pseudo>-><attrib> 
 *    Reduce on <DOT> using <hash_class_attrib_pseudo>-><attrib> 
 *    Reduce on <LBRACKET> using <hash_class_attrib_pseudo>-><attrib> 
 * ----------- 39 -----------
 *   --Itemset--
 *     <hash_class_attrib_pseudo>-><pseudo>•
 *   --Transitions--
 *    Reduce on <SS> using <hash_class_attrib_pseudo>-><pseudo> 
 *    Reduce on <COMMA> using <hash_class_attrib_pseudo>-><pseudo> 
 *    Reduce on <LBRACE> using <hash_class_attrib_pseudo>-><pseudo> 
 *    Reduce on <COLON> using <hash_class_attrib_pseudo>-><pseudo> 
 *    Reduce on <GREATER> using <hash_class_attrib_pseudo>-><pseudo> 
 *    Reduce on <PLUS> using <hash_class_attrib_pseudo>-><pseudo> 
 *    Reduce on <HASH> using <hash_class_attrib_pseudo>-><pseudo> 
 *    Reduce on <DOT> using <hash_class_attrib_pseudo>-><pseudo> 
 *    Reduce on <LBRACKET> using <hash_class_attrib_pseudo>-><pseudo> 
 * ----------- 40 -----------
 *   --Itemset--
 *     <class>-><DOT>•<IDENT>
 *   --Transitions--
 *    Shift on <IDENT> to 77 because of <class>-><DOT>•<IDENT> 
 * ----------- 41 -----------
 *   --Itemset--
 *     <attrib>-><LBRACKET>•<trimmed_ident><RBRACKET>
 *     <attrib>-><LBRACKET>•<trimmed_ident><attrib_operator_sstar><attrib_operator_rhand_sstar><RBRACKET>
 *     <attrib>-><LBRACKET>•<trimmed_ident><attrib_operator_sstar><RBRACKET>
 *    +<trimmed_ident>->•<IDENT>
 *    +<trimmed_ident>->•<splus><IDENT>
 *    +<trimmed_ident>->•<IDENT><splus>
 *    +<trimmed_ident>->•<splus><IDENT><splus>
 *    +<splus>->•<SS>
 *    +<splus>->•<SS><splus>
 *   --Transitions--
 *    Goto on <trimmed_ident> to 78 because of <attrib>-><LBRACKET>•<trimmed_ident><RBRACKET>
 *    Goto on <trimmed_ident> to 78 because of <attrib>-><LBRACKET>•<trimmed_ident><attrib_operator_sstar><attrib_operator_rhand_sstar><RBRACKET>
 *    Goto on <trimmed_ident> to 78 because of <attrib>-><LBRACKET>•<trimmed_ident><attrib_operator_sstar><RBRACKET>
 *    Shift on <IDENT> to 79 because of <trimmed_ident>->•<IDENT> 
 *    Goto on <splus> to 80 because of <trimmed_ident>->•<splus><IDENT>
 *    Shift on <IDENT> to 79 because of <trimmed_ident>->•<IDENT><splus> 
 *    Goto on <splus> to 80 because of <trimmed_ident>->•<splus><IDENT><splus>
 *    Shift on <SS> to 55 because of <splus>->•<SS> 
 *    Shift on <SS> to 55 because of <splus>->•<SS><splus> 
 * ----------- 42 -----------
 *   --Itemset--
 *     <pseudo>-><COLON>•<IDENT>
 *     <pseudo>-><COLON>•<CSSFUNCTION><trimmed_ident><RPAREN>
 *     <pseudo>-><COLON>•<CSSFUNCTION><splus><RPAREN>
 *     <pseudo>-><COLON>•<CSSFUNCTION><RPAREN>
 *   --Transitions--
 *    Shift on <IDENT> to 81 because of <pseudo>-><COLON>•<IDENT> 
 *    Shift on <CSSFUNCTION> to 82 because of <pseudo>-><COLON>•<CSSFUNCTION><trimmed_ident><RPAREN> 
 *    Shift on <CSSFUNCTION> to 82 because of <pseudo>-><COLON>•<CSSFUNCTION><splus><RPAREN> 
 *    Shift on <CSSFUNCTION> to 82 because of <pseudo>-><COLON>•<CSSFUNCTION><RPAREN> 
 * ----------- 43 -----------
 *   --Itemset--
 *     <stylesheet>-><stylesheet_1><stylesheet_2>•
 *   --Transitions--
 *    Reduce on  using <stylesheet>-><stylesheet_1><stylesheet_2> 
 * ----------- 44 -----------
 *   --Itemset--
 *     <stylesheet_1>-><stylesheet_charset><s_cdo_cdc_plus>•
 *     <s_cdo_cdc_plus>-><s_cdo_cdc_plus>•<s_cdo_cdc>
 *    +<s_cdo_cdc>->•<SS>
 *    +<s_cdo_cdc>->•<CDO>
 *    +<s_cdo_cdc>->•<CDC>
 *   --Transitions--
 *    Reduce on <IMPORT_SYM> using <stylesheet_1>-><stylesheet_charset><s_cdo_cdc_plus> 
 *    Reduce on <MEDIA_SYM> using <stylesheet_1>-><stylesheet_charset><s_cdo_cdc_plus> 
 *    Reduce on <IDENT> using <stylesheet_1>-><stylesheet_charset><s_cdo_cdc_plus> 
 *    Reduce on <PAGE_SYM> using <stylesheet_1>-><stylesheet_charset><s_cdo_cdc_plus> 
 *    Reduce on <COLON> using <stylesheet_1>-><stylesheet_charset><s_cdo_cdc_plus> 
 *    Reduce on <HASH> using <stylesheet_1>-><stylesheet_charset><s_cdo_cdc_plus> 
 *    Reduce on <DOT> using <stylesheet_1>-><stylesheet_charset><s_cdo_cdc_plus> 
 *    Reduce on <STAR> using <stylesheet_1>-><stylesheet_charset><s_cdo_cdc_plus> 
 *    Reduce on <LBRACKET> using <stylesheet_1>-><stylesheet_charset><s_cdo_cdc_plus> 
 *    Reduce on  using <stylesheet_1>-><stylesheet_charset><s_cdo_cdc_plus> 
 *    Goto on <s_cdo_cdc> to 45 because of <s_cdo_cdc_plus>-><s_cdo_cdc_plus>•<s_cdo_cdc>
 *    Shift on <SS> to 17 because of <s_cdo_cdc>->•<SS> 
 *    Shift on <CDO> to 18 because of <s_cdo_cdc>->•<CDO> 
 *    Shift on <CDC> to 19 because of <s_cdo_cdc>->•<CDC> 
 * ----------- 45 -----------
 *   --Itemset--
 *     <s_cdo_cdc_plus>-><s_cdo_cdc_plus><s_cdo_cdc>•
 *   --Transitions--
 *    Reduce on <SS> using <s_cdo_cdc_plus>-><s_cdo_cdc_plus><s_cdo_cdc> 
 *    Reduce on <CDO> using <s_cdo_cdc_plus>-><s_cdo_cdc_plus><s_cdo_cdc> 
 *    Reduce on <CDC> using <s_cdo_cdc_plus>-><s_cdo_cdc_plus><s_cdo_cdc> 
 *    Reduce on <IMPORT_SYM> using <s_cdo_cdc_plus>-><s_cdo_cdc_plus><s_cdo_cdc> 
 *    Reduce on <MEDIA_SYM> using <s_cdo_cdc_plus>-><s_cdo_cdc_plus><s_cdo_cdc> 
 *    Reduce on <IDENT> using <s_cdo_cdc_plus>-><s_cdo_cdc_plus><s_cdo_cdc> 
 *    Reduce on <PAGE_SYM> using <s_cdo_cdc_plus>-><s_cdo_cdc_plus><s_cdo_cdc> 
 *    Reduce on <COLON> using <s_cdo_cdc_plus>-><s_cdo_cdc_plus><s_cdo_cdc> 
 *    Reduce on <HASH> using <s_cdo_cdc_plus>-><s_cdo_cdc_plus><s_cdo_cdc> 
 *    Reduce on <DOT> using <s_cdo_cdc_plus>-><s_cdo_cdc_plus><s_cdo_cdc> 
 *    Reduce on <STAR> using <s_cdo_cdc_plus>-><s_cdo_cdc_plus><s_cdo_cdc> 
 *    Reduce on <LBRACKET> using <s_cdo_cdc_plus>-><s_cdo_cdc_plus><s_cdo_cdc> 
 *    Reduce on  using <s_cdo_cdc_plus>-><s_cdo_cdc_plus><s_cdo_cdc> 
 * ----------- 46 -----------
 *   --Itemset--
 *     <stylesheet_2>-><stylesheet_import><stylesheet_ruleset_media_page>•
 *     <stylesheet_ruleset_media_page>-><stylesheet_ruleset_media_page>•<ruleset>
 *     <stylesheet_ruleset_media_page>-><stylesheet_ruleset_media_page>•<media>
 *     <stylesheet_ruleset_media_page>-><stylesheet_ruleset_media_page>•<page>
 *    +<ruleset>->•<rruleset>
 *    +<media>->•<media_sym_sstar><medialist><LBRACE><splus><rulesetplus><RBRACE>
 *    +<media>->•<media_sym_sstar><medialist><LBRACE><splus><rulesetplus><RBRACE><splus>
 *    +<media>->•<media_sym_sstar><medialist><LBRACE><rulesetplus><RBRACE>
 *    +<media>->•<media_sym_sstar><medialist><LBRACE><rulesetplus><RBRACE><splus>
 *    +<media>->•<media_sym_sstar><medialist><LBRACE><splus><RBRACE>
 *    +<media>->•<media_sym_sstar><medialist><LBRACE><splus><RBRACE><splus>
 *    +<media>->•<media_sym_sstar><medialist><LBRACE><RBRACE>
 *    +<media>->•<media_sym_sstar><medialist><LBRACE><RBRACE><splus>
 *    +<page>->•<ppage>
 *    +<rruleset>->•<selectors><LBRACE><declarations_optional_semicolon><RBRACE><splus>
 *    +<rruleset>->•<selectors><LBRACE><declarations_optional_semicolon><RBRACE>
 *    +<rruleset>->•<selectors><LBRACE><RBRACE>
 *    +<rruleset>->•<selectors><LBRACE><splus><RBRACE>
 *    +<rruleset>->•<selectors><LBRACE><RBRACE><splus>
 *    +<rruleset>->•<selectors><LBRACE><splus><RBRACE><splus>
 *    +<media_sym_sstar>->•<MEDIA_SYM>
 *    +<media_sym_sstar>->•<MEDIA_SYM><splus>
 *    +<ppage>->•<pagesym_sstar><pseudo_page><splus><LBRACE><declarations_optional_semicolon><RBRACE>
 *    +<ppage>->•<pagesym_sstar><pseudo_page><splus><LBRACE><declarations_optional_semicolon><RBRACE><splus>
 *    +<ppage>->•<pagesym_sstar><pseudo_page><LBRACE><declarations_optional_semicolon><RBRACE>
 *    +<ppage>->•<pagesym_sstar><pseudo_page><LBRACE><declarations_optional_semicolon><RBRACE><splus>
 *    +<ppage>->•<pagesym_sstar><LBRACE><declarations_optional_semicolon><RBRACE>
 *    +<ppage>->•<pagesym_sstar><LBRACE><declarations_optional_semicolon><RBRACE><splus>
 *    +<selectors>->•<selector>
 *    +<selectors>->•<selectors><comma_sstar><selector>
 *    +<pagesym_sstar>->•<PAGE_SYM>
 *    +<pagesym_sstar>->•<PAGE_SYM><splus>
 *    +<selector>->•<simple_selector>
 *    +<selector>->•<simple_selector><combinator><selector>
 *    +<simple_selector>->•<element_name>
 *    +<simple_selector>->•<element_name><hash_class_attrib_pseudo_plus>
 *    +<simple_selector>->•<hash_class_attrib_pseudo_plus>
 *    +<element_name>->•<IDENT>
 *    +<element_name>->•<STAR>
 *    +<hash_class_attrib_pseudo_plus>->•<hash_class_attrib_pseudo>
 *    +<hash_class_attrib_pseudo_plus>->•<hash_class_attrib_pseudo_plus><hash_class_attrib_pseudo>
 *    +<hash_class_attrib_pseudo>->•<HASH>
 *    +<hash_class_attrib_pseudo>->•<class>
 *    +<hash_class_attrib_pseudo>->•<attrib>
 *    +<hash_class_attrib_pseudo>->•<pseudo>
 *    +<class>->•<DOT><IDENT>
 *    +<attrib>->•<LBRACKET><trimmed_ident><RBRACKET>
 *    +<attrib>->•<LBRACKET><trimmed_ident><attrib_operator_sstar><attrib_operator_rhand_sstar><RBRACKET>
 *    +<attrib>->•<LBRACKET><trimmed_ident><attrib_operator_sstar><RBRACKET>
 *    +<pseudo>->•<COLON><IDENT>
 *    +<pseudo>->•<COLON><CSSFUNCTION><trimmed_ident><RPAREN>
 *    +<pseudo>->•<COLON><CSSFUNCTION><splus><RPAREN>
 *    +<pseudo>->•<COLON><CSSFUNCTION><RPAREN>
 *   --Transitions--
 *    Reduce on  using <stylesheet_2>-><stylesheet_import><stylesheet_ruleset_media_page> 
 *    Goto on <ruleset> to 48 because of <stylesheet_ruleset_media_page>-><stylesheet_ruleset_media_page>•<ruleset>
 *    Goto on <media> to 49 because of <stylesheet_ruleset_media_page>-><stylesheet_ruleset_media_page>•<media>
 *    Goto on <page> to 50 because of <stylesheet_ruleset_media_page>-><stylesheet_ruleset_media_page>•<page>
 *    Goto on <rruleset> to 21 because of <ruleset>->•<rruleset>
 *    Goto on <media_sym_sstar> to 22 because of <media>->•<media_sym_sstar><medialist><LBRACE><splus><rulesetplus><RBRACE>
 *    Goto on <media_sym_sstar> to 22 because of <media>->•<media_sym_sstar><medialist><LBRACE><splus><rulesetplus><RBRACE><splus>
 *    Goto on <media_sym_sstar> to 22 because of <media>->•<media_sym_sstar><medialist><LBRACE><rulesetplus><RBRACE>
 *    Goto on <media_sym_sstar> to 22 because of <media>->•<media_sym_sstar><medialist><LBRACE><rulesetplus><RBRACE><splus>
 *    Goto on <media_sym_sstar> to 22 because of <media>->•<media_sym_sstar><medialist><LBRACE><splus><RBRACE>
 *    Goto on <media_sym_sstar> to 22 because of <media>->•<media_sym_sstar><medialist><LBRACE><splus><RBRACE><splus>
 *    Goto on <media_sym_sstar> to 22 because of <media>->•<media_sym_sstar><medialist><LBRACE><RBRACE>
 *    Goto on <media_sym_sstar> to 22 because of <media>->•<media_sym_sstar><medialist><LBRACE><RBRACE><splus>
 *    Goto on <ppage> to 23 because of <page>->•<ppage>
 *    Goto on <selectors> to 25 because of <rruleset>->•<selectors><LBRACE><declarations_optional_semicolon><RBRACE><splus>
 *    Goto on <selectors> to 25 because of <rruleset>->•<selectors><LBRACE><declarations_optional_semicolon><RBRACE>
 *    Goto on <selectors> to 25 because of <rruleset>->•<selectors><LBRACE><RBRACE>
 *    Goto on <selectors> to 25 because of <rruleset>->•<selectors><LBRACE><splus><RBRACE>
 *    Goto on <selectors> to 25 because of <rruleset>->•<selectors><LBRACE><RBRACE><splus>
 *    Goto on <selectors> to 25 because of <rruleset>->•<selectors><LBRACE><splus><RBRACE><splus>
 *    Shift on <MEDIA_SYM> to 26 because of <media_sym_sstar>->•<MEDIA_SYM> 
 *    Shift on <MEDIA_SYM> to 26 because of <media_sym_sstar>->•<MEDIA_SYM><splus> 
 *    Goto on <pagesym_sstar> to 27 because of <ppage>->•<pagesym_sstar><pseudo_page><splus><LBRACE><declarations_optional_semicolon><RBRACE>
 *    Goto on <pagesym_sstar> to 27 because of <ppage>->•<pagesym_sstar><pseudo_page><splus><LBRACE><declarations_optional_semicolon><RBRACE><splus>
 *    Goto on <pagesym_sstar> to 27 because of <ppage>->•<pagesym_sstar><pseudo_page><LBRACE><declarations_optional_semicolon><RBRACE>
 *    Goto on <pagesym_sstar> to 27 because of <ppage>->•<pagesym_sstar><pseudo_page><LBRACE><declarations_optional_semicolon><RBRACE><splus>
 *    Goto on <pagesym_sstar> to 27 because of <ppage>->•<pagesym_sstar><LBRACE><declarations_optional_semicolon><RBRACE>
 *    Goto on <pagesym_sstar> to 27 because of <ppage>->•<pagesym_sstar><LBRACE><declarations_optional_semicolon><RBRACE><splus>
 *    Goto on <selector> to 28 because of <selectors>->•<selector>
 *    Goto on <selectors> to 25 because of <selectors>->•<selectors><comma_sstar><selector>
 *    Shift on <PAGE_SYM> to 29 because of <pagesym_sstar>->•<PAGE_SYM> 
 *    Shift on <PAGE_SYM> to 29 because of <pagesym_sstar>->•<PAGE_SYM><splus> 
 *    Goto on <simple_selector> to 30 because of <selector>->•<simple_selector>
 *    Goto on <simple_selector> to 30 because of <selector>->•<simple_selector><combinator><selector>
 *    Goto on <element_name> to 31 because of <simple_selector>->•<element_name>
 *    Goto on <element_name> to 31 because of <simple_selector>->•<element_name><hash_class_attrib_pseudo_plus>
 *    Goto on <hash_class_attrib_pseudo_plus> to 32 because of <simple_selector>->•<hash_class_attrib_pseudo_plus>
 *    Shift on <IDENT> to 33 because of <element_name>->•<IDENT> 
 *    Shift on <STAR> to 34 because of <element_name>->•<STAR> 
 *    Goto on <hash_class_attrib_pseudo> to 35 because of <hash_class_attrib_pseudo_plus>->•<hash_class_attrib_pseudo>
 *    Goto on <hash_class_attrib_pseudo_plus> to 32 because of <hash_class_attrib_pseudo_plus>->•<hash_class_attrib_pseudo_plus><hash_class_attrib_pseudo>
 *    Shift on <HASH> to 36 because of <hash_class_attrib_pseudo>->•<HASH> 
 *    Goto on <class> to 37 because of <hash_class_attrib_pseudo>->•<class>
 *    Goto on <attrib> to 38 because of <hash_class_attrib_pseudo>->•<attrib>
 *    Goto on <pseudo> to 39 because of <hash_class_attrib_pseudo>->•<pseudo>
 *    Shift on <DOT> to 40 because of <class>->•<DOT><IDENT> 
 *    Shift on <LBRACKET> to 41 because of <attrib>->•<LBRACKET><trimmed_ident><RBRACKET> 
 *    Shift on <LBRACKET> to 41 because of <attrib>->•<LBRACKET><trimmed_ident><attrib_operator_sstar><attrib_operator_rhand_sstar><RBRACKET> 
 *    Shift on <LBRACKET> to 41 because of <attrib>->•<LBRACKET><trimmed_ident><attrib_operator_sstar><RBRACKET> 
 *    Shift on <COLON> to 42 because of <pseudo>->•<COLON><IDENT> 
 *    Shift on <COLON> to 42 because of <pseudo>->•<COLON><CSSFUNCTION><trimmed_ident><RPAREN> 
 *    Shift on <COLON> to 42 because of <pseudo>->•<COLON><CSSFUNCTION><splus><RPAREN> 
 *    Shift on <COLON> to 42 because of <pseudo>->•<COLON><CSSFUNCTION><RPAREN> 
 * ----------- 47 -----------
 *   --Itemset--
 *     <stylesheet_import>-><stylesheet_import><import>•<s_cdo_cdc_plus>
 *     <stylesheet_import>-><stylesheet_import><import>•
 *    +<s_cdo_cdc_plus>->•<s_cdo_cdc>
 *    +<s_cdo_cdc_plus>->•<s_cdo_cdc_plus><s_cdo_cdc>
 *    +<s_cdo_cdc>->•<SS>
 *    +<s_cdo_cdc>->•<CDO>
 *    +<s_cdo_cdc>->•<CDC>
 *   --Transitions--
 *    Goto on <s_cdo_cdc_plus> to 83 because of <stylesheet_import>-><stylesheet_import><import>•<s_cdo_cdc_plus>
 *    Reduce on <IMPORT_SYM> using <stylesheet_import>-><stylesheet_import><import> 
 *    Reduce on <MEDIA_SYM> using <stylesheet_import>-><stylesheet_import><import> 
 *    Reduce on <IDENT> using <stylesheet_import>-><stylesheet_import><import> 
 *    Reduce on <PAGE_SYM> using <stylesheet_import>-><stylesheet_import><import> 
 *    Reduce on <COLON> using <stylesheet_import>-><stylesheet_import><import> 
 *    Reduce on <HASH> using <stylesheet_import>-><stylesheet_import><import> 
 *    Reduce on <DOT> using <stylesheet_import>-><stylesheet_import><import> 
 *    Reduce on <STAR> using <stylesheet_import>-><stylesheet_import><import> 
 *    Reduce on <LBRACKET> using <stylesheet_import>-><stylesheet_import><import> 
 *    Goto on <s_cdo_cdc> to 11 because of <s_cdo_cdc_plus>->•<s_cdo_cdc>
 *    Goto on <s_cdo_cdc_plus> to 83 because of <s_cdo_cdc_plus>->•<s_cdo_cdc_plus><s_cdo_cdc>
 *    Shift on <SS> to 17 because of <s_cdo_cdc>->•<SS> 
 *    Shift on <CDO> to 18 because of <s_cdo_cdc>->•<CDO> 
 *    Shift on <CDC> to 19 because of <s_cdo_cdc>->•<CDC> 
 * ----------- 48 -----------
 *   --Itemset--
 *     <stylesheet_ruleset_media_page>-><stylesheet_ruleset_media_page><ruleset>•
 *   --Transitions--
 *    Reduce on <MEDIA_SYM> using <stylesheet_ruleset_media_page>-><stylesheet_ruleset_media_page><ruleset> 
 *    Reduce on <IDENT> using <stylesheet_ruleset_media_page>-><stylesheet_ruleset_media_page><ruleset> 
 *    Reduce on <PAGE_SYM> using <stylesheet_ruleset_media_page>-><stylesheet_ruleset_media_page><ruleset> 
 *    Reduce on <COLON> using <stylesheet_ruleset_media_page>-><stylesheet_ruleset_media_page><ruleset> 
 *    Reduce on <HASH> using <stylesheet_ruleset_media_page>-><stylesheet_ruleset_media_page><ruleset> 
 *    Reduce on <DOT> using <stylesheet_ruleset_media_page>-><stylesheet_ruleset_media_page><ruleset> 
 *    Reduce on <STAR> using <stylesheet_ruleset_media_page>-><stylesheet_ruleset_media_page><ruleset> 
 *    Reduce on <LBRACKET> using <stylesheet_ruleset_media_page>-><stylesheet_ruleset_media_page><ruleset> 
 *    Reduce on  using <stylesheet_ruleset_media_page>-><stylesheet_ruleset_media_page><ruleset> 
 * ----------- 49 -----------
 *   --Itemset--
 *     <stylesheet_ruleset_media_page>-><stylesheet_ruleset_media_page><media>•
 *   --Transitions--
 *    Reduce on <MEDIA_SYM> using <stylesheet_ruleset_media_page>-><stylesheet_ruleset_media_page><media> 
 *    Reduce on <IDENT> using <stylesheet_ruleset_media_page>-><stylesheet_ruleset_media_page><media> 
 *    Reduce on <PAGE_SYM> using <stylesheet_ruleset_media_page>-><stylesheet_ruleset_media_page><media> 
 *    Reduce on <COLON> using <stylesheet_ruleset_media_page>-><stylesheet_ruleset_media_page><media> 
 *    Reduce on <HASH> using <stylesheet_ruleset_media_page>-><stylesheet_ruleset_media_page><media> 
 *    Reduce on <DOT> using <stylesheet_ruleset_media_page>-><stylesheet_ruleset_media_page><media> 
 *    Reduce on <STAR> using <stylesheet_ruleset_media_page>-><stylesheet_ruleset_media_page><media> 
 *    Reduce on <LBRACKET> using <stylesheet_ruleset_media_page>-><stylesheet_ruleset_media_page><media> 
 *    Reduce on  using <stylesheet_ruleset_media_page>-><stylesheet_ruleset_media_page><media> 
 * ----------- 50 -----------
 *   --Itemset--
 *     <stylesheet_ruleset_media_page>-><stylesheet_ruleset_media_page><page>•
 *   --Transitions--
 *    Reduce on <MEDIA_SYM> using <stylesheet_ruleset_media_page>-><stylesheet_ruleset_media_page><page> 
 *    Reduce on <IDENT> using <stylesheet_ruleset_media_page>-><stylesheet_ruleset_media_page><page> 
 *    Reduce on <PAGE_SYM> using <stylesheet_ruleset_media_page>-><stylesheet_ruleset_media_page><page> 
 *    Reduce on <COLON> using <stylesheet_ruleset_media_page>-><stylesheet_ruleset_media_page><page> 
 *    Reduce on <HASH> using <stylesheet_ruleset_media_page>-><stylesheet_ruleset_media_page><page> 
 *    Reduce on <DOT> using <stylesheet_ruleset_media_page>-><stylesheet_ruleset_media_page><page> 
 *    Reduce on <STAR> using <stylesheet_ruleset_media_page>-><stylesheet_ruleset_media_page><page> 
 *    Reduce on <LBRACKET> using <stylesheet_ruleset_media_page>-><stylesheet_ruleset_media_page><page> 
 *    Reduce on  using <stylesheet_ruleset_media_page>-><stylesheet_ruleset_media_page><page> 
 * ----------- 51 -----------
 *   --Itemset--
 *     <stylesheet_charset>-><charset_sym_sstar><string_sstar>•<SEMICOLON>
 *   --Transitions--
 *    Shift on <SEMICOLON> to 84 because of <stylesheet_charset>-><charset_sym_sstar><string_sstar>•<SEMICOLON> 
 * ----------- 52 -----------
 *   --Itemset--
 *     <string_sstar>-><STRING>•
 *     <string_sstar>-><STRING>•<splus>
 *    +<splus>->•<SS>
 *    +<splus>->•<SS><splus>
 *   --Transitions--
 *    Reduce on <SEMICOLON> using <string_sstar>-><STRING> 
 *    Reduce on <IDENT> using <string_sstar>-><STRING> 
 *    Goto on <splus> to 85 because of <string_sstar>-><STRING>•<splus>
 *    Shift on <SS> to 55 because of <splus>->•<SS> 
 *    Shift on <SS> to 55 because of <splus>->•<SS><splus> 
 * ----------- 53 -----------
 *   --Itemset--
 *     <stylesheet_import>-><import><s_cdo_cdc_plus>•
 *     <s_cdo_cdc_plus>-><s_cdo_cdc_plus>•<s_cdo_cdc>
 *    +<s_cdo_cdc>->•<SS>
 *    +<s_cdo_cdc>->•<CDO>
 *    +<s_cdo_cdc>->•<CDC>
 *   --Transitions--
 *    Reduce on <IMPORT_SYM> using <stylesheet_import>-><import><s_cdo_cdc_plus> 
 *    Reduce on <MEDIA_SYM> using <stylesheet_import>-><import><s_cdo_cdc_plus> 
 *    Reduce on <IDENT> using <stylesheet_import>-><import><s_cdo_cdc_plus> 
 *    Reduce on <PAGE_SYM> using <stylesheet_import>-><import><s_cdo_cdc_plus> 
 *    Reduce on <COLON> using <stylesheet_import>-><import><s_cdo_cdc_plus> 
 *    Reduce on <HASH> using <stylesheet_import>-><import><s_cdo_cdc_plus> 
 *    Reduce on <DOT> using <stylesheet_import>-><import><s_cdo_cdc_plus> 
 *    Reduce on <STAR> using <stylesheet_import>-><import><s_cdo_cdc_plus> 
 *    Reduce on <LBRACKET> using <stylesheet_import>-><import><s_cdo_cdc_plus> 
 *    Goto on <s_cdo_cdc> to 45 because of <s_cdo_cdc_plus>-><s_cdo_cdc_plus>•<s_cdo_cdc>
 *    Shift on <SS> to 17 because of <s_cdo_cdc>->•<SS> 
 *    Shift on <CDO> to 18 because of <s_cdo_cdc>->•<CDO> 
 *    Shift on <CDC> to 19 because of <s_cdo_cdc>->•<CDC> 
 * ----------- 54 -----------
 *   --Itemset--
 *     <charset_sym_sstar>-><CHARSET_SYM><splus>•
 *   --Transitions--
 *    Reduce on <STRING> using <charset_sym_sstar>-><CHARSET_SYM><splus> 
 * ----------- 55 -----------
 *   --Itemset--
 *     <splus>-><SS>•
 *     <splus>-><SS>•<splus>
 *    +<splus>->•<SS>
 *    +<splus>->•<SS><splus>
 *   --Transitions--
 *    Reduce on <SEMICOLON> using <splus>-><SS> 
 *    Reduce on <STRING> using <splus>-><SS> 
 *    Reduce on <URI> using <splus>-><SS> 
 *    Reduce on <COMMA> using <splus>-><SS> 
 *    Reduce on <LBRACE> using <splus>-><SS> 
 *    Reduce on <RBRACE> using <splus>-><SS> 
 *    Reduce on <MEDIA_SYM> using <splus>-><SS> 
 *    Reduce on <IDENT> using <splus>-><SS> 
 *    Reduce on <PAGE_SYM> using <splus>-><SS> 
 *    Reduce on <COLON> using <splus>-><SS> 
 *    Reduce on <SLASH> using <splus>-><SS> 
 *    Reduce on <PLUS> using <splus>-><SS> 
 *    Reduce on <MINUS> using <splus>-><SS> 
 *    Reduce on <HASH> using <splus>-><SS> 
 *    Reduce on <DOT> using <splus>-><SS> 
 *    Reduce on <STAR> using <splus>-><SS> 
 *    Reduce on <LBRACKET> using <splus>-><SS> 
 *    Reduce on <RBRACKET> using <splus>-><SS> 
 *    Reduce on <INCLUDES> using <splus>-><SS> 
 *    Reduce on <DASHMATCH> using <splus>-><SS> 
 *    Reduce on <EQUAL> using <splus>-><SS> 
 *    Reduce on <CSSFUNCTION> using <splus>-><SS> 
 *    Reduce on <RPAREN> using <splus>-><SS> 
 *    Reduce on <IMPORTANT_SYM> using <splus>-><SS> 
 *    Reduce on <NUMBER> using <splus>-><SS> 
 *    Reduce on <PERCENTAGE> using <splus>-><SS> 
 *    Reduce on <LENGTH> using <splus>-><SS> 
 *    Reduce on <EMS> using <splus>-><SS> 
 *    Reduce on <EXS> using <splus>-><SS> 
 *    Reduce on <ANGLE> using <splus>-><SS> 
 *    Reduce on <TIME> using <splus>-><SS> 
 *    Reduce on <FREQ> using <splus>-><SS> 
 *    Reduce on <DIMENSION> using <splus>-><SS> 
 *    Reduce on  using <splus>-><SS> 
 *    Goto on <splus> to 86 because of <splus>-><SS>•<splus>
 *    Shift on <SS> to 55 because of <splus>->•<SS> 
 *    Shift on <SS> to 55 because of <splus>->•<SS><splus> 
 * ----------- 56 -----------
 *   --Itemset--
 *     <import>-><import_sym_sstar><string_or_uri_sstar>•<SEMICOLON>
 *     <import>-><import_sym_sstar><string_or_uri_sstar>•<medialist><SEMICOLON>
 *    +<medialist>->•<medium>
 *    +<medialist>->•<medialist><COMMA><medium>
 *    +<medialist>->•<medialist><COMMA><splus><medium>
 *    +<medium>->•<IDENT>
 *    +<medium>->•<IDENT><splus>
 *   --Transitions--
 *    Shift on <SEMICOLON> to 87 because of <import>-><import_sym_sstar><string_or_uri_sstar>•<SEMICOLON> 
 *    Goto on <medialist> to 88 because of <import>-><import_sym_sstar><string_or_uri_sstar>•<medialist><SEMICOLON>
 *    Goto on <medium> to 60 because of <medialist>->•<medium>
 *    Goto on <medialist> to 88 because of <medialist>->•<medialist><COMMA><medium>
 *    Goto on <medialist> to 88 because of <medialist>->•<medialist><COMMA><splus><medium>
 *    Shift on <IDENT> to 61 because of <medium>->•<IDENT> 
 *    Shift on <IDENT> to 61 because of <medium>->•<IDENT><splus> 
 * ----------- 57 -----------
 *   --Itemset--
 *     <string_or_uri_sstar>-><string_sstar>•
 *   --Transitions--
 *    Reduce on <SEMICOLON> using <string_or_uri_sstar>-><string_sstar> 
 *    Reduce on <IDENT> using <string_or_uri_sstar>-><string_sstar> 
 * ----------- 58 -----------
 *   --Itemset--
 *     <string_or_uri_sstar>-><URI>•<splus>
 *     <string_or_uri_sstar>-><URI>•
 *    +<splus>->•<SS>
 *    +<splus>->•<SS><splus>
 *   --Transitions--
 *    Goto on <splus> to 89 because of <string_or_uri_sstar>-><URI>•<splus>
 *    Reduce on <SEMICOLON> using <string_or_uri_sstar>-><URI> 
 *    Reduce on <IDENT> using <string_or_uri_sstar>-><URI> 
 *    Shift on <SS> to 55 because of <splus>->•<SS> 
 *    Shift on <SS> to 55 because of <splus>->•<SS><splus> 
 * ----------- 59 -----------
 *   --Itemset--
 *     <media>-><media_sym_sstar><medialist>•<LBRACE><splus><rulesetplus><RBRACE>
 *     <media>-><media_sym_sstar><medialist>•<LBRACE><splus><rulesetplus><RBRACE><splus>
 *     <media>-><media_sym_sstar><medialist>•<LBRACE><rulesetplus><RBRACE>
 *     <media>-><media_sym_sstar><medialist>•<LBRACE><rulesetplus><RBRACE><splus>
 *     <media>-><media_sym_sstar><medialist>•<LBRACE><splus><RBRACE>
 *     <media>-><media_sym_sstar><medialist>•<LBRACE><splus><RBRACE><splus>
 *     <media>-><media_sym_sstar><medialist>•<LBRACE><RBRACE>
 *     <media>-><media_sym_sstar><medialist>•<LBRACE><RBRACE><splus>
 *     <medialist>-><medialist>•<COMMA><medium>
 *     <medialist>-><medialist>•<COMMA><splus><medium>
 *   --Transitions--
 *    Shift on <LBRACE> to 90 because of <media>-><media_sym_sstar><medialist>•<LBRACE><splus><rulesetplus><RBRACE> 
 *    Shift on <LBRACE> to 90 because of <media>-><media_sym_sstar><medialist>•<LBRACE><splus><rulesetplus><RBRACE><splus> 
 *    Shift on <LBRACE> to 90 because of <media>-><media_sym_sstar><medialist>•<LBRACE><rulesetplus><RBRACE> 
 *    Shift on <LBRACE> to 90 because of <media>-><media_sym_sstar><medialist>•<LBRACE><rulesetplus><RBRACE><splus> 
 *    Shift on <LBRACE> to 90 because of <media>-><media_sym_sstar><medialist>•<LBRACE><splus><RBRACE> 
 *    Shift on <LBRACE> to 90 because of <media>-><media_sym_sstar><medialist>•<LBRACE><splus><RBRACE><splus> 
 *    Shift on <LBRACE> to 90 because of <media>-><media_sym_sstar><medialist>•<LBRACE><RBRACE> 
 *    Shift on <LBRACE> to 90 because of <media>-><media_sym_sstar><medialist>•<LBRACE><RBRACE><splus> 
 *    Shift on <COMMA> to 91 because of <medialist>-><medialist>•<COMMA><medium> 
 *    Shift on <COMMA> to 91 because of <medialist>-><medialist>•<COMMA><splus><medium> 
 * ----------- 60 -----------
 *   --Itemset--
 *     <medialist>-><medium>•
 *   --Transitions--
 *    Reduce on <SEMICOLON> using <medialist>-><medium> 
 *    Reduce on <COMMA> using <medialist>-><medium> 
 *    Reduce on <LBRACE> using <medialist>-><medium> 
 * ----------- 61 -----------
 *   --Itemset--
 *     <medium>-><IDENT>•
 *     <medium>-><IDENT>•<splus>
 *    +<splus>->•<SS>
 *    +<splus>->•<SS><splus>
 *   --Transitions--
 *    Reduce on <SEMICOLON> using <medium>-><IDENT> 
 *    Reduce on <COMMA> using <medium>-><IDENT> 
 *    Reduce on <LBRACE> using <medium>-><IDENT> 
 *    Goto on <splus> to 92 because of <medium>-><IDENT>•<splus>
 *    Shift on <SS> to 55 because of <splus>->•<SS> 
 *    Shift on <SS> to 55 because of <splus>->•<SS><splus> 
 * ----------- 62 -----------
 *   --Itemset--
 *     <import_sym_sstar>-><IMPORT_SYM><splus>•
 *   --Transitions--
 *    Reduce on <STRING> using <import_sym_sstar>-><IMPORT_SYM><splus> 
 *    Reduce on <URI> using <import_sym_sstar>-><IMPORT_SYM><splus> 
 * ----------- 63 -----------
 *   --Itemset--
 *     <rruleset>-><selectors><LBRACE>•<declarations_optional_semicolon><RBRACE><splus>
 *     <rruleset>-><selectors><LBRACE>•<declarations_optional_semicolon><RBRACE>
 *     <rruleset>-><selectors><LBRACE>•<RBRACE>
 *     <rruleset>-><selectors><LBRACE>•<splus><RBRACE>
 *     <rruleset>-><selectors><LBRACE>•<RBRACE><splus>
 *     <rruleset>-><selectors><LBRACE>•<splus><RBRACE><splus>
 *    +<declarations_optional_semicolon>->•<declarations>
 *    +<declarations_optional_semicolon>->•<declarations><SEMICOLON>
 *    +<splus>->•<SS>
 *    +<splus>->•<SS><splus>
 *    +<declarations>->•<sstar_declaration>
 *    +<declarations>->•<declarations><SEMICOLON><sstar_declaration>
 *    +<sstar_declaration>->•<declaration>
 *    +<sstar_declaration>->•<splus><declaration>
 *    +<declaration>->•<ddeclaration>
 *    +<ddeclaration>->•<property><COLON><splus><expr><prio>
 *    +<ddeclaration>->•<property><COLON><splus><expr>
 *    +<ddeclaration>->•<property><COLON><expr><prio>
 *    +<ddeclaration>->•<property><COLON><expr>
 *    +<property>->•<IDENT>
 *    +<property>->•<IDENT><splus>
 *   --Transitions--
 *    Goto on <declarations_optional_semicolon> to 93 because of <rruleset>-><selectors><LBRACE>•<declarations_optional_semicolon><RBRACE><splus>
 *    Goto on <declarations_optional_semicolon> to 93 because of <rruleset>-><selectors><LBRACE>•<declarations_optional_semicolon><RBRACE>
 *    Shift on <RBRACE> to 94 because of <rruleset>-><selectors><LBRACE>•<RBRACE> 
 *    Goto on <splus> to 95 because of <rruleset>-><selectors><LBRACE>•<splus><RBRACE>
 *    Shift on <RBRACE> to 94 because of <rruleset>-><selectors><LBRACE>•<RBRACE><splus> 
 *    Goto on <splus> to 95 because of <rruleset>-><selectors><LBRACE>•<splus><RBRACE><splus>
 *    Goto on <declarations> to 96 because of <declarations_optional_semicolon>->•<declarations>
 *    Goto on <declarations> to 96 because of <declarations_optional_semicolon>->•<declarations><SEMICOLON>
 *    Shift on <SS> to 55 because of <splus>->•<SS> 
 *    Shift on <SS> to 55 because of <splus>->•<SS><splus> 
 *    Goto on <sstar_declaration> to 97 because of <declarations>->•<sstar_declaration>
 *    Goto on <declarations> to 96 because of <declarations>->•<declarations><SEMICOLON><sstar_declaration>
 *    Goto on <declaration> to 98 because of <sstar_declaration>->•<declaration>
 *    Goto on <splus> to 95 because of <sstar_declaration>->•<splus><declaration>
 *    Goto on <ddeclaration> to 99 because of <declaration>->•<ddeclaration>
 *    Goto on <property> to 100 because of <ddeclaration>->•<property><COLON><splus><expr><prio>
 *    Goto on <property> to 100 because of <ddeclaration>->•<property><COLON><splus><expr>
 *    Goto on <property> to 100 because of <ddeclaration>->•<property><COLON><expr><prio>
 *    Goto on <property> to 100 because of <ddeclaration>->•<property><COLON><expr>
 *    Shift on <IDENT> to 101 because of <property>->•<IDENT> 
 *    Shift on <IDENT> to 101 because of <property>->•<IDENT><splus> 
 * ----------- 64 -----------
 *   --Itemset--
 *     <selectors>-><selectors><comma_sstar>•<selector>
 *    +<selector>->•<simple_selector>
 *    +<selector>->•<simple_selector><combinator><selector>
 *    +<simple_selector>->•<element_name>
 *    +<simple_selector>->•<element_name><hash_class_attrib_pseudo_plus>
 *    +<simple_selector>->•<hash_class_attrib_pseudo_plus>
 *    +<element_name>->•<IDENT>
 *    +<element_name>->•<STAR>
 *    +<hash_class_attrib_pseudo_plus>->•<hash_class_attrib_pseudo>
 *    +<hash_class_attrib_pseudo_plus>->•<hash_class_attrib_pseudo_plus><hash_class_attrib_pseudo>
 *    +<hash_class_attrib_pseudo>->•<HASH>
 *    +<hash_class_attrib_pseudo>->•<class>
 *    +<hash_class_attrib_pseudo>->•<attrib>
 *    +<hash_class_attrib_pseudo>->•<pseudo>
 *    +<class>->•<DOT><IDENT>
 *    +<attrib>->•<LBRACKET><trimmed_ident><RBRACKET>
 *    +<attrib>->•<LBRACKET><trimmed_ident><attrib_operator_sstar><attrib_operator_rhand_sstar><RBRACKET>
 *    +<attrib>->•<LBRACKET><trimmed_ident><attrib_operator_sstar><RBRACKET>
 *    +<pseudo>->•<COLON><IDENT>
 *    +<pseudo>->•<COLON><CSSFUNCTION><trimmed_ident><RPAREN>
 *    +<pseudo>->•<COLON><CSSFUNCTION><splus><RPAREN>
 *    +<pseudo>->•<COLON><CSSFUNCTION><RPAREN>
 *   --Transitions--
 *    Goto on <selector> to 102 because of <selectors>-><selectors><comma_sstar>•<selector>
 *    Goto on <simple_selector> to 30 because of <selector>->•<simple_selector>
 *    Goto on <simple_selector> to 30 because of <selector>->•<simple_selector><combinator><selector>
 *    Goto on <element_name> to 31 because of <simple_selector>->•<element_name>
 *    Goto on <element_name> to 31 because of <simple_selector>->•<element_name><hash_class_attrib_pseudo_plus>
 *    Goto on <hash_class_attrib_pseudo_plus> to 32 because of <simple_selector>->•<hash_class_attrib_pseudo_plus>
 *    Shift on <IDENT> to 33 because of <element_name>->•<IDENT> 
 *    Shift on <STAR> to 34 because of <element_name>->•<STAR> 
 *    Goto on <hash_class_attrib_pseudo> to 35 because of <hash_class_attrib_pseudo_plus>->•<hash_class_attrib_pseudo>
 *    Goto on <hash_class_attrib_pseudo_plus> to 32 because of <hash_class_attrib_pseudo_plus>->•<hash_class_attrib_pseudo_plus><hash_class_attrib_pseudo>
 *    Shift on <HASH> to 36 because of <hash_class_attrib_pseudo>->•<HASH> 
 *    Goto on <class> to 37 because of <hash_class_attrib_pseudo>->•<class>
 *    Goto on <attrib> to 38 because of <hash_class_attrib_pseudo>->•<attrib>
 *    Goto on <pseudo> to 39 because of <hash_class_attrib_pseudo>->•<pseudo>
 *    Shift on <DOT> to 40 because of <class>->•<DOT><IDENT> 
 *    Shift on <LBRACKET> to 41 because of <attrib>->•<LBRACKET><trimmed_ident><RBRACKET> 
 *    Shift on <LBRACKET> to 41 because of <attrib>->•<LBRACKET><trimmed_ident><attrib_operator_sstar><attrib_operator_rhand_sstar><RBRACKET> 
 *    Shift on <LBRACKET> to 41 because of <attrib>->•<LBRACKET><trimmed_ident><attrib_operator_sstar><RBRACKET> 
 *    Shift on <COLON> to 42 because of <pseudo>->•<COLON><IDENT> 
 *    Shift on <COLON> to 42 because of <pseudo>->•<COLON><CSSFUNCTION><trimmed_ident><RPAREN> 
 *    Shift on <COLON> to 42 because of <pseudo>->•<COLON><CSSFUNCTION><splus><RPAREN> 
 *    Shift on <COLON> to 42 because of <pseudo>->•<COLON><CSSFUNCTION><RPAREN> 
 * ----------- 65 -----------
 *   --Itemset--
 *     <comma_sstar>-><COMMA>•
 *     <comma_sstar>-><COMMA>•<splus>
 *    +<splus>->•<SS>
 *    +<splus>->•<SS><splus>
 *   --Transitions--
 *    Reduce on <IDENT> using <comma_sstar>-><COMMA> 
 *    Reduce on <COLON> using <comma_sstar>-><COMMA> 
 *    Reduce on <HASH> using <comma_sstar>-><COMMA> 
 *    Reduce on <DOT> using <comma_sstar>-><COMMA> 
 *    Reduce on <STAR> using <comma_sstar>-><COMMA> 
 *    Reduce on <LBRACKET> using <comma_sstar>-><COMMA> 
 *    Goto on <splus> to 103 because of <comma_sstar>-><COMMA>•<splus>
 *    Shift on <SS> to 55 because of <splus>->•<SS> 
 *    Shift on <SS> to 55 because of <splus>->•<SS><splus> 
 * ----------- 66 -----------
 *   --Itemset--
 *     <media_sym_sstar>-><MEDIA_SYM><splus>•
 *   --Transitions--
 *    Reduce on <IDENT> using <media_sym_sstar>-><MEDIA_SYM><splus> 
 * ----------- 67 -----------
 *   --Itemset--
 *     <ppage>-><pagesym_sstar><pseudo_page>•<splus><LBRACE><declarations_optional_semicolon><RBRACE>
 *     <ppage>-><pagesym_sstar><pseudo_page>•<splus><LBRACE><declarations_optional_semicolon><RBRACE><splus>
 *     <ppage>-><pagesym_sstar><pseudo_page>•<LBRACE><declarations_optional_semicolon><RBRACE>
 *     <ppage>-><pagesym_sstar><pseudo_page>•<LBRACE><declarations_optional_semicolon><RBRACE><splus>
 *    +<splus>->•<SS>
 *    +<splus>->•<SS><splus>
 *   --Transitions--
 *    Goto on <splus> to 104 because of <ppage>-><pagesym_sstar><pseudo_page>•<splus><LBRACE><declarations_optional_semicolon><RBRACE>
 *    Goto on <splus> to 104 because of <ppage>-><pagesym_sstar><pseudo_page>•<splus><LBRACE><declarations_optional_semicolon><RBRACE><splus>
 *    Shift on <LBRACE> to 105 because of <ppage>-><pagesym_sstar><pseudo_page>•<LBRACE><declarations_optional_semicolon><RBRACE> 
 *    Shift on <LBRACE> to 105 because of <ppage>-><pagesym_sstar><pseudo_page>•<LBRACE><declarations_optional_semicolon><RBRACE><splus> 
 *    Shift on <SS> to 55 because of <splus>->•<SS> 
 *    Shift on <SS> to 55 because of <splus>->•<SS><splus> 
 * ----------- 68 -----------
 *   --Itemset--
 *     <ppage>-><pagesym_sstar><LBRACE>•<declarations_optional_semicolon><RBRACE>
 *     <ppage>-><pagesym_sstar><LBRACE>•<declarations_optional_semicolon><RBRACE><splus>
 *    +<declarations_optional_semicolon>->•<declarations>
 *    +<declarations_optional_semicolon>->•<declarations><SEMICOLON>
 *    +<declarations>->•<sstar_declaration>
 *    +<declarations>->•<declarations><SEMICOLON><sstar_declaration>
 *    +<sstar_declaration>->•<declaration>
 *    +<sstar_declaration>->•<splus><declaration>
 *    +<declaration>->•<ddeclaration>
 *    +<splus>->•<SS>
 *    +<splus>->•<SS><splus>
 *    +<ddeclaration>->•<property><COLON><splus><expr><prio>
 *    +<ddeclaration>->•<property><COLON><splus><expr>
 *    +<ddeclaration>->•<property><COLON><expr><prio>
 *    +<ddeclaration>->•<property><COLON><expr>
 *    +<property>->•<IDENT>
 *    +<property>->•<IDENT><splus>
 *   --Transitions--
 *    Goto on <declarations_optional_semicolon> to 106 because of <ppage>-><pagesym_sstar><LBRACE>•<declarations_optional_semicolon><RBRACE>
 *    Goto on <declarations_optional_semicolon> to 106 because of <ppage>-><pagesym_sstar><LBRACE>•<declarations_optional_semicolon><RBRACE><splus>
 *    Goto on <declarations> to 96 because of <declarations_optional_semicolon>->•<declarations>
 *    Goto on <declarations> to 96 because of <declarations_optional_semicolon>->•<declarations><SEMICOLON>
 *    Goto on <sstar_declaration> to 97 because of <declarations>->•<sstar_declaration>
 *    Goto on <declarations> to 96 because of <declarations>->•<declarations><SEMICOLON><sstar_declaration>
 *    Goto on <declaration> to 98 because of <sstar_declaration>->•<declaration>
 *    Goto on <splus> to 107 because of <sstar_declaration>->•<splus><declaration>
 *    Goto on <ddeclaration> to 99 because of <declaration>->•<ddeclaration>
 *    Shift on <SS> to 55 because of <splus>->•<SS> 
 *    Shift on <SS> to 55 because of <splus>->•<SS><splus> 
 *    Goto on <property> to 100 because of <ddeclaration>->•<property><COLON><splus><expr><prio>
 *    Goto on <property> to 100 because of <ddeclaration>->•<property><COLON><splus><expr>
 *    Goto on <property> to 100 because of <ddeclaration>->•<property><COLON><expr><prio>
 *    Goto on <property> to 100 because of <ddeclaration>->•<property><COLON><expr>
 *    Shift on <IDENT> to 101 because of <property>->•<IDENT> 
 *    Shift on <IDENT> to 101 because of <property>->•<IDENT><splus> 
 * ----------- 69 -----------
 *   --Itemset--
 *     <pseudo_page>-><COLON>•<IDENT>
 *   --Transitions--
 *    Shift on <IDENT> to 108 because of <pseudo_page>-><COLON>•<IDENT> 
 * ----------- 70 -----------
 *   --Itemset--
 *     <pagesym_sstar>-><PAGE_SYM><splus>•
 *   --Transitions--
 *    Reduce on <LBRACE> using <pagesym_sstar>-><PAGE_SYM><splus> 
 *    Reduce on <COLON> using <pagesym_sstar>-><PAGE_SYM><splus> 
 * ----------- 71 -----------
 *   --Itemset--
 *     <selector>-><simple_selector><combinator>•<selector>
 *    +<selector>->•<simple_selector>
 *    +<selector>->•<simple_selector><combinator><selector>
 *    +<simple_selector>->•<element_name>
 *    +<simple_selector>->•<element_name><hash_class_attrib_pseudo_plus>
 *    +<simple_selector>->•<hash_class_attrib_pseudo_plus>
 *    +<element_name>->•<IDENT>
 *    +<element_name>->•<STAR>
 *    +<hash_class_attrib_pseudo_plus>->•<hash_class_attrib_pseudo>
 *    +<hash_class_attrib_pseudo_plus>->•<hash_class_attrib_pseudo_plus><hash_class_attrib_pseudo>
 *    +<hash_class_attrib_pseudo>->•<HASH>
 *    +<hash_class_attrib_pseudo>->•<class>
 *    +<hash_class_attrib_pseudo>->•<attrib>
 *    +<hash_class_attrib_pseudo>->•<pseudo>
 *    +<class>->•<DOT><IDENT>
 *    +<attrib>->•<LBRACKET><trimmed_ident><RBRACKET>
 *    +<attrib>->•<LBRACKET><trimmed_ident><attrib_operator_sstar><attrib_operator_rhand_sstar><RBRACKET>
 *    +<attrib>->•<LBRACKET><trimmed_ident><attrib_operator_sstar><RBRACKET>
 *    +<pseudo>->•<COLON><IDENT>
 *    +<pseudo>->•<COLON><CSSFUNCTION><trimmed_ident><RPAREN>
 *    +<pseudo>->•<COLON><CSSFUNCTION><splus><RPAREN>
 *    +<pseudo>->•<COLON><CSSFUNCTION><RPAREN>
 *   --Transitions--
 *    Goto on <selector> to 109 because of <selector>-><simple_selector><combinator>•<selector>
 *    Goto on <simple_selector> to 30 because of <selector>->•<simple_selector>
 *    Goto on <simple_selector> to 30 because of <selector>->•<simple_selector><combinator><selector>
 *    Goto on <element_name> to 31 because of <simple_selector>->•<element_name>
 *    Goto on <element_name> to 31 because of <simple_selector>->•<element_name><hash_class_attrib_pseudo_plus>
 *    Goto on <hash_class_attrib_pseudo_plus> to 32 because of <simple_selector>->•<hash_class_attrib_pseudo_plus>
 *    Shift on <IDENT> to 33 because of <element_name>->•<IDENT> 
 *    Shift on <STAR> to 34 because of <element_name>->•<STAR> 
 *    Goto on <hash_class_attrib_pseudo> to 35 because of <hash_class_attrib_pseudo_plus>->•<hash_class_attrib_pseudo>
 *    Goto on <hash_class_attrib_pseudo_plus> to 32 because of <hash_class_attrib_pseudo_plus>->•<hash_class_attrib_pseudo_plus><hash_class_attrib_pseudo>
 *    Shift on <HASH> to 36 because of <hash_class_attrib_pseudo>->•<HASH> 
 *    Goto on <class> to 37 because of <hash_class_attrib_pseudo>->•<class>
 *    Goto on <attrib> to 38 because of <hash_class_attrib_pseudo>->•<attrib>
 *    Goto on <pseudo> to 39 because of <hash_class_attrib_pseudo>->•<pseudo>
 *    Shift on <DOT> to 40 because of <class>->•<DOT><IDENT> 
 *    Shift on <LBRACKET> to 41 because of <attrib>->•<LBRACKET><trimmed_ident><RBRACKET> 
 *    Shift on <LBRACKET> to 41 because of <attrib>->•<LBRACKET><trimmed_ident><attrib_operator_sstar><attrib_operator_rhand_sstar><RBRACKET> 
 *    Shift on <LBRACKET> to 41 because of <attrib>->•<LBRACKET><trimmed_ident><attrib_operator_sstar><RBRACKET> 
 *    Shift on <COLON> to 42 because of <pseudo>->•<COLON><IDENT> 
 *    Shift on <COLON> to 42 because of <pseudo>->•<COLON><CSSFUNCTION><trimmed_ident><RPAREN> 
 *    Shift on <COLON> to 42 because of <pseudo>->•<COLON><CSSFUNCTION><splus><RPAREN> 
 *    Shift on <COLON> to 42 because of <pseudo>->•<COLON><CSSFUNCTION><RPAREN> 
 * ----------- 72 -----------
 *   --Itemset--
 *     <combinator>-><GREATER>•<splus>
 *    +<splus>->•<SS>
 *    +<splus>->•<SS><splus>
 *   --Transitions--
 *    Goto on <splus> to 110 because of <combinator>-><GREATER>•<splus>
 *    Shift on <SS> to 55 because of <splus>->•<SS> 
 *    Shift on <SS> to 55 because of <splus>->•<SS><splus> 
 * ----------- 73 -----------
 *   --Itemset--
 *     <combinator>-><PLUS>•<splus>
 *    +<splus>->•<SS>
 *    +<splus>->•<SS><splus>
 *   --Transitions--
 *    Goto on <splus> to 111 because of <combinator>-><PLUS>•<splus>
 *    Shift on <SS> to 55 because of <splus>->•<SS> 
 *    Shift on <SS> to 55 because of <splus>->•<SS><splus> 
 * ----------- 74 -----------
 *   --Itemset--
 *     <combinator>-><SS>•
 *   --Transitions--
 *    Reduce on <IDENT> using <combinator>-><SS> 
 *    Reduce on <COLON> using <combinator>-><SS> 
 *    Reduce on <HASH> using <combinator>-><SS> 
 *    Reduce on <DOT> using <combinator>-><SS> 
 *    Reduce on <STAR> using <combinator>-><SS> 
 *    Reduce on <LBRACKET> using <combinator>-><SS> 
 * ----------- 75 -----------
 *   --Itemset--
 *     <simple_selector>-><element_name><hash_class_attrib_pseudo_plus>•
 *     <hash_class_attrib_pseudo_plus>-><hash_class_attrib_pseudo_plus>•<hash_class_attrib_pseudo>
 *    +<hash_class_attrib_pseudo>->•<HASH>
 *    +<hash_class_attrib_pseudo>->•<class>
 *    +<hash_class_attrib_pseudo>->•<attrib>
 *    +<hash_class_attrib_pseudo>->•<pseudo>
 *    +<class>->•<DOT><IDENT>
 *    +<attrib>->•<LBRACKET><trimmed_ident><RBRACKET>
 *    +<attrib>->•<LBRACKET><trimmed_ident><attrib_operator_sstar><attrib_operator_rhand_sstar><RBRACKET>
 *    +<attrib>->•<LBRACKET><trimmed_ident><attrib_operator_sstar><RBRACKET>
 *    +<pseudo>->•<COLON><IDENT>
 *    +<pseudo>->•<COLON><CSSFUNCTION><trimmed_ident><RPAREN>
 *    +<pseudo>->•<COLON><CSSFUNCTION><splus><RPAREN>
 *    +<pseudo>->•<COLON><CSSFUNCTION><RPAREN>
 *   --Transitions--
 *    Reduce on <SS> using <simple_selector>-><element_name><hash_class_attrib_pseudo_plus> 
 *    Reduce on <COMMA> using <simple_selector>-><element_name><hash_class_attrib_pseudo_plus> 
 *    Reduce on <LBRACE> using <simple_selector>-><element_name><hash_class_attrib_pseudo_plus> 
 *    Reduce on <GREATER> using <simple_selector>-><element_name><hash_class_attrib_pseudo_plus> 
 *    Reduce on <PLUS> using <simple_selector>-><element_name><hash_class_attrib_pseudo_plus> 
 *    Goto on <hash_class_attrib_pseudo> to 76 because of <hash_class_attrib_pseudo_plus>-><hash_class_attrib_pseudo_plus>•<hash_class_attrib_pseudo>
 *    Shift on <HASH> to 36 because of <hash_class_attrib_pseudo>->•<HASH> 
 *    Goto on <class> to 37 because of <hash_class_attrib_pseudo>->•<class>
 *    Goto on <attrib> to 38 because of <hash_class_attrib_pseudo>->•<attrib>
 *    Goto on <pseudo> to 39 because of <hash_class_attrib_pseudo>->•<pseudo>
 *    Shift on <DOT> to 40 because of <class>->•<DOT><IDENT> 
 *    Shift on <LBRACKET> to 41 because of <attrib>->•<LBRACKET><trimmed_ident><RBRACKET> 
 *    Shift on <LBRACKET> to 41 because of <attrib>->•<LBRACKET><trimmed_ident><attrib_operator_sstar><attrib_operator_rhand_sstar><RBRACKET> 
 *    Shift on <LBRACKET> to 41 because of <attrib>->•<LBRACKET><trimmed_ident><attrib_operator_sstar><RBRACKET> 
 *    Shift on <COLON> to 42 because of <pseudo>->•<COLON><IDENT> 
 *    Shift on <COLON> to 42 because of <pseudo>->•<COLON><CSSFUNCTION><trimmed_ident><RPAREN> 
 *    Shift on <COLON> to 42 because of <pseudo>->•<COLON><CSSFUNCTION><splus><RPAREN> 
 *    Shift on <COLON> to 42 because of <pseudo>->•<COLON><CSSFUNCTION><RPAREN> 
 * ----------- 76 -----------
 *   --Itemset--
 *     <hash_class_attrib_pseudo_plus>-><hash_class_attrib_pseudo_plus><hash_class_attrib_pseudo>•
 *   --Transitions--
 *    Reduce on <SS> using <hash_class_attrib_pseudo_plus>-><hash_class_attrib_pseudo_plus><hash_class_attrib_pseudo> 
 *    Reduce on <COMMA> using <hash_class_attrib_pseudo_plus>-><hash_class_attrib_pseudo_plus><hash_class_attrib_pseudo> 
 *    Reduce on <LBRACE> using <hash_class_attrib_pseudo_plus>-><hash_class_attrib_pseudo_plus><hash_class_attrib_pseudo> 
 *    Reduce on <COLON> using <hash_class_attrib_pseudo_plus>-><hash_class_attrib_pseudo_plus><hash_class_attrib_pseudo> 
 *    Reduce on <GREATER> using <hash_class_attrib_pseudo_plus>-><hash_class_attrib_pseudo_plus><hash_class_attrib_pseudo> 
 *    Reduce on <PLUS> using <hash_class_attrib_pseudo_plus>-><hash_class_attrib_pseudo_plus><hash_class_attrib_pseudo> 
 *    Reduce on <HASH> using <hash_class_attrib_pseudo_plus>-><hash_class_attrib_pseudo_plus><hash_class_attrib_pseudo> 
 *    Reduce on <DOT> using <hash_class_attrib_pseudo_plus>-><hash_class_attrib_pseudo_plus><hash_class_attrib_pseudo> 
 *    Reduce on <LBRACKET> using <hash_class_attrib_pseudo_plus>-><hash_class_attrib_pseudo_plus><hash_class_attrib_pseudo> 
 * ----------- 77 -----------
 *   --Itemset--
 *     <class>-><DOT><IDENT>•
 *   --Transitions--
 *    Reduce on <SS> using <class>-><DOT><IDENT> 
 *    Reduce on <COMMA> using <class>-><DOT><IDENT> 
 *    Reduce on <LBRACE> using <class>-><DOT><IDENT> 
 *    Reduce on <COLON> using <class>-><DOT><IDENT> 
 *    Reduce on <GREATER> using <class>-><DOT><IDENT> 
 *    Reduce on <PLUS> using <class>-><DOT><IDENT> 
 *    Reduce on <HASH> using <class>-><DOT><IDENT> 
 *    Reduce on <DOT> using <class>-><DOT><IDENT> 
 *    Reduce on <LBRACKET> using <class>-><DOT><IDENT> 
 * ----------- 78 -----------
 *   --Itemset--
 *     <attrib>-><LBRACKET><trimmed_ident>•<RBRACKET>
 *     <attrib>-><LBRACKET><trimmed_ident>•<attrib_operator_sstar><attrib_operator_rhand_sstar><RBRACKET>
 *     <attrib>-><LBRACKET><trimmed_ident>•<attrib_operator_sstar><RBRACKET>
 *    +<attrib_operator_sstar>->•<attrib_operator>
 *    +<attrib_operator_sstar>->•<attrib_operator><splus>
 *    +<attrib_operator>->•<INCLUDES>
 *    +<attrib_operator>->•<DASHMATCH>
 *    +<attrib_operator>->•<EQUAL>
 *   --Transitions--
 *    Shift on <RBRACKET> to 112 because of <attrib>-><LBRACKET><trimmed_ident>•<RBRACKET> 
 *    Goto on <attrib_operator_sstar> to 113 because of <attrib>-><LBRACKET><trimmed_ident>•<attrib_operator_sstar><attrib_operator_rhand_sstar><RBRACKET>
 *    Goto on <attrib_operator_sstar> to 113 because of <attrib>-><LBRACKET><trimmed_ident>•<attrib_operator_sstar><RBRACKET>
 *    Goto on <attrib_operator> to 114 because of <attrib_operator_sstar>->•<attrib_operator>
 *    Goto on <attrib_operator> to 114 because of <attrib_operator_sstar>->•<attrib_operator><splus>
 *    Shift on <INCLUDES> to 115 because of <attrib_operator>->•<INCLUDES> 
 *    Shift on <DASHMATCH> to 116 because of <attrib_operator>->•<DASHMATCH> 
 *    Shift on <EQUAL> to 117 because of <attrib_operator>->•<EQUAL> 
 * ----------- 79 -----------
 *   --Itemset--
 *     <trimmed_ident>-><IDENT>•
 *     <trimmed_ident>-><IDENT>•<splus>
 *    +<splus>->•<SS>
 *    +<splus>->•<SS><splus>
 *   --Transitions--
 *    Reduce on <RBRACKET> using <trimmed_ident>-><IDENT> 
 *    Reduce on <INCLUDES> using <trimmed_ident>-><IDENT> 
 *    Reduce on <DASHMATCH> using <trimmed_ident>-><IDENT> 
 *    Reduce on <EQUAL> using <trimmed_ident>-><IDENT> 
 *    Reduce on <RPAREN> using <trimmed_ident>-><IDENT> 
 *    Goto on <splus> to 118 because of <trimmed_ident>-><IDENT>•<splus>
 *    Shift on <SS> to 55 because of <splus>->•<SS> 
 *    Shift on <SS> to 55 because of <splus>->•<SS><splus> 
 * ----------- 80 -----------
 *   --Itemset--
 *     <trimmed_ident>-><splus>•<IDENT>
 *     <trimmed_ident>-><splus>•<IDENT><splus>
 *   --Transitions--
 *    Shift on <IDENT> to 119 because of <trimmed_ident>-><splus>•<IDENT> 
 *    Shift on <IDENT> to 119 because of <trimmed_ident>-><splus>•<IDENT><splus> 
 * ----------- 81 -----------
 *   --Itemset--
 *     <pseudo>-><COLON><IDENT>•
 *   --Transitions--
 *    Reduce on <SS> using <pseudo>-><COLON><IDENT> 
 *    Reduce on <COMMA> using <pseudo>-><COLON><IDENT> 
 *    Reduce on <LBRACE> using <pseudo>-><COLON><IDENT> 
 *    Reduce on <COLON> using <pseudo>-><COLON><IDENT> 
 *    Reduce on <GREATER> using <pseudo>-><COLON><IDENT> 
 *    Reduce on <PLUS> using <pseudo>-><COLON><IDENT> 
 *    Reduce on <HASH> using <pseudo>-><COLON><IDENT> 
 *    Reduce on <DOT> using <pseudo>-><COLON><IDENT> 
 *    Reduce on <LBRACKET> using <pseudo>-><COLON><IDENT> 
 * ----------- 82 -----------
 *   --Itemset--
 *     <pseudo>-><COLON><CSSFUNCTION>•<trimmed_ident><RPAREN>
 *     <pseudo>-><COLON><CSSFUNCTION>•<splus><RPAREN>
 *     <pseudo>-><COLON><CSSFUNCTION>•<RPAREN>
 *    +<trimmed_ident>->•<IDENT>
 *    +<trimmed_ident>->•<splus><IDENT>
 *    +<trimmed_ident>->•<IDENT><splus>
 *    +<trimmed_ident>->•<splus><IDENT><splus>
 *    +<splus>->•<SS>
 *    +<splus>->•<SS><splus>
 *   --Transitions--
 *    Goto on <trimmed_ident> to 120 because of <pseudo>-><COLON><CSSFUNCTION>•<trimmed_ident><RPAREN>
 *    Goto on <splus> to 121 because of <pseudo>-><COLON><CSSFUNCTION>•<splus><RPAREN>
 *    Shift on <RPAREN> to 122 because of <pseudo>-><COLON><CSSFUNCTION>•<RPAREN> 
 *    Shift on <IDENT> to 79 because of <trimmed_ident>->•<IDENT> 
 *    Goto on <splus> to 121 because of <trimmed_ident>->•<splus><IDENT>
 *    Shift on <IDENT> to 79 because of <trimmed_ident>->•<IDENT><splus> 
 *    Goto on <splus> to 121 because of <trimmed_ident>->•<splus><IDENT><splus>
 *    Shift on <SS> to 55 because of <splus>->•<SS> 
 *    Shift on <SS> to 55 because of <splus>->•<SS><splus> 
 * ----------- 83 -----------
 *   --Itemset--
 *     <stylesheet_import>-><stylesheet_import><import><s_cdo_cdc_plus>•
 *     <s_cdo_cdc_plus>-><s_cdo_cdc_plus>•<s_cdo_cdc>
 *    +<s_cdo_cdc>->•<SS>
 *    +<s_cdo_cdc>->•<CDO>
 *    +<s_cdo_cdc>->•<CDC>
 *   --Transitions--
 *    Reduce on <IMPORT_SYM> using <stylesheet_import>-><stylesheet_import><import><s_cdo_cdc_plus> 
 *    Reduce on <MEDIA_SYM> using <stylesheet_import>-><stylesheet_import><import><s_cdo_cdc_plus> 
 *    Reduce on <IDENT> using <stylesheet_import>-><stylesheet_import><import><s_cdo_cdc_plus> 
 *    Reduce on <PAGE_SYM> using <stylesheet_import>-><stylesheet_import><import><s_cdo_cdc_plus> 
 *    Reduce on <COLON> using <stylesheet_import>-><stylesheet_import><import><s_cdo_cdc_plus> 
 *    Reduce on <HASH> using <stylesheet_import>-><stylesheet_import><import><s_cdo_cdc_plus> 
 *    Reduce on <DOT> using <stylesheet_import>-><stylesheet_import><import><s_cdo_cdc_plus> 
 *    Reduce on <STAR> using <stylesheet_import>-><stylesheet_import><import><s_cdo_cdc_plus> 
 *    Reduce on <LBRACKET> using <stylesheet_import>-><stylesheet_import><import><s_cdo_cdc_plus> 
 *    Goto on <s_cdo_cdc> to 45 because of <s_cdo_cdc_plus>-><s_cdo_cdc_plus>•<s_cdo_cdc>
 *    Shift on <SS> to 17 because of <s_cdo_cdc>->•<SS> 
 *    Shift on <CDO> to 18 because of <s_cdo_cdc>->•<CDO> 
 *    Shift on <CDC> to 19 because of <s_cdo_cdc>->•<CDC> 
 * ----------- 84 -----------
 *   --Itemset--
 *     <stylesheet_charset>-><charset_sym_sstar><string_sstar><SEMICOLON>•
 *   --Transitions--
 *    Reduce on <SS> using <stylesheet_charset>-><charset_sym_sstar><string_sstar><SEMICOLON> 
 *    Reduce on <CDO> using <stylesheet_charset>-><charset_sym_sstar><string_sstar><SEMICOLON> 
 *    Reduce on <CDC> using <stylesheet_charset>-><charset_sym_sstar><string_sstar><SEMICOLON> 
 * ----------- 85 -----------
 *   --Itemset--
 *     <string_sstar>-><STRING><splus>•
 *   --Transitions--
 *    Reduce on <SEMICOLON> using <string_sstar>-><STRING><splus> 
 *    Reduce on <IDENT> using <string_sstar>-><STRING><splus> 
 * ----------- 86 -----------
 *   --Itemset--
 *     <splus>-><SS><splus>•
 *   --Transitions--
 *    Reduce on <SEMICOLON> using <splus>-><SS><splus> 
 *    Reduce on <STRING> using <splus>-><SS><splus> 
 *    Reduce on <URI> using <splus>-><SS><splus> 
 *    Reduce on <COMMA> using <splus>-><SS><splus> 
 *    Reduce on <LBRACE> using <splus>-><SS><splus> 
 *    Reduce on <RBRACE> using <splus>-><SS><splus> 
 *    Reduce on <MEDIA_SYM> using <splus>-><SS><splus> 
 *    Reduce on <IDENT> using <splus>-><SS><splus> 
 *    Reduce on <PAGE_SYM> using <splus>-><SS><splus> 
 *    Reduce on <COLON> using <splus>-><SS><splus> 
 *    Reduce on <SLASH> using <splus>-><SS><splus> 
 *    Reduce on <PLUS> using <splus>-><SS><splus> 
 *    Reduce on <MINUS> using <splus>-><SS><splus> 
 *    Reduce on <HASH> using <splus>-><SS><splus> 
 *    Reduce on <DOT> using <splus>-><SS><splus> 
 *    Reduce on <STAR> using <splus>-><SS><splus> 
 *    Reduce on <LBRACKET> using <splus>-><SS><splus> 
 *    Reduce on <RBRACKET> using <splus>-><SS><splus> 
 *    Reduce on <INCLUDES> using <splus>-><SS><splus> 
 *    Reduce on <DASHMATCH> using <splus>-><SS><splus> 
 *    Reduce on <EQUAL> using <splus>-><SS><splus> 
 *    Reduce on <CSSFUNCTION> using <splus>-><SS><splus> 
 *    Reduce on <RPAREN> using <splus>-><SS><splus> 
 *    Reduce on <IMPORTANT_SYM> using <splus>-><SS><splus> 
 *    Reduce on <NUMBER> using <splus>-><SS><splus> 
 *    Reduce on <PERCENTAGE> using <splus>-><SS><splus> 
 *    Reduce on <LENGTH> using <splus>-><SS><splus> 
 *    Reduce on <EMS> using <splus>-><SS><splus> 
 *    Reduce on <EXS> using <splus>-><SS><splus> 
 *    Reduce on <ANGLE> using <splus>-><SS><splus> 
 *    Reduce on <TIME> using <splus>-><SS><splus> 
 *    Reduce on <FREQ> using <splus>-><SS><splus> 
 *    Reduce on <DIMENSION> using <splus>-><SS><splus> 
 *    Reduce on  using <splus>-><SS><splus> 
 * ----------- 87 -----------
 *   --Itemset--
 *     <import>-><import_sym_sstar><string_or_uri_sstar><SEMICOLON>•
 *   --Transitions--
 *    Reduce on <SS> using <import>-><import_sym_sstar><string_or_uri_sstar><SEMICOLON> 
 *    Reduce on <CDO> using <import>-><import_sym_sstar><string_or_uri_sstar><SEMICOLON> 
 *    Reduce on <CDC> using <import>-><import_sym_sstar><string_or_uri_sstar><SEMICOLON> 
 *    Reduce on <IMPORT_SYM> using <import>-><import_sym_sstar><string_or_uri_sstar><SEMICOLON> 
 *    Reduce on <MEDIA_SYM> using <import>-><import_sym_sstar><string_or_uri_sstar><SEMICOLON> 
 *    Reduce on <IDENT> using <import>-><import_sym_sstar><string_or_uri_sstar><SEMICOLON> 
 *    Reduce on <PAGE_SYM> using <import>-><import_sym_sstar><string_or_uri_sstar><SEMICOLON> 
 *    Reduce on <COLON> using <import>-><import_sym_sstar><string_or_uri_sstar><SEMICOLON> 
 *    Reduce on <HASH> using <import>-><import_sym_sstar><string_or_uri_sstar><SEMICOLON> 
 *    Reduce on <DOT> using <import>-><import_sym_sstar><string_or_uri_sstar><SEMICOLON> 
 *    Reduce on <STAR> using <import>-><import_sym_sstar><string_or_uri_sstar><SEMICOLON> 
 *    Reduce on <LBRACKET> using <import>-><import_sym_sstar><string_or_uri_sstar><SEMICOLON> 
 * ----------- 88 -----------
 *   --Itemset--
 *     <import>-><import_sym_sstar><string_or_uri_sstar><medialist>•<SEMICOLON>
 *     <medialist>-><medialist>•<COMMA><medium>
 *     <medialist>-><medialist>•<COMMA><splus><medium>
 *   --Transitions--
 *    Shift on <SEMICOLON> to 123 because of <import>-><import_sym_sstar><string_or_uri_sstar><medialist>•<SEMICOLON> 
 *    Shift on <COMMA> to 91 because of <medialist>-><medialist>•<COMMA><medium> 
 *    Shift on <COMMA> to 91 because of <medialist>-><medialist>•<COMMA><splus><medium> 
 * ----------- 89 -----------
 *   --Itemset--
 *     <string_or_uri_sstar>-><URI><splus>•
 *   --Transitions--
 *    Reduce on <SEMICOLON> using <string_or_uri_sstar>-><URI><splus> 
 *    Reduce on <IDENT> using <string_or_uri_sstar>-><URI><splus> 
 * ----------- 90 -----------
 *   --Itemset--
 *     <media>-><media_sym_sstar><medialist><LBRACE>•<splus><rulesetplus><RBRACE>
 *     <media>-><media_sym_sstar><medialist><LBRACE>•<splus><rulesetplus><RBRACE><splus>
 *     <media>-><media_sym_sstar><medialist><LBRACE>•<rulesetplus><RBRACE>
 *     <media>-><media_sym_sstar><medialist><LBRACE>•<rulesetplus><RBRACE><splus>
 *     <media>-><media_sym_sstar><medialist><LBRACE>•<splus><RBRACE>
 *     <media>-><media_sym_sstar><medialist><LBRACE>•<splus><RBRACE><splus>
 *     <media>-><media_sym_sstar><medialist><LBRACE>•<RBRACE>
 *     <media>-><media_sym_sstar><medialist><LBRACE>•<RBRACE><splus>
 *    +<splus>->•<SS>
 *    +<splus>->•<SS><splus>
 *    +<rulesetplus>->•<ruleset>
 *    +<rulesetplus>->•<rulesetplus><ruleset>
 *    +<ruleset>->•<rruleset>
 *    +<rruleset>->•<selectors><LBRACE><declarations_optional_semicolon><RBRACE><splus>
 *    +<rruleset>->•<selectors><LBRACE><declarations_optional_semicolon><RBRACE>
 *    +<rruleset>->•<selectors><LBRACE><RBRACE>
 *    +<rruleset>->•<selectors><LBRACE><splus><RBRACE>
 *    +<rruleset>->•<selectors><LBRACE><RBRACE><splus>
 *    +<rruleset>->•<selectors><LBRACE><splus><RBRACE><splus>
 *    +<selectors>->•<selector>
 *    +<selectors>->•<selectors><comma_sstar><selector>
 *    +<selector>->•<simple_selector>
 *    +<selector>->•<simple_selector><combinator><selector>
 *    +<simple_selector>->•<element_name>
 *    +<simple_selector>->•<element_name><hash_class_attrib_pseudo_plus>
 *    +<simple_selector>->•<hash_class_attrib_pseudo_plus>
 *    +<element_name>->•<IDENT>
 *    +<element_name>->•<STAR>
 *    +<hash_class_attrib_pseudo_plus>->•<hash_class_attrib_pseudo>
 *    +<hash_class_attrib_pseudo_plus>->•<hash_class_attrib_pseudo_plus><hash_class_attrib_pseudo>
 *    +<hash_class_attrib_pseudo>->•<HASH>
 *    +<hash_class_attrib_pseudo>->•<class>
 *    +<hash_class_attrib_pseudo>->•<attrib>
 *    +<hash_class_attrib_pseudo>->•<pseudo>
 *    +<class>->•<DOT><IDENT>
 *    +<attrib>->•<LBRACKET><trimmed_ident><RBRACKET>
 *    +<attrib>->•<LBRACKET><trimmed_ident><attrib_operator_sstar><attrib_operator_rhand_sstar><RBRACKET>
 *    +<attrib>->•<LBRACKET><trimmed_ident><attrib_operator_sstar><RBRACKET>
 *    +<pseudo>->•<COLON><IDENT>
 *    +<pseudo>->•<COLON><CSSFUNCTION><trimmed_ident><RPAREN>
 *    +<pseudo>->•<COLON><CSSFUNCTION><splus><RPAREN>
 *    +<pseudo>->•<COLON><CSSFUNCTION><RPAREN>
 *   --Transitions--
 *    Goto on <splus> to 124 because of <media>-><media_sym_sstar><medialist><LBRACE>•<splus><rulesetplus><RBRACE>
 *    Goto on <splus> to 124 because of <media>-><media_sym_sstar><medialist><LBRACE>•<splus><rulesetplus><RBRACE><splus>
 *    Goto on <rulesetplus> to 125 because of <media>-><media_sym_sstar><medialist><LBRACE>•<rulesetplus><RBRACE>
 *    Goto on <rulesetplus> to 125 because of <media>-><media_sym_sstar><medialist><LBRACE>•<rulesetplus><RBRACE><splus>
 *    Goto on <splus> to 124 because of <media>-><media_sym_sstar><medialist><LBRACE>•<splus><RBRACE>
 *    Goto on <splus> to 124 because of <media>-><media_sym_sstar><medialist><LBRACE>•<splus><RBRACE><splus>
 *    Shift on <RBRACE> to 126 because of <media>-><media_sym_sstar><medialist><LBRACE>•<RBRACE> 
 *    Shift on <RBRACE> to 126 because of <media>-><media_sym_sstar><medialist><LBRACE>•<RBRACE><splus> 
 *    Shift on <SS> to 55 because of <splus>->•<SS> 
 *    Shift on <SS> to 55 because of <splus>->•<SS><splus> 
 *    Goto on <ruleset> to 127 because of <rulesetplus>->•<ruleset>
 *    Goto on <rulesetplus> to 125 because of <rulesetplus>->•<rulesetplus><ruleset>
 *    Goto on <rruleset> to 21 because of <ruleset>->•<rruleset>
 *    Goto on <selectors> to 25 because of <rruleset>->•<selectors><LBRACE><declarations_optional_semicolon><RBRACE><splus>
 *    Goto on <selectors> to 25 because of <rruleset>->•<selectors><LBRACE><declarations_optional_semicolon><RBRACE>
 *    Goto on <selectors> to 25 because of <rruleset>->•<selectors><LBRACE><RBRACE>
 *    Goto on <selectors> to 25 because of <rruleset>->•<selectors><LBRACE><splus><RBRACE>
 *    Goto on <selectors> to 25 because of <rruleset>->•<selectors><LBRACE><RBRACE><splus>
 *    Goto on <selectors> to 25 because of <rruleset>->•<selectors><LBRACE><splus><RBRACE><splus>
 *    Goto on <selector> to 28 because of <selectors>->•<selector>
 *    Goto on <selectors> to 25 because of <selectors>->•<selectors><comma_sstar><selector>
 *    Goto on <simple_selector> to 30 because of <selector>->•<simple_selector>
 *    Goto on <simple_selector> to 30 because of <selector>->•<simple_selector><combinator><selector>
 *    Goto on <element_name> to 31 because of <simple_selector>->•<element_name>
 *    Goto on <element_name> to 31 because of <simple_selector>->•<element_name><hash_class_attrib_pseudo_plus>
 *    Goto on <hash_class_attrib_pseudo_plus> to 32 because of <simple_selector>->•<hash_class_attrib_pseudo_plus>
 *    Shift on <IDENT> to 33 because of <element_name>->•<IDENT> 
 *    Shift on <STAR> to 34 because of <element_name>->•<STAR> 
 *    Goto on <hash_class_attrib_pseudo> to 35 because of <hash_class_attrib_pseudo_plus>->•<hash_class_attrib_pseudo>
 *    Goto on <hash_class_attrib_pseudo_plus> to 32 because of <hash_class_attrib_pseudo_plus>->•<hash_class_attrib_pseudo_plus><hash_class_attrib_pseudo>
 *    Shift on <HASH> to 36 because of <hash_class_attrib_pseudo>->•<HASH> 
 *    Goto on <class> to 37 because of <hash_class_attrib_pseudo>->•<class>
 *    Goto on <attrib> to 38 because of <hash_class_attrib_pseudo>->•<attrib>
 *    Goto on <pseudo> to 39 because of <hash_class_attrib_pseudo>->•<pseudo>
 *    Shift on <DOT> to 40 because of <class>->•<DOT><IDENT> 
 *    Shift on <LBRACKET> to 41 because of <attrib>->•<LBRACKET><trimmed_ident><RBRACKET> 
 *    Shift on <LBRACKET> to 41 because of <attrib>->•<LBRACKET><trimmed_ident><attrib_operator_sstar><attrib_operator_rhand_sstar><RBRACKET> 
 *    Shift on <LBRACKET> to 41 because of <attrib>->•<LBRACKET><trimmed_ident><attrib_operator_sstar><RBRACKET> 
 *    Shift on <COLON> to 42 because of <pseudo>->•<COLON><IDENT> 
 *    Shift on <COLON> to 42 because of <pseudo>->•<COLON><CSSFUNCTION><trimmed_ident><RPAREN> 
 *    Shift on <COLON> to 42 because of <pseudo>->•<COLON><CSSFUNCTION><splus><RPAREN> 
 *    Shift on <COLON> to 42 because of <pseudo>->•<COLON><CSSFUNCTION><RPAREN> 
 * ----------- 91 -----------
 *   --Itemset--
 *     <medialist>-><medialist><COMMA>•<medium>
 *     <medialist>-><medialist><COMMA>•<splus><medium>
 *    +<medium>->•<IDENT>
 *    +<medium>->•<IDENT><splus>
 *    +<splus>->•<SS>
 *    +<splus>->•<SS><splus>
 *   --Transitions--
 *    Goto on <medium> to 128 because of <medialist>-><medialist><COMMA>•<medium>
 *    Goto on <splus> to 129 because of <medialist>-><medialist><COMMA>•<splus><medium>
 *    Shift on <IDENT> to 61 because of <medium>->•<IDENT> 
 *    Shift on <IDENT> to 61 because of <medium>->•<IDENT><splus> 
 *    Shift on <SS> to 55 because of <splus>->•<SS> 
 *    Shift on <SS> to 55 because of <splus>->•<SS><splus> 
 * ----------- 92 -----------
 *   --Itemset--
 *     <medium>-><IDENT><splus>•
 *   --Transitions--
 *    Reduce on <SEMICOLON> using <medium>-><IDENT><splus> 
 *    Reduce on <COMMA> using <medium>-><IDENT><splus> 
 *    Reduce on <LBRACE> using <medium>-><IDENT><splus> 
 * ----------- 93 -----------
 *   --Itemset--
 *     <rruleset>-><selectors><LBRACE><declarations_optional_semicolon>•<RBRACE><splus>
 *     <rruleset>-><selectors><LBRACE><declarations_optional_semicolon>•<RBRACE>
 *   --Transitions--
 *    Shift on <RBRACE> to 130 because of <rruleset>-><selectors><LBRACE><declarations_optional_semicolon>•<RBRACE><splus> 
 *    Shift on <RBRACE> to 130 because of <rruleset>-><selectors><LBRACE><declarations_optional_semicolon>•<RBRACE> 
 * ----------- 94 -----------
 *   --Itemset--
 *     <rruleset>-><selectors><LBRACE><RBRACE>•
 *     <rruleset>-><selectors><LBRACE><RBRACE>•<splus>
 *    +<splus>->•<SS>
 *    +<splus>->•<SS><splus>
 *   --Transitions--
 *    Reduce on <RBRACE> using <rruleset>-><selectors><LBRACE><RBRACE> 
 *    Reduce on <MEDIA_SYM> using <rruleset>-><selectors><LBRACE><RBRACE> 
 *    Reduce on <IDENT> using <rruleset>-><selectors><LBRACE><RBRACE> 
 *    Reduce on <PAGE_SYM> using <rruleset>-><selectors><LBRACE><RBRACE> 
 *    Reduce on <COLON> using <rruleset>-><selectors><LBRACE><RBRACE> 
 *    Reduce on <HASH> using <rruleset>-><selectors><LBRACE><RBRACE> 
 *    Reduce on <DOT> using <rruleset>-><selectors><LBRACE><RBRACE> 
 *    Reduce on <STAR> using <rruleset>-><selectors><LBRACE><RBRACE> 
 *    Reduce on <LBRACKET> using <rruleset>-><selectors><LBRACE><RBRACE> 
 *    Reduce on  using <rruleset>-><selectors><LBRACE><RBRACE> 
 *    Goto on <splus> to 131 because of <rruleset>-><selectors><LBRACE><RBRACE>•<splus>
 *    Shift on <SS> to 55 because of <splus>->•<SS> 
 *    Shift on <SS> to 55 because of <splus>->•<SS><splus> 
 * ----------- 95 -----------
 *   --Itemset--
 *     <rruleset>-><selectors><LBRACE><splus>•<RBRACE>
 *     <rruleset>-><selectors><LBRACE><splus>•<RBRACE><splus>
 *     <sstar_declaration>-><splus>•<declaration>
 *    +<declaration>->•<ddeclaration>
 *    +<ddeclaration>->•<property><COLON><splus><expr><prio>
 *    +<ddeclaration>->•<property><COLON><splus><expr>
 *    +<ddeclaration>->•<property><COLON><expr><prio>
 *    +<ddeclaration>->•<property><COLON><expr>
 *    +<property>->•<IDENT>
 *    +<property>->•<IDENT><splus>
 *   --Transitions--
 *    Shift on <RBRACE> to 132 because of <rruleset>-><selectors><LBRACE><splus>•<RBRACE> 
 *    Shift on <RBRACE> to 132 because of <rruleset>-><selectors><LBRACE><splus>•<RBRACE><splus> 
 *    Goto on <declaration> to 133 because of <sstar_declaration>-><splus>•<declaration>
 *    Goto on <ddeclaration> to 99 because of <declaration>->•<ddeclaration>
 *    Goto on <property> to 100 because of <ddeclaration>->•<property><COLON><splus><expr><prio>
 *    Goto on <property> to 100 because of <ddeclaration>->•<property><COLON><splus><expr>
 *    Goto on <property> to 100 because of <ddeclaration>->•<property><COLON><expr><prio>
 *    Goto on <property> to 100 because of <ddeclaration>->•<property><COLON><expr>
 *    Shift on <IDENT> to 101 because of <property>->•<IDENT> 
 *    Shift on <IDENT> to 101 because of <property>->•<IDENT><splus> 
 * ----------- 96 -----------
 *   --Itemset--
 *     <declarations_optional_semicolon>-><declarations>•
 *     <declarations_optional_semicolon>-><declarations>•<SEMICOLON>
 *     <declarations>-><declarations>•<SEMICOLON><sstar_declaration>
 *   --Transitions--
 *    Reduce on <RBRACE> using <declarations_optional_semicolon>-><declarations> 
 *    Shift on <SEMICOLON> to 134 because of <declarations_optional_semicolon>-><declarations>•<SEMICOLON> 
 *    Shift on <SEMICOLON> to 134 because of <declarations>-><declarations>•<SEMICOLON><sstar_declaration> 
 * ----------- 97 -----------
 *   --Itemset--
 *     <declarations>-><sstar_declaration>•
 *   --Transitions--
 *    Reduce on <SEMICOLON> using <declarations>-><sstar_declaration> 
 *    Reduce on <RBRACE> using <declarations>-><sstar_declaration> 
 * ----------- 98 -----------
 *   --Itemset--
 *     <sstar_declaration>-><declaration>•
 *   --Transitions--
 *    Reduce on <SEMICOLON> using <sstar_declaration>-><declaration> 
 *    Reduce on <RBRACE> using <sstar_declaration>-><declaration> 
 * ----------- 99 -----------
 *   --Itemset--
 *     <declaration>-><ddeclaration>•
 *   --Transitions--
 *    Reduce on <SEMICOLON> using <declaration>-><ddeclaration> 
 *    Reduce on <RBRACE> using <declaration>-><ddeclaration> 
 * ----------- 100 -----------
 *   --Itemset--
 *     <ddeclaration>-><property>•<COLON><splus><expr><prio>
 *     <ddeclaration>-><property>•<COLON><splus><expr>
 *     <ddeclaration>-><property>•<COLON><expr><prio>
 *     <ddeclaration>-><property>•<COLON><expr>
 *   --Transitions--
 *    Shift on <COLON> to 135 because of <ddeclaration>-><property>•<COLON><splus><expr><prio> 
 *    Shift on <COLON> to 135 because of <ddeclaration>-><property>•<COLON><splus><expr> 
 *    Shift on <COLON> to 135 because of <ddeclaration>-><property>•<COLON><expr><prio> 
 *    Shift on <COLON> to 135 because of <ddeclaration>-><property>•<COLON><expr> 
 * ----------- 101 -----------
 *   --Itemset--
 *     <property>-><IDENT>•
 *     <property>-><IDENT>•<splus>
 *    +<splus>->•<SS>
 *    +<splus>->•<SS><splus>
 *   --Transitions--
 *    Reduce on <COLON> using <property>-><IDENT> 
 *    Goto on <splus> to 136 because of <property>-><IDENT>•<splus>
 *    Shift on <SS> to 55 because of <splus>->•<SS> 
 *    Shift on <SS> to 55 because of <splus>->•<SS><splus> 
 * ----------- 102 -----------
 *   --Itemset--
 *     <selectors>-><selectors><comma_sstar><selector>•
 *   --Transitions--
 *    Reduce on <COMMA> using <selectors>-><selectors><comma_sstar><selector> 
 *    Reduce on <LBRACE> using <selectors>-><selectors><comma_sstar><selector> 
 * ----------- 103 -----------
 *   --Itemset--
 *     <comma_sstar>-><COMMA><splus>•
 *   --Transitions--
 *    Reduce on <IDENT> using <comma_sstar>-><COMMA><splus> 
 *    Reduce on <COLON> using <comma_sstar>-><COMMA><splus> 
 *    Reduce on <HASH> using <comma_sstar>-><COMMA><splus> 
 *    Reduce on <DOT> using <comma_sstar>-><COMMA><splus> 
 *    Reduce on <STAR> using <comma_sstar>-><COMMA><splus> 
 *    Reduce on <LBRACKET> using <comma_sstar>-><COMMA><splus> 
 * ----------- 104 -----------
 *   --Itemset--
 *     <ppage>-><pagesym_sstar><pseudo_page><splus>•<LBRACE><declarations_optional_semicolon><RBRACE>
 *     <ppage>-><pagesym_sstar><pseudo_page><splus>•<LBRACE><declarations_optional_semicolon><RBRACE><splus>
 *   --Transitions--
 *    Shift on <LBRACE> to 137 because of <ppage>-><pagesym_sstar><pseudo_page><splus>•<LBRACE><declarations_optional_semicolon><RBRACE> 
 *    Shift on <LBRACE> to 137 because of <ppage>-><pagesym_sstar><pseudo_page><splus>•<LBRACE><declarations_optional_semicolon><RBRACE><splus> 
 * ----------- 105 -----------
 *   --Itemset--
 *     <ppage>-><pagesym_sstar><pseudo_page><LBRACE>•<declarations_optional_semicolon><RBRACE>
 *     <ppage>-><pagesym_sstar><pseudo_page><LBRACE>•<declarations_optional_semicolon><RBRACE><splus>
 *    +<declarations_optional_semicolon>->•<declarations>
 *    +<declarations_optional_semicolon>->•<declarations><SEMICOLON>
 *    +<declarations>->•<sstar_declaration>
 *    +<declarations>->•<declarations><SEMICOLON><sstar_declaration>
 *    +<sstar_declaration>->•<declaration>
 *    +<sstar_declaration>->•<splus><declaration>
 *    +<declaration>->•<ddeclaration>
 *    +<splus>->•<SS>
 *    +<splus>->•<SS><splus>
 *    +<ddeclaration>->•<property><COLON><splus><expr><prio>
 *    +<ddeclaration>->•<property><COLON><splus><expr>
 *    +<ddeclaration>->•<property><COLON><expr><prio>
 *    +<ddeclaration>->•<property><COLON><expr>
 *    +<property>->•<IDENT>
 *    +<property>->•<IDENT><splus>
 *   --Transitions--
 *    Goto on <declarations_optional_semicolon> to 138 because of <ppage>-><pagesym_sstar><pseudo_page><LBRACE>•<declarations_optional_semicolon><RBRACE>
 *    Goto on <declarations_optional_semicolon> to 138 because of <ppage>-><pagesym_sstar><pseudo_page><LBRACE>•<declarations_optional_semicolon><RBRACE><splus>
 *    Goto on <declarations> to 96 because of <declarations_optional_semicolon>->•<declarations>
 *    Goto on <declarations> to 96 because of <declarations_optional_semicolon>->•<declarations><SEMICOLON>
 *    Goto on <sstar_declaration> to 97 because of <declarations>->•<sstar_declaration>
 *    Goto on <declarations> to 96 because of <declarations>->•<declarations><SEMICOLON><sstar_declaration>
 *    Goto on <declaration> to 98 because of <sstar_declaration>->•<declaration>
 *    Goto on <splus> to 107 because of <sstar_declaration>->•<splus><declaration>
 *    Goto on <ddeclaration> to 99 because of <declaration>->•<ddeclaration>
 *    Shift on <SS> to 55 because of <splus>->•<SS> 
 *    Shift on <SS> to 55 because of <splus>->•<SS><splus> 
 *    Goto on <property> to 100 because of <ddeclaration>->•<property><COLON><splus><expr><prio>
 *    Goto on <property> to 100 because of <ddeclaration>->•<property><COLON><splus><expr>
 *    Goto on <property> to 100 because of <ddeclaration>->•<property><COLON><expr><prio>
 *    Goto on <property> to 100 because of <ddeclaration>->•<property><COLON><expr>
 *    Shift on <IDENT> to 101 because of <property>->•<IDENT> 
 *    Shift on <IDENT> to 101 because of <property>->•<IDENT><splus> 
 * ----------- 106 -----------
 *   --Itemset--
 *     <ppage>-><pagesym_sstar><LBRACE><declarations_optional_semicolon>•<RBRACE>
 *     <ppage>-><pagesym_sstar><LBRACE><declarations_optional_semicolon>•<RBRACE><splus>
 *   --Transitions--
 *    Shift on <RBRACE> to 139 because of <ppage>-><pagesym_sstar><LBRACE><declarations_optional_semicolon>•<RBRACE> 
 *    Shift on <RBRACE> to 139 because of <ppage>-><pagesym_sstar><LBRACE><declarations_optional_semicolon>•<RBRACE><splus> 
 * ----------- 107 -----------
 *   --Itemset--
 *     <sstar_declaration>-><splus>•<declaration>
 *    +<declaration>->•<ddeclaration>
 *    +<ddeclaration>->•<property><COLON><splus><expr><prio>
 *    +<ddeclaration>->•<property><COLON><splus><expr>
 *    +<ddeclaration>->•<property><COLON><expr><prio>
 *    +<ddeclaration>->•<property><COLON><expr>
 *    +<property>->•<IDENT>
 *    +<property>->•<IDENT><splus>
 *   --Transitions--
 *    Goto on <declaration> to 133 because of <sstar_declaration>-><splus>•<declaration>
 *    Goto on <ddeclaration> to 99 because of <declaration>->•<ddeclaration>
 *    Goto on <property> to 100 because of <ddeclaration>->•<property><COLON><splus><expr><prio>
 *    Goto on <property> to 100 because of <ddeclaration>->•<property><COLON><splus><expr>
 *    Goto on <property> to 100 because of <ddeclaration>->•<property><COLON><expr><prio>
 *    Goto on <property> to 100 because of <ddeclaration>->•<property><COLON><expr>
 *    Shift on <IDENT> to 101 because of <property>->•<IDENT> 
 *    Shift on <IDENT> to 101 because of <property>->•<IDENT><splus> 
 * ----------- 108 -----------
 *   --Itemset--
 *     <pseudo_page>-><COLON><IDENT>•
 *   --Transitions--
 *    Reduce on <SS> using <pseudo_page>-><COLON><IDENT> 
 *    Reduce on <LBRACE> using <pseudo_page>-><COLON><IDENT> 
 * ----------- 109 -----------
 *   --Itemset--
 *     <selector>-><simple_selector><combinator><selector>•
 *   --Transitions--
 *    Reduce on <COMMA> using <selector>-><simple_selector><combinator><selector> 
 *    Reduce on <LBRACE> using <selector>-><simple_selector><combinator><selector> 
 * ----------- 110 -----------
 *   --Itemset--
 *     <combinator>-><GREATER><splus>•
 *   --Transitions--
 *    Reduce on <IDENT> using <combinator>-><GREATER><splus> 
 *    Reduce on <COLON> using <combinator>-><GREATER><splus> 
 *    Reduce on <HASH> using <combinator>-><GREATER><splus> 
 *    Reduce on <DOT> using <combinator>-><GREATER><splus> 
 *    Reduce on <STAR> using <combinator>-><GREATER><splus> 
 *    Reduce on <LBRACKET> using <combinator>-><GREATER><splus> 
 * ----------- 111 -----------
 *   --Itemset--
 *     <combinator>-><PLUS><splus>•
 *   --Transitions--
 *    Reduce on <IDENT> using <combinator>-><PLUS><splus> 
 *    Reduce on <COLON> using <combinator>-><PLUS><splus> 
 *    Reduce on <HASH> using <combinator>-><PLUS><splus> 
 *    Reduce on <DOT> using <combinator>-><PLUS><splus> 
 *    Reduce on <STAR> using <combinator>-><PLUS><splus> 
 *    Reduce on <LBRACKET> using <combinator>-><PLUS><splus> 
 * ----------- 112 -----------
 *   --Itemset--
 *     <attrib>-><LBRACKET><trimmed_ident><RBRACKET>•
 *   --Transitions--
 *    Reduce on <SS> using <attrib>-><LBRACKET><trimmed_ident><RBRACKET> 
 *    Reduce on <COMMA> using <attrib>-><LBRACKET><trimmed_ident><RBRACKET> 
 *    Reduce on <LBRACE> using <attrib>-><LBRACKET><trimmed_ident><RBRACKET> 
 *    Reduce on <COLON> using <attrib>-><LBRACKET><trimmed_ident><RBRACKET> 
 *    Reduce on <GREATER> using <attrib>-><LBRACKET><trimmed_ident><RBRACKET> 
 *    Reduce on <PLUS> using <attrib>-><LBRACKET><trimmed_ident><RBRACKET> 
 *    Reduce on <HASH> using <attrib>-><LBRACKET><trimmed_ident><RBRACKET> 
 *    Reduce on <DOT> using <attrib>-><LBRACKET><trimmed_ident><RBRACKET> 
 *    Reduce on <LBRACKET> using <attrib>-><LBRACKET><trimmed_ident><RBRACKET> 
 * ----------- 113 -----------
 *   --Itemset--
 *     <attrib>-><LBRACKET><trimmed_ident><attrib_operator_sstar>•<attrib_operator_rhand_sstar><RBRACKET>
 *     <attrib>-><LBRACKET><trimmed_ident><attrib_operator_sstar>•<RBRACKET>
 *    +<attrib_operator_rhand_sstar>->•<attrib_operator_rhand>
 *    +<attrib_operator_rhand_sstar>->•<attrib_operator_rhand><splus>
 *    +<attrib_operator_rhand>->•<STRING>
 *    +<attrib_operator_rhand>->•<IDENT>
 *   --Transitions--
 *    Goto on <attrib_operator_rhand_sstar> to 140 because of <attrib>-><LBRACKET><trimmed_ident><attrib_operator_sstar>•<attrib_operator_rhand_sstar><RBRACKET>
 *    Shift on <RBRACKET> to 141 because of <attrib>-><LBRACKET><trimmed_ident><attrib_operator_sstar>•<RBRACKET> 
 *    Goto on <attrib_operator_rhand> to 142 because of <attrib_operator_rhand_sstar>->•<attrib_operator_rhand>
 *    Goto on <attrib_operator_rhand> to 142 because of <attrib_operator_rhand_sstar>->•<attrib_operator_rhand><splus>
 *    Shift on <STRING> to 143 because of <attrib_operator_rhand>->•<STRING> 
 *    Shift on <IDENT> to 144 because of <attrib_operator_rhand>->•<IDENT> 
 * ----------- 114 -----------
 *   --Itemset--
 *     <attrib_operator_sstar>-><attrib_operator>•
 *     <attrib_operator_sstar>-><attrib_operator>•<splus>
 *    +<splus>->•<SS>
 *    +<splus>->•<SS><splus>
 *   --Transitions--
 *    Reduce on <STRING> using <attrib_operator_sstar>-><attrib_operator> 
 *    Reduce on <IDENT> using <attrib_operator_sstar>-><attrib_operator> 
 *    Reduce on <RBRACKET> using <attrib_operator_sstar>-><attrib_operator> 
 *    Goto on <splus> to 145 because of <attrib_operator_sstar>-><attrib_operator>•<splus>
 *    Shift on <SS> to 55 because of <splus>->•<SS> 
 *    Shift on <SS> to 55 because of <splus>->•<SS><splus> 
 * ----------- 115 -----------
 *   --Itemset--
 *     <attrib_operator>-><INCLUDES>•
 *   --Transitions--
 *    Reduce on <SS> using <attrib_operator>-><INCLUDES> 
 *    Reduce on <STRING> using <attrib_operator>-><INCLUDES> 
 *    Reduce on <IDENT> using <attrib_operator>-><INCLUDES> 
 *    Reduce on <RBRACKET> using <attrib_operator>-><INCLUDES> 
 * ----------- 116 -----------
 *   --Itemset--
 *     <attrib_operator>-><DASHMATCH>•
 *   --Transitions--
 *    Reduce on <SS> using <attrib_operator>-><DASHMATCH> 
 *    Reduce on <STRING> using <attrib_operator>-><DASHMATCH> 
 *    Reduce on <IDENT> using <attrib_operator>-><DASHMATCH> 
 *    Reduce on <RBRACKET> using <attrib_operator>-><DASHMATCH> 
 * ----------- 117 -----------
 *   --Itemset--
 *     <attrib_operator>-><EQUAL>•
 *   --Transitions--
 *    Reduce on <SS> using <attrib_operator>-><EQUAL> 
 *    Reduce on <STRING> using <attrib_operator>-><EQUAL> 
 *    Reduce on <IDENT> using <attrib_operator>-><EQUAL> 
 *    Reduce on <RBRACKET> using <attrib_operator>-><EQUAL> 
 * ----------- 118 -----------
 *   --Itemset--
 *     <trimmed_ident>-><IDENT><splus>•
 *   --Transitions--
 *    Reduce on <RBRACKET> using <trimmed_ident>-><IDENT><splus> 
 *    Reduce on <INCLUDES> using <trimmed_ident>-><IDENT><splus> 
 *    Reduce on <DASHMATCH> using <trimmed_ident>-><IDENT><splus> 
 *    Reduce on <EQUAL> using <trimmed_ident>-><IDENT><splus> 
 *    Reduce on <RPAREN> using <trimmed_ident>-><IDENT><splus> 
 * ----------- 119 -----------
 *   --Itemset--
 *     <trimmed_ident>-><splus><IDENT>•
 *     <trimmed_ident>-><splus><IDENT>•<splus>
 *    +<splus>->•<SS>
 *    +<splus>->•<SS><splus>
 *   --Transitions--
 *    Reduce on <RBRACKET> using <trimmed_ident>-><splus><IDENT> 
 *    Reduce on <INCLUDES> using <trimmed_ident>-><splus><IDENT> 
 *    Reduce on <DASHMATCH> using <trimmed_ident>-><splus><IDENT> 
 *    Reduce on <EQUAL> using <trimmed_ident>-><splus><IDENT> 
 *    Reduce on <RPAREN> using <trimmed_ident>-><splus><IDENT> 
 *    Goto on <splus> to 146 because of <trimmed_ident>-><splus><IDENT>•<splus>
 *    Shift on <SS> to 55 because of <splus>->•<SS> 
 *    Shift on <SS> to 55 because of <splus>->•<SS><splus> 
 * ----------- 120 -----------
 *   --Itemset--
 *     <pseudo>-><COLON><CSSFUNCTION><trimmed_ident>•<RPAREN>
 *   --Transitions--
 *    Shift on <RPAREN> to 147 because of <pseudo>-><COLON><CSSFUNCTION><trimmed_ident>•<RPAREN> 
 * ----------- 121 -----------
 *   --Itemset--
 *     <pseudo>-><COLON><CSSFUNCTION><splus>•<RPAREN>
 *     <trimmed_ident>-><splus>•<IDENT>
 *     <trimmed_ident>-><splus>•<IDENT><splus>
 *   --Transitions--
 *    Shift on <RPAREN> to 148 because of <pseudo>-><COLON><CSSFUNCTION><splus>•<RPAREN> 
 *    Shift on <IDENT> to 119 because of <trimmed_ident>-><splus>•<IDENT> 
 *    Shift on <IDENT> to 119 because of <trimmed_ident>-><splus>•<IDENT><splus> 
 * ----------- 122 -----------
 *   --Itemset--
 *     <pseudo>-><COLON><CSSFUNCTION><RPAREN>•
 *   --Transitions--
 *    Reduce on <SS> using <pseudo>-><COLON><CSSFUNCTION><RPAREN> 
 *    Reduce on <COMMA> using <pseudo>-><COLON><CSSFUNCTION><RPAREN> 
 *    Reduce on <LBRACE> using <pseudo>-><COLON><CSSFUNCTION><RPAREN> 
 *    Reduce on <COLON> using <pseudo>-><COLON><CSSFUNCTION><RPAREN> 
 *    Reduce on <GREATER> using <pseudo>-><COLON><CSSFUNCTION><RPAREN> 
 *    Reduce on <PLUS> using <pseudo>-><COLON><CSSFUNCTION><RPAREN> 
 *    Reduce on <HASH> using <pseudo>-><COLON><CSSFUNCTION><RPAREN> 
 *    Reduce on <DOT> using <pseudo>-><COLON><CSSFUNCTION><RPAREN> 
 *    Reduce on <LBRACKET> using <pseudo>-><COLON><CSSFUNCTION><RPAREN> 
 * ----------- 123 -----------
 *   --Itemset--
 *     <import>-><import_sym_sstar><string_or_uri_sstar><medialist><SEMICOLON>•
 *   --Transitions--
 *    Reduce on <SS> using <import>-><import_sym_sstar><string_or_uri_sstar><medialist><SEMICOLON> 
 *    Reduce on <CDO> using <import>-><import_sym_sstar><string_or_uri_sstar><medialist><SEMICOLON> 
 *    Reduce on <CDC> using <import>-><import_sym_sstar><string_or_uri_sstar><medialist><SEMICOLON> 
 *    Reduce on <IMPORT_SYM> using <import>-><import_sym_sstar><string_or_uri_sstar><medialist><SEMICOLON> 
 *    Reduce on <MEDIA_SYM> using <import>-><import_sym_sstar><string_or_uri_sstar><medialist><SEMICOLON> 
 *    Reduce on <IDENT> using <import>-><import_sym_sstar><string_or_uri_sstar><medialist><SEMICOLON> 
 *    Reduce on <PAGE_SYM> using <import>-><import_sym_sstar><string_or_uri_sstar><medialist><SEMICOLON> 
 *    Reduce on <COLON> using <import>-><import_sym_sstar><string_or_uri_sstar><medialist><SEMICOLON> 
 *    Reduce on <HASH> using <import>-><import_sym_sstar><string_or_uri_sstar><medialist><SEMICOLON> 
 *    Reduce on <DOT> using <import>-><import_sym_sstar><string_or_uri_sstar><medialist><SEMICOLON> 
 *    Reduce on <STAR> using <import>-><import_sym_sstar><string_or_uri_sstar><medialist><SEMICOLON> 
 *    Reduce on <LBRACKET> using <import>-><import_sym_sstar><string_or_uri_sstar><medialist><SEMICOLON> 
 * ----------- 124 -----------
 *   --Itemset--
 *     <media>-><media_sym_sstar><medialist><LBRACE><splus>•<rulesetplus><RBRACE>
 *     <media>-><media_sym_sstar><medialist><LBRACE><splus>•<rulesetplus><RBRACE><splus>
 *     <media>-><media_sym_sstar><medialist><LBRACE><splus>•<RBRACE>
 *     <media>-><media_sym_sstar><medialist><LBRACE><splus>•<RBRACE><splus>
 *    +<rulesetplus>->•<ruleset>
 *    +<rulesetplus>->•<rulesetplus><ruleset>
 *    +<ruleset>->•<rruleset>
 *    +<rruleset>->•<selectors><LBRACE><declarations_optional_semicolon><RBRACE><splus>
 *    +<rruleset>->•<selectors><LBRACE><declarations_optional_semicolon><RBRACE>
 *    +<rruleset>->•<selectors><LBRACE><RBRACE>
 *    +<rruleset>->•<selectors><LBRACE><splus><RBRACE>
 *    +<rruleset>->•<selectors><LBRACE><RBRACE><splus>
 *    +<rruleset>->•<selectors><LBRACE><splus><RBRACE><splus>
 *    +<selectors>->•<selector>
 *    +<selectors>->•<selectors><comma_sstar><selector>
 *    +<selector>->•<simple_selector>
 *    +<selector>->•<simple_selector><combinator><selector>
 *    +<simple_selector>->•<element_name>
 *    +<simple_selector>->•<element_name><hash_class_attrib_pseudo_plus>
 *    +<simple_selector>->•<hash_class_attrib_pseudo_plus>
 *    +<element_name>->•<IDENT>
 *    +<element_name>->•<STAR>
 *    +<hash_class_attrib_pseudo_plus>->•<hash_class_attrib_pseudo>
 *    +<hash_class_attrib_pseudo_plus>->•<hash_class_attrib_pseudo_plus><hash_class_attrib_pseudo>
 *    +<hash_class_attrib_pseudo>->•<HASH>
 *    +<hash_class_attrib_pseudo>->•<class>
 *    +<hash_class_attrib_pseudo>->•<attrib>
 *    +<hash_class_attrib_pseudo>->•<pseudo>
 *    +<class>->•<DOT><IDENT>
 *    +<attrib>->•<LBRACKET><trimmed_ident><RBRACKET>
 *    +<attrib>->•<LBRACKET><trimmed_ident><attrib_operator_sstar><attrib_operator_rhand_sstar><RBRACKET>
 *    +<attrib>->•<LBRACKET><trimmed_ident><attrib_operator_sstar><RBRACKET>
 *    +<pseudo>->•<COLON><IDENT>
 *    +<pseudo>->•<COLON><CSSFUNCTION><trimmed_ident><RPAREN>
 *    +<pseudo>->•<COLON><CSSFUNCTION><splus><RPAREN>
 *    +<pseudo>->•<COLON><CSSFUNCTION><RPAREN>
 *   --Transitions--
 *    Goto on <rulesetplus> to 149 because of <media>-><media_sym_sstar><medialist><LBRACE><splus>•<rulesetplus><RBRACE>
 *    Goto on <rulesetplus> to 149 because of <media>-><media_sym_sstar><medialist><LBRACE><splus>•<rulesetplus><RBRACE><splus>
 *    Shift on <RBRACE> to 150 because of <media>-><media_sym_sstar><medialist><LBRACE><splus>•<RBRACE> 
 *    Shift on <RBRACE> to 150 because of <media>-><media_sym_sstar><medialist><LBRACE><splus>•<RBRACE><splus> 
 *    Goto on <ruleset> to 127 because of <rulesetplus>->•<ruleset>
 *    Goto on <rulesetplus> to 149 because of <rulesetplus>->•<rulesetplus><ruleset>
 *    Goto on <rruleset> to 21 because of <ruleset>->•<rruleset>
 *    Goto on <selectors> to 25 because of <rruleset>->•<selectors><LBRACE><declarations_optional_semicolon><RBRACE><splus>
 *    Goto on <selectors> to 25 because of <rruleset>->•<selectors><LBRACE><declarations_optional_semicolon><RBRACE>
 *    Goto on <selectors> to 25 because of <rruleset>->•<selectors><LBRACE><RBRACE>
 *    Goto on <selectors> to 25 because of <rruleset>->•<selectors><LBRACE><splus><RBRACE>
 *    Goto on <selectors> to 25 because of <rruleset>->•<selectors><LBRACE><RBRACE><splus>
 *    Goto on <selectors> to 25 because of <rruleset>->•<selectors><LBRACE><splus><RBRACE><splus>
 *    Goto on <selector> to 28 because of <selectors>->•<selector>
 *    Goto on <selectors> to 25 because of <selectors>->•<selectors><comma_sstar><selector>
 *    Goto on <simple_selector> to 30 because of <selector>->•<simple_selector>
 *    Goto on <simple_selector> to 30 because of <selector>->•<simple_selector><combinator><selector>
 *    Goto on <element_name> to 31 because of <simple_selector>->•<element_name>
 *    Goto on <element_name> to 31 because of <simple_selector>->•<element_name><hash_class_attrib_pseudo_plus>
 *    Goto on <hash_class_attrib_pseudo_plus> to 32 because of <simple_selector>->•<hash_class_attrib_pseudo_plus>
 *    Shift on <IDENT> to 33 because of <element_name>->•<IDENT> 
 *    Shift on <STAR> to 34 because of <element_name>->•<STAR> 
 *    Goto on <hash_class_attrib_pseudo> to 35 because of <hash_class_attrib_pseudo_plus>->•<hash_class_attrib_pseudo>
 *    Goto on <hash_class_attrib_pseudo_plus> to 32 because of <hash_class_attrib_pseudo_plus>->•<hash_class_attrib_pseudo_plus><hash_class_attrib_pseudo>
 *    Shift on <HASH> to 36 because of <hash_class_attrib_pseudo>->•<HASH> 
 *    Goto on <class> to 37 because of <hash_class_attrib_pseudo>->•<class>
 *    Goto on <attrib> to 38 because of <hash_class_attrib_pseudo>->•<attrib>
 *    Goto on <pseudo> to 39 because of <hash_class_attrib_pseudo>->•<pseudo>
 *    Shift on <DOT> to 40 because of <class>->•<DOT><IDENT> 
 *    Shift on <LBRACKET> to 41 because of <attrib>->•<LBRACKET><trimmed_ident><RBRACKET> 
 *    Shift on <LBRACKET> to 41 because of <attrib>->•<LBRACKET><trimmed_ident><attrib_operator_sstar><attrib_operator_rhand_sstar><RBRACKET> 
 *    Shift on <LBRACKET> to 41 because of <attrib>->•<LBRACKET><trimmed_ident><attrib_operator_sstar><RBRACKET> 
 *    Shift on <COLON> to 42 because of <pseudo>->•<COLON><IDENT> 
 *    Shift on <COLON> to 42 because of <pseudo>->•<COLON><CSSFUNCTION><trimmed_ident><RPAREN> 
 *    Shift on <COLON> to 42 because of <pseudo>->•<COLON><CSSFUNCTION><splus><RPAREN> 
 *    Shift on <COLON> to 42 because of <pseudo>->•<COLON><CSSFUNCTION><RPAREN> 
 * ----------- 125 -----------
 *   --Itemset--
 *     <media>-><media_sym_sstar><medialist><LBRACE><rulesetplus>•<RBRACE>
 *     <media>-><media_sym_sstar><medialist><LBRACE><rulesetplus>•<RBRACE><splus>
 *     <rulesetplus>-><rulesetplus>•<ruleset>
 *    +<ruleset>->•<rruleset>
 *    +<rruleset>->•<selectors><LBRACE><declarations_optional_semicolon><RBRACE><splus>
 *    +<rruleset>->•<selectors><LBRACE><declarations_optional_semicolon><RBRACE>
 *    +<rruleset>->•<selectors><LBRACE><RBRACE>
 *    +<rruleset>->•<selectors><LBRACE><splus><RBRACE>
 *    +<rruleset>->•<selectors><LBRACE><RBRACE><splus>
 *    +<rruleset>->•<selectors><LBRACE><splus><RBRACE><splus>
 *    +<selectors>->•<selector>
 *    +<selectors>->•<selectors><comma_sstar><selector>
 *    +<selector>->•<simple_selector>
 *    +<selector>->•<simple_selector><combinator><selector>
 *    +<simple_selector>->•<element_name>
 *    +<simple_selector>->•<element_name><hash_class_attrib_pseudo_plus>
 *    +<simple_selector>->•<hash_class_attrib_pseudo_plus>
 *    +<element_name>->•<IDENT>
 *    +<element_name>->•<STAR>
 *    +<hash_class_attrib_pseudo_plus>->•<hash_class_attrib_pseudo>
 *    +<hash_class_attrib_pseudo_plus>->•<hash_class_attrib_pseudo_plus><hash_class_attrib_pseudo>
 *    +<hash_class_attrib_pseudo>->•<HASH>
 *    +<hash_class_attrib_pseudo>->•<class>
 *    +<hash_class_attrib_pseudo>->•<attrib>
 *    +<hash_class_attrib_pseudo>->•<pseudo>
 *    +<class>->•<DOT><IDENT>
 *    +<attrib>->•<LBRACKET><trimmed_ident><RBRACKET>
 *    +<attrib>->•<LBRACKET><trimmed_ident><attrib_operator_sstar><attrib_operator_rhand_sstar><RBRACKET>
 *    +<attrib>->•<LBRACKET><trimmed_ident><attrib_operator_sstar><RBRACKET>
 *    +<pseudo>->•<COLON><IDENT>
 *    +<pseudo>->•<COLON><CSSFUNCTION><trimmed_ident><RPAREN>
 *    +<pseudo>->•<COLON><CSSFUNCTION><splus><RPAREN>
 *    +<pseudo>->•<COLON><CSSFUNCTION><RPAREN>
 *   --Transitions--
 *    Shift on <RBRACE> to 151 because of <media>-><media_sym_sstar><medialist><LBRACE><rulesetplus>•<RBRACE> 
 *    Shift on <RBRACE> to 151 because of <media>-><media_sym_sstar><medialist><LBRACE><rulesetplus>•<RBRACE><splus> 
 *    Goto on <ruleset> to 152 because of <rulesetplus>-><rulesetplus>•<ruleset>
 *    Goto on <rruleset> to 21 because of <ruleset>->•<rruleset>
 *    Goto on <selectors> to 25 because of <rruleset>->•<selectors><LBRACE><declarations_optional_semicolon><RBRACE><splus>
 *    Goto on <selectors> to 25 because of <rruleset>->•<selectors><LBRACE><declarations_optional_semicolon><RBRACE>
 *    Goto on <selectors> to 25 because of <rruleset>->•<selectors><LBRACE><RBRACE>
 *    Goto on <selectors> to 25 because of <rruleset>->•<selectors><LBRACE><splus><RBRACE>
 *    Goto on <selectors> to 25 because of <rruleset>->•<selectors><LBRACE><RBRACE><splus>
 *    Goto on <selectors> to 25 because of <rruleset>->•<selectors><LBRACE><splus><RBRACE><splus>
 *    Goto on <selector> to 28 because of <selectors>->•<selector>
 *    Goto on <selectors> to 25 because of <selectors>->•<selectors><comma_sstar><selector>
 *    Goto on <simple_selector> to 30 because of <selector>->•<simple_selector>
 *    Goto on <simple_selector> to 30 because of <selector>->•<simple_selector><combinator><selector>
 *    Goto on <element_name> to 31 because of <simple_selector>->•<element_name>
 *    Goto on <element_name> to 31 because of <simple_selector>->•<element_name><hash_class_attrib_pseudo_plus>
 *    Goto on <hash_class_attrib_pseudo_plus> to 32 because of <simple_selector>->•<hash_class_attrib_pseudo_plus>
 *    Shift on <IDENT> to 33 because of <element_name>->•<IDENT> 
 *    Shift on <STAR> to 34 because of <element_name>->•<STAR> 
 *    Goto on <hash_class_attrib_pseudo> to 35 because of <hash_class_attrib_pseudo_plus>->•<hash_class_attrib_pseudo>
 *    Goto on <hash_class_attrib_pseudo_plus> to 32 because of <hash_class_attrib_pseudo_plus>->•<hash_class_attrib_pseudo_plus><hash_class_attrib_pseudo>
 *    Shift on <HASH> to 36 because of <hash_class_attrib_pseudo>->•<HASH> 
 *    Goto on <class> to 37 because of <hash_class_attrib_pseudo>->•<class>
 *    Goto on <attrib> to 38 because of <hash_class_attrib_pseudo>->•<attrib>
 *    Goto on <pseudo> to 39 because of <hash_class_attrib_pseudo>->•<pseudo>
 *    Shift on <DOT> to 40 because of <class>->•<DOT><IDENT> 
 *    Shift on <LBRACKET> to 41 because of <attrib>->•<LBRACKET><trimmed_ident><RBRACKET> 
 *    Shift on <LBRACKET> to 41 because of <attrib>->•<LBRACKET><trimmed_ident><attrib_operator_sstar><attrib_operator_rhand_sstar><RBRACKET> 
 *    Shift on <LBRACKET> to 41 because of <attrib>->•<LBRACKET><trimmed_ident><attrib_operator_sstar><RBRACKET> 
 *    Shift on <COLON> to 42 because of <pseudo>->•<COLON><IDENT> 
 *    Shift on <COLON> to 42 because of <pseudo>->•<COLON><CSSFUNCTION><trimmed_ident><RPAREN> 
 *    Shift on <COLON> to 42 because of <pseudo>->•<COLON><CSSFUNCTION><splus><RPAREN> 
 *    Shift on <COLON> to 42 because of <pseudo>->•<COLON><CSSFUNCTION><RPAREN> 
 * ----------- 126 -----------
 *   --Itemset--
 *     <media>-><media_sym_sstar><medialist><LBRACE><RBRACE>•
 *     <media>-><media_sym_sstar><medialist><LBRACE><RBRACE>•<splus>
 *    +<splus>->•<SS>
 *    +<splus>->•<SS><splus>
 *   --Transitions--
 *    Reduce on <MEDIA_SYM> using <media>-><media_sym_sstar><medialist><LBRACE><RBRACE> 
 *    Reduce on <IDENT> using <media>-><media_sym_sstar><medialist><LBRACE><RBRACE> 
 *    Reduce on <PAGE_SYM> using <media>-><media_sym_sstar><medialist><LBRACE><RBRACE> 
 *    Reduce on <COLON> using <media>-><media_sym_sstar><medialist><LBRACE><RBRACE> 
 *    Reduce on <HASH> using <media>-><media_sym_sstar><medialist><LBRACE><RBRACE> 
 *    Reduce on <DOT> using <media>-><media_sym_sstar><medialist><LBRACE><RBRACE> 
 *    Reduce on <STAR> using <media>-><media_sym_sstar><medialist><LBRACE><RBRACE> 
 *    Reduce on <LBRACKET> using <media>-><media_sym_sstar><medialist><LBRACE><RBRACE> 
 *    Reduce on  using <media>-><media_sym_sstar><medialist><LBRACE><RBRACE> 
 *    Goto on <splus> to 153 because of <media>-><media_sym_sstar><medialist><LBRACE><RBRACE>•<splus>
 *    Shift on <SS> to 55 because of <splus>->•<SS> 
 *    Shift on <SS> to 55 because of <splus>->•<SS><splus> 
 * ----------- 127 -----------
 *   --Itemset--
 *     <rulesetplus>-><ruleset>•
 *   --Transitions--
 *    Reduce on <RBRACE> using <rulesetplus>-><ruleset> 
 *    Reduce on <IDENT> using <rulesetplus>-><ruleset> 
 *    Reduce on <COLON> using <rulesetplus>-><ruleset> 
 *    Reduce on <HASH> using <rulesetplus>-><ruleset> 
 *    Reduce on <DOT> using <rulesetplus>-><ruleset> 
 *    Reduce on <STAR> using <rulesetplus>-><ruleset> 
 *    Reduce on <LBRACKET> using <rulesetplus>-><ruleset> 
 * ----------- 128 -----------
 *   --Itemset--
 *     <medialist>-><medialist><COMMA><medium>•
 *   --Transitions--
 *    Reduce on <SEMICOLON> using <medialist>-><medialist><COMMA><medium> 
 *    Reduce on <COMMA> using <medialist>-><medialist><COMMA><medium> 
 *    Reduce on <LBRACE> using <medialist>-><medialist><COMMA><medium> 
 * ----------- 129 -----------
 *   --Itemset--
 *     <medialist>-><medialist><COMMA><splus>•<medium>
 *    +<medium>->•<IDENT>
 *    +<medium>->•<IDENT><splus>
 *   --Transitions--
 *    Goto on <medium> to 154 because of <medialist>-><medialist><COMMA><splus>•<medium>
 *    Shift on <IDENT> to 61 because of <medium>->•<IDENT> 
 *    Shift on <IDENT> to 61 because of <medium>->•<IDENT><splus> 
 * ----------- 130 -----------
 *   --Itemset--
 *     <rruleset>-><selectors><LBRACE><declarations_optional_semicolon><RBRACE>•<splus>
 *     <rruleset>-><selectors><LBRACE><declarations_optional_semicolon><RBRACE>•
 *    +<splus>->•<SS>
 *    +<splus>->•<SS><splus>
 *   --Transitions--
 *    Goto on <splus> to 155 because of <rruleset>-><selectors><LBRACE><declarations_optional_semicolon><RBRACE>•<splus>
 *    Reduce on <RBRACE> using <rruleset>-><selectors><LBRACE><declarations_optional_semicolon><RBRACE> 
 *    Reduce on <MEDIA_SYM> using <rruleset>-><selectors><LBRACE><declarations_optional_semicolon><RBRACE> 
 *    Reduce on <IDENT> using <rruleset>-><selectors><LBRACE><declarations_optional_semicolon><RBRACE> 
 *    Reduce on <PAGE_SYM> using <rruleset>-><selectors><LBRACE><declarations_optional_semicolon><RBRACE> 
 *    Reduce on <COLON> using <rruleset>-><selectors><LBRACE><declarations_optional_semicolon><RBRACE> 
 *    Reduce on <HASH> using <rruleset>-><selectors><LBRACE><declarations_optional_semicolon><RBRACE> 
 *    Reduce on <DOT> using <rruleset>-><selectors><LBRACE><declarations_optional_semicolon><RBRACE> 
 *    Reduce on <STAR> using <rruleset>-><selectors><LBRACE><declarations_optional_semicolon><RBRACE> 
 *    Reduce on <LBRACKET> using <rruleset>-><selectors><LBRACE><declarations_optional_semicolon><RBRACE> 
 *    Reduce on  using <rruleset>-><selectors><LBRACE><declarations_optional_semicolon><RBRACE> 
 *    Shift on <SS> to 55 because of <splus>->•<SS> 
 *    Shift on <SS> to 55 because of <splus>->•<SS><splus> 
 * ----------- 131 -----------
 *   --Itemset--
 *     <rruleset>-><selectors><LBRACE><RBRACE><splus>•
 *   --Transitions--
 *    Reduce on <RBRACE> using <rruleset>-><selectors><LBRACE><RBRACE><splus> 
 *    Reduce on <MEDIA_SYM> using <rruleset>-><selectors><LBRACE><RBRACE><splus> 
 *    Reduce on <IDENT> using <rruleset>-><selectors><LBRACE><RBRACE><splus> 
 *    Reduce on <PAGE_SYM> using <rruleset>-><selectors><LBRACE><RBRACE><splus> 
 *    Reduce on <COLON> using <rruleset>-><selectors><LBRACE><RBRACE><splus> 
 *    Reduce on <HASH> using <rruleset>-><selectors><LBRACE><RBRACE><splus> 
 *    Reduce on <DOT> using <rruleset>-><selectors><LBRACE><RBRACE><splus> 
 *    Reduce on <STAR> using <rruleset>-><selectors><LBRACE><RBRACE><splus> 
 *    Reduce on <LBRACKET> using <rruleset>-><selectors><LBRACE><RBRACE><splus> 
 *    Reduce on  using <rruleset>-><selectors><LBRACE><RBRACE><splus> 
 * ----------- 132 -----------
 *   --Itemset--
 *     <rruleset>-><selectors><LBRACE><splus><RBRACE>•
 *     <rruleset>-><selectors><LBRACE><splus><RBRACE>•<splus>
 *    +<splus>->•<SS>
 *    +<splus>->•<SS><splus>
 *   --Transitions--
 *    Reduce on <RBRACE> using <rruleset>-><selectors><LBRACE><splus><RBRACE> 
 *    Reduce on <MEDIA_SYM> using <rruleset>-><selectors><LBRACE><splus><RBRACE> 
 *    Reduce on <IDENT> using <rruleset>-><selectors><LBRACE><splus><RBRACE> 
 *    Reduce on <PAGE_SYM> using <rruleset>-><selectors><LBRACE><splus><RBRACE> 
 *    Reduce on <COLON> using <rruleset>-><selectors><LBRACE><splus><RBRACE> 
 *    Reduce on <HASH> using <rruleset>-><selectors><LBRACE><splus><RBRACE> 
 *    Reduce on <DOT> using <rruleset>-><selectors><LBRACE><splus><RBRACE> 
 *    Reduce on <STAR> using <rruleset>-><selectors><LBRACE><splus><RBRACE> 
 *    Reduce on <LBRACKET> using <rruleset>-><selectors><LBRACE><splus><RBRACE> 
 *    Reduce on  using <rruleset>-><selectors><LBRACE><splus><RBRACE> 
 *    Goto on <splus> to 156 because of <rruleset>-><selectors><LBRACE><splus><RBRACE>•<splus>
 *    Shift on <SS> to 55 because of <splus>->•<SS> 
 *    Shift on <SS> to 55 because of <splus>->•<SS><splus> 
 * ----------- 133 -----------
 *   --Itemset--
 *     <sstar_declaration>-><splus><declaration>•
 *   --Transitions--
 *    Reduce on <SEMICOLON> using <sstar_declaration>-><splus><declaration> 
 *    Reduce on <RBRACE> using <sstar_declaration>-><splus><declaration> 
 * ----------- 134 -----------
 *   --Itemset--
 *     <declarations_optional_semicolon>-><declarations><SEMICOLON>•
 *     <declarations>-><declarations><SEMICOLON>•<sstar_declaration>
 *    +<sstar_declaration>->•<declaration>
 *    +<sstar_declaration>->•<splus><declaration>
 *    +<declaration>->•<ddeclaration>
 *    +<splus>->•<SS>
 *    +<splus>->•<SS><splus>
 *    +<ddeclaration>->•<property><COLON><splus><expr><prio>
 *    +<ddeclaration>->•<property><COLON><splus><expr>
 *    +<ddeclaration>->•<property><COLON><expr><prio>
 *    +<ddeclaration>->•<property><COLON><expr>
 *    +<property>->•<IDENT>
 *    +<property>->•<IDENT><splus>
 *   --Transitions--
 *    Reduce on <RBRACE> using <declarations_optional_semicolon>-><declarations><SEMICOLON> 
 *    Goto on <sstar_declaration> to 157 because of <declarations>-><declarations><SEMICOLON>•<sstar_declaration>
 *    Goto on <declaration> to 98 because of <sstar_declaration>->•<declaration>
 *    Goto on <splus> to 107 because of <sstar_declaration>->•<splus><declaration>
 *    Goto on <ddeclaration> to 99 because of <declaration>->•<ddeclaration>
 *    Shift on <SS> to 55 because of <splus>->•<SS> 
 *    Shift on <SS> to 55 because of <splus>->•<SS><splus> 
 *    Goto on <property> to 100 because of <ddeclaration>->•<property><COLON><splus><expr><prio>
 *    Goto on <property> to 100 because of <ddeclaration>->•<property><COLON><splus><expr>
 *    Goto on <property> to 100 because of <ddeclaration>->•<property><COLON><expr><prio>
 *    Goto on <property> to 100 because of <ddeclaration>->•<property><COLON><expr>
 *    Shift on <IDENT> to 101 because of <property>->•<IDENT> 
 *    Shift on <IDENT> to 101 because of <property>->•<IDENT><splus> 
 * ----------- 135 -----------
 *   --Itemset--
 *     <ddeclaration>-><property><COLON>•<splus><expr><prio>
 *     <ddeclaration>-><property><COLON>•<splus><expr>
 *     <ddeclaration>-><property><COLON>•<expr><prio>
 *     <ddeclaration>-><property><COLON>•<expr>
 *    +<splus>->•<SS>
 *    +<splus>->•<SS><splus>
 *    +<expr>->•<term>
 *    +<expr>->•<expr><term>
 *    +<expr>->•<expr><operator><term>
 *    +<term>->•<term_numeric>
 *    +<term>->•<term_nonnumeric>
 *    +<term_numeric>->•<unary_operator><term_numeric_number>
 *    +<term_numeric>->•<term_numeric_number>
 *    +<term_nonnumeric>->•<STRING>
 *    +<term_nonnumeric>->•<STRING><splus>
 *    +<term_nonnumeric>->•<IDENT>
 *    +<term_nonnumeric>->•<IDENT><splus>
 *    +<term_nonnumeric>->•<URI>
 *    +<term_nonnumeric>->•<URI><splus>
 *    +<term_nonnumeric>->•<hexcolor>
 *    +<term_nonnumeric>->•<function>
 *    +<unary_operator>->•<MINUS>
 *    +<unary_operator>->•<PLUS>
 *    +<term_numeric_number>->•<NUMBER>
 *    +<term_numeric_number>->•<NUMBER><splus>
 *    +<term_numeric_number>->•<PERCENTAGE>
 *    +<term_numeric_number>->•<PERCENTAGE><splus>
 *    +<term_numeric_number>->•<LENGTH>
 *    +<term_numeric_number>->•<LENGTH><splus>
 *    +<term_numeric_number>->•<EMS>
 *    +<term_numeric_number>->•<EMS><splus>
 *    +<term_numeric_number>->•<EXS>
 *    +<term_numeric_number>->•<EXS><splus>
 *    +<term_numeric_number>->•<ANGLE>
 *    +<term_numeric_number>->•<ANGLE><splus>
 *    +<term_numeric_number>->•<TIME>
 *    +<term_numeric_number>->•<TIME><splus>
 *    +<term_numeric_number>->•<FREQ>
 *    +<term_numeric_number>->•<FREQ><splus>
 *    +<term_numeric_number>->•<DIMENSION>
 *    +<term_numeric_number>->•<DIMENSION><splus>
 *    +<hexcolor>->•<HASH>
 *    +<hexcolor>->•<HASH><splus>
 *    +<function>->•<CSSFUNCTION><splus><expr><RPAREN><splus>
 *    +<function>->•<CSSFUNCTION><splus><expr><RPAREN>
 *    +<function>->•<CSSFUNCTION><expr><RPAREN><splus>
 *    +<function>->•<CSSFUNCTION><expr><RPAREN>
 *   --Transitions--
 *    Goto on <splus> to 158 because of <ddeclaration>-><property><COLON>•<splus><expr><prio>
 *    Goto on <splus> to 158 because of <ddeclaration>-><property><COLON>•<splus><expr>
 *    Goto on <expr> to 159 because of <ddeclaration>-><property><COLON>•<expr><prio>
 *    Goto on <expr> to 159 because of <ddeclaration>-><property><COLON>•<expr>
 *    Shift on <SS> to 55 because of <splus>->•<SS> 
 *    Shift on <SS> to 55 because of <splus>->•<SS><splus> 
 *    Goto on <term> to 160 because of <expr>->•<term>
 *    Goto on <expr> to 159 because of <expr>->•<expr><term>
 *    Goto on <expr> to 159 because of <expr>->•<expr><operator><term>
 *    Goto on <term_numeric> to 161 because of <term>->•<term_numeric>
 *    Goto on <term_nonnumeric> to 162 because of <term>->•<term_nonnumeric>
 *    Goto on <unary_operator> to 163 because of <term_numeric>->•<unary_operator><term_numeric_number>
 *    Goto on <term_numeric_number> to 164 because of <term_numeric>->•<term_numeric_number>
 *    Shift on <STRING> to 165 because of <term_nonnumeric>->•<STRING> 
 *    Shift on <STRING> to 165 because of <term_nonnumeric>->•<STRING><splus> 
 *    Shift on <IDENT> to 166 because of <term_nonnumeric>->•<IDENT> 
 *    Shift on <IDENT> to 166 because of <term_nonnumeric>->•<IDENT><splus> 
 *    Shift on <URI> to 167 because of <term_nonnumeric>->•<URI> 
 *    Shift on <URI> to 167 because of <term_nonnumeric>->•<URI><splus> 
 *    Goto on <hexcolor> to 168 because of <term_nonnumeric>->•<hexcolor>
 *    Goto on <function> to 169 because of <term_nonnumeric>->•<function>
 *    Shift on <MINUS> to 170 because of <unary_operator>->•<MINUS> 
 *    Shift on <PLUS> to 171 because of <unary_operator>->•<PLUS> 
 *    Shift on <NUMBER> to 172 because of <term_numeric_number>->•<NUMBER> 
 *    Shift on <NUMBER> to 172 because of <term_numeric_number>->•<NUMBER><splus> 
 *    Shift on <PERCENTAGE> to 173 because of <term_numeric_number>->•<PERCENTAGE> 
 *    Shift on <PERCENTAGE> to 173 because of <term_numeric_number>->•<PERCENTAGE><splus> 
 *    Shift on <LENGTH> to 174 because of <term_numeric_number>->•<LENGTH> 
 *    Shift on <LENGTH> to 174 because of <term_numeric_number>->•<LENGTH><splus> 
 *    Shift on <EMS> to 175 because of <term_numeric_number>->•<EMS> 
 *    Shift on <EMS> to 175 because of <term_numeric_number>->•<EMS><splus> 
 *    Shift on <EXS> to 176 because of <term_numeric_number>->•<EXS> 
 *    Shift on <EXS> to 176 because of <term_numeric_number>->•<EXS><splus> 
 *    Shift on <ANGLE> to 177 because of <term_numeric_number>->•<ANGLE> 
 *    Shift on <ANGLE> to 177 because of <term_numeric_number>->•<ANGLE><splus> 
 *    Shift on <TIME> to 178 because of <term_numeric_number>->•<TIME> 
 *    Shift on <TIME> to 178 because of <term_numeric_number>->•<TIME><splus> 
 *    Shift on <FREQ> to 179 because of <term_numeric_number>->•<FREQ> 
 *    Shift on <FREQ> to 179 because of <term_numeric_number>->•<FREQ><splus> 
 *    Shift on <DIMENSION> to 180 because of <term_numeric_number>->•<DIMENSION> 
 *    Shift on <DIMENSION> to 180 because of <term_numeric_number>->•<DIMENSION><splus> 
 *    Shift on <HASH> to 181 because of <hexcolor>->•<HASH> 
 *    Shift on <HASH> to 181 because of <hexcolor>->•<HASH><splus> 
 *    Shift on <CSSFUNCTION> to 182 because of <function>->•<CSSFUNCTION><splus><expr><RPAREN><splus> 
 *    Shift on <CSSFUNCTION> to 182 because of <function>->•<CSSFUNCTION><splus><expr><RPAREN> 
 *    Shift on <CSSFUNCTION> to 182 because of <function>->•<CSSFUNCTION><expr><RPAREN><splus> 
 *    Shift on <CSSFUNCTION> to 182 because of <function>->•<CSSFUNCTION><expr><RPAREN> 
 * ----------- 136 -----------
 *   --Itemset--
 *     <property>-><IDENT><splus>•
 *   --Transitions--
 *    Reduce on <COLON> using <property>-><IDENT><splus> 
 * ----------- 137 -----------
 *   --Itemset--
 *     <ppage>-><pagesym_sstar><pseudo_page><splus><LBRACE>•<declarations_optional_semicolon><RBRACE>
 *     <ppage>-><pagesym_sstar><pseudo_page><splus><LBRACE>•<declarations_optional_semicolon><RBRACE><splus>
 *    +<declarations_optional_semicolon>->•<declarations>
 *    +<declarations_optional_semicolon>->•<declarations><SEMICOLON>
 *    +<declarations>->•<sstar_declaration>
 *    +<declarations>->•<declarations><SEMICOLON><sstar_declaration>
 *    +<sstar_declaration>->•<declaration>
 *    +<sstar_declaration>->•<splus><declaration>
 *    +<declaration>->•<ddeclaration>
 *    +<splus>->•<SS>
 *    +<splus>->•<SS><splus>
 *    +<ddeclaration>->•<property><COLON><splus><expr><prio>
 *    +<ddeclaration>->•<property><COLON><splus><expr>
 *    +<ddeclaration>->•<property><COLON><expr><prio>
 *    +<ddeclaration>->•<property><COLON><expr>
 *    +<property>->•<IDENT>
 *    +<property>->•<IDENT><splus>
 *   --Transitions--
 *    Goto on <declarations_optional_semicolon> to 183 because of <ppage>-><pagesym_sstar><pseudo_page><splus><LBRACE>•<declarations_optional_semicolon><RBRACE>
 *    Goto on <declarations_optional_semicolon> to 183 because of <ppage>-><pagesym_sstar><pseudo_page><splus><LBRACE>•<declarations_optional_semicolon><RBRACE><splus>
 *    Goto on <declarations> to 96 because of <declarations_optional_semicolon>->•<declarations>
 *    Goto on <declarations> to 96 because of <declarations_optional_semicolon>->•<declarations><SEMICOLON>
 *    Goto on <sstar_declaration> to 97 because of <declarations>->•<sstar_declaration>
 *    Goto on <declarations> to 96 because of <declarations>->•<declarations><SEMICOLON><sstar_declaration>
 *    Goto on <declaration> to 98 because of <sstar_declaration>->•<declaration>
 *    Goto on <splus> to 107 because of <sstar_declaration>->•<splus><declaration>
 *    Goto on <ddeclaration> to 99 because of <declaration>->•<ddeclaration>
 *    Shift on <SS> to 55 because of <splus>->•<SS> 
 *    Shift on <SS> to 55 because of <splus>->•<SS><splus> 
 *    Goto on <property> to 100 because of <ddeclaration>->•<property><COLON><splus><expr><prio>
 *    Goto on <property> to 100 because of <ddeclaration>->•<property><COLON><splus><expr>
 *    Goto on <property> to 100 because of <ddeclaration>->•<property><COLON><expr><prio>
 *    Goto on <property> to 100 because of <ddeclaration>->•<property><COLON><expr>
 *    Shift on <IDENT> to 101 because of <property>->•<IDENT> 
 *    Shift on <IDENT> to 101 because of <property>->•<IDENT><splus> 
 * ----------- 138 -----------
 *   --Itemset--
 *     <ppage>-><pagesym_sstar><pseudo_page><LBRACE><declarations_optional_semicolon>•<RBRACE>
 *     <ppage>-><pagesym_sstar><pseudo_page><LBRACE><declarations_optional_semicolon>•<RBRACE><splus>
 *   --Transitions--
 *    Shift on <RBRACE> to 184 because of <ppage>-><pagesym_sstar><pseudo_page><LBRACE><declarations_optional_semicolon>•<RBRACE> 
 *    Shift on <RBRACE> to 184 because of <ppage>-><pagesym_sstar><pseudo_page><LBRACE><declarations_optional_semicolon>•<RBRACE><splus> 
 * ----------- 139 -----------
 *   --Itemset--
 *     <ppage>-><pagesym_sstar><LBRACE><declarations_optional_semicolon><RBRACE>•
 *     <ppage>-><pagesym_sstar><LBRACE><declarations_optional_semicolon><RBRACE>•<splus>
 *    +<splus>->•<SS>
 *    +<splus>->•<SS><splus>
 *   --Transitions--
 *    Reduce on <MEDIA_SYM> using <ppage>-><pagesym_sstar><LBRACE><declarations_optional_semicolon><RBRACE> 
 *    Reduce on <IDENT> using <ppage>-><pagesym_sstar><LBRACE><declarations_optional_semicolon><RBRACE> 
 *    Reduce on <PAGE_SYM> using <ppage>-><pagesym_sstar><LBRACE><declarations_optional_semicolon><RBRACE> 
 *    Reduce on <COLON> using <ppage>-><pagesym_sstar><LBRACE><declarations_optional_semicolon><RBRACE> 
 *    Reduce on <HASH> using <ppage>-><pagesym_sstar><LBRACE><declarations_optional_semicolon><RBRACE> 
 *    Reduce on <DOT> using <ppage>-><pagesym_sstar><LBRACE><declarations_optional_semicolon><RBRACE> 
 *    Reduce on <STAR> using <ppage>-><pagesym_sstar><LBRACE><declarations_optional_semicolon><RBRACE> 
 *    Reduce on <LBRACKET> using <ppage>-><pagesym_sstar><LBRACE><declarations_optional_semicolon><RBRACE> 
 *    Reduce on  using <ppage>-><pagesym_sstar><LBRACE><declarations_optional_semicolon><RBRACE> 
 *    Goto on <splus> to 185 because of <ppage>-><pagesym_sstar><LBRACE><declarations_optional_semicolon><RBRACE>•<splus>
 *    Shift on <SS> to 55 because of <splus>->•<SS> 
 *    Shift on <SS> to 55 because of <splus>->•<SS><splus> 
 * ----------- 140 -----------
 *   --Itemset--
 *     <attrib>-><LBRACKET><trimmed_ident><attrib_operator_sstar><attrib_operator_rhand_sstar>•<RBRACKET>
 *   --Transitions--
 *    Shift on <RBRACKET> to 186 because of <attrib>-><LBRACKET><trimmed_ident><attrib_operator_sstar><attrib_operator_rhand_sstar>•<RBRACKET> 
 * ----------- 141 -----------
 *   --Itemset--
 *     <attrib>-><LBRACKET><trimmed_ident><attrib_operator_sstar><RBRACKET>•
 *   --Transitions--
 *    Reduce on <SS> using <attrib>-><LBRACKET><trimmed_ident><attrib_operator_sstar><RBRACKET> 
 *    Reduce on <COMMA> using <attrib>-><LBRACKET><trimmed_ident><attrib_operator_sstar><RBRACKET> 
 *    Reduce on <LBRACE> using <attrib>-><LBRACKET><trimmed_ident><attrib_operator_sstar><RBRACKET> 
 *    Reduce on <COLON> using <attrib>-><LBRACKET><trimmed_ident><attrib_operator_sstar><RBRACKET> 
 *    Reduce on <GREATER> using <attrib>-><LBRACKET><trimmed_ident><attrib_operator_sstar><RBRACKET> 
 *    Reduce on <PLUS> using <attrib>-><LBRACKET><trimmed_ident><attrib_operator_sstar><RBRACKET> 
 *    Reduce on <HASH> using <attrib>-><LBRACKET><trimmed_ident><attrib_operator_sstar><RBRACKET> 
 *    Reduce on <DOT> using <attrib>-><LBRACKET><trimmed_ident><attrib_operator_sstar><RBRACKET> 
 *    Reduce on <LBRACKET> using <attrib>-><LBRACKET><trimmed_ident><attrib_operator_sstar><RBRACKET> 
 * ----------- 142 -----------
 *   --Itemset--
 *     <attrib_operator_rhand_sstar>-><attrib_operator_rhand>•
 *     <attrib_operator_rhand_sstar>-><attrib_operator_rhand>•<splus>
 *    +<splus>->•<SS>
 *    +<splus>->•<SS><splus>
 *   --Transitions--
 *    Reduce on <RBRACKET> using <attrib_operator_rhand_sstar>-><attrib_operator_rhand> 
 *    Goto on <splus> to 187 because of <attrib_operator_rhand_sstar>-><attrib_operator_rhand>•<splus>
 *    Shift on <SS> to 55 because of <splus>->•<SS> 
 *    Shift on <SS> to 55 because of <splus>->•<SS><splus> 
 * ----------- 143 -----------
 *   --Itemset--
 *     <attrib_operator_rhand>-><STRING>•
 *   --Transitions--
 *    Reduce on <SS> using <attrib_operator_rhand>-><STRING> 
 *    Reduce on <RBRACKET> using <attrib_operator_rhand>-><STRING> 
 * ----------- 144 -----------
 *   --Itemset--
 *     <attrib_operator_rhand>-><IDENT>•
 *   --Transitions--
 *    Reduce on <SS> using <attrib_operator_rhand>-><IDENT> 
 *    Reduce on <RBRACKET> using <attrib_operator_rhand>-><IDENT> 
 * ----------- 145 -----------
 *   --Itemset--
 *     <attrib_operator_sstar>-><attrib_operator><splus>•
 *   --Transitions--
 *    Reduce on <STRING> using <attrib_operator_sstar>-><attrib_operator><splus> 
 *    Reduce on <IDENT> using <attrib_operator_sstar>-><attrib_operator><splus> 
 *    Reduce on <RBRACKET> using <attrib_operator_sstar>-><attrib_operator><splus> 
 * ----------- 146 -----------
 *   --Itemset--
 *     <trimmed_ident>-><splus><IDENT><splus>•
 *   --Transitions--
 *    Reduce on <RBRACKET> using <trimmed_ident>-><splus><IDENT><splus> 
 *    Reduce on <INCLUDES> using <trimmed_ident>-><splus><IDENT><splus> 
 *    Reduce on <DASHMATCH> using <trimmed_ident>-><splus><IDENT><splus> 
 *    Reduce on <EQUAL> using <trimmed_ident>-><splus><IDENT><splus> 
 *    Reduce on <RPAREN> using <trimmed_ident>-><splus><IDENT><splus> 
 * ----------- 147 -----------
 *   --Itemset--
 *     <pseudo>-><COLON><CSSFUNCTION><trimmed_ident><RPAREN>•
 *   --Transitions--
 *    Reduce on <SS> using <pseudo>-><COLON><CSSFUNCTION><trimmed_ident><RPAREN> 
 *    Reduce on <COMMA> using <pseudo>-><COLON><CSSFUNCTION><trimmed_ident><RPAREN> 
 *    Reduce on <LBRACE> using <pseudo>-><COLON><CSSFUNCTION><trimmed_ident><RPAREN> 
 *    Reduce on <COLON> using <pseudo>-><COLON><CSSFUNCTION><trimmed_ident><RPAREN> 
 *    Reduce on <GREATER> using <pseudo>-><COLON><CSSFUNCTION><trimmed_ident><RPAREN> 
 *    Reduce on <PLUS> using <pseudo>-><COLON><CSSFUNCTION><trimmed_ident><RPAREN> 
 *    Reduce on <HASH> using <pseudo>-><COLON><CSSFUNCTION><trimmed_ident><RPAREN> 
 *    Reduce on <DOT> using <pseudo>-><COLON><CSSFUNCTION><trimmed_ident><RPAREN> 
 *    Reduce on <LBRACKET> using <pseudo>-><COLON><CSSFUNCTION><trimmed_ident><RPAREN> 
 * ----------- 148 -----------
 *   --Itemset--
 *     <pseudo>-><COLON><CSSFUNCTION><splus><RPAREN>•
 *   --Transitions--
 *    Reduce on <SS> using <pseudo>-><COLON><CSSFUNCTION><splus><RPAREN> 
 *    Reduce on <COMMA> using <pseudo>-><COLON><CSSFUNCTION><splus><RPAREN> 
 *    Reduce on <LBRACE> using <pseudo>-><COLON><CSSFUNCTION><splus><RPAREN> 
 *    Reduce on <COLON> using <pseudo>-><COLON><CSSFUNCTION><splus><RPAREN> 
 *    Reduce on <GREATER> using <pseudo>-><COLON><CSSFUNCTION><splus><RPAREN> 
 *    Reduce on <PLUS> using <pseudo>-><COLON><CSSFUNCTION><splus><RPAREN> 
 *    Reduce on <HASH> using <pseudo>-><COLON><CSSFUNCTION><splus><RPAREN> 
 *    Reduce on <DOT> using <pseudo>-><COLON><CSSFUNCTION><splus><RPAREN> 
 *    Reduce on <LBRACKET> using <pseudo>-><COLON><CSSFUNCTION><splus><RPAREN> 
 * ----------- 149 -----------
 *   --Itemset--
 *     <media>-><media_sym_sstar><medialist><LBRACE><splus><rulesetplus>•<RBRACE>
 *     <media>-><media_sym_sstar><medialist><LBRACE><splus><rulesetplus>•<RBRACE><splus>
 *     <rulesetplus>-><rulesetplus>•<ruleset>
 *    +<ruleset>->•<rruleset>
 *    +<rruleset>->•<selectors><LBRACE><declarations_optional_semicolon><RBRACE><splus>
 *    +<rruleset>->•<selectors><LBRACE><declarations_optional_semicolon><RBRACE>
 *    +<rruleset>->•<selectors><LBRACE><RBRACE>
 *    +<rruleset>->•<selectors><LBRACE><splus><RBRACE>
 *    +<rruleset>->•<selectors><LBRACE><RBRACE><splus>
 *    +<rruleset>->•<selectors><LBRACE><splus><RBRACE><splus>
 *    +<selectors>->•<selector>
 *    +<selectors>->•<selectors><comma_sstar><selector>
 *    +<selector>->•<simple_selector>
 *    +<selector>->•<simple_selector><combinator><selector>
 *    +<simple_selector>->•<element_name>
 *    +<simple_selector>->•<element_name><hash_class_attrib_pseudo_plus>
 *    +<simple_selector>->•<hash_class_attrib_pseudo_plus>
 *    +<element_name>->•<IDENT>
 *    +<element_name>->•<STAR>
 *    +<hash_class_attrib_pseudo_plus>->•<hash_class_attrib_pseudo>
 *    +<hash_class_attrib_pseudo_plus>->•<hash_class_attrib_pseudo_plus><hash_class_attrib_pseudo>
 *    +<hash_class_attrib_pseudo>->•<HASH>
 *    +<hash_class_attrib_pseudo>->•<class>
 *    +<hash_class_attrib_pseudo>->•<attrib>
 *    +<hash_class_attrib_pseudo>->•<pseudo>
 *    +<class>->•<DOT><IDENT>
 *    +<attrib>->•<LBRACKET><trimmed_ident><RBRACKET>
 *    +<attrib>->•<LBRACKET><trimmed_ident><attrib_operator_sstar><attrib_operator_rhand_sstar><RBRACKET>
 *    +<attrib>->•<LBRACKET><trimmed_ident><attrib_operator_sstar><RBRACKET>
 *    +<pseudo>->•<COLON><IDENT>
 *    +<pseudo>->•<COLON><CSSFUNCTION><trimmed_ident><RPAREN>
 *    +<pseudo>->•<COLON><CSSFUNCTION><splus><RPAREN>
 *    +<pseudo>->•<COLON><CSSFUNCTION><RPAREN>
 *   --Transitions--
 *    Shift on <RBRACE> to 188 because of <media>-><media_sym_sstar><medialist><LBRACE><splus><rulesetplus>•<RBRACE> 
 *    Shift on <RBRACE> to 188 because of <media>-><media_sym_sstar><medialist><LBRACE><splus><rulesetplus>•<RBRACE><splus> 
 *    Goto on <ruleset> to 152 because of <rulesetplus>-><rulesetplus>•<ruleset>
 *    Goto on <rruleset> to 21 because of <ruleset>->•<rruleset>
 *    Goto on <selectors> to 25 because of <rruleset>->•<selectors><LBRACE><declarations_optional_semicolon><RBRACE><splus>
 *    Goto on <selectors> to 25 because of <rruleset>->•<selectors><LBRACE><declarations_optional_semicolon><RBRACE>
 *    Goto on <selectors> to 25 because of <rruleset>->•<selectors><LBRACE><RBRACE>
 *    Goto on <selectors> to 25 because of <rruleset>->•<selectors><LBRACE><splus><RBRACE>
 *    Goto on <selectors> to 25 because of <rruleset>->•<selectors><LBRACE><RBRACE><splus>
 *    Goto on <selectors> to 25 because of <rruleset>->•<selectors><LBRACE><splus><RBRACE><splus>
 *    Goto on <selector> to 28 because of <selectors>->•<selector>
 *    Goto on <selectors> to 25 because of <selectors>->•<selectors><comma_sstar><selector>
 *    Goto on <simple_selector> to 30 because of <selector>->•<simple_selector>
 *    Goto on <simple_selector> to 30 because of <selector>->•<simple_selector><combinator><selector>
 *    Goto on <element_name> to 31 because of <simple_selector>->•<element_name>
 *    Goto on <element_name> to 31 because of <simple_selector>->•<element_name><hash_class_attrib_pseudo_plus>
 *    Goto on <hash_class_attrib_pseudo_plus> to 32 because of <simple_selector>->•<hash_class_attrib_pseudo_plus>
 *    Shift on <IDENT> to 33 because of <element_name>->•<IDENT> 
 *    Shift on <STAR> to 34 because of <element_name>->•<STAR> 
 *    Goto on <hash_class_attrib_pseudo> to 35 because of <hash_class_attrib_pseudo_plus>->•<hash_class_attrib_pseudo>
 *    Goto on <hash_class_attrib_pseudo_plus> to 32 because of <hash_class_attrib_pseudo_plus>->•<hash_class_attrib_pseudo_plus><hash_class_attrib_pseudo>
 *    Shift on <HASH> to 36 because of <hash_class_attrib_pseudo>->•<HASH> 
 *    Goto on <class> to 37 because of <hash_class_attrib_pseudo>->•<class>
 *    Goto on <attrib> to 38 because of <hash_class_attrib_pseudo>->•<attrib>
 *    Goto on <pseudo> to 39 because of <hash_class_attrib_pseudo>->•<pseudo>
 *    Shift on <DOT> to 40 because of <class>->•<DOT><IDENT> 
 *    Shift on <LBRACKET> to 41 because of <attrib>->•<LBRACKET><trimmed_ident><RBRACKET> 
 *    Shift on <LBRACKET> to 41 because of <attrib>->•<LBRACKET><trimmed_ident><attrib_operator_sstar><attrib_operator_rhand_sstar><RBRACKET> 
 *    Shift on <LBRACKET> to 41 because of <attrib>->•<LBRACKET><trimmed_ident><attrib_operator_sstar><RBRACKET> 
 *    Shift on <COLON> to 42 because of <pseudo>->•<COLON><IDENT> 
 *    Shift on <COLON> to 42 because of <pseudo>->•<COLON><CSSFUNCTION><trimmed_ident><RPAREN> 
 *    Shift on <COLON> to 42 because of <pseudo>->•<COLON><CSSFUNCTION><splus><RPAREN> 
 *    Shift on <COLON> to 42 because of <pseudo>->•<COLON><CSSFUNCTION><RPAREN> 
 * ----------- 150 -----------
 *   --Itemset--
 *     <media>-><media_sym_sstar><medialist><LBRACE><splus><RBRACE>•
 *     <media>-><media_sym_sstar><medialist><LBRACE><splus><RBRACE>•<splus>
 *    +<splus>->•<SS>
 *    +<splus>->•<SS><splus>
 *   --Transitions--
 *    Reduce on <MEDIA_SYM> using <media>-><media_sym_sstar><medialist><LBRACE><splus><RBRACE> 
 *    Reduce on <IDENT> using <media>-><media_sym_sstar><medialist><LBRACE><splus><RBRACE> 
 *    Reduce on <PAGE_SYM> using <media>-><media_sym_sstar><medialist><LBRACE><splus><RBRACE> 
 *    Reduce on <COLON> using <media>-><media_sym_sstar><medialist><LBRACE><splus><RBRACE> 
 *    Reduce on <HASH> using <media>-><media_sym_sstar><medialist><LBRACE><splus><RBRACE> 
 *    Reduce on <DOT> using <media>-><media_sym_sstar><medialist><LBRACE><splus><RBRACE> 
 *    Reduce on <STAR> using <media>-><media_sym_sstar><medialist><LBRACE><splus><RBRACE> 
 *    Reduce on <LBRACKET> using <media>-><media_sym_sstar><medialist><LBRACE><splus><RBRACE> 
 *    Reduce on  using <media>-><media_sym_sstar><medialist><LBRACE><splus><RBRACE> 
 *    Goto on <splus> to 189 because of <media>-><media_sym_sstar><medialist><LBRACE><splus><RBRACE>•<splus>
 *    Shift on <SS> to 55 because of <splus>->•<SS> 
 *    Shift on <SS> to 55 because of <splus>->•<SS><splus> 
 * ----------- 151 -----------
 *   --Itemset--
 *     <media>-><media_sym_sstar><medialist><LBRACE><rulesetplus><RBRACE>•
 *     <media>-><media_sym_sstar><medialist><LBRACE><rulesetplus><RBRACE>•<splus>
 *    +<splus>->•<SS>
 *    +<splus>->•<SS><splus>
 *   --Transitions--
 *    Reduce on <MEDIA_SYM> using <media>-><media_sym_sstar><medialist><LBRACE><rulesetplus><RBRACE> 
 *    Reduce on <IDENT> using <media>-><media_sym_sstar><medialist><LBRACE><rulesetplus><RBRACE> 
 *    Reduce on <PAGE_SYM> using <media>-><media_sym_sstar><medialist><LBRACE><rulesetplus><RBRACE> 
 *    Reduce on <COLON> using <media>-><media_sym_sstar><medialist><LBRACE><rulesetplus><RBRACE> 
 *    Reduce on <HASH> using <media>-><media_sym_sstar><medialist><LBRACE><rulesetplus><RBRACE> 
 *    Reduce on <DOT> using <media>-><media_sym_sstar><medialist><LBRACE><rulesetplus><RBRACE> 
 *    Reduce on <STAR> using <media>-><media_sym_sstar><medialist><LBRACE><rulesetplus><RBRACE> 
 *    Reduce on <LBRACKET> using <media>-><media_sym_sstar><medialist><LBRACE><rulesetplus><RBRACE> 
 *    Reduce on  using <media>-><media_sym_sstar><medialist><LBRACE><rulesetplus><RBRACE> 
 *    Goto on <splus> to 190 because of <media>-><media_sym_sstar><medialist><LBRACE><rulesetplus><RBRACE>•<splus>
 *    Shift on <SS> to 55 because of <splus>->•<SS> 
 *    Shift on <SS> to 55 because of <splus>->•<SS><splus> 
 * ----------- 152 -----------
 *   --Itemset--
 *     <rulesetplus>-><rulesetplus><ruleset>•
 *   --Transitions--
 *    Reduce on <RBRACE> using <rulesetplus>-><rulesetplus><ruleset> 
 *    Reduce on <IDENT> using <rulesetplus>-><rulesetplus><ruleset> 
 *    Reduce on <COLON> using <rulesetplus>-><rulesetplus><ruleset> 
 *    Reduce on <HASH> using <rulesetplus>-><rulesetplus><ruleset> 
 *    Reduce on <DOT> using <rulesetplus>-><rulesetplus><ruleset> 
 *    Reduce on <STAR> using <rulesetplus>-><rulesetplus><ruleset> 
 *    Reduce on <LBRACKET> using <rulesetplus>-><rulesetplus><ruleset> 
 * ----------- 153 -----------
 *   --Itemset--
 *     <media>-><media_sym_sstar><medialist><LBRACE><RBRACE><splus>•
 *   --Transitions--
 *    Reduce on <MEDIA_SYM> using <media>-><media_sym_sstar><medialist><LBRACE><RBRACE><splus> 
 *    Reduce on <IDENT> using <media>-><media_sym_sstar><medialist><LBRACE><RBRACE><splus> 
 *    Reduce on <PAGE_SYM> using <media>-><media_sym_sstar><medialist><LBRACE><RBRACE><splus> 
 *    Reduce on <COLON> using <media>-><media_sym_sstar><medialist><LBRACE><RBRACE><splus> 
 *    Reduce on <HASH> using <media>-><media_sym_sstar><medialist><LBRACE><RBRACE><splus> 
 *    Reduce on <DOT> using <media>-><media_sym_sstar><medialist><LBRACE><RBRACE><splus> 
 *    Reduce on <STAR> using <media>-><media_sym_sstar><medialist><LBRACE><RBRACE><splus> 
 *    Reduce on <LBRACKET> using <media>-><media_sym_sstar><medialist><LBRACE><RBRACE><splus> 
 *    Reduce on  using <media>-><media_sym_sstar><medialist><LBRACE><RBRACE><splus> 
 * ----------- 154 -----------
 *   --Itemset--
 *     <medialist>-><medialist><COMMA><splus><medium>•
 *   --Transitions--
 *    Reduce on <SEMICOLON> using <medialist>-><medialist><COMMA><splus><medium> 
 *    Reduce on <COMMA> using <medialist>-><medialist><COMMA><splus><medium> 
 *    Reduce on <LBRACE> using <medialist>-><medialist><COMMA><splus><medium> 
 * ----------- 155 -----------
 *   --Itemset--
 *     <rruleset>-><selectors><LBRACE><declarations_optional_semicolon><RBRACE><splus>•
 *   --Transitions--
 *    Reduce on <RBRACE> using <rruleset>-><selectors><LBRACE><declarations_optional_semicolon><RBRACE><splus> 
 *    Reduce on <MEDIA_SYM> using <rruleset>-><selectors><LBRACE><declarations_optional_semicolon><RBRACE><splus> 
 *    Reduce on <IDENT> using <rruleset>-><selectors><LBRACE><declarations_optional_semicolon><RBRACE><splus> 
 *    Reduce on <PAGE_SYM> using <rruleset>-><selectors><LBRACE><declarations_optional_semicolon><RBRACE><splus> 
 *    Reduce on <COLON> using <rruleset>-><selectors><LBRACE><declarations_optional_semicolon><RBRACE><splus> 
 *    Reduce on <HASH> using <rruleset>-><selectors><LBRACE><declarations_optional_semicolon><RBRACE><splus> 
 *    Reduce on <DOT> using <rruleset>-><selectors><LBRACE><declarations_optional_semicolon><RBRACE><splus> 
 *    Reduce on <STAR> using <rruleset>-><selectors><LBRACE><declarations_optional_semicolon><RBRACE><splus> 
 *    Reduce on <LBRACKET> using <rruleset>-><selectors><LBRACE><declarations_optional_semicolon><RBRACE><splus> 
 *    Reduce on  using <rruleset>-><selectors><LBRACE><declarations_optional_semicolon><RBRACE><splus> 
 * ----------- 156 -----------
 *   --Itemset--
 *     <rruleset>-><selectors><LBRACE><splus><RBRACE><splus>•
 *   --Transitions--
 *    Reduce on <RBRACE> using <rruleset>-><selectors><LBRACE><splus><RBRACE><splus> 
 *    Reduce on <MEDIA_SYM> using <rruleset>-><selectors><LBRACE><splus><RBRACE><splus> 
 *    Reduce on <IDENT> using <rruleset>-><selectors><LBRACE><splus><RBRACE><splus> 
 *    Reduce on <PAGE_SYM> using <rruleset>-><selectors><LBRACE><splus><RBRACE><splus> 
 *    Reduce on <COLON> using <rruleset>-><selectors><LBRACE><splus><RBRACE><splus> 
 *    Reduce on <HASH> using <rruleset>-><selectors><LBRACE><splus><RBRACE><splus> 
 *    Reduce on <DOT> using <rruleset>-><selectors><LBRACE><splus><RBRACE><splus> 
 *    Reduce on <STAR> using <rruleset>-><selectors><LBRACE><splus><RBRACE><splus> 
 *    Reduce on <LBRACKET> using <rruleset>-><selectors><LBRACE><splus><RBRACE><splus> 
 *    Reduce on  using <rruleset>-><selectors><LBRACE><splus><RBRACE><splus> 
 * ----------- 157 -----------
 *   --Itemset--
 *     <declarations>-><declarations><SEMICOLON><sstar_declaration>•
 *   --Transitions--
 *    Reduce on <SEMICOLON> using <declarations>-><declarations><SEMICOLON><sstar_declaration> 
 *    Reduce on <RBRACE> using <declarations>-><declarations><SEMICOLON><sstar_declaration> 
 * ----------- 158 -----------
 *   --Itemset--
 *     <ddeclaration>-><property><COLON><splus>•<expr><prio>
 *     <ddeclaration>-><property><COLON><splus>•<expr>
 *    +<expr>->•<term>
 *    +<expr>->•<expr><term>
 *    +<expr>->•<expr><operator><term>
 *    +<term>->•<term_numeric>
 *    +<term>->•<term_nonnumeric>
 *    +<term_numeric>->•<unary_operator><term_numeric_number>
 *    +<term_numeric>->•<term_numeric_number>
 *    +<term_nonnumeric>->•<STRING>
 *    +<term_nonnumeric>->•<STRING><splus>
 *    +<term_nonnumeric>->•<IDENT>
 *    +<term_nonnumeric>->•<IDENT><splus>
 *    +<term_nonnumeric>->•<URI>
 *    +<term_nonnumeric>->•<URI><splus>
 *    +<term_nonnumeric>->•<hexcolor>
 *    +<term_nonnumeric>->•<function>
 *    +<unary_operator>->•<MINUS>
 *    +<unary_operator>->•<PLUS>
 *    +<term_numeric_number>->•<NUMBER>
 *    +<term_numeric_number>->•<NUMBER><splus>
 *    +<term_numeric_number>->•<PERCENTAGE>
 *    +<term_numeric_number>->•<PERCENTAGE><splus>
 *    +<term_numeric_number>->•<LENGTH>
 *    +<term_numeric_number>->•<LENGTH><splus>
 *    +<term_numeric_number>->•<EMS>
 *    +<term_numeric_number>->•<EMS><splus>
 *    +<term_numeric_number>->•<EXS>
 *    +<term_numeric_number>->•<EXS><splus>
 *    +<term_numeric_number>->•<ANGLE>
 *    +<term_numeric_number>->•<ANGLE><splus>
 *    +<term_numeric_number>->•<TIME>
 *    +<term_numeric_number>->•<TIME><splus>
 *    +<term_numeric_number>->•<FREQ>
 *    +<term_numeric_number>->•<FREQ><splus>
 *    +<term_numeric_number>->•<DIMENSION>
 *    +<term_numeric_number>->•<DIMENSION><splus>
 *    +<hexcolor>->•<HASH>
 *    +<hexcolor>->•<HASH><splus>
 *    +<function>->•<CSSFUNCTION><splus><expr><RPAREN><splus>
 *    +<function>->•<CSSFUNCTION><splus><expr><RPAREN>
 *    +<function>->•<CSSFUNCTION><expr><RPAREN><splus>
 *    +<function>->•<CSSFUNCTION><expr><RPAREN>
 *   --Transitions--
 *    Goto on <expr> to 191 because of <ddeclaration>-><property><COLON><splus>•<expr><prio>
 *    Goto on <expr> to 191 because of <ddeclaration>-><property><COLON><splus>•<expr>
 *    Goto on <term> to 160 because of <expr>->•<term>
 *    Goto on <expr> to 191 because of <expr>->•<expr><term>
 *    Goto on <expr> to 191 because of <expr>->•<expr><operator><term>
 *    Goto on <term_numeric> to 161 because of <term>->•<term_numeric>
 *    Goto on <term_nonnumeric> to 162 because of <term>->•<term_nonnumeric>
 *    Goto on <unary_operator> to 163 because of <term_numeric>->•<unary_operator><term_numeric_number>
 *    Goto on <term_numeric_number> to 164 because of <term_numeric>->•<term_numeric_number>
 *    Shift on <STRING> to 165 because of <term_nonnumeric>->•<STRING> 
 *    Shift on <STRING> to 165 because of <term_nonnumeric>->•<STRING><splus> 
 *    Shift on <IDENT> to 166 because of <term_nonnumeric>->•<IDENT> 
 *    Shift on <IDENT> to 166 because of <term_nonnumeric>->•<IDENT><splus> 
 *    Shift on <URI> to 167 because of <term_nonnumeric>->•<URI> 
 *    Shift on <URI> to 167 because of <term_nonnumeric>->•<URI><splus> 
 *    Goto on <hexcolor> to 168 because of <term_nonnumeric>->•<hexcolor>
 *    Goto on <function> to 169 because of <term_nonnumeric>->•<function>
 *    Shift on <MINUS> to 170 because of <unary_operator>->•<MINUS> 
 *    Shift on <PLUS> to 171 because of <unary_operator>->•<PLUS> 
 *    Shift on <NUMBER> to 172 because of <term_numeric_number>->•<NUMBER> 
 *    Shift on <NUMBER> to 172 because of <term_numeric_number>->•<NUMBER><splus> 
 *    Shift on <PERCENTAGE> to 173 because of <term_numeric_number>->•<PERCENTAGE> 
 *    Shift on <PERCENTAGE> to 173 because of <term_numeric_number>->•<PERCENTAGE><splus> 
 *    Shift on <LENGTH> to 174 because of <term_numeric_number>->•<LENGTH> 
 *    Shift on <LENGTH> to 174 because of <term_numeric_number>->•<LENGTH><splus> 
 *    Shift on <EMS> to 175 because of <term_numeric_number>->•<EMS> 
 *    Shift on <EMS> to 175 because of <term_numeric_number>->•<EMS><splus> 
 *    Shift on <EXS> to 176 because of <term_numeric_number>->•<EXS> 
 *    Shift on <EXS> to 176 because of <term_numeric_number>->•<EXS><splus> 
 *    Shift on <ANGLE> to 177 because of <term_numeric_number>->•<ANGLE> 
 *    Shift on <ANGLE> to 177 because of <term_numeric_number>->•<ANGLE><splus> 
 *    Shift on <TIME> to 178 because of <term_numeric_number>->•<TIME> 
 *    Shift on <TIME> to 178 because of <term_numeric_number>->•<TIME><splus> 
 *    Shift on <FREQ> to 179 because of <term_numeric_number>->•<FREQ> 
 *    Shift on <FREQ> to 179 because of <term_numeric_number>->•<FREQ><splus> 
 *    Shift on <DIMENSION> to 180 because of <term_numeric_number>->•<DIMENSION> 
 *    Shift on <DIMENSION> to 180 because of <term_numeric_number>->•<DIMENSION><splus> 
 *    Shift on <HASH> to 181 because of <hexcolor>->•<HASH> 
 *    Shift on <HASH> to 181 because of <hexcolor>->•<HASH><splus> 
 *    Shift on <CSSFUNCTION> to 182 because of <function>->•<CSSFUNCTION><splus><expr><RPAREN><splus> 
 *    Shift on <CSSFUNCTION> to 182 because of <function>->•<CSSFUNCTION><splus><expr><RPAREN> 
 *    Shift on <CSSFUNCTION> to 182 because of <function>->•<CSSFUNCTION><expr><RPAREN><splus> 
 *    Shift on <CSSFUNCTION> to 182 because of <function>->•<CSSFUNCTION><expr><RPAREN> 
 * ----------- 159 -----------
 *   --Itemset--
 *     <ddeclaration>-><property><COLON><expr>•<prio>
 *     <ddeclaration>-><property><COLON><expr>•
 *     <expr>-><expr>•<term>
 *     <expr>-><expr>•<operator><term>
 *    +<prio>->•<important_sym_sstar>
 *    +<term>->•<term_numeric>
 *    +<term>->•<term_nonnumeric>
 *    +<operator>->•<SLASH>
 *    +<operator>->•<SLASH><splus>
 *    +<operator>->•<COMMA>
 *    +<operator>->•<COMMA><splus>
 *    +<important_sym_sstar>->•<IMPORTANT_SYM>
 *    +<important_sym_sstar>->•<IMPORTANT_SYM><splus>
 *    +<term_numeric>->•<unary_operator><term_numeric_number>
 *    +<term_numeric>->•<term_numeric_number>
 *    +<term_nonnumeric>->•<STRING>
 *    +<term_nonnumeric>->•<STRING><splus>
 *    +<term_nonnumeric>->•<IDENT>
 *    +<term_nonnumeric>->•<IDENT><splus>
 *    +<term_nonnumeric>->•<URI>
 *    +<term_nonnumeric>->•<URI><splus>
 *    +<term_nonnumeric>->•<hexcolor>
 *    +<term_nonnumeric>->•<function>
 *    +<unary_operator>->•<MINUS>
 *    +<unary_operator>->•<PLUS>
 *    +<term_numeric_number>->•<NUMBER>
 *    +<term_numeric_number>->•<NUMBER><splus>
 *    +<term_numeric_number>->•<PERCENTAGE>
 *    +<term_numeric_number>->•<PERCENTAGE><splus>
 *    +<term_numeric_number>->•<LENGTH>
 *    +<term_numeric_number>->•<LENGTH><splus>
 *    +<term_numeric_number>->•<EMS>
 *    +<term_numeric_number>->•<EMS><splus>
 *    +<term_numeric_number>->•<EXS>
 *    +<term_numeric_number>->•<EXS><splus>
 *    +<term_numeric_number>->•<ANGLE>
 *    +<term_numeric_number>->•<ANGLE><splus>
 *    +<term_numeric_number>->•<TIME>
 *    +<term_numeric_number>->•<TIME><splus>
 *    +<term_numeric_number>->•<FREQ>
 *    +<term_numeric_number>->•<FREQ><splus>
 *    +<term_numeric_number>->•<DIMENSION>
 *    +<term_numeric_number>->•<DIMENSION><splus>
 *    +<hexcolor>->•<HASH>
 *    +<hexcolor>->•<HASH><splus>
 *    +<function>->•<CSSFUNCTION><splus><expr><RPAREN><splus>
 *    +<function>->•<CSSFUNCTION><splus><expr><RPAREN>
 *    +<function>->•<CSSFUNCTION><expr><RPAREN><splus>
 *    +<function>->•<CSSFUNCTION><expr><RPAREN>
 *   --Transitions--
 *    Goto on <prio> to 192 because of <ddeclaration>-><property><COLON><expr>•<prio>
 *    Reduce on <SEMICOLON> using <ddeclaration>-><property><COLON><expr> 
 *    Reduce on <RBRACE> using <ddeclaration>-><property><COLON><expr> 
 *    Goto on <term> to 193 because of <expr>-><expr>•<term>
 *    Goto on <operator> to 194 because of <expr>-><expr>•<operator><term>
 *    Goto on <important_sym_sstar> to 195 because of <prio>->•<important_sym_sstar>
 *    Goto on <term_numeric> to 161 because of <term>->•<term_numeric>
 *    Goto on <term_nonnumeric> to 162 because of <term>->•<term_nonnumeric>
 *    Shift on <SLASH> to 196 because of <operator>->•<SLASH> 
 *    Shift on <SLASH> to 196 because of <operator>->•<SLASH><splus> 
 *    Shift on <COMMA> to 197 because of <operator>->•<COMMA> 
 *    Shift on <COMMA> to 197 because of <operator>->•<COMMA><splus> 
 *    Shift on <IMPORTANT_SYM> to 198 because of <important_sym_sstar>->•<IMPORTANT_SYM> 
 *    Shift on <IMPORTANT_SYM> to 198 because of <important_sym_sstar>->•<IMPORTANT_SYM><splus> 
 *    Goto on <unary_operator> to 163 because of <term_numeric>->•<unary_operator><term_numeric_number>
 *    Goto on <term_numeric_number> to 164 because of <term_numeric>->•<term_numeric_number>
 *    Shift on <STRING> to 165 because of <term_nonnumeric>->•<STRING> 
 *    Shift on <STRING> to 165 because of <term_nonnumeric>->•<STRING><splus> 
 *    Shift on <IDENT> to 166 because of <term_nonnumeric>->•<IDENT> 
 *    Shift on <IDENT> to 166 because of <term_nonnumeric>->•<IDENT><splus> 
 *    Shift on <URI> to 167 because of <term_nonnumeric>->•<URI> 
 *    Shift on <URI> to 167 because of <term_nonnumeric>->•<URI><splus> 
 *    Goto on <hexcolor> to 168 because of <term_nonnumeric>->•<hexcolor>
 *    Goto on <function> to 169 because of <term_nonnumeric>->•<function>
 *    Shift on <MINUS> to 170 because of <unary_operator>->•<MINUS> 
 *    Shift on <PLUS> to 171 because of <unary_operator>->•<PLUS> 
 *    Shift on <NUMBER> to 172 because of <term_numeric_number>->•<NUMBER> 
 *    Shift on <NUMBER> to 172 because of <term_numeric_number>->•<NUMBER><splus> 
 *    Shift on <PERCENTAGE> to 173 because of <term_numeric_number>->•<PERCENTAGE> 
 *    Shift on <PERCENTAGE> to 173 because of <term_numeric_number>->•<PERCENTAGE><splus> 
 *    Shift on <LENGTH> to 174 because of <term_numeric_number>->•<LENGTH> 
 *    Shift on <LENGTH> to 174 because of <term_numeric_number>->•<LENGTH><splus> 
 *    Shift on <EMS> to 175 because of <term_numeric_number>->•<EMS> 
 *    Shift on <EMS> to 175 because of <term_numeric_number>->•<EMS><splus> 
 *    Shift on <EXS> to 176 because of <term_numeric_number>->•<EXS> 
 *    Shift on <EXS> to 176 because of <term_numeric_number>->•<EXS><splus> 
 *    Shift on <ANGLE> to 177 because of <term_numeric_number>->•<ANGLE> 
 *    Shift on <ANGLE> to 177 because of <term_numeric_number>->•<ANGLE><splus> 
 *    Shift on <TIME> to 178 because of <term_numeric_number>->•<TIME> 
 *    Shift on <TIME> to 178 because of <term_numeric_number>->•<TIME><splus> 
 *    Shift on <FREQ> to 179 because of <term_numeric_number>->•<FREQ> 
 *    Shift on <FREQ> to 179 because of <term_numeric_number>->•<FREQ><splus> 
 *    Shift on <DIMENSION> to 180 because of <term_numeric_number>->•<DIMENSION> 
 *    Shift on <DIMENSION> to 180 because of <term_numeric_number>->•<DIMENSION><splus> 
 *    Shift on <HASH> to 181 because of <hexcolor>->•<HASH> 
 *    Shift on <HASH> to 181 because of <hexcolor>->•<HASH><splus> 
 *    Shift on <CSSFUNCTION> to 182 because of <function>->•<CSSFUNCTION><splus><expr><RPAREN><splus> 
 *    Shift on <CSSFUNCTION> to 182 because of <function>->•<CSSFUNCTION><splus><expr><RPAREN> 
 *    Shift on <CSSFUNCTION> to 182 because of <function>->•<CSSFUNCTION><expr><RPAREN><splus> 
 *    Shift on <CSSFUNCTION> to 182 because of <function>->•<CSSFUNCTION><expr><RPAREN> 
 * ----------- 160 -----------
 *   --Itemset--
 *     <expr>-><term>•
 *   --Transitions--
 *    Reduce on <SEMICOLON> using <expr>-><term> 
 *    Reduce on <STRING> using <expr>-><term> 
 *    Reduce on <URI> using <expr>-><term> 
 *    Reduce on <COMMA> using <expr>-><term> 
 *    Reduce on <RBRACE> using <expr>-><term> 
 *    Reduce on <IDENT> using <expr>-><term> 
 *    Reduce on <SLASH> using <expr>-><term> 
 *    Reduce on <PLUS> using <expr>-><term> 
 *    Reduce on <MINUS> using <expr>-><term> 
 *    Reduce on <HASH> using <expr>-><term> 
 *    Reduce on <CSSFUNCTION> using <expr>-><term> 
 *    Reduce on <RPAREN> using <expr>-><term> 
 *    Reduce on <IMPORTANT_SYM> using <expr>-><term> 
 *    Reduce on <NUMBER> using <expr>-><term> 
 *    Reduce on <PERCENTAGE> using <expr>-><term> 
 *    Reduce on <LENGTH> using <expr>-><term> 
 *    Reduce on <EMS> using <expr>-><term> 
 *    Reduce on <EXS> using <expr>-><term> 
 *    Reduce on <ANGLE> using <expr>-><term> 
 *    Reduce on <TIME> using <expr>-><term> 
 *    Reduce on <FREQ> using <expr>-><term> 
 *    Reduce on <DIMENSION> using <expr>-><term> 
 * ----------- 161 -----------
 *   --Itemset--
 *     <term>-><term_numeric>•
 *   --Transitions--
 *    Reduce on <SEMICOLON> using <term>-><term_numeric> 
 *    Reduce on <STRING> using <term>-><term_numeric> 
 *    Reduce on <URI> using <term>-><term_numeric> 
 *    Reduce on <COMMA> using <term>-><term_numeric> 
 *    Reduce on <RBRACE> using <term>-><term_numeric> 
 *    Reduce on <IDENT> using <term>-><term_numeric> 
 *    Reduce on <SLASH> using <term>-><term_numeric> 
 *    Reduce on <PLUS> using <term>-><term_numeric> 
 *    Reduce on <MINUS> using <term>-><term_numeric> 
 *    Reduce on <HASH> using <term>-><term_numeric> 
 *    Reduce on <CSSFUNCTION> using <term>-><term_numeric> 
 *    Reduce on <RPAREN> using <term>-><term_numeric> 
 *    Reduce on <IMPORTANT_SYM> using <term>-><term_numeric> 
 *    Reduce on <NUMBER> using <term>-><term_numeric> 
 *    Reduce on <PERCENTAGE> using <term>-><term_numeric> 
 *    Reduce on <LENGTH> using <term>-><term_numeric> 
 *    Reduce on <EMS> using <term>-><term_numeric> 
 *    Reduce on <EXS> using <term>-><term_numeric> 
 *    Reduce on <ANGLE> using <term>-><term_numeric> 
 *    Reduce on <TIME> using <term>-><term_numeric> 
 *    Reduce on <FREQ> using <term>-><term_numeric> 
 *    Reduce on <DIMENSION> using <term>-><term_numeric> 
 * ----------- 162 -----------
 *   --Itemset--
 *     <term>-><term_nonnumeric>•
 *   --Transitions--
 *    Reduce on <SEMICOLON> using <term>-><term_nonnumeric> 
 *    Reduce on <STRING> using <term>-><term_nonnumeric> 
 *    Reduce on <URI> using <term>-><term_nonnumeric> 
 *    Reduce on <COMMA> using <term>-><term_nonnumeric> 
 *    Reduce on <RBRACE> using <term>-><term_nonnumeric> 
 *    Reduce on <IDENT> using <term>-><term_nonnumeric> 
 *    Reduce on <SLASH> using <term>-><term_nonnumeric> 
 *    Reduce on <PLUS> using <term>-><term_nonnumeric> 
 *    Reduce on <MINUS> using <term>-><term_nonnumeric> 
 *    Reduce on <HASH> using <term>-><term_nonnumeric> 
 *    Reduce on <CSSFUNCTION> using <term>-><term_nonnumeric> 
 *    Reduce on <RPAREN> using <term>-><term_nonnumeric> 
 *    Reduce on <IMPORTANT_SYM> using <term>-><term_nonnumeric> 
 *    Reduce on <NUMBER> using <term>-><term_nonnumeric> 
 *    Reduce on <PERCENTAGE> using <term>-><term_nonnumeric> 
 *    Reduce on <LENGTH> using <term>-><term_nonnumeric> 
 *    Reduce on <EMS> using <term>-><term_nonnumeric> 
 *    Reduce on <EXS> using <term>-><term_nonnumeric> 
 *    Reduce on <ANGLE> using <term>-><term_nonnumeric> 
 *    Reduce on <TIME> using <term>-><term_nonnumeric> 
 *    Reduce on <FREQ> using <term>-><term_nonnumeric> 
 *    Reduce on <DIMENSION> using <term>-><term_nonnumeric> 
 * ----------- 163 -----------
 *   --Itemset--
 *     <term_numeric>-><unary_operator>•<term_numeric_number>
 *    +<term_numeric_number>->•<NUMBER>
 *    +<term_numeric_number>->•<NUMBER><splus>
 *    +<term_numeric_number>->•<PERCENTAGE>
 *    +<term_numeric_number>->•<PERCENTAGE><splus>
 *    +<term_numeric_number>->•<LENGTH>
 *    +<term_numeric_number>->•<LENGTH><splus>
 *    +<term_numeric_number>->•<EMS>
 *    +<term_numeric_number>->•<EMS><splus>
 *    +<term_numeric_number>->•<EXS>
 *    +<term_numeric_number>->•<EXS><splus>
 *    +<term_numeric_number>->•<ANGLE>
 *    +<term_numeric_number>->•<ANGLE><splus>
 *    +<term_numeric_number>->•<TIME>
 *    +<term_numeric_number>->•<TIME><splus>
 *    +<term_numeric_number>->•<FREQ>
 *    +<term_numeric_number>->•<FREQ><splus>
 *    +<term_numeric_number>->•<DIMENSION>
 *    +<term_numeric_number>->•<DIMENSION><splus>
 *   --Transitions--
 *    Goto on <term_numeric_number> to 199 because of <term_numeric>-><unary_operator>•<term_numeric_number>
 *    Shift on <NUMBER> to 172 because of <term_numeric_number>->•<NUMBER> 
 *    Shift on <NUMBER> to 172 because of <term_numeric_number>->•<NUMBER><splus> 
 *    Shift on <PERCENTAGE> to 173 because of <term_numeric_number>->•<PERCENTAGE> 
 *    Shift on <PERCENTAGE> to 173 because of <term_numeric_number>->•<PERCENTAGE><splus> 
 *    Shift on <LENGTH> to 174 because of <term_numeric_number>->•<LENGTH> 
 *    Shift on <LENGTH> to 174 because of <term_numeric_number>->•<LENGTH><splus> 
 *    Shift on <EMS> to 175 because of <term_numeric_number>->•<EMS> 
 *    Shift on <EMS> to 175 because of <term_numeric_number>->•<EMS><splus> 
 *    Shift on <EXS> to 176 because of <term_numeric_number>->•<EXS> 
 *    Shift on <EXS> to 176 because of <term_numeric_number>->•<EXS><splus> 
 *    Shift on <ANGLE> to 177 because of <term_numeric_number>->•<ANGLE> 
 *    Shift on <ANGLE> to 177 because of <term_numeric_number>->•<ANGLE><splus> 
 *    Shift on <TIME> to 178 because of <term_numeric_number>->•<TIME> 
 *    Shift on <TIME> to 178 because of <term_numeric_number>->•<TIME><splus> 
 *    Shift on <FREQ> to 179 because of <term_numeric_number>->•<FREQ> 
 *    Shift on <FREQ> to 179 because of <term_numeric_number>->•<FREQ><splus> 
 *    Shift on <DIMENSION> to 180 because of <term_numeric_number>->•<DIMENSION> 
 *    Shift on <DIMENSION> to 180 because of <term_numeric_number>->•<DIMENSION><splus> 
 * ----------- 164 -----------
 *   --Itemset--
 *     <term_numeric>-><term_numeric_number>•
 *   --Transitions--
 *    Reduce on <SEMICOLON> using <term_numeric>-><term_numeric_number> 
 *    Reduce on <STRING> using <term_numeric>-><term_numeric_number> 
 *    Reduce on <URI> using <term_numeric>-><term_numeric_number> 
 *    Reduce on <COMMA> using <term_numeric>-><term_numeric_number> 
 *    Reduce on <RBRACE> using <term_numeric>-><term_numeric_number> 
 *    Reduce on <IDENT> using <term_numeric>-><term_numeric_number> 
 *    Reduce on <SLASH> using <term_numeric>-><term_numeric_number> 
 *    Reduce on <PLUS> using <term_numeric>-><term_numeric_number> 
 *    Reduce on <MINUS> using <term_numeric>-><term_numeric_number> 
 *    Reduce on <HASH> using <term_numeric>-><term_numeric_number> 
 *    Reduce on <CSSFUNCTION> using <term_numeric>-><term_numeric_number> 
 *    Reduce on <RPAREN> using <term_numeric>-><term_numeric_number> 
 *    Reduce on <IMPORTANT_SYM> using <term_numeric>-><term_numeric_number> 
 *    Reduce on <NUMBER> using <term_numeric>-><term_numeric_number> 
 *    Reduce on <PERCENTAGE> using <term_numeric>-><term_numeric_number> 
 *    Reduce on <LENGTH> using <term_numeric>-><term_numeric_number> 
 *    Reduce on <EMS> using <term_numeric>-><term_numeric_number> 
 *    Reduce on <EXS> using <term_numeric>-><term_numeric_number> 
 *    Reduce on <ANGLE> using <term_numeric>-><term_numeric_number> 
 *    Reduce on <TIME> using <term_numeric>-><term_numeric_number> 
 *    Reduce on <FREQ> using <term_numeric>-><term_numeric_number> 
 *    Reduce on <DIMENSION> using <term_numeric>-><term_numeric_number> 
 * ----------- 165 -----------
 *   --Itemset--
 *     <term_nonnumeric>-><STRING>•
 *     <term_nonnumeric>-><STRING>•<splus>
 *    +<splus>->•<SS>
 *    +<splus>->•<SS><splus>
 *   --Transitions--
 *    Reduce on <SEMICOLON> using <term_nonnumeric>-><STRING> 
 *    Reduce on <STRING> using <term_nonnumeric>-><STRING> 
 *    Reduce on <URI> using <term_nonnumeric>-><STRING> 
 *    Reduce on <COMMA> using <term_nonnumeric>-><STRING> 
 *    Reduce on <RBRACE> using <term_nonnumeric>-><STRING> 
 *    Reduce on <IDENT> using <term_nonnumeric>-><STRING> 
 *    Reduce on <SLASH> using <term_nonnumeric>-><STRING> 
 *    Reduce on <PLUS> using <term_nonnumeric>-><STRING> 
 *    Reduce on <MINUS> using <term_nonnumeric>-><STRING> 
 *    Reduce on <HASH> using <term_nonnumeric>-><STRING> 
 *    Reduce on <CSSFUNCTION> using <term_nonnumeric>-><STRING> 
 *    Reduce on <RPAREN> using <term_nonnumeric>-><STRING> 
 *    Reduce on <IMPORTANT_SYM> using <term_nonnumeric>-><STRING> 
 *    Reduce on <NUMBER> using <term_nonnumeric>-><STRING> 
 *    Reduce on <PERCENTAGE> using <term_nonnumeric>-><STRING> 
 *    Reduce on <LENGTH> using <term_nonnumeric>-><STRING> 
 *    Reduce on <EMS> using <term_nonnumeric>-><STRING> 
 *    Reduce on <EXS> using <term_nonnumeric>-><STRING> 
 *    Reduce on <ANGLE> using <term_nonnumeric>-><STRING> 
 *    Reduce on <TIME> using <term_nonnumeric>-><STRING> 
 *    Reduce on <FREQ> using <term_nonnumeric>-><STRING> 
 *    Reduce on <DIMENSION> using <term_nonnumeric>-><STRING> 
 *    Goto on <splus> to 200 because of <term_nonnumeric>-><STRING>•<splus>
 *    Shift on <SS> to 55 because of <splus>->•<SS> 
 *    Shift on <SS> to 55 because of <splus>->•<SS><splus> 
 * ----------- 166 -----------
 *   --Itemset--
 *     <term_nonnumeric>-><IDENT>•
 *     <term_nonnumeric>-><IDENT>•<splus>
 *    +<splus>->•<SS>
 *    +<splus>->•<SS><splus>
 *   --Transitions--
 *    Reduce on <SEMICOLON> using <term_nonnumeric>-><IDENT> 
 *    Reduce on <STRING> using <term_nonnumeric>-><IDENT> 
 *    Reduce on <URI> using <term_nonnumeric>-><IDENT> 
 *    Reduce on <COMMA> using <term_nonnumeric>-><IDENT> 
 *    Reduce on <RBRACE> using <term_nonnumeric>-><IDENT> 
 *    Reduce on <IDENT> using <term_nonnumeric>-><IDENT> 
 *    Reduce on <SLASH> using <term_nonnumeric>-><IDENT> 
 *    Reduce on <PLUS> using <term_nonnumeric>-><IDENT> 
 *    Reduce on <MINUS> using <term_nonnumeric>-><IDENT> 
 *    Reduce on <HASH> using <term_nonnumeric>-><IDENT> 
 *    Reduce on <CSSFUNCTION> using <term_nonnumeric>-><IDENT> 
 *    Reduce on <RPAREN> using <term_nonnumeric>-><IDENT> 
 *    Reduce on <IMPORTANT_SYM> using <term_nonnumeric>-><IDENT> 
 *    Reduce on <NUMBER> using <term_nonnumeric>-><IDENT> 
 *    Reduce on <PERCENTAGE> using <term_nonnumeric>-><IDENT> 
 *    Reduce on <LENGTH> using <term_nonnumeric>-><IDENT> 
 *    Reduce on <EMS> using <term_nonnumeric>-><IDENT> 
 *    Reduce on <EXS> using <term_nonnumeric>-><IDENT> 
 *    Reduce on <ANGLE> using <term_nonnumeric>-><IDENT> 
 *    Reduce on <TIME> using <term_nonnumeric>-><IDENT> 
 *    Reduce on <FREQ> using <term_nonnumeric>-><IDENT> 
 *    Reduce on <DIMENSION> using <term_nonnumeric>-><IDENT> 
 *    Goto on <splus> to 201 because of <term_nonnumeric>-><IDENT>•<splus>
 *    Shift on <SS> to 55 because of <splus>->•<SS> 
 *    Shift on <SS> to 55 because of <splus>->•<SS><splus> 
 * ----------- 167 -----------
 *   --Itemset--
 *     <term_nonnumeric>-><URI>•
 *     <term_nonnumeric>-><URI>•<splus>
 *    +<splus>->•<SS>
 *    +<splus>->•<SS><splus>
 *   --Transitions--
 *    Reduce on <SEMICOLON> using <term_nonnumeric>-><URI> 
 *    Reduce on <STRING> using <term_nonnumeric>-><URI> 
 *    Reduce on <URI> using <term_nonnumeric>-><URI> 
 *    Reduce on <COMMA> using <term_nonnumeric>-><URI> 
 *    Reduce on <RBRACE> using <term_nonnumeric>-><URI> 
 *    Reduce on <IDENT> using <term_nonnumeric>-><URI> 
 *    Reduce on <SLASH> using <term_nonnumeric>-><URI> 
 *    Reduce on <PLUS> using <term_nonnumeric>-><URI> 
 *    Reduce on <MINUS> using <term_nonnumeric>-><URI> 
 *    Reduce on <HASH> using <term_nonnumeric>-><URI> 
 *    Reduce on <CSSFUNCTION> using <term_nonnumeric>-><URI> 
 *    Reduce on <RPAREN> using <term_nonnumeric>-><URI> 
 *    Reduce on <IMPORTANT_SYM> using <term_nonnumeric>-><URI> 
 *    Reduce on <NUMBER> using <term_nonnumeric>-><URI> 
 *    Reduce on <PERCENTAGE> using <term_nonnumeric>-><URI> 
 *    Reduce on <LENGTH> using <term_nonnumeric>-><URI> 
 *    Reduce on <EMS> using <term_nonnumeric>-><URI> 
 *    Reduce on <EXS> using <term_nonnumeric>-><URI> 
 *    Reduce on <ANGLE> using <term_nonnumeric>-><URI> 
 *    Reduce on <TIME> using <term_nonnumeric>-><URI> 
 *    Reduce on <FREQ> using <term_nonnumeric>-><URI> 
 *    Reduce on <DIMENSION> using <term_nonnumeric>-><URI> 
 *    Goto on <splus> to 202 because of <term_nonnumeric>-><URI>•<splus>
 *    Shift on <SS> to 55 because of <splus>->•<SS> 
 *    Shift on <SS> to 55 because of <splus>->•<SS><splus> 
 * ----------- 168 -----------
 *   --Itemset--
 *     <term_nonnumeric>-><hexcolor>•
 *   --Transitions--
 *    Reduce on <SEMICOLON> using <term_nonnumeric>-><hexcolor> 
 *    Reduce on <STRING> using <term_nonnumeric>-><hexcolor> 
 *    Reduce on <URI> using <term_nonnumeric>-><hexcolor> 
 *    Reduce on <COMMA> using <term_nonnumeric>-><hexcolor> 
 *    Reduce on <RBRACE> using <term_nonnumeric>-><hexcolor> 
 *    Reduce on <IDENT> using <term_nonnumeric>-><hexcolor> 
 *    Reduce on <SLASH> using <term_nonnumeric>-><hexcolor> 
 *    Reduce on <PLUS> using <term_nonnumeric>-><hexcolor> 
 *    Reduce on <MINUS> using <term_nonnumeric>-><hexcolor> 
 *    Reduce on <HASH> using <term_nonnumeric>-><hexcolor> 
 *    Reduce on <CSSFUNCTION> using <term_nonnumeric>-><hexcolor> 
 *    Reduce on <RPAREN> using <term_nonnumeric>-><hexcolor> 
 *    Reduce on <IMPORTANT_SYM> using <term_nonnumeric>-><hexcolor> 
 *    Reduce on <NUMBER> using <term_nonnumeric>-><hexcolor> 
 *    Reduce on <PERCENTAGE> using <term_nonnumeric>-><hexcolor> 
 *    Reduce on <LENGTH> using <term_nonnumeric>-><hexcolor> 
 *    Reduce on <EMS> using <term_nonnumeric>-><hexcolor> 
 *    Reduce on <EXS> using <term_nonnumeric>-><hexcolor> 
 *    Reduce on <ANGLE> using <term_nonnumeric>-><hexcolor> 
 *    Reduce on <TIME> using <term_nonnumeric>-><hexcolor> 
 *    Reduce on <FREQ> using <term_nonnumeric>-><hexcolor> 
 *    Reduce on <DIMENSION> using <term_nonnumeric>-><hexcolor> 
 * ----------- 169 -----------
 *   --Itemset--
 *     <term_nonnumeric>-><function>•
 *   --Transitions--
 *    Reduce on <SEMICOLON> using <term_nonnumeric>-><function> 
 *    Reduce on <STRING> using <term_nonnumeric>-><function> 
 *    Reduce on <URI> using <term_nonnumeric>-><function> 
 *    Reduce on <COMMA> using <term_nonnumeric>-><function> 
 *    Reduce on <RBRACE> using <term_nonnumeric>-><function> 
 *    Reduce on <IDENT> using <term_nonnumeric>-><function> 
 *    Reduce on <SLASH> using <term_nonnumeric>-><function> 
 *    Reduce on <PLUS> using <term_nonnumeric>-><function> 
 *    Reduce on <MINUS> using <term_nonnumeric>-><function> 
 *    Reduce on <HASH> using <term_nonnumeric>-><function> 
 *    Reduce on <CSSFUNCTION> using <term_nonnumeric>-><function> 
 *    Reduce on <RPAREN> using <term_nonnumeric>-><function> 
 *    Reduce on <IMPORTANT_SYM> using <term_nonnumeric>-><function> 
 *    Reduce on <NUMBER> using <term_nonnumeric>-><function> 
 *    Reduce on <PERCENTAGE> using <term_nonnumeric>-><function> 
 *    Reduce on <LENGTH> using <term_nonnumeric>-><function> 
 *    Reduce on <EMS> using <term_nonnumeric>-><function> 
 *    Reduce on <EXS> using <term_nonnumeric>-><function> 
 *    Reduce on <ANGLE> using <term_nonnumeric>-><function> 
 *    Reduce on <TIME> using <term_nonnumeric>-><function> 
 *    Reduce on <FREQ> using <term_nonnumeric>-><function> 
 *    Reduce on <DIMENSION> using <term_nonnumeric>-><function> 
 * ----------- 170 -----------
 *   --Itemset--
 *     <unary_operator>-><MINUS>•
 *   --Transitions--
 *    Reduce on <NUMBER> using <unary_operator>-><MINUS> 
 *    Reduce on <PERCENTAGE> using <unary_operator>-><MINUS> 
 *    Reduce on <LENGTH> using <unary_operator>-><MINUS> 
 *    Reduce on <EMS> using <unary_operator>-><MINUS> 
 *    Reduce on <EXS> using <unary_operator>-><MINUS> 
 *    Reduce on <ANGLE> using <unary_operator>-><MINUS> 
 *    Reduce on <TIME> using <unary_operator>-><MINUS> 
 *    Reduce on <FREQ> using <unary_operator>-><MINUS> 
 *    Reduce on <DIMENSION> using <unary_operator>-><MINUS> 
 * ----------- 171 -----------
 *   --Itemset--
 *     <unary_operator>-><PLUS>•
 *   --Transitions--
 *    Reduce on <NUMBER> using <unary_operator>-><PLUS> 
 *    Reduce on <PERCENTAGE> using <unary_operator>-><PLUS> 
 *    Reduce on <LENGTH> using <unary_operator>-><PLUS> 
 *    Reduce on <EMS> using <unary_operator>-><PLUS> 
 *    Reduce on <EXS> using <unary_operator>-><PLUS> 
 *    Reduce on <ANGLE> using <unary_operator>-><PLUS> 
 *    Reduce on <TIME> using <unary_operator>-><PLUS> 
 *    Reduce on <FREQ> using <unary_operator>-><PLUS> 
 *    Reduce on <DIMENSION> using <unary_operator>-><PLUS> 
 * ----------- 172 -----------
 *   --Itemset--
 *     <term_numeric_number>-><NUMBER>•
 *     <term_numeric_number>-><NUMBER>•<splus>
 *    +<splus>->•<SS>
 *    +<splus>->•<SS><splus>
 *   --Transitions--
 *    Reduce on <SEMICOLON> using <term_numeric_number>-><NUMBER> 
 *    Reduce on <STRING> using <term_numeric_number>-><NUMBER> 
 *    Reduce on <URI> using <term_numeric_number>-><NUMBER> 
 *    Reduce on <COMMA> using <term_numeric_number>-><NUMBER> 
 *    Reduce on <RBRACE> using <term_numeric_number>-><NUMBER> 
 *    Reduce on <IDENT> using <term_numeric_number>-><NUMBER> 
 *    Reduce on <SLASH> using <term_numeric_number>-><NUMBER> 
 *    Reduce on <PLUS> using <term_numeric_number>-><NUMBER> 
 *    Reduce on <MINUS> using <term_numeric_number>-><NUMBER> 
 *    Reduce on <HASH> using <term_numeric_number>-><NUMBER> 
 *    Reduce on <CSSFUNCTION> using <term_numeric_number>-><NUMBER> 
 *    Reduce on <RPAREN> using <term_numeric_number>-><NUMBER> 
 *    Reduce on <IMPORTANT_SYM> using <term_numeric_number>-><NUMBER> 
 *    Reduce on <NUMBER> using <term_numeric_number>-><NUMBER> 
 *    Reduce on <PERCENTAGE> using <term_numeric_number>-><NUMBER> 
 *    Reduce on <LENGTH> using <term_numeric_number>-><NUMBER> 
 *    Reduce on <EMS> using <term_numeric_number>-><NUMBER> 
 *    Reduce on <EXS> using <term_numeric_number>-><NUMBER> 
 *    Reduce on <ANGLE> using <term_numeric_number>-><NUMBER> 
 *    Reduce on <TIME> using <term_numeric_number>-><NUMBER> 
 *    Reduce on <FREQ> using <term_numeric_number>-><NUMBER> 
 *    Reduce on <DIMENSION> using <term_numeric_number>-><NUMBER> 
 *    Goto on <splus> to 203 because of <term_numeric_number>-><NUMBER>•<splus>
 *    Shift on <SS> to 55 because of <splus>->•<SS> 
 *    Shift on <SS> to 55 because of <splus>->•<SS><splus> 
 * ----------- 173 -----------
 *   --Itemset--
 *     <term_numeric_number>-><PERCENTAGE>•
 *     <term_numeric_number>-><PERCENTAGE>•<splus>
 *    +<splus>->•<SS>
 *    +<splus>->•<SS><splus>
 *   --Transitions--
 *    Reduce on <SEMICOLON> using <term_numeric_number>-><PERCENTAGE> 
 *    Reduce on <STRING> using <term_numeric_number>-><PERCENTAGE> 
 *    Reduce on <URI> using <term_numeric_number>-><PERCENTAGE> 
 *    Reduce on <COMMA> using <term_numeric_number>-><PERCENTAGE> 
 *    Reduce on <RBRACE> using <term_numeric_number>-><PERCENTAGE> 
 *    Reduce on <IDENT> using <term_numeric_number>-><PERCENTAGE> 
 *    Reduce on <SLASH> using <term_numeric_number>-><PERCENTAGE> 
 *    Reduce on <PLUS> using <term_numeric_number>-><PERCENTAGE> 
 *    Reduce on <MINUS> using <term_numeric_number>-><PERCENTAGE> 
 *    Reduce on <HASH> using <term_numeric_number>-><PERCENTAGE> 
 *    Reduce on <CSSFUNCTION> using <term_numeric_number>-><PERCENTAGE> 
 *    Reduce on <RPAREN> using <term_numeric_number>-><PERCENTAGE> 
 *    Reduce on <IMPORTANT_SYM> using <term_numeric_number>-><PERCENTAGE> 
 *    Reduce on <NUMBER> using <term_numeric_number>-><PERCENTAGE> 
 *    Reduce on <PERCENTAGE> using <term_numeric_number>-><PERCENTAGE> 
 *    Reduce on <LENGTH> using <term_numeric_number>-><PERCENTAGE> 
 *    Reduce on <EMS> using <term_numeric_number>-><PERCENTAGE> 
 *    Reduce on <EXS> using <term_numeric_number>-><PERCENTAGE> 
 *    Reduce on <ANGLE> using <term_numeric_number>-><PERCENTAGE> 
 *    Reduce on <TIME> using <term_numeric_number>-><PERCENTAGE> 
 *    Reduce on <FREQ> using <term_numeric_number>-><PERCENTAGE> 
 *    Reduce on <DIMENSION> using <term_numeric_number>-><PERCENTAGE> 
 *    Goto on <splus> to 204 because of <term_numeric_number>-><PERCENTAGE>•<splus>
 *    Shift on <SS> to 55 because of <splus>->•<SS> 
 *    Shift on <SS> to 55 because of <splus>->•<SS><splus> 
 * ----------- 174 -----------
 *   --Itemset--
 *     <term_numeric_number>-><LENGTH>•
 *     <term_numeric_number>-><LENGTH>•<splus>
 *    +<splus>->•<SS>
 *    +<splus>->•<SS><splus>
 *   --Transitions--
 *    Reduce on <SEMICOLON> using <term_numeric_number>-><LENGTH> 
 *    Reduce on <STRING> using <term_numeric_number>-><LENGTH> 
 *    Reduce on <URI> using <term_numeric_number>-><LENGTH> 
 *    Reduce on <COMMA> using <term_numeric_number>-><LENGTH> 
 *    Reduce on <RBRACE> using <term_numeric_number>-><LENGTH> 
 *    Reduce on <IDENT> using <term_numeric_number>-><LENGTH> 
 *    Reduce on <SLASH> using <term_numeric_number>-><LENGTH> 
 *    Reduce on <PLUS> using <term_numeric_number>-><LENGTH> 
 *    Reduce on <MINUS> using <term_numeric_number>-><LENGTH> 
 *    Reduce on <HASH> using <term_numeric_number>-><LENGTH> 
 *    Reduce on <CSSFUNCTION> using <term_numeric_number>-><LENGTH> 
 *    Reduce on <RPAREN> using <term_numeric_number>-><LENGTH> 
 *    Reduce on <IMPORTANT_SYM> using <term_numeric_number>-><LENGTH> 
 *    Reduce on <NUMBER> using <term_numeric_number>-><LENGTH> 
 *    Reduce on <PERCENTAGE> using <term_numeric_number>-><LENGTH> 
 *    Reduce on <LENGTH> using <term_numeric_number>-><LENGTH> 
 *    Reduce on <EMS> using <term_numeric_number>-><LENGTH> 
 *    Reduce on <EXS> using <term_numeric_number>-><LENGTH> 
 *    Reduce on <ANGLE> using <term_numeric_number>-><LENGTH> 
 *    Reduce on <TIME> using <term_numeric_number>-><LENGTH> 
 *    Reduce on <FREQ> using <term_numeric_number>-><LENGTH> 
 *    Reduce on <DIMENSION> using <term_numeric_number>-><LENGTH> 
 *    Goto on <splus> to 205 because of <term_numeric_number>-><LENGTH>•<splus>
 *    Shift on <SS> to 55 because of <splus>->•<SS> 
 *    Shift on <SS> to 55 because of <splus>->•<SS><splus> 
 * ----------- 175 -----------
 *   --Itemset--
 *     <term_numeric_number>-><EMS>•
 *     <term_numeric_number>-><EMS>•<splus>
 *    +<splus>->•<SS>
 *    +<splus>->•<SS><splus>
 *   --Transitions--
 *    Reduce on <SEMICOLON> using <term_numeric_number>-><EMS> 
 *    Reduce on <STRING> using <term_numeric_number>-><EMS> 
 *    Reduce on <URI> using <term_numeric_number>-><EMS> 
 *    Reduce on <COMMA> using <term_numeric_number>-><EMS> 
 *    Reduce on <RBRACE> using <term_numeric_number>-><EMS> 
 *    Reduce on <IDENT> using <term_numeric_number>-><EMS> 
 *    Reduce on <SLASH> using <term_numeric_number>-><EMS> 
 *    Reduce on <PLUS> using <term_numeric_number>-><EMS> 
 *    Reduce on <MINUS> using <term_numeric_number>-><EMS> 
 *    Reduce on <HASH> using <term_numeric_number>-><EMS> 
 *    Reduce on <CSSFUNCTION> using <term_numeric_number>-><EMS> 
 *    Reduce on <RPAREN> using <term_numeric_number>-><EMS> 
 *    Reduce on <IMPORTANT_SYM> using <term_numeric_number>-><EMS> 
 *    Reduce on <NUMBER> using <term_numeric_number>-><EMS> 
 *    Reduce on <PERCENTAGE> using <term_numeric_number>-><EMS> 
 *    Reduce on <LENGTH> using <term_numeric_number>-><EMS> 
 *    Reduce on <EMS> using <term_numeric_number>-><EMS> 
 *    Reduce on <EXS> using <term_numeric_number>-><EMS> 
 *    Reduce on <ANGLE> using <term_numeric_number>-><EMS> 
 *    Reduce on <TIME> using <term_numeric_number>-><EMS> 
 *    Reduce on <FREQ> using <term_numeric_number>-><EMS> 
 *    Reduce on <DIMENSION> using <term_numeric_number>-><EMS> 
 *    Goto on <splus> to 206 because of <term_numeric_number>-><EMS>•<splus>
 *    Shift on <SS> to 55 because of <splus>->•<SS> 
 *    Shift on <SS> to 55 because of <splus>->•<SS><splus> 
 * ----------- 176 -----------
 *   --Itemset--
 *     <term_numeric_number>-><EXS>•
 *     <term_numeric_number>-><EXS>•<splus>
 *    +<splus>->•<SS>
 *    +<splus>->•<SS><splus>
 *   --Transitions--
 *    Reduce on <SEMICOLON> using <term_numeric_number>-><EXS> 
 *    Reduce on <STRING> using <term_numeric_number>-><EXS> 
 *    Reduce on <URI> using <term_numeric_number>-><EXS> 
 *    Reduce on <COMMA> using <term_numeric_number>-><EXS> 
 *    Reduce on <RBRACE> using <term_numeric_number>-><EXS> 
 *    Reduce on <IDENT> using <term_numeric_number>-><EXS> 
 *    Reduce on <SLASH> using <term_numeric_number>-><EXS> 
 *    Reduce on <PLUS> using <term_numeric_number>-><EXS> 
 *    Reduce on <MINUS> using <term_numeric_number>-><EXS> 
 *    Reduce on <HASH> using <term_numeric_number>-><EXS> 
 *    Reduce on <CSSFUNCTION> using <term_numeric_number>-><EXS> 
 *    Reduce on <RPAREN> using <term_numeric_number>-><EXS> 
 *    Reduce on <IMPORTANT_SYM> using <term_numeric_number>-><EXS> 
 *    Reduce on <NUMBER> using <term_numeric_number>-><EXS> 
 *    Reduce on <PERCENTAGE> using <term_numeric_number>-><EXS> 
 *    Reduce on <LENGTH> using <term_numeric_number>-><EXS> 
 *    Reduce on <EMS> using <term_numeric_number>-><EXS> 
 *    Reduce on <EXS> using <term_numeric_number>-><EXS> 
 *    Reduce on <ANGLE> using <term_numeric_number>-><EXS> 
 *    Reduce on <TIME> using <term_numeric_number>-><EXS> 
 *    Reduce on <FREQ> using <term_numeric_number>-><EXS> 
 *    Reduce on <DIMENSION> using <term_numeric_number>-><EXS> 
 *    Goto on <splus> to 207 because of <term_numeric_number>-><EXS>•<splus>
 *    Shift on <SS> to 55 because of <splus>->•<SS> 
 *    Shift on <SS> to 55 because of <splus>->•<SS><splus> 
 * ----------- 177 -----------
 *   --Itemset--
 *     <term_numeric_number>-><ANGLE>•
 *     <term_numeric_number>-><ANGLE>•<splus>
 *    +<splus>->•<SS>
 *    +<splus>->•<SS><splus>
 *   --Transitions--
 *    Reduce on <SEMICOLON> using <term_numeric_number>-><ANGLE> 
 *    Reduce on <STRING> using <term_numeric_number>-><ANGLE> 
 *    Reduce on <URI> using <term_numeric_number>-><ANGLE> 
 *    Reduce on <COMMA> using <term_numeric_number>-><ANGLE> 
 *    Reduce on <RBRACE> using <term_numeric_number>-><ANGLE> 
 *    Reduce on <IDENT> using <term_numeric_number>-><ANGLE> 
 *    Reduce on <SLASH> using <term_numeric_number>-><ANGLE> 
 *    Reduce on <PLUS> using <term_numeric_number>-><ANGLE> 
 *    Reduce on <MINUS> using <term_numeric_number>-><ANGLE> 
 *    Reduce on <HASH> using <term_numeric_number>-><ANGLE> 
 *    Reduce on <CSSFUNCTION> using <term_numeric_number>-><ANGLE> 
 *    Reduce on <RPAREN> using <term_numeric_number>-><ANGLE> 
 *    Reduce on <IMPORTANT_SYM> using <term_numeric_number>-><ANGLE> 
 *    Reduce on <NUMBER> using <term_numeric_number>-><ANGLE> 
 *    Reduce on <PERCENTAGE> using <term_numeric_number>-><ANGLE> 
 *    Reduce on <LENGTH> using <term_numeric_number>-><ANGLE> 
 *    Reduce on <EMS> using <term_numeric_number>-><ANGLE> 
 *    Reduce on <EXS> using <term_numeric_number>-><ANGLE> 
 *    Reduce on <ANGLE> using <term_numeric_number>-><ANGLE> 
 *    Reduce on <TIME> using <term_numeric_number>-><ANGLE> 
 *    Reduce on <FREQ> using <term_numeric_number>-><ANGLE> 
 *    Reduce on <DIMENSION> using <term_numeric_number>-><ANGLE> 
 *    Goto on <splus> to 208 because of <term_numeric_number>-><ANGLE>•<splus>
 *    Shift on <SS> to 55 because of <splus>->•<SS> 
 *    Shift on <SS> to 55 because of <splus>->•<SS><splus> 
 * ----------- 178 -----------
 *   --Itemset--
 *     <term_numeric_number>-><TIME>•
 *     <term_numeric_number>-><TIME>•<splus>
 *    +<splus>->•<SS>
 *    +<splus>->•<SS><splus>
 *   --Transitions--
 *    Reduce on <SEMICOLON> using <term_numeric_number>-><TIME> 
 *    Reduce on <STRING> using <term_numeric_number>-><TIME> 
 *    Reduce on <URI> using <term_numeric_number>-><TIME> 
 *    Reduce on <COMMA> using <term_numeric_number>-><TIME> 
 *    Reduce on <RBRACE> using <term_numeric_number>-><TIME> 
 *    Reduce on <IDENT> using <term_numeric_number>-><TIME> 
 *    Reduce on <SLASH> using <term_numeric_number>-><TIME> 
 *    Reduce on <PLUS> using <term_numeric_number>-><TIME> 
 *    Reduce on <MINUS> using <term_numeric_number>-><TIME> 
 *    Reduce on <HASH> using <term_numeric_number>-><TIME> 
 *    Reduce on <CSSFUNCTION> using <term_numeric_number>-><TIME> 
 *    Reduce on <RPAREN> using <term_numeric_number>-><TIME> 
 *    Reduce on <IMPORTANT_SYM> using <term_numeric_number>-><TIME> 
 *    Reduce on <NUMBER> using <term_numeric_number>-><TIME> 
 *    Reduce on <PERCENTAGE> using <term_numeric_number>-><TIME> 
 *    Reduce on <LENGTH> using <term_numeric_number>-><TIME> 
 *    Reduce on <EMS> using <term_numeric_number>-><TIME> 
 *    Reduce on <EXS> using <term_numeric_number>-><TIME> 
 *    Reduce on <ANGLE> using <term_numeric_number>-><TIME> 
 *    Reduce on <TIME> using <term_numeric_number>-><TIME> 
 *    Reduce on <FREQ> using <term_numeric_number>-><TIME> 
 *    Reduce on <DIMENSION> using <term_numeric_number>-><TIME> 
 *    Goto on <splus> to 209 because of <term_numeric_number>-><TIME>•<splus>
 *    Shift on <SS> to 55 because of <splus>->•<SS> 
 *    Shift on <SS> to 55 because of <splus>->•<SS><splus> 
 * ----------- 179 -----------
 *   --Itemset--
 *     <term_numeric_number>-><FREQ>•
 *     <term_numeric_number>-><FREQ>•<splus>
 *    +<splus>->•<SS>
 *    +<splus>->•<SS><splus>
 *   --Transitions--
 *    Reduce on <SEMICOLON> using <term_numeric_number>-><FREQ> 
 *    Reduce on <STRING> using <term_numeric_number>-><FREQ> 
 *    Reduce on <URI> using <term_numeric_number>-><FREQ> 
 *    Reduce on <COMMA> using <term_numeric_number>-><FREQ> 
 *    Reduce on <RBRACE> using <term_numeric_number>-><FREQ> 
 *    Reduce on <IDENT> using <term_numeric_number>-><FREQ> 
 *    Reduce on <SLASH> using <term_numeric_number>-><FREQ> 
 *    Reduce on <PLUS> using <term_numeric_number>-><FREQ> 
 *    Reduce on <MINUS> using <term_numeric_number>-><FREQ> 
 *    Reduce on <HASH> using <term_numeric_number>-><FREQ> 
 *    Reduce on <CSSFUNCTION> using <term_numeric_number>-><FREQ> 
 *    Reduce on <RPAREN> using <term_numeric_number>-><FREQ> 
 *    Reduce on <IMPORTANT_SYM> using <term_numeric_number>-><FREQ> 
 *    Reduce on <NUMBER> using <term_numeric_number>-><FREQ> 
 *    Reduce on <PERCENTAGE> using <term_numeric_number>-><FREQ> 
 *    Reduce on <LENGTH> using <term_numeric_number>-><FREQ> 
 *    Reduce on <EMS> using <term_numeric_number>-><FREQ> 
 *    Reduce on <EXS> using <term_numeric_number>-><FREQ> 
 *    Reduce on <ANGLE> using <term_numeric_number>-><FREQ> 
 *    Reduce on <TIME> using <term_numeric_number>-><FREQ> 
 *    Reduce on <FREQ> using <term_numeric_number>-><FREQ> 
 *    Reduce on <DIMENSION> using <term_numeric_number>-><FREQ> 
 *    Goto on <splus> to 210 because of <term_numeric_number>-><FREQ>•<splus>
 *    Shift on <SS> to 55 because of <splus>->•<SS> 
 *    Shift on <SS> to 55 because of <splus>->•<SS><splus> 
 * ----------- 180 -----------
 *   --Itemset--
 *     <term_numeric_number>-><DIMENSION>•
 *     <term_numeric_number>-><DIMENSION>•<splus>
 *    +<splus>->•<SS>
 *    +<splus>->•<SS><splus>
 *   --Transitions--
 *    Reduce on <SEMICOLON> using <term_numeric_number>-><DIMENSION> 
 *    Reduce on <STRING> using <term_numeric_number>-><DIMENSION> 
 *    Reduce on <URI> using <term_numeric_number>-><DIMENSION> 
 *    Reduce on <COMMA> using <term_numeric_number>-><DIMENSION> 
 *    Reduce on <RBRACE> using <term_numeric_number>-><DIMENSION> 
 *    Reduce on <IDENT> using <term_numeric_number>-><DIMENSION> 
 *    Reduce on <SLASH> using <term_numeric_number>-><DIMENSION> 
 *    Reduce on <PLUS> using <term_numeric_number>-><DIMENSION> 
 *    Reduce on <MINUS> using <term_numeric_number>-><DIMENSION> 
 *    Reduce on <HASH> using <term_numeric_number>-><DIMENSION> 
 *    Reduce on <CSSFUNCTION> using <term_numeric_number>-><DIMENSION> 
 *    Reduce on <RPAREN> using <term_numeric_number>-><DIMENSION> 
 *    Reduce on <IMPORTANT_SYM> using <term_numeric_number>-><DIMENSION> 
 *    Reduce on <NUMBER> using <term_numeric_number>-><DIMENSION> 
 *    Reduce on <PERCENTAGE> using <term_numeric_number>-><DIMENSION> 
 *    Reduce on <LENGTH> using <term_numeric_number>-><DIMENSION> 
 *    Reduce on <EMS> using <term_numeric_number>-><DIMENSION> 
 *    Reduce on <EXS> using <term_numeric_number>-><DIMENSION> 
 *    Reduce on <ANGLE> using <term_numeric_number>-><DIMENSION> 
 *    Reduce on <TIME> using <term_numeric_number>-><DIMENSION> 
 *    Reduce on <FREQ> using <term_numeric_number>-><DIMENSION> 
 *    Reduce on <DIMENSION> using <term_numeric_number>-><DIMENSION> 
 *    Goto on <splus> to 211 because of <term_numeric_number>-><DIMENSION>•<splus>
 *    Shift on <SS> to 55 because of <splus>->•<SS> 
 *    Shift on <SS> to 55 because of <splus>->•<SS><splus> 
 * ----------- 181 -----------
 *   --Itemset--
 *     <hexcolor>-><HASH>•
 *     <hexcolor>-><HASH>•<splus>
 *    +<splus>->•<SS>
 *    +<splus>->•<SS><splus>
 *   --Transitions--
 *    Reduce on <SEMICOLON> using <hexcolor>-><HASH> 
 *    Reduce on <STRING> using <hexcolor>-><HASH> 
 *    Reduce on <URI> using <hexcolor>-><HASH> 
 *    Reduce on <COMMA> using <hexcolor>-><HASH> 
 *    Reduce on <RBRACE> using <hexcolor>-><HASH> 
 *    Reduce on <IDENT> using <hexcolor>-><HASH> 
 *    Reduce on <SLASH> using <hexcolor>-><HASH> 
 *    Reduce on <PLUS> using <hexcolor>-><HASH> 
 *    Reduce on <MINUS> using <hexcolor>-><HASH> 
 *    Reduce on <HASH> using <hexcolor>-><HASH> 
 *    Reduce on <CSSFUNCTION> using <hexcolor>-><HASH> 
 *    Reduce on <RPAREN> using <hexcolor>-><HASH> 
 *    Reduce on <IMPORTANT_SYM> using <hexcolor>-><HASH> 
 *    Reduce on <NUMBER> using <hexcolor>-><HASH> 
 *    Reduce on <PERCENTAGE> using <hexcolor>-><HASH> 
 *    Reduce on <LENGTH> using <hexcolor>-><HASH> 
 *    Reduce on <EMS> using <hexcolor>-><HASH> 
 *    Reduce on <EXS> using <hexcolor>-><HASH> 
 *    Reduce on <ANGLE> using <hexcolor>-><HASH> 
 *    Reduce on <TIME> using <hexcolor>-><HASH> 
 *    Reduce on <FREQ> using <hexcolor>-><HASH> 
 *    Reduce on <DIMENSION> using <hexcolor>-><HASH> 
 *    Goto on <splus> to 212 because of <hexcolor>-><HASH>•<splus>
 *    Shift on <SS> to 55 because of <splus>->•<SS> 
 *    Shift on <SS> to 55 because of <splus>->•<SS><splus> 
 * ----------- 182 -----------
 *   --Itemset--
 *     <function>-><CSSFUNCTION>•<splus><expr><RPAREN><splus>
 *     <function>-><CSSFUNCTION>•<splus><expr><RPAREN>
 *     <function>-><CSSFUNCTION>•<expr><RPAREN><splus>
 *     <function>-><CSSFUNCTION>•<expr><RPAREN>
 *    +<splus>->•<SS>
 *    +<splus>->•<SS><splus>
 *    +<expr>->•<term>
 *    +<expr>->•<expr><term>
 *    +<expr>->•<expr><operator><term>
 *    +<term>->•<term_numeric>
 *    +<term>->•<term_nonnumeric>
 *    +<term_numeric>->•<unary_operator><term_numeric_number>
 *    +<term_numeric>->•<term_numeric_number>
 *    +<term_nonnumeric>->•<STRING>
 *    +<term_nonnumeric>->•<STRING><splus>
 *    +<term_nonnumeric>->•<IDENT>
 *    +<term_nonnumeric>->•<IDENT><splus>
 *    +<term_nonnumeric>->•<URI>
 *    +<term_nonnumeric>->•<URI><splus>
 *    +<term_nonnumeric>->•<hexcolor>
 *    +<term_nonnumeric>->•<function>
 *    +<unary_operator>->•<MINUS>
 *    +<unary_operator>->•<PLUS>
 *    +<term_numeric_number>->•<NUMBER>
 *    +<term_numeric_number>->•<NUMBER><splus>
 *    +<term_numeric_number>->•<PERCENTAGE>
 *    +<term_numeric_number>->•<PERCENTAGE><splus>
 *    +<term_numeric_number>->•<LENGTH>
 *    +<term_numeric_number>->•<LENGTH><splus>
 *    +<term_numeric_number>->•<EMS>
 *    +<term_numeric_number>->•<EMS><splus>
 *    +<term_numeric_number>->•<EXS>
 *    +<term_numeric_number>->•<EXS><splus>
 *    +<term_numeric_number>->•<ANGLE>
 *    +<term_numeric_number>->•<ANGLE><splus>
 *    +<term_numeric_number>->•<TIME>
 *    +<term_numeric_number>->•<TIME><splus>
 *    +<term_numeric_number>->•<FREQ>
 *    +<term_numeric_number>->•<FREQ><splus>
 *    +<term_numeric_number>->•<DIMENSION>
 *    +<term_numeric_number>->•<DIMENSION><splus>
 *    +<hexcolor>->•<HASH>
 *    +<hexcolor>->•<HASH><splus>
 *    +<function>->•<CSSFUNCTION><splus><expr><RPAREN><splus>
 *    +<function>->•<CSSFUNCTION><splus><expr><RPAREN>
 *    +<function>->•<CSSFUNCTION><expr><RPAREN><splus>
 *    +<function>->•<CSSFUNCTION><expr><RPAREN>
 *   --Transitions--
 *    Goto on <splus> to 213 because of <function>-><CSSFUNCTION>•<splus><expr><RPAREN><splus>
 *    Goto on <splus> to 213 because of <function>-><CSSFUNCTION>•<splus><expr><RPAREN>
 *    Goto on <expr> to 214 because of <function>-><CSSFUNCTION>•<expr><RPAREN><splus>
 *    Goto on <expr> to 214 because of <function>-><CSSFUNCTION>•<expr><RPAREN>
 *    Shift on <SS> to 55 because of <splus>->•<SS> 
 *    Shift on <SS> to 55 because of <splus>->•<SS><splus> 
 *    Goto on <term> to 160 because of <expr>->•<term>
 *    Goto on <expr> to 214 because of <expr>->•<expr><term>
 *    Goto on <expr> to 214 because of <expr>->•<expr><operator><term>
 *    Goto on <term_numeric> to 161 because of <term>->•<term_numeric>
 *    Goto on <term_nonnumeric> to 162 because of <term>->•<term_nonnumeric>
 *    Goto on <unary_operator> to 163 because of <term_numeric>->•<unary_operator><term_numeric_number>
 *    Goto on <term_numeric_number> to 164 because of <term_numeric>->•<term_numeric_number>
 *    Shift on <STRING> to 165 because of <term_nonnumeric>->•<STRING> 
 *    Shift on <STRING> to 165 because of <term_nonnumeric>->•<STRING><splus> 
 *    Shift on <IDENT> to 166 because of <term_nonnumeric>->•<IDENT> 
 *    Shift on <IDENT> to 166 because of <term_nonnumeric>->•<IDENT><splus> 
 *    Shift on <URI> to 167 because of <term_nonnumeric>->•<URI> 
 *    Shift on <URI> to 167 because of <term_nonnumeric>->•<URI><splus> 
 *    Goto on <hexcolor> to 168 because of <term_nonnumeric>->•<hexcolor>
 *    Goto on <function> to 169 because of <term_nonnumeric>->•<function>
 *    Shift on <MINUS> to 170 because of <unary_operator>->•<MINUS> 
 *    Shift on <PLUS> to 171 because of <unary_operator>->•<PLUS> 
 *    Shift on <NUMBER> to 172 because of <term_numeric_number>->•<NUMBER> 
 *    Shift on <NUMBER> to 172 because of <term_numeric_number>->•<NUMBER><splus> 
 *    Shift on <PERCENTAGE> to 173 because of <term_numeric_number>->•<PERCENTAGE> 
 *    Shift on <PERCENTAGE> to 173 because of <term_numeric_number>->•<PERCENTAGE><splus> 
 *    Shift on <LENGTH> to 174 because of <term_numeric_number>->•<LENGTH> 
 *    Shift on <LENGTH> to 174 because of <term_numeric_number>->•<LENGTH><splus> 
 *    Shift on <EMS> to 175 because of <term_numeric_number>->•<EMS> 
 *    Shift on <EMS> to 175 because of <term_numeric_number>->•<EMS><splus> 
 *    Shift on <EXS> to 176 because of <term_numeric_number>->•<EXS> 
 *    Shift on <EXS> to 176 because of <term_numeric_number>->•<EXS><splus> 
 *    Shift on <ANGLE> to 177 because of <term_numeric_number>->•<ANGLE> 
 *    Shift on <ANGLE> to 177 because of <term_numeric_number>->•<ANGLE><splus> 
 *    Shift on <TIME> to 178 because of <term_numeric_number>->•<TIME> 
 *    Shift on <TIME> to 178 because of <term_numeric_number>->•<TIME><splus> 
 *    Shift on <FREQ> to 179 because of <term_numeric_number>->•<FREQ> 
 *    Shift on <FREQ> to 179 because of <term_numeric_number>->•<FREQ><splus> 
 *    Shift on <DIMENSION> to 180 because of <term_numeric_number>->•<DIMENSION> 
 *    Shift on <DIMENSION> to 180 because of <term_numeric_number>->•<DIMENSION><splus> 
 *    Shift on <HASH> to 181 because of <hexcolor>->•<HASH> 
 *    Shift on <HASH> to 181 because of <hexcolor>->•<HASH><splus> 
 *    Shift on <CSSFUNCTION> to 182 because of <function>->•<CSSFUNCTION><splus><expr><RPAREN><splus> 
 *    Shift on <CSSFUNCTION> to 182 because of <function>->•<CSSFUNCTION><splus><expr><RPAREN> 
 *    Shift on <CSSFUNCTION> to 182 because of <function>->•<CSSFUNCTION><expr><RPAREN><splus> 
 *    Shift on <CSSFUNCTION> to 182 because of <function>->•<CSSFUNCTION><expr><RPAREN> 
 * ----------- 183 -----------
 *   --Itemset--
 *     <ppage>-><pagesym_sstar><pseudo_page><splus><LBRACE><declarations_optional_semicolon>•<RBRACE>
 *     <ppage>-><pagesym_sstar><pseudo_page><splus><LBRACE><declarations_optional_semicolon>•<RBRACE><splus>
 *   --Transitions--
 *    Shift on <RBRACE> to 215 because of <ppage>-><pagesym_sstar><pseudo_page><splus><LBRACE><declarations_optional_semicolon>•<RBRACE> 
 *    Shift on <RBRACE> to 215 because of <ppage>-><pagesym_sstar><pseudo_page><splus><LBRACE><declarations_optional_semicolon>•<RBRACE><splus> 
 * ----------- 184 -----------
 *   --Itemset--
 *     <ppage>-><pagesym_sstar><pseudo_page><LBRACE><declarations_optional_semicolon><RBRACE>•
 *     <ppage>-><pagesym_sstar><pseudo_page><LBRACE><declarations_optional_semicolon><RBRACE>•<splus>
 *    +<splus>->•<SS>
 *    +<splus>->•<SS><splus>
 *   --Transitions--
 *    Reduce on <MEDIA_SYM> using <ppage>-><pagesym_sstar><pseudo_page><LBRACE><declarations_optional_semicolon><RBRACE> 
 *    Reduce on <IDENT> using <ppage>-><pagesym_sstar><pseudo_page><LBRACE><declarations_optional_semicolon><RBRACE> 
 *    Reduce on <PAGE_SYM> using <ppage>-><pagesym_sstar><pseudo_page><LBRACE><declarations_optional_semicolon><RBRACE> 
 *    Reduce on <COLON> using <ppage>-><pagesym_sstar><pseudo_page><LBRACE><declarations_optional_semicolon><RBRACE> 
 *    Reduce on <HASH> using <ppage>-><pagesym_sstar><pseudo_page><LBRACE><declarations_optional_semicolon><RBRACE> 
 *    Reduce on <DOT> using <ppage>-><pagesym_sstar><pseudo_page><LBRACE><declarations_optional_semicolon><RBRACE> 
 *    Reduce on <STAR> using <ppage>-><pagesym_sstar><pseudo_page><LBRACE><declarations_optional_semicolon><RBRACE> 
 *    Reduce on <LBRACKET> using <ppage>-><pagesym_sstar><pseudo_page><LBRACE><declarations_optional_semicolon><RBRACE> 
 *    Reduce on  using <ppage>-><pagesym_sstar><pseudo_page><LBRACE><declarations_optional_semicolon><RBRACE> 
 *    Goto on <splus> to 216 because of <ppage>-><pagesym_sstar><pseudo_page><LBRACE><declarations_optional_semicolon><RBRACE>•<splus>
 *    Shift on <SS> to 55 because of <splus>->•<SS> 
 *    Shift on <SS> to 55 because of <splus>->•<SS><splus> 
 * ----------- 185 -----------
 *   --Itemset--
 *     <ppage>-><pagesym_sstar><LBRACE><declarations_optional_semicolon><RBRACE><splus>•
 *   --Transitions--
 *    Reduce on <MEDIA_SYM> using <ppage>-><pagesym_sstar><LBRACE><declarations_optional_semicolon><RBRACE><splus> 
 *    Reduce on <IDENT> using <ppage>-><pagesym_sstar><LBRACE><declarations_optional_semicolon><RBRACE><splus> 
 *    Reduce on <PAGE_SYM> using <ppage>-><pagesym_sstar><LBRACE><declarations_optional_semicolon><RBRACE><splus> 
 *    Reduce on <COLON> using <ppage>-><pagesym_sstar><LBRACE><declarations_optional_semicolon><RBRACE><splus> 
 *    Reduce on <HASH> using <ppage>-><pagesym_sstar><LBRACE><declarations_optional_semicolon><RBRACE><splus> 
 *    Reduce on <DOT> using <ppage>-><pagesym_sstar><LBRACE><declarations_optional_semicolon><RBRACE><splus> 
 *    Reduce on <STAR> using <ppage>-><pagesym_sstar><LBRACE><declarations_optional_semicolon><RBRACE><splus> 
 *    Reduce on <LBRACKET> using <ppage>-><pagesym_sstar><LBRACE><declarations_optional_semicolon><RBRACE><splus> 
 *    Reduce on  using <ppage>-><pagesym_sstar><LBRACE><declarations_optional_semicolon><RBRACE><splus> 
 * ----------- 186 -----------
 *   --Itemset--
 *     <attrib>-><LBRACKET><trimmed_ident><attrib_operator_sstar><attrib_operator_rhand_sstar><RBRACKET>•
 *   --Transitions--
 *    Reduce on <SS> using <attrib>-><LBRACKET><trimmed_ident><attrib_operator_sstar><attrib_operator_rhand_sstar><RBRACKET> 
 *    Reduce on <COMMA> using <attrib>-><LBRACKET><trimmed_ident><attrib_operator_sstar><attrib_operator_rhand_sstar><RBRACKET> 
 *    Reduce on <LBRACE> using <attrib>-><LBRACKET><trimmed_ident><attrib_operator_sstar><attrib_operator_rhand_sstar><RBRACKET> 
 *    Reduce on <COLON> using <attrib>-><LBRACKET><trimmed_ident><attrib_operator_sstar><attrib_operator_rhand_sstar><RBRACKET> 
 *    Reduce on <GREATER> using <attrib>-><LBRACKET><trimmed_ident><attrib_operator_sstar><attrib_operator_rhand_sstar><RBRACKET> 
 *    Reduce on <PLUS> using <attrib>-><LBRACKET><trimmed_ident><attrib_operator_sstar><attrib_operator_rhand_sstar><RBRACKET> 
 *    Reduce on <HASH> using <attrib>-><LBRACKET><trimmed_ident><attrib_operator_sstar><attrib_operator_rhand_sstar><RBRACKET> 
 *    Reduce on <DOT> using <attrib>-><LBRACKET><trimmed_ident><attrib_operator_sstar><attrib_operator_rhand_sstar><RBRACKET> 
 *    Reduce on <LBRACKET> using <attrib>-><LBRACKET><trimmed_ident><attrib_operator_sstar><attrib_operator_rhand_sstar><RBRACKET> 
 * ----------- 187 -----------
 *   --Itemset--
 *     <attrib_operator_rhand_sstar>-><attrib_operator_rhand><splus>•
 *   --Transitions--
 *    Reduce on <RBRACKET> using <attrib_operator_rhand_sstar>-><attrib_operator_rhand><splus> 
 * ----------- 188 -----------
 *   --Itemset--
 *     <media>-><media_sym_sstar><medialist><LBRACE><splus><rulesetplus><RBRACE>•
 *     <media>-><media_sym_sstar><medialist><LBRACE><splus><rulesetplus><RBRACE>•<splus>
 *    +<splus>->•<SS>
 *    +<splus>->•<SS><splus>
 *   --Transitions--
 *    Reduce on <MEDIA_SYM> using <media>-><media_sym_sstar><medialist><LBRACE><splus><rulesetplus><RBRACE> 
 *    Reduce on <IDENT> using <media>-><media_sym_sstar><medialist><LBRACE><splus><rulesetplus><RBRACE> 
 *    Reduce on <PAGE_SYM> using <media>-><media_sym_sstar><medialist><LBRACE><splus><rulesetplus><RBRACE> 
 *    Reduce on <COLON> using <media>-><media_sym_sstar><medialist><LBRACE><splus><rulesetplus><RBRACE> 
 *    Reduce on <HASH> using <media>-><media_sym_sstar><medialist><LBRACE><splus><rulesetplus><RBRACE> 
 *    Reduce on <DOT> using <media>-><media_sym_sstar><medialist><LBRACE><splus><rulesetplus><RBRACE> 
 *    Reduce on <STAR> using <media>-><media_sym_sstar><medialist><LBRACE><splus><rulesetplus><RBRACE> 
 *    Reduce on <LBRACKET> using <media>-><media_sym_sstar><medialist><LBRACE><splus><rulesetplus><RBRACE> 
 *    Reduce on  using <media>-><media_sym_sstar><medialist><LBRACE><splus><rulesetplus><RBRACE> 
 *    Goto on <splus> to 217 because of <media>-><media_sym_sstar><medialist><LBRACE><splus><rulesetplus><RBRACE>•<splus>
 *    Shift on <SS> to 55 because of <splus>->•<SS> 
 *    Shift on <SS> to 55 because of <splus>->•<SS><splus> 
 * ----------- 189 -----------
 *   --Itemset--
 *     <media>-><media_sym_sstar><medialist><LBRACE><splus><RBRACE><splus>•
 *   --Transitions--
 *    Reduce on <MEDIA_SYM> using <media>-><media_sym_sstar><medialist><LBRACE><splus><RBRACE><splus> 
 *    Reduce on <IDENT> using <media>-><media_sym_sstar><medialist><LBRACE><splus><RBRACE><splus> 
 *    Reduce on <PAGE_SYM> using <media>-><media_sym_sstar><medialist><LBRACE><splus><RBRACE><splus> 
 *    Reduce on <COLON> using <media>-><media_sym_sstar><medialist><LBRACE><splus><RBRACE><splus> 
 *    Reduce on <HASH> using <media>-><media_sym_sstar><medialist><LBRACE><splus><RBRACE><splus> 
 *    Reduce on <DOT> using <media>-><media_sym_sstar><medialist><LBRACE><splus><RBRACE><splus> 
 *    Reduce on <STAR> using <media>-><media_sym_sstar><medialist><LBRACE><splus><RBRACE><splus> 
 *    Reduce on <LBRACKET> using <media>-><media_sym_sstar><medialist><LBRACE><splus><RBRACE><splus> 
 *    Reduce on  using <media>-><media_sym_sstar><medialist><LBRACE><splus><RBRACE><splus> 
 * ----------- 190 -----------
 *   --Itemset--
 *     <media>-><media_sym_sstar><medialist><LBRACE><rulesetplus><RBRACE><splus>•
 *   --Transitions--
 *    Reduce on <MEDIA_SYM> using <media>-><media_sym_sstar><medialist><LBRACE><rulesetplus><RBRACE><splus> 
 *    Reduce on <IDENT> using <media>-><media_sym_sstar><medialist><LBRACE><rulesetplus><RBRACE><splus> 
 *    Reduce on <PAGE_SYM> using <media>-><media_sym_sstar><medialist><LBRACE><rulesetplus><RBRACE><splus> 
 *    Reduce on <COLON> using <media>-><media_sym_sstar><medialist><LBRACE><rulesetplus><RBRACE><splus> 
 *    Reduce on <HASH> using <media>-><media_sym_sstar><medialist><LBRACE><rulesetplus><RBRACE><splus> 
 *    Reduce on <DOT> using <media>-><media_sym_sstar><medialist><LBRACE><rulesetplus><RBRACE><splus> 
 *    Reduce on <STAR> using <media>-><media_sym_sstar><medialist><LBRACE><rulesetplus><RBRACE><splus> 
 *    Reduce on <LBRACKET> using <media>-><media_sym_sstar><medialist><LBRACE><rulesetplus><RBRACE><splus> 
 *    Reduce on  using <media>-><media_sym_sstar><medialist><LBRACE><rulesetplus><RBRACE><splus> 
 * ----------- 191 -----------
 *   --Itemset--
 *     <ddeclaration>-><property><COLON><splus><expr>•<prio>
 *     <ddeclaration>-><property><COLON><splus><expr>•
 *     <expr>-><expr>•<term>
 *     <expr>-><expr>•<operator><term>
 *    +<prio>->•<important_sym_sstar>
 *    +<term>->•<term_numeric>
 *    +<term>->•<term_nonnumeric>
 *    +<operator>->•<SLASH>
 *    +<operator>->•<SLASH><splus>
 *    +<operator>->•<COMMA>
 *    +<operator>->•<COMMA><splus>
 *    +<important_sym_sstar>->•<IMPORTANT_SYM>
 *    +<important_sym_sstar>->•<IMPORTANT_SYM><splus>
 *    +<term_numeric>->•<unary_operator><term_numeric_number>
 *    +<term_numeric>->•<term_numeric_number>
 *    +<term_nonnumeric>->•<STRING>
 *    +<term_nonnumeric>->•<STRING><splus>
 *    +<term_nonnumeric>->•<IDENT>
 *    +<term_nonnumeric>->•<IDENT><splus>
 *    +<term_nonnumeric>->•<URI>
 *    +<term_nonnumeric>->•<URI><splus>
 *    +<term_nonnumeric>->•<hexcolor>
 *    +<term_nonnumeric>->•<function>
 *    +<unary_operator>->•<MINUS>
 *    +<unary_operator>->•<PLUS>
 *    +<term_numeric_number>->•<NUMBER>
 *    +<term_numeric_number>->•<NUMBER><splus>
 *    +<term_numeric_number>->•<PERCENTAGE>
 *    +<term_numeric_number>->•<PERCENTAGE><splus>
 *    +<term_numeric_number>->•<LENGTH>
 *    +<term_numeric_number>->•<LENGTH><splus>
 *    +<term_numeric_number>->•<EMS>
 *    +<term_numeric_number>->•<EMS><splus>
 *    +<term_numeric_number>->•<EXS>
 *    +<term_numeric_number>->•<EXS><splus>
 *    +<term_numeric_number>->•<ANGLE>
 *    +<term_numeric_number>->•<ANGLE><splus>
 *    +<term_numeric_number>->•<TIME>
 *    +<term_numeric_number>->•<TIME><splus>
 *    +<term_numeric_number>->•<FREQ>
 *    +<term_numeric_number>->•<FREQ><splus>
 *    +<term_numeric_number>->•<DIMENSION>
 *    +<term_numeric_number>->•<DIMENSION><splus>
 *    +<hexcolor>->•<HASH>
 *    +<hexcolor>->•<HASH><splus>
 *    +<function>->•<CSSFUNCTION><splus><expr><RPAREN><splus>
 *    +<function>->•<CSSFUNCTION><splus><expr><RPAREN>
 *    +<function>->•<CSSFUNCTION><expr><RPAREN><splus>
 *    +<function>->•<CSSFUNCTION><expr><RPAREN>
 *   --Transitions--
 *    Goto on <prio> to 218 because of <ddeclaration>-><property><COLON><splus><expr>•<prio>
 *    Reduce on <SEMICOLON> using <ddeclaration>-><property><COLON><splus><expr> 
 *    Reduce on <RBRACE> using <ddeclaration>-><property><COLON><splus><expr> 
 *    Goto on <term> to 193 because of <expr>-><expr>•<term>
 *    Goto on <operator> to 194 because of <expr>-><expr>•<operator><term>
 *    Goto on <important_sym_sstar> to 195 because of <prio>->•<important_sym_sstar>
 *    Goto on <term_numeric> to 161 because of <term>->•<term_numeric>
 *    Goto on <term_nonnumeric> to 162 because of <term>->•<term_nonnumeric>
 *    Shift on <SLASH> to 196 because of <operator>->•<SLASH> 
 *    Shift on <SLASH> to 196 because of <operator>->•<SLASH><splus> 
 *    Shift on <COMMA> to 197 because of <operator>->•<COMMA> 
 *    Shift on <COMMA> to 197 because of <operator>->•<COMMA><splus> 
 *    Shift on <IMPORTANT_SYM> to 198 because of <important_sym_sstar>->•<IMPORTANT_SYM> 
 *    Shift on <IMPORTANT_SYM> to 198 because of <important_sym_sstar>->•<IMPORTANT_SYM><splus> 
 *    Goto on <unary_operator> to 163 because of <term_numeric>->•<unary_operator><term_numeric_number>
 *    Goto on <term_numeric_number> to 164 because of <term_numeric>->•<term_numeric_number>
 *    Shift on <STRING> to 165 because of <term_nonnumeric>->•<STRING> 
 *    Shift on <STRING> to 165 because of <term_nonnumeric>->•<STRING><splus> 
 *    Shift on <IDENT> to 166 because of <term_nonnumeric>->•<IDENT> 
 *    Shift on <IDENT> to 166 because of <term_nonnumeric>->•<IDENT><splus> 
 *    Shift on <URI> to 167 because of <term_nonnumeric>->•<URI> 
 *    Shift on <URI> to 167 because of <term_nonnumeric>->•<URI><splus> 
 *    Goto on <hexcolor> to 168 because of <term_nonnumeric>->•<hexcolor>
 *    Goto on <function> to 169 because of <term_nonnumeric>->•<function>
 *    Shift on <MINUS> to 170 because of <unary_operator>->•<MINUS> 
 *    Shift on <PLUS> to 171 because of <unary_operator>->•<PLUS> 
 *    Shift on <NUMBER> to 172 because of <term_numeric_number>->•<NUMBER> 
 *    Shift on <NUMBER> to 172 because of <term_numeric_number>->•<NUMBER><splus> 
 *    Shift on <PERCENTAGE> to 173 because of <term_numeric_number>->•<PERCENTAGE> 
 *    Shift on <PERCENTAGE> to 173 because of <term_numeric_number>->•<PERCENTAGE><splus> 
 *    Shift on <LENGTH> to 174 because of <term_numeric_number>->•<LENGTH> 
 *    Shift on <LENGTH> to 174 because of <term_numeric_number>->•<LENGTH><splus> 
 *    Shift on <EMS> to 175 because of <term_numeric_number>->•<EMS> 
 *    Shift on <EMS> to 175 because of <term_numeric_number>->•<EMS><splus> 
 *    Shift on <EXS> to 176 because of <term_numeric_number>->•<EXS> 
 *    Shift on <EXS> to 176 because of <term_numeric_number>->•<EXS><splus> 
 *    Shift on <ANGLE> to 177 because of <term_numeric_number>->•<ANGLE> 
 *    Shift on <ANGLE> to 177 because of <term_numeric_number>->•<ANGLE><splus> 
 *    Shift on <TIME> to 178 because of <term_numeric_number>->•<TIME> 
 *    Shift on <TIME> to 178 because of <term_numeric_number>->•<TIME><splus> 
 *    Shift on <FREQ> to 179 because of <term_numeric_number>->•<FREQ> 
 *    Shift on <FREQ> to 179 because of <term_numeric_number>->•<FREQ><splus> 
 *    Shift on <DIMENSION> to 180 because of <term_numeric_number>->•<DIMENSION> 
 *    Shift on <DIMENSION> to 180 because of <term_numeric_number>->•<DIMENSION><splus> 
 *    Shift on <HASH> to 181 because of <hexcolor>->•<HASH> 
 *    Shift on <HASH> to 181 because of <hexcolor>->•<HASH><splus> 
 *    Shift on <CSSFUNCTION> to 182 because of <function>->•<CSSFUNCTION><splus><expr><RPAREN><splus> 
 *    Shift on <CSSFUNCTION> to 182 because of <function>->•<CSSFUNCTION><splus><expr><RPAREN> 
 *    Shift on <CSSFUNCTION> to 182 because of <function>->•<CSSFUNCTION><expr><RPAREN><splus> 
 *    Shift on <CSSFUNCTION> to 182 because of <function>->•<CSSFUNCTION><expr><RPAREN> 
 * ----------- 192 -----------
 *   --Itemset--
 *     <ddeclaration>-><property><COLON><expr><prio>•
 *   --Transitions--
 *    Reduce on <SEMICOLON> using <ddeclaration>-><property><COLON><expr><prio> 
 *    Reduce on <RBRACE> using <ddeclaration>-><property><COLON><expr><prio> 
 * ----------- 193 -----------
 *   --Itemset--
 *     <expr>-><expr><term>•
 *   --Transitions--
 *    Reduce on <SEMICOLON> using <expr>-><expr><term> 
 *    Reduce on <STRING> using <expr>-><expr><term> 
 *    Reduce on <URI> using <expr>-><expr><term> 
 *    Reduce on <COMMA> using <expr>-><expr><term> 
 *    Reduce on <RBRACE> using <expr>-><expr><term> 
 *    Reduce on <IDENT> using <expr>-><expr><term> 
 *    Reduce on <SLASH> using <expr>-><expr><term> 
 *    Reduce on <PLUS> using <expr>-><expr><term> 
 *    Reduce on <MINUS> using <expr>-><expr><term> 
 *    Reduce on <HASH> using <expr>-><expr><term> 
 *    Reduce on <CSSFUNCTION> using <expr>-><expr><term> 
 *    Reduce on <RPAREN> using <expr>-><expr><term> 
 *    Reduce on <IMPORTANT_SYM> using <expr>-><expr><term> 
 *    Reduce on <NUMBER> using <expr>-><expr><term> 
 *    Reduce on <PERCENTAGE> using <expr>-><expr><term> 
 *    Reduce on <LENGTH> using <expr>-><expr><term> 
 *    Reduce on <EMS> using <expr>-><expr><term> 
 *    Reduce on <EXS> using <expr>-><expr><term> 
 *    Reduce on <ANGLE> using <expr>-><expr><term> 
 *    Reduce on <TIME> using <expr>-><expr><term> 
 *    Reduce on <FREQ> using <expr>-><expr><term> 
 *    Reduce on <DIMENSION> using <expr>-><expr><term> 
 * ----------- 194 -----------
 *   --Itemset--
 *     <expr>-><expr><operator>•<term>
 *    +<term>->•<term_numeric>
 *    +<term>->•<term_nonnumeric>
 *    +<term_numeric>->•<unary_operator><term_numeric_number>
 *    +<term_numeric>->•<term_numeric_number>
 *    +<term_nonnumeric>->•<STRING>
 *    +<term_nonnumeric>->•<STRING><splus>
 *    +<term_nonnumeric>->•<IDENT>
 *    +<term_nonnumeric>->•<IDENT><splus>
 *    +<term_nonnumeric>->•<URI>
 *    +<term_nonnumeric>->•<URI><splus>
 *    +<term_nonnumeric>->•<hexcolor>
 *    +<term_nonnumeric>->•<function>
 *    +<unary_operator>->•<MINUS>
 *    +<unary_operator>->•<PLUS>
 *    +<term_numeric_number>->•<NUMBER>
 *    +<term_numeric_number>->•<NUMBER><splus>
 *    +<term_numeric_number>->•<PERCENTAGE>
 *    +<term_numeric_number>->•<PERCENTAGE><splus>
 *    +<term_numeric_number>->•<LENGTH>
 *    +<term_numeric_number>->•<LENGTH><splus>
 *    +<term_numeric_number>->•<EMS>
 *    +<term_numeric_number>->•<EMS><splus>
 *    +<term_numeric_number>->•<EXS>
 *    +<term_numeric_number>->•<EXS><splus>
 *    +<term_numeric_number>->•<ANGLE>
 *    +<term_numeric_number>->•<ANGLE><splus>
 *    +<term_numeric_number>->•<TIME>
 *    +<term_numeric_number>->•<TIME><splus>
 *    +<term_numeric_number>->•<FREQ>
 *    +<term_numeric_number>->•<FREQ><splus>
 *    +<term_numeric_number>->•<DIMENSION>
 *    +<term_numeric_number>->•<DIMENSION><splus>
 *    +<hexcolor>->•<HASH>
 *    +<hexcolor>->•<HASH><splus>
 *    +<function>->•<CSSFUNCTION><splus><expr><RPAREN><splus>
 *    +<function>->•<CSSFUNCTION><splus><expr><RPAREN>
 *    +<function>->•<CSSFUNCTION><expr><RPAREN><splus>
 *    +<function>->•<CSSFUNCTION><expr><RPAREN>
 *   --Transitions--
 *    Goto on <term> to 219 because of <expr>-><expr><operator>•<term>
 *    Goto on <term_numeric> to 161 because of <term>->•<term_numeric>
 *    Goto on <term_nonnumeric> to 162 because of <term>->•<term_nonnumeric>
 *    Goto on <unary_operator> to 163 because of <term_numeric>->•<unary_operator><term_numeric_number>
 *    Goto on <term_numeric_number> to 164 because of <term_numeric>->•<term_numeric_number>
 *    Shift on <STRING> to 165 because of <term_nonnumeric>->•<STRING> 
 *    Shift on <STRING> to 165 because of <term_nonnumeric>->•<STRING><splus> 
 *    Shift on <IDENT> to 166 because of <term_nonnumeric>->•<IDENT> 
 *    Shift on <IDENT> to 166 because of <term_nonnumeric>->•<IDENT><splus> 
 *    Shift on <URI> to 167 because of <term_nonnumeric>->•<URI> 
 *    Shift on <URI> to 167 because of <term_nonnumeric>->•<URI><splus> 
 *    Goto on <hexcolor> to 168 because of <term_nonnumeric>->•<hexcolor>
 *    Goto on <function> to 169 because of <term_nonnumeric>->•<function>
 *    Shift on <MINUS> to 170 because of <unary_operator>->•<MINUS> 
 *    Shift on <PLUS> to 171 because of <unary_operator>->•<PLUS> 
 *    Shift on <NUMBER> to 172 because of <term_numeric_number>->•<NUMBER> 
 *    Shift on <NUMBER> to 172 because of <term_numeric_number>->•<NUMBER><splus> 
 *    Shift on <PERCENTAGE> to 173 because of <term_numeric_number>->•<PERCENTAGE> 
 *    Shift on <PERCENTAGE> to 173 because of <term_numeric_number>->•<PERCENTAGE><splus> 
 *    Shift on <LENGTH> to 174 because of <term_numeric_number>->•<LENGTH> 
 *    Shift on <LENGTH> to 174 because of <term_numeric_number>->•<LENGTH><splus> 
 *    Shift on <EMS> to 175 because of <term_numeric_number>->•<EMS> 
 *    Shift on <EMS> to 175 because of <term_numeric_number>->•<EMS><splus> 
 *    Shift on <EXS> to 176 because of <term_numeric_number>->•<EXS> 
 *    Shift on <EXS> to 176 because of <term_numeric_number>->•<EXS><splus> 
 *    Shift on <ANGLE> to 177 because of <term_numeric_number>->•<ANGLE> 
 *    Shift on <ANGLE> to 177 because of <term_numeric_number>->•<ANGLE><splus> 
 *    Shift on <TIME> to 178 because of <term_numeric_number>->•<TIME> 
 *    Shift on <TIME> to 178 because of <term_numeric_number>->•<TIME><splus> 
 *    Shift on <FREQ> to 179 because of <term_numeric_number>->•<FREQ> 
 *    Shift on <FREQ> to 179 because of <term_numeric_number>->•<FREQ><splus> 
 *    Shift on <DIMENSION> to 180 because of <term_numeric_number>->•<DIMENSION> 
 *    Shift on <DIMENSION> to 180 because of <term_numeric_number>->•<DIMENSION><splus> 
 *    Shift on <HASH> to 181 because of <hexcolor>->•<HASH> 
 *    Shift on <HASH> to 181 because of <hexcolor>->•<HASH><splus> 
 *    Shift on <CSSFUNCTION> to 182 because of <function>->•<CSSFUNCTION><splus><expr><RPAREN><splus> 
 *    Shift on <CSSFUNCTION> to 182 because of <function>->•<CSSFUNCTION><splus><expr><RPAREN> 
 *    Shift on <CSSFUNCTION> to 182 because of <function>->•<CSSFUNCTION><expr><RPAREN><splus> 
 *    Shift on <CSSFUNCTION> to 182 because of <function>->•<CSSFUNCTION><expr><RPAREN> 
 * ----------- 195 -----------
 *   --Itemset--
 *     <prio>-><important_sym_sstar>•
 *   --Transitions--
 *    Reduce on <SEMICOLON> using <prio>-><important_sym_sstar> 
 *    Reduce on <RBRACE> using <prio>-><important_sym_sstar> 
 * ----------- 196 -----------
 *   --Itemset--
 *     <operator>-><SLASH>•
 *     <operator>-><SLASH>•<splus>
 *    +<splus>->•<SS>
 *    +<splus>->•<SS><splus>
 *   --Transitions--
 *    Reduce on <STRING> using <operator>-><SLASH> 
 *    Reduce on <URI> using <operator>-><SLASH> 
 *    Reduce on <IDENT> using <operator>-><SLASH> 
 *    Reduce on <PLUS> using <operator>-><SLASH> 
 *    Reduce on <MINUS> using <operator>-><SLASH> 
 *    Reduce on <HASH> using <operator>-><SLASH> 
 *    Reduce on <CSSFUNCTION> using <operator>-><SLASH> 
 *    Reduce on <NUMBER> using <operator>-><SLASH> 
 *    Reduce on <PERCENTAGE> using <operator>-><SLASH> 
 *    Reduce on <LENGTH> using <operator>-><SLASH> 
 *    Reduce on <EMS> using <operator>-><SLASH> 
 *    Reduce on <EXS> using <operator>-><SLASH> 
 *    Reduce on <ANGLE> using <operator>-><SLASH> 
 *    Reduce on <TIME> using <operator>-><SLASH> 
 *    Reduce on <FREQ> using <operator>-><SLASH> 
 *    Reduce on <DIMENSION> using <operator>-><SLASH> 
 *    Goto on <splus> to 220 because of <operator>-><SLASH>•<splus>
 *    Shift on <SS> to 55 because of <splus>->•<SS> 
 *    Shift on <SS> to 55 because of <splus>->•<SS><splus> 
 * ----------- 197 -----------
 *   --Itemset--
 *     <operator>-><COMMA>•
 *     <operator>-><COMMA>•<splus>
 *    +<splus>->•<SS>
 *    +<splus>->•<SS><splus>
 *   --Transitions--
 *    Reduce on <STRING> using <operator>-><COMMA> 
 *    Reduce on <URI> using <operator>-><COMMA> 
 *    Reduce on <IDENT> using <operator>-><COMMA> 
 *    Reduce on <PLUS> using <operator>-><COMMA> 
 *    Reduce on <MINUS> using <operator>-><COMMA> 
 *    Reduce on <HASH> using <operator>-><COMMA> 
 *    Reduce on <CSSFUNCTION> using <operator>-><COMMA> 
 *    Reduce on <NUMBER> using <operator>-><COMMA> 
 *    Reduce on <PERCENTAGE> using <operator>-><COMMA> 
 *    Reduce on <LENGTH> using <operator>-><COMMA> 
 *    Reduce on <EMS> using <operator>-><COMMA> 
 *    Reduce on <EXS> using <operator>-><COMMA> 
 *    Reduce on <ANGLE> using <operator>-><COMMA> 
 *    Reduce on <TIME> using <operator>-><COMMA> 
 *    Reduce on <FREQ> using <operator>-><COMMA> 
 *    Reduce on <DIMENSION> using <operator>-><COMMA> 
 *    Goto on <splus> to 221 because of <operator>-><COMMA>•<splus>
 *    Shift on <SS> to 55 because of <splus>->•<SS> 
 *    Shift on <SS> to 55 because of <splus>->•<SS><splus> 
 * ----------- 198 -----------
 *   --Itemset--
 *     <important_sym_sstar>-><IMPORTANT_SYM>•
 *     <important_sym_sstar>-><IMPORTANT_SYM>•<splus>
 *    +<splus>->•<SS>
 *    +<splus>->•<SS><splus>
 *   --Transitions--
 *    Reduce on <SEMICOLON> using <important_sym_sstar>-><IMPORTANT_SYM> 
 *    Reduce on <RBRACE> using <important_sym_sstar>-><IMPORTANT_SYM> 
 *    Goto on <splus> to 222 because of <important_sym_sstar>-><IMPORTANT_SYM>•<splus>
 *    Shift on <SS> to 55 because of <splus>->•<SS> 
 *    Shift on <SS> to 55 because of <splus>->•<SS><splus> 
 * ----------- 199 -----------
 *   --Itemset--
 *     <term_numeric>-><unary_operator><term_numeric_number>•
 *   --Transitions--
 *    Reduce on <SEMICOLON> using <term_numeric>-><unary_operator><term_numeric_number> 
 *    Reduce on <STRING> using <term_numeric>-><unary_operator><term_numeric_number> 
 *    Reduce on <URI> using <term_numeric>-><unary_operator><term_numeric_number> 
 *    Reduce on <COMMA> using <term_numeric>-><unary_operator><term_numeric_number> 
 *    Reduce on <RBRACE> using <term_numeric>-><unary_operator><term_numeric_number> 
 *    Reduce on <IDENT> using <term_numeric>-><unary_operator><term_numeric_number> 
 *    Reduce on <SLASH> using <term_numeric>-><unary_operator><term_numeric_number> 
 *    Reduce on <PLUS> using <term_numeric>-><unary_operator><term_numeric_number> 
 *    Reduce on <MINUS> using <term_numeric>-><unary_operator><term_numeric_number> 
 *    Reduce on <HASH> using <term_numeric>-><unary_operator><term_numeric_number> 
 *    Reduce on <CSSFUNCTION> using <term_numeric>-><unary_operator><term_numeric_number> 
 *    Reduce on <RPAREN> using <term_numeric>-><unary_operator><term_numeric_number> 
 *    Reduce on <IMPORTANT_SYM> using <term_numeric>-><unary_operator><term_numeric_number> 
 *    Reduce on <NUMBER> using <term_numeric>-><unary_operator><term_numeric_number> 
 *    Reduce on <PERCENTAGE> using <term_numeric>-><unary_operator><term_numeric_number> 
 *    Reduce on <LENGTH> using <term_numeric>-><unary_operator><term_numeric_number> 
 *    Reduce on <EMS> using <term_numeric>-><unary_operator><term_numeric_number> 
 *    Reduce on <EXS> using <term_numeric>-><unary_operator><term_numeric_number> 
 *    Reduce on <ANGLE> using <term_numeric>-><unary_operator><term_numeric_number> 
 *    Reduce on <TIME> using <term_numeric>-><unary_operator><term_numeric_number> 
 *    Reduce on <FREQ> using <term_numeric>-><unary_operator><term_numeric_number> 
 *    Reduce on <DIMENSION> using <term_numeric>-><unary_operator><term_numeric_number> 
 * ----------- 200 -----------
 *   --Itemset--
 *     <term_nonnumeric>-><STRING><splus>•
 *   --Transitions--
 *    Reduce on <SEMICOLON> using <term_nonnumeric>-><STRING><splus> 
 *    Reduce on <STRING> using <term_nonnumeric>-><STRING><splus> 
 *    Reduce on <URI> using <term_nonnumeric>-><STRING><splus> 
 *    Reduce on <COMMA> using <term_nonnumeric>-><STRING><splus> 
 *    Reduce on <RBRACE> using <term_nonnumeric>-><STRING><splus> 
 *    Reduce on <IDENT> using <term_nonnumeric>-><STRING><splus> 
 *    Reduce on <SLASH> using <term_nonnumeric>-><STRING><splus> 
 *    Reduce on <PLUS> using <term_nonnumeric>-><STRING><splus> 
 *    Reduce on <MINUS> using <term_nonnumeric>-><STRING><splus> 
 *    Reduce on <HASH> using <term_nonnumeric>-><STRING><splus> 
 *    Reduce on <CSSFUNCTION> using <term_nonnumeric>-><STRING><splus> 
 *    Reduce on <RPAREN> using <term_nonnumeric>-><STRING><splus> 
 *    Reduce on <IMPORTANT_SYM> using <term_nonnumeric>-><STRING><splus> 
 *    Reduce on <NUMBER> using <term_nonnumeric>-><STRING><splus> 
 *    Reduce on <PERCENTAGE> using <term_nonnumeric>-><STRING><splus> 
 *    Reduce on <LENGTH> using <term_nonnumeric>-><STRING><splus> 
 *    Reduce on <EMS> using <term_nonnumeric>-><STRING><splus> 
 *    Reduce on <EXS> using <term_nonnumeric>-><STRING><splus> 
 *    Reduce on <ANGLE> using <term_nonnumeric>-><STRING><splus> 
 *    Reduce on <TIME> using <term_nonnumeric>-><STRING><splus> 
 *    Reduce on <FREQ> using <term_nonnumeric>-><STRING><splus> 
 *    Reduce on <DIMENSION> using <term_nonnumeric>-><STRING><splus> 
 * ----------- 201 -----------
 *   --Itemset--
 *     <term_nonnumeric>-><IDENT><splus>•
 *   --Transitions--
 *    Reduce on <SEMICOLON> using <term_nonnumeric>-><IDENT><splus> 
 *    Reduce on <STRING> using <term_nonnumeric>-><IDENT><splus> 
 *    Reduce on <URI> using <term_nonnumeric>-><IDENT><splus> 
 *    Reduce on <COMMA> using <term_nonnumeric>-><IDENT><splus> 
 *    Reduce on <RBRACE> using <term_nonnumeric>-><IDENT><splus> 
 *    Reduce on <IDENT> using <term_nonnumeric>-><IDENT><splus> 
 *    Reduce on <SLASH> using <term_nonnumeric>-><IDENT><splus> 
 *    Reduce on <PLUS> using <term_nonnumeric>-><IDENT><splus> 
 *    Reduce on <MINUS> using <term_nonnumeric>-><IDENT><splus> 
 *    Reduce on <HASH> using <term_nonnumeric>-><IDENT><splus> 
 *    Reduce on <CSSFUNCTION> using <term_nonnumeric>-><IDENT><splus> 
 *    Reduce on <RPAREN> using <term_nonnumeric>-><IDENT><splus> 
 *    Reduce on <IMPORTANT_SYM> using <term_nonnumeric>-><IDENT><splus> 
 *    Reduce on <NUMBER> using <term_nonnumeric>-><IDENT><splus> 
 *    Reduce on <PERCENTAGE> using <term_nonnumeric>-><IDENT><splus> 
 *    Reduce on <LENGTH> using <term_nonnumeric>-><IDENT><splus> 
 *    Reduce on <EMS> using <term_nonnumeric>-><IDENT><splus> 
 *    Reduce on <EXS> using <term_nonnumeric>-><IDENT><splus> 
 *    Reduce on <ANGLE> using <term_nonnumeric>-><IDENT><splus> 
 *    Reduce on <TIME> using <term_nonnumeric>-><IDENT><splus> 
 *    Reduce on <FREQ> using <term_nonnumeric>-><IDENT><splus> 
 *    Reduce on <DIMENSION> using <term_nonnumeric>-><IDENT><splus> 
 * ----------- 202 -----------
 *   --Itemset--
 *     <term_nonnumeric>-><URI><splus>•
 *   --Transitions--
 *    Reduce on <SEMICOLON> using <term_nonnumeric>-><URI><splus> 
 *    Reduce on <STRING> using <term_nonnumeric>-><URI><splus> 
 *    Reduce on <URI> using <term_nonnumeric>-><URI><splus> 
 *    Reduce on <COMMA> using <term_nonnumeric>-><URI><splus> 
 *    Reduce on <RBRACE> using <term_nonnumeric>-><URI><splus> 
 *    Reduce on <IDENT> using <term_nonnumeric>-><URI><splus> 
 *    Reduce on <SLASH> using <term_nonnumeric>-><URI><splus> 
 *    Reduce on <PLUS> using <term_nonnumeric>-><URI><splus> 
 *    Reduce on <MINUS> using <term_nonnumeric>-><URI><splus> 
 *    Reduce on <HASH> using <term_nonnumeric>-><URI><splus> 
 *    Reduce on <CSSFUNCTION> using <term_nonnumeric>-><URI><splus> 
 *    Reduce on <RPAREN> using <term_nonnumeric>-><URI><splus> 
 *    Reduce on <IMPORTANT_SYM> using <term_nonnumeric>-><URI><splus> 
 *    Reduce on <NUMBER> using <term_nonnumeric>-><URI><splus> 
 *    Reduce on <PERCENTAGE> using <term_nonnumeric>-><URI><splus> 
 *    Reduce on <LENGTH> using <term_nonnumeric>-><URI><splus> 
 *    Reduce on <EMS> using <term_nonnumeric>-><URI><splus> 
 *    Reduce on <EXS> using <term_nonnumeric>-><URI><splus> 
 *    Reduce on <ANGLE> using <term_nonnumeric>-><URI><splus> 
 *    Reduce on <TIME> using <term_nonnumeric>-><URI><splus> 
 *    Reduce on <FREQ> using <term_nonnumeric>-><URI><splus> 
 *    Reduce on <DIMENSION> using <term_nonnumeric>-><URI><splus> 
 * ----------- 203 -----------
 *   --Itemset--
 *     <term_numeric_number>-><NUMBER><splus>•
 *   --Transitions--
 *    Reduce on <SEMICOLON> using <term_numeric_number>-><NUMBER><splus> 
 *    Reduce on <STRING> using <term_numeric_number>-><NUMBER><splus> 
 *    Reduce on <URI> using <term_numeric_number>-><NUMBER><splus> 
 *    Reduce on <COMMA> using <term_numeric_number>-><NUMBER><splus> 
 *    Reduce on <RBRACE> using <term_numeric_number>-><NUMBER><splus> 
 *    Reduce on <IDENT> using <term_numeric_number>-><NUMBER><splus> 
 *    Reduce on <SLASH> using <term_numeric_number>-><NUMBER><splus> 
 *    Reduce on <PLUS> using <term_numeric_number>-><NUMBER><splus> 
 *    Reduce on <MINUS> using <term_numeric_number>-><NUMBER><splus> 
 *    Reduce on <HASH> using <term_numeric_number>-><NUMBER><splus> 
 *    Reduce on <CSSFUNCTION> using <term_numeric_number>-><NUMBER><splus> 
 *    Reduce on <RPAREN> using <term_numeric_number>-><NUMBER><splus> 
 *    Reduce on <IMPORTANT_SYM> using <term_numeric_number>-><NUMBER><splus> 
 *    Reduce on <NUMBER> using <term_numeric_number>-><NUMBER><splus> 
 *    Reduce on <PERCENTAGE> using <term_numeric_number>-><NUMBER><splus> 
 *    Reduce on <LENGTH> using <term_numeric_number>-><NUMBER><splus> 
 *    Reduce on <EMS> using <term_numeric_number>-><NUMBER><splus> 
 *    Reduce on <EXS> using <term_numeric_number>-><NUMBER><splus> 
 *    Reduce on <ANGLE> using <term_numeric_number>-><NUMBER><splus> 
 *    Reduce on <TIME> using <term_numeric_number>-><NUMBER><splus> 
 *    Reduce on <FREQ> using <term_numeric_number>-><NUMBER><splus> 
 *    Reduce on <DIMENSION> using <term_numeric_number>-><NUMBER><splus> 
 * ----------- 204 -----------
 *   --Itemset--
 *     <term_numeric_number>-><PERCENTAGE><splus>•
 *   --Transitions--
 *    Reduce on <SEMICOLON> using <term_numeric_number>-><PERCENTAGE><splus> 
 *    Reduce on <STRING> using <term_numeric_number>-><PERCENTAGE><splus> 
 *    Reduce on <URI> using <term_numeric_number>-><PERCENTAGE><splus> 
 *    Reduce on <COMMA> using <term_numeric_number>-><PERCENTAGE><splus> 
 *    Reduce on <RBRACE> using <term_numeric_number>-><PERCENTAGE><splus> 
 *    Reduce on <IDENT> using <term_numeric_number>-><PERCENTAGE><splus> 
 *    Reduce on <SLASH> using <term_numeric_number>-><PERCENTAGE><splus> 
 *    Reduce on <PLUS> using <term_numeric_number>-><PERCENTAGE><splus> 
 *    Reduce on <MINUS> using <term_numeric_number>-><PERCENTAGE><splus> 
 *    Reduce on <HASH> using <term_numeric_number>-><PERCENTAGE><splus> 
 *    Reduce on <CSSFUNCTION> using <term_numeric_number>-><PERCENTAGE><splus> 
 *    Reduce on <RPAREN> using <term_numeric_number>-><PERCENTAGE><splus> 
 *    Reduce on <IMPORTANT_SYM> using <term_numeric_number>-><PERCENTAGE><splus> 
 *    Reduce on <NUMBER> using <term_numeric_number>-><PERCENTAGE><splus> 
 *    Reduce on <PERCENTAGE> using <term_numeric_number>-><PERCENTAGE><splus> 
 *    Reduce on <LENGTH> using <term_numeric_number>-><PERCENTAGE><splus> 
 *    Reduce on <EMS> using <term_numeric_number>-><PERCENTAGE><splus> 
 *    Reduce on <EXS> using <term_numeric_number>-><PERCENTAGE><splus> 
 *    Reduce on <ANGLE> using <term_numeric_number>-><PERCENTAGE><splus> 
 *    Reduce on <TIME> using <term_numeric_number>-><PERCENTAGE><splus> 
 *    Reduce on <FREQ> using <term_numeric_number>-><PERCENTAGE><splus> 
 *    Reduce on <DIMENSION> using <term_numeric_number>-><PERCENTAGE><splus> 
 * ----------- 205 -----------
 *   --Itemset--
 *     <term_numeric_number>-><LENGTH><splus>•
 *   --Transitions--
 *    Reduce on <SEMICOLON> using <term_numeric_number>-><LENGTH><splus> 
 *    Reduce on <STRING> using <term_numeric_number>-><LENGTH><splus> 
 *    Reduce on <URI> using <term_numeric_number>-><LENGTH><splus> 
 *    Reduce on <COMMA> using <term_numeric_number>-><LENGTH><splus> 
 *    Reduce on <RBRACE> using <term_numeric_number>-><LENGTH><splus> 
 *    Reduce on <IDENT> using <term_numeric_number>-><LENGTH><splus> 
 *    Reduce on <SLASH> using <term_numeric_number>-><LENGTH><splus> 
 *    Reduce on <PLUS> using <term_numeric_number>-><LENGTH><splus> 
 *    Reduce on <MINUS> using <term_numeric_number>-><LENGTH><splus> 
 *    Reduce on <HASH> using <term_numeric_number>-><LENGTH><splus> 
 *    Reduce on <CSSFUNCTION> using <term_numeric_number>-><LENGTH><splus> 
 *    Reduce on <RPAREN> using <term_numeric_number>-><LENGTH><splus> 
 *    Reduce on <IMPORTANT_SYM> using <term_numeric_number>-><LENGTH><splus> 
 *    Reduce on <NUMBER> using <term_numeric_number>-><LENGTH><splus> 
 *    Reduce on <PERCENTAGE> using <term_numeric_number>-><LENGTH><splus> 
 *    Reduce on <LENGTH> using <term_numeric_number>-><LENGTH><splus> 
 *    Reduce on <EMS> using <term_numeric_number>-><LENGTH><splus> 
 *    Reduce on <EXS> using <term_numeric_number>-><LENGTH><splus> 
 *    Reduce on <ANGLE> using <term_numeric_number>-><LENGTH><splus> 
 *    Reduce on <TIME> using <term_numeric_number>-><LENGTH><splus> 
 *    Reduce on <FREQ> using <term_numeric_number>-><LENGTH><splus> 
 *    Reduce on <DIMENSION> using <term_numeric_number>-><LENGTH><splus> 
 * ----------- 206 -----------
 *   --Itemset--
 *     <term_numeric_number>-><EMS><splus>•
 *   --Transitions--
 *    Reduce on <SEMICOLON> using <term_numeric_number>-><EMS><splus> 
 *    Reduce on <STRING> using <term_numeric_number>-><EMS><splus> 
 *    Reduce on <URI> using <term_numeric_number>-><EMS><splus> 
 *    Reduce on <COMMA> using <term_numeric_number>-><EMS><splus> 
 *    Reduce on <RBRACE> using <term_numeric_number>-><EMS><splus> 
 *    Reduce on <IDENT> using <term_numeric_number>-><EMS><splus> 
 *    Reduce on <SLASH> using <term_numeric_number>-><EMS><splus> 
 *    Reduce on <PLUS> using <term_numeric_number>-><EMS><splus> 
 *    Reduce on <MINUS> using <term_numeric_number>-><EMS><splus> 
 *    Reduce on <HASH> using <term_numeric_number>-><EMS><splus> 
 *    Reduce on <CSSFUNCTION> using <term_numeric_number>-><EMS><splus> 
 *    Reduce on <RPAREN> using <term_numeric_number>-><EMS><splus> 
 *    Reduce on <IMPORTANT_SYM> using <term_numeric_number>-><EMS><splus> 
 *    Reduce on <NUMBER> using <term_numeric_number>-><EMS><splus> 
 *    Reduce on <PERCENTAGE> using <term_numeric_number>-><EMS><splus> 
 *    Reduce on <LENGTH> using <term_numeric_number>-><EMS><splus> 
 *    Reduce on <EMS> using <term_numeric_number>-><EMS><splus> 
 *    Reduce on <EXS> using <term_numeric_number>-><EMS><splus> 
 *    Reduce on <ANGLE> using <term_numeric_number>-><EMS><splus> 
 *    Reduce on <TIME> using <term_numeric_number>-><EMS><splus> 
 *    Reduce on <FREQ> using <term_numeric_number>-><EMS><splus> 
 *    Reduce on <DIMENSION> using <term_numeric_number>-><EMS><splus> 
 * ----------- 207 -----------
 *   --Itemset--
 *     <term_numeric_number>-><EXS><splus>•
 *   --Transitions--
 *    Reduce on <SEMICOLON> using <term_numeric_number>-><EXS><splus> 
 *    Reduce on <STRING> using <term_numeric_number>-><EXS><splus> 
 *    Reduce on <URI> using <term_numeric_number>-><EXS><splus> 
 *    Reduce on <COMMA> using <term_numeric_number>-><EXS><splus> 
 *    Reduce on <RBRACE> using <term_numeric_number>-><EXS><splus> 
 *    Reduce on <IDENT> using <term_numeric_number>-><EXS><splus> 
 *    Reduce on <SLASH> using <term_numeric_number>-><EXS><splus> 
 *    Reduce on <PLUS> using <term_numeric_number>-><EXS><splus> 
 *    Reduce on <MINUS> using <term_numeric_number>-><EXS><splus> 
 *    Reduce on <HASH> using <term_numeric_number>-><EXS><splus> 
 *    Reduce on <CSSFUNCTION> using <term_numeric_number>-><EXS><splus> 
 *    Reduce on <RPAREN> using <term_numeric_number>-><EXS><splus> 
 *    Reduce on <IMPORTANT_SYM> using <term_numeric_number>-><EXS><splus> 
 *    Reduce on <NUMBER> using <term_numeric_number>-><EXS><splus> 
 *    Reduce on <PERCENTAGE> using <term_numeric_number>-><EXS><splus> 
 *    Reduce on <LENGTH> using <term_numeric_number>-><EXS><splus> 
 *    Reduce on <EMS> using <term_numeric_number>-><EXS><splus> 
 *    Reduce on <EXS> using <term_numeric_number>-><EXS><splus> 
 *    Reduce on <ANGLE> using <term_numeric_number>-><EXS><splus> 
 *    Reduce on <TIME> using <term_numeric_number>-><EXS><splus> 
 *    Reduce on <FREQ> using <term_numeric_number>-><EXS><splus> 
 *    Reduce on <DIMENSION> using <term_numeric_number>-><EXS><splus> 
 * ----------- 208 -----------
 *   --Itemset--
 *     <term_numeric_number>-><ANGLE><splus>•
 *   --Transitions--
 *    Reduce on <SEMICOLON> using <term_numeric_number>-><ANGLE><splus> 
 *    Reduce on <STRING> using <term_numeric_number>-><ANGLE><splus> 
 *    Reduce on <URI> using <term_numeric_number>-><ANGLE><splus> 
 *    Reduce on <COMMA> using <term_numeric_number>-><ANGLE><splus> 
 *    Reduce on <RBRACE> using <term_numeric_number>-><ANGLE><splus> 
 *    Reduce on <IDENT> using <term_numeric_number>-><ANGLE><splus> 
 *    Reduce on <SLASH> using <term_numeric_number>-><ANGLE><splus> 
 *    Reduce on <PLUS> using <term_numeric_number>-><ANGLE><splus> 
 *    Reduce on <MINUS> using <term_numeric_number>-><ANGLE><splus> 
 *    Reduce on <HASH> using <term_numeric_number>-><ANGLE><splus> 
 *    Reduce on <CSSFUNCTION> using <term_numeric_number>-><ANGLE><splus> 
 *    Reduce on <RPAREN> using <term_numeric_number>-><ANGLE><splus> 
 *    Reduce on <IMPORTANT_SYM> using <term_numeric_number>-><ANGLE><splus> 
 *    Reduce on <NUMBER> using <term_numeric_number>-><ANGLE><splus> 
 *    Reduce on <PERCENTAGE> using <term_numeric_number>-><ANGLE><splus> 
 *    Reduce on <LENGTH> using <term_numeric_number>-><ANGLE><splus> 
 *    Reduce on <EMS> using <term_numeric_number>-><ANGLE><splus> 
 *    Reduce on <EXS> using <term_numeric_number>-><ANGLE><splus> 
 *    Reduce on <ANGLE> using <term_numeric_number>-><ANGLE><splus> 
 *    Reduce on <TIME> using <term_numeric_number>-><ANGLE><splus> 
 *    Reduce on <FREQ> using <term_numeric_number>-><ANGLE><splus> 
 *    Reduce on <DIMENSION> using <term_numeric_number>-><ANGLE><splus> 
 * ----------- 209 -----------
 *   --Itemset--
 *     <term_numeric_number>-><TIME><splus>•
 *   --Transitions--
 *    Reduce on <SEMICOLON> using <term_numeric_number>-><TIME><splus> 
 *    Reduce on <STRING> using <term_numeric_number>-><TIME><splus> 
 *    Reduce on <URI> using <term_numeric_number>-><TIME><splus> 
 *    Reduce on <COMMA> using <term_numeric_number>-><TIME><splus> 
 *    Reduce on <RBRACE> using <term_numeric_number>-><TIME><splus> 
 *    Reduce on <IDENT> using <term_numeric_number>-><TIME><splus> 
 *    Reduce on <SLASH> using <term_numeric_number>-><TIME><splus> 
 *    Reduce on <PLUS> using <term_numeric_number>-><TIME><splus> 
 *    Reduce on <MINUS> using <term_numeric_number>-><TIME><splus> 
 *    Reduce on <HASH> using <term_numeric_number>-><TIME><splus> 
 *    Reduce on <CSSFUNCTION> using <term_numeric_number>-><TIME><splus> 
 *    Reduce on <RPAREN> using <term_numeric_number>-><TIME><splus> 
 *    Reduce on <IMPORTANT_SYM> using <term_numeric_number>-><TIME><splus> 
 *    Reduce on <NUMBER> using <term_numeric_number>-><TIME><splus> 
 *    Reduce on <PERCENTAGE> using <term_numeric_number>-><TIME><splus> 
 *    Reduce on <LENGTH> using <term_numeric_number>-><TIME><splus> 
 *    Reduce on <EMS> using <term_numeric_number>-><TIME><splus> 
 *    Reduce on <EXS> using <term_numeric_number>-><TIME><splus> 
 *    Reduce on <ANGLE> using <term_numeric_number>-><TIME><splus> 
 *    Reduce on <TIME> using <term_numeric_number>-><TIME><splus> 
 *    Reduce on <FREQ> using <term_numeric_number>-><TIME><splus> 
 *    Reduce on <DIMENSION> using <term_numeric_number>-><TIME><splus> 
 * ----------- 210 -----------
 *   --Itemset--
 *     <term_numeric_number>-><FREQ><splus>•
 *   --Transitions--
 *    Reduce on <SEMICOLON> using <term_numeric_number>-><FREQ><splus> 
 *    Reduce on <STRING> using <term_numeric_number>-><FREQ><splus> 
 *    Reduce on <URI> using <term_numeric_number>-><FREQ><splus> 
 *    Reduce on <COMMA> using <term_numeric_number>-><FREQ><splus> 
 *    Reduce on <RBRACE> using <term_numeric_number>-><FREQ><splus> 
 *    Reduce on <IDENT> using <term_numeric_number>-><FREQ><splus> 
 *    Reduce on <SLASH> using <term_numeric_number>-><FREQ><splus> 
 *    Reduce on <PLUS> using <term_numeric_number>-><FREQ><splus> 
 *    Reduce on <MINUS> using <term_numeric_number>-><FREQ><splus> 
 *    Reduce on <HASH> using <term_numeric_number>-><FREQ><splus> 
 *    Reduce on <CSSFUNCTION> using <term_numeric_number>-><FREQ><splus> 
 *    Reduce on <RPAREN> using <term_numeric_number>-><FREQ><splus> 
 *    Reduce on <IMPORTANT_SYM> using <term_numeric_number>-><FREQ><splus> 
 *    Reduce on <NUMBER> using <term_numeric_number>-><FREQ><splus> 
 *    Reduce on <PERCENTAGE> using <term_numeric_number>-><FREQ><splus> 
 *    Reduce on <LENGTH> using <term_numeric_number>-><FREQ><splus> 
 *    Reduce on <EMS> using <term_numeric_number>-><FREQ><splus> 
 *    Reduce on <EXS> using <term_numeric_number>-><FREQ><splus> 
 *    Reduce on <ANGLE> using <term_numeric_number>-><FREQ><splus> 
 *    Reduce on <TIME> using <term_numeric_number>-><FREQ><splus> 
 *    Reduce on <FREQ> using <term_numeric_number>-><FREQ><splus> 
 *    Reduce on <DIMENSION> using <term_numeric_number>-><FREQ><splus> 
 * ----------- 211 -----------
 *   --Itemset--
 *     <term_numeric_number>-><DIMENSION><splus>•
 *   --Transitions--
 *    Reduce on <SEMICOLON> using <term_numeric_number>-><DIMENSION><splus> 
 *    Reduce on <STRING> using <term_numeric_number>-><DIMENSION><splus> 
 *    Reduce on <URI> using <term_numeric_number>-><DIMENSION><splus> 
 *    Reduce on <COMMA> using <term_numeric_number>-><DIMENSION><splus> 
 *    Reduce on <RBRACE> using <term_numeric_number>-><DIMENSION><splus> 
 *    Reduce on <IDENT> using <term_numeric_number>-><DIMENSION><splus> 
 *    Reduce on <SLASH> using <term_numeric_number>-><DIMENSION><splus> 
 *    Reduce on <PLUS> using <term_numeric_number>-><DIMENSION><splus> 
 *    Reduce on <MINUS> using <term_numeric_number>-><DIMENSION><splus> 
 *    Reduce on <HASH> using <term_numeric_number>-><DIMENSION><splus> 
 *    Reduce on <CSSFUNCTION> using <term_numeric_number>-><DIMENSION><splus> 
 *    Reduce on <RPAREN> using <term_numeric_number>-><DIMENSION><splus> 
 *    Reduce on <IMPORTANT_SYM> using <term_numeric_number>-><DIMENSION><splus> 
 *    Reduce on <NUMBER> using <term_numeric_number>-><DIMENSION><splus> 
 *    Reduce on <PERCENTAGE> using <term_numeric_number>-><DIMENSION><splus> 
 *    Reduce on <LENGTH> using <term_numeric_number>-><DIMENSION><splus> 
 *    Reduce on <EMS> using <term_numeric_number>-><DIMENSION><splus> 
 *    Reduce on <EXS> using <term_numeric_number>-><DIMENSION><splus> 
 *    Reduce on <ANGLE> using <term_numeric_number>-><DIMENSION><splus> 
 *    Reduce on <TIME> using <term_numeric_number>-><DIMENSION><splus> 
 *    Reduce on <FREQ> using <term_numeric_number>-><DIMENSION><splus> 
 *    Reduce on <DIMENSION> using <term_numeric_number>-><DIMENSION><splus> 
 * ----------- 212 -----------
 *   --Itemset--
 *     <hexcolor>-><HASH><splus>•
 *   --Transitions--
 *    Reduce on <SEMICOLON> using <hexcolor>-><HASH><splus> 
 *    Reduce on <STRING> using <hexcolor>-><HASH><splus> 
 *    Reduce on <URI> using <hexcolor>-><HASH><splus> 
 *    Reduce on <COMMA> using <hexcolor>-><HASH><splus> 
 *    Reduce on <RBRACE> using <hexcolor>-><HASH><splus> 
 *    Reduce on <IDENT> using <hexcolor>-><HASH><splus> 
 *    Reduce on <SLASH> using <hexcolor>-><HASH><splus> 
 *    Reduce on <PLUS> using <hexcolor>-><HASH><splus> 
 *    Reduce on <MINUS> using <hexcolor>-><HASH><splus> 
 *    Reduce on <HASH> using <hexcolor>-><HASH><splus> 
 *    Reduce on <CSSFUNCTION> using <hexcolor>-><HASH><splus> 
 *    Reduce on <RPAREN> using <hexcolor>-><HASH><splus> 
 *    Reduce on <IMPORTANT_SYM> using <hexcolor>-><HASH><splus> 
 *    Reduce on <NUMBER> using <hexcolor>-><HASH><splus> 
 *    Reduce on <PERCENTAGE> using <hexcolor>-><HASH><splus> 
 *    Reduce on <LENGTH> using <hexcolor>-><HASH><splus> 
 *    Reduce on <EMS> using <hexcolor>-><HASH><splus> 
 *    Reduce on <EXS> using <hexcolor>-><HASH><splus> 
 *    Reduce on <ANGLE> using <hexcolor>-><HASH><splus> 
 *    Reduce on <TIME> using <hexcolor>-><HASH><splus> 
 *    Reduce on <FREQ> using <hexcolor>-><HASH><splus> 
 *    Reduce on <DIMENSION> using <hexcolor>-><HASH><splus> 
 * ----------- 213 -----------
 *   --Itemset--
 *     <function>-><CSSFUNCTION><splus>•<expr><RPAREN><splus>
 *     <function>-><CSSFUNCTION><splus>•<expr><RPAREN>
 *    +<expr>->•<term>
 *    +<expr>->•<expr><term>
 *    +<expr>->•<expr><operator><term>
 *    +<term>->•<term_numeric>
 *    +<term>->•<term_nonnumeric>
 *    +<term_numeric>->•<unary_operator><term_numeric_number>
 *    +<term_numeric>->•<term_numeric_number>
 *    +<term_nonnumeric>->•<STRING>
 *    +<term_nonnumeric>->•<STRING><splus>
 *    +<term_nonnumeric>->•<IDENT>
 *    +<term_nonnumeric>->•<IDENT><splus>
 *    +<term_nonnumeric>->•<URI>
 *    +<term_nonnumeric>->•<URI><splus>
 *    +<term_nonnumeric>->•<hexcolor>
 *    +<term_nonnumeric>->•<function>
 *    +<unary_operator>->•<MINUS>
 *    +<unary_operator>->•<PLUS>
 *    +<term_numeric_number>->•<NUMBER>
 *    +<term_numeric_number>->•<NUMBER><splus>
 *    +<term_numeric_number>->•<PERCENTAGE>
 *    +<term_numeric_number>->•<PERCENTAGE><splus>
 *    +<term_numeric_number>->•<LENGTH>
 *    +<term_numeric_number>->•<LENGTH><splus>
 *    +<term_numeric_number>->•<EMS>
 *    +<term_numeric_number>->•<EMS><splus>
 *    +<term_numeric_number>->•<EXS>
 *    +<term_numeric_number>->•<EXS><splus>
 *    +<term_numeric_number>->•<ANGLE>
 *    +<term_numeric_number>->•<ANGLE><splus>
 *    +<term_numeric_number>->•<TIME>
 *    +<term_numeric_number>->•<TIME><splus>
 *    +<term_numeric_number>->•<FREQ>
 *    +<term_numeric_number>->•<FREQ><splus>
 *    +<term_numeric_number>->•<DIMENSION>
 *    +<term_numeric_number>->•<DIMENSION><splus>
 *    +<hexcolor>->•<HASH>
 *    +<hexcolor>->•<HASH><splus>
 *    +<function>->•<CSSFUNCTION><splus><expr><RPAREN><splus>
 *    +<function>->•<CSSFUNCTION><splus><expr><RPAREN>
 *    +<function>->•<CSSFUNCTION><expr><RPAREN><splus>
 *    +<function>->•<CSSFUNCTION><expr><RPAREN>
 *   --Transitions--
 *    Goto on <expr> to 223 because of <function>-><CSSFUNCTION><splus>•<expr><RPAREN><splus>
 *    Goto on <expr> to 223 because of <function>-><CSSFUNCTION><splus>•<expr><RPAREN>
 *    Goto on <term> to 160 because of <expr>->•<term>
 *    Goto on <expr> to 223 because of <expr>->•<expr><term>
 *    Goto on <expr> to 223 because of <expr>->•<expr><operator><term>
 *    Goto on <term_numeric> to 161 because of <term>->•<term_numeric>
 *    Goto on <term_nonnumeric> to 162 because of <term>->•<term_nonnumeric>
 *    Goto on <unary_operator> to 163 because of <term_numeric>->•<unary_operator><term_numeric_number>
 *    Goto on <term_numeric_number> to 164 because of <term_numeric>->•<term_numeric_number>
 *    Shift on <STRING> to 165 because of <term_nonnumeric>->•<STRING> 
 *    Shift on <STRING> to 165 because of <term_nonnumeric>->•<STRING><splus> 
 *    Shift on <IDENT> to 166 because of <term_nonnumeric>->•<IDENT> 
 *    Shift on <IDENT> to 166 because of <term_nonnumeric>->•<IDENT><splus> 
 *    Shift on <URI> to 167 because of <term_nonnumeric>->•<URI> 
 *    Shift on <URI> to 167 because of <term_nonnumeric>->•<URI><splus> 
 *    Goto on <hexcolor> to 168 because of <term_nonnumeric>->•<hexcolor>
 *    Goto on <function> to 169 because of <term_nonnumeric>->•<function>
 *    Shift on <MINUS> to 170 because of <unary_operator>->•<MINUS> 
 *    Shift on <PLUS> to 171 because of <unary_operator>->•<PLUS> 
 *    Shift on <NUMBER> to 172 because of <term_numeric_number>->•<NUMBER> 
 *    Shift on <NUMBER> to 172 because of <term_numeric_number>->•<NUMBER><splus> 
 *    Shift on <PERCENTAGE> to 173 because of <term_numeric_number>->•<PERCENTAGE> 
 *    Shift on <PERCENTAGE> to 173 because of <term_numeric_number>->•<PERCENTAGE><splus> 
 *    Shift on <LENGTH> to 174 because of <term_numeric_number>->•<LENGTH> 
 *    Shift on <LENGTH> to 174 because of <term_numeric_number>->•<LENGTH><splus> 
 *    Shift on <EMS> to 175 because of <term_numeric_number>->•<EMS> 
 *    Shift on <EMS> to 175 because of <term_numeric_number>->•<EMS><splus> 
 *    Shift on <EXS> to 176 because of <term_numeric_number>->•<EXS> 
 *    Shift on <EXS> to 176 because of <term_numeric_number>->•<EXS><splus> 
 *    Shift on <ANGLE> to 177 because of <term_numeric_number>->•<ANGLE> 
 *    Shift on <ANGLE> to 177 because of <term_numeric_number>->•<ANGLE><splus> 
 *    Shift on <TIME> to 178 because of <term_numeric_number>->•<TIME> 
 *    Shift on <TIME> to 178 because of <term_numeric_number>->•<TIME><splus> 
 *    Shift on <FREQ> to 179 because of <term_numeric_number>->•<FREQ> 
 *    Shift on <FREQ> to 179 because of <term_numeric_number>->•<FREQ><splus> 
 *    Shift on <DIMENSION> to 180 because of <term_numeric_number>->•<DIMENSION> 
 *    Shift on <DIMENSION> to 180 because of <term_numeric_number>->•<DIMENSION><splus> 
 *    Shift on <HASH> to 181 because of <hexcolor>->•<HASH> 
 *    Shift on <HASH> to 181 because of <hexcolor>->•<HASH><splus> 
 *    Shift on <CSSFUNCTION> to 182 because of <function>->•<CSSFUNCTION><splus><expr><RPAREN><splus> 
 *    Shift on <CSSFUNCTION> to 182 because of <function>->•<CSSFUNCTION><splus><expr><RPAREN> 
 *    Shift on <CSSFUNCTION> to 182 because of <function>->•<CSSFUNCTION><expr><RPAREN><splus> 
 *    Shift on <CSSFUNCTION> to 182 because of <function>->•<CSSFUNCTION><expr><RPAREN> 
 * ----------- 214 -----------
 *   --Itemset--
 *     <function>-><CSSFUNCTION><expr>•<RPAREN><splus>
 *     <function>-><CSSFUNCTION><expr>•<RPAREN>
 *     <expr>-><expr>•<term>
 *     <expr>-><expr>•<operator><term>
 *    +<term>->•<term_numeric>
 *    +<term>->•<term_nonnumeric>
 *    +<operator>->•<SLASH>
 *    +<operator>->•<SLASH><splus>
 *    +<operator>->•<COMMA>
 *    +<operator>->•<COMMA><splus>
 *    +<term_numeric>->•<unary_operator><term_numeric_number>
 *    +<term_numeric>->•<term_numeric_number>
 *    +<term_nonnumeric>->•<STRING>
 *    +<term_nonnumeric>->•<STRING><splus>
 *    +<term_nonnumeric>->•<IDENT>
 *    +<term_nonnumeric>->•<IDENT><splus>
 *    +<term_nonnumeric>->•<URI>
 *    +<term_nonnumeric>->•<URI><splus>
 *    +<term_nonnumeric>->•<hexcolor>
 *    +<term_nonnumeric>->•<function>
 *    +<unary_operator>->•<MINUS>
 *    +<unary_operator>->•<PLUS>
 *    +<term_numeric_number>->•<NUMBER>
 *    +<term_numeric_number>->•<NUMBER><splus>
 *    +<term_numeric_number>->•<PERCENTAGE>
 *    +<term_numeric_number>->•<PERCENTAGE><splus>
 *    +<term_numeric_number>->•<LENGTH>
 *    +<term_numeric_number>->•<LENGTH><splus>
 *    +<term_numeric_number>->•<EMS>
 *    +<term_numeric_number>->•<EMS><splus>
 *    +<term_numeric_number>->•<EXS>
 *    +<term_numeric_number>->•<EXS><splus>
 *    +<term_numeric_number>->•<ANGLE>
 *    +<term_numeric_number>->•<ANGLE><splus>
 *    +<term_numeric_number>->•<TIME>
 *    +<term_numeric_number>->•<TIME><splus>
 *    +<term_numeric_number>->•<FREQ>
 *    +<term_numeric_number>->•<FREQ><splus>
 *    +<term_numeric_number>->•<DIMENSION>
 *    +<term_numeric_number>->•<DIMENSION><splus>
 *    +<hexcolor>->•<HASH>
 *    +<hexcolor>->•<HASH><splus>
 *    +<function>->•<CSSFUNCTION><splus><expr><RPAREN><splus>
 *    +<function>->•<CSSFUNCTION><splus><expr><RPAREN>
 *    +<function>->•<CSSFUNCTION><expr><RPAREN><splus>
 *    +<function>->•<CSSFUNCTION><expr><RPAREN>
 *   --Transitions--
 *    Shift on <RPAREN> to 224 because of <function>-><CSSFUNCTION><expr>•<RPAREN><splus> 
 *    Shift on <RPAREN> to 224 because of <function>-><CSSFUNCTION><expr>•<RPAREN> 
 *    Goto on <term> to 193 because of <expr>-><expr>•<term>
 *    Goto on <operator> to 194 because of <expr>-><expr>•<operator><term>
 *    Goto on <term_numeric> to 161 because of <term>->•<term_numeric>
 *    Goto on <term_nonnumeric> to 162 because of <term>->•<term_nonnumeric>
 *    Shift on <SLASH> to 196 because of <operator>->•<SLASH> 
 *    Shift on <SLASH> to 196 because of <operator>->•<SLASH><splus> 
 *    Shift on <COMMA> to 197 because of <operator>->•<COMMA> 
 *    Shift on <COMMA> to 197 because of <operator>->•<COMMA><splus> 
 *    Goto on <unary_operator> to 163 because of <term_numeric>->•<unary_operator><term_numeric_number>
 *    Goto on <term_numeric_number> to 164 because of <term_numeric>->•<term_numeric_number>
 *    Shift on <STRING> to 165 because of <term_nonnumeric>->•<STRING> 
 *    Shift on <STRING> to 165 because of <term_nonnumeric>->•<STRING><splus> 
 *    Shift on <IDENT> to 166 because of <term_nonnumeric>->•<IDENT> 
 *    Shift on <IDENT> to 166 because of <term_nonnumeric>->•<IDENT><splus> 
 *    Shift on <URI> to 167 because of <term_nonnumeric>->•<URI> 
 *    Shift on <URI> to 167 because of <term_nonnumeric>->•<URI><splus> 
 *    Goto on <hexcolor> to 168 because of <term_nonnumeric>->•<hexcolor>
 *    Goto on <function> to 169 because of <term_nonnumeric>->•<function>
 *    Shift on <MINUS> to 170 because of <unary_operator>->•<MINUS> 
 *    Shift on <PLUS> to 171 because of <unary_operator>->•<PLUS> 
 *    Shift on <NUMBER> to 172 because of <term_numeric_number>->•<NUMBER> 
 *    Shift on <NUMBER> to 172 because of <term_numeric_number>->•<NUMBER><splus> 
 *    Shift on <PERCENTAGE> to 173 because of <term_numeric_number>->•<PERCENTAGE> 
 *    Shift on <PERCENTAGE> to 173 because of <term_numeric_number>->•<PERCENTAGE><splus> 
 *    Shift on <LENGTH> to 174 because of <term_numeric_number>->•<LENGTH> 
 *    Shift on <LENGTH> to 174 because of <term_numeric_number>->•<LENGTH><splus> 
 *    Shift on <EMS> to 175 because of <term_numeric_number>->•<EMS> 
 *    Shift on <EMS> to 175 because of <term_numeric_number>->•<EMS><splus> 
 *    Shift on <EXS> to 176 because of <term_numeric_number>->•<EXS> 
 *    Shift on <EXS> to 176 because of <term_numeric_number>->•<EXS><splus> 
 *    Shift on <ANGLE> to 177 because of <term_numeric_number>->•<ANGLE> 
 *    Shift on <ANGLE> to 177 because of <term_numeric_number>->•<ANGLE><splus> 
 *    Shift on <TIME> to 178 because of <term_numeric_number>->•<TIME> 
 *    Shift on <TIME> to 178 because of <term_numeric_number>->•<TIME><splus> 
 *    Shift on <FREQ> to 179 because of <term_numeric_number>->•<FREQ> 
 *    Shift on <FREQ> to 179 because of <term_numeric_number>->•<FREQ><splus> 
 *    Shift on <DIMENSION> to 180 because of <term_numeric_number>->•<DIMENSION> 
 *    Shift on <DIMENSION> to 180 because of <term_numeric_number>->•<DIMENSION><splus> 
 *    Shift on <HASH> to 181 because of <hexcolor>->•<HASH> 
 *    Shift on <HASH> to 181 because of <hexcolor>->•<HASH><splus> 
 *    Shift on <CSSFUNCTION> to 182 because of <function>->•<CSSFUNCTION><splus><expr><RPAREN><splus> 
 *    Shift on <CSSFUNCTION> to 182 because of <function>->•<CSSFUNCTION><splus><expr><RPAREN> 
 *    Shift on <CSSFUNCTION> to 182 because of <function>->•<CSSFUNCTION><expr><RPAREN><splus> 
 *    Shift on <CSSFUNCTION> to 182 because of <function>->•<CSSFUNCTION><expr><RPAREN> 
 * ----------- 215 -----------
 *   --Itemset--
 *     <ppage>-><pagesym_sstar><pseudo_page><splus><LBRACE><declarations_optional_semicolon><RBRACE>•
 *     <ppage>-><pagesym_sstar><pseudo_page><splus><LBRACE><declarations_optional_semicolon><RBRACE>•<splus>
 *    +<splus>->•<SS>
 *    +<splus>->•<SS><splus>
 *   --Transitions--
 *    Reduce on <MEDIA_SYM> using <ppage>-><pagesym_sstar><pseudo_page><splus><LBRACE><declarations_optional_semicolon><RBRACE> 
 *    Reduce on <IDENT> using <ppage>-><pagesym_sstar><pseudo_page><splus><LBRACE><declarations_optional_semicolon><RBRACE> 
 *    Reduce on <PAGE_SYM> using <ppage>-><pagesym_sstar><pseudo_page><splus><LBRACE><declarations_optional_semicolon><RBRACE> 
 *    Reduce on <COLON> using <ppage>-><pagesym_sstar><pseudo_page><splus><LBRACE><declarations_optional_semicolon><RBRACE> 
 *    Reduce on <HASH> using <ppage>-><pagesym_sstar><pseudo_page><splus><LBRACE><declarations_optional_semicolon><RBRACE> 
 *    Reduce on <DOT> using <ppage>-><pagesym_sstar><pseudo_page><splus><LBRACE><declarations_optional_semicolon><RBRACE> 
 *    Reduce on <STAR> using <ppage>-><pagesym_sstar><pseudo_page><splus><LBRACE><declarations_optional_semicolon><RBRACE> 
 *    Reduce on <LBRACKET> using <ppage>-><pagesym_sstar><pseudo_page><splus><LBRACE><declarations_optional_semicolon><RBRACE> 
 *    Reduce on  using <ppage>-><pagesym_sstar><pseudo_page><splus><LBRACE><declarations_optional_semicolon><RBRACE> 
 *    Goto on <splus> to 225 because of <ppage>-><pagesym_sstar><pseudo_page><splus><LBRACE><declarations_optional_semicolon><RBRACE>•<splus>
 *    Shift on <SS> to 55 because of <splus>->•<SS> 
 *    Shift on <SS> to 55 because of <splus>->•<SS><splus> 
 * ----------- 216 -----------
 *   --Itemset--
 *     <ppage>-><pagesym_sstar><pseudo_page><LBRACE><declarations_optional_semicolon><RBRACE><splus>•
 *   --Transitions--
 *    Reduce on <MEDIA_SYM> using <ppage>-><pagesym_sstar><pseudo_page><LBRACE><declarations_optional_semicolon><RBRACE><splus> 
 *    Reduce on <IDENT> using <ppage>-><pagesym_sstar><pseudo_page><LBRACE><declarations_optional_semicolon><RBRACE><splus> 
 *    Reduce on <PAGE_SYM> using <ppage>-><pagesym_sstar><pseudo_page><LBRACE><declarations_optional_semicolon><RBRACE><splus> 
 *    Reduce on <COLON> using <ppage>-><pagesym_sstar><pseudo_page><LBRACE><declarations_optional_semicolon><RBRACE><splus> 
 *    Reduce on <HASH> using <ppage>-><pagesym_sstar><pseudo_page><LBRACE><declarations_optional_semicolon><RBRACE><splus> 
 *    Reduce on <DOT> using <ppage>-><pagesym_sstar><pseudo_page><LBRACE><declarations_optional_semicolon><RBRACE><splus> 
 *    Reduce on <STAR> using <ppage>-><pagesym_sstar><pseudo_page><LBRACE><declarations_optional_semicolon><RBRACE><splus> 
 *    Reduce on <LBRACKET> using <ppage>-><pagesym_sstar><pseudo_page><LBRACE><declarations_optional_semicolon><RBRACE><splus> 
 *    Reduce on  using <ppage>-><pagesym_sstar><pseudo_page><LBRACE><declarations_optional_semicolon><RBRACE><splus> 
 * ----------- 217 -----------
 *   --Itemset--
 *     <media>-><media_sym_sstar><medialist><LBRACE><splus><rulesetplus><RBRACE><splus>•
 *   --Transitions--
 *    Reduce on <MEDIA_SYM> using <media>-><media_sym_sstar><medialist><LBRACE><splus><rulesetplus><RBRACE><splus> 
 *    Reduce on <IDENT> using <media>-><media_sym_sstar><medialist><LBRACE><splus><rulesetplus><RBRACE><splus> 
 *    Reduce on <PAGE_SYM> using <media>-><media_sym_sstar><medialist><LBRACE><splus><rulesetplus><RBRACE><splus> 
 *    Reduce on <COLON> using <media>-><media_sym_sstar><medialist><LBRACE><splus><rulesetplus><RBRACE><splus> 
 *    Reduce on <HASH> using <media>-><media_sym_sstar><medialist><LBRACE><splus><rulesetplus><RBRACE><splus> 
 *    Reduce on <DOT> using <media>-><media_sym_sstar><medialist><LBRACE><splus><rulesetplus><RBRACE><splus> 
 *    Reduce on <STAR> using <media>-><media_sym_sstar><medialist><LBRACE><splus><rulesetplus><RBRACE><splus> 
 *    Reduce on <LBRACKET> using <media>-><media_sym_sstar><medialist><LBRACE><splus><rulesetplus><RBRACE><splus> 
 *    Reduce on  using <media>-><media_sym_sstar><medialist><LBRACE><splus><rulesetplus><RBRACE><splus> 
 * ----------- 218 -----------
 *   --Itemset--
 *     <ddeclaration>-><property><COLON><splus><expr><prio>•
 *   --Transitions--
 *    Reduce on <SEMICOLON> using <ddeclaration>-><property><COLON><splus><expr><prio> 
 *    Reduce on <RBRACE> using <ddeclaration>-><property><COLON><splus><expr><prio> 
 * ----------- 219 -----------
 *   --Itemset--
 *     <expr>-><expr><operator><term>•
 *   --Transitions--
 *    Reduce on <SEMICOLON> using <expr>-><expr><operator><term> 
 *    Reduce on <STRING> using <expr>-><expr><operator><term> 
 *    Reduce on <URI> using <expr>-><expr><operator><term> 
 *    Reduce on <COMMA> using <expr>-><expr><operator><term> 
 *    Reduce on <RBRACE> using <expr>-><expr><operator><term> 
 *    Reduce on <IDENT> using <expr>-><expr><operator><term> 
 *    Reduce on <SLASH> using <expr>-><expr><operator><term> 
 *    Reduce on <PLUS> using <expr>-><expr><operator><term> 
 *    Reduce on <MINUS> using <expr>-><expr><operator><term> 
 *    Reduce on <HASH> using <expr>-><expr><operator><term> 
 *    Reduce on <CSSFUNCTION> using <expr>-><expr><operator><term> 
 *    Reduce on <RPAREN> using <expr>-><expr><operator><term> 
 *    Reduce on <IMPORTANT_SYM> using <expr>-><expr><operator><term> 
 *    Reduce on <NUMBER> using <expr>-><expr><operator><term> 
 *    Reduce on <PERCENTAGE> using <expr>-><expr><operator><term> 
 *    Reduce on <LENGTH> using <expr>-><expr><operator><term> 
 *    Reduce on <EMS> using <expr>-><expr><operator><term> 
 *    Reduce on <EXS> using <expr>-><expr><operator><term> 
 *    Reduce on <ANGLE> using <expr>-><expr><operator><term> 
 *    Reduce on <TIME> using <expr>-><expr><operator><term> 
 *    Reduce on <FREQ> using <expr>-><expr><operator><term> 
 *    Reduce on <DIMENSION> using <expr>-><expr><operator><term> 
 * ----------- 220 -----------
 *   --Itemset--
 *     <operator>-><SLASH><splus>•
 *   --Transitions--
 *    Reduce on <STRING> using <operator>-><SLASH><splus> 
 *    Reduce on <URI> using <operator>-><SLASH><splus> 
 *    Reduce on <IDENT> using <operator>-><SLASH><splus> 
 *    Reduce on <PLUS> using <operator>-><SLASH><splus> 
 *    Reduce on <MINUS> using <operator>-><SLASH><splus> 
 *    Reduce on <HASH> using <operator>-><SLASH><splus> 
 *    Reduce on <CSSFUNCTION> using <operator>-><SLASH><splus> 
 *    Reduce on <NUMBER> using <operator>-><SLASH><splus> 
 *    Reduce on <PERCENTAGE> using <operator>-><SLASH><splus> 
 *    Reduce on <LENGTH> using <operator>-><SLASH><splus> 
 *    Reduce on <EMS> using <operator>-><SLASH><splus> 
 *    Reduce on <EXS> using <operator>-><SLASH><splus> 
 *    Reduce on <ANGLE> using <operator>-><SLASH><splus> 
 *    Reduce on <TIME> using <operator>-><SLASH><splus> 
 *    Reduce on <FREQ> using <operator>-><SLASH><splus> 
 *    Reduce on <DIMENSION> using <operator>-><SLASH><splus> 
 * ----------- 221 -----------
 *   --Itemset--
 *     <operator>-><COMMA><splus>•
 *   --Transitions--
 *    Reduce on <STRING> using <operator>-><COMMA><splus> 
 *    Reduce on <URI> using <operator>-><COMMA><splus> 
 *    Reduce on <IDENT> using <operator>-><COMMA><splus> 
 *    Reduce on <PLUS> using <operator>-><COMMA><splus> 
 *    Reduce on <MINUS> using <operator>-><COMMA><splus> 
 *    Reduce on <HASH> using <operator>-><COMMA><splus> 
 *    Reduce on <CSSFUNCTION> using <operator>-><COMMA><splus> 
 *    Reduce on <NUMBER> using <operator>-><COMMA><splus> 
 *    Reduce on <PERCENTAGE> using <operator>-><COMMA><splus> 
 *    Reduce on <LENGTH> using <operator>-><COMMA><splus> 
 *    Reduce on <EMS> using <operator>-><COMMA><splus> 
 *    Reduce on <EXS> using <operator>-><COMMA><splus> 
 *    Reduce on <ANGLE> using <operator>-><COMMA><splus> 
 *    Reduce on <TIME> using <operator>-><COMMA><splus> 
 *    Reduce on <FREQ> using <operator>-><COMMA><splus> 
 *    Reduce on <DIMENSION> using <operator>-><COMMA><splus> 
 * ----------- 222 -----------
 *   --Itemset--
 *     <important_sym_sstar>-><IMPORTANT_SYM><splus>•
 *   --Transitions--
 *    Reduce on <SEMICOLON> using <important_sym_sstar>-><IMPORTANT_SYM><splus> 
 *    Reduce on <RBRACE> using <important_sym_sstar>-><IMPORTANT_SYM><splus> 
 * ----------- 223 -----------
 *   --Itemset--
 *     <function>-><CSSFUNCTION><splus><expr>•<RPAREN><splus>
 *     <function>-><CSSFUNCTION><splus><expr>•<RPAREN>
 *     <expr>-><expr>•<term>
 *     <expr>-><expr>•<operator><term>
 *    +<term>->•<term_numeric>
 *    +<term>->•<term_nonnumeric>
 *    +<operator>->•<SLASH>
 *    +<operator>->•<SLASH><splus>
 *    +<operator>->•<COMMA>
 *    +<operator>->•<COMMA><splus>
 *    +<term_numeric>->•<unary_operator><term_numeric_number>
 *    +<term_numeric>->•<term_numeric_number>
 *    +<term_nonnumeric>->•<STRING>
 *    +<term_nonnumeric>->•<STRING><splus>
 *    +<term_nonnumeric>->•<IDENT>
 *    +<term_nonnumeric>->•<IDENT><splus>
 *    +<term_nonnumeric>->•<URI>
 *    +<term_nonnumeric>->•<URI><splus>
 *    +<term_nonnumeric>->•<hexcolor>
 *    +<term_nonnumeric>->•<function>
 *    +<unary_operator>->•<MINUS>
 *    +<unary_operator>->•<PLUS>
 *    +<term_numeric_number>->•<NUMBER>
 *    +<term_numeric_number>->•<NUMBER><splus>
 *    +<term_numeric_number>->•<PERCENTAGE>
 *    +<term_numeric_number>->•<PERCENTAGE><splus>
 *    +<term_numeric_number>->•<LENGTH>
 *    +<term_numeric_number>->•<LENGTH><splus>
 *    +<term_numeric_number>->•<EMS>
 *    +<term_numeric_number>->•<EMS><splus>
 *    +<term_numeric_number>->•<EXS>
 *    +<term_numeric_number>->•<EXS><splus>
 *    +<term_numeric_number>->•<ANGLE>
 *    +<term_numeric_number>->•<ANGLE><splus>
 *    +<term_numeric_number>->•<TIME>
 *    +<term_numeric_number>->•<TIME><splus>
 *    +<term_numeric_number>->•<FREQ>
 *    +<term_numeric_number>->•<FREQ><splus>
 *    +<term_numeric_number>->•<DIMENSION>
 *    +<term_numeric_number>->•<DIMENSION><splus>
 *    +<hexcolor>->•<HASH>
 *    +<hexcolor>->•<HASH><splus>
 *    +<function>->•<CSSFUNCTION><splus><expr><RPAREN><splus>
 *    +<function>->•<CSSFUNCTION><splus><expr><RPAREN>
 *    +<function>->•<CSSFUNCTION><expr><RPAREN><splus>
 *    +<function>->•<CSSFUNCTION><expr><RPAREN>
 *   --Transitions--
 *    Shift on <RPAREN> to 226 because of <function>-><CSSFUNCTION><splus><expr>•<RPAREN><splus> 
 *    Shift on <RPAREN> to 226 because of <function>-><CSSFUNCTION><splus><expr>•<RPAREN> 
 *    Goto on <term> to 193 because of <expr>-><expr>•<term>
 *    Goto on <operator> to 194 because of <expr>-><expr>•<operator><term>
 *    Goto on <term_numeric> to 161 because of <term>->•<term_numeric>
 *    Goto on <term_nonnumeric> to 162 because of <term>->•<term_nonnumeric>
 *    Shift on <SLASH> to 196 because of <operator>->•<SLASH> 
 *    Shift on <SLASH> to 196 because of <operator>->•<SLASH><splus> 
 *    Shift on <COMMA> to 197 because of <operator>->•<COMMA> 
 *    Shift on <COMMA> to 197 because of <operator>->•<COMMA><splus> 
 *    Goto on <unary_operator> to 163 because of <term_numeric>->•<unary_operator><term_numeric_number>
 *    Goto on <term_numeric_number> to 164 because of <term_numeric>->•<term_numeric_number>
 *    Shift on <STRING> to 165 because of <term_nonnumeric>->•<STRING> 
 *    Shift on <STRING> to 165 because of <term_nonnumeric>->•<STRING><splus> 
 *    Shift on <IDENT> to 166 because of <term_nonnumeric>->•<IDENT> 
 *    Shift on <IDENT> to 166 because of <term_nonnumeric>->•<IDENT><splus> 
 *    Shift on <URI> to 167 because of <term_nonnumeric>->•<URI> 
 *    Shift on <URI> to 167 because of <term_nonnumeric>->•<URI><splus> 
 *    Goto on <hexcolor> to 168 because of <term_nonnumeric>->•<hexcolor>
 *    Goto on <function> to 169 because of <term_nonnumeric>->•<function>
 *    Shift on <MINUS> to 170 because of <unary_operator>->•<MINUS> 
 *    Shift on <PLUS> to 171 because of <unary_operator>->•<PLUS> 
 *    Shift on <NUMBER> to 172 because of <term_numeric_number>->•<NUMBER> 
 *    Shift on <NUMBER> to 172 because of <term_numeric_number>->•<NUMBER><splus> 
 *    Shift on <PERCENTAGE> to 173 because of <term_numeric_number>->•<PERCENTAGE> 
 *    Shift on <PERCENTAGE> to 173 because of <term_numeric_number>->•<PERCENTAGE><splus> 
 *    Shift on <LENGTH> to 174 because of <term_numeric_number>->•<LENGTH> 
 *    Shift on <LENGTH> to 174 because of <term_numeric_number>->•<LENGTH><splus> 
 *    Shift on <EMS> to 175 because of <term_numeric_number>->•<EMS> 
 *    Shift on <EMS> to 175 because of <term_numeric_number>->•<EMS><splus> 
 *    Shift on <EXS> to 176 because of <term_numeric_number>->•<EXS> 
 *    Shift on <EXS> to 176 because of <term_numeric_number>->•<EXS><splus> 
 *    Shift on <ANGLE> to 177 because of <term_numeric_number>->•<ANGLE> 
 *    Shift on <ANGLE> to 177 because of <term_numeric_number>->•<ANGLE><splus> 
 *    Shift on <TIME> to 178 because of <term_numeric_number>->•<TIME> 
 *    Shift on <TIME> to 178 because of <term_numeric_number>->•<TIME><splus> 
 *    Shift on <FREQ> to 179 because of <term_numeric_number>->•<FREQ> 
 *    Shift on <FREQ> to 179 because of <term_numeric_number>->•<FREQ><splus> 
 *    Shift on <DIMENSION> to 180 because of <term_numeric_number>->•<DIMENSION> 
 *    Shift on <DIMENSION> to 180 because of <term_numeric_number>->•<DIMENSION><splus> 
 *    Shift on <HASH> to 181 because of <hexcolor>->•<HASH> 
 *    Shift on <HASH> to 181 because of <hexcolor>->•<HASH><splus> 
 *    Shift on <CSSFUNCTION> to 182 because of <function>->•<CSSFUNCTION><splus><expr><RPAREN><splus> 
 *    Shift on <CSSFUNCTION> to 182 because of <function>->•<CSSFUNCTION><splus><expr><RPAREN> 
 *    Shift on <CSSFUNCTION> to 182 because of <function>->•<CSSFUNCTION><expr><RPAREN><splus> 
 *    Shift on <CSSFUNCTION> to 182 because of <function>->•<CSSFUNCTION><expr><RPAREN> 
 * ----------- 224 -----------
 *   --Itemset--
 *     <function>-><CSSFUNCTION><expr><RPAREN>•<splus>
 *     <function>-><CSSFUNCTION><expr><RPAREN>•
 *    +<splus>->•<SS>
 *    +<splus>->•<SS><splus>
 *   --Transitions--
 *    Goto on <splus> to 227 because of <function>-><CSSFUNCTION><expr><RPAREN>•<splus>
 *    Reduce on <SEMICOLON> using <function>-><CSSFUNCTION><expr><RPAREN> 
 *    Reduce on <STRING> using <function>-><CSSFUNCTION><expr><RPAREN> 
 *    Reduce on <URI> using <function>-><CSSFUNCTION><expr><RPAREN> 
 *    Reduce on <COMMA> using <function>-><CSSFUNCTION><expr><RPAREN> 
 *    Reduce on <RBRACE> using <function>-><CSSFUNCTION><expr><RPAREN> 
 *    Reduce on <IDENT> using <function>-><CSSFUNCTION><expr><RPAREN> 
 *    Reduce on <SLASH> using <function>-><CSSFUNCTION><expr><RPAREN> 
 *    Reduce on <PLUS> using <function>-><CSSFUNCTION><expr><RPAREN> 
 *    Reduce on <MINUS> using <function>-><CSSFUNCTION><expr><RPAREN> 
 *    Reduce on <HASH> using <function>-><CSSFUNCTION><expr><RPAREN> 
 *    Reduce on <CSSFUNCTION> using <function>-><CSSFUNCTION><expr><RPAREN> 
 *    Reduce on <RPAREN> using <function>-><CSSFUNCTION><expr><RPAREN> 
 *    Reduce on <IMPORTANT_SYM> using <function>-><CSSFUNCTION><expr><RPAREN> 
 *    Reduce on <NUMBER> using <function>-><CSSFUNCTION><expr><RPAREN> 
 *    Reduce on <PERCENTAGE> using <function>-><CSSFUNCTION><expr><RPAREN> 
 *    Reduce on <LENGTH> using <function>-><CSSFUNCTION><expr><RPAREN> 
 *    Reduce on <EMS> using <function>-><CSSFUNCTION><expr><RPAREN> 
 *    Reduce on <EXS> using <function>-><CSSFUNCTION><expr><RPAREN> 
 *    Reduce on <ANGLE> using <function>-><CSSFUNCTION><expr><RPAREN> 
 *    Reduce on <TIME> using <function>-><CSSFUNCTION><expr><RPAREN> 
 *    Reduce on <FREQ> using <function>-><CSSFUNCTION><expr><RPAREN> 
 *    Reduce on <DIMENSION> using <function>-><CSSFUNCTION><expr><RPAREN> 
 *    Shift on <SS> to 55 because of <splus>->•<SS> 
 *    Shift on <SS> to 55 because of <splus>->•<SS><splus> 
 * ----------- 225 -----------
 *   --Itemset--
 *     <ppage>-><pagesym_sstar><pseudo_page><splus><LBRACE><declarations_optional_semicolon><RBRACE><splus>•
 *   --Transitions--
 *    Reduce on <MEDIA_SYM> using <ppage>-><pagesym_sstar><pseudo_page><splus><LBRACE><declarations_optional_semicolon><RBRACE><splus> 
 *    Reduce on <IDENT> using <ppage>-><pagesym_sstar><pseudo_page><splus><LBRACE><declarations_optional_semicolon><RBRACE><splus> 
 *    Reduce on <PAGE_SYM> using <ppage>-><pagesym_sstar><pseudo_page><splus><LBRACE><declarations_optional_semicolon><RBRACE><splus> 
 *    Reduce on <COLON> using <ppage>-><pagesym_sstar><pseudo_page><splus><LBRACE><declarations_optional_semicolon><RBRACE><splus> 
 *    Reduce on <HASH> using <ppage>-><pagesym_sstar><pseudo_page><splus><LBRACE><declarations_optional_semicolon><RBRACE><splus> 
 *    Reduce on <DOT> using <ppage>-><pagesym_sstar><pseudo_page><splus><LBRACE><declarations_optional_semicolon><RBRACE><splus> 
 *    Reduce on <STAR> using <ppage>-><pagesym_sstar><pseudo_page><splus><LBRACE><declarations_optional_semicolon><RBRACE><splus> 
 *    Reduce on <LBRACKET> using <ppage>-><pagesym_sstar><pseudo_page><splus><LBRACE><declarations_optional_semicolon><RBRACE><splus> 
 *    Reduce on  using <ppage>-><pagesym_sstar><pseudo_page><splus><LBRACE><declarations_optional_semicolon><RBRACE><splus> 
 * ----------- 226 -----------
 *   --Itemset--
 *     <function>-><CSSFUNCTION><splus><expr><RPAREN>•<splus>
 *     <function>-><CSSFUNCTION><splus><expr><RPAREN>•
 *    +<splus>->•<SS>
 *    +<splus>->•<SS><splus>
 *   --Transitions--
 *    Goto on <splus> to 228 because of <function>-><CSSFUNCTION><splus><expr><RPAREN>•<splus>
 *    Reduce on <SEMICOLON> using <function>-><CSSFUNCTION><splus><expr><RPAREN> 
 *    Reduce on <STRING> using <function>-><CSSFUNCTION><splus><expr><RPAREN> 
 *    Reduce on <URI> using <function>-><CSSFUNCTION><splus><expr><RPAREN> 
 *    Reduce on <COMMA> using <function>-><CSSFUNCTION><splus><expr><RPAREN> 
 *    Reduce on <RBRACE> using <function>-><CSSFUNCTION><splus><expr><RPAREN> 
 *    Reduce on <IDENT> using <function>-><CSSFUNCTION><splus><expr><RPAREN> 
 *    Reduce on <SLASH> using <function>-><CSSFUNCTION><splus><expr><RPAREN> 
 *    Reduce on <PLUS> using <function>-><CSSFUNCTION><splus><expr><RPAREN> 
 *    Reduce on <MINUS> using <function>-><CSSFUNCTION><splus><expr><RPAREN> 
 *    Reduce on <HASH> using <function>-><CSSFUNCTION><splus><expr><RPAREN> 
 *    Reduce on <CSSFUNCTION> using <function>-><CSSFUNCTION><splus><expr><RPAREN> 
 *    Reduce on <RPAREN> using <function>-><CSSFUNCTION><splus><expr><RPAREN> 
 *    Reduce on <IMPORTANT_SYM> using <function>-><CSSFUNCTION><splus><expr><RPAREN> 
 *    Reduce on <NUMBER> using <function>-><CSSFUNCTION><splus><expr><RPAREN> 
 *    Reduce on <PERCENTAGE> using <function>-><CSSFUNCTION><splus><expr><RPAREN> 
 *    Reduce on <LENGTH> using <function>-><CSSFUNCTION><splus><expr><RPAREN> 
 *    Reduce on <EMS> using <function>-><CSSFUNCTION><splus><expr><RPAREN> 
 *    Reduce on <EXS> using <function>-><CSSFUNCTION><splus><expr><RPAREN> 
 *    Reduce on <ANGLE> using <function>-><CSSFUNCTION><splus><expr><RPAREN> 
 *    Reduce on <TIME> using <function>-><CSSFUNCTION><splus><expr><RPAREN> 
 *    Reduce on <FREQ> using <function>-><CSSFUNCTION><splus><expr><RPAREN> 
 *    Reduce on <DIMENSION> using <function>-><CSSFUNCTION><splus><expr><RPAREN> 
 *    Shift on <SS> to 55 because of <splus>->•<SS> 
 *    Shift on <SS> to 55 because of <splus>->•<SS><splus> 
 * ----------- 227 -----------
 *   --Itemset--
 *     <function>-><CSSFUNCTION><expr><RPAREN><splus>•
 *   --Transitions--
 *    Reduce on <SEMICOLON> using <function>-><CSSFUNCTION><expr><RPAREN><splus> 
 *    Reduce on <STRING> using <function>-><CSSFUNCTION><expr><RPAREN><splus> 
 *    Reduce on <URI> using <function>-><CSSFUNCTION><expr><RPAREN><splus> 
 *    Reduce on <COMMA> using <function>-><CSSFUNCTION><expr><RPAREN><splus> 
 *    Reduce on <RBRACE> using <function>-><CSSFUNCTION><expr><RPAREN><splus> 
 *    Reduce on <IDENT> using <function>-><CSSFUNCTION><expr><RPAREN><splus> 
 *    Reduce on <SLASH> using <function>-><CSSFUNCTION><expr><RPAREN><splus> 
 *    Reduce on <PLUS> using <function>-><CSSFUNCTION><expr><RPAREN><splus> 
 *    Reduce on <MINUS> using <function>-><CSSFUNCTION><expr><RPAREN><splus> 
 *    Reduce on <HASH> using <function>-><CSSFUNCTION><expr><RPAREN><splus> 
 *    Reduce on <CSSFUNCTION> using <function>-><CSSFUNCTION><expr><RPAREN><splus> 
 *    Reduce on <RPAREN> using <function>-><CSSFUNCTION><expr><RPAREN><splus> 
 *    Reduce on <IMPORTANT_SYM> using <function>-><CSSFUNCTION><expr><RPAREN><splus> 
 *    Reduce on <NUMBER> using <function>-><CSSFUNCTION><expr><RPAREN><splus> 
 *    Reduce on <PERCENTAGE> using <function>-><CSSFUNCTION><expr><RPAREN><splus> 
 *    Reduce on <LENGTH> using <function>-><CSSFUNCTION><expr><RPAREN><splus> 
 *    Reduce on <EMS> using <function>-><CSSFUNCTION><expr><RPAREN><splus> 
 *    Reduce on <EXS> using <function>-><CSSFUNCTION><expr><RPAREN><splus> 
 *    Reduce on <ANGLE> using <function>-><CSSFUNCTION><expr><RPAREN><splus> 
 *    Reduce on <TIME> using <function>-><CSSFUNCTION><expr><RPAREN><splus> 
 *    Reduce on <FREQ> using <function>-><CSSFUNCTION><expr><RPAREN><splus> 
 *    Reduce on <DIMENSION> using <function>-><CSSFUNCTION><expr><RPAREN><splus> 
 * ----------- 228 -----------
 *   --Itemset--
 *     <function>-><CSSFUNCTION><splus><expr><RPAREN><splus>•
 *   --Transitions--
 *    Reduce on <SEMICOLON> using <function>-><CSSFUNCTION><splus><expr><RPAREN><splus> 
 *    Reduce on <STRING> using <function>-><CSSFUNCTION><splus><expr><RPAREN><splus> 
 *    Reduce on <URI> using <function>-><CSSFUNCTION><splus><expr><RPAREN><splus> 
 *    Reduce on <COMMA> using <function>-><CSSFUNCTION><splus><expr><RPAREN><splus> 
 *    Reduce on <RBRACE> using <function>-><CSSFUNCTION><splus><expr><RPAREN><splus> 
 *    Reduce on <IDENT> using <function>-><CSSFUNCTION><splus><expr><RPAREN><splus> 
 *    Reduce on <SLASH> using <function>-><CSSFUNCTION><splus><expr><RPAREN><splus> 
 *    Reduce on <PLUS> using <function>-><CSSFUNCTION><splus><expr><RPAREN><splus> 
 *    Reduce on <MINUS> using <function>-><CSSFUNCTION><splus><expr><RPAREN><splus> 
 *    Reduce on <HASH> using <function>-><CSSFUNCTION><splus><expr><RPAREN><splus> 
 *    Reduce on <CSSFUNCTION> using <function>-><CSSFUNCTION><splus><expr><RPAREN><splus> 
 *    Reduce on <RPAREN> using <function>-><CSSFUNCTION><splus><expr><RPAREN><splus> 
 *    Reduce on <IMPORTANT_SYM> using <function>-><CSSFUNCTION><splus><expr><RPAREN><splus> 
 *    Reduce on <NUMBER> using <function>-><CSSFUNCTION><splus><expr><RPAREN><splus> 
 *    Reduce on <PERCENTAGE> using <function>-><CSSFUNCTION><splus><expr><RPAREN><splus> 
 *    Reduce on <LENGTH> using <function>-><CSSFUNCTION><splus><expr><RPAREN><splus> 
 *    Reduce on <EMS> using <function>-><CSSFUNCTION><splus><expr><RPAREN><splus> 
 *    Reduce on <EXS> using <function>-><CSSFUNCTION><splus><expr><RPAREN><splus> 
 *    Reduce on <ANGLE> using <function>-><CSSFUNCTION><splus><expr><RPAREN><splus> 
 *    Reduce on <TIME> using <function>-><CSSFUNCTION><splus><expr><RPAREN><splus> 
 *    Reduce on <FREQ> using <function>-><CSSFUNCTION><splus><expr><RPAREN><splus> 
 *    Reduce on <DIMENSION> using <function>-><CSSFUNCTION><splus><expr><RPAREN><splus>
 *
 */
class Text_Parser_CSS extends Text_Parser_LALR
{
    /* Constructor {{{ */
    /**
     * Parser constructor
     * 
     * @param Text_Tokenizer Tokenizer that will feed this parser
     */
    public function __construct(&$tokenizer)
    {
        parent::__construct($tokenizer);
        $this->_gotoTable = unserialize('a:96:{i:0;a:28:{s:12:"<stylesheet>";i:1;s:14:"<stylesheet_1>";i:2;s:14:"<stylesheet_2>";i:3;s:13:"<placeholder>";i:4;s:20:"<stylesheet_charset>";i:5;s:16:"<s_cdo_cdc_plus>";i:6;s:19:"<stylesheet_import>";i:7;s:31:"<stylesheet_ruleset_media_page>";i:8;s:19:"<charset_sym_sstar>";i:10;s:11:"<s_cdo_cdc>";i:11;s:8:"<import>";i:12;s:9:"<ruleset>";i:13;s:7:"<media>";i:14;s:6:"<page>";i:15;s:18:"<import_sym_sstar>";i:20;s:10:"<rruleset>";i:21;s:17:"<media_sym_sstar>";i:22;s:7:"<ppage>";i:23;s:11:"<selectors>";i:25;s:15:"<pagesym_sstar>";i:27;s:10:"<selector>";i:28;s:17:"<simple_selector>";i:30;s:14:"<element_name>";i:31;s:31:"<hash_class_attrib_pseudo_plus>";i:32;s:26:"<hash_class_attrib_pseudo>";i:35;s:7:"<class>";i:37;s:8:"<attrib>";i:38;s:8:"<pseudo>";i:39;}i:2;a:21:{s:14:"<stylesheet_2>";i:43;s:19:"<stylesheet_import>";i:7;s:31:"<stylesheet_ruleset_media_page>";i:8;s:8:"<import>";i:12;s:9:"<ruleset>";i:13;s:7:"<media>";i:14;s:6:"<page>";i:15;s:18:"<import_sym_sstar>";i:20;s:10:"<rruleset>";i:21;s:17:"<media_sym_sstar>";i:22;s:7:"<ppage>";i:23;s:11:"<selectors>";i:25;s:15:"<pagesym_sstar>";i:27;s:10:"<selector>";i:28;s:17:"<simple_selector>";i:30;s:14:"<element_name>";i:31;s:31:"<hash_class_attrib_pseudo_plus>";i:32;s:26:"<hash_class_attrib_pseudo>";i:35;s:7:"<class>";i:37;s:8:"<attrib>";i:38;s:8:"<pseudo>";i:39;}i:5;a:2:{s:16:"<s_cdo_cdc_plus>";i:44;s:11:"<s_cdo_cdc>";i:11;}i:6;a:1:{s:11:"<s_cdo_cdc>";i:45;}i:7;a:19:{s:31:"<stylesheet_ruleset_media_page>";i:46;s:8:"<import>";i:47;s:9:"<ruleset>";i:13;s:7:"<media>";i:14;s:6:"<page>";i:15;s:18:"<import_sym_sstar>";i:20;s:10:"<rruleset>";i:21;s:17:"<media_sym_sstar>";i:22;s:7:"<ppage>";i:23;s:11:"<selectors>";i:25;s:15:"<pagesym_sstar>";i:27;s:10:"<selector>";i:28;s:17:"<simple_selector>";i:30;s:14:"<element_name>";i:31;s:31:"<hash_class_attrib_pseudo_plus>";i:32;s:26:"<hash_class_attrib_pseudo>";i:35;s:7:"<class>";i:37;s:8:"<attrib>";i:38;s:8:"<pseudo>";i:39;}i:8;a:16:{s:9:"<ruleset>";i:48;s:7:"<media>";i:49;s:6:"<page>";i:50;s:10:"<rruleset>";i:21;s:17:"<media_sym_sstar>";i:22;s:7:"<ppage>";i:23;s:11:"<selectors>";i:25;s:15:"<pagesym_sstar>";i:27;s:10:"<selector>";i:28;s:17:"<simple_selector>";i:30;s:14:"<element_name>";i:31;s:31:"<hash_class_attrib_pseudo_plus>";i:32;s:26:"<hash_class_attrib_pseudo>";i:35;s:7:"<class>";i:37;s:8:"<attrib>";i:38;s:8:"<pseudo>";i:39;}i:10;a:1:{s:14:"<string_sstar>";i:51;}i:12;a:2:{s:16:"<s_cdo_cdc_plus>";i:53;s:11:"<s_cdo_cdc>";i:11;}i:16;a:1:{s:7:"<splus>";i:54;}i:20;a:2:{s:21:"<string_or_uri_sstar>";i:56;s:14:"<string_sstar>";i:57;}i:22;a:2:{s:11:"<medialist>";i:59;s:8:"<medium>";i:60;}i:24;a:1:{s:7:"<splus>";i:62;}i:25;a:1:{s:13:"<comma_sstar>";i:64;}i:26;a:1:{s:7:"<splus>";i:66;}i:27;a:1:{s:13:"<pseudo_page>";i:67;}i:29;a:1:{s:7:"<splus>";i:70;}i:30;a:1:{s:12:"<combinator>";i:71;}i:31;a:5:{s:31:"<hash_class_attrib_pseudo_plus>";i:75;s:26:"<hash_class_attrib_pseudo>";i:35;s:7:"<class>";i:37;s:8:"<attrib>";i:38;s:8:"<pseudo>";i:39;}i:32;a:4:{s:26:"<hash_class_attrib_pseudo>";i:76;s:7:"<class>";i:37;s:8:"<attrib>";i:38;s:8:"<pseudo>";i:39;}i:41;a:2:{s:15:"<trimmed_ident>";i:78;s:7:"<splus>";i:80;}i:44;a:1:{s:11:"<s_cdo_cdc>";i:45;}i:46;a:16:{s:9:"<ruleset>";i:48;s:7:"<media>";i:49;s:6:"<page>";i:50;s:10:"<rruleset>";i:21;s:17:"<media_sym_sstar>";i:22;s:7:"<ppage>";i:23;s:11:"<selectors>";i:25;s:15:"<pagesym_sstar>";i:27;s:10:"<selector>";i:28;s:17:"<simple_selector>";i:30;s:14:"<element_name>";i:31;s:31:"<hash_class_attrib_pseudo_plus>";i:32;s:26:"<hash_class_attrib_pseudo>";i:35;s:7:"<class>";i:37;s:8:"<attrib>";i:38;s:8:"<pseudo>";i:39;}i:47;a:2:{s:16:"<s_cdo_cdc_plus>";i:83;s:11:"<s_cdo_cdc>";i:11;}i:52;a:1:{s:7:"<splus>";i:85;}i:53;a:1:{s:11:"<s_cdo_cdc>";i:45;}i:55;a:1:{s:7:"<splus>";i:86;}i:56;a:2:{s:11:"<medialist>";i:88;s:8:"<medium>";i:60;}i:58;a:1:{s:7:"<splus>";i:89;}i:61;a:1:{s:7:"<splus>";i:92;}i:63;a:7:{s:33:"<declarations_optional_semicolon>";i:93;s:7:"<splus>";i:95;s:14:"<declarations>";i:96;s:19:"<sstar_declaration>";i:97;s:13:"<declaration>";i:98;s:14:"<ddeclaration>";i:99;s:10:"<property>";i:100;}i:64;a:8:{s:10:"<selector>";i:102;s:17:"<simple_selector>";i:30;s:14:"<element_name>";i:31;s:31:"<hash_class_attrib_pseudo_plus>";i:32;s:26:"<hash_class_attrib_pseudo>";i:35;s:7:"<class>";i:37;s:8:"<attrib>";i:38;s:8:"<pseudo>";i:39;}i:65;a:1:{s:7:"<splus>";i:103;}i:67;a:1:{s:7:"<splus>";i:104;}i:68;a:7:{s:33:"<declarations_optional_semicolon>";i:106;s:14:"<declarations>";i:96;s:19:"<sstar_declaration>";i:97;s:13:"<declaration>";i:98;s:7:"<splus>";i:107;s:14:"<ddeclaration>";i:99;s:10:"<property>";i:100;}i:71;a:8:{s:10:"<selector>";i:109;s:17:"<simple_selector>";i:30;s:14:"<element_name>";i:31;s:31:"<hash_class_attrib_pseudo_plus>";i:32;s:26:"<hash_class_attrib_pseudo>";i:35;s:7:"<class>";i:37;s:8:"<attrib>";i:38;s:8:"<pseudo>";i:39;}i:72;a:1:{s:7:"<splus>";i:110;}i:73;a:1:{s:7:"<splus>";i:111;}i:75;a:4:{s:26:"<hash_class_attrib_pseudo>";i:76;s:7:"<class>";i:37;s:8:"<attrib>";i:38;s:8:"<pseudo>";i:39;}i:78;a:2:{s:23:"<attrib_operator_sstar>";i:113;s:17:"<attrib_operator>";i:114;}i:79;a:1:{s:7:"<splus>";i:118;}i:82;a:2:{s:15:"<trimmed_ident>";i:120;s:7:"<splus>";i:121;}i:83;a:1:{s:11:"<s_cdo_cdc>";i:45;}i:90;a:13:{s:7:"<splus>";i:124;s:13:"<rulesetplus>";i:125;s:9:"<ruleset>";i:127;s:10:"<rruleset>";i:21;s:11:"<selectors>";i:25;s:10:"<selector>";i:28;s:17:"<simple_selector>";i:30;s:14:"<element_name>";i:31;s:31:"<hash_class_attrib_pseudo_plus>";i:32;s:26:"<hash_class_attrib_pseudo>";i:35;s:7:"<class>";i:37;s:8:"<attrib>";i:38;s:8:"<pseudo>";i:39;}i:91;a:2:{s:8:"<medium>";i:128;s:7:"<splus>";i:129;}i:94;a:1:{s:7:"<splus>";i:131;}i:95;a:3:{s:13:"<declaration>";i:133;s:14:"<ddeclaration>";i:99;s:10:"<property>";i:100;}i:101;a:1:{s:7:"<splus>";i:136;}i:105;a:7:{s:33:"<declarations_optional_semicolon>";i:138;s:14:"<declarations>";i:96;s:19:"<sstar_declaration>";i:97;s:13:"<declaration>";i:98;s:7:"<splus>";i:107;s:14:"<ddeclaration>";i:99;s:10:"<property>";i:100;}i:107;a:3:{s:13:"<declaration>";i:133;s:14:"<ddeclaration>";i:99;s:10:"<property>";i:100;}i:113;a:2:{s:29:"<attrib_operator_rhand_sstar>";i:140;s:23:"<attrib_operator_rhand>";i:142;}i:114;a:1:{s:7:"<splus>";i:145;}i:119;a:1:{s:7:"<splus>";i:146;}i:124;a:12:{s:13:"<rulesetplus>";i:149;s:9:"<ruleset>";i:127;s:10:"<rruleset>";i:21;s:11:"<selectors>";i:25;s:10:"<selector>";i:28;s:17:"<simple_selector>";i:30;s:14:"<element_name>";i:31;s:31:"<hash_class_attrib_pseudo_plus>";i:32;s:26:"<hash_class_attrib_pseudo>";i:35;s:7:"<class>";i:37;s:8:"<attrib>";i:38;s:8:"<pseudo>";i:39;}i:125;a:11:{s:9:"<ruleset>";i:152;s:10:"<rruleset>";i:21;s:11:"<selectors>";i:25;s:10:"<selector>";i:28;s:17:"<simple_selector>";i:30;s:14:"<element_name>";i:31;s:31:"<hash_class_attrib_pseudo_plus>";i:32;s:26:"<hash_class_attrib_pseudo>";i:35;s:7:"<class>";i:37;s:8:"<attrib>";i:38;s:8:"<pseudo>";i:39;}i:126;a:1:{s:7:"<splus>";i:153;}i:129;a:1:{s:8:"<medium>";i:154;}i:130;a:1:{s:7:"<splus>";i:155;}i:132;a:1:{s:7:"<splus>";i:156;}i:134;a:5:{s:19:"<sstar_declaration>";i:157;s:13:"<declaration>";i:98;s:7:"<splus>";i:107;s:14:"<ddeclaration>";i:99;s:10:"<property>";i:100;}i:135;a:9:{s:7:"<splus>";i:158;s:6:"<expr>";i:159;s:6:"<term>";i:160;s:14:"<term_numeric>";i:161;s:17:"<term_nonnumeric>";i:162;s:16:"<unary_operator>";i:163;s:21:"<term_numeric_number>";i:164;s:10:"<hexcolor>";i:168;s:10:"<function>";i:169;}i:137;a:7:{s:33:"<declarations_optional_semicolon>";i:183;s:14:"<declarations>";i:96;s:19:"<sstar_declaration>";i:97;s:13:"<declaration>";i:98;s:7:"<splus>";i:107;s:14:"<ddeclaration>";i:99;s:10:"<property>";i:100;}i:139;a:1:{s:7:"<splus>";i:185;}i:142;a:1:{s:7:"<splus>";i:187;}i:149;a:11:{s:9:"<ruleset>";i:152;s:10:"<rruleset>";i:21;s:11:"<selectors>";i:25;s:10:"<selector>";i:28;s:17:"<simple_selector>";i:30;s:14:"<element_name>";i:31;s:31:"<hash_class_attrib_pseudo_plus>";i:32;s:26:"<hash_class_attrib_pseudo>";i:35;s:7:"<class>";i:37;s:8:"<attrib>";i:38;s:8:"<pseudo>";i:39;}i:150;a:1:{s:7:"<splus>";i:189;}i:151;a:1:{s:7:"<splus>";i:190;}i:158;a:8:{s:6:"<expr>";i:191;s:6:"<term>";i:160;s:14:"<term_numeric>";i:161;s:17:"<term_nonnumeric>";i:162;s:16:"<unary_operator>";i:163;s:21:"<term_numeric_number>";i:164;s:10:"<hexcolor>";i:168;s:10:"<function>";i:169;}i:159;a:10:{s:6:"<prio>";i:192;s:6:"<term>";i:193;s:10:"<operator>";i:194;s:21:"<important_sym_sstar>";i:195;s:14:"<term_numeric>";i:161;s:17:"<term_nonnumeric>";i:162;s:16:"<unary_operator>";i:163;s:21:"<term_numeric_number>";i:164;s:10:"<hexcolor>";i:168;s:10:"<function>";i:169;}i:163;a:1:{s:21:"<term_numeric_number>";i:199;}i:165;a:1:{s:7:"<splus>";i:200;}i:166;a:1:{s:7:"<splus>";i:201;}i:167;a:1:{s:7:"<splus>";i:202;}i:172;a:1:{s:7:"<splus>";i:203;}i:173;a:1:{s:7:"<splus>";i:204;}i:174;a:1:{s:7:"<splus>";i:205;}i:175;a:1:{s:7:"<splus>";i:206;}i:176;a:1:{s:7:"<splus>";i:207;}i:177;a:1:{s:7:"<splus>";i:208;}i:178;a:1:{s:7:"<splus>";i:209;}i:179;a:1:{s:7:"<splus>";i:210;}i:180;a:1:{s:7:"<splus>";i:211;}i:181;a:1:{s:7:"<splus>";i:212;}i:182;a:9:{s:7:"<splus>";i:213;s:6:"<expr>";i:214;s:6:"<term>";i:160;s:14:"<term_numeric>";i:161;s:17:"<term_nonnumeric>";i:162;s:16:"<unary_operator>";i:163;s:21:"<term_numeric_number>";i:164;s:10:"<hexcolor>";i:168;s:10:"<function>";i:169;}i:184;a:1:{s:7:"<splus>";i:216;}i:188;a:1:{s:7:"<splus>";i:217;}i:191;a:10:{s:6:"<prio>";i:218;s:6:"<term>";i:193;s:10:"<operator>";i:194;s:21:"<important_sym_sstar>";i:195;s:14:"<term_numeric>";i:161;s:17:"<term_nonnumeric>";i:162;s:16:"<unary_operator>";i:163;s:21:"<term_numeric_number>";i:164;s:10:"<hexcolor>";i:168;s:10:"<function>";i:169;}i:194;a:7:{s:6:"<term>";i:219;s:14:"<term_numeric>";i:161;s:17:"<term_nonnumeric>";i:162;s:16:"<unary_operator>";i:163;s:21:"<term_numeric_number>";i:164;s:10:"<hexcolor>";i:168;s:10:"<function>";i:169;}i:196;a:1:{s:7:"<splus>";i:220;}i:197;a:1:{s:7:"<splus>";i:221;}i:198;a:1:{s:7:"<splus>";i:222;}i:213;a:8:{s:6:"<expr>";i:223;s:6:"<term>";i:160;s:14:"<term_numeric>";i:161;s:17:"<term_nonnumeric>";i:162;s:16:"<unary_operator>";i:163;s:21:"<term_numeric_number>";i:164;s:10:"<hexcolor>";i:168;s:10:"<function>";i:169;}i:214;a:8:{s:6:"<term>";i:193;s:10:"<operator>";i:194;s:14:"<term_numeric>";i:161;s:17:"<term_nonnumeric>";i:162;s:16:"<unary_operator>";i:163;s:21:"<term_numeric_number>";i:164;s:10:"<hexcolor>";i:168;s:10:"<function>";i:169;}i:215;a:1:{s:7:"<splus>";i:225;}i:223;a:8:{s:6:"<term>";i:193;s:10:"<operator>";i:194;s:14:"<term_numeric>";i:161;s:17:"<term_nonnumeric>";i:162;s:16:"<unary_operator>";i:163;s:21:"<term_numeric_number>";i:164;s:10:"<hexcolor>";i:168;s:10:"<function>";i:169;}i:224;a:1:{s:7:"<splus>";i:227;}i:226;a:1:{s:7:"<splus>";i:228;}}');
        $this->_actionTable = unserialize('a:229:{i:1;a:1:{s:0:"";a:1:{s:6:"action";s:6:"accept";}}i:0;a:14:{s:9:"<COMMENT>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:9;}s:13:"<CHARSET_SYM>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:16;}s:4:"<SS>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:17;}s:5:"<CDO>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:18;}s:5:"<CDC>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:19;}s:12:"<IMPORT_SYM>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:24;}s:11:"<MEDIA_SYM>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:26;}s:10:"<PAGE_SYM>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:29;}s:7:"<IDENT>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:33;}s:6:"<STAR>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:34;}s:6:"<HASH>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:36;}s:5:"<DOT>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:40;}s:10:"<LBRACKET>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:41;}s:7:"<COLON>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:42;}}i:2;a:10:{s:12:"<IMPORT_SYM>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:24;}s:11:"<MEDIA_SYM>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:26;}s:10:"<PAGE_SYM>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:29;}s:7:"<IDENT>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:33;}s:6:"<STAR>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:34;}s:6:"<HASH>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:36;}s:5:"<DOT>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:40;}s:10:"<LBRACKET>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:41;}s:7:"<COLON>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:42;}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:12:"<stylesheet>";s:8:"function";s:13:"reduce_rule_2";}}i:5;a:3:{s:4:"<SS>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:17;}s:5:"<CDO>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:18;}s:5:"<CDC>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:19;}}i:6;a:13:{s:4:"<SS>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:17;}s:5:"<CDO>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:18;}s:5:"<CDC>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:19;}s:12:"<IMPORT_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:14:"<stylesheet_1>";s:8:"function";s:13:"reduce_rule_5";}s:11:"<MEDIA_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:14:"<stylesheet_1>";s:8:"function";s:13:"reduce_rule_5";}s:7:"<IDENT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:14:"<stylesheet_1>";s:8:"function";s:13:"reduce_rule_5";}s:10:"<PAGE_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:14:"<stylesheet_1>";s:8:"function";s:13:"reduce_rule_5";}s:7:"<COLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:14:"<stylesheet_1>";s:8:"function";s:13:"reduce_rule_5";}s:6:"<HASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:14:"<stylesheet_1>";s:8:"function";s:13:"reduce_rule_5";}s:5:"<DOT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:14:"<stylesheet_1>";s:8:"function";s:13:"reduce_rule_5";}s:6:"<STAR>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:14:"<stylesheet_1>";s:8:"function";s:13:"reduce_rule_5";}s:10:"<LBRACKET>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:14:"<stylesheet_1>";s:8:"function";s:13:"reduce_rule_5";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:14:"<stylesheet_1>";s:8:"function";s:13:"reduce_rule_5";}}i:7;a:9:{s:12:"<IMPORT_SYM>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:24;}s:11:"<MEDIA_SYM>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:26;}s:10:"<PAGE_SYM>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:29;}s:7:"<IDENT>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:33;}s:6:"<STAR>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:34;}s:6:"<HASH>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:36;}s:5:"<DOT>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:40;}s:10:"<LBRACKET>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:41;}s:7:"<COLON>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:42;}}i:8;a:9:{s:11:"<MEDIA_SYM>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:26;}s:10:"<PAGE_SYM>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:29;}s:7:"<IDENT>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:33;}s:6:"<STAR>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:34;}s:6:"<HASH>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:36;}s:5:"<DOT>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:40;}s:10:"<LBRACKET>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:41;}s:7:"<COLON>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:42;}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:14:"<stylesheet_2>";s:8:"function";s:14:"reduce_rule_19";}}i:10;a:1:{s:8:"<STRING>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:52;}}i:12;a:12:{s:4:"<SS>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:17;}s:5:"<CDO>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:18;}s:5:"<CDC>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:19;}s:12:"<IMPORT_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:19:"<stylesheet_import>";s:8:"function";s:14:"reduce_rule_21";}s:11:"<MEDIA_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:19:"<stylesheet_import>";s:8:"function";s:14:"reduce_rule_21";}s:7:"<IDENT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:19:"<stylesheet_import>";s:8:"function";s:14:"reduce_rule_21";}s:10:"<PAGE_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:19:"<stylesheet_import>";s:8:"function";s:14:"reduce_rule_21";}s:7:"<COLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:19:"<stylesheet_import>";s:8:"function";s:14:"reduce_rule_21";}s:6:"<HASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:19:"<stylesheet_import>";s:8:"function";s:14:"reduce_rule_21";}s:5:"<DOT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:19:"<stylesheet_import>";s:8:"function";s:14:"reduce_rule_21";}s:6:"<STAR>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:19:"<stylesheet_import>";s:8:"function";s:14:"reduce_rule_21";}s:10:"<LBRACKET>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:19:"<stylesheet_import>";s:8:"function";s:14:"reduce_rule_21";}}i:16;a:2:{s:4:"<SS>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:55;}s:8:"<STRING>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:19:"<charset_sym_sstar>";s:8:"function";s:13:"reduce_rule_7";}}i:20;a:2:{s:5:"<URI>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:58;}s:8:"<STRING>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:52;}}i:22;a:1:{s:7:"<IDENT>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:61;}}i:24;a:3:{s:4:"<SS>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:55;}s:8:"<STRING>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:18:"<import_sym_sstar>";s:8:"function";s:14:"reduce_rule_32";}s:5:"<URI>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:18:"<import_sym_sstar>";s:8:"function";s:14:"reduce_rule_32";}}i:25;a:2:{s:8:"<LBRACE>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:63;}s:7:"<COMMA>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:65;}}i:26;a:2:{s:4:"<SS>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:55;}s:7:"<IDENT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:17:"<media_sym_sstar>";s:8:"function";s:14:"reduce_rule_48";}}i:27;a:2:{s:8:"<LBRACE>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:68;}s:7:"<COLON>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:69;}}i:29;a:3:{s:4:"<SS>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:55;}s:8:"<LBRACE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:15:"<pagesym_sstar>";s:8:"function";s:14:"reduce_rule_61";}s:7:"<COLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:15:"<pagesym_sstar>";s:8:"function";s:14:"reduce_rule_61";}}i:30;a:5:{s:9:"<GREATER>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:72;}s:6:"<PLUS>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:73;}s:4:"<SS>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:74;}s:7:"<COMMA>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:10:"<selector>";s:8:"function";s:14:"reduce_rule_92";}s:8:"<LBRACE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:10:"<selector>";s:8:"function";s:14:"reduce_rule_92";}}i:31;a:9:{s:6:"<HASH>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:36;}s:5:"<DOT>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:40;}s:10:"<LBRACKET>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:41;}s:7:"<COLON>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:42;}s:4:"<SS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<simple_selector>";s:8:"function";s:14:"reduce_rule_94";}s:7:"<COMMA>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<simple_selector>";s:8:"function";s:14:"reduce_rule_94";}s:8:"<LBRACE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<simple_selector>";s:8:"function";s:14:"reduce_rule_94";}s:9:"<GREATER>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<simple_selector>";s:8:"function";s:14:"reduce_rule_94";}s:6:"<PLUS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<simple_selector>";s:8:"function";s:14:"reduce_rule_94";}}i:32;a:9:{s:6:"<HASH>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:36;}s:5:"<DOT>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:40;}s:10:"<LBRACKET>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:41;}s:7:"<COLON>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:42;}s:4:"<SS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<simple_selector>";s:8:"function";s:14:"reduce_rule_96";}s:7:"<COMMA>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<simple_selector>";s:8:"function";s:14:"reduce_rule_96";}s:8:"<LBRACE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<simple_selector>";s:8:"function";s:14:"reduce_rule_96";}s:9:"<GREATER>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<simple_selector>";s:8:"function";s:14:"reduce_rule_96";}s:6:"<PLUS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<simple_selector>";s:8:"function";s:14:"reduce_rule_96";}}i:40;a:1:{s:7:"<IDENT>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:77;}}i:41;a:2:{s:7:"<IDENT>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:79;}s:4:"<SS>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:55;}}i:42;a:2:{s:7:"<IDENT>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:81;}s:13:"<CSSFUNCTION>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:82;}}i:44;a:13:{s:4:"<SS>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:17;}s:5:"<CDO>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:18;}s:5:"<CDC>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:19;}s:12:"<IMPORT_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:14:"<stylesheet_1>";s:8:"function";s:13:"reduce_rule_4";}s:11:"<MEDIA_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:14:"<stylesheet_1>";s:8:"function";s:13:"reduce_rule_4";}s:7:"<IDENT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:14:"<stylesheet_1>";s:8:"function";s:13:"reduce_rule_4";}s:10:"<PAGE_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:14:"<stylesheet_1>";s:8:"function";s:13:"reduce_rule_4";}s:7:"<COLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:14:"<stylesheet_1>";s:8:"function";s:13:"reduce_rule_4";}s:6:"<HASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:14:"<stylesheet_1>";s:8:"function";s:13:"reduce_rule_4";}s:5:"<DOT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:14:"<stylesheet_1>";s:8:"function";s:13:"reduce_rule_4";}s:6:"<STAR>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:14:"<stylesheet_1>";s:8:"function";s:13:"reduce_rule_4";}s:10:"<LBRACKET>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:14:"<stylesheet_1>";s:8:"function";s:13:"reduce_rule_4";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:14:"<stylesheet_1>";s:8:"function";s:13:"reduce_rule_4";}}i:46;a:9:{s:11:"<MEDIA_SYM>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:26;}s:10:"<PAGE_SYM>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:29;}s:7:"<IDENT>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:33;}s:6:"<STAR>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:34;}s:6:"<HASH>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:36;}s:5:"<DOT>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:40;}s:10:"<LBRACKET>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:41;}s:7:"<COLON>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:42;}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:2:"$C";}s:15:"leftNonTerminal";s:14:"<stylesheet_2>";s:8:"function";s:14:"reduce_rule_18";}}i:47;a:12:{s:4:"<SS>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:17;}s:5:"<CDO>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:18;}s:5:"<CDC>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:19;}s:12:"<IMPORT_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:2:"$C";}s:15:"leftNonTerminal";s:19:"<stylesheet_import>";s:8:"function";s:14:"reduce_rule_23";}s:11:"<MEDIA_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:2:"$C";}s:15:"leftNonTerminal";s:19:"<stylesheet_import>";s:8:"function";s:14:"reduce_rule_23";}s:7:"<IDENT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:2:"$C";}s:15:"leftNonTerminal";s:19:"<stylesheet_import>";s:8:"function";s:14:"reduce_rule_23";}s:10:"<PAGE_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:2:"$C";}s:15:"leftNonTerminal";s:19:"<stylesheet_import>";s:8:"function";s:14:"reduce_rule_23";}s:7:"<COLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:2:"$C";}s:15:"leftNonTerminal";s:19:"<stylesheet_import>";s:8:"function";s:14:"reduce_rule_23";}s:6:"<HASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:2:"$C";}s:15:"leftNonTerminal";s:19:"<stylesheet_import>";s:8:"function";s:14:"reduce_rule_23";}s:5:"<DOT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:2:"$C";}s:15:"leftNonTerminal";s:19:"<stylesheet_import>";s:8:"function";s:14:"reduce_rule_23";}s:6:"<STAR>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:2:"$C";}s:15:"leftNonTerminal";s:19:"<stylesheet_import>";s:8:"function";s:14:"reduce_rule_23";}s:10:"<LBRACKET>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:2:"$C";}s:15:"leftNonTerminal";s:19:"<stylesheet_import>";s:8:"function";s:14:"reduce_rule_23";}}i:51;a:1:{s:11:"<SEMICOLON>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:84;}}i:52;a:3:{s:4:"<SS>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:55;}s:11:"<SEMICOLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:14:"<string_sstar>";s:8:"function";s:14:"reduce_rule_11";}s:7:"<IDENT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:14:"<string_sstar>";s:8:"function";s:14:"reduce_rule_11";}}i:53;a:12:{s:4:"<SS>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:17;}s:5:"<CDO>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:18;}s:5:"<CDC>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:19;}s:12:"<IMPORT_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:19:"<stylesheet_import>";s:8:"function";s:14:"reduce_rule_20";}s:11:"<MEDIA_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:19:"<stylesheet_import>";s:8:"function";s:14:"reduce_rule_20";}s:7:"<IDENT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:19:"<stylesheet_import>";s:8:"function";s:14:"reduce_rule_20";}s:10:"<PAGE_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:19:"<stylesheet_import>";s:8:"function";s:14:"reduce_rule_20";}s:7:"<COLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:19:"<stylesheet_import>";s:8:"function";s:14:"reduce_rule_20";}s:6:"<HASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:19:"<stylesheet_import>";s:8:"function";s:14:"reduce_rule_20";}s:5:"<DOT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:19:"<stylesheet_import>";s:8:"function";s:14:"reduce_rule_20";}s:6:"<STAR>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:19:"<stylesheet_import>";s:8:"function";s:14:"reduce_rule_20";}s:10:"<LBRACKET>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:19:"<stylesheet_import>";s:8:"function";s:14:"reduce_rule_20";}}i:55;a:35:{s:4:"<SS>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:55;}s:11:"<SEMICOLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:7:"<splus>";s:8:"function";s:13:"reduce_rule_9";}s:8:"<STRING>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:7:"<splus>";s:8:"function";s:13:"reduce_rule_9";}s:5:"<URI>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:7:"<splus>";s:8:"function";s:13:"reduce_rule_9";}s:7:"<COMMA>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:7:"<splus>";s:8:"function";s:13:"reduce_rule_9";}s:8:"<LBRACE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:7:"<splus>";s:8:"function";s:13:"reduce_rule_9";}s:8:"<RBRACE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:7:"<splus>";s:8:"function";s:13:"reduce_rule_9";}s:11:"<MEDIA_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:7:"<splus>";s:8:"function";s:13:"reduce_rule_9";}s:7:"<IDENT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:7:"<splus>";s:8:"function";s:13:"reduce_rule_9";}s:10:"<PAGE_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:7:"<splus>";s:8:"function";s:13:"reduce_rule_9";}s:7:"<COLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:7:"<splus>";s:8:"function";s:13:"reduce_rule_9";}s:7:"<SLASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:7:"<splus>";s:8:"function";s:13:"reduce_rule_9";}s:6:"<PLUS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:7:"<splus>";s:8:"function";s:13:"reduce_rule_9";}s:7:"<MINUS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:7:"<splus>";s:8:"function";s:13:"reduce_rule_9";}s:6:"<HASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:7:"<splus>";s:8:"function";s:13:"reduce_rule_9";}s:5:"<DOT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:7:"<splus>";s:8:"function";s:13:"reduce_rule_9";}s:6:"<STAR>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:7:"<splus>";s:8:"function";s:13:"reduce_rule_9";}s:10:"<LBRACKET>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:7:"<splus>";s:8:"function";s:13:"reduce_rule_9";}s:10:"<RBRACKET>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:7:"<splus>";s:8:"function";s:13:"reduce_rule_9";}s:10:"<INCLUDES>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:7:"<splus>";s:8:"function";s:13:"reduce_rule_9";}s:11:"<DASHMATCH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:7:"<splus>";s:8:"function";s:13:"reduce_rule_9";}s:7:"<EQUAL>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:7:"<splus>";s:8:"function";s:13:"reduce_rule_9";}s:13:"<CSSFUNCTION>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:7:"<splus>";s:8:"function";s:13:"reduce_rule_9";}s:8:"<RPAREN>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:7:"<splus>";s:8:"function";s:13:"reduce_rule_9";}s:15:"<IMPORTANT_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:7:"<splus>";s:8:"function";s:13:"reduce_rule_9";}s:8:"<NUMBER>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:7:"<splus>";s:8:"function";s:13:"reduce_rule_9";}s:12:"<PERCENTAGE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:7:"<splus>";s:8:"function";s:13:"reduce_rule_9";}s:8:"<LENGTH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:7:"<splus>";s:8:"function";s:13:"reduce_rule_9";}s:5:"<EMS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:7:"<splus>";s:8:"function";s:13:"reduce_rule_9";}s:5:"<EXS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:7:"<splus>";s:8:"function";s:13:"reduce_rule_9";}s:7:"<ANGLE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:7:"<splus>";s:8:"function";s:13:"reduce_rule_9";}s:6:"<TIME>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:7:"<splus>";s:8:"function";s:13:"reduce_rule_9";}s:6:"<FREQ>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:7:"<splus>";s:8:"function";s:13:"reduce_rule_9";}s:11:"<DIMENSION>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:7:"<splus>";s:8:"function";s:13:"reduce_rule_9";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:7:"<splus>";s:8:"function";s:13:"reduce_rule_9";}}i:56;a:2:{s:11:"<SEMICOLON>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:87;}s:7:"<IDENT>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:61;}}i:58;a:3:{s:4:"<SS>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:55;}s:11:"<SEMICOLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<string_or_uri_sstar>";s:8:"function";s:14:"reduce_rule_36";}s:7:"<IDENT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<string_or_uri_sstar>";s:8:"function";s:14:"reduce_rule_36";}}i:59;a:2:{s:8:"<LBRACE>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:90;}s:7:"<COMMA>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:91;}}i:61;a:4:{s:4:"<SS>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:55;}s:11:"<SEMICOLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:8:"<medium>";s:8:"function";s:14:"reduce_rule_52";}s:7:"<COMMA>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:8:"<medium>";s:8:"function";s:14:"reduce_rule_52";}s:8:"<LBRACE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:8:"<medium>";s:8:"function";s:14:"reduce_rule_52";}}i:63;a:3:{s:8:"<RBRACE>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:94;}s:4:"<SS>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:55;}s:7:"<IDENT>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:101;}}i:64;a:6:{s:7:"<IDENT>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:33;}s:6:"<STAR>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:34;}s:6:"<HASH>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:36;}s:5:"<DOT>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:40;}s:10:"<LBRACKET>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:41;}s:7:"<COLON>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:42;}}i:65;a:7:{s:4:"<SS>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:55;}s:7:"<IDENT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:13:"<comma_sstar>";s:8:"function";s:14:"reduce_rule_86";}s:7:"<COLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:13:"<comma_sstar>";s:8:"function";s:14:"reduce_rule_86";}s:6:"<HASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:13:"<comma_sstar>";s:8:"function";s:14:"reduce_rule_86";}s:5:"<DOT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:13:"<comma_sstar>";s:8:"function";s:14:"reduce_rule_86";}s:6:"<STAR>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:13:"<comma_sstar>";s:8:"function";s:14:"reduce_rule_86";}s:10:"<LBRACKET>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:13:"<comma_sstar>";s:8:"function";s:14:"reduce_rule_86";}}i:67;a:2:{s:8:"<LBRACE>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:105;}s:4:"<SS>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:55;}}i:68;a:2:{s:4:"<SS>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:55;}s:7:"<IDENT>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:101;}}i:69;a:1:{s:7:"<IDENT>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:108;}}i:71;a:6:{s:7:"<IDENT>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:33;}s:6:"<STAR>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:34;}s:6:"<HASH>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:36;}s:5:"<DOT>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:40;}s:10:"<LBRACKET>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:41;}s:7:"<COLON>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:42;}}i:72;a:1:{s:4:"<SS>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:55;}}i:73;a:1:{s:4:"<SS>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:55;}}i:75;a:9:{s:6:"<HASH>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:36;}s:5:"<DOT>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:40;}s:10:"<LBRACKET>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:41;}s:7:"<COLON>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:42;}s:4:"<SS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:2:"$D";}s:15:"leftNonTerminal";s:17:"<simple_selector>";s:8:"function";s:14:"reduce_rule_95";}s:7:"<COMMA>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:2:"$D";}s:15:"leftNonTerminal";s:17:"<simple_selector>";s:8:"function";s:14:"reduce_rule_95";}s:8:"<LBRACE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:2:"$D";}s:15:"leftNonTerminal";s:17:"<simple_selector>";s:8:"function";s:14:"reduce_rule_95";}s:9:"<GREATER>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:2:"$D";}s:15:"leftNonTerminal";s:17:"<simple_selector>";s:8:"function";s:14:"reduce_rule_95";}s:6:"<PLUS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:2:"$D";}s:15:"leftNonTerminal";s:17:"<simple_selector>";s:8:"function";s:14:"reduce_rule_95";}}i:78;a:4:{s:10:"<RBRACKET>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:112;}s:10:"<INCLUDES>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:115;}s:11:"<DASHMATCH>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:116;}s:7:"<EQUAL>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:117;}}i:79;a:6:{s:4:"<SS>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:55;}s:10:"<RBRACKET>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:15:"<trimmed_ident>";s:8:"function";s:15:"reduce_rule_109";}s:10:"<INCLUDES>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:15:"<trimmed_ident>";s:8:"function";s:15:"reduce_rule_109";}s:11:"<DASHMATCH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:15:"<trimmed_ident>";s:8:"function";s:15:"reduce_rule_109";}s:7:"<EQUAL>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:15:"<trimmed_ident>";s:8:"function";s:15:"reduce_rule_109";}s:8:"<RPAREN>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:15:"<trimmed_ident>";s:8:"function";s:15:"reduce_rule_109";}}i:80;a:1:{s:7:"<IDENT>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:119;}}i:82;a:3:{s:8:"<RPAREN>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:122;}s:7:"<IDENT>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:79;}s:4:"<SS>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:55;}}i:83;a:12:{s:4:"<SS>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:17;}s:5:"<CDO>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:18;}s:5:"<CDC>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:19;}s:12:"<IMPORT_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:2:"$B";i:1;s:2:"$C";i:2;s:0:"";}s:15:"leftNonTerminal";s:19:"<stylesheet_import>";s:8:"function";s:14:"reduce_rule_22";}s:11:"<MEDIA_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:2:"$B";i:1;s:2:"$C";i:2;s:0:"";}s:15:"leftNonTerminal";s:19:"<stylesheet_import>";s:8:"function";s:14:"reduce_rule_22";}s:7:"<IDENT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:2:"$B";i:1;s:2:"$C";i:2;s:0:"";}s:15:"leftNonTerminal";s:19:"<stylesheet_import>";s:8:"function";s:14:"reduce_rule_22";}s:10:"<PAGE_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:2:"$B";i:1;s:2:"$C";i:2;s:0:"";}s:15:"leftNonTerminal";s:19:"<stylesheet_import>";s:8:"function";s:14:"reduce_rule_22";}s:7:"<COLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:2:"$B";i:1;s:2:"$C";i:2;s:0:"";}s:15:"leftNonTerminal";s:19:"<stylesheet_import>";s:8:"function";s:14:"reduce_rule_22";}s:6:"<HASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:2:"$B";i:1;s:2:"$C";i:2;s:0:"";}s:15:"leftNonTerminal";s:19:"<stylesheet_import>";s:8:"function";s:14:"reduce_rule_22";}s:5:"<DOT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:2:"$B";i:1;s:2:"$C";i:2;s:0:"";}s:15:"leftNonTerminal";s:19:"<stylesheet_import>";s:8:"function";s:14:"reduce_rule_22";}s:6:"<STAR>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:2:"$B";i:1;s:2:"$C";i:2;s:0:"";}s:15:"leftNonTerminal";s:19:"<stylesheet_import>";s:8:"function";s:14:"reduce_rule_22";}s:10:"<LBRACKET>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:2:"$B";i:1;s:2:"$C";i:2;s:0:"";}s:15:"leftNonTerminal";s:19:"<stylesheet_import>";s:8:"function";s:14:"reduce_rule_22";}}i:88;a:2:{s:11:"<SEMICOLON>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:123;}s:7:"<COMMA>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:91;}}i:90;a:8:{s:8:"<RBRACE>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:126;}s:4:"<SS>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:55;}s:7:"<IDENT>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:33;}s:6:"<STAR>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:34;}s:6:"<HASH>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:36;}s:5:"<DOT>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:40;}s:10:"<LBRACKET>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:41;}s:7:"<COLON>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:42;}}i:91;a:2:{s:7:"<IDENT>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:61;}s:4:"<SS>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:55;}}i:93;a:1:{s:8:"<RBRACE>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:130;}}i:94;a:11:{s:4:"<SS>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:55;}s:8:"<RBRACE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:0:"";}s:15:"leftNonTerminal";s:10:"<rruleset>";s:8:"function";s:14:"reduce_rule_88";}s:11:"<MEDIA_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:0:"";}s:15:"leftNonTerminal";s:10:"<rruleset>";s:8:"function";s:14:"reduce_rule_88";}s:7:"<IDENT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:0:"";}s:15:"leftNonTerminal";s:10:"<rruleset>";s:8:"function";s:14:"reduce_rule_88";}s:10:"<PAGE_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:0:"";}s:15:"leftNonTerminal";s:10:"<rruleset>";s:8:"function";s:14:"reduce_rule_88";}s:7:"<COLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:0:"";}s:15:"leftNonTerminal";s:10:"<rruleset>";s:8:"function";s:14:"reduce_rule_88";}s:6:"<HASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:0:"";}s:15:"leftNonTerminal";s:10:"<rruleset>";s:8:"function";s:14:"reduce_rule_88";}s:5:"<DOT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:0:"";}s:15:"leftNonTerminal";s:10:"<rruleset>";s:8:"function";s:14:"reduce_rule_88";}s:6:"<STAR>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:0:"";}s:15:"leftNonTerminal";s:10:"<rruleset>";s:8:"function";s:14:"reduce_rule_88";}s:10:"<LBRACKET>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:0:"";}s:15:"leftNonTerminal";s:10:"<rruleset>";s:8:"function";s:14:"reduce_rule_88";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:0:"";}s:15:"leftNonTerminal";s:10:"<rruleset>";s:8:"function";s:14:"reduce_rule_88";}}i:95;a:2:{s:8:"<RBRACE>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:132;}s:7:"<IDENT>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:101;}}i:96;a:2:{s:11:"<SEMICOLON>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:134;}s:8:"<RBRACE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:33:"<declarations_optional_semicolon>";s:8:"function";s:14:"reduce_rule_63";}}i:100;a:1:{s:7:"<COLON>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:135;}}i:101;a:2:{s:4:"<SS>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:55;}s:7:"<COLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:10:"<property>";s:8:"function";s:14:"reduce_rule_79";}}i:104;a:1:{s:8:"<LBRACE>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:137;}}i:105;a:2:{s:4:"<SS>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:55;}s:7:"<IDENT>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:101;}}i:106;a:1:{s:8:"<RBRACE>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:139;}}i:107;a:1:{s:7:"<IDENT>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:101;}}i:113;a:3:{s:10:"<RBRACKET>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:141;}s:8:"<STRING>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:143;}s:7:"<IDENT>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:144;}}i:114;a:4:{s:4:"<SS>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:55;}s:8:"<STRING>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:23:"<attrib_operator_sstar>";s:8:"function";s:15:"reduce_rule_113";}s:7:"<IDENT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:23:"<attrib_operator_sstar>";s:8:"function";s:15:"reduce_rule_113";}s:10:"<RBRACKET>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:23:"<attrib_operator_sstar>";s:8:"function";s:15:"reduce_rule_113";}}i:119;a:6:{s:4:"<SS>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:55;}s:10:"<RBRACKET>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:2:"$B";}s:15:"leftNonTerminal";s:15:"<trimmed_ident>";s:8:"function";s:15:"reduce_rule_110";}s:10:"<INCLUDES>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:2:"$B";}s:15:"leftNonTerminal";s:15:"<trimmed_ident>";s:8:"function";s:15:"reduce_rule_110";}s:11:"<DASHMATCH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:2:"$B";}s:15:"leftNonTerminal";s:15:"<trimmed_ident>";s:8:"function";s:15:"reduce_rule_110";}s:7:"<EQUAL>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:2:"$B";}s:15:"leftNonTerminal";s:15:"<trimmed_ident>";s:8:"function";s:15:"reduce_rule_110";}s:8:"<RPAREN>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:2:"$B";}s:15:"leftNonTerminal";s:15:"<trimmed_ident>";s:8:"function";s:15:"reduce_rule_110";}}i:120;a:1:{s:8:"<RPAREN>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:147;}}i:121;a:2:{s:8:"<RPAREN>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:148;}s:7:"<IDENT>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:119;}}i:124;a:7:{s:8:"<RBRACE>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:150;}s:7:"<IDENT>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:33;}s:6:"<STAR>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:34;}s:6:"<HASH>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:36;}s:5:"<DOT>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:40;}s:10:"<LBRACKET>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:41;}s:7:"<COLON>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:42;}}i:125;a:7:{s:8:"<RBRACE>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:151;}s:7:"<IDENT>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:33;}s:6:"<STAR>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:34;}s:6:"<HASH>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:36;}s:5:"<DOT>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:40;}s:10:"<LBRACKET>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:41;}s:7:"<COLON>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:42;}}i:126;a:10:{s:4:"<SS>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:55;}s:11:"<MEDIA_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:0:"";}s:15:"leftNonTerminal";s:7:"<media>";s:8:"function";s:14:"reduce_rule_46";}s:7:"<IDENT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:0:"";}s:15:"leftNonTerminal";s:7:"<media>";s:8:"function";s:14:"reduce_rule_46";}s:10:"<PAGE_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:0:"";}s:15:"leftNonTerminal";s:7:"<media>";s:8:"function";s:14:"reduce_rule_46";}s:7:"<COLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:0:"";}s:15:"leftNonTerminal";s:7:"<media>";s:8:"function";s:14:"reduce_rule_46";}s:6:"<HASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:0:"";}s:15:"leftNonTerminal";s:7:"<media>";s:8:"function";s:14:"reduce_rule_46";}s:5:"<DOT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:0:"";}s:15:"leftNonTerminal";s:7:"<media>";s:8:"function";s:14:"reduce_rule_46";}s:6:"<STAR>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:0:"";}s:15:"leftNonTerminal";s:7:"<media>";s:8:"function";s:14:"reduce_rule_46";}s:10:"<LBRACKET>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:0:"";}s:15:"leftNonTerminal";s:7:"<media>";s:8:"function";s:14:"reduce_rule_46";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:0:"";}s:15:"leftNonTerminal";s:7:"<media>";s:8:"function";s:14:"reduce_rule_46";}}i:129;a:1:{s:7:"<IDENT>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:61;}}i:130;a:11:{s:4:"<SS>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:55;}s:8:"<RBRACE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:2:"$C";i:3;s:0:"";}s:15:"leftNonTerminal";s:10:"<rruleset>";s:8:"function";s:14:"reduce_rule_83";}s:11:"<MEDIA_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:2:"$C";i:3;s:0:"";}s:15:"leftNonTerminal";s:10:"<rruleset>";s:8:"function";s:14:"reduce_rule_83";}s:7:"<IDENT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:2:"$C";i:3;s:0:"";}s:15:"leftNonTerminal";s:10:"<rruleset>";s:8:"function";s:14:"reduce_rule_83";}s:10:"<PAGE_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:2:"$C";i:3;s:0:"";}s:15:"leftNonTerminal";s:10:"<rruleset>";s:8:"function";s:14:"reduce_rule_83";}s:7:"<COLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:2:"$C";i:3;s:0:"";}s:15:"leftNonTerminal";s:10:"<rruleset>";s:8:"function";s:14:"reduce_rule_83";}s:6:"<HASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:2:"$C";i:3;s:0:"";}s:15:"leftNonTerminal";s:10:"<rruleset>";s:8:"function";s:14:"reduce_rule_83";}s:5:"<DOT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:2:"$C";i:3;s:0:"";}s:15:"leftNonTerminal";s:10:"<rruleset>";s:8:"function";s:14:"reduce_rule_83";}s:6:"<STAR>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:2:"$C";i:3;s:0:"";}s:15:"leftNonTerminal";s:10:"<rruleset>";s:8:"function";s:14:"reduce_rule_83";}s:10:"<LBRACKET>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:2:"$C";i:3;s:0:"";}s:15:"leftNonTerminal";s:10:"<rruleset>";s:8:"function";s:14:"reduce_rule_83";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:2:"$C";i:3;s:0:"";}s:15:"leftNonTerminal";s:10:"<rruleset>";s:8:"function";s:14:"reduce_rule_83";}}i:132;a:11:{s:4:"<SS>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:55;}s:8:"<RBRACE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";}s:15:"leftNonTerminal";s:10:"<rruleset>";s:8:"function";s:14:"reduce_rule_89";}s:11:"<MEDIA_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";}s:15:"leftNonTerminal";s:10:"<rruleset>";s:8:"function";s:14:"reduce_rule_89";}s:7:"<IDENT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";}s:15:"leftNonTerminal";s:10:"<rruleset>";s:8:"function";s:14:"reduce_rule_89";}s:10:"<PAGE_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";}s:15:"leftNonTerminal";s:10:"<rruleset>";s:8:"function";s:14:"reduce_rule_89";}s:7:"<COLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";}s:15:"leftNonTerminal";s:10:"<rruleset>";s:8:"function";s:14:"reduce_rule_89";}s:6:"<HASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";}s:15:"leftNonTerminal";s:10:"<rruleset>";s:8:"function";s:14:"reduce_rule_89";}s:5:"<DOT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";}s:15:"leftNonTerminal";s:10:"<rruleset>";s:8:"function";s:14:"reduce_rule_89";}s:6:"<STAR>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";}s:15:"leftNonTerminal";s:10:"<rruleset>";s:8:"function";s:14:"reduce_rule_89";}s:10:"<LBRACKET>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";}s:15:"leftNonTerminal";s:10:"<rruleset>";s:8:"function";s:14:"reduce_rule_89";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";}s:15:"leftNonTerminal";s:10:"<rruleset>";s:8:"function";s:14:"reduce_rule_89";}}i:134;a:3:{s:4:"<SS>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:55;}s:7:"<IDENT>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:101;}s:8:"<RBRACE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:33:"<declarations_optional_semicolon>";s:8:"function";s:14:"reduce_rule_64";}}i:135;a:17:{s:4:"<SS>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:55;}s:8:"<STRING>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:165;}s:7:"<IDENT>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:166;}s:5:"<URI>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:167;}s:7:"<MINUS>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:170;}s:6:"<PLUS>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:171;}s:8:"<NUMBER>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:172;}s:12:"<PERCENTAGE>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:173;}s:8:"<LENGTH>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:174;}s:5:"<EMS>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:175;}s:5:"<EXS>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:176;}s:7:"<ANGLE>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:177;}s:6:"<TIME>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:178;}s:6:"<FREQ>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:179;}s:11:"<DIMENSION>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:180;}s:6:"<HASH>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:181;}s:13:"<CSSFUNCTION>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:182;}}i:137;a:2:{s:4:"<SS>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:55;}s:7:"<IDENT>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:101;}}i:138;a:1:{s:8:"<RBRACE>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:184;}}i:139;a:10:{s:4:"<SS>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:55;}s:11:"<MEDIA_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:0:"";i:2;s:2:"$C";i:3;s:0:"";}s:15:"leftNonTerminal";s:7:"<ppage>";s:8:"function";s:14:"reduce_rule_59";}s:7:"<IDENT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:0:"";i:2;s:2:"$C";i:3;s:0:"";}s:15:"leftNonTerminal";s:7:"<ppage>";s:8:"function";s:14:"reduce_rule_59";}s:10:"<PAGE_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:0:"";i:2;s:2:"$C";i:3;s:0:"";}s:15:"leftNonTerminal";s:7:"<ppage>";s:8:"function";s:14:"reduce_rule_59";}s:7:"<COLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:0:"";i:2;s:2:"$C";i:3;s:0:"";}s:15:"leftNonTerminal";s:7:"<ppage>";s:8:"function";s:14:"reduce_rule_59";}s:6:"<HASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:0:"";i:2;s:2:"$C";i:3;s:0:"";}s:15:"leftNonTerminal";s:7:"<ppage>";s:8:"function";s:14:"reduce_rule_59";}s:5:"<DOT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:0:"";i:2;s:2:"$C";i:3;s:0:"";}s:15:"leftNonTerminal";s:7:"<ppage>";s:8:"function";s:14:"reduce_rule_59";}s:6:"<STAR>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:0:"";i:2;s:2:"$C";i:3;s:0:"";}s:15:"leftNonTerminal";s:7:"<ppage>";s:8:"function";s:14:"reduce_rule_59";}s:10:"<LBRACKET>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:0:"";i:2;s:2:"$C";i:3;s:0:"";}s:15:"leftNonTerminal";s:7:"<ppage>";s:8:"function";s:14:"reduce_rule_59";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:0:"";i:2;s:2:"$C";i:3;s:0:"";}s:15:"leftNonTerminal";s:7:"<ppage>";s:8:"function";s:14:"reduce_rule_59";}}i:140;a:1:{s:10:"<RBRACKET>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:186;}}i:142;a:2:{s:4:"<SS>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:55;}s:10:"<RBRACKET>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:29:"<attrib_operator_rhand_sstar>";s:8:"function";s:15:"reduce_rule_118";}}i:149;a:7:{s:8:"<RBRACE>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:188;}s:7:"<IDENT>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:33;}s:6:"<STAR>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:34;}s:6:"<HASH>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:36;}s:5:"<DOT>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:40;}s:10:"<LBRACKET>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:41;}s:7:"<COLON>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:42;}}i:150;a:10:{s:4:"<SS>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:55;}s:11:"<MEDIA_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";}s:15:"leftNonTerminal";s:7:"<media>";s:8:"function";s:14:"reduce_rule_44";}s:7:"<IDENT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";}s:15:"leftNonTerminal";s:7:"<media>";s:8:"function";s:14:"reduce_rule_44";}s:10:"<PAGE_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";}s:15:"leftNonTerminal";s:7:"<media>";s:8:"function";s:14:"reduce_rule_44";}s:7:"<COLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";}s:15:"leftNonTerminal";s:7:"<media>";s:8:"function";s:14:"reduce_rule_44";}s:6:"<HASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";}s:15:"leftNonTerminal";s:7:"<media>";s:8:"function";s:14:"reduce_rule_44";}s:5:"<DOT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";}s:15:"leftNonTerminal";s:7:"<media>";s:8:"function";s:14:"reduce_rule_44";}s:6:"<STAR>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";}s:15:"leftNonTerminal";s:7:"<media>";s:8:"function";s:14:"reduce_rule_44";}s:10:"<LBRACKET>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";}s:15:"leftNonTerminal";s:7:"<media>";s:8:"function";s:14:"reduce_rule_44";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";}s:15:"leftNonTerminal";s:7:"<media>";s:8:"function";s:14:"reduce_rule_44";}}i:151;a:10:{s:4:"<SS>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:55;}s:11:"<MEDIA_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:2:"$C";i:4;s:0:"";}s:15:"leftNonTerminal";s:7:"<media>";s:8:"function";s:14:"reduce_rule_42";}s:7:"<IDENT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:2:"$C";i:4;s:0:"";}s:15:"leftNonTerminal";s:7:"<media>";s:8:"function";s:14:"reduce_rule_42";}s:10:"<PAGE_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:2:"$C";i:4;s:0:"";}s:15:"leftNonTerminal";s:7:"<media>";s:8:"function";s:14:"reduce_rule_42";}s:7:"<COLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:2:"$C";i:4;s:0:"";}s:15:"leftNonTerminal";s:7:"<media>";s:8:"function";s:14:"reduce_rule_42";}s:6:"<HASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:2:"$C";i:4;s:0:"";}s:15:"leftNonTerminal";s:7:"<media>";s:8:"function";s:14:"reduce_rule_42";}s:5:"<DOT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:2:"$C";i:4;s:0:"";}s:15:"leftNonTerminal";s:7:"<media>";s:8:"function";s:14:"reduce_rule_42";}s:6:"<STAR>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:2:"$C";i:4;s:0:"";}s:15:"leftNonTerminal";s:7:"<media>";s:8:"function";s:14:"reduce_rule_42";}s:10:"<LBRACKET>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:2:"$C";i:4;s:0:"";}s:15:"leftNonTerminal";s:7:"<media>";s:8:"function";s:14:"reduce_rule_42";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:2:"$C";i:4;s:0:"";}s:15:"leftNonTerminal";s:7:"<media>";s:8:"function";s:14:"reduce_rule_42";}}i:158;a:16:{s:8:"<STRING>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:165;}s:7:"<IDENT>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:166;}s:5:"<URI>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:167;}s:7:"<MINUS>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:170;}s:6:"<PLUS>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:171;}s:8:"<NUMBER>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:172;}s:12:"<PERCENTAGE>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:173;}s:8:"<LENGTH>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:174;}s:5:"<EMS>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:175;}s:5:"<EXS>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:176;}s:7:"<ANGLE>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:177;}s:6:"<TIME>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:178;}s:6:"<FREQ>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:179;}s:11:"<DIMENSION>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:180;}s:6:"<HASH>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:181;}s:13:"<CSSFUNCTION>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:182;}}i:159;a:21:{s:7:"<SLASH>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:196;}s:7:"<COMMA>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:197;}s:15:"<IMPORTANT_SYM>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:198;}s:8:"<STRING>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:165;}s:7:"<IDENT>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:166;}s:5:"<URI>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:167;}s:7:"<MINUS>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:170;}s:6:"<PLUS>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:171;}s:8:"<NUMBER>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:172;}s:12:"<PERCENTAGE>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:173;}s:8:"<LENGTH>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:174;}s:5:"<EMS>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:175;}s:5:"<EXS>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:176;}s:7:"<ANGLE>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:177;}s:6:"<TIME>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:178;}s:6:"<FREQ>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:179;}s:11:"<DIMENSION>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:180;}s:6:"<HASH>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:181;}s:13:"<CSSFUNCTION>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:182;}s:11:"<SEMICOLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:2:"$C";}s:15:"leftNonTerminal";s:14:"<ddeclaration>";s:8:"function";s:15:"reduce_rule_130";}s:8:"<RBRACE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:2:"$C";}s:15:"leftNonTerminal";s:14:"<ddeclaration>";s:8:"function";s:15:"reduce_rule_130";}}i:163;a:9:{s:8:"<NUMBER>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:172;}s:12:"<PERCENTAGE>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:173;}s:8:"<LENGTH>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:174;}s:5:"<EMS>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:175;}s:5:"<EXS>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:176;}s:7:"<ANGLE>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:177;}s:6:"<TIME>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:178;}s:6:"<FREQ>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:179;}s:11:"<DIMENSION>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:180;}}i:165;a:23:{s:4:"<SS>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:55;}s:11:"<SEMICOLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_159";}s:8:"<STRING>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_159";}s:5:"<URI>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_159";}s:7:"<COMMA>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_159";}s:8:"<RBRACE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_159";}s:7:"<IDENT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_159";}s:7:"<SLASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_159";}s:6:"<PLUS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_159";}s:7:"<MINUS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_159";}s:6:"<HASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_159";}s:13:"<CSSFUNCTION>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_159";}s:8:"<RPAREN>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_159";}s:15:"<IMPORTANT_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_159";}s:8:"<NUMBER>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_159";}s:12:"<PERCENTAGE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_159";}s:8:"<LENGTH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_159";}s:5:"<EMS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_159";}s:5:"<EXS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_159";}s:7:"<ANGLE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_159";}s:6:"<TIME>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_159";}s:6:"<FREQ>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_159";}s:11:"<DIMENSION>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_159";}}i:166;a:23:{s:4:"<SS>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:55;}s:11:"<SEMICOLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_161";}s:8:"<STRING>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_161";}s:5:"<URI>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_161";}s:7:"<COMMA>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_161";}s:8:"<RBRACE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_161";}s:7:"<IDENT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_161";}s:7:"<SLASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_161";}s:6:"<PLUS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_161";}s:7:"<MINUS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_161";}s:6:"<HASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_161";}s:13:"<CSSFUNCTION>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_161";}s:8:"<RPAREN>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_161";}s:15:"<IMPORTANT_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_161";}s:8:"<NUMBER>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_161";}s:12:"<PERCENTAGE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_161";}s:8:"<LENGTH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_161";}s:5:"<EMS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_161";}s:5:"<EXS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_161";}s:7:"<ANGLE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_161";}s:6:"<TIME>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_161";}s:6:"<FREQ>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_161";}s:11:"<DIMENSION>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_161";}}i:167;a:23:{s:4:"<SS>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:55;}s:11:"<SEMICOLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_163";}s:8:"<STRING>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_163";}s:5:"<URI>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_163";}s:7:"<COMMA>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_163";}s:8:"<RBRACE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_163";}s:7:"<IDENT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_163";}s:7:"<SLASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_163";}s:6:"<PLUS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_163";}s:7:"<MINUS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_163";}s:6:"<HASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_163";}s:13:"<CSSFUNCTION>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_163";}s:8:"<RPAREN>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_163";}s:15:"<IMPORTANT_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_163";}s:8:"<NUMBER>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_163";}s:12:"<PERCENTAGE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_163";}s:8:"<LENGTH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_163";}s:5:"<EMS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_163";}s:5:"<EXS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_163";}s:7:"<ANGLE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_163";}s:6:"<TIME>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_163";}s:6:"<FREQ>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_163";}s:11:"<DIMENSION>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_163";}}i:172;a:23:{s:4:"<SS>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:55;}s:11:"<SEMICOLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_141";}s:8:"<STRING>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_141";}s:5:"<URI>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_141";}s:7:"<COMMA>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_141";}s:8:"<RBRACE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_141";}s:7:"<IDENT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_141";}s:7:"<SLASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_141";}s:6:"<PLUS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_141";}s:7:"<MINUS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_141";}s:6:"<HASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_141";}s:13:"<CSSFUNCTION>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_141";}s:8:"<RPAREN>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_141";}s:15:"<IMPORTANT_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_141";}s:8:"<NUMBER>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_141";}s:12:"<PERCENTAGE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_141";}s:8:"<LENGTH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_141";}s:5:"<EMS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_141";}s:5:"<EXS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_141";}s:7:"<ANGLE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_141";}s:6:"<TIME>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_141";}s:6:"<FREQ>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_141";}s:11:"<DIMENSION>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_141";}}i:173;a:23:{s:4:"<SS>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:55;}s:11:"<SEMICOLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_143";}s:8:"<STRING>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_143";}s:5:"<URI>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_143";}s:7:"<COMMA>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_143";}s:8:"<RBRACE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_143";}s:7:"<IDENT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_143";}s:7:"<SLASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_143";}s:6:"<PLUS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_143";}s:7:"<MINUS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_143";}s:6:"<HASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_143";}s:13:"<CSSFUNCTION>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_143";}s:8:"<RPAREN>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_143";}s:15:"<IMPORTANT_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_143";}s:8:"<NUMBER>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_143";}s:12:"<PERCENTAGE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_143";}s:8:"<LENGTH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_143";}s:5:"<EMS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_143";}s:5:"<EXS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_143";}s:7:"<ANGLE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_143";}s:6:"<TIME>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_143";}s:6:"<FREQ>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_143";}s:11:"<DIMENSION>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_143";}}i:174;a:23:{s:4:"<SS>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:55;}s:11:"<SEMICOLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_145";}s:8:"<STRING>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_145";}s:5:"<URI>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_145";}s:7:"<COMMA>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_145";}s:8:"<RBRACE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_145";}s:7:"<IDENT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_145";}s:7:"<SLASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_145";}s:6:"<PLUS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_145";}s:7:"<MINUS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_145";}s:6:"<HASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_145";}s:13:"<CSSFUNCTION>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_145";}s:8:"<RPAREN>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_145";}s:15:"<IMPORTANT_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_145";}s:8:"<NUMBER>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_145";}s:12:"<PERCENTAGE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_145";}s:8:"<LENGTH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_145";}s:5:"<EMS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_145";}s:5:"<EXS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_145";}s:7:"<ANGLE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_145";}s:6:"<TIME>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_145";}s:6:"<FREQ>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_145";}s:11:"<DIMENSION>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_145";}}i:175;a:23:{s:4:"<SS>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:55;}s:11:"<SEMICOLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_147";}s:8:"<STRING>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_147";}s:5:"<URI>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_147";}s:7:"<COMMA>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_147";}s:8:"<RBRACE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_147";}s:7:"<IDENT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_147";}s:7:"<SLASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_147";}s:6:"<PLUS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_147";}s:7:"<MINUS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_147";}s:6:"<HASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_147";}s:13:"<CSSFUNCTION>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_147";}s:8:"<RPAREN>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_147";}s:15:"<IMPORTANT_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_147";}s:8:"<NUMBER>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_147";}s:12:"<PERCENTAGE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_147";}s:8:"<LENGTH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_147";}s:5:"<EMS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_147";}s:5:"<EXS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_147";}s:7:"<ANGLE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_147";}s:6:"<TIME>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_147";}s:6:"<FREQ>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_147";}s:11:"<DIMENSION>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_147";}}i:176;a:23:{s:4:"<SS>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:55;}s:11:"<SEMICOLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_149";}s:8:"<STRING>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_149";}s:5:"<URI>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_149";}s:7:"<COMMA>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_149";}s:8:"<RBRACE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_149";}s:7:"<IDENT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_149";}s:7:"<SLASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_149";}s:6:"<PLUS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_149";}s:7:"<MINUS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_149";}s:6:"<HASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_149";}s:13:"<CSSFUNCTION>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_149";}s:8:"<RPAREN>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_149";}s:15:"<IMPORTANT_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_149";}s:8:"<NUMBER>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_149";}s:12:"<PERCENTAGE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_149";}s:8:"<LENGTH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_149";}s:5:"<EMS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_149";}s:5:"<EXS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_149";}s:7:"<ANGLE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_149";}s:6:"<TIME>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_149";}s:6:"<FREQ>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_149";}s:11:"<DIMENSION>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_149";}}i:177;a:23:{s:4:"<SS>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:55;}s:11:"<SEMICOLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_151";}s:8:"<STRING>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_151";}s:5:"<URI>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_151";}s:7:"<COMMA>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_151";}s:8:"<RBRACE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_151";}s:7:"<IDENT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_151";}s:7:"<SLASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_151";}s:6:"<PLUS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_151";}s:7:"<MINUS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_151";}s:6:"<HASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_151";}s:13:"<CSSFUNCTION>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_151";}s:8:"<RPAREN>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_151";}s:15:"<IMPORTANT_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_151";}s:8:"<NUMBER>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_151";}s:12:"<PERCENTAGE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_151";}s:8:"<LENGTH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_151";}s:5:"<EMS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_151";}s:5:"<EXS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_151";}s:7:"<ANGLE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_151";}s:6:"<TIME>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_151";}s:6:"<FREQ>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_151";}s:11:"<DIMENSION>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_151";}}i:178;a:23:{s:4:"<SS>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:55;}s:11:"<SEMICOLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_153";}s:8:"<STRING>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_153";}s:5:"<URI>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_153";}s:7:"<COMMA>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_153";}s:8:"<RBRACE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_153";}s:7:"<IDENT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_153";}s:7:"<SLASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_153";}s:6:"<PLUS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_153";}s:7:"<MINUS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_153";}s:6:"<HASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_153";}s:13:"<CSSFUNCTION>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_153";}s:8:"<RPAREN>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_153";}s:15:"<IMPORTANT_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_153";}s:8:"<NUMBER>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_153";}s:12:"<PERCENTAGE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_153";}s:8:"<LENGTH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_153";}s:5:"<EMS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_153";}s:5:"<EXS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_153";}s:7:"<ANGLE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_153";}s:6:"<TIME>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_153";}s:6:"<FREQ>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_153";}s:11:"<DIMENSION>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_153";}}i:179;a:23:{s:4:"<SS>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:55;}s:11:"<SEMICOLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_155";}s:8:"<STRING>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_155";}s:5:"<URI>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_155";}s:7:"<COMMA>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_155";}s:8:"<RBRACE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_155";}s:7:"<IDENT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_155";}s:7:"<SLASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_155";}s:6:"<PLUS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_155";}s:7:"<MINUS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_155";}s:6:"<HASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_155";}s:13:"<CSSFUNCTION>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_155";}s:8:"<RPAREN>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_155";}s:15:"<IMPORTANT_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_155";}s:8:"<NUMBER>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_155";}s:12:"<PERCENTAGE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_155";}s:8:"<LENGTH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_155";}s:5:"<EMS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_155";}s:5:"<EXS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_155";}s:7:"<ANGLE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_155";}s:6:"<TIME>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_155";}s:6:"<FREQ>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_155";}s:11:"<DIMENSION>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_155";}}i:180;a:23:{s:4:"<SS>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:55;}s:11:"<SEMICOLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_157";}s:8:"<STRING>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_157";}s:5:"<URI>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_157";}s:7:"<COMMA>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_157";}s:8:"<RBRACE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_157";}s:7:"<IDENT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_157";}s:7:"<SLASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_157";}s:6:"<PLUS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_157";}s:7:"<MINUS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_157";}s:6:"<HASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_157";}s:13:"<CSSFUNCTION>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_157";}s:8:"<RPAREN>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_157";}s:15:"<IMPORTANT_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_157";}s:8:"<NUMBER>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_157";}s:12:"<PERCENTAGE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_157";}s:8:"<LENGTH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_157";}s:5:"<EMS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_157";}s:5:"<EXS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_157";}s:7:"<ANGLE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_157";}s:6:"<TIME>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_157";}s:6:"<FREQ>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_157";}s:11:"<DIMENSION>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_157";}}i:181;a:23:{s:4:"<SS>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:55;}s:11:"<SEMICOLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:10:"<hexcolor>";s:8:"function";s:15:"reduce_rule_167";}s:8:"<STRING>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:10:"<hexcolor>";s:8:"function";s:15:"reduce_rule_167";}s:5:"<URI>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:10:"<hexcolor>";s:8:"function";s:15:"reduce_rule_167";}s:7:"<COMMA>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:10:"<hexcolor>";s:8:"function";s:15:"reduce_rule_167";}s:8:"<RBRACE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:10:"<hexcolor>";s:8:"function";s:15:"reduce_rule_167";}s:7:"<IDENT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:10:"<hexcolor>";s:8:"function";s:15:"reduce_rule_167";}s:7:"<SLASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:10:"<hexcolor>";s:8:"function";s:15:"reduce_rule_167";}s:6:"<PLUS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:10:"<hexcolor>";s:8:"function";s:15:"reduce_rule_167";}s:7:"<MINUS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:10:"<hexcolor>";s:8:"function";s:15:"reduce_rule_167";}s:6:"<HASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:10:"<hexcolor>";s:8:"function";s:15:"reduce_rule_167";}s:13:"<CSSFUNCTION>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:10:"<hexcolor>";s:8:"function";s:15:"reduce_rule_167";}s:8:"<RPAREN>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:10:"<hexcolor>";s:8:"function";s:15:"reduce_rule_167";}s:15:"<IMPORTANT_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:10:"<hexcolor>";s:8:"function";s:15:"reduce_rule_167";}s:8:"<NUMBER>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:10:"<hexcolor>";s:8:"function";s:15:"reduce_rule_167";}s:12:"<PERCENTAGE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:10:"<hexcolor>";s:8:"function";s:15:"reduce_rule_167";}s:8:"<LENGTH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:10:"<hexcolor>";s:8:"function";s:15:"reduce_rule_167";}s:5:"<EMS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:10:"<hexcolor>";s:8:"function";s:15:"reduce_rule_167";}s:5:"<EXS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:10:"<hexcolor>";s:8:"function";s:15:"reduce_rule_167";}s:7:"<ANGLE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:10:"<hexcolor>";s:8:"function";s:15:"reduce_rule_167";}s:6:"<TIME>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:10:"<hexcolor>";s:8:"function";s:15:"reduce_rule_167";}s:6:"<FREQ>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:10:"<hexcolor>";s:8:"function";s:15:"reduce_rule_167";}s:11:"<DIMENSION>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:10:"<hexcolor>";s:8:"function";s:15:"reduce_rule_167";}}i:182;a:17:{s:4:"<SS>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:55;}s:8:"<STRING>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:165;}s:7:"<IDENT>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:166;}s:5:"<URI>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:167;}s:7:"<MINUS>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:170;}s:6:"<PLUS>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:171;}s:8:"<NUMBER>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:172;}s:12:"<PERCENTAGE>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:173;}s:8:"<LENGTH>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:174;}s:5:"<EMS>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:175;}s:5:"<EXS>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:176;}s:7:"<ANGLE>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:177;}s:6:"<TIME>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:178;}s:6:"<FREQ>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:179;}s:11:"<DIMENSION>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:180;}s:6:"<HASH>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:181;}s:13:"<CSSFUNCTION>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:182;}}i:183;a:1:{s:8:"<RBRACE>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:215;}}i:184;a:10:{s:4:"<SS>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:55;}s:11:"<MEDIA_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:2:"$C";i:4;s:0:"";}s:15:"leftNonTerminal";s:7:"<ppage>";s:8:"function";s:14:"reduce_rule_57";}s:7:"<IDENT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:2:"$C";i:4;s:0:"";}s:15:"leftNonTerminal";s:7:"<ppage>";s:8:"function";s:14:"reduce_rule_57";}s:10:"<PAGE_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:2:"$C";i:4;s:0:"";}s:15:"leftNonTerminal";s:7:"<ppage>";s:8:"function";s:14:"reduce_rule_57";}s:7:"<COLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:2:"$C";i:4;s:0:"";}s:15:"leftNonTerminal";s:7:"<ppage>";s:8:"function";s:14:"reduce_rule_57";}s:6:"<HASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:2:"$C";i:4;s:0:"";}s:15:"leftNonTerminal";s:7:"<ppage>";s:8:"function";s:14:"reduce_rule_57";}s:5:"<DOT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:2:"$C";i:4;s:0:"";}s:15:"leftNonTerminal";s:7:"<ppage>";s:8:"function";s:14:"reduce_rule_57";}s:6:"<STAR>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:2:"$C";i:4;s:0:"";}s:15:"leftNonTerminal";s:7:"<ppage>";s:8:"function";s:14:"reduce_rule_57";}s:10:"<LBRACKET>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:2:"$C";i:4;s:0:"";}s:15:"leftNonTerminal";s:7:"<ppage>";s:8:"function";s:14:"reduce_rule_57";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:2:"$C";i:4;s:0:"";}s:15:"leftNonTerminal";s:7:"<ppage>";s:8:"function";s:14:"reduce_rule_57";}}i:188;a:10:{s:4:"<SS>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:55;}s:11:"<MEDIA_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:6:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:0:"";i:4;s:2:"$C";i:5;s:0:"";}s:15:"leftNonTerminal";s:7:"<media>";s:8:"function";s:14:"reduce_rule_40";}s:7:"<IDENT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:6:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:0:"";i:4;s:2:"$C";i:5;s:0:"";}s:15:"leftNonTerminal";s:7:"<media>";s:8:"function";s:14:"reduce_rule_40";}s:10:"<PAGE_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:6:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:0:"";i:4;s:2:"$C";i:5;s:0:"";}s:15:"leftNonTerminal";s:7:"<media>";s:8:"function";s:14:"reduce_rule_40";}s:7:"<COLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:6:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:0:"";i:4;s:2:"$C";i:5;s:0:"";}s:15:"leftNonTerminal";s:7:"<media>";s:8:"function";s:14:"reduce_rule_40";}s:6:"<HASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:6:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:0:"";i:4;s:2:"$C";i:5;s:0:"";}s:15:"leftNonTerminal";s:7:"<media>";s:8:"function";s:14:"reduce_rule_40";}s:5:"<DOT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:6:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:0:"";i:4;s:2:"$C";i:5;s:0:"";}s:15:"leftNonTerminal";s:7:"<media>";s:8:"function";s:14:"reduce_rule_40";}s:6:"<STAR>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:6:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:0:"";i:4;s:2:"$C";i:5;s:0:"";}s:15:"leftNonTerminal";s:7:"<media>";s:8:"function";s:14:"reduce_rule_40";}s:10:"<LBRACKET>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:6:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:0:"";i:4;s:2:"$C";i:5;s:0:"";}s:15:"leftNonTerminal";s:7:"<media>";s:8:"function";s:14:"reduce_rule_40";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:6:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:0:"";i:4;s:2:"$C";i:5;s:0:"";}s:15:"leftNonTerminal";s:7:"<media>";s:8:"function";s:14:"reduce_rule_40";}}i:191;a:21:{s:7:"<SLASH>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:196;}s:7:"<COMMA>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:197;}s:15:"<IMPORTANT_SYM>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:198;}s:8:"<STRING>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:165;}s:7:"<IDENT>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:166;}s:5:"<URI>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:167;}s:7:"<MINUS>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:170;}s:6:"<PLUS>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:171;}s:8:"<NUMBER>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:172;}s:12:"<PERCENTAGE>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:173;}s:8:"<LENGTH>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:174;}s:5:"<EMS>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:175;}s:5:"<EXS>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:176;}s:7:"<ANGLE>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:177;}s:6:"<TIME>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:178;}s:6:"<FREQ>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:179;}s:11:"<DIMENSION>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:180;}s:6:"<HASH>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:181;}s:13:"<CSSFUNCTION>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:182;}s:11:"<SEMICOLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:0:"";i:3;s:2:"$C";}s:15:"leftNonTerminal";s:14:"<ddeclaration>";s:8:"function";s:15:"reduce_rule_128";}s:8:"<RBRACE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:0:"";i:3;s:2:"$C";}s:15:"leftNonTerminal";s:14:"<ddeclaration>";s:8:"function";s:15:"reduce_rule_128";}}i:194;a:16:{s:8:"<STRING>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:165;}s:7:"<IDENT>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:166;}s:5:"<URI>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:167;}s:7:"<MINUS>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:170;}s:6:"<PLUS>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:171;}s:8:"<NUMBER>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:172;}s:12:"<PERCENTAGE>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:173;}s:8:"<LENGTH>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:174;}s:5:"<EMS>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:175;}s:5:"<EXS>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:176;}s:7:"<ANGLE>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:177;}s:6:"<TIME>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:178;}s:6:"<FREQ>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:179;}s:11:"<DIMENSION>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:180;}s:6:"<HASH>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:181;}s:13:"<CSSFUNCTION>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:182;}}i:196;a:17:{s:4:"<SS>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:55;}s:8:"<STRING>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:10:"<operator>";s:8:"function";s:14:"reduce_rule_70";}s:5:"<URI>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:10:"<operator>";s:8:"function";s:14:"reduce_rule_70";}s:7:"<IDENT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:10:"<operator>";s:8:"function";s:14:"reduce_rule_70";}s:6:"<PLUS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:10:"<operator>";s:8:"function";s:14:"reduce_rule_70";}s:7:"<MINUS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:10:"<operator>";s:8:"function";s:14:"reduce_rule_70";}s:6:"<HASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:10:"<operator>";s:8:"function";s:14:"reduce_rule_70";}s:13:"<CSSFUNCTION>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:10:"<operator>";s:8:"function";s:14:"reduce_rule_70";}s:8:"<NUMBER>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:10:"<operator>";s:8:"function";s:14:"reduce_rule_70";}s:12:"<PERCENTAGE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:10:"<operator>";s:8:"function";s:14:"reduce_rule_70";}s:8:"<LENGTH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:10:"<operator>";s:8:"function";s:14:"reduce_rule_70";}s:5:"<EMS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:10:"<operator>";s:8:"function";s:14:"reduce_rule_70";}s:5:"<EXS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:10:"<operator>";s:8:"function";s:14:"reduce_rule_70";}s:7:"<ANGLE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:10:"<operator>";s:8:"function";s:14:"reduce_rule_70";}s:6:"<TIME>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:10:"<operator>";s:8:"function";s:14:"reduce_rule_70";}s:6:"<FREQ>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:10:"<operator>";s:8:"function";s:14:"reduce_rule_70";}s:11:"<DIMENSION>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:10:"<operator>";s:8:"function";s:14:"reduce_rule_70";}}i:197;a:17:{s:4:"<SS>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:55;}s:8:"<STRING>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:10:"<operator>";s:8:"function";s:14:"reduce_rule_72";}s:5:"<URI>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:10:"<operator>";s:8:"function";s:14:"reduce_rule_72";}s:7:"<IDENT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:10:"<operator>";s:8:"function";s:14:"reduce_rule_72";}s:6:"<PLUS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:10:"<operator>";s:8:"function";s:14:"reduce_rule_72";}s:7:"<MINUS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:10:"<operator>";s:8:"function";s:14:"reduce_rule_72";}s:6:"<HASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:10:"<operator>";s:8:"function";s:14:"reduce_rule_72";}s:13:"<CSSFUNCTION>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:10:"<operator>";s:8:"function";s:14:"reduce_rule_72";}s:8:"<NUMBER>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:10:"<operator>";s:8:"function";s:14:"reduce_rule_72";}s:12:"<PERCENTAGE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:10:"<operator>";s:8:"function";s:14:"reduce_rule_72";}s:8:"<LENGTH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:10:"<operator>";s:8:"function";s:14:"reduce_rule_72";}s:5:"<EMS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:10:"<operator>";s:8:"function";s:14:"reduce_rule_72";}s:5:"<EXS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:10:"<operator>";s:8:"function";s:14:"reduce_rule_72";}s:7:"<ANGLE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:10:"<operator>";s:8:"function";s:14:"reduce_rule_72";}s:6:"<TIME>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:10:"<operator>";s:8:"function";s:14:"reduce_rule_72";}s:6:"<FREQ>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:10:"<operator>";s:8:"function";s:14:"reduce_rule_72";}s:11:"<DIMENSION>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:10:"<operator>";s:8:"function";s:14:"reduce_rule_72";}}i:198;a:3:{s:4:"<SS>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:55;}s:11:"<SEMICOLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:21:"<important_sym_sstar>";s:8:"function";s:15:"reduce_rule_132";}s:8:"<RBRACE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:21:"<important_sym_sstar>";s:8:"function";s:15:"reduce_rule_132";}}i:213;a:16:{s:8:"<STRING>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:165;}s:7:"<IDENT>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:166;}s:5:"<URI>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:167;}s:7:"<MINUS>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:170;}s:6:"<PLUS>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:171;}s:8:"<NUMBER>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:172;}s:12:"<PERCENTAGE>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:173;}s:8:"<LENGTH>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:174;}s:5:"<EMS>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:175;}s:5:"<EXS>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:176;}s:7:"<ANGLE>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:177;}s:6:"<TIME>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:178;}s:6:"<FREQ>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:179;}s:11:"<DIMENSION>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:180;}s:6:"<HASH>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:181;}s:13:"<CSSFUNCTION>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:182;}}i:214;a:19:{s:8:"<RPAREN>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:224;}s:7:"<SLASH>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:196;}s:7:"<COMMA>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:197;}s:8:"<STRING>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:165;}s:7:"<IDENT>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:166;}s:5:"<URI>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:167;}s:7:"<MINUS>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:170;}s:6:"<PLUS>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:171;}s:8:"<NUMBER>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:172;}s:12:"<PERCENTAGE>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:173;}s:8:"<LENGTH>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:174;}s:5:"<EMS>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:175;}s:5:"<EXS>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:176;}s:7:"<ANGLE>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:177;}s:6:"<TIME>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:178;}s:6:"<FREQ>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:179;}s:11:"<DIMENSION>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:180;}s:6:"<HASH>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:181;}s:13:"<CSSFUNCTION>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:182;}}i:215;a:10:{s:4:"<SS>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:55;}s:11:"<MEDIA_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:6:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:0:"";i:4;s:2:"$C";i:5;s:0:"";}s:15:"leftNonTerminal";s:7:"<ppage>";s:8:"function";s:14:"reduce_rule_55";}s:7:"<IDENT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:6:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:0:"";i:4;s:2:"$C";i:5;s:0:"";}s:15:"leftNonTerminal";s:7:"<ppage>";s:8:"function";s:14:"reduce_rule_55";}s:10:"<PAGE_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:6:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:0:"";i:4;s:2:"$C";i:5;s:0:"";}s:15:"leftNonTerminal";s:7:"<ppage>";s:8:"function";s:14:"reduce_rule_55";}s:7:"<COLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:6:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:0:"";i:4;s:2:"$C";i:5;s:0:"";}s:15:"leftNonTerminal";s:7:"<ppage>";s:8:"function";s:14:"reduce_rule_55";}s:6:"<HASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:6:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:0:"";i:4;s:2:"$C";i:5;s:0:"";}s:15:"leftNonTerminal";s:7:"<ppage>";s:8:"function";s:14:"reduce_rule_55";}s:5:"<DOT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:6:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:0:"";i:4;s:2:"$C";i:5;s:0:"";}s:15:"leftNonTerminal";s:7:"<ppage>";s:8:"function";s:14:"reduce_rule_55";}s:6:"<STAR>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:6:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:0:"";i:4;s:2:"$C";i:5;s:0:"";}s:15:"leftNonTerminal";s:7:"<ppage>";s:8:"function";s:14:"reduce_rule_55";}s:10:"<LBRACKET>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:6:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:0:"";i:4;s:2:"$C";i:5;s:0:"";}s:15:"leftNonTerminal";s:7:"<ppage>";s:8:"function";s:14:"reduce_rule_55";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:6:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:0:"";i:4;s:2:"$C";i:5;s:0:"";}s:15:"leftNonTerminal";s:7:"<ppage>";s:8:"function";s:14:"reduce_rule_55";}}i:223;a:19:{s:8:"<RPAREN>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:226;}s:7:"<SLASH>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:196;}s:7:"<COMMA>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:197;}s:8:"<STRING>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:165;}s:7:"<IDENT>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:166;}s:5:"<URI>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:167;}s:7:"<MINUS>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:170;}s:6:"<PLUS>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:171;}s:8:"<NUMBER>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:172;}s:12:"<PERCENTAGE>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:173;}s:8:"<LENGTH>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:174;}s:5:"<EMS>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:175;}s:5:"<EXS>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:176;}s:7:"<ANGLE>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:177;}s:6:"<TIME>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:178;}s:6:"<FREQ>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:179;}s:11:"<DIMENSION>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:180;}s:6:"<HASH>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:181;}s:13:"<CSSFUNCTION>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:182;}}i:224;a:23:{s:4:"<SS>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:55;}s:11:"<SEMICOLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:2:"$B";i:1;s:2:"$C";i:2;s:0:"";}s:15:"leftNonTerminal";s:10:"<function>";s:8:"function";s:15:"reduce_rule_172";}s:8:"<STRING>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:2:"$B";i:1;s:2:"$C";i:2;s:0:"";}s:15:"leftNonTerminal";s:10:"<function>";s:8:"function";s:15:"reduce_rule_172";}s:5:"<URI>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:2:"$B";i:1;s:2:"$C";i:2;s:0:"";}s:15:"leftNonTerminal";s:10:"<function>";s:8:"function";s:15:"reduce_rule_172";}s:7:"<COMMA>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:2:"$B";i:1;s:2:"$C";i:2;s:0:"";}s:15:"leftNonTerminal";s:10:"<function>";s:8:"function";s:15:"reduce_rule_172";}s:8:"<RBRACE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:2:"$B";i:1;s:2:"$C";i:2;s:0:"";}s:15:"leftNonTerminal";s:10:"<function>";s:8:"function";s:15:"reduce_rule_172";}s:7:"<IDENT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:2:"$B";i:1;s:2:"$C";i:2;s:0:"";}s:15:"leftNonTerminal";s:10:"<function>";s:8:"function";s:15:"reduce_rule_172";}s:7:"<SLASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:2:"$B";i:1;s:2:"$C";i:2;s:0:"";}s:15:"leftNonTerminal";s:10:"<function>";s:8:"function";s:15:"reduce_rule_172";}s:6:"<PLUS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:2:"$B";i:1;s:2:"$C";i:2;s:0:"";}s:15:"leftNonTerminal";s:10:"<function>";s:8:"function";s:15:"reduce_rule_172";}s:7:"<MINUS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:2:"$B";i:1;s:2:"$C";i:2;s:0:"";}s:15:"leftNonTerminal";s:10:"<function>";s:8:"function";s:15:"reduce_rule_172";}s:6:"<HASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:2:"$B";i:1;s:2:"$C";i:2;s:0:"";}s:15:"leftNonTerminal";s:10:"<function>";s:8:"function";s:15:"reduce_rule_172";}s:13:"<CSSFUNCTION>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:2:"$B";i:1;s:2:"$C";i:2;s:0:"";}s:15:"leftNonTerminal";s:10:"<function>";s:8:"function";s:15:"reduce_rule_172";}s:8:"<RPAREN>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:2:"$B";i:1;s:2:"$C";i:2;s:0:"";}s:15:"leftNonTerminal";s:10:"<function>";s:8:"function";s:15:"reduce_rule_172";}s:15:"<IMPORTANT_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:2:"$B";i:1;s:2:"$C";i:2;s:0:"";}s:15:"leftNonTerminal";s:10:"<function>";s:8:"function";s:15:"reduce_rule_172";}s:8:"<NUMBER>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:2:"$B";i:1;s:2:"$C";i:2;s:0:"";}s:15:"leftNonTerminal";s:10:"<function>";s:8:"function";s:15:"reduce_rule_172";}s:12:"<PERCENTAGE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:2:"$B";i:1;s:2:"$C";i:2;s:0:"";}s:15:"leftNonTerminal";s:10:"<function>";s:8:"function";s:15:"reduce_rule_172";}s:8:"<LENGTH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:2:"$B";i:1;s:2:"$C";i:2;s:0:"";}s:15:"leftNonTerminal";s:10:"<function>";s:8:"function";s:15:"reduce_rule_172";}s:5:"<EMS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:2:"$B";i:1;s:2:"$C";i:2;s:0:"";}s:15:"leftNonTerminal";s:10:"<function>";s:8:"function";s:15:"reduce_rule_172";}s:5:"<EXS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:2:"$B";i:1;s:2:"$C";i:2;s:0:"";}s:15:"leftNonTerminal";s:10:"<function>";s:8:"function";s:15:"reduce_rule_172";}s:7:"<ANGLE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:2:"$B";i:1;s:2:"$C";i:2;s:0:"";}s:15:"leftNonTerminal";s:10:"<function>";s:8:"function";s:15:"reduce_rule_172";}s:6:"<TIME>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:2:"$B";i:1;s:2:"$C";i:2;s:0:"";}s:15:"leftNonTerminal";s:10:"<function>";s:8:"function";s:15:"reduce_rule_172";}s:6:"<FREQ>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:2:"$B";i:1;s:2:"$C";i:2;s:0:"";}s:15:"leftNonTerminal";s:10:"<function>";s:8:"function";s:15:"reduce_rule_172";}s:11:"<DIMENSION>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:2:"$B";i:1;s:2:"$C";i:2;s:0:"";}s:15:"leftNonTerminal";s:10:"<function>";s:8:"function";s:15:"reduce_rule_172";}}i:226;a:23:{s:4:"<SS>";a:2:{s:6:"action";s:5:"shift";s:9:"nextState";i:55;}s:11:"<SEMICOLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:2:"$C";i:3;s:0:"";}s:15:"leftNonTerminal";s:10:"<function>";s:8:"function";s:15:"reduce_rule_170";}s:8:"<STRING>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:2:"$C";i:3;s:0:"";}s:15:"leftNonTerminal";s:10:"<function>";s:8:"function";s:15:"reduce_rule_170";}s:5:"<URI>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:2:"$C";i:3;s:0:"";}s:15:"leftNonTerminal";s:10:"<function>";s:8:"function";s:15:"reduce_rule_170";}s:7:"<COMMA>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:2:"$C";i:3;s:0:"";}s:15:"leftNonTerminal";s:10:"<function>";s:8:"function";s:15:"reduce_rule_170";}s:8:"<RBRACE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:2:"$C";i:3;s:0:"";}s:15:"leftNonTerminal";s:10:"<function>";s:8:"function";s:15:"reduce_rule_170";}s:7:"<IDENT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:2:"$C";i:3;s:0:"";}s:15:"leftNonTerminal";s:10:"<function>";s:8:"function";s:15:"reduce_rule_170";}s:7:"<SLASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:2:"$C";i:3;s:0:"";}s:15:"leftNonTerminal";s:10:"<function>";s:8:"function";s:15:"reduce_rule_170";}s:6:"<PLUS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:2:"$C";i:3;s:0:"";}s:15:"leftNonTerminal";s:10:"<function>";s:8:"function";s:15:"reduce_rule_170";}s:7:"<MINUS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:2:"$C";i:3;s:0:"";}s:15:"leftNonTerminal";s:10:"<function>";s:8:"function";s:15:"reduce_rule_170";}s:6:"<HASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:2:"$C";i:3;s:0:"";}s:15:"leftNonTerminal";s:10:"<function>";s:8:"function";s:15:"reduce_rule_170";}s:13:"<CSSFUNCTION>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:2:"$C";i:3;s:0:"";}s:15:"leftNonTerminal";s:10:"<function>";s:8:"function";s:15:"reduce_rule_170";}s:8:"<RPAREN>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:2:"$C";i:3;s:0:"";}s:15:"leftNonTerminal";s:10:"<function>";s:8:"function";s:15:"reduce_rule_170";}s:15:"<IMPORTANT_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:2:"$C";i:3;s:0:"";}s:15:"leftNonTerminal";s:10:"<function>";s:8:"function";s:15:"reduce_rule_170";}s:8:"<NUMBER>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:2:"$C";i:3;s:0:"";}s:15:"leftNonTerminal";s:10:"<function>";s:8:"function";s:15:"reduce_rule_170";}s:12:"<PERCENTAGE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:2:"$C";i:3;s:0:"";}s:15:"leftNonTerminal";s:10:"<function>";s:8:"function";s:15:"reduce_rule_170";}s:8:"<LENGTH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:2:"$C";i:3;s:0:"";}s:15:"leftNonTerminal";s:10:"<function>";s:8:"function";s:15:"reduce_rule_170";}s:5:"<EMS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:2:"$C";i:3;s:0:"";}s:15:"leftNonTerminal";s:10:"<function>";s:8:"function";s:15:"reduce_rule_170";}s:5:"<EXS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:2:"$C";i:3;s:0:"";}s:15:"leftNonTerminal";s:10:"<function>";s:8:"function";s:15:"reduce_rule_170";}s:7:"<ANGLE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:2:"$C";i:3;s:0:"";}s:15:"leftNonTerminal";s:10:"<function>";s:8:"function";s:15:"reduce_rule_170";}s:6:"<TIME>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:2:"$C";i:3;s:0:"";}s:15:"leftNonTerminal";s:10:"<function>";s:8:"function";s:15:"reduce_rule_170";}s:6:"<FREQ>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:2:"$C";i:3;s:0:"";}s:15:"leftNonTerminal";s:10:"<function>";s:8:"function";s:15:"reduce_rule_170";}s:11:"<DIMENSION>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:2:"$C";i:3;s:0:"";}s:15:"leftNonTerminal";s:10:"<function>";s:8:"function";s:15:"reduce_rule_170";}}i:3;a:1:{s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:12:"<stylesheet>";s:8:"function";s:13:"reduce_rule_3";}}i:4;a:1:{s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:12:"<stylesheet>";s:8:"function";s:15:"reduce_rule_173";}}i:9;a:1:{s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:13:"<placeholder>";s:8:"function";s:15:"reduce_rule_174";}}i:11;a:13:{s:4:"<SS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:16:"<s_cdo_cdc_plus>";s:8:"function";s:14:"reduce_rule_13";}s:5:"<CDO>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:16:"<s_cdo_cdc_plus>";s:8:"function";s:14:"reduce_rule_13";}s:5:"<CDC>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:16:"<s_cdo_cdc_plus>";s:8:"function";s:14:"reduce_rule_13";}s:12:"<IMPORT_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:16:"<s_cdo_cdc_plus>";s:8:"function";s:14:"reduce_rule_13";}s:11:"<MEDIA_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:16:"<s_cdo_cdc_plus>";s:8:"function";s:14:"reduce_rule_13";}s:7:"<IDENT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:16:"<s_cdo_cdc_plus>";s:8:"function";s:14:"reduce_rule_13";}s:10:"<PAGE_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:16:"<s_cdo_cdc_plus>";s:8:"function";s:14:"reduce_rule_13";}s:7:"<COLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:16:"<s_cdo_cdc_plus>";s:8:"function";s:14:"reduce_rule_13";}s:6:"<HASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:16:"<s_cdo_cdc_plus>";s:8:"function";s:14:"reduce_rule_13";}s:5:"<DOT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:16:"<s_cdo_cdc_plus>";s:8:"function";s:14:"reduce_rule_13";}s:6:"<STAR>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:16:"<s_cdo_cdc_plus>";s:8:"function";s:14:"reduce_rule_13";}s:10:"<LBRACKET>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:16:"<s_cdo_cdc_plus>";s:8:"function";s:14:"reduce_rule_13";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:16:"<s_cdo_cdc_plus>";s:8:"function";s:14:"reduce_rule_13";}}i:13;a:9:{s:11:"<MEDIA_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:31:"<stylesheet_ruleset_media_page>";s:8:"function";s:14:"reduce_rule_24";}s:7:"<IDENT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:31:"<stylesheet_ruleset_media_page>";s:8:"function";s:14:"reduce_rule_24";}s:10:"<PAGE_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:31:"<stylesheet_ruleset_media_page>";s:8:"function";s:14:"reduce_rule_24";}s:7:"<COLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:31:"<stylesheet_ruleset_media_page>";s:8:"function";s:14:"reduce_rule_24";}s:6:"<HASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:31:"<stylesheet_ruleset_media_page>";s:8:"function";s:14:"reduce_rule_24";}s:5:"<DOT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:31:"<stylesheet_ruleset_media_page>";s:8:"function";s:14:"reduce_rule_24";}s:6:"<STAR>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:31:"<stylesheet_ruleset_media_page>";s:8:"function";s:14:"reduce_rule_24";}s:10:"<LBRACKET>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:31:"<stylesheet_ruleset_media_page>";s:8:"function";s:14:"reduce_rule_24";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:31:"<stylesheet_ruleset_media_page>";s:8:"function";s:14:"reduce_rule_24";}}i:14;a:9:{s:11:"<MEDIA_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:31:"<stylesheet_ruleset_media_page>";s:8:"function";s:14:"reduce_rule_25";}s:7:"<IDENT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:31:"<stylesheet_ruleset_media_page>";s:8:"function";s:14:"reduce_rule_25";}s:10:"<PAGE_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:31:"<stylesheet_ruleset_media_page>";s:8:"function";s:14:"reduce_rule_25";}s:7:"<COLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:31:"<stylesheet_ruleset_media_page>";s:8:"function";s:14:"reduce_rule_25";}s:6:"<HASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:31:"<stylesheet_ruleset_media_page>";s:8:"function";s:14:"reduce_rule_25";}s:5:"<DOT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:31:"<stylesheet_ruleset_media_page>";s:8:"function";s:14:"reduce_rule_25";}s:6:"<STAR>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:31:"<stylesheet_ruleset_media_page>";s:8:"function";s:14:"reduce_rule_25";}s:10:"<LBRACKET>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:31:"<stylesheet_ruleset_media_page>";s:8:"function";s:14:"reduce_rule_25";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:31:"<stylesheet_ruleset_media_page>";s:8:"function";s:14:"reduce_rule_25";}}i:15;a:9:{s:11:"<MEDIA_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:31:"<stylesheet_ruleset_media_page>";s:8:"function";s:14:"reduce_rule_26";}s:7:"<IDENT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:31:"<stylesheet_ruleset_media_page>";s:8:"function";s:14:"reduce_rule_26";}s:10:"<PAGE_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:31:"<stylesheet_ruleset_media_page>";s:8:"function";s:14:"reduce_rule_26";}s:7:"<COLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:31:"<stylesheet_ruleset_media_page>";s:8:"function";s:14:"reduce_rule_26";}s:6:"<HASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:31:"<stylesheet_ruleset_media_page>";s:8:"function";s:14:"reduce_rule_26";}s:5:"<DOT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:31:"<stylesheet_ruleset_media_page>";s:8:"function";s:14:"reduce_rule_26";}s:6:"<STAR>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:31:"<stylesheet_ruleset_media_page>";s:8:"function";s:14:"reduce_rule_26";}s:10:"<LBRACKET>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:31:"<stylesheet_ruleset_media_page>";s:8:"function";s:14:"reduce_rule_26";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:31:"<stylesheet_ruleset_media_page>";s:8:"function";s:14:"reduce_rule_26";}}i:17;a:13:{s:4:"<SS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:11:"<s_cdo_cdc>";s:8:"function";s:14:"reduce_rule_15";}s:5:"<CDO>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:11:"<s_cdo_cdc>";s:8:"function";s:14:"reduce_rule_15";}s:5:"<CDC>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:11:"<s_cdo_cdc>";s:8:"function";s:14:"reduce_rule_15";}s:12:"<IMPORT_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:11:"<s_cdo_cdc>";s:8:"function";s:14:"reduce_rule_15";}s:11:"<MEDIA_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:11:"<s_cdo_cdc>";s:8:"function";s:14:"reduce_rule_15";}s:7:"<IDENT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:11:"<s_cdo_cdc>";s:8:"function";s:14:"reduce_rule_15";}s:10:"<PAGE_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:11:"<s_cdo_cdc>";s:8:"function";s:14:"reduce_rule_15";}s:7:"<COLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:11:"<s_cdo_cdc>";s:8:"function";s:14:"reduce_rule_15";}s:6:"<HASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:11:"<s_cdo_cdc>";s:8:"function";s:14:"reduce_rule_15";}s:5:"<DOT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:11:"<s_cdo_cdc>";s:8:"function";s:14:"reduce_rule_15";}s:6:"<STAR>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:11:"<s_cdo_cdc>";s:8:"function";s:14:"reduce_rule_15";}s:10:"<LBRACKET>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:11:"<s_cdo_cdc>";s:8:"function";s:14:"reduce_rule_15";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:11:"<s_cdo_cdc>";s:8:"function";s:14:"reduce_rule_15";}}i:18;a:13:{s:4:"<SS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:11:"<s_cdo_cdc>";s:8:"function";s:14:"reduce_rule_16";}s:5:"<CDO>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:11:"<s_cdo_cdc>";s:8:"function";s:14:"reduce_rule_16";}s:5:"<CDC>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:11:"<s_cdo_cdc>";s:8:"function";s:14:"reduce_rule_16";}s:12:"<IMPORT_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:11:"<s_cdo_cdc>";s:8:"function";s:14:"reduce_rule_16";}s:11:"<MEDIA_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:11:"<s_cdo_cdc>";s:8:"function";s:14:"reduce_rule_16";}s:7:"<IDENT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:11:"<s_cdo_cdc>";s:8:"function";s:14:"reduce_rule_16";}s:10:"<PAGE_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:11:"<s_cdo_cdc>";s:8:"function";s:14:"reduce_rule_16";}s:7:"<COLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:11:"<s_cdo_cdc>";s:8:"function";s:14:"reduce_rule_16";}s:6:"<HASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:11:"<s_cdo_cdc>";s:8:"function";s:14:"reduce_rule_16";}s:5:"<DOT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:11:"<s_cdo_cdc>";s:8:"function";s:14:"reduce_rule_16";}s:6:"<STAR>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:11:"<s_cdo_cdc>";s:8:"function";s:14:"reduce_rule_16";}s:10:"<LBRACKET>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:11:"<s_cdo_cdc>";s:8:"function";s:14:"reduce_rule_16";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:11:"<s_cdo_cdc>";s:8:"function";s:14:"reduce_rule_16";}}i:19;a:13:{s:4:"<SS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:11:"<s_cdo_cdc>";s:8:"function";s:14:"reduce_rule_17";}s:5:"<CDO>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:11:"<s_cdo_cdc>";s:8:"function";s:14:"reduce_rule_17";}s:5:"<CDC>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:11:"<s_cdo_cdc>";s:8:"function";s:14:"reduce_rule_17";}s:12:"<IMPORT_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:11:"<s_cdo_cdc>";s:8:"function";s:14:"reduce_rule_17";}s:11:"<MEDIA_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:11:"<s_cdo_cdc>";s:8:"function";s:14:"reduce_rule_17";}s:7:"<IDENT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:11:"<s_cdo_cdc>";s:8:"function";s:14:"reduce_rule_17";}s:10:"<PAGE_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:11:"<s_cdo_cdc>";s:8:"function";s:14:"reduce_rule_17";}s:7:"<COLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:11:"<s_cdo_cdc>";s:8:"function";s:14:"reduce_rule_17";}s:6:"<HASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:11:"<s_cdo_cdc>";s:8:"function";s:14:"reduce_rule_17";}s:5:"<DOT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:11:"<s_cdo_cdc>";s:8:"function";s:14:"reduce_rule_17";}s:6:"<STAR>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:11:"<s_cdo_cdc>";s:8:"function";s:14:"reduce_rule_17";}s:10:"<LBRACKET>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:11:"<s_cdo_cdc>";s:8:"function";s:14:"reduce_rule_17";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:11:"<s_cdo_cdc>";s:8:"function";s:14:"reduce_rule_17";}}i:21;a:10:{s:8:"<RBRACE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:9:"<ruleset>";s:8:"function";s:14:"reduce_rule_81";}s:11:"<MEDIA_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:9:"<ruleset>";s:8:"function";s:14:"reduce_rule_81";}s:7:"<IDENT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:9:"<ruleset>";s:8:"function";s:14:"reduce_rule_81";}s:10:"<PAGE_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:9:"<ruleset>";s:8:"function";s:14:"reduce_rule_81";}s:7:"<COLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:9:"<ruleset>";s:8:"function";s:14:"reduce_rule_81";}s:6:"<HASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:9:"<ruleset>";s:8:"function";s:14:"reduce_rule_81";}s:5:"<DOT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:9:"<ruleset>";s:8:"function";s:14:"reduce_rule_81";}s:6:"<STAR>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:9:"<ruleset>";s:8:"function";s:14:"reduce_rule_81";}s:10:"<LBRACKET>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:9:"<ruleset>";s:8:"function";s:14:"reduce_rule_81";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:9:"<ruleset>";s:8:"function";s:14:"reduce_rule_81";}}i:23;a:9:{s:11:"<MEDIA_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:6:"<page>";s:8:"function";s:14:"reduce_rule_54";}s:7:"<IDENT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:6:"<page>";s:8:"function";s:14:"reduce_rule_54";}s:10:"<PAGE_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:6:"<page>";s:8:"function";s:14:"reduce_rule_54";}s:7:"<COLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:6:"<page>";s:8:"function";s:14:"reduce_rule_54";}s:6:"<HASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:6:"<page>";s:8:"function";s:14:"reduce_rule_54";}s:5:"<DOT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:6:"<page>";s:8:"function";s:14:"reduce_rule_54";}s:6:"<STAR>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:6:"<page>";s:8:"function";s:14:"reduce_rule_54";}s:10:"<LBRACKET>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:6:"<page>";s:8:"function";s:14:"reduce_rule_54";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:6:"<page>";s:8:"function";s:14:"reduce_rule_54";}}i:28;a:2:{s:7:"<COMMA>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:11:"<selectors>";s:8:"function";s:14:"reduce_rule_84";}s:8:"<LBRACE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:11:"<selectors>";s:8:"function";s:14:"reduce_rule_84";}}i:33;a:9:{s:4:"<SS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:14:"<element_name>";s:8:"function";s:15:"reduce_rule_104";}s:7:"<COMMA>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:14:"<element_name>";s:8:"function";s:15:"reduce_rule_104";}s:8:"<LBRACE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:14:"<element_name>";s:8:"function";s:15:"reduce_rule_104";}s:7:"<COLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:14:"<element_name>";s:8:"function";s:15:"reduce_rule_104";}s:9:"<GREATER>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:14:"<element_name>";s:8:"function";s:15:"reduce_rule_104";}s:6:"<PLUS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:14:"<element_name>";s:8:"function";s:15:"reduce_rule_104";}s:6:"<HASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:14:"<element_name>";s:8:"function";s:15:"reduce_rule_104";}s:5:"<DOT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:14:"<element_name>";s:8:"function";s:15:"reduce_rule_104";}s:10:"<LBRACKET>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:14:"<element_name>";s:8:"function";s:15:"reduce_rule_104";}}i:34;a:9:{s:4:"<SS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:14:"<element_name>";s:8:"function";s:15:"reduce_rule_105";}s:7:"<COMMA>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:14:"<element_name>";s:8:"function";s:15:"reduce_rule_105";}s:8:"<LBRACE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:14:"<element_name>";s:8:"function";s:15:"reduce_rule_105";}s:7:"<COLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:14:"<element_name>";s:8:"function";s:15:"reduce_rule_105";}s:9:"<GREATER>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:14:"<element_name>";s:8:"function";s:15:"reduce_rule_105";}s:6:"<PLUS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:14:"<element_name>";s:8:"function";s:15:"reduce_rule_105";}s:6:"<HASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:14:"<element_name>";s:8:"function";s:15:"reduce_rule_105";}s:5:"<DOT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:14:"<element_name>";s:8:"function";s:15:"reduce_rule_105";}s:10:"<LBRACKET>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:14:"<element_name>";s:8:"function";s:15:"reduce_rule_105";}}i:35;a:9:{s:4:"<SS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:31:"<hash_class_attrib_pseudo_plus>";s:8:"function";s:14:"reduce_rule_97";}s:7:"<COMMA>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:31:"<hash_class_attrib_pseudo_plus>";s:8:"function";s:14:"reduce_rule_97";}s:8:"<LBRACE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:31:"<hash_class_attrib_pseudo_plus>";s:8:"function";s:14:"reduce_rule_97";}s:7:"<COLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:31:"<hash_class_attrib_pseudo_plus>";s:8:"function";s:14:"reduce_rule_97";}s:9:"<GREATER>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:31:"<hash_class_attrib_pseudo_plus>";s:8:"function";s:14:"reduce_rule_97";}s:6:"<PLUS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:31:"<hash_class_attrib_pseudo_plus>";s:8:"function";s:14:"reduce_rule_97";}s:6:"<HASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:31:"<hash_class_attrib_pseudo_plus>";s:8:"function";s:14:"reduce_rule_97";}s:5:"<DOT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:31:"<hash_class_attrib_pseudo_plus>";s:8:"function";s:14:"reduce_rule_97";}s:10:"<LBRACKET>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:31:"<hash_class_attrib_pseudo_plus>";s:8:"function";s:14:"reduce_rule_97";}}i:36;a:9:{s:4:"<SS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:26:"<hash_class_attrib_pseudo>";s:8:"function";s:14:"reduce_rule_99";}s:7:"<COMMA>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:26:"<hash_class_attrib_pseudo>";s:8:"function";s:14:"reduce_rule_99";}s:8:"<LBRACE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:26:"<hash_class_attrib_pseudo>";s:8:"function";s:14:"reduce_rule_99";}s:7:"<COLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:26:"<hash_class_attrib_pseudo>";s:8:"function";s:14:"reduce_rule_99";}s:9:"<GREATER>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:26:"<hash_class_attrib_pseudo>";s:8:"function";s:14:"reduce_rule_99";}s:6:"<PLUS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:26:"<hash_class_attrib_pseudo>";s:8:"function";s:14:"reduce_rule_99";}s:6:"<HASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:26:"<hash_class_attrib_pseudo>";s:8:"function";s:14:"reduce_rule_99";}s:5:"<DOT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:26:"<hash_class_attrib_pseudo>";s:8:"function";s:14:"reduce_rule_99";}s:10:"<LBRACKET>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:26:"<hash_class_attrib_pseudo>";s:8:"function";s:14:"reduce_rule_99";}}i:37;a:9:{s:4:"<SS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:26:"<hash_class_attrib_pseudo>";s:8:"function";s:15:"reduce_rule_100";}s:7:"<COMMA>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:26:"<hash_class_attrib_pseudo>";s:8:"function";s:15:"reduce_rule_100";}s:8:"<LBRACE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:26:"<hash_class_attrib_pseudo>";s:8:"function";s:15:"reduce_rule_100";}s:7:"<COLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:26:"<hash_class_attrib_pseudo>";s:8:"function";s:15:"reduce_rule_100";}s:9:"<GREATER>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:26:"<hash_class_attrib_pseudo>";s:8:"function";s:15:"reduce_rule_100";}s:6:"<PLUS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:26:"<hash_class_attrib_pseudo>";s:8:"function";s:15:"reduce_rule_100";}s:6:"<HASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:26:"<hash_class_attrib_pseudo>";s:8:"function";s:15:"reduce_rule_100";}s:5:"<DOT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:26:"<hash_class_attrib_pseudo>";s:8:"function";s:15:"reduce_rule_100";}s:10:"<LBRACKET>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:26:"<hash_class_attrib_pseudo>";s:8:"function";s:15:"reduce_rule_100";}}i:38;a:9:{s:4:"<SS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:26:"<hash_class_attrib_pseudo>";s:8:"function";s:15:"reduce_rule_101";}s:7:"<COMMA>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:26:"<hash_class_attrib_pseudo>";s:8:"function";s:15:"reduce_rule_101";}s:8:"<LBRACE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:26:"<hash_class_attrib_pseudo>";s:8:"function";s:15:"reduce_rule_101";}s:7:"<COLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:26:"<hash_class_attrib_pseudo>";s:8:"function";s:15:"reduce_rule_101";}s:9:"<GREATER>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:26:"<hash_class_attrib_pseudo>";s:8:"function";s:15:"reduce_rule_101";}s:6:"<PLUS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:26:"<hash_class_attrib_pseudo>";s:8:"function";s:15:"reduce_rule_101";}s:6:"<HASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:26:"<hash_class_attrib_pseudo>";s:8:"function";s:15:"reduce_rule_101";}s:5:"<DOT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:26:"<hash_class_attrib_pseudo>";s:8:"function";s:15:"reduce_rule_101";}s:10:"<LBRACKET>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:26:"<hash_class_attrib_pseudo>";s:8:"function";s:15:"reduce_rule_101";}}i:39;a:9:{s:4:"<SS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:26:"<hash_class_attrib_pseudo>";s:8:"function";s:15:"reduce_rule_102";}s:7:"<COMMA>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:26:"<hash_class_attrib_pseudo>";s:8:"function";s:15:"reduce_rule_102";}s:8:"<LBRACE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:26:"<hash_class_attrib_pseudo>";s:8:"function";s:15:"reduce_rule_102";}s:7:"<COLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:26:"<hash_class_attrib_pseudo>";s:8:"function";s:15:"reduce_rule_102";}s:9:"<GREATER>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:26:"<hash_class_attrib_pseudo>";s:8:"function";s:15:"reduce_rule_102";}s:6:"<PLUS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:26:"<hash_class_attrib_pseudo>";s:8:"function";s:15:"reduce_rule_102";}s:6:"<HASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:26:"<hash_class_attrib_pseudo>";s:8:"function";s:15:"reduce_rule_102";}s:5:"<DOT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:26:"<hash_class_attrib_pseudo>";s:8:"function";s:15:"reduce_rule_102";}s:10:"<LBRACKET>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:26:"<hash_class_attrib_pseudo>";s:8:"function";s:15:"reduce_rule_102";}}i:43;a:1:{s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:2:"$C";}s:15:"leftNonTerminal";s:12:"<stylesheet>";s:8:"function";s:13:"reduce_rule_1";}}i:45;a:13:{s:4:"<SS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:16:"<s_cdo_cdc_plus>";s:8:"function";s:14:"reduce_rule_14";}s:5:"<CDO>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:16:"<s_cdo_cdc_plus>";s:8:"function";s:14:"reduce_rule_14";}s:5:"<CDC>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:16:"<s_cdo_cdc_plus>";s:8:"function";s:14:"reduce_rule_14";}s:12:"<IMPORT_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:16:"<s_cdo_cdc_plus>";s:8:"function";s:14:"reduce_rule_14";}s:11:"<MEDIA_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:16:"<s_cdo_cdc_plus>";s:8:"function";s:14:"reduce_rule_14";}s:7:"<IDENT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:16:"<s_cdo_cdc_plus>";s:8:"function";s:14:"reduce_rule_14";}s:10:"<PAGE_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:16:"<s_cdo_cdc_plus>";s:8:"function";s:14:"reduce_rule_14";}s:7:"<COLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:16:"<s_cdo_cdc_plus>";s:8:"function";s:14:"reduce_rule_14";}s:6:"<HASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:16:"<s_cdo_cdc_plus>";s:8:"function";s:14:"reduce_rule_14";}s:5:"<DOT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:16:"<s_cdo_cdc_plus>";s:8:"function";s:14:"reduce_rule_14";}s:6:"<STAR>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:16:"<s_cdo_cdc_plus>";s:8:"function";s:14:"reduce_rule_14";}s:10:"<LBRACKET>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:16:"<s_cdo_cdc_plus>";s:8:"function";s:14:"reduce_rule_14";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:16:"<s_cdo_cdc_plus>";s:8:"function";s:14:"reduce_rule_14";}}i:48;a:9:{s:11:"<MEDIA_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:2:"$C";}s:15:"leftNonTerminal";s:31:"<stylesheet_ruleset_media_page>";s:8:"function";s:14:"reduce_rule_27";}s:7:"<IDENT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:2:"$C";}s:15:"leftNonTerminal";s:31:"<stylesheet_ruleset_media_page>";s:8:"function";s:14:"reduce_rule_27";}s:10:"<PAGE_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:2:"$C";}s:15:"leftNonTerminal";s:31:"<stylesheet_ruleset_media_page>";s:8:"function";s:14:"reduce_rule_27";}s:7:"<COLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:2:"$C";}s:15:"leftNonTerminal";s:31:"<stylesheet_ruleset_media_page>";s:8:"function";s:14:"reduce_rule_27";}s:6:"<HASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:2:"$C";}s:15:"leftNonTerminal";s:31:"<stylesheet_ruleset_media_page>";s:8:"function";s:14:"reduce_rule_27";}s:5:"<DOT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:2:"$C";}s:15:"leftNonTerminal";s:31:"<stylesheet_ruleset_media_page>";s:8:"function";s:14:"reduce_rule_27";}s:6:"<STAR>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:2:"$C";}s:15:"leftNonTerminal";s:31:"<stylesheet_ruleset_media_page>";s:8:"function";s:14:"reduce_rule_27";}s:10:"<LBRACKET>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:2:"$C";}s:15:"leftNonTerminal";s:31:"<stylesheet_ruleset_media_page>";s:8:"function";s:14:"reduce_rule_27";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:2:"$C";}s:15:"leftNonTerminal";s:31:"<stylesheet_ruleset_media_page>";s:8:"function";s:14:"reduce_rule_27";}}i:49;a:9:{s:11:"<MEDIA_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:2:"$C";}s:15:"leftNonTerminal";s:31:"<stylesheet_ruleset_media_page>";s:8:"function";s:14:"reduce_rule_28";}s:7:"<IDENT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:2:"$C";}s:15:"leftNonTerminal";s:31:"<stylesheet_ruleset_media_page>";s:8:"function";s:14:"reduce_rule_28";}s:10:"<PAGE_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:2:"$C";}s:15:"leftNonTerminal";s:31:"<stylesheet_ruleset_media_page>";s:8:"function";s:14:"reduce_rule_28";}s:7:"<COLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:2:"$C";}s:15:"leftNonTerminal";s:31:"<stylesheet_ruleset_media_page>";s:8:"function";s:14:"reduce_rule_28";}s:6:"<HASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:2:"$C";}s:15:"leftNonTerminal";s:31:"<stylesheet_ruleset_media_page>";s:8:"function";s:14:"reduce_rule_28";}s:5:"<DOT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:2:"$C";}s:15:"leftNonTerminal";s:31:"<stylesheet_ruleset_media_page>";s:8:"function";s:14:"reduce_rule_28";}s:6:"<STAR>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:2:"$C";}s:15:"leftNonTerminal";s:31:"<stylesheet_ruleset_media_page>";s:8:"function";s:14:"reduce_rule_28";}s:10:"<LBRACKET>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:2:"$C";}s:15:"leftNonTerminal";s:31:"<stylesheet_ruleset_media_page>";s:8:"function";s:14:"reduce_rule_28";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:2:"$C";}s:15:"leftNonTerminal";s:31:"<stylesheet_ruleset_media_page>";s:8:"function";s:14:"reduce_rule_28";}}i:50;a:9:{s:11:"<MEDIA_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:2:"$C";}s:15:"leftNonTerminal";s:31:"<stylesheet_ruleset_media_page>";s:8:"function";s:14:"reduce_rule_29";}s:7:"<IDENT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:2:"$C";}s:15:"leftNonTerminal";s:31:"<stylesheet_ruleset_media_page>";s:8:"function";s:14:"reduce_rule_29";}s:10:"<PAGE_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:2:"$C";}s:15:"leftNonTerminal";s:31:"<stylesheet_ruleset_media_page>";s:8:"function";s:14:"reduce_rule_29";}s:7:"<COLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:2:"$C";}s:15:"leftNonTerminal";s:31:"<stylesheet_ruleset_media_page>";s:8:"function";s:14:"reduce_rule_29";}s:6:"<HASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:2:"$C";}s:15:"leftNonTerminal";s:31:"<stylesheet_ruleset_media_page>";s:8:"function";s:14:"reduce_rule_29";}s:5:"<DOT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:2:"$C";}s:15:"leftNonTerminal";s:31:"<stylesheet_ruleset_media_page>";s:8:"function";s:14:"reduce_rule_29";}s:6:"<STAR>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:2:"$C";}s:15:"leftNonTerminal";s:31:"<stylesheet_ruleset_media_page>";s:8:"function";s:14:"reduce_rule_29";}s:10:"<LBRACKET>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:2:"$C";}s:15:"leftNonTerminal";s:31:"<stylesheet_ruleset_media_page>";s:8:"function";s:14:"reduce_rule_29";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:2:"$C";}s:15:"leftNonTerminal";s:31:"<stylesheet_ruleset_media_page>";s:8:"function";s:14:"reduce_rule_29";}}i:54;a:1:{s:8:"<STRING>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:19:"<charset_sym_sstar>";s:8:"function";s:13:"reduce_rule_8";}}i:57;a:2:{s:11:"<SEMICOLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<string_or_uri_sstar>";s:8:"function";s:14:"reduce_rule_34";}s:7:"<IDENT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:21:"<string_or_uri_sstar>";s:8:"function";s:14:"reduce_rule_34";}}i:60;a:3:{s:11:"<SEMICOLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:11:"<medialist>";s:8:"function";s:14:"reduce_rule_37";}s:7:"<COMMA>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:11:"<medialist>";s:8:"function";s:14:"reduce_rule_37";}s:8:"<LBRACE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:11:"<medialist>";s:8:"function";s:14:"reduce_rule_37";}}i:62;a:2:{s:8:"<STRING>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:18:"<import_sym_sstar>";s:8:"function";s:14:"reduce_rule_33";}s:5:"<URI>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:18:"<import_sym_sstar>";s:8:"function";s:14:"reduce_rule_33";}}i:66;a:1:{s:7:"<IDENT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:17:"<media_sym_sstar>";s:8:"function";s:14:"reduce_rule_49";}}i:70;a:2:{s:8:"<LBRACE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:15:"<pagesym_sstar>";s:8:"function";s:14:"reduce_rule_62";}s:7:"<COLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:15:"<pagesym_sstar>";s:8:"function";s:14:"reduce_rule_62";}}i:74;a:6:{s:7:"<IDENT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:12:"<combinator>";s:8:"function";s:14:"reduce_rule_76";}s:7:"<COLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:12:"<combinator>";s:8:"function";s:14:"reduce_rule_76";}s:6:"<HASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:12:"<combinator>";s:8:"function";s:14:"reduce_rule_76";}s:5:"<DOT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:12:"<combinator>";s:8:"function";s:14:"reduce_rule_76";}s:6:"<STAR>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:12:"<combinator>";s:8:"function";s:14:"reduce_rule_76";}s:10:"<LBRACKET>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:12:"<combinator>";s:8:"function";s:14:"reduce_rule_76";}}i:76;a:9:{s:4:"<SS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:2:"$C";}s:15:"leftNonTerminal";s:31:"<hash_class_attrib_pseudo_plus>";s:8:"function";s:14:"reduce_rule_98";}s:7:"<COMMA>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:2:"$C";}s:15:"leftNonTerminal";s:31:"<hash_class_attrib_pseudo_plus>";s:8:"function";s:14:"reduce_rule_98";}s:8:"<LBRACE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:2:"$C";}s:15:"leftNonTerminal";s:31:"<hash_class_attrib_pseudo_plus>";s:8:"function";s:14:"reduce_rule_98";}s:7:"<COLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:2:"$C";}s:15:"leftNonTerminal";s:31:"<hash_class_attrib_pseudo_plus>";s:8:"function";s:14:"reduce_rule_98";}s:9:"<GREATER>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:2:"$C";}s:15:"leftNonTerminal";s:31:"<hash_class_attrib_pseudo_plus>";s:8:"function";s:14:"reduce_rule_98";}s:6:"<PLUS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:2:"$C";}s:15:"leftNonTerminal";s:31:"<hash_class_attrib_pseudo_plus>";s:8:"function";s:14:"reduce_rule_98";}s:6:"<HASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:2:"$C";}s:15:"leftNonTerminal";s:31:"<hash_class_attrib_pseudo_plus>";s:8:"function";s:14:"reduce_rule_98";}s:5:"<DOT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:2:"$C";}s:15:"leftNonTerminal";s:31:"<hash_class_attrib_pseudo_plus>";s:8:"function";s:14:"reduce_rule_98";}s:10:"<LBRACKET>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:2:"$C";}s:15:"leftNonTerminal";s:31:"<hash_class_attrib_pseudo_plus>";s:8:"function";s:14:"reduce_rule_98";}}i:77;a:9:{s:4:"<SS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:2:"$B";}s:15:"leftNonTerminal";s:7:"<class>";s:8:"function";s:15:"reduce_rule_103";}s:7:"<COMMA>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:2:"$B";}s:15:"leftNonTerminal";s:7:"<class>";s:8:"function";s:15:"reduce_rule_103";}s:8:"<LBRACE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:2:"$B";}s:15:"leftNonTerminal";s:7:"<class>";s:8:"function";s:15:"reduce_rule_103";}s:7:"<COLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:2:"$B";}s:15:"leftNonTerminal";s:7:"<class>";s:8:"function";s:15:"reduce_rule_103";}s:9:"<GREATER>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:2:"$B";}s:15:"leftNonTerminal";s:7:"<class>";s:8:"function";s:15:"reduce_rule_103";}s:6:"<PLUS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:2:"$B";}s:15:"leftNonTerminal";s:7:"<class>";s:8:"function";s:15:"reduce_rule_103";}s:6:"<HASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:2:"$B";}s:15:"leftNonTerminal";s:7:"<class>";s:8:"function";s:15:"reduce_rule_103";}s:5:"<DOT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:2:"$B";}s:15:"leftNonTerminal";s:7:"<class>";s:8:"function";s:15:"reduce_rule_103";}s:10:"<LBRACKET>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:2:"$B";}s:15:"leftNonTerminal";s:7:"<class>";s:8:"function";s:15:"reduce_rule_103";}}i:81;a:9:{s:4:"<SS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:2:"$B";}s:15:"leftNonTerminal";s:8:"<pseudo>";s:8:"function";s:15:"reduce_rule_122";}s:7:"<COMMA>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:2:"$B";}s:15:"leftNonTerminal";s:8:"<pseudo>";s:8:"function";s:15:"reduce_rule_122";}s:8:"<LBRACE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:2:"$B";}s:15:"leftNonTerminal";s:8:"<pseudo>";s:8:"function";s:15:"reduce_rule_122";}s:7:"<COLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:2:"$B";}s:15:"leftNonTerminal";s:8:"<pseudo>";s:8:"function";s:15:"reduce_rule_122";}s:9:"<GREATER>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:2:"$B";}s:15:"leftNonTerminal";s:8:"<pseudo>";s:8:"function";s:15:"reduce_rule_122";}s:6:"<PLUS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:2:"$B";}s:15:"leftNonTerminal";s:8:"<pseudo>";s:8:"function";s:15:"reduce_rule_122";}s:6:"<HASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:2:"$B";}s:15:"leftNonTerminal";s:8:"<pseudo>";s:8:"function";s:15:"reduce_rule_122";}s:5:"<DOT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:2:"$B";}s:15:"leftNonTerminal";s:8:"<pseudo>";s:8:"function";s:15:"reduce_rule_122";}s:10:"<LBRACKET>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:2:"$B";}s:15:"leftNonTerminal";s:8:"<pseudo>";s:8:"function";s:15:"reduce_rule_122";}}i:84;a:3:{s:4:"<SS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";}s:15:"leftNonTerminal";s:20:"<stylesheet_charset>";s:8:"function";s:13:"reduce_rule_6";}s:5:"<CDO>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";}s:15:"leftNonTerminal";s:20:"<stylesheet_charset>";s:8:"function";s:13:"reduce_rule_6";}s:5:"<CDC>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";}s:15:"leftNonTerminal";s:20:"<stylesheet_charset>";s:8:"function";s:13:"reduce_rule_6";}}i:85;a:2:{s:11:"<SEMICOLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:14:"<string_sstar>";s:8:"function";s:14:"reduce_rule_12";}s:7:"<IDENT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:14:"<string_sstar>";s:8:"function";s:14:"reduce_rule_12";}}i:86;a:34:{s:11:"<SEMICOLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:7:"<splus>";s:8:"function";s:14:"reduce_rule_10";}s:8:"<STRING>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:7:"<splus>";s:8:"function";s:14:"reduce_rule_10";}s:5:"<URI>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:7:"<splus>";s:8:"function";s:14:"reduce_rule_10";}s:7:"<COMMA>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:7:"<splus>";s:8:"function";s:14:"reduce_rule_10";}s:8:"<LBRACE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:7:"<splus>";s:8:"function";s:14:"reduce_rule_10";}s:8:"<RBRACE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:7:"<splus>";s:8:"function";s:14:"reduce_rule_10";}s:11:"<MEDIA_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:7:"<splus>";s:8:"function";s:14:"reduce_rule_10";}s:7:"<IDENT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:7:"<splus>";s:8:"function";s:14:"reduce_rule_10";}s:10:"<PAGE_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:7:"<splus>";s:8:"function";s:14:"reduce_rule_10";}s:7:"<COLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:7:"<splus>";s:8:"function";s:14:"reduce_rule_10";}s:7:"<SLASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:7:"<splus>";s:8:"function";s:14:"reduce_rule_10";}s:6:"<PLUS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:7:"<splus>";s:8:"function";s:14:"reduce_rule_10";}s:7:"<MINUS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:7:"<splus>";s:8:"function";s:14:"reduce_rule_10";}s:6:"<HASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:7:"<splus>";s:8:"function";s:14:"reduce_rule_10";}s:5:"<DOT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:7:"<splus>";s:8:"function";s:14:"reduce_rule_10";}s:6:"<STAR>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:7:"<splus>";s:8:"function";s:14:"reduce_rule_10";}s:10:"<LBRACKET>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:7:"<splus>";s:8:"function";s:14:"reduce_rule_10";}s:10:"<RBRACKET>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:7:"<splus>";s:8:"function";s:14:"reduce_rule_10";}s:10:"<INCLUDES>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:7:"<splus>";s:8:"function";s:14:"reduce_rule_10";}s:11:"<DASHMATCH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:7:"<splus>";s:8:"function";s:14:"reduce_rule_10";}s:7:"<EQUAL>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:7:"<splus>";s:8:"function";s:14:"reduce_rule_10";}s:13:"<CSSFUNCTION>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:7:"<splus>";s:8:"function";s:14:"reduce_rule_10";}s:8:"<RPAREN>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:7:"<splus>";s:8:"function";s:14:"reduce_rule_10";}s:15:"<IMPORTANT_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:7:"<splus>";s:8:"function";s:14:"reduce_rule_10";}s:8:"<NUMBER>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:7:"<splus>";s:8:"function";s:14:"reduce_rule_10";}s:12:"<PERCENTAGE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:7:"<splus>";s:8:"function";s:14:"reduce_rule_10";}s:8:"<LENGTH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:7:"<splus>";s:8:"function";s:14:"reduce_rule_10";}s:5:"<EMS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:7:"<splus>";s:8:"function";s:14:"reduce_rule_10";}s:5:"<EXS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:7:"<splus>";s:8:"function";s:14:"reduce_rule_10";}s:7:"<ANGLE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:7:"<splus>";s:8:"function";s:14:"reduce_rule_10";}s:6:"<TIME>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:7:"<splus>";s:8:"function";s:14:"reduce_rule_10";}s:6:"<FREQ>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:7:"<splus>";s:8:"function";s:14:"reduce_rule_10";}s:11:"<DIMENSION>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:7:"<splus>";s:8:"function";s:14:"reduce_rule_10";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:7:"<splus>";s:8:"function";s:14:"reduce_rule_10";}}i:87;a:12:{s:4:"<SS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";}s:15:"leftNonTerminal";s:8:"<import>";s:8:"function";s:14:"reduce_rule_30";}s:5:"<CDO>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";}s:15:"leftNonTerminal";s:8:"<import>";s:8:"function";s:14:"reduce_rule_30";}s:5:"<CDC>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";}s:15:"leftNonTerminal";s:8:"<import>";s:8:"function";s:14:"reduce_rule_30";}s:12:"<IMPORT_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";}s:15:"leftNonTerminal";s:8:"<import>";s:8:"function";s:14:"reduce_rule_30";}s:11:"<MEDIA_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";}s:15:"leftNonTerminal";s:8:"<import>";s:8:"function";s:14:"reduce_rule_30";}s:7:"<IDENT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";}s:15:"leftNonTerminal";s:8:"<import>";s:8:"function";s:14:"reduce_rule_30";}s:10:"<PAGE_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";}s:15:"leftNonTerminal";s:8:"<import>";s:8:"function";s:14:"reduce_rule_30";}s:7:"<COLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";}s:15:"leftNonTerminal";s:8:"<import>";s:8:"function";s:14:"reduce_rule_30";}s:6:"<HASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";}s:15:"leftNonTerminal";s:8:"<import>";s:8:"function";s:14:"reduce_rule_30";}s:5:"<DOT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";}s:15:"leftNonTerminal";s:8:"<import>";s:8:"function";s:14:"reduce_rule_30";}s:6:"<STAR>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";}s:15:"leftNonTerminal";s:8:"<import>";s:8:"function";s:14:"reduce_rule_30";}s:10:"<LBRACKET>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";}s:15:"leftNonTerminal";s:8:"<import>";s:8:"function";s:14:"reduce_rule_30";}}i:89;a:2:{s:11:"<SEMICOLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<string_or_uri_sstar>";s:8:"function";s:14:"reduce_rule_35";}s:7:"<IDENT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<string_or_uri_sstar>";s:8:"function";s:14:"reduce_rule_35";}}i:92;a:3:{s:11:"<SEMICOLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:8:"<medium>";s:8:"function";s:14:"reduce_rule_53";}s:7:"<COMMA>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:8:"<medium>";s:8:"function";s:14:"reduce_rule_53";}s:8:"<LBRACE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:8:"<medium>";s:8:"function";s:14:"reduce_rule_53";}}i:97;a:2:{s:11:"<SEMICOLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:14:"<declarations>";s:8:"function";s:14:"reduce_rule_65";}s:8:"<RBRACE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:14:"<declarations>";s:8:"function";s:14:"reduce_rule_65";}}i:98;a:2:{s:11:"<SEMICOLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:19:"<sstar_declaration>";s:8:"function";s:14:"reduce_rule_67";}s:8:"<RBRACE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:19:"<sstar_declaration>";s:8:"function";s:14:"reduce_rule_67";}}i:99;a:2:{s:11:"<SEMICOLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:13:"<declaration>";s:8:"function";s:15:"reduce_rule_126";}s:8:"<RBRACE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:13:"<declaration>";s:8:"function";s:15:"reduce_rule_126";}}i:102;a:2:{s:7:"<COMMA>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:2:"$C";}s:15:"leftNonTerminal";s:11:"<selectors>";s:8:"function";s:14:"reduce_rule_85";}s:8:"<LBRACE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:2:"$C";}s:15:"leftNonTerminal";s:11:"<selectors>";s:8:"function";s:14:"reduce_rule_85";}}i:103;a:6:{s:7:"<IDENT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:13:"<comma_sstar>";s:8:"function";s:14:"reduce_rule_87";}s:7:"<COLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:13:"<comma_sstar>";s:8:"function";s:14:"reduce_rule_87";}s:6:"<HASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:13:"<comma_sstar>";s:8:"function";s:14:"reduce_rule_87";}s:5:"<DOT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:13:"<comma_sstar>";s:8:"function";s:14:"reduce_rule_87";}s:6:"<STAR>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:13:"<comma_sstar>";s:8:"function";s:14:"reduce_rule_87";}s:10:"<LBRACKET>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:13:"<comma_sstar>";s:8:"function";s:14:"reduce_rule_87";}}i:108;a:2:{s:4:"<SS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:2:"$C";}s:15:"leftNonTerminal";s:13:"<pseudo_page>";s:8:"function";s:14:"reduce_rule_69";}s:8:"<LBRACE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:2:"$C";}s:15:"leftNonTerminal";s:13:"<pseudo_page>";s:8:"function";s:14:"reduce_rule_69";}}i:109;a:2:{s:7:"<COMMA>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:2:"$B";i:1;s:2:"$C";i:2;s:2:"$D";}s:15:"leftNonTerminal";s:10:"<selector>";s:8:"function";s:14:"reduce_rule_93";}s:8:"<LBRACE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:2:"$B";i:1;s:2:"$C";i:2;s:2:"$D";}s:15:"leftNonTerminal";s:10:"<selector>";s:8:"function";s:14:"reduce_rule_93";}}i:110;a:6:{s:7:"<IDENT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:12:"<combinator>";s:8:"function";s:14:"reduce_rule_74";}s:7:"<COLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:12:"<combinator>";s:8:"function";s:14:"reduce_rule_74";}s:6:"<HASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:12:"<combinator>";s:8:"function";s:14:"reduce_rule_74";}s:5:"<DOT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:12:"<combinator>";s:8:"function";s:14:"reduce_rule_74";}s:6:"<STAR>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:12:"<combinator>";s:8:"function";s:14:"reduce_rule_74";}s:10:"<LBRACKET>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:12:"<combinator>";s:8:"function";s:14:"reduce_rule_74";}}i:111;a:6:{s:7:"<IDENT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:12:"<combinator>";s:8:"function";s:14:"reduce_rule_75";}s:7:"<COLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:12:"<combinator>";s:8:"function";s:14:"reduce_rule_75";}s:6:"<HASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:12:"<combinator>";s:8:"function";s:14:"reduce_rule_75";}s:5:"<DOT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:12:"<combinator>";s:8:"function";s:14:"reduce_rule_75";}s:6:"<STAR>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:12:"<combinator>";s:8:"function";s:14:"reduce_rule_75";}s:10:"<LBRACKET>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:12:"<combinator>";s:8:"function";s:14:"reduce_rule_75";}}i:112;a:9:{s:4:"<SS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";}s:15:"leftNonTerminal";s:8:"<attrib>";s:8:"function";s:15:"reduce_rule_106";}s:7:"<COMMA>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";}s:15:"leftNonTerminal";s:8:"<attrib>";s:8:"function";s:15:"reduce_rule_106";}s:8:"<LBRACE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";}s:15:"leftNonTerminal";s:8:"<attrib>";s:8:"function";s:15:"reduce_rule_106";}s:7:"<COLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";}s:15:"leftNonTerminal";s:8:"<attrib>";s:8:"function";s:15:"reduce_rule_106";}s:9:"<GREATER>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";}s:15:"leftNonTerminal";s:8:"<attrib>";s:8:"function";s:15:"reduce_rule_106";}s:6:"<PLUS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";}s:15:"leftNonTerminal";s:8:"<attrib>";s:8:"function";s:15:"reduce_rule_106";}s:6:"<HASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";}s:15:"leftNonTerminal";s:8:"<attrib>";s:8:"function";s:15:"reduce_rule_106";}s:5:"<DOT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";}s:15:"leftNonTerminal";s:8:"<attrib>";s:8:"function";s:15:"reduce_rule_106";}s:10:"<LBRACKET>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";}s:15:"leftNonTerminal";s:8:"<attrib>";s:8:"function";s:15:"reduce_rule_106";}}i:115;a:4:{s:4:"<SS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<attrib_operator>";s:8:"function";s:15:"reduce_rule_115";}s:8:"<STRING>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<attrib_operator>";s:8:"function";s:15:"reduce_rule_115";}s:7:"<IDENT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<attrib_operator>";s:8:"function";s:15:"reduce_rule_115";}s:10:"<RBRACKET>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<attrib_operator>";s:8:"function";s:15:"reduce_rule_115";}}i:116;a:4:{s:4:"<SS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<attrib_operator>";s:8:"function";s:15:"reduce_rule_116";}s:8:"<STRING>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<attrib_operator>";s:8:"function";s:15:"reduce_rule_116";}s:7:"<IDENT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<attrib_operator>";s:8:"function";s:15:"reduce_rule_116";}s:10:"<RBRACKET>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<attrib_operator>";s:8:"function";s:15:"reduce_rule_116";}}i:117;a:4:{s:4:"<SS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<attrib_operator>";s:8:"function";s:15:"reduce_rule_117";}s:8:"<STRING>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<attrib_operator>";s:8:"function";s:15:"reduce_rule_117";}s:7:"<IDENT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<attrib_operator>";s:8:"function";s:15:"reduce_rule_117";}s:10:"<RBRACKET>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<attrib_operator>";s:8:"function";s:15:"reduce_rule_117";}}i:118;a:5:{s:10:"<RBRACKET>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:15:"<trimmed_ident>";s:8:"function";s:15:"reduce_rule_111";}s:10:"<INCLUDES>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:15:"<trimmed_ident>";s:8:"function";s:15:"reduce_rule_111";}s:11:"<DASHMATCH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:15:"<trimmed_ident>";s:8:"function";s:15:"reduce_rule_111";}s:7:"<EQUAL>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:15:"<trimmed_ident>";s:8:"function";s:15:"reduce_rule_111";}s:8:"<RPAREN>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:15:"<trimmed_ident>";s:8:"function";s:15:"reduce_rule_111";}}i:122;a:9:{s:4:"<SS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";}s:15:"leftNonTerminal";s:8:"<pseudo>";s:8:"function";s:15:"reduce_rule_125";}s:7:"<COMMA>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";}s:15:"leftNonTerminal";s:8:"<pseudo>";s:8:"function";s:15:"reduce_rule_125";}s:8:"<LBRACE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";}s:15:"leftNonTerminal";s:8:"<pseudo>";s:8:"function";s:15:"reduce_rule_125";}s:7:"<COLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";}s:15:"leftNonTerminal";s:8:"<pseudo>";s:8:"function";s:15:"reduce_rule_125";}s:9:"<GREATER>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";}s:15:"leftNonTerminal";s:8:"<pseudo>";s:8:"function";s:15:"reduce_rule_125";}s:6:"<PLUS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";}s:15:"leftNonTerminal";s:8:"<pseudo>";s:8:"function";s:15:"reduce_rule_125";}s:6:"<HASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";}s:15:"leftNonTerminal";s:8:"<pseudo>";s:8:"function";s:15:"reduce_rule_125";}s:5:"<DOT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";}s:15:"leftNonTerminal";s:8:"<pseudo>";s:8:"function";s:15:"reduce_rule_125";}s:10:"<LBRACKET>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";}s:15:"leftNonTerminal";s:8:"<pseudo>";s:8:"function";s:15:"reduce_rule_125";}}i:123;a:12:{s:4:"<SS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:2:"$C";i:3;s:0:"";}s:15:"leftNonTerminal";s:8:"<import>";s:8:"function";s:14:"reduce_rule_31";}s:5:"<CDO>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:2:"$C";i:3;s:0:"";}s:15:"leftNonTerminal";s:8:"<import>";s:8:"function";s:14:"reduce_rule_31";}s:5:"<CDC>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:2:"$C";i:3;s:0:"";}s:15:"leftNonTerminal";s:8:"<import>";s:8:"function";s:14:"reduce_rule_31";}s:12:"<IMPORT_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:2:"$C";i:3;s:0:"";}s:15:"leftNonTerminal";s:8:"<import>";s:8:"function";s:14:"reduce_rule_31";}s:11:"<MEDIA_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:2:"$C";i:3;s:0:"";}s:15:"leftNonTerminal";s:8:"<import>";s:8:"function";s:14:"reduce_rule_31";}s:7:"<IDENT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:2:"$C";i:3;s:0:"";}s:15:"leftNonTerminal";s:8:"<import>";s:8:"function";s:14:"reduce_rule_31";}s:10:"<PAGE_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:2:"$C";i:3;s:0:"";}s:15:"leftNonTerminal";s:8:"<import>";s:8:"function";s:14:"reduce_rule_31";}s:7:"<COLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:2:"$C";i:3;s:0:"";}s:15:"leftNonTerminal";s:8:"<import>";s:8:"function";s:14:"reduce_rule_31";}s:6:"<HASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:2:"$C";i:3;s:0:"";}s:15:"leftNonTerminal";s:8:"<import>";s:8:"function";s:14:"reduce_rule_31";}s:5:"<DOT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:2:"$C";i:3;s:0:"";}s:15:"leftNonTerminal";s:8:"<import>";s:8:"function";s:14:"reduce_rule_31";}s:6:"<STAR>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:2:"$C";i:3;s:0:"";}s:15:"leftNonTerminal";s:8:"<import>";s:8:"function";s:14:"reduce_rule_31";}s:10:"<LBRACKET>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:2:"$C";i:3;s:0:"";}s:15:"leftNonTerminal";s:8:"<import>";s:8:"function";s:14:"reduce_rule_31";}}i:127;a:7:{s:8:"<RBRACE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:13:"<rulesetplus>";s:8:"function";s:14:"reduce_rule_50";}s:7:"<IDENT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:13:"<rulesetplus>";s:8:"function";s:14:"reduce_rule_50";}s:7:"<COLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:13:"<rulesetplus>";s:8:"function";s:14:"reduce_rule_50";}s:6:"<HASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:13:"<rulesetplus>";s:8:"function";s:14:"reduce_rule_50";}s:5:"<DOT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:13:"<rulesetplus>";s:8:"function";s:14:"reduce_rule_50";}s:6:"<STAR>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:13:"<rulesetplus>";s:8:"function";s:14:"reduce_rule_50";}s:10:"<LBRACKET>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:13:"<rulesetplus>";s:8:"function";s:14:"reduce_rule_50";}}i:128;a:3:{s:11:"<SEMICOLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:2:"$C";}s:15:"leftNonTerminal";s:11:"<medialist>";s:8:"function";s:14:"reduce_rule_38";}s:7:"<COMMA>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:2:"$C";}s:15:"leftNonTerminal";s:11:"<medialist>";s:8:"function";s:14:"reduce_rule_38";}s:8:"<LBRACE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:2:"$C";}s:15:"leftNonTerminal";s:11:"<medialist>";s:8:"function";s:14:"reduce_rule_38";}}i:131;a:10:{s:8:"<RBRACE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";}s:15:"leftNonTerminal";s:10:"<rruleset>";s:8:"function";s:14:"reduce_rule_90";}s:11:"<MEDIA_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";}s:15:"leftNonTerminal";s:10:"<rruleset>";s:8:"function";s:14:"reduce_rule_90";}s:7:"<IDENT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";}s:15:"leftNonTerminal";s:10:"<rruleset>";s:8:"function";s:14:"reduce_rule_90";}s:10:"<PAGE_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";}s:15:"leftNonTerminal";s:10:"<rruleset>";s:8:"function";s:14:"reduce_rule_90";}s:7:"<COLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";}s:15:"leftNonTerminal";s:10:"<rruleset>";s:8:"function";s:14:"reduce_rule_90";}s:6:"<HASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";}s:15:"leftNonTerminal";s:10:"<rruleset>";s:8:"function";s:14:"reduce_rule_90";}s:5:"<DOT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";}s:15:"leftNonTerminal";s:10:"<rruleset>";s:8:"function";s:14:"reduce_rule_90";}s:6:"<STAR>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";}s:15:"leftNonTerminal";s:10:"<rruleset>";s:8:"function";s:14:"reduce_rule_90";}s:10:"<LBRACKET>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";}s:15:"leftNonTerminal";s:10:"<rruleset>";s:8:"function";s:14:"reduce_rule_90";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";}s:15:"leftNonTerminal";s:10:"<rruleset>";s:8:"function";s:14:"reduce_rule_90";}}i:133;a:2:{s:11:"<SEMICOLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:2:"$B";}s:15:"leftNonTerminal";s:19:"<sstar_declaration>";s:8:"function";s:14:"reduce_rule_68";}s:8:"<RBRACE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:2:"$B";}s:15:"leftNonTerminal";s:19:"<sstar_declaration>";s:8:"function";s:14:"reduce_rule_68";}}i:136;a:1:{s:7:"<COLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:10:"<property>";s:8:"function";s:14:"reduce_rule_80";}}i:141;a:9:{s:4:"<SS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:2:"$C";i:3;s:0:"";}s:15:"leftNonTerminal";s:8:"<attrib>";s:8:"function";s:15:"reduce_rule_108";}s:7:"<COMMA>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:2:"$C";i:3;s:0:"";}s:15:"leftNonTerminal";s:8:"<attrib>";s:8:"function";s:15:"reduce_rule_108";}s:8:"<LBRACE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:2:"$C";i:3;s:0:"";}s:15:"leftNonTerminal";s:8:"<attrib>";s:8:"function";s:15:"reduce_rule_108";}s:7:"<COLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:2:"$C";i:3;s:0:"";}s:15:"leftNonTerminal";s:8:"<attrib>";s:8:"function";s:15:"reduce_rule_108";}s:9:"<GREATER>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:2:"$C";i:3;s:0:"";}s:15:"leftNonTerminal";s:8:"<attrib>";s:8:"function";s:15:"reduce_rule_108";}s:6:"<PLUS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:2:"$C";i:3;s:0:"";}s:15:"leftNonTerminal";s:8:"<attrib>";s:8:"function";s:15:"reduce_rule_108";}s:6:"<HASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:2:"$C";i:3;s:0:"";}s:15:"leftNonTerminal";s:8:"<attrib>";s:8:"function";s:15:"reduce_rule_108";}s:5:"<DOT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:2:"$C";i:3;s:0:"";}s:15:"leftNonTerminal";s:8:"<attrib>";s:8:"function";s:15:"reduce_rule_108";}s:10:"<LBRACKET>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:2:"$C";i:3;s:0:"";}s:15:"leftNonTerminal";s:8:"<attrib>";s:8:"function";s:15:"reduce_rule_108";}}i:143;a:2:{s:4:"<SS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:23:"<attrib_operator_rhand>";s:8:"function";s:15:"reduce_rule_120";}s:10:"<RBRACKET>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:23:"<attrib_operator_rhand>";s:8:"function";s:15:"reduce_rule_120";}}i:144;a:2:{s:4:"<SS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:23:"<attrib_operator_rhand>";s:8:"function";s:15:"reduce_rule_121";}s:10:"<RBRACKET>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:23:"<attrib_operator_rhand>";s:8:"function";s:15:"reduce_rule_121";}}i:145;a:3:{s:8:"<STRING>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:23:"<attrib_operator_sstar>";s:8:"function";s:15:"reduce_rule_114";}s:7:"<IDENT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:23:"<attrib_operator_sstar>";s:8:"function";s:15:"reduce_rule_114";}s:10:"<RBRACKET>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:23:"<attrib_operator_sstar>";s:8:"function";s:15:"reduce_rule_114";}}i:146;a:5:{s:10:"<RBRACKET>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";}s:15:"leftNonTerminal";s:15:"<trimmed_ident>";s:8:"function";s:15:"reduce_rule_112";}s:10:"<INCLUDES>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";}s:15:"leftNonTerminal";s:15:"<trimmed_ident>";s:8:"function";s:15:"reduce_rule_112";}s:11:"<DASHMATCH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";}s:15:"leftNonTerminal";s:15:"<trimmed_ident>";s:8:"function";s:15:"reduce_rule_112";}s:7:"<EQUAL>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";}s:15:"leftNonTerminal";s:15:"<trimmed_ident>";s:8:"function";s:15:"reduce_rule_112";}s:8:"<RPAREN>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";}s:15:"leftNonTerminal";s:15:"<trimmed_ident>";s:8:"function";s:15:"reduce_rule_112";}}i:147;a:9:{s:4:"<SS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:2:"$C";i:3;s:0:"";}s:15:"leftNonTerminal";s:8:"<pseudo>";s:8:"function";s:15:"reduce_rule_123";}s:7:"<COMMA>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:2:"$C";i:3;s:0:"";}s:15:"leftNonTerminal";s:8:"<pseudo>";s:8:"function";s:15:"reduce_rule_123";}s:8:"<LBRACE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:2:"$C";i:3;s:0:"";}s:15:"leftNonTerminal";s:8:"<pseudo>";s:8:"function";s:15:"reduce_rule_123";}s:7:"<COLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:2:"$C";i:3;s:0:"";}s:15:"leftNonTerminal";s:8:"<pseudo>";s:8:"function";s:15:"reduce_rule_123";}s:9:"<GREATER>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:2:"$C";i:3;s:0:"";}s:15:"leftNonTerminal";s:8:"<pseudo>";s:8:"function";s:15:"reduce_rule_123";}s:6:"<PLUS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:2:"$C";i:3;s:0:"";}s:15:"leftNonTerminal";s:8:"<pseudo>";s:8:"function";s:15:"reduce_rule_123";}s:6:"<HASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:2:"$C";i:3;s:0:"";}s:15:"leftNonTerminal";s:8:"<pseudo>";s:8:"function";s:15:"reduce_rule_123";}s:5:"<DOT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:2:"$C";i:3;s:0:"";}s:15:"leftNonTerminal";s:8:"<pseudo>";s:8:"function";s:15:"reduce_rule_123";}s:10:"<LBRACKET>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:2:"$C";i:3;s:0:"";}s:15:"leftNonTerminal";s:8:"<pseudo>";s:8:"function";s:15:"reduce_rule_123";}}i:148;a:9:{s:4:"<SS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:0:"";}s:15:"leftNonTerminal";s:8:"<pseudo>";s:8:"function";s:15:"reduce_rule_124";}s:7:"<COMMA>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:0:"";}s:15:"leftNonTerminal";s:8:"<pseudo>";s:8:"function";s:15:"reduce_rule_124";}s:8:"<LBRACE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:0:"";}s:15:"leftNonTerminal";s:8:"<pseudo>";s:8:"function";s:15:"reduce_rule_124";}s:7:"<COLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:0:"";}s:15:"leftNonTerminal";s:8:"<pseudo>";s:8:"function";s:15:"reduce_rule_124";}s:9:"<GREATER>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:0:"";}s:15:"leftNonTerminal";s:8:"<pseudo>";s:8:"function";s:15:"reduce_rule_124";}s:6:"<PLUS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:0:"";}s:15:"leftNonTerminal";s:8:"<pseudo>";s:8:"function";s:15:"reduce_rule_124";}s:6:"<HASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:0:"";}s:15:"leftNonTerminal";s:8:"<pseudo>";s:8:"function";s:15:"reduce_rule_124";}s:5:"<DOT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:0:"";}s:15:"leftNonTerminal";s:8:"<pseudo>";s:8:"function";s:15:"reduce_rule_124";}s:10:"<LBRACKET>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:0:"";}s:15:"leftNonTerminal";s:8:"<pseudo>";s:8:"function";s:15:"reduce_rule_124";}}i:152;a:7:{s:8:"<RBRACE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:2:"$C";}s:15:"leftNonTerminal";s:13:"<rulesetplus>";s:8:"function";s:14:"reduce_rule_51";}s:7:"<IDENT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:2:"$C";}s:15:"leftNonTerminal";s:13:"<rulesetplus>";s:8:"function";s:14:"reduce_rule_51";}s:7:"<COLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:2:"$C";}s:15:"leftNonTerminal";s:13:"<rulesetplus>";s:8:"function";s:14:"reduce_rule_51";}s:6:"<HASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:2:"$C";}s:15:"leftNonTerminal";s:13:"<rulesetplus>";s:8:"function";s:14:"reduce_rule_51";}s:5:"<DOT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:2:"$C";}s:15:"leftNonTerminal";s:13:"<rulesetplus>";s:8:"function";s:14:"reduce_rule_51";}s:6:"<STAR>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:2:"$C";}s:15:"leftNonTerminal";s:13:"<rulesetplus>";s:8:"function";s:14:"reduce_rule_51";}s:10:"<LBRACKET>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:2:"$C";}s:15:"leftNonTerminal";s:13:"<rulesetplus>";s:8:"function";s:14:"reduce_rule_51";}}i:153;a:9:{s:11:"<MEDIA_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";}s:15:"leftNonTerminal";s:7:"<media>";s:8:"function";s:14:"reduce_rule_47";}s:7:"<IDENT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";}s:15:"leftNonTerminal";s:7:"<media>";s:8:"function";s:14:"reduce_rule_47";}s:10:"<PAGE_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";}s:15:"leftNonTerminal";s:7:"<media>";s:8:"function";s:14:"reduce_rule_47";}s:7:"<COLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";}s:15:"leftNonTerminal";s:7:"<media>";s:8:"function";s:14:"reduce_rule_47";}s:6:"<HASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";}s:15:"leftNonTerminal";s:7:"<media>";s:8:"function";s:14:"reduce_rule_47";}s:5:"<DOT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";}s:15:"leftNonTerminal";s:7:"<media>";s:8:"function";s:14:"reduce_rule_47";}s:6:"<STAR>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";}s:15:"leftNonTerminal";s:7:"<media>";s:8:"function";s:14:"reduce_rule_47";}s:10:"<LBRACKET>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";}s:15:"leftNonTerminal";s:7:"<media>";s:8:"function";s:14:"reduce_rule_47";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";}s:15:"leftNonTerminal";s:7:"<media>";s:8:"function";s:14:"reduce_rule_47";}}i:154;a:3:{s:11:"<SEMICOLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:0:"";i:3;s:2:"$C";}s:15:"leftNonTerminal";s:11:"<medialist>";s:8:"function";s:14:"reduce_rule_39";}s:7:"<COMMA>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:0:"";i:3;s:2:"$C";}s:15:"leftNonTerminal";s:11:"<medialist>";s:8:"function";s:14:"reduce_rule_39";}s:8:"<LBRACE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:0:"";i:3;s:2:"$C";}s:15:"leftNonTerminal";s:11:"<medialist>";s:8:"function";s:14:"reduce_rule_39";}}i:155;a:10:{s:8:"<RBRACE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:2:"$C";i:3;s:0:"";i:4;s:0:"";}s:15:"leftNonTerminal";s:10:"<rruleset>";s:8:"function";s:14:"reduce_rule_82";}s:11:"<MEDIA_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:2:"$C";i:3;s:0:"";i:4;s:0:"";}s:15:"leftNonTerminal";s:10:"<rruleset>";s:8:"function";s:14:"reduce_rule_82";}s:7:"<IDENT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:2:"$C";i:3;s:0:"";i:4;s:0:"";}s:15:"leftNonTerminal";s:10:"<rruleset>";s:8:"function";s:14:"reduce_rule_82";}s:10:"<PAGE_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:2:"$C";i:3;s:0:"";i:4;s:0:"";}s:15:"leftNonTerminal";s:10:"<rruleset>";s:8:"function";s:14:"reduce_rule_82";}s:7:"<COLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:2:"$C";i:3;s:0:"";i:4;s:0:"";}s:15:"leftNonTerminal";s:10:"<rruleset>";s:8:"function";s:14:"reduce_rule_82";}s:6:"<HASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:2:"$C";i:3;s:0:"";i:4;s:0:"";}s:15:"leftNonTerminal";s:10:"<rruleset>";s:8:"function";s:14:"reduce_rule_82";}s:5:"<DOT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:2:"$C";i:3;s:0:"";i:4;s:0:"";}s:15:"leftNonTerminal";s:10:"<rruleset>";s:8:"function";s:14:"reduce_rule_82";}s:6:"<STAR>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:2:"$C";i:3;s:0:"";i:4;s:0:"";}s:15:"leftNonTerminal";s:10:"<rruleset>";s:8:"function";s:14:"reduce_rule_82";}s:10:"<LBRACKET>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:2:"$C";i:3;s:0:"";i:4;s:0:"";}s:15:"leftNonTerminal";s:10:"<rruleset>";s:8:"function";s:14:"reduce_rule_82";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:2:"$C";i:3;s:0:"";i:4;s:0:"";}s:15:"leftNonTerminal";s:10:"<rruleset>";s:8:"function";s:14:"reduce_rule_82";}}i:156;a:10:{s:8:"<RBRACE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";}s:15:"leftNonTerminal";s:10:"<rruleset>";s:8:"function";s:14:"reduce_rule_91";}s:11:"<MEDIA_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";}s:15:"leftNonTerminal";s:10:"<rruleset>";s:8:"function";s:14:"reduce_rule_91";}s:7:"<IDENT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";}s:15:"leftNonTerminal";s:10:"<rruleset>";s:8:"function";s:14:"reduce_rule_91";}s:10:"<PAGE_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";}s:15:"leftNonTerminal";s:10:"<rruleset>";s:8:"function";s:14:"reduce_rule_91";}s:7:"<COLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";}s:15:"leftNonTerminal";s:10:"<rruleset>";s:8:"function";s:14:"reduce_rule_91";}s:6:"<HASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";}s:15:"leftNonTerminal";s:10:"<rruleset>";s:8:"function";s:14:"reduce_rule_91";}s:5:"<DOT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";}s:15:"leftNonTerminal";s:10:"<rruleset>";s:8:"function";s:14:"reduce_rule_91";}s:6:"<STAR>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";}s:15:"leftNonTerminal";s:10:"<rruleset>";s:8:"function";s:14:"reduce_rule_91";}s:10:"<LBRACKET>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";}s:15:"leftNonTerminal";s:10:"<rruleset>";s:8:"function";s:14:"reduce_rule_91";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";}s:15:"leftNonTerminal";s:10:"<rruleset>";s:8:"function";s:14:"reduce_rule_91";}}i:157;a:2:{s:11:"<SEMICOLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:2:"$C";}s:15:"leftNonTerminal";s:14:"<declarations>";s:8:"function";s:14:"reduce_rule_66";}s:8:"<RBRACE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:2:"$C";}s:15:"leftNonTerminal";s:14:"<declarations>";s:8:"function";s:14:"reduce_rule_66";}}i:160;a:22:{s:11:"<SEMICOLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:6:"<expr>";s:8:"function";s:15:"reduce_rule_134";}s:8:"<STRING>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:6:"<expr>";s:8:"function";s:15:"reduce_rule_134";}s:5:"<URI>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:6:"<expr>";s:8:"function";s:15:"reduce_rule_134";}s:7:"<COMMA>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:6:"<expr>";s:8:"function";s:15:"reduce_rule_134";}s:8:"<RBRACE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:6:"<expr>";s:8:"function";s:15:"reduce_rule_134";}s:7:"<IDENT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:6:"<expr>";s:8:"function";s:15:"reduce_rule_134";}s:7:"<SLASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:6:"<expr>";s:8:"function";s:15:"reduce_rule_134";}s:6:"<PLUS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:6:"<expr>";s:8:"function";s:15:"reduce_rule_134";}s:7:"<MINUS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:6:"<expr>";s:8:"function";s:15:"reduce_rule_134";}s:6:"<HASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:6:"<expr>";s:8:"function";s:15:"reduce_rule_134";}s:13:"<CSSFUNCTION>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:6:"<expr>";s:8:"function";s:15:"reduce_rule_134";}s:8:"<RPAREN>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:6:"<expr>";s:8:"function";s:15:"reduce_rule_134";}s:15:"<IMPORTANT_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:6:"<expr>";s:8:"function";s:15:"reduce_rule_134";}s:8:"<NUMBER>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:6:"<expr>";s:8:"function";s:15:"reduce_rule_134";}s:12:"<PERCENTAGE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:6:"<expr>";s:8:"function";s:15:"reduce_rule_134";}s:8:"<LENGTH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:6:"<expr>";s:8:"function";s:15:"reduce_rule_134";}s:5:"<EMS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:6:"<expr>";s:8:"function";s:15:"reduce_rule_134";}s:5:"<EXS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:6:"<expr>";s:8:"function";s:15:"reduce_rule_134";}s:7:"<ANGLE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:6:"<expr>";s:8:"function";s:15:"reduce_rule_134";}s:6:"<TIME>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:6:"<expr>";s:8:"function";s:15:"reduce_rule_134";}s:6:"<FREQ>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:6:"<expr>";s:8:"function";s:15:"reduce_rule_134";}s:11:"<DIMENSION>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:6:"<expr>";s:8:"function";s:15:"reduce_rule_134";}}i:161;a:22:{s:11:"<SEMICOLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:6:"<term>";s:8:"function";s:15:"reduce_rule_137";}s:8:"<STRING>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:6:"<term>";s:8:"function";s:15:"reduce_rule_137";}s:5:"<URI>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:6:"<term>";s:8:"function";s:15:"reduce_rule_137";}s:7:"<COMMA>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:6:"<term>";s:8:"function";s:15:"reduce_rule_137";}s:8:"<RBRACE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:6:"<term>";s:8:"function";s:15:"reduce_rule_137";}s:7:"<IDENT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:6:"<term>";s:8:"function";s:15:"reduce_rule_137";}s:7:"<SLASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:6:"<term>";s:8:"function";s:15:"reduce_rule_137";}s:6:"<PLUS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:6:"<term>";s:8:"function";s:15:"reduce_rule_137";}s:7:"<MINUS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:6:"<term>";s:8:"function";s:15:"reduce_rule_137";}s:6:"<HASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:6:"<term>";s:8:"function";s:15:"reduce_rule_137";}s:13:"<CSSFUNCTION>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:6:"<term>";s:8:"function";s:15:"reduce_rule_137";}s:8:"<RPAREN>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:6:"<term>";s:8:"function";s:15:"reduce_rule_137";}s:15:"<IMPORTANT_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:6:"<term>";s:8:"function";s:15:"reduce_rule_137";}s:8:"<NUMBER>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:6:"<term>";s:8:"function";s:15:"reduce_rule_137";}s:12:"<PERCENTAGE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:6:"<term>";s:8:"function";s:15:"reduce_rule_137";}s:8:"<LENGTH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:6:"<term>";s:8:"function";s:15:"reduce_rule_137";}s:5:"<EMS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:6:"<term>";s:8:"function";s:15:"reduce_rule_137";}s:5:"<EXS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:6:"<term>";s:8:"function";s:15:"reduce_rule_137";}s:7:"<ANGLE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:6:"<term>";s:8:"function";s:15:"reduce_rule_137";}s:6:"<TIME>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:6:"<term>";s:8:"function";s:15:"reduce_rule_137";}s:6:"<FREQ>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:6:"<term>";s:8:"function";s:15:"reduce_rule_137";}s:11:"<DIMENSION>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:6:"<term>";s:8:"function";s:15:"reduce_rule_137";}}i:162;a:22:{s:11:"<SEMICOLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:6:"<term>";s:8:"function";s:15:"reduce_rule_138";}s:8:"<STRING>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:6:"<term>";s:8:"function";s:15:"reduce_rule_138";}s:5:"<URI>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:6:"<term>";s:8:"function";s:15:"reduce_rule_138";}s:7:"<COMMA>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:6:"<term>";s:8:"function";s:15:"reduce_rule_138";}s:8:"<RBRACE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:6:"<term>";s:8:"function";s:15:"reduce_rule_138";}s:7:"<IDENT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:6:"<term>";s:8:"function";s:15:"reduce_rule_138";}s:7:"<SLASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:6:"<term>";s:8:"function";s:15:"reduce_rule_138";}s:6:"<PLUS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:6:"<term>";s:8:"function";s:15:"reduce_rule_138";}s:7:"<MINUS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:6:"<term>";s:8:"function";s:15:"reduce_rule_138";}s:6:"<HASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:6:"<term>";s:8:"function";s:15:"reduce_rule_138";}s:13:"<CSSFUNCTION>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:6:"<term>";s:8:"function";s:15:"reduce_rule_138";}s:8:"<RPAREN>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:6:"<term>";s:8:"function";s:15:"reduce_rule_138";}s:15:"<IMPORTANT_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:6:"<term>";s:8:"function";s:15:"reduce_rule_138";}s:8:"<NUMBER>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:6:"<term>";s:8:"function";s:15:"reduce_rule_138";}s:12:"<PERCENTAGE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:6:"<term>";s:8:"function";s:15:"reduce_rule_138";}s:8:"<LENGTH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:6:"<term>";s:8:"function";s:15:"reduce_rule_138";}s:5:"<EMS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:6:"<term>";s:8:"function";s:15:"reduce_rule_138";}s:5:"<EXS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:6:"<term>";s:8:"function";s:15:"reduce_rule_138";}s:7:"<ANGLE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:6:"<term>";s:8:"function";s:15:"reduce_rule_138";}s:6:"<TIME>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:6:"<term>";s:8:"function";s:15:"reduce_rule_138";}s:6:"<FREQ>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:6:"<term>";s:8:"function";s:15:"reduce_rule_138";}s:11:"<DIMENSION>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:6:"<term>";s:8:"function";s:15:"reduce_rule_138";}}i:164;a:22:{s:11:"<SEMICOLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:14:"<term_numeric>";s:8:"function";s:15:"reduce_rule_140";}s:8:"<STRING>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:14:"<term_numeric>";s:8:"function";s:15:"reduce_rule_140";}s:5:"<URI>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:14:"<term_numeric>";s:8:"function";s:15:"reduce_rule_140";}s:7:"<COMMA>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:14:"<term_numeric>";s:8:"function";s:15:"reduce_rule_140";}s:8:"<RBRACE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:14:"<term_numeric>";s:8:"function";s:15:"reduce_rule_140";}s:7:"<IDENT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:14:"<term_numeric>";s:8:"function";s:15:"reduce_rule_140";}s:7:"<SLASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:14:"<term_numeric>";s:8:"function";s:15:"reduce_rule_140";}s:6:"<PLUS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:14:"<term_numeric>";s:8:"function";s:15:"reduce_rule_140";}s:7:"<MINUS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:14:"<term_numeric>";s:8:"function";s:15:"reduce_rule_140";}s:6:"<HASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:14:"<term_numeric>";s:8:"function";s:15:"reduce_rule_140";}s:13:"<CSSFUNCTION>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:14:"<term_numeric>";s:8:"function";s:15:"reduce_rule_140";}s:8:"<RPAREN>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:14:"<term_numeric>";s:8:"function";s:15:"reduce_rule_140";}s:15:"<IMPORTANT_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:14:"<term_numeric>";s:8:"function";s:15:"reduce_rule_140";}s:8:"<NUMBER>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:14:"<term_numeric>";s:8:"function";s:15:"reduce_rule_140";}s:12:"<PERCENTAGE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:14:"<term_numeric>";s:8:"function";s:15:"reduce_rule_140";}s:8:"<LENGTH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:14:"<term_numeric>";s:8:"function";s:15:"reduce_rule_140";}s:5:"<EMS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:14:"<term_numeric>";s:8:"function";s:15:"reduce_rule_140";}s:5:"<EXS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:14:"<term_numeric>";s:8:"function";s:15:"reduce_rule_140";}s:7:"<ANGLE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:14:"<term_numeric>";s:8:"function";s:15:"reduce_rule_140";}s:6:"<TIME>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:14:"<term_numeric>";s:8:"function";s:15:"reduce_rule_140";}s:6:"<FREQ>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:14:"<term_numeric>";s:8:"function";s:15:"reduce_rule_140";}s:11:"<DIMENSION>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:14:"<term_numeric>";s:8:"function";s:15:"reduce_rule_140";}}i:168;a:22:{s:11:"<SEMICOLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_165";}s:8:"<STRING>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_165";}s:5:"<URI>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_165";}s:7:"<COMMA>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_165";}s:8:"<RBRACE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_165";}s:7:"<IDENT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_165";}s:7:"<SLASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_165";}s:6:"<PLUS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_165";}s:7:"<MINUS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_165";}s:6:"<HASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_165";}s:13:"<CSSFUNCTION>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_165";}s:8:"<RPAREN>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_165";}s:15:"<IMPORTANT_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_165";}s:8:"<NUMBER>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_165";}s:12:"<PERCENTAGE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_165";}s:8:"<LENGTH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_165";}s:5:"<EMS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_165";}s:5:"<EXS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_165";}s:7:"<ANGLE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_165";}s:6:"<TIME>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_165";}s:6:"<FREQ>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_165";}s:11:"<DIMENSION>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_165";}}i:169;a:22:{s:11:"<SEMICOLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_166";}s:8:"<STRING>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_166";}s:5:"<URI>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_166";}s:7:"<COMMA>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_166";}s:8:"<RBRACE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_166";}s:7:"<IDENT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_166";}s:7:"<SLASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_166";}s:6:"<PLUS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_166";}s:7:"<MINUS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_166";}s:6:"<HASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_166";}s:13:"<CSSFUNCTION>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_166";}s:8:"<RPAREN>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_166";}s:15:"<IMPORTANT_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_166";}s:8:"<NUMBER>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_166";}s:12:"<PERCENTAGE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_166";}s:8:"<LENGTH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_166";}s:5:"<EMS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_166";}s:5:"<EXS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_166";}s:7:"<ANGLE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_166";}s:6:"<TIME>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_166";}s:6:"<FREQ>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_166";}s:11:"<DIMENSION>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:2:"$B";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_166";}}i:170;a:9:{s:8:"<NUMBER>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:16:"<unary_operator>";s:8:"function";s:14:"reduce_rule_77";}s:12:"<PERCENTAGE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:16:"<unary_operator>";s:8:"function";s:14:"reduce_rule_77";}s:8:"<LENGTH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:16:"<unary_operator>";s:8:"function";s:14:"reduce_rule_77";}s:5:"<EMS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:16:"<unary_operator>";s:8:"function";s:14:"reduce_rule_77";}s:5:"<EXS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:16:"<unary_operator>";s:8:"function";s:14:"reduce_rule_77";}s:7:"<ANGLE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:16:"<unary_operator>";s:8:"function";s:14:"reduce_rule_77";}s:6:"<TIME>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:16:"<unary_operator>";s:8:"function";s:14:"reduce_rule_77";}s:6:"<FREQ>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:16:"<unary_operator>";s:8:"function";s:14:"reduce_rule_77";}s:11:"<DIMENSION>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:16:"<unary_operator>";s:8:"function";s:14:"reduce_rule_77";}}i:171;a:9:{s:8:"<NUMBER>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:16:"<unary_operator>";s:8:"function";s:14:"reduce_rule_78";}s:12:"<PERCENTAGE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:16:"<unary_operator>";s:8:"function";s:14:"reduce_rule_78";}s:8:"<LENGTH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:16:"<unary_operator>";s:8:"function";s:14:"reduce_rule_78";}s:5:"<EMS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:16:"<unary_operator>";s:8:"function";s:14:"reduce_rule_78";}s:5:"<EXS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:16:"<unary_operator>";s:8:"function";s:14:"reduce_rule_78";}s:7:"<ANGLE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:16:"<unary_operator>";s:8:"function";s:14:"reduce_rule_78";}s:6:"<TIME>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:16:"<unary_operator>";s:8:"function";s:14:"reduce_rule_78";}s:6:"<FREQ>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:16:"<unary_operator>";s:8:"function";s:14:"reduce_rule_78";}s:11:"<DIMENSION>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:16:"<unary_operator>";s:8:"function";s:14:"reduce_rule_78";}}i:185;a:9:{s:11:"<MEDIA_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:0:"";i:2;s:2:"$C";i:3;s:0:"";i:4;s:0:"";}s:15:"leftNonTerminal";s:7:"<ppage>";s:8:"function";s:14:"reduce_rule_60";}s:7:"<IDENT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:0:"";i:2;s:2:"$C";i:3;s:0:"";i:4;s:0:"";}s:15:"leftNonTerminal";s:7:"<ppage>";s:8:"function";s:14:"reduce_rule_60";}s:10:"<PAGE_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:0:"";i:2;s:2:"$C";i:3;s:0:"";i:4;s:0:"";}s:15:"leftNonTerminal";s:7:"<ppage>";s:8:"function";s:14:"reduce_rule_60";}s:7:"<COLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:0:"";i:2;s:2:"$C";i:3;s:0:"";i:4;s:0:"";}s:15:"leftNonTerminal";s:7:"<ppage>";s:8:"function";s:14:"reduce_rule_60";}s:6:"<HASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:0:"";i:2;s:2:"$C";i:3;s:0:"";i:4;s:0:"";}s:15:"leftNonTerminal";s:7:"<ppage>";s:8:"function";s:14:"reduce_rule_60";}s:5:"<DOT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:0:"";i:2;s:2:"$C";i:3;s:0:"";i:4;s:0:"";}s:15:"leftNonTerminal";s:7:"<ppage>";s:8:"function";s:14:"reduce_rule_60";}s:6:"<STAR>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:0:"";i:2;s:2:"$C";i:3;s:0:"";i:4;s:0:"";}s:15:"leftNonTerminal";s:7:"<ppage>";s:8:"function";s:14:"reduce_rule_60";}s:10:"<LBRACKET>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:0:"";i:2;s:2:"$C";i:3;s:0:"";i:4;s:0:"";}s:15:"leftNonTerminal";s:7:"<ppage>";s:8:"function";s:14:"reduce_rule_60";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:0:"";i:2;s:2:"$C";i:3;s:0:"";i:4;s:0:"";}s:15:"leftNonTerminal";s:7:"<ppage>";s:8:"function";s:14:"reduce_rule_60";}}i:186;a:9:{s:4:"<SS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:2:"$C";i:3;s:2:"$D";i:4;s:0:"";}s:15:"leftNonTerminal";s:8:"<attrib>";s:8:"function";s:15:"reduce_rule_107";}s:7:"<COMMA>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:2:"$C";i:3;s:2:"$D";i:4;s:0:"";}s:15:"leftNonTerminal";s:8:"<attrib>";s:8:"function";s:15:"reduce_rule_107";}s:8:"<LBRACE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:2:"$C";i:3;s:2:"$D";i:4;s:0:"";}s:15:"leftNonTerminal";s:8:"<attrib>";s:8:"function";s:15:"reduce_rule_107";}s:7:"<COLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:2:"$C";i:3;s:2:"$D";i:4;s:0:"";}s:15:"leftNonTerminal";s:8:"<attrib>";s:8:"function";s:15:"reduce_rule_107";}s:9:"<GREATER>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:2:"$C";i:3;s:2:"$D";i:4;s:0:"";}s:15:"leftNonTerminal";s:8:"<attrib>";s:8:"function";s:15:"reduce_rule_107";}s:6:"<PLUS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:2:"$C";i:3;s:2:"$D";i:4;s:0:"";}s:15:"leftNonTerminal";s:8:"<attrib>";s:8:"function";s:15:"reduce_rule_107";}s:6:"<HASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:2:"$C";i:3;s:2:"$D";i:4;s:0:"";}s:15:"leftNonTerminal";s:8:"<attrib>";s:8:"function";s:15:"reduce_rule_107";}s:5:"<DOT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:2:"$C";i:3;s:2:"$D";i:4;s:0:"";}s:15:"leftNonTerminal";s:8:"<attrib>";s:8:"function";s:15:"reduce_rule_107";}s:10:"<LBRACKET>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:2:"$C";i:3;s:2:"$D";i:4;s:0:"";}s:15:"leftNonTerminal";s:8:"<attrib>";s:8:"function";s:15:"reduce_rule_107";}}i:187;a:1:{s:10:"<RBRACKET>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:29:"<attrib_operator_rhand_sstar>";s:8:"function";s:15:"reduce_rule_119";}}i:189;a:9:{s:11:"<MEDIA_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:6:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:15:"leftNonTerminal";s:7:"<media>";s:8:"function";s:14:"reduce_rule_45";}s:7:"<IDENT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:6:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:15:"leftNonTerminal";s:7:"<media>";s:8:"function";s:14:"reduce_rule_45";}s:10:"<PAGE_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:6:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:15:"leftNonTerminal";s:7:"<media>";s:8:"function";s:14:"reduce_rule_45";}s:7:"<COLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:6:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:15:"leftNonTerminal";s:7:"<media>";s:8:"function";s:14:"reduce_rule_45";}s:6:"<HASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:6:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:15:"leftNonTerminal";s:7:"<media>";s:8:"function";s:14:"reduce_rule_45";}s:5:"<DOT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:6:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:15:"leftNonTerminal";s:7:"<media>";s:8:"function";s:14:"reduce_rule_45";}s:6:"<STAR>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:6:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:15:"leftNonTerminal";s:7:"<media>";s:8:"function";s:14:"reduce_rule_45";}s:10:"<LBRACKET>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:6:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:15:"leftNonTerminal";s:7:"<media>";s:8:"function";s:14:"reduce_rule_45";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:6:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";}s:15:"leftNonTerminal";s:7:"<media>";s:8:"function";s:14:"reduce_rule_45";}}i:190;a:9:{s:11:"<MEDIA_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:6:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:2:"$C";i:4;s:0:"";i:5;s:0:"";}s:15:"leftNonTerminal";s:7:"<media>";s:8:"function";s:14:"reduce_rule_43";}s:7:"<IDENT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:6:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:2:"$C";i:4;s:0:"";i:5;s:0:"";}s:15:"leftNonTerminal";s:7:"<media>";s:8:"function";s:14:"reduce_rule_43";}s:10:"<PAGE_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:6:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:2:"$C";i:4;s:0:"";i:5;s:0:"";}s:15:"leftNonTerminal";s:7:"<media>";s:8:"function";s:14:"reduce_rule_43";}s:7:"<COLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:6:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:2:"$C";i:4;s:0:"";i:5;s:0:"";}s:15:"leftNonTerminal";s:7:"<media>";s:8:"function";s:14:"reduce_rule_43";}s:6:"<HASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:6:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:2:"$C";i:4;s:0:"";i:5;s:0:"";}s:15:"leftNonTerminal";s:7:"<media>";s:8:"function";s:14:"reduce_rule_43";}s:5:"<DOT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:6:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:2:"$C";i:4;s:0:"";i:5;s:0:"";}s:15:"leftNonTerminal";s:7:"<media>";s:8:"function";s:14:"reduce_rule_43";}s:6:"<STAR>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:6:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:2:"$C";i:4;s:0:"";i:5;s:0:"";}s:15:"leftNonTerminal";s:7:"<media>";s:8:"function";s:14:"reduce_rule_43";}s:10:"<LBRACKET>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:6:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:2:"$C";i:4;s:0:"";i:5;s:0:"";}s:15:"leftNonTerminal";s:7:"<media>";s:8:"function";s:14:"reduce_rule_43";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:6:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:2:"$C";i:4;s:0:"";i:5;s:0:"";}s:15:"leftNonTerminal";s:7:"<media>";s:8:"function";s:14:"reduce_rule_43";}}i:192;a:2:{s:11:"<SEMICOLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:2:"$C";i:3;s:0:"";}s:15:"leftNonTerminal";s:14:"<ddeclaration>";s:8:"function";s:15:"reduce_rule_129";}s:8:"<RBRACE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:2:"$C";i:3;s:0:"";}s:15:"leftNonTerminal";s:14:"<ddeclaration>";s:8:"function";s:15:"reduce_rule_129";}}i:193;a:22:{s:11:"<SEMICOLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:2:"$D";}s:15:"leftNonTerminal";s:6:"<expr>";s:8:"function";s:15:"reduce_rule_135";}s:8:"<STRING>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:2:"$D";}s:15:"leftNonTerminal";s:6:"<expr>";s:8:"function";s:15:"reduce_rule_135";}s:5:"<URI>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:2:"$D";}s:15:"leftNonTerminal";s:6:"<expr>";s:8:"function";s:15:"reduce_rule_135";}s:7:"<COMMA>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:2:"$D";}s:15:"leftNonTerminal";s:6:"<expr>";s:8:"function";s:15:"reduce_rule_135";}s:8:"<RBRACE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:2:"$D";}s:15:"leftNonTerminal";s:6:"<expr>";s:8:"function";s:15:"reduce_rule_135";}s:7:"<IDENT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:2:"$D";}s:15:"leftNonTerminal";s:6:"<expr>";s:8:"function";s:15:"reduce_rule_135";}s:7:"<SLASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:2:"$D";}s:15:"leftNonTerminal";s:6:"<expr>";s:8:"function";s:15:"reduce_rule_135";}s:6:"<PLUS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:2:"$D";}s:15:"leftNonTerminal";s:6:"<expr>";s:8:"function";s:15:"reduce_rule_135";}s:7:"<MINUS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:2:"$D";}s:15:"leftNonTerminal";s:6:"<expr>";s:8:"function";s:15:"reduce_rule_135";}s:6:"<HASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:2:"$D";}s:15:"leftNonTerminal";s:6:"<expr>";s:8:"function";s:15:"reduce_rule_135";}s:13:"<CSSFUNCTION>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:2:"$D";}s:15:"leftNonTerminal";s:6:"<expr>";s:8:"function";s:15:"reduce_rule_135";}s:8:"<RPAREN>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:2:"$D";}s:15:"leftNonTerminal";s:6:"<expr>";s:8:"function";s:15:"reduce_rule_135";}s:15:"<IMPORTANT_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:2:"$D";}s:15:"leftNonTerminal";s:6:"<expr>";s:8:"function";s:15:"reduce_rule_135";}s:8:"<NUMBER>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:2:"$D";}s:15:"leftNonTerminal";s:6:"<expr>";s:8:"function";s:15:"reduce_rule_135";}s:12:"<PERCENTAGE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:2:"$D";}s:15:"leftNonTerminal";s:6:"<expr>";s:8:"function";s:15:"reduce_rule_135";}s:8:"<LENGTH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:2:"$D";}s:15:"leftNonTerminal";s:6:"<expr>";s:8:"function";s:15:"reduce_rule_135";}s:5:"<EMS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:2:"$D";}s:15:"leftNonTerminal";s:6:"<expr>";s:8:"function";s:15:"reduce_rule_135";}s:5:"<EXS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:2:"$D";}s:15:"leftNonTerminal";s:6:"<expr>";s:8:"function";s:15:"reduce_rule_135";}s:7:"<ANGLE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:2:"$D";}s:15:"leftNonTerminal";s:6:"<expr>";s:8:"function";s:15:"reduce_rule_135";}s:6:"<TIME>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:2:"$D";}s:15:"leftNonTerminal";s:6:"<expr>";s:8:"function";s:15:"reduce_rule_135";}s:6:"<FREQ>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:2:"$D";}s:15:"leftNonTerminal";s:6:"<expr>";s:8:"function";s:15:"reduce_rule_135";}s:11:"<DIMENSION>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:2:"$D";}s:15:"leftNonTerminal";s:6:"<expr>";s:8:"function";s:15:"reduce_rule_135";}}i:195;a:2:{s:11:"<SEMICOLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:6:"<prio>";s:8:"function";s:15:"reduce_rule_131";}s:8:"<RBRACE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:1:{i:0;s:0:"";}s:15:"leftNonTerminal";s:6:"<prio>";s:8:"function";s:15:"reduce_rule_131";}}i:199;a:22:{s:11:"<SEMICOLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:2:"$C";}s:15:"leftNonTerminal";s:14:"<term_numeric>";s:8:"function";s:15:"reduce_rule_139";}s:8:"<STRING>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:2:"$C";}s:15:"leftNonTerminal";s:14:"<term_numeric>";s:8:"function";s:15:"reduce_rule_139";}s:5:"<URI>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:2:"$C";}s:15:"leftNonTerminal";s:14:"<term_numeric>";s:8:"function";s:15:"reduce_rule_139";}s:7:"<COMMA>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:2:"$C";}s:15:"leftNonTerminal";s:14:"<term_numeric>";s:8:"function";s:15:"reduce_rule_139";}s:8:"<RBRACE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:2:"$C";}s:15:"leftNonTerminal";s:14:"<term_numeric>";s:8:"function";s:15:"reduce_rule_139";}s:7:"<IDENT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:2:"$C";}s:15:"leftNonTerminal";s:14:"<term_numeric>";s:8:"function";s:15:"reduce_rule_139";}s:7:"<SLASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:2:"$C";}s:15:"leftNonTerminal";s:14:"<term_numeric>";s:8:"function";s:15:"reduce_rule_139";}s:6:"<PLUS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:2:"$C";}s:15:"leftNonTerminal";s:14:"<term_numeric>";s:8:"function";s:15:"reduce_rule_139";}s:7:"<MINUS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:2:"$C";}s:15:"leftNonTerminal";s:14:"<term_numeric>";s:8:"function";s:15:"reduce_rule_139";}s:6:"<HASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:2:"$C";}s:15:"leftNonTerminal";s:14:"<term_numeric>";s:8:"function";s:15:"reduce_rule_139";}s:13:"<CSSFUNCTION>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:2:"$C";}s:15:"leftNonTerminal";s:14:"<term_numeric>";s:8:"function";s:15:"reduce_rule_139";}s:8:"<RPAREN>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:2:"$C";}s:15:"leftNonTerminal";s:14:"<term_numeric>";s:8:"function";s:15:"reduce_rule_139";}s:15:"<IMPORTANT_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:2:"$C";}s:15:"leftNonTerminal";s:14:"<term_numeric>";s:8:"function";s:15:"reduce_rule_139";}s:8:"<NUMBER>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:2:"$C";}s:15:"leftNonTerminal";s:14:"<term_numeric>";s:8:"function";s:15:"reduce_rule_139";}s:12:"<PERCENTAGE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:2:"$C";}s:15:"leftNonTerminal";s:14:"<term_numeric>";s:8:"function";s:15:"reduce_rule_139";}s:8:"<LENGTH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:2:"$C";}s:15:"leftNonTerminal";s:14:"<term_numeric>";s:8:"function";s:15:"reduce_rule_139";}s:5:"<EMS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:2:"$C";}s:15:"leftNonTerminal";s:14:"<term_numeric>";s:8:"function";s:15:"reduce_rule_139";}s:5:"<EXS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:2:"$C";}s:15:"leftNonTerminal";s:14:"<term_numeric>";s:8:"function";s:15:"reduce_rule_139";}s:7:"<ANGLE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:2:"$C";}s:15:"leftNonTerminal";s:14:"<term_numeric>";s:8:"function";s:15:"reduce_rule_139";}s:6:"<TIME>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:2:"$C";}s:15:"leftNonTerminal";s:14:"<term_numeric>";s:8:"function";s:15:"reduce_rule_139";}s:6:"<FREQ>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:2:"$C";}s:15:"leftNonTerminal";s:14:"<term_numeric>";s:8:"function";s:15:"reduce_rule_139";}s:11:"<DIMENSION>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:2:"$C";}s:15:"leftNonTerminal";s:14:"<term_numeric>";s:8:"function";s:15:"reduce_rule_139";}}i:200;a:22:{s:11:"<SEMICOLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_160";}s:8:"<STRING>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_160";}s:5:"<URI>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_160";}s:7:"<COMMA>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_160";}s:8:"<RBRACE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_160";}s:7:"<IDENT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_160";}s:7:"<SLASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_160";}s:6:"<PLUS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_160";}s:7:"<MINUS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_160";}s:6:"<HASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_160";}s:13:"<CSSFUNCTION>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_160";}s:8:"<RPAREN>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_160";}s:15:"<IMPORTANT_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_160";}s:8:"<NUMBER>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_160";}s:12:"<PERCENTAGE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_160";}s:8:"<LENGTH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_160";}s:5:"<EMS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_160";}s:5:"<EXS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_160";}s:7:"<ANGLE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_160";}s:6:"<TIME>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_160";}s:6:"<FREQ>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_160";}s:11:"<DIMENSION>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_160";}}i:201;a:22:{s:11:"<SEMICOLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_162";}s:8:"<STRING>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_162";}s:5:"<URI>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_162";}s:7:"<COMMA>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_162";}s:8:"<RBRACE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_162";}s:7:"<IDENT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_162";}s:7:"<SLASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_162";}s:6:"<PLUS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_162";}s:7:"<MINUS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_162";}s:6:"<HASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_162";}s:13:"<CSSFUNCTION>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_162";}s:8:"<RPAREN>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_162";}s:15:"<IMPORTANT_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_162";}s:8:"<NUMBER>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_162";}s:12:"<PERCENTAGE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_162";}s:8:"<LENGTH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_162";}s:5:"<EMS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_162";}s:5:"<EXS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_162";}s:7:"<ANGLE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_162";}s:6:"<TIME>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_162";}s:6:"<FREQ>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_162";}s:11:"<DIMENSION>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_162";}}i:202;a:22:{s:11:"<SEMICOLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_164";}s:8:"<STRING>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_164";}s:5:"<URI>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_164";}s:7:"<COMMA>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_164";}s:8:"<RBRACE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_164";}s:7:"<IDENT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_164";}s:7:"<SLASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_164";}s:6:"<PLUS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_164";}s:7:"<MINUS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_164";}s:6:"<HASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_164";}s:13:"<CSSFUNCTION>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_164";}s:8:"<RPAREN>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_164";}s:15:"<IMPORTANT_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_164";}s:8:"<NUMBER>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_164";}s:12:"<PERCENTAGE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_164";}s:8:"<LENGTH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_164";}s:5:"<EMS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_164";}s:5:"<EXS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_164";}s:7:"<ANGLE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_164";}s:6:"<TIME>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_164";}s:6:"<FREQ>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_164";}s:11:"<DIMENSION>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:17:"<term_nonnumeric>";s:8:"function";s:15:"reduce_rule_164";}}i:203;a:22:{s:11:"<SEMICOLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_142";}s:8:"<STRING>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_142";}s:5:"<URI>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_142";}s:7:"<COMMA>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_142";}s:8:"<RBRACE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_142";}s:7:"<IDENT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_142";}s:7:"<SLASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_142";}s:6:"<PLUS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_142";}s:7:"<MINUS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_142";}s:6:"<HASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_142";}s:13:"<CSSFUNCTION>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_142";}s:8:"<RPAREN>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_142";}s:15:"<IMPORTANT_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_142";}s:8:"<NUMBER>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_142";}s:12:"<PERCENTAGE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_142";}s:8:"<LENGTH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_142";}s:5:"<EMS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_142";}s:5:"<EXS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_142";}s:7:"<ANGLE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_142";}s:6:"<TIME>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_142";}s:6:"<FREQ>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_142";}s:11:"<DIMENSION>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_142";}}i:204;a:22:{s:11:"<SEMICOLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_144";}s:8:"<STRING>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_144";}s:5:"<URI>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_144";}s:7:"<COMMA>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_144";}s:8:"<RBRACE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_144";}s:7:"<IDENT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_144";}s:7:"<SLASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_144";}s:6:"<PLUS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_144";}s:7:"<MINUS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_144";}s:6:"<HASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_144";}s:13:"<CSSFUNCTION>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_144";}s:8:"<RPAREN>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_144";}s:15:"<IMPORTANT_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_144";}s:8:"<NUMBER>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_144";}s:12:"<PERCENTAGE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_144";}s:8:"<LENGTH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_144";}s:5:"<EMS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_144";}s:5:"<EXS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_144";}s:7:"<ANGLE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_144";}s:6:"<TIME>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_144";}s:6:"<FREQ>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_144";}s:11:"<DIMENSION>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_144";}}i:205;a:22:{s:11:"<SEMICOLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_146";}s:8:"<STRING>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_146";}s:5:"<URI>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_146";}s:7:"<COMMA>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_146";}s:8:"<RBRACE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_146";}s:7:"<IDENT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_146";}s:7:"<SLASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_146";}s:6:"<PLUS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_146";}s:7:"<MINUS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_146";}s:6:"<HASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_146";}s:13:"<CSSFUNCTION>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_146";}s:8:"<RPAREN>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_146";}s:15:"<IMPORTANT_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_146";}s:8:"<NUMBER>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_146";}s:12:"<PERCENTAGE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_146";}s:8:"<LENGTH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_146";}s:5:"<EMS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_146";}s:5:"<EXS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_146";}s:7:"<ANGLE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_146";}s:6:"<TIME>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_146";}s:6:"<FREQ>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_146";}s:11:"<DIMENSION>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_146";}}i:206;a:22:{s:11:"<SEMICOLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_148";}s:8:"<STRING>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_148";}s:5:"<URI>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_148";}s:7:"<COMMA>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_148";}s:8:"<RBRACE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_148";}s:7:"<IDENT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_148";}s:7:"<SLASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_148";}s:6:"<PLUS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_148";}s:7:"<MINUS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_148";}s:6:"<HASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_148";}s:13:"<CSSFUNCTION>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_148";}s:8:"<RPAREN>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_148";}s:15:"<IMPORTANT_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_148";}s:8:"<NUMBER>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_148";}s:12:"<PERCENTAGE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_148";}s:8:"<LENGTH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_148";}s:5:"<EMS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_148";}s:5:"<EXS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_148";}s:7:"<ANGLE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_148";}s:6:"<TIME>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_148";}s:6:"<FREQ>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_148";}s:11:"<DIMENSION>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_148";}}i:207;a:22:{s:11:"<SEMICOLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_150";}s:8:"<STRING>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_150";}s:5:"<URI>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_150";}s:7:"<COMMA>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_150";}s:8:"<RBRACE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_150";}s:7:"<IDENT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_150";}s:7:"<SLASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_150";}s:6:"<PLUS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_150";}s:7:"<MINUS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_150";}s:6:"<HASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_150";}s:13:"<CSSFUNCTION>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_150";}s:8:"<RPAREN>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_150";}s:15:"<IMPORTANT_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_150";}s:8:"<NUMBER>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_150";}s:12:"<PERCENTAGE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_150";}s:8:"<LENGTH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_150";}s:5:"<EMS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_150";}s:5:"<EXS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_150";}s:7:"<ANGLE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_150";}s:6:"<TIME>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_150";}s:6:"<FREQ>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_150";}s:11:"<DIMENSION>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_150";}}i:208;a:22:{s:11:"<SEMICOLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_152";}s:8:"<STRING>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_152";}s:5:"<URI>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_152";}s:7:"<COMMA>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_152";}s:8:"<RBRACE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_152";}s:7:"<IDENT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_152";}s:7:"<SLASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_152";}s:6:"<PLUS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_152";}s:7:"<MINUS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_152";}s:6:"<HASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_152";}s:13:"<CSSFUNCTION>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_152";}s:8:"<RPAREN>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_152";}s:15:"<IMPORTANT_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_152";}s:8:"<NUMBER>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_152";}s:12:"<PERCENTAGE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_152";}s:8:"<LENGTH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_152";}s:5:"<EMS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_152";}s:5:"<EXS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_152";}s:7:"<ANGLE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_152";}s:6:"<TIME>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_152";}s:6:"<FREQ>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_152";}s:11:"<DIMENSION>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_152";}}i:209;a:22:{s:11:"<SEMICOLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_154";}s:8:"<STRING>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_154";}s:5:"<URI>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_154";}s:7:"<COMMA>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_154";}s:8:"<RBRACE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_154";}s:7:"<IDENT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_154";}s:7:"<SLASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_154";}s:6:"<PLUS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_154";}s:7:"<MINUS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_154";}s:6:"<HASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_154";}s:13:"<CSSFUNCTION>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_154";}s:8:"<RPAREN>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_154";}s:15:"<IMPORTANT_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_154";}s:8:"<NUMBER>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_154";}s:12:"<PERCENTAGE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_154";}s:8:"<LENGTH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_154";}s:5:"<EMS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_154";}s:5:"<EXS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_154";}s:7:"<ANGLE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_154";}s:6:"<TIME>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_154";}s:6:"<FREQ>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_154";}s:11:"<DIMENSION>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_154";}}i:210;a:22:{s:11:"<SEMICOLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_156";}s:8:"<STRING>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_156";}s:5:"<URI>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_156";}s:7:"<COMMA>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_156";}s:8:"<RBRACE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_156";}s:7:"<IDENT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_156";}s:7:"<SLASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_156";}s:6:"<PLUS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_156";}s:7:"<MINUS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_156";}s:6:"<HASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_156";}s:13:"<CSSFUNCTION>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_156";}s:8:"<RPAREN>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_156";}s:15:"<IMPORTANT_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_156";}s:8:"<NUMBER>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_156";}s:12:"<PERCENTAGE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_156";}s:8:"<LENGTH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_156";}s:5:"<EMS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_156";}s:5:"<EXS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_156";}s:7:"<ANGLE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_156";}s:6:"<TIME>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_156";}s:6:"<FREQ>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_156";}s:11:"<DIMENSION>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_156";}}i:211;a:22:{s:11:"<SEMICOLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_158";}s:8:"<STRING>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_158";}s:5:"<URI>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_158";}s:7:"<COMMA>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_158";}s:8:"<RBRACE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_158";}s:7:"<IDENT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_158";}s:7:"<SLASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_158";}s:6:"<PLUS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_158";}s:7:"<MINUS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_158";}s:6:"<HASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_158";}s:13:"<CSSFUNCTION>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_158";}s:8:"<RPAREN>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_158";}s:15:"<IMPORTANT_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_158";}s:8:"<NUMBER>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_158";}s:12:"<PERCENTAGE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_158";}s:8:"<LENGTH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_158";}s:5:"<EMS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_158";}s:5:"<EXS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_158";}s:7:"<ANGLE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_158";}s:6:"<TIME>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_158";}s:6:"<FREQ>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_158";}s:11:"<DIMENSION>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<term_numeric_number>";s:8:"function";s:15:"reduce_rule_158";}}i:212;a:22:{s:11:"<SEMICOLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:10:"<hexcolor>";s:8:"function";s:15:"reduce_rule_168";}s:8:"<STRING>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:10:"<hexcolor>";s:8:"function";s:15:"reduce_rule_168";}s:5:"<URI>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:10:"<hexcolor>";s:8:"function";s:15:"reduce_rule_168";}s:7:"<COMMA>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:10:"<hexcolor>";s:8:"function";s:15:"reduce_rule_168";}s:8:"<RBRACE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:10:"<hexcolor>";s:8:"function";s:15:"reduce_rule_168";}s:7:"<IDENT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:10:"<hexcolor>";s:8:"function";s:15:"reduce_rule_168";}s:7:"<SLASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:10:"<hexcolor>";s:8:"function";s:15:"reduce_rule_168";}s:6:"<PLUS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:10:"<hexcolor>";s:8:"function";s:15:"reduce_rule_168";}s:7:"<MINUS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:10:"<hexcolor>";s:8:"function";s:15:"reduce_rule_168";}s:6:"<HASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:10:"<hexcolor>";s:8:"function";s:15:"reduce_rule_168";}s:13:"<CSSFUNCTION>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:10:"<hexcolor>";s:8:"function";s:15:"reduce_rule_168";}s:8:"<RPAREN>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:10:"<hexcolor>";s:8:"function";s:15:"reduce_rule_168";}s:15:"<IMPORTANT_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:10:"<hexcolor>";s:8:"function";s:15:"reduce_rule_168";}s:8:"<NUMBER>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:10:"<hexcolor>";s:8:"function";s:15:"reduce_rule_168";}s:12:"<PERCENTAGE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:10:"<hexcolor>";s:8:"function";s:15:"reduce_rule_168";}s:8:"<LENGTH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:10:"<hexcolor>";s:8:"function";s:15:"reduce_rule_168";}s:5:"<EMS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:10:"<hexcolor>";s:8:"function";s:15:"reduce_rule_168";}s:5:"<EXS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:10:"<hexcolor>";s:8:"function";s:15:"reduce_rule_168";}s:7:"<ANGLE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:10:"<hexcolor>";s:8:"function";s:15:"reduce_rule_168";}s:6:"<TIME>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:10:"<hexcolor>";s:8:"function";s:15:"reduce_rule_168";}s:6:"<FREQ>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:10:"<hexcolor>";s:8:"function";s:15:"reduce_rule_168";}s:11:"<DIMENSION>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:2:"$B";i:1;s:0:"";}s:15:"leftNonTerminal";s:10:"<hexcolor>";s:8:"function";s:15:"reduce_rule_168";}}i:216;a:9:{s:11:"<MEDIA_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:6:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:2:"$C";i:4;s:0:"";i:5;s:0:"";}s:15:"leftNonTerminal";s:7:"<ppage>";s:8:"function";s:14:"reduce_rule_58";}s:7:"<IDENT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:6:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:2:"$C";i:4;s:0:"";i:5;s:0:"";}s:15:"leftNonTerminal";s:7:"<ppage>";s:8:"function";s:14:"reduce_rule_58";}s:10:"<PAGE_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:6:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:2:"$C";i:4;s:0:"";i:5;s:0:"";}s:15:"leftNonTerminal";s:7:"<ppage>";s:8:"function";s:14:"reduce_rule_58";}s:7:"<COLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:6:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:2:"$C";i:4;s:0:"";i:5;s:0:"";}s:15:"leftNonTerminal";s:7:"<ppage>";s:8:"function";s:14:"reduce_rule_58";}s:6:"<HASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:6:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:2:"$C";i:4;s:0:"";i:5;s:0:"";}s:15:"leftNonTerminal";s:7:"<ppage>";s:8:"function";s:14:"reduce_rule_58";}s:5:"<DOT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:6:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:2:"$C";i:4;s:0:"";i:5;s:0:"";}s:15:"leftNonTerminal";s:7:"<ppage>";s:8:"function";s:14:"reduce_rule_58";}s:6:"<STAR>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:6:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:2:"$C";i:4;s:0:"";i:5;s:0:"";}s:15:"leftNonTerminal";s:7:"<ppage>";s:8:"function";s:14:"reduce_rule_58";}s:10:"<LBRACKET>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:6:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:2:"$C";i:4;s:0:"";i:5;s:0:"";}s:15:"leftNonTerminal";s:7:"<ppage>";s:8:"function";s:14:"reduce_rule_58";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:6:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:2:"$C";i:4;s:0:"";i:5;s:0:"";}s:15:"leftNonTerminal";s:7:"<ppage>";s:8:"function";s:14:"reduce_rule_58";}}i:217;a:9:{s:11:"<MEDIA_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:7:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:0:"";i:4;s:2:"$C";i:5;s:0:"";i:6;s:0:"";}s:15:"leftNonTerminal";s:7:"<media>";s:8:"function";s:14:"reduce_rule_41";}s:7:"<IDENT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:7:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:0:"";i:4;s:2:"$C";i:5;s:0:"";i:6;s:0:"";}s:15:"leftNonTerminal";s:7:"<media>";s:8:"function";s:14:"reduce_rule_41";}s:10:"<PAGE_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:7:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:0:"";i:4;s:2:"$C";i:5;s:0:"";i:6;s:0:"";}s:15:"leftNonTerminal";s:7:"<media>";s:8:"function";s:14:"reduce_rule_41";}s:7:"<COLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:7:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:0:"";i:4;s:2:"$C";i:5;s:0:"";i:6;s:0:"";}s:15:"leftNonTerminal";s:7:"<media>";s:8:"function";s:14:"reduce_rule_41";}s:6:"<HASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:7:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:0:"";i:4;s:2:"$C";i:5;s:0:"";i:6;s:0:"";}s:15:"leftNonTerminal";s:7:"<media>";s:8:"function";s:14:"reduce_rule_41";}s:5:"<DOT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:7:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:0:"";i:4;s:2:"$C";i:5;s:0:"";i:6;s:0:"";}s:15:"leftNonTerminal";s:7:"<media>";s:8:"function";s:14:"reduce_rule_41";}s:6:"<STAR>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:7:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:0:"";i:4;s:2:"$C";i:5;s:0:"";i:6;s:0:"";}s:15:"leftNonTerminal";s:7:"<media>";s:8:"function";s:14:"reduce_rule_41";}s:10:"<LBRACKET>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:7:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:0:"";i:4;s:2:"$C";i:5;s:0:"";i:6;s:0:"";}s:15:"leftNonTerminal";s:7:"<media>";s:8:"function";s:14:"reduce_rule_41";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:7:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:0:"";i:4;s:2:"$C";i:5;s:0:"";i:6;s:0:"";}s:15:"leftNonTerminal";s:7:"<media>";s:8:"function";s:14:"reduce_rule_41";}}i:218;a:2:{s:11:"<SEMICOLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:0:"";i:3;s:2:"$C";i:4;s:0:"";}s:15:"leftNonTerminal";s:14:"<ddeclaration>";s:8:"function";s:15:"reduce_rule_127";}s:8:"<RBRACE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:0:"";i:3;s:2:"$C";i:4;s:0:"";}s:15:"leftNonTerminal";s:14:"<ddeclaration>";s:8:"function";s:15:"reduce_rule_127";}}i:219;a:22:{s:11:"<SEMICOLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:2:"$B";i:1;s:2:"$C";i:2;s:2:"$D";}s:15:"leftNonTerminal";s:6:"<expr>";s:8:"function";s:15:"reduce_rule_136";}s:8:"<STRING>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:2:"$B";i:1;s:2:"$C";i:2;s:2:"$D";}s:15:"leftNonTerminal";s:6:"<expr>";s:8:"function";s:15:"reduce_rule_136";}s:5:"<URI>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:2:"$B";i:1;s:2:"$C";i:2;s:2:"$D";}s:15:"leftNonTerminal";s:6:"<expr>";s:8:"function";s:15:"reduce_rule_136";}s:7:"<COMMA>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:2:"$B";i:1;s:2:"$C";i:2;s:2:"$D";}s:15:"leftNonTerminal";s:6:"<expr>";s:8:"function";s:15:"reduce_rule_136";}s:8:"<RBRACE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:2:"$B";i:1;s:2:"$C";i:2;s:2:"$D";}s:15:"leftNonTerminal";s:6:"<expr>";s:8:"function";s:15:"reduce_rule_136";}s:7:"<IDENT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:2:"$B";i:1;s:2:"$C";i:2;s:2:"$D";}s:15:"leftNonTerminal";s:6:"<expr>";s:8:"function";s:15:"reduce_rule_136";}s:7:"<SLASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:2:"$B";i:1;s:2:"$C";i:2;s:2:"$D";}s:15:"leftNonTerminal";s:6:"<expr>";s:8:"function";s:15:"reduce_rule_136";}s:6:"<PLUS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:2:"$B";i:1;s:2:"$C";i:2;s:2:"$D";}s:15:"leftNonTerminal";s:6:"<expr>";s:8:"function";s:15:"reduce_rule_136";}s:7:"<MINUS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:2:"$B";i:1;s:2:"$C";i:2;s:2:"$D";}s:15:"leftNonTerminal";s:6:"<expr>";s:8:"function";s:15:"reduce_rule_136";}s:6:"<HASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:2:"$B";i:1;s:2:"$C";i:2;s:2:"$D";}s:15:"leftNonTerminal";s:6:"<expr>";s:8:"function";s:15:"reduce_rule_136";}s:13:"<CSSFUNCTION>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:2:"$B";i:1;s:2:"$C";i:2;s:2:"$D";}s:15:"leftNonTerminal";s:6:"<expr>";s:8:"function";s:15:"reduce_rule_136";}s:8:"<RPAREN>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:2:"$B";i:1;s:2:"$C";i:2;s:2:"$D";}s:15:"leftNonTerminal";s:6:"<expr>";s:8:"function";s:15:"reduce_rule_136";}s:15:"<IMPORTANT_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:2:"$B";i:1;s:2:"$C";i:2;s:2:"$D";}s:15:"leftNonTerminal";s:6:"<expr>";s:8:"function";s:15:"reduce_rule_136";}s:8:"<NUMBER>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:2:"$B";i:1;s:2:"$C";i:2;s:2:"$D";}s:15:"leftNonTerminal";s:6:"<expr>";s:8:"function";s:15:"reduce_rule_136";}s:12:"<PERCENTAGE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:2:"$B";i:1;s:2:"$C";i:2;s:2:"$D";}s:15:"leftNonTerminal";s:6:"<expr>";s:8:"function";s:15:"reduce_rule_136";}s:8:"<LENGTH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:2:"$B";i:1;s:2:"$C";i:2;s:2:"$D";}s:15:"leftNonTerminal";s:6:"<expr>";s:8:"function";s:15:"reduce_rule_136";}s:5:"<EMS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:2:"$B";i:1;s:2:"$C";i:2;s:2:"$D";}s:15:"leftNonTerminal";s:6:"<expr>";s:8:"function";s:15:"reduce_rule_136";}s:5:"<EXS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:2:"$B";i:1;s:2:"$C";i:2;s:2:"$D";}s:15:"leftNonTerminal";s:6:"<expr>";s:8:"function";s:15:"reduce_rule_136";}s:7:"<ANGLE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:2:"$B";i:1;s:2:"$C";i:2;s:2:"$D";}s:15:"leftNonTerminal";s:6:"<expr>";s:8:"function";s:15:"reduce_rule_136";}s:6:"<TIME>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:2:"$B";i:1;s:2:"$C";i:2;s:2:"$D";}s:15:"leftNonTerminal";s:6:"<expr>";s:8:"function";s:15:"reduce_rule_136";}s:6:"<FREQ>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:2:"$B";i:1;s:2:"$C";i:2;s:2:"$D";}s:15:"leftNonTerminal";s:6:"<expr>";s:8:"function";s:15:"reduce_rule_136";}s:11:"<DIMENSION>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:3:{i:0;s:2:"$B";i:1;s:2:"$C";i:2;s:2:"$D";}s:15:"leftNonTerminal";s:6:"<expr>";s:8:"function";s:15:"reduce_rule_136";}}i:220;a:16:{s:8:"<STRING>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:10:"<operator>";s:8:"function";s:14:"reduce_rule_71";}s:5:"<URI>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:10:"<operator>";s:8:"function";s:14:"reduce_rule_71";}s:7:"<IDENT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:10:"<operator>";s:8:"function";s:14:"reduce_rule_71";}s:6:"<PLUS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:10:"<operator>";s:8:"function";s:14:"reduce_rule_71";}s:7:"<MINUS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:10:"<operator>";s:8:"function";s:14:"reduce_rule_71";}s:6:"<HASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:10:"<operator>";s:8:"function";s:14:"reduce_rule_71";}s:13:"<CSSFUNCTION>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:10:"<operator>";s:8:"function";s:14:"reduce_rule_71";}s:8:"<NUMBER>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:10:"<operator>";s:8:"function";s:14:"reduce_rule_71";}s:12:"<PERCENTAGE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:10:"<operator>";s:8:"function";s:14:"reduce_rule_71";}s:8:"<LENGTH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:10:"<operator>";s:8:"function";s:14:"reduce_rule_71";}s:5:"<EMS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:10:"<operator>";s:8:"function";s:14:"reduce_rule_71";}s:5:"<EXS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:10:"<operator>";s:8:"function";s:14:"reduce_rule_71";}s:7:"<ANGLE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:10:"<operator>";s:8:"function";s:14:"reduce_rule_71";}s:6:"<TIME>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:10:"<operator>";s:8:"function";s:14:"reduce_rule_71";}s:6:"<FREQ>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:10:"<operator>";s:8:"function";s:14:"reduce_rule_71";}s:11:"<DIMENSION>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:10:"<operator>";s:8:"function";s:14:"reduce_rule_71";}}i:221;a:16:{s:8:"<STRING>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:10:"<operator>";s:8:"function";s:14:"reduce_rule_73";}s:5:"<URI>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:10:"<operator>";s:8:"function";s:14:"reduce_rule_73";}s:7:"<IDENT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:10:"<operator>";s:8:"function";s:14:"reduce_rule_73";}s:6:"<PLUS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:10:"<operator>";s:8:"function";s:14:"reduce_rule_73";}s:7:"<MINUS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:10:"<operator>";s:8:"function";s:14:"reduce_rule_73";}s:6:"<HASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:10:"<operator>";s:8:"function";s:14:"reduce_rule_73";}s:13:"<CSSFUNCTION>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:10:"<operator>";s:8:"function";s:14:"reduce_rule_73";}s:8:"<NUMBER>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:10:"<operator>";s:8:"function";s:14:"reduce_rule_73";}s:12:"<PERCENTAGE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:10:"<operator>";s:8:"function";s:14:"reduce_rule_73";}s:8:"<LENGTH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:10:"<operator>";s:8:"function";s:14:"reduce_rule_73";}s:5:"<EMS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:10:"<operator>";s:8:"function";s:14:"reduce_rule_73";}s:5:"<EXS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:10:"<operator>";s:8:"function";s:14:"reduce_rule_73";}s:7:"<ANGLE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:10:"<operator>";s:8:"function";s:14:"reduce_rule_73";}s:6:"<TIME>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:10:"<operator>";s:8:"function";s:14:"reduce_rule_73";}s:6:"<FREQ>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:10:"<operator>";s:8:"function";s:14:"reduce_rule_73";}s:11:"<DIMENSION>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:10:"<operator>";s:8:"function";s:14:"reduce_rule_73";}}i:222;a:2:{s:11:"<SEMICOLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<important_sym_sstar>";s:8:"function";s:15:"reduce_rule_133";}s:8:"<RBRACE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:2:{i:0;s:0:"";i:1;s:0:"";}s:15:"leftNonTerminal";s:21:"<important_sym_sstar>";s:8:"function";s:15:"reduce_rule_133";}}i:225;a:9:{s:11:"<MEDIA_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:7:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:0:"";i:4;s:2:"$C";i:5;s:0:"";i:6;s:0:"";}s:15:"leftNonTerminal";s:7:"<ppage>";s:8:"function";s:14:"reduce_rule_56";}s:7:"<IDENT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:7:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:0:"";i:4;s:2:"$C";i:5;s:0:"";i:6;s:0:"";}s:15:"leftNonTerminal";s:7:"<ppage>";s:8:"function";s:14:"reduce_rule_56";}s:10:"<PAGE_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:7:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:0:"";i:4;s:2:"$C";i:5;s:0:"";i:6;s:0:"";}s:15:"leftNonTerminal";s:7:"<ppage>";s:8:"function";s:14:"reduce_rule_56";}s:7:"<COLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:7:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:0:"";i:4;s:2:"$C";i:5;s:0:"";i:6;s:0:"";}s:15:"leftNonTerminal";s:7:"<ppage>";s:8:"function";s:14:"reduce_rule_56";}s:6:"<HASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:7:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:0:"";i:4;s:2:"$C";i:5;s:0:"";i:6;s:0:"";}s:15:"leftNonTerminal";s:7:"<ppage>";s:8:"function";s:14:"reduce_rule_56";}s:5:"<DOT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:7:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:0:"";i:4;s:2:"$C";i:5;s:0:"";i:6;s:0:"";}s:15:"leftNonTerminal";s:7:"<ppage>";s:8:"function";s:14:"reduce_rule_56";}s:6:"<STAR>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:7:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:0:"";i:4;s:2:"$C";i:5;s:0:"";i:6;s:0:"";}s:15:"leftNonTerminal";s:7:"<ppage>";s:8:"function";s:14:"reduce_rule_56";}s:10:"<LBRACKET>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:7:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:0:"";i:4;s:2:"$C";i:5;s:0:"";i:6;s:0:"";}s:15:"leftNonTerminal";s:7:"<ppage>";s:8:"function";s:14:"reduce_rule_56";}s:0:"";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:7:{i:0;s:0:"";i:1;s:2:"$B";i:2;s:0:"";i:3;s:0:"";i:4;s:2:"$C";i:5;s:0:"";i:6;s:0:"";}s:15:"leftNonTerminal";s:7:"<ppage>";s:8:"function";s:14:"reduce_rule_56";}}i:227;a:22:{s:11:"<SEMICOLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:2:"$B";i:1;s:2:"$C";i:2;s:0:"";i:3;s:0:"";}s:15:"leftNonTerminal";s:10:"<function>";s:8:"function";s:15:"reduce_rule_171";}s:8:"<STRING>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:2:"$B";i:1;s:2:"$C";i:2;s:0:"";i:3;s:0:"";}s:15:"leftNonTerminal";s:10:"<function>";s:8:"function";s:15:"reduce_rule_171";}s:5:"<URI>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:2:"$B";i:1;s:2:"$C";i:2;s:0:"";i:3;s:0:"";}s:15:"leftNonTerminal";s:10:"<function>";s:8:"function";s:15:"reduce_rule_171";}s:7:"<COMMA>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:2:"$B";i:1;s:2:"$C";i:2;s:0:"";i:3;s:0:"";}s:15:"leftNonTerminal";s:10:"<function>";s:8:"function";s:15:"reduce_rule_171";}s:8:"<RBRACE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:2:"$B";i:1;s:2:"$C";i:2;s:0:"";i:3;s:0:"";}s:15:"leftNonTerminal";s:10:"<function>";s:8:"function";s:15:"reduce_rule_171";}s:7:"<IDENT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:2:"$B";i:1;s:2:"$C";i:2;s:0:"";i:3;s:0:"";}s:15:"leftNonTerminal";s:10:"<function>";s:8:"function";s:15:"reduce_rule_171";}s:7:"<SLASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:2:"$B";i:1;s:2:"$C";i:2;s:0:"";i:3;s:0:"";}s:15:"leftNonTerminal";s:10:"<function>";s:8:"function";s:15:"reduce_rule_171";}s:6:"<PLUS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:2:"$B";i:1;s:2:"$C";i:2;s:0:"";i:3;s:0:"";}s:15:"leftNonTerminal";s:10:"<function>";s:8:"function";s:15:"reduce_rule_171";}s:7:"<MINUS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:2:"$B";i:1;s:2:"$C";i:2;s:0:"";i:3;s:0:"";}s:15:"leftNonTerminal";s:10:"<function>";s:8:"function";s:15:"reduce_rule_171";}s:6:"<HASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:2:"$B";i:1;s:2:"$C";i:2;s:0:"";i:3;s:0:"";}s:15:"leftNonTerminal";s:10:"<function>";s:8:"function";s:15:"reduce_rule_171";}s:13:"<CSSFUNCTION>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:2:"$B";i:1;s:2:"$C";i:2;s:0:"";i:3;s:0:"";}s:15:"leftNonTerminal";s:10:"<function>";s:8:"function";s:15:"reduce_rule_171";}s:8:"<RPAREN>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:2:"$B";i:1;s:2:"$C";i:2;s:0:"";i:3;s:0:"";}s:15:"leftNonTerminal";s:10:"<function>";s:8:"function";s:15:"reduce_rule_171";}s:15:"<IMPORTANT_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:2:"$B";i:1;s:2:"$C";i:2;s:0:"";i:3;s:0:"";}s:15:"leftNonTerminal";s:10:"<function>";s:8:"function";s:15:"reduce_rule_171";}s:8:"<NUMBER>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:2:"$B";i:1;s:2:"$C";i:2;s:0:"";i:3;s:0:"";}s:15:"leftNonTerminal";s:10:"<function>";s:8:"function";s:15:"reduce_rule_171";}s:12:"<PERCENTAGE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:2:"$B";i:1;s:2:"$C";i:2;s:0:"";i:3;s:0:"";}s:15:"leftNonTerminal";s:10:"<function>";s:8:"function";s:15:"reduce_rule_171";}s:8:"<LENGTH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:2:"$B";i:1;s:2:"$C";i:2;s:0:"";i:3;s:0:"";}s:15:"leftNonTerminal";s:10:"<function>";s:8:"function";s:15:"reduce_rule_171";}s:5:"<EMS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:2:"$B";i:1;s:2:"$C";i:2;s:0:"";i:3;s:0:"";}s:15:"leftNonTerminal";s:10:"<function>";s:8:"function";s:15:"reduce_rule_171";}s:5:"<EXS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:2:"$B";i:1;s:2:"$C";i:2;s:0:"";i:3;s:0:"";}s:15:"leftNonTerminal";s:10:"<function>";s:8:"function";s:15:"reduce_rule_171";}s:7:"<ANGLE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:2:"$B";i:1;s:2:"$C";i:2;s:0:"";i:3;s:0:"";}s:15:"leftNonTerminal";s:10:"<function>";s:8:"function";s:15:"reduce_rule_171";}s:6:"<TIME>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:2:"$B";i:1;s:2:"$C";i:2;s:0:"";i:3;s:0:"";}s:15:"leftNonTerminal";s:10:"<function>";s:8:"function";s:15:"reduce_rule_171";}s:6:"<FREQ>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:2:"$B";i:1;s:2:"$C";i:2;s:0:"";i:3;s:0:"";}s:15:"leftNonTerminal";s:10:"<function>";s:8:"function";s:15:"reduce_rule_171";}s:11:"<DIMENSION>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:4:{i:0;s:2:"$B";i:1;s:2:"$C";i:2;s:0:"";i:3;s:0:"";}s:15:"leftNonTerminal";s:10:"<function>";s:8:"function";s:15:"reduce_rule_171";}}i:228;a:22:{s:11:"<SEMICOLON>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:2:"$C";i:3;s:0:"";i:4;s:0:"";}s:15:"leftNonTerminal";s:10:"<function>";s:8:"function";s:15:"reduce_rule_169";}s:8:"<STRING>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:2:"$C";i:3;s:0:"";i:4;s:0:"";}s:15:"leftNonTerminal";s:10:"<function>";s:8:"function";s:15:"reduce_rule_169";}s:5:"<URI>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:2:"$C";i:3;s:0:"";i:4;s:0:"";}s:15:"leftNonTerminal";s:10:"<function>";s:8:"function";s:15:"reduce_rule_169";}s:7:"<COMMA>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:2:"$C";i:3;s:0:"";i:4;s:0:"";}s:15:"leftNonTerminal";s:10:"<function>";s:8:"function";s:15:"reduce_rule_169";}s:8:"<RBRACE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:2:"$C";i:3;s:0:"";i:4;s:0:"";}s:15:"leftNonTerminal";s:10:"<function>";s:8:"function";s:15:"reduce_rule_169";}s:7:"<IDENT>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:2:"$C";i:3;s:0:"";i:4;s:0:"";}s:15:"leftNonTerminal";s:10:"<function>";s:8:"function";s:15:"reduce_rule_169";}s:7:"<SLASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:2:"$C";i:3;s:0:"";i:4;s:0:"";}s:15:"leftNonTerminal";s:10:"<function>";s:8:"function";s:15:"reduce_rule_169";}s:6:"<PLUS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:2:"$C";i:3;s:0:"";i:4;s:0:"";}s:15:"leftNonTerminal";s:10:"<function>";s:8:"function";s:15:"reduce_rule_169";}s:7:"<MINUS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:2:"$C";i:3;s:0:"";i:4;s:0:"";}s:15:"leftNonTerminal";s:10:"<function>";s:8:"function";s:15:"reduce_rule_169";}s:6:"<HASH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:2:"$C";i:3;s:0:"";i:4;s:0:"";}s:15:"leftNonTerminal";s:10:"<function>";s:8:"function";s:15:"reduce_rule_169";}s:13:"<CSSFUNCTION>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:2:"$C";i:3;s:0:"";i:4;s:0:"";}s:15:"leftNonTerminal";s:10:"<function>";s:8:"function";s:15:"reduce_rule_169";}s:8:"<RPAREN>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:2:"$C";i:3;s:0:"";i:4;s:0:"";}s:15:"leftNonTerminal";s:10:"<function>";s:8:"function";s:15:"reduce_rule_169";}s:15:"<IMPORTANT_SYM>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:2:"$C";i:3;s:0:"";i:4;s:0:"";}s:15:"leftNonTerminal";s:10:"<function>";s:8:"function";s:15:"reduce_rule_169";}s:8:"<NUMBER>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:2:"$C";i:3;s:0:"";i:4;s:0:"";}s:15:"leftNonTerminal";s:10:"<function>";s:8:"function";s:15:"reduce_rule_169";}s:12:"<PERCENTAGE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:2:"$C";i:3;s:0:"";i:4;s:0:"";}s:15:"leftNonTerminal";s:10:"<function>";s:8:"function";s:15:"reduce_rule_169";}s:8:"<LENGTH>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:2:"$C";i:3;s:0:"";i:4;s:0:"";}s:15:"leftNonTerminal";s:10:"<function>";s:8:"function";s:15:"reduce_rule_169";}s:5:"<EMS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:2:"$C";i:3;s:0:"";i:4;s:0:"";}s:15:"leftNonTerminal";s:10:"<function>";s:8:"function";s:15:"reduce_rule_169";}s:5:"<EXS>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:2:"$C";i:3;s:0:"";i:4;s:0:"";}s:15:"leftNonTerminal";s:10:"<function>";s:8:"function";s:15:"reduce_rule_169";}s:7:"<ANGLE>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:2:"$C";i:3;s:0:"";i:4;s:0:"";}s:15:"leftNonTerminal";s:10:"<function>";s:8:"function";s:15:"reduce_rule_169";}s:6:"<TIME>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:2:"$C";i:3;s:0:"";i:4;s:0:"";}s:15:"leftNonTerminal";s:10:"<function>";s:8:"function";s:15:"reduce_rule_169";}s:6:"<FREQ>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:2:"$C";i:3;s:0:"";i:4;s:0:"";}s:15:"leftNonTerminal";s:10:"<function>";s:8:"function";s:15:"reduce_rule_169";}s:11:"<DIMENSION>";a:4:{s:6:"action";s:6:"reduce";s:7:"symbols";a:5:{i:0;s:2:"$B";i:1;s:0:"";i:2;s:2:"$C";i:3;s:0:"";i:4;s:0:"";}s:15:"leftNonTerminal";s:10:"<function>";s:8:"function";s:15:"reduce_rule_169";}}}');
    }
    /* }}} */
    /* reduce_rule_2 {{{ */
    /**
     * Reduction function for rule 2 
     *
     * Rule 2 is:
     * <stylesheet>-><stylesheet_1>
     *
     * @param Text_Tokenizer_Token Token of type '<stylesheet_1>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<stylesheet>' token
     */
    protected function &reduce_rule_2(&$B)
    {
        require_once('Text/Tokenizer/Token.php');
        require_once('Structures/CSS.php');
    $result = new Structures_CSS($a = array(), $B->getValue());
        $result =& new Text_Tokenizer_Token('<stylesheet>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_3 {{{ */
    /**
     * Reduction function for rule 3 
     *
     * Rule 3 is:
     * <stylesheet>-><stylesheet_2>
     *
     * @param Text_Tokenizer_Token Token of type '<stylesheet_2>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<stylesheet>' token
     */
    protected function &reduce_rule_3(&$B)
    {
        require_once('Text/Tokenizer/Token.php');
        require_once('Structures/CSS.php');
    $result = new Structures_CSS($B->getValue());
        $result =& new Text_Tokenizer_Token('<stylesheet>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_173 {{{ */
    /**
     * Reduction function for rule 173 
     *
     * Rule 173 is:
     * <stylesheet>-><placeholder>
     *
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<stylesheet>' token
     */
    protected function &reduce_rule_173()
    {
        require_once('Text/Tokenizer/Token.php');
        $result = '';
        $result =& new Text_Tokenizer_Token('<stylesheet>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_5 {{{ */
    /**
     * Reduction function for rule 5 
     *
     * Rule 5 is:
     * <stylesheet_1>-><s_cdo_cdc_plus>
     *
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<stylesheet_1>' token
     */
    protected function &reduce_rule_5()
    {
        require_once('Text/Tokenizer/Token.php');
        $result = null;
        $result =& new Text_Tokenizer_Token('<stylesheet_1>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_19 {{{ */
    /**
     * Reduction function for rule 19 
     *
     * Rule 19 is:
     * <stylesheet_2>-><stylesheet_ruleset_media_page>
     *
     * @param Text_Tokenizer_Token Token of type '<stylesheet_ruleset_media_page>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<stylesheet_2>' token
     */
    protected function &reduce_rule_19(&$B)
    {
        require_once('Text/Tokenizer/Token.php');
        $result =& $B->getValue();
        $result =& new Text_Tokenizer_Token('<stylesheet_2>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_174 {{{ */
    /**
     * Reduction function for rule 174 
     *
     * Rule 174 is:
     * <placeholder>-><COMMENT>
     *
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<placeholder>' token
     */
    protected function &reduce_rule_174()
    {
        require_once('Text/Tokenizer/Token.php');
        $result = '';
        $result =& new Text_Tokenizer_Token('<placeholder>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_13 {{{ */
    /**
     * Reduction function for rule 13 
     *
     * Rule 13 is:
     * <s_cdo_cdc_plus>-><s_cdo_cdc>
     *
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<s_cdo_cdc_plus>' token
     */
    protected function &reduce_rule_13()
    {
        require_once('Text/Tokenizer/Token.php');
        $result = '';
        $result =& new Text_Tokenizer_Token('<s_cdo_cdc_plus>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_21 {{{ */
    /**
     * Reduction function for rule 21 
     *
     * Rule 21 is:
     * <stylesheet_import>-><import>
     *
     * @param Text_Tokenizer_Token Token of type '<import>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<stylesheet_import>' token
     */
    protected function &reduce_rule_21(&$B)
    {
        require_once('Text/Tokenizer/Token.php');
        $result =& $B->getValue();
        $result =& new Text_Tokenizer_Token('<stylesheet_import>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_24 {{{ */
    /**
     * Reduction function for rule 24 
     *
     * Rule 24 is:
     * <stylesheet_ruleset_media_page>-><ruleset>
     *
     * @param Text_Tokenizer_Token Token of type '<ruleset>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<stylesheet_ruleset_media_page>' token
     */
    protected function &reduce_rule_24(&$B)
    {
        require_once('Text/Tokenizer/Token.php');
        $result =& $B->getValue();
        $result =& new Text_Tokenizer_Token('<stylesheet_ruleset_media_page>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_25 {{{ */
    /**
     * Reduction function for rule 25 
     *
     * Rule 25 is:
     * <stylesheet_ruleset_media_page>-><media>
     *
     * @param Text_Tokenizer_Token Token of type '<media>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<stylesheet_ruleset_media_page>' token
     */
    protected function &reduce_rule_25(&$B)
    {
        require_once('Text/Tokenizer/Token.php');
        $result =& $B->getValue();
        $result =& new Text_Tokenizer_Token('<stylesheet_ruleset_media_page>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_26 {{{ */
    /**
     * Reduction function for rule 26 
     *
     * Rule 26 is:
     * <stylesheet_ruleset_media_page>-><page>
     *
     * @param Text_Tokenizer_Token Token of type '<page>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<stylesheet_ruleset_media_page>' token
     */
    protected function &reduce_rule_26(&$B)
    {
        require_once('Text/Tokenizer/Token.php');
        $result =& $B->getValue();
        $result =& new Text_Tokenizer_Token('<stylesheet_ruleset_media_page>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_7 {{{ */
    /**
     * Reduction function for rule 7 
     *
     * Rule 7 is:
     * <charset_sym_sstar>-><CHARSET_SYM>
     *
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<charset_sym_sstar>' token
     */
    protected function &reduce_rule_7()
    {
        require_once('Text/Tokenizer/Token.php');
        $result = '';
        $result =& new Text_Tokenizer_Token('<charset_sym_sstar>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_15 {{{ */
    /**
     * Reduction function for rule 15 
     *
     * Rule 15 is:
     * <s_cdo_cdc>-><SS>
     *
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<s_cdo_cdc>' token
     */
    protected function &reduce_rule_15()
    {
        require_once('Text/Tokenizer/Token.php');
        $result = '';
        $result =& new Text_Tokenizer_Token('<s_cdo_cdc>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_16 {{{ */
    /**
     * Reduction function for rule 16 
     *
     * Rule 16 is:
     * <s_cdo_cdc>-><CDO>
     *
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<s_cdo_cdc>' token
     */
    protected function &reduce_rule_16()
    {
        require_once('Text/Tokenizer/Token.php');
        $result = '';
        $result =& new Text_Tokenizer_Token('<s_cdo_cdc>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_17 {{{ */
    /**
     * Reduction function for rule 17 
     *
     * Rule 17 is:
     * <s_cdo_cdc>-><CDC>
     *
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<s_cdo_cdc>' token
     */
    protected function &reduce_rule_17()
    {
        require_once('Text/Tokenizer/Token.php');
        $result = '';
        $result =& new Text_Tokenizer_Token('<s_cdo_cdc>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_81 {{{ */
    /**
     * Reduction function for rule 81 
     *
     * Rule 81 is:
     * <ruleset>-><rruleset>
     *
     * @param Text_Tokenizer_Token Token of type '<rruleset>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<ruleset>' token
     */
    protected function &reduce_rule_81(&$B)
    {
        require_once('Text/Tokenizer/Token.php');
        require_once('Structures/CSS/Rule/Set.php');
    $B = $B->getValue();
    $result = array();
    $clone = null;
    foreach ($B['selectors'] as $selector) {
        if (!is_null($clone)) $B['declarations'] = unserialize($clone);
        $result[] = new Structures_CSS_Rule_Set($selector, $B['declarations']);
        if (is_null($clone)) $clone = serialize($B['declarations']);
    }
    unset($clone);
        $result =& new Text_Tokenizer_Token('<ruleset>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_54 {{{ */
    /**
     * Reduction function for rule 54 
     *
     * Rule 54 is:
     * <page>-><ppage>
     *
     * @param Text_Tokenizer_Token Token of type '<ppage>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<page>' token
     */
    protected function &reduce_rule_54(&$B)
    {
        require_once('Text/Tokenizer/Token.php');
        $B = $B->getValue();
    require_once('Structures/CSS/Rule/AtPage.php');
    $result = array(new Structures_CSS_Rule_AtPage($B['declarations'], $B['pseudo']));;
        $result =& new Text_Tokenizer_Token('<page>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_32 {{{ */
    /**
     * Reduction function for rule 32 
     *
     * Rule 32 is:
     * <import_sym_sstar>-><IMPORT_SYM>
     *
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<import_sym_sstar>' token
     */
    protected function &reduce_rule_32()
    {
        require_once('Text/Tokenizer/Token.php');
        $result = '';
        $result =& new Text_Tokenizer_Token('<import_sym_sstar>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_48 {{{ */
    /**
     * Reduction function for rule 48 
     *
     * Rule 48 is:
     * <media_sym_sstar>-><MEDIA_SYM>
     *
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<media_sym_sstar>' token
     */
    protected function &reduce_rule_48()
    {
        require_once('Text/Tokenizer/Token.php');
        $result = '';
        $result =& new Text_Tokenizer_Token('<media_sym_sstar>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_84 {{{ */
    /**
     * Reduction function for rule 84 
     *
     * Rule 84 is:
     * <selectors>-><selector>
     *
     * @param Text_Tokenizer_Token Token of type '<selector>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<selectors>' token
     */
    protected function &reduce_rule_84(&$B)
    {
        require_once('Text/Tokenizer/Token.php');
        $result = array($B->getValue());
        $result =& new Text_Tokenizer_Token('<selectors>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_61 {{{ */
    /**
     * Reduction function for rule 61 
     *
     * Rule 61 is:
     * <pagesym_sstar>-><PAGE_SYM>
     *
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<pagesym_sstar>' token
     */
    protected function &reduce_rule_61()
    {
        require_once('Text/Tokenizer/Token.php');
        $result = '';
        $result =& new Text_Tokenizer_Token('<pagesym_sstar>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_92 {{{ */
    /**
     * Reduction function for rule 92 
     *
     * Rule 92 is:
     * <selector>-><simple_selector>
     *
     * @param Text_Tokenizer_Token Token of type '<simple_selector>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<selector>' token
     */
    protected function &reduce_rule_92(&$B)
    {
        require_once('Text/Tokenizer/Token.php');
        $result =& $B->getValue();
        $result =& new Text_Tokenizer_Token('<selector>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_94 {{{ */
    /**
     * Reduction function for rule 94 
     *
     * Rule 94 is:
     * <simple_selector>-><element_name>
     *
     * @param Text_Tokenizer_Token Token of type '<element_name>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<simple_selector>' token
     */
    protected function &reduce_rule_94(&$B)
    {
        require_once('Text/Tokenizer/Token.php');
        require_once('Structures/CSS/Selector.php');
    $result = new Structures_CSS_Selector(strtolower($B->getValue()), Structures_CSS_Selector::C);
        $result =& new Text_Tokenizer_Token('<simple_selector>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_96 {{{ */
    /**
     * Reduction function for rule 96 
     *
     * Rule 96 is:
     * <simple_selector>-><hash_class_attrib_pseudo_plus>
     *
     * @param Text_Tokenizer_Token Token of type '<hash_class_attrib_pseudo_plus>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<simple_selector>' token
     */
    protected function &reduce_rule_96(&$B)
    {
        require_once('Text/Tokenizer/Token.php');
        $result =& $B->getValue();
        $result =& new Text_Tokenizer_Token('<simple_selector>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_104 {{{ */
    /**
     * Reduction function for rule 104 
     *
     * Rule 104 is:
     * <element_name>-><IDENT>
     *
     * @param Text_Tokenizer_Token Token of type '<IDENT>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<element_name>' token
     */
    protected function &reduce_rule_104(&$B)
    {
        require_once('Text/Tokenizer/Token.php');
        $result =& $B->getValue();
        $result =& new Text_Tokenizer_Token('<element_name>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_105 {{{ */
    /**
     * Reduction function for rule 105 
     *
     * Rule 105 is:
     * <element_name>-><STAR>
     *
     * @param Text_Tokenizer_Token Token of type '<STAR>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<element_name>' token
     */
    protected function &reduce_rule_105(&$B)
    {
        require_once('Text/Tokenizer/Token.php');
        $result =& $B->getValue();
        $result =& new Text_Tokenizer_Token('<element_name>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_97 {{{ */
    /**
     * Reduction function for rule 97 
     *
     * Rule 97 is:
     * <hash_class_attrib_pseudo_plus>-><hash_class_attrib_pseudo>
     *
     * @param Text_Tokenizer_Token Token of type '<hash_class_attrib_pseudo>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<hash_class_attrib_pseudo_plus>' token
     */
    protected function &reduce_rule_97(&$B)
    {
        require_once('Text/Tokenizer/Token.php');
        $result =& $B->getValue();
        $result =& new Text_Tokenizer_Token('<hash_class_attrib_pseudo_plus>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_99 {{{ */
    /**
     * Reduction function for rule 99 
     *
     * Rule 99 is:
     * <hash_class_attrib_pseudo>-><HASH>
     *
     * @param Text_Tokenizer_Token Token of type '<HASH>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<hash_class_attrib_pseudo>' token
     */
    protected function &reduce_rule_99(&$B)
    {
        require_once('Text/Tokenizer/Token.php');
        require_once('Structures/CSS/Selector.php');
    $result = new Structures_CSS_Selector($B->getValue(), 1000000);
        $result =& new Text_Tokenizer_Token('<hash_class_attrib_pseudo>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_100 {{{ */
    /**
     * Reduction function for rule 100 
     *
     * Rule 100 is:
     * <hash_class_attrib_pseudo>-><class>
     *
     * @param Text_Tokenizer_Token Token of type '<class>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<hash_class_attrib_pseudo>' token
     */
    protected function &reduce_rule_100(&$B)
    {
        require_once('Text/Tokenizer/Token.php');
        require_once('Structures/CSS/Selector.php');
    $result = new Structures_CSS_Selector($B->getValue(), 1000);
        $result =& new Text_Tokenizer_Token('<hash_class_attrib_pseudo>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_101 {{{ */
    /**
     * Reduction function for rule 101 
     *
     * Rule 101 is:
     * <hash_class_attrib_pseudo>-><attrib>
     *
     * @param Text_Tokenizer_Token Token of type '<attrib>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<hash_class_attrib_pseudo>' token
     */
    protected function &reduce_rule_101(&$B)
    {
        require_once('Text/Tokenizer/Token.php');
        require_once('Structures/CSS/Selector.php');
    $result = new Structures_CSS_Selector($B->getValue(), 1000);
        $result =& new Text_Tokenizer_Token('<hash_class_attrib_pseudo>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_102 {{{ */
    /**
     * Reduction function for rule 102 
     *
     * Rule 102 is:
     * <hash_class_attrib_pseudo>-><pseudo>
     *
     * @param Text_Tokenizer_Token Token of type '<pseudo>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<hash_class_attrib_pseudo>' token
     */
    protected function &reduce_rule_102(&$B)
    {
        require_once('Text/Tokenizer/Token.php');
        require_once('Structures/CSS/Selector.php');
    $result = new Structures_CSS_Selector($B->getValue(), 1000);
        $result =& new Text_Tokenizer_Token('<hash_class_attrib_pseudo>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_1 {{{ */
    /**
     * Reduction function for rule 1 
     *
     * Rule 1 is:
     * <stylesheet>-><stylesheet_1><stylesheet_2>
     *
     * @param Text_Tokenizer_Token Token of type '<stylesheet_1>'
     * @param Text_Tokenizer_Token Token of type '<stylesheet_2>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<stylesheet>' token
     */
    protected function &reduce_rule_1(&$B,&$C)
    {
        require_once('Text/Tokenizer/Token.php');
        require_once('Structures/CSS.php');
    $result = new Structures_CSS($C->getValue(), $B->getValue());
        $result =& new Text_Tokenizer_Token('<stylesheet>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_4 {{{ */
    /**
     * Reduction function for rule 4 
     *
     * Rule 4 is:
     * <stylesheet_1>-><stylesheet_charset><s_cdo_cdc_plus>
     *
     * @param Text_Tokenizer_Token Token of type '<stylesheet_charset>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<stylesheet_1>' token
     */
    protected function &reduce_rule_4(&$B)
    {
        require_once('Text/Tokenizer/Token.php');
        $result =& $B->getValue();
        $result =& new Text_Tokenizer_Token('<stylesheet_1>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_14 {{{ */
    /**
     * Reduction function for rule 14 
     *
     * Rule 14 is:
     * <s_cdo_cdc_plus>-><s_cdo_cdc_plus><s_cdo_cdc>
     *
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<s_cdo_cdc_plus>' token
     */
    protected function &reduce_rule_14()
    {
        require_once('Text/Tokenizer/Token.php');
        $result = '';
        $result =& new Text_Tokenizer_Token('<s_cdo_cdc_plus>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_18 {{{ */
    /**
     * Reduction function for rule 18 
     *
     * Rule 18 is:
     * <stylesheet_2>-><stylesheet_import><stylesheet_ruleset_media_page>
     *
     * @param Text_Tokenizer_Token Token of type '<stylesheet_import>'
     * @param Text_Tokenizer_Token Token of type '<stylesheet_ruleset_media_page>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<stylesheet_2>' token
     */
    protected function &reduce_rule_18(&$B,&$C)
    {
        require_once('Text/Tokenizer/Token.php');
        $result = array_merge((array) $B->getValue(), (array) $C->getValue());
        $result =& new Text_Tokenizer_Token('<stylesheet_2>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_23 {{{ */
    /**
     * Reduction function for rule 23 
     *
     * Rule 23 is:
     * <stylesheet_import>-><stylesheet_import><import>
     *
     * @param Text_Tokenizer_Token Token of type '<stylesheet_import>'
     * @param Text_Tokenizer_Token Token of type '<import>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<stylesheet_import>' token
     */
    protected function &reduce_rule_23(&$B,&$C)
    {
        require_once('Text/Tokenizer/Token.php');
        $result = array_merge((array) $B->getValue(), (array) $C->getValue());
        $result =& new Text_Tokenizer_Token('<stylesheet_import>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_27 {{{ */
    /**
     * Reduction function for rule 27 
     *
     * Rule 27 is:
     * <stylesheet_ruleset_media_page>-><stylesheet_ruleset_media_page><ruleset>
     *
     * @param Text_Tokenizer_Token Token of type '<stylesheet_ruleset_media_page>'
     * @param Text_Tokenizer_Token Token of type '<ruleset>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<stylesheet_ruleset_media_page>' token
     */
    protected function &reduce_rule_27(&$B,&$C)
    {
        require_once('Text/Tokenizer/Token.php');
        $result = array_merge((array) $B->getValue(), (array) $C->getValue());
        $result =& new Text_Tokenizer_Token('<stylesheet_ruleset_media_page>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_28 {{{ */
    /**
     * Reduction function for rule 28 
     *
     * Rule 28 is:
     * <stylesheet_ruleset_media_page>-><stylesheet_ruleset_media_page><media>
     *
     * @param Text_Tokenizer_Token Token of type '<stylesheet_ruleset_media_page>'
     * @param Text_Tokenizer_Token Token of type '<media>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<stylesheet_ruleset_media_page>' token
     */
    protected function &reduce_rule_28(&$B,&$C)
    {
        require_once('Text/Tokenizer/Token.php');
        $result = array_merge((array) $B->getValue(), (array) $C->getValue());
        $result =& new Text_Tokenizer_Token('<stylesheet_ruleset_media_page>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_29 {{{ */
    /**
     * Reduction function for rule 29 
     *
     * Rule 29 is:
     * <stylesheet_ruleset_media_page>-><stylesheet_ruleset_media_page><page>
     *
     * @param Text_Tokenizer_Token Token of type '<stylesheet_ruleset_media_page>'
     * @param Text_Tokenizer_Token Token of type '<page>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<stylesheet_ruleset_media_page>' token
     */
    protected function &reduce_rule_29(&$B,&$C)
    {
        require_once('Text/Tokenizer/Token.php');
        $result = array_merge((array) $B->getValue(), (array) $C->getValue());
        $result =& new Text_Tokenizer_Token('<stylesheet_ruleset_media_page>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_11 {{{ */
    /**
     * Reduction function for rule 11 
     *
     * Rule 11 is:
     * <string_sstar>-><STRING>
     *
     * @param Text_Tokenizer_Token Token of type '<STRING>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<string_sstar>' token
     */
    protected function &reduce_rule_11(&$B)
    {
        require_once('Text/Tokenizer/Token.php');
        $result = '';
        $result =& new Text_Tokenizer_Token('<string_sstar>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_20 {{{ */
    /**
     * Reduction function for rule 20 
     *
     * Rule 20 is:
     * <stylesheet_import>-><import><s_cdo_cdc_plus>
     *
     * @param Text_Tokenizer_Token Token of type '<import>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<stylesheet_import>' token
     */
    protected function &reduce_rule_20(&$B)
    {
        require_once('Text/Tokenizer/Token.php');
        $result =& $B->getValue();
        $result =& new Text_Tokenizer_Token('<stylesheet_import>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_8 {{{ */
    /**
     * Reduction function for rule 8 
     *
     * Rule 8 is:
     * <charset_sym_sstar>-><CHARSET_SYM><splus>
     *
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<charset_sym_sstar>' token
     */
    protected function &reduce_rule_8()
    {
        require_once('Text/Tokenizer/Token.php');
        $result = '';
        $result =& new Text_Tokenizer_Token('<charset_sym_sstar>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_9 {{{ */
    /**
     * Reduction function for rule 9 
     *
     * Rule 9 is:
     * <splus>-><SS>
     *
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<splus>' token
     */
    protected function &reduce_rule_9()
    {
        require_once('Text/Tokenizer/Token.php');
        $result = '';
        $result =& new Text_Tokenizer_Token('<splus>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_34 {{{ */
    /**
     * Reduction function for rule 34 
     *
     * Rule 34 is:
     * <string_or_uri_sstar>-><string_sstar>
     *
     * @param Text_Tokenizer_Token Token of type '<string_sstar>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<string_or_uri_sstar>' token
     */
    protected function &reduce_rule_34(&$B)
    {
        require_once('Text/Tokenizer/Token.php');
        $result =& $B->getValue();
        $result =& new Text_Tokenizer_Token('<string_or_uri_sstar>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_36 {{{ */
    /**
     * Reduction function for rule 36 
     *
     * Rule 36 is:
     * <string_or_uri_sstar>-><URI>
     *
     * @param Text_Tokenizer_Token Token of type '<URI>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<string_or_uri_sstar>' token
     */
    protected function &reduce_rule_36(&$B)
    {
        require_once('Text/Tokenizer/Token.php');
        $result =& $B->getValue();
        $result =& new Text_Tokenizer_Token('<string_or_uri_sstar>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_37 {{{ */
    /**
     * Reduction function for rule 37 
     *
     * Rule 37 is:
     * <medialist>-><medium>
     *
     * @param Text_Tokenizer_Token Token of type '<medium>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<medialist>' token
     */
    protected function &reduce_rule_37(&$B)
    {
        require_once('Text/Tokenizer/Token.php');
        $result = array($B->getValue());
        $result =& new Text_Tokenizer_Token('<medialist>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_52 {{{ */
    /**
     * Reduction function for rule 52 
     *
     * Rule 52 is:
     * <medium>-><IDENT>
     *
     * @param Text_Tokenizer_Token Token of type '<IDENT>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<medium>' token
     */
    protected function &reduce_rule_52(&$B)
    {
        require_once('Text/Tokenizer/Token.php');
        $result =& $B->getValue();
        $result =& new Text_Tokenizer_Token('<medium>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_33 {{{ */
    /**
     * Reduction function for rule 33 
     *
     * Rule 33 is:
     * <import_sym_sstar>-><IMPORT_SYM><splus>
     *
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<import_sym_sstar>' token
     */
    protected function &reduce_rule_33()
    {
        require_once('Text/Tokenizer/Token.php');
        $result = '';
        $result =& new Text_Tokenizer_Token('<import_sym_sstar>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_86 {{{ */
    /**
     * Reduction function for rule 86 
     *
     * Rule 86 is:
     * <comma_sstar>-><COMMA>
     *
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<comma_sstar>' token
     */
    protected function &reduce_rule_86()
    {
        require_once('Text/Tokenizer/Token.php');
        $result = '';
        $result =& new Text_Tokenizer_Token('<comma_sstar>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_49 {{{ */
    /**
     * Reduction function for rule 49 
     *
     * Rule 49 is:
     * <media_sym_sstar>-><MEDIA_SYM><splus>
     *
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<media_sym_sstar>' token
     */
    protected function &reduce_rule_49()
    {
        require_once('Text/Tokenizer/Token.php');
        $result = '';
        $result =& new Text_Tokenizer_Token('<media_sym_sstar>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_62 {{{ */
    /**
     * Reduction function for rule 62 
     *
     * Rule 62 is:
     * <pagesym_sstar>-><PAGE_SYM><splus>
     *
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<pagesym_sstar>' token
     */
    protected function &reduce_rule_62()
    {
        require_once('Text/Tokenizer/Token.php');
        $result = '';
        $result =& new Text_Tokenizer_Token('<pagesym_sstar>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_76 {{{ */
    /**
     * Reduction function for rule 76 
     *
     * Rule 76 is:
     * <combinator>-><SS>
     *
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<combinator>' token
     */
    protected function &reduce_rule_76()
    {
        require_once('Text/Tokenizer/Token.php');
        $result = ' ';
        $result =& new Text_Tokenizer_Token('<combinator>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_95 {{{ */
    /**
     * Reduction function for rule 95 
     *
     * Rule 95 is:
     * <simple_selector>-><element_name><hash_class_attrib_pseudo_plus>
     *
     * @param Text_Tokenizer_Token Token of type '<element_name>'
     * @param Text_Tokenizer_Token Token of type '<hash_class_attrib_pseudo_plus>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<simple_selector>' token
     */
    protected function &reduce_rule_95(&$B,&$D)
    {
        require_once('Text/Tokenizer/Token.php');
        require_once('Structures/CSS/Selector.php');
    $result = new Structures_CSS_Selector(strtolower($B->getValue()), Structures_CSS_Selector::C); 
    $result->appendSelector($D->getValue(), '');
        $result =& new Text_Tokenizer_Token('<simple_selector>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_98 {{{ */
    /**
     * Reduction function for rule 98 
     *
     * Rule 98 is:
     * <hash_class_attrib_pseudo_plus>-><hash_class_attrib_pseudo_plus><hash_class_attrib_pseudo>
     *
     * @param Text_Tokenizer_Token Token of type '<hash_class_attrib_pseudo_plus>'
     * @param Text_Tokenizer_Token Token of type '<hash_class_attrib_pseudo>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<hash_class_attrib_pseudo_plus>' token
     */
    protected function &reduce_rule_98(&$B,&$C)
    {
        require_once('Text/Tokenizer/Token.php');
        $result =& $B->getValue();
    $result->appendSelector($C->getValue(), '');
        $result =& new Text_Tokenizer_Token('<hash_class_attrib_pseudo_plus>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_103 {{{ */
    /**
     * Reduction function for rule 103 
     *
     * Rule 103 is:
     * <class>-><DOT><IDENT>
     *
     * @param Text_Tokenizer_Token Token of type '<IDENT>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<class>' token
     */
    protected function &reduce_rule_103(&$B)
    {
        require_once('Text/Tokenizer/Token.php');
        $result = '.' . $B->getValue();
        $result =& new Text_Tokenizer_Token('<class>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_109 {{{ */
    /**
     * Reduction function for rule 109 
     *
     * Rule 109 is:
     * <trimmed_ident>-><IDENT>
     *
     * @param Text_Tokenizer_Token Token of type '<IDENT>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<trimmed_ident>' token
     */
    protected function &reduce_rule_109(&$B)
    {
        require_once('Text/Tokenizer/Token.php');
        $result =& $B->getValue();
        $result =& new Text_Tokenizer_Token('<trimmed_ident>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_122 {{{ */
    /**
     * Reduction function for rule 122 
     *
     * Rule 122 is:
     * <pseudo>-><COLON><IDENT>
     *
     * @param Text_Tokenizer_Token Token of type '<IDENT>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<pseudo>' token
     */
    protected function &reduce_rule_122(&$B)
    {
        require_once('Text/Tokenizer/Token.php');
        $result = ':' . $B->getValue();
        $result =& new Text_Tokenizer_Token('<pseudo>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_22 {{{ */
    /**
     * Reduction function for rule 22 
     *
     * Rule 22 is:
     * <stylesheet_import>-><stylesheet_import><import><s_cdo_cdc_plus>
     *
     * @param Text_Tokenizer_Token Token of type '<stylesheet_import>'
     * @param Text_Tokenizer_Token Token of type '<import>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<stylesheet_import>' token
     */
    protected function &reduce_rule_22(&$B,&$C)
    {
        require_once('Text/Tokenizer/Token.php');
        $result = array_merge((array) $B->getValue(), (array) $C->getValue());
        $result =& new Text_Tokenizer_Token('<stylesheet_import>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_6 {{{ */
    /**
     * Reduction function for rule 6 
     *
     * Rule 6 is:
     * <stylesheet_charset>-><charset_sym_sstar><string_sstar><SEMICOLON>
     *
     * @param Text_Tokenizer_Token Token of type '<string_sstar>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<stylesheet_charset>' token
     */
    protected function &reduce_rule_6(&$B)
    {
        require_once('Text/Tokenizer/Token.php');
        $result =& $B->getValue();
        $result =& new Text_Tokenizer_Token('<stylesheet_charset>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_12 {{{ */
    /**
     * Reduction function for rule 12 
     *
     * Rule 12 is:
     * <string_sstar>-><STRING><splus>
     *
     * @param Text_Tokenizer_Token Token of type '<STRING>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<string_sstar>' token
     */
    protected function &reduce_rule_12(&$B)
    {
        require_once('Text/Tokenizer/Token.php');
        $result = '';
        $result =& new Text_Tokenizer_Token('<string_sstar>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_10 {{{ */
    /**
     * Reduction function for rule 10 
     *
     * Rule 10 is:
     * <splus>-><SS><splus>
     *
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<splus>' token
     */
    protected function &reduce_rule_10()
    {
        require_once('Text/Tokenizer/Token.php');
        $result = '';
        $result =& new Text_Tokenizer_Token('<splus>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_30 {{{ */
    /**
     * Reduction function for rule 30 
     *
     * Rule 30 is:
     * <import>-><import_sym_sstar><string_or_uri_sstar><SEMICOLON>
     *
     * @param Text_Tokenizer_Token Token of type '<string_or_uri_sstar>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<import>' token
     */
    protected function &reduce_rule_30(&$B)
    {
        require_once('Text/Tokenizer/Token.php');
        require_once('Structures/CSS/Rule/AtImport.php');
    $result = array(new Structures_CSS_Rule_AtImport($B->getValue()));
        $result =& new Text_Tokenizer_Token('<import>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_35 {{{ */
    /**
     * Reduction function for rule 35 
     *
     * Rule 35 is:
     * <string_or_uri_sstar>-><URI><splus>
     *
     * @param Text_Tokenizer_Token Token of type '<URI>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<string_or_uri_sstar>' token
     */
    protected function &reduce_rule_35(&$B)
    {
        require_once('Text/Tokenizer/Token.php');
        $result =& $B->getValue();
        $result =& new Text_Tokenizer_Token('<string_or_uri_sstar>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_53 {{{ */
    /**
     * Reduction function for rule 53 
     *
     * Rule 53 is:
     * <medium>-><IDENT><splus>
     *
     * @param Text_Tokenizer_Token Token of type '<IDENT>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<medium>' token
     */
    protected function &reduce_rule_53(&$B)
    {
        require_once('Text/Tokenizer/Token.php');
        $result =& $B->getValue();
        $result =& new Text_Tokenizer_Token('<medium>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_88 {{{ */
    /**
     * Reduction function for rule 88 
     *
     * Rule 88 is:
     * <rruleset>-><selectors><LBRACE><RBRACE>
     *
     * @param Text_Tokenizer_Token Token of type '<selectors>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<rruleset>' token
     */
    protected function &reduce_rule_88(&$B)
    {
        require_once('Text/Tokenizer/Token.php');
        $result = array(
        'selectors' => $B->getValue(),
        'declarations' => array()
    );
        $result =& new Text_Tokenizer_Token('<rruleset>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_63 {{{ */
    /**
     * Reduction function for rule 63 
     *
     * Rule 63 is:
     * <declarations_optional_semicolon>-><declarations>
     *
     * @param Text_Tokenizer_Token Token of type '<declarations>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<declarations_optional_semicolon>' token
     */
    protected function &reduce_rule_63(&$B)
    {
        require_once('Text/Tokenizer/Token.php');
        $result =& $B->getValue();
        $result =& new Text_Tokenizer_Token('<declarations_optional_semicolon>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_65 {{{ */
    /**
     * Reduction function for rule 65 
     *
     * Rule 65 is:
     * <declarations>-><sstar_declaration>
     *
     * @param Text_Tokenizer_Token Token of type '<sstar_declaration>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<declarations>' token
     */
    protected function &reduce_rule_65(&$B)
    {
        require_once('Text/Tokenizer/Token.php');
        $result = array($B->getValue());
        $result =& new Text_Tokenizer_Token('<declarations>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_67 {{{ */
    /**
     * Reduction function for rule 67 
     *
     * Rule 67 is:
     * <sstar_declaration>-><declaration>
     *
     * @param Text_Tokenizer_Token Token of type '<declaration>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<sstar_declaration>' token
     */
    protected function &reduce_rule_67(&$B)
    {
        require_once('Text/Tokenizer/Token.php');
        $result =& $B->getValue();
        $result =& new Text_Tokenizer_Token('<sstar_declaration>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_126 {{{ */
    /**
     * Reduction function for rule 126 
     *
     * Rule 126 is:
     * <declaration>-><ddeclaration>
     *
     * @param Text_Tokenizer_Token Token of type '<ddeclaration>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<declaration>' token
     */
    protected function &reduce_rule_126(&$B)
    {
        require_once('Text/Tokenizer/Token.php');
        require_once('Structures/CSS/Declaration.php');
    $B = $B->getValue();
    $result = Structures_CSS_Declaration::create($B['property'], $B['expressions'], $B['priority']);
        $result =& new Text_Tokenizer_Token('<declaration>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_79 {{{ */
    /**
     * Reduction function for rule 79 
     *
     * Rule 79 is:
     * <property>-><IDENT>
     *
     * @param Text_Tokenizer_Token Token of type '<IDENT>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<property>' token
     */
    protected function &reduce_rule_79(&$B)
    {
        require_once('Text/Tokenizer/Token.php');
        $result =& $B->getValue();
        $result =& new Text_Tokenizer_Token('<property>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_85 {{{ */
    /**
     * Reduction function for rule 85 
     *
     * Rule 85 is:
     * <selectors>-><selectors><comma_sstar><selector>
     *
     * @param Text_Tokenizer_Token Token of type '<selectors>'
     * @param Text_Tokenizer_Token Token of type '<selector>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<selectors>' token
     */
    protected function &reduce_rule_85(&$B,&$C)
    {
        require_once('Text/Tokenizer/Token.php');
        $result =& $B->getValue();
    $result[] = $C->getValue();
        $result =& new Text_Tokenizer_Token('<selectors>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_87 {{{ */
    /**
     * Reduction function for rule 87 
     *
     * Rule 87 is:
     * <comma_sstar>-><COMMA><splus>
     *
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<comma_sstar>' token
     */
    protected function &reduce_rule_87()
    {
        require_once('Text/Tokenizer/Token.php');
        $result = '';
        $result =& new Text_Tokenizer_Token('<comma_sstar>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_69 {{{ */
    /**
     * Reduction function for rule 69 
     *
     * Rule 69 is:
     * <pseudo_page>-><COLON><IDENT>
     *
     * @param Text_Tokenizer_Token Token of type '<COLON>'
     * @param Text_Tokenizer_Token Token of type '<IDENT>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<pseudo_page>' token
     */
    protected function &reduce_rule_69(&$B,&$C)
    {
        require_once('Text/Tokenizer/Token.php');
        $result = $B->getValue() . $C->getValue();
        $result =& new Text_Tokenizer_Token('<pseudo_page>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_93 {{{ */
    /**
     * Reduction function for rule 93 
     *
     * Rule 93 is:
     * <selector>-><simple_selector><combinator><selector>
     *
     * @param Text_Tokenizer_Token Token of type '<simple_selector>'
     * @param Text_Tokenizer_Token Token of type '<combinator>'
     * @param Text_Tokenizer_Token Token of type '<selector>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<selector>' token
     */
    protected function &reduce_rule_93(&$B,&$C,&$D)
    {
        require_once('Text/Tokenizer/Token.php');
        $result =& $B->getValue();
    $result->appendSelector($D->getValue(), $C->getValue());
        $result =& new Text_Tokenizer_Token('<selector>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_74 {{{ */
    /**
     * Reduction function for rule 74 
     *
     * Rule 74 is:
     * <combinator>-><GREATER><splus>
     *
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<combinator>' token
     */
    protected function &reduce_rule_74()
    {
        require_once('Text/Tokenizer/Token.php');
        $result = '>';
        $result =& new Text_Tokenizer_Token('<combinator>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_75 {{{ */
    /**
     * Reduction function for rule 75 
     *
     * Rule 75 is:
     * <combinator>-><PLUS><splus>
     *
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<combinator>' token
     */
    protected function &reduce_rule_75()
    {
        require_once('Text/Tokenizer/Token.php');
        $result = '+';
        $result =& new Text_Tokenizer_Token('<combinator>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_106 {{{ */
    /**
     * Reduction function for rule 106 
     *
     * Rule 106 is:
     * <attrib>-><LBRACKET><trimmed_ident><RBRACKET>
     *
     * @param Text_Tokenizer_Token Token of type '<trimmed_ident>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<attrib>' token
     */
    protected function &reduce_rule_106(&$B)
    {
        require_once('Text/Tokenizer/Token.php');
        $result = '[' . $B->getValue() . ']';
        $result =& new Text_Tokenizer_Token('<attrib>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_113 {{{ */
    /**
     * Reduction function for rule 113 
     *
     * Rule 113 is:
     * <attrib_operator_sstar>-><attrib_operator>
     *
     * @param Text_Tokenizer_Token Token of type '<attrib_operator>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<attrib_operator_sstar>' token
     */
    protected function &reduce_rule_113(&$B)
    {
        require_once('Text/Tokenizer/Token.php');
        $result =& $B->getValue();
        $result =& new Text_Tokenizer_Token('<attrib_operator_sstar>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_115 {{{ */
    /**
     * Reduction function for rule 115 
     *
     * Rule 115 is:
     * <attrib_operator>-><INCLUDES>
     *
     * @param Text_Tokenizer_Token Token of type '<INCLUDES>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<attrib_operator>' token
     */
    protected function &reduce_rule_115(&$B)
    {
        require_once('Text/Tokenizer/Token.php');
        $result =& $B->getValue();
        $result =& new Text_Tokenizer_Token('<attrib_operator>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_116 {{{ */
    /**
     * Reduction function for rule 116 
     *
     * Rule 116 is:
     * <attrib_operator>-><DASHMATCH>
     *
     * @param Text_Tokenizer_Token Token of type '<DASHMATCH>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<attrib_operator>' token
     */
    protected function &reduce_rule_116(&$B)
    {
        require_once('Text/Tokenizer/Token.php');
        $result =& $B->getValue();
        $result =& new Text_Tokenizer_Token('<attrib_operator>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_117 {{{ */
    /**
     * Reduction function for rule 117 
     *
     * Rule 117 is:
     * <attrib_operator>-><EQUAL>
     *
     * @param Text_Tokenizer_Token Token of type '<EQUAL>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<attrib_operator>' token
     */
    protected function &reduce_rule_117(&$B)
    {
        require_once('Text/Tokenizer/Token.php');
        $result =& $B->getValue();
        $result =& new Text_Tokenizer_Token('<attrib_operator>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_111 {{{ */
    /**
     * Reduction function for rule 111 
     *
     * Rule 111 is:
     * <trimmed_ident>-><IDENT><splus>
     *
     * @param Text_Tokenizer_Token Token of type '<IDENT>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<trimmed_ident>' token
     */
    protected function &reduce_rule_111(&$B)
    {
        require_once('Text/Tokenizer/Token.php');
        $result =& $B->getValue();
        $result =& new Text_Tokenizer_Token('<trimmed_ident>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_110 {{{ */
    /**
     * Reduction function for rule 110 
     *
     * Rule 110 is:
     * <trimmed_ident>-><splus><IDENT>
     *
     * @param Text_Tokenizer_Token Token of type '<IDENT>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<trimmed_ident>' token
     */
    protected function &reduce_rule_110(&$B)
    {
        require_once('Text/Tokenizer/Token.php');
        $result =& $B->getValue();
        $result =& new Text_Tokenizer_Token('<trimmed_ident>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_125 {{{ */
    /**
     * Reduction function for rule 125 
     *
     * Rule 125 is:
     * <pseudo>-><COLON><CSSFUNCTION><RPAREN>
     *
     * @param Text_Tokenizer_Token Token of type '<CSSFUNCTION>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<pseudo>' token
     */
    protected function &reduce_rule_125(&$B)
    {
        require_once('Text/Tokenizer/Token.php');
        $result =& $B->getValue();
        $result =& new Text_Tokenizer_Token('<pseudo>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_31 {{{ */
    /**
     * Reduction function for rule 31 
     *
     * Rule 31 is:
     * <import>-><import_sym_sstar><string_or_uri_sstar><medialist><SEMICOLON>
     *
     * @param Text_Tokenizer_Token Token of type '<string_or_uri_sstar>'
     * @param Text_Tokenizer_Token Token of type '<medialist>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<import>' token
     */
    protected function &reduce_rule_31(&$B,&$C)
    {
        require_once('Text/Tokenizer/Token.php');
        require_once('Structures/CSS/Rule/AtImport.php');
    $result = array(new Structures_CSS_Rule_AtImport($B->getValue(), $C->getValue()));
        $result =& new Text_Tokenizer_Token('<import>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_46 {{{ */
    /**
     * Reduction function for rule 46 
     *
     * Rule 46 is:
     * <media>-><media_sym_sstar><medialist><LBRACE><RBRACE>
     *
     * @param Text_Tokenizer_Token Token of type '<medialist>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<media>' token
     */
    protected function &reduce_rule_46(&$B)
    {
        require_once('Text/Tokenizer/Token.php');
        require_once('Structures/CSS/Rule/AtMedia.php');
    $result = array(new Structures_CSS_Rule_AtMedia($B->getValue(), array()));
        $result =& new Text_Tokenizer_Token('<media>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_50 {{{ */
    /**
     * Reduction function for rule 50 
     *
     * Rule 50 is:
     * <rulesetplus>-><ruleset>
     *
     * @param Text_Tokenizer_Token Token of type '<ruleset>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<rulesetplus>' token
     */
    protected function &reduce_rule_50(&$B)
    {
        require_once('Text/Tokenizer/Token.php');
        $result =& $B->getValue();
        $result =& new Text_Tokenizer_Token('<rulesetplus>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_38 {{{ */
    /**
     * Reduction function for rule 38 
     *
     * Rule 38 is:
     * <medialist>-><medialist><COMMA><medium>
     *
     * @param Text_Tokenizer_Token Token of type '<medialist>'
     * @param Text_Tokenizer_Token Token of type '<medium>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<medialist>' token
     */
    protected function &reduce_rule_38(&$B,&$C)
    {
        require_once('Text/Tokenizer/Token.php');
        $result =& $B->getValue();
    $result[] = $C->getValue();
        $result =& new Text_Tokenizer_Token('<medialist>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_83 {{{ */
    /**
     * Reduction function for rule 83 
     *
     * Rule 83 is:
     * <rruleset>-><selectors><LBRACE><declarations_optional_semicolon><RBRACE>
     *
     * @param Text_Tokenizer_Token Token of type '<selectors>'
     * @param Text_Tokenizer_Token Token of type '<declarations_optional_semicolon>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<rruleset>' token
     */
    protected function &reduce_rule_83(&$B,&$C)
    {
        require_once('Text/Tokenizer/Token.php');
        $result = array(
        'selectors' => $B->getValue(),
        'declarations' => $C->getValue()
    );
        $result =& new Text_Tokenizer_Token('<rruleset>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_90 {{{ */
    /**
     * Reduction function for rule 90 
     *
     * Rule 90 is:
     * <rruleset>-><selectors><LBRACE><RBRACE><splus>
     *
     * @param Text_Tokenizer_Token Token of type '<selectors>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<rruleset>' token
     */
    protected function &reduce_rule_90(&$B)
    {
        require_once('Text/Tokenizer/Token.php');
        $result = array(
        'selectors' => $B->getValue(),
        'declarations' => array()
    );
        $result =& new Text_Tokenizer_Token('<rruleset>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_89 {{{ */
    /**
     * Reduction function for rule 89 
     *
     * Rule 89 is:
     * <rruleset>-><selectors><LBRACE><splus><RBRACE>
     *
     * @param Text_Tokenizer_Token Token of type '<selectors>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<rruleset>' token
     */
    protected function &reduce_rule_89(&$B)
    {
        require_once('Text/Tokenizer/Token.php');
        $result = array(
        'selectors' => $B->getValue(),
        'declarations' => array()
    );
        $result =& new Text_Tokenizer_Token('<rruleset>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_68 {{{ */
    /**
     * Reduction function for rule 68 
     *
     * Rule 68 is:
     * <sstar_declaration>-><splus><declaration>
     *
     * @param Text_Tokenizer_Token Token of type '<declaration>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<sstar_declaration>' token
     */
    protected function &reduce_rule_68(&$B)
    {
        require_once('Text/Tokenizer/Token.php');
        $result =& $B->getValue();
        $result =& new Text_Tokenizer_Token('<sstar_declaration>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_64 {{{ */
    /**
     * Reduction function for rule 64 
     *
     * Rule 64 is:
     * <declarations_optional_semicolon>-><declarations><SEMICOLON>
     *
     * @param Text_Tokenizer_Token Token of type '<declarations>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<declarations_optional_semicolon>' token
     */
    protected function &reduce_rule_64(&$B)
    {
        require_once('Text/Tokenizer/Token.php');
        $result =& $B->getValue();
        $result =& new Text_Tokenizer_Token('<declarations_optional_semicolon>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_80 {{{ */
    /**
     * Reduction function for rule 80 
     *
     * Rule 80 is:
     * <property>-><IDENT><splus>
     *
     * @param Text_Tokenizer_Token Token of type '<IDENT>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<property>' token
     */
    protected function &reduce_rule_80(&$B)
    {
        require_once('Text/Tokenizer/Token.php');
        $result =& $B->getValue();
        $result =& new Text_Tokenizer_Token('<property>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_59 {{{ */
    /**
     * Reduction function for rule 59 
     *
     * Rule 59 is:
     * <ppage>-><pagesym_sstar><LBRACE><declarations_optional_semicolon><RBRACE>
     *
     * @param Text_Tokenizer_Token Token of type '<declarations_optional_semicolon>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<ppage>' token
     */
    protected function &reduce_rule_59(&$C)
    {
        require_once('Text/Tokenizer/Token.php');
        $result = array(
        'pseudo' => null,
        'declarations' => $C->getValue()
    );
        $result =& new Text_Tokenizer_Token('<ppage>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_108 {{{ */
    /**
     * Reduction function for rule 108 
     *
     * Rule 108 is:
     * <attrib>-><LBRACKET><trimmed_ident><attrib_operator_sstar><RBRACKET>
     *
     * @param Text_Tokenizer_Token Token of type '<trimmed_ident>'
     * @param Text_Tokenizer_Token Token of type '<attrib_operator_sstar>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<attrib>' token
     */
    protected function &reduce_rule_108(&$B,&$C)
    {
        require_once('Text/Tokenizer/Token.php');
        $result = '[' . $B->getValue() . $C->getValue() . ']';
        $result =& new Text_Tokenizer_Token('<attrib>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_118 {{{ */
    /**
     * Reduction function for rule 118 
     *
     * Rule 118 is:
     * <attrib_operator_rhand_sstar>-><attrib_operator_rhand>
     *
     * @param Text_Tokenizer_Token Token of type '<attrib_operator_rhand>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<attrib_operator_rhand_sstar>' token
     */
    protected function &reduce_rule_118(&$B)
    {
        require_once('Text/Tokenizer/Token.php');
        $result =& $B->getValue();
        $result =& new Text_Tokenizer_Token('<attrib_operator_rhand_sstar>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_120 {{{ */
    /**
     * Reduction function for rule 120 
     *
     * Rule 120 is:
     * <attrib_operator_rhand>-><STRING>
     *
     * @param Text_Tokenizer_Token Token of type '<STRING>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<attrib_operator_rhand>' token
     */
    protected function &reduce_rule_120(&$B)
    {
        require_once('Text/Tokenizer/Token.php');
        $result =& $B->getValue();
        $result =& new Text_Tokenizer_Token('<attrib_operator_rhand>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_121 {{{ */
    /**
     * Reduction function for rule 121 
     *
     * Rule 121 is:
     * <attrib_operator_rhand>-><IDENT>
     *
     * @param Text_Tokenizer_Token Token of type '<IDENT>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<attrib_operator_rhand>' token
     */
    protected function &reduce_rule_121(&$B)
    {
        require_once('Text/Tokenizer/Token.php');
        $result =& $B->getValue();
        $result =& new Text_Tokenizer_Token('<attrib_operator_rhand>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_114 {{{ */
    /**
     * Reduction function for rule 114 
     *
     * Rule 114 is:
     * <attrib_operator_sstar>-><attrib_operator><splus>
     *
     * @param Text_Tokenizer_Token Token of type '<attrib_operator>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<attrib_operator_sstar>' token
     */
    protected function &reduce_rule_114(&$B)
    {
        require_once('Text/Tokenizer/Token.php');
        $result =& $B->getValue();
        $result =& new Text_Tokenizer_Token('<attrib_operator_sstar>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_112 {{{ */
    /**
     * Reduction function for rule 112 
     *
     * Rule 112 is:
     * <trimmed_ident>-><splus><IDENT><splus>
     *
     * @param Text_Tokenizer_Token Token of type '<IDENT>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<trimmed_ident>' token
     */
    protected function &reduce_rule_112(&$B)
    {
        require_once('Text/Tokenizer/Token.php');
        $result =& $B->getValue();
        $result =& new Text_Tokenizer_Token('<trimmed_ident>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_123 {{{ */
    /**
     * Reduction function for rule 123 
     *
     * Rule 123 is:
     * <pseudo>-><COLON><CSSFUNCTION><trimmed_ident><RPAREN>
     *
     * @param Text_Tokenizer_Token Token of type '<CSSFUNCTION>'
     * @param Text_Tokenizer_Token Token of type '<trimmed_ident>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<pseudo>' token
     */
    protected function &reduce_rule_123(&$B,&$C)
    {
        require_once('Text/Tokenizer/Token.php');
        $result = ':' . $B->getValue();
        $result =& new Text_Tokenizer_Token('<pseudo>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_124 {{{ */
    /**
     * Reduction function for rule 124 
     *
     * Rule 124 is:
     * <pseudo>-><COLON><CSSFUNCTION><splus><RPAREN>
     *
     * @param Text_Tokenizer_Token Token of type '<CSSFUNCTION>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<pseudo>' token
     */
    protected function &reduce_rule_124(&$B)
    {
        require_once('Text/Tokenizer/Token.php');
        $result =& $B->getValue();
        $result =& new Text_Tokenizer_Token('<pseudo>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_44 {{{ */
    /**
     * Reduction function for rule 44 
     *
     * Rule 44 is:
     * <media>-><media_sym_sstar><medialist><LBRACE><splus><RBRACE>
     *
     * @param Text_Tokenizer_Token Token of type '<medialist>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<media>' token
     */
    protected function &reduce_rule_44(&$B)
    {
        require_once('Text/Tokenizer/Token.php');
        require_once('Structures/CSS/Rule/AtMedia.php');
    $result = array(new Structures_CSS_Rule_AtMedia($B->getValue(), array()));
        $result =& new Text_Tokenizer_Token('<media>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_42 {{{ */
    /**
     * Reduction function for rule 42 
     *
     * Rule 42 is:
     * <media>-><media_sym_sstar><medialist><LBRACE><rulesetplus><RBRACE>
     *
     * @param Text_Tokenizer_Token Token of type '<medialist>'
     * @param Text_Tokenizer_Token Token of type '<rulesetplus>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<media>' token
     */
    protected function &reduce_rule_42(&$B,&$C)
    {
        require_once('Text/Tokenizer/Token.php');
        require_once('Structures/CSS/Rule/AtMedia.php');
    $result = array(new Structures_CSS_Rule_AtMedia($B->getValue(), $C->getValue()));;
        $result =& new Text_Tokenizer_Token('<media>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_51 {{{ */
    /**
     * Reduction function for rule 51 
     *
     * Rule 51 is:
     * <rulesetplus>-><rulesetplus><ruleset>
     *
     * @param Text_Tokenizer_Token Token of type '<rulesetplus>'
     * @param Text_Tokenizer_Token Token of type '<ruleset>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<rulesetplus>' token
     */
    protected function &reduce_rule_51(&$B,&$C)
    {
        require_once('Text/Tokenizer/Token.php');
        $result =& $B->getValue();
    $result[] = $C->getValue();
        $result =& new Text_Tokenizer_Token('<rulesetplus>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_47 {{{ */
    /**
     * Reduction function for rule 47 
     *
     * Rule 47 is:
     * <media>-><media_sym_sstar><medialist><LBRACE><RBRACE><splus>
     *
     * @param Text_Tokenizer_Token Token of type '<medialist>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<media>' token
     */
    protected function &reduce_rule_47(&$B)
    {
        require_once('Text/Tokenizer/Token.php');
        require_once('Structures/CSS/Rule/AtMedia.php');
    $result = array(new Structures_CSS_Rule_AtMedia($B->getValue(), array()));
        $result =& new Text_Tokenizer_Token('<media>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_39 {{{ */
    /**
     * Reduction function for rule 39 
     *
     * Rule 39 is:
     * <medialist>-><medialist><COMMA><splus><medium>
     *
     * @param Text_Tokenizer_Token Token of type '<medialist>'
     * @param Text_Tokenizer_Token Token of type '<medium>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<medialist>' token
     */
    protected function &reduce_rule_39(&$B,&$C)
    {
        require_once('Text/Tokenizer/Token.php');
        $result =& $B->getValue();
    $result[] = $C->getValue();
        $result =& new Text_Tokenizer_Token('<medialist>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_82 {{{ */
    /**
     * Reduction function for rule 82 
     *
     * Rule 82 is:
     * <rruleset>-><selectors><LBRACE><declarations_optional_semicolon><RBRACE><splus>
     *
     * @param Text_Tokenizer_Token Token of type '<selectors>'
     * @param Text_Tokenizer_Token Token of type '<declarations_optional_semicolon>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<rruleset>' token
     */
    protected function &reduce_rule_82(&$B,&$C)
    {
        require_once('Text/Tokenizer/Token.php');
        $result = array(
        'selectors' => $B->getValue(),
        'declarations' => $C->getValue()
    );
        $result =& new Text_Tokenizer_Token('<rruleset>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_91 {{{ */
    /**
     * Reduction function for rule 91 
     *
     * Rule 91 is:
     * <rruleset>-><selectors><LBRACE><splus><RBRACE><splus>
     *
     * @param Text_Tokenizer_Token Token of type '<selectors>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<rruleset>' token
     */
    protected function &reduce_rule_91(&$B)
    {
        require_once('Text/Tokenizer/Token.php');
        $result = array(
        'selectors' => $B->getValue(),
        'declarations' => array()
    );
        $result =& new Text_Tokenizer_Token('<rruleset>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_66 {{{ */
    /**
     * Reduction function for rule 66 
     *
     * Rule 66 is:
     * <declarations>-><declarations><SEMICOLON><sstar_declaration>
     *
     * @param Text_Tokenizer_Token Token of type '<declarations>'
     * @param Text_Tokenizer_Token Token of type '<sstar_declaration>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<declarations>' token
     */
    protected function &reduce_rule_66(&$B,&$C)
    {
        require_once('Text/Tokenizer/Token.php');
        $result =& $B->getValue();
    $result[] = $C->getValue();
        $result =& new Text_Tokenizer_Token('<declarations>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_130 {{{ */
    /**
     * Reduction function for rule 130 
     *
     * Rule 130 is:
     * <ddeclaration>-><property><COLON><expr>
     *
     * @param Text_Tokenizer_Token Token of type '<property>'
     * @param Text_Tokenizer_Token Token of type '<expr>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<ddeclaration>' token
     */
    protected function &reduce_rule_130(&$B,&$C)
    {
        require_once('Text/Tokenizer/Token.php');
        $result = array(
        'property' => $B->getValue(),
        'expressions' => $C->getValue(),
        'priority' => false
    );
        $result =& new Text_Tokenizer_Token('<ddeclaration>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_134 {{{ */
    /**
     * Reduction function for rule 134 
     *
     * Rule 134 is:
     * <expr>-><term>
     *
     * @param Text_Tokenizer_Token Token of type '<term>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<expr>' token
     */
    protected function &reduce_rule_134(&$B)
    {
        require_once('Text/Tokenizer/Token.php');
        $result = array($B->getValue());
        $result =& new Text_Tokenizer_Token('<expr>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_137 {{{ */
    /**
     * Reduction function for rule 137 
     *
     * Rule 137 is:
     * <term>-><term_numeric>
     *
     * @param Text_Tokenizer_Token Token of type '<term_numeric>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<term>' token
     */
    protected function &reduce_rule_137(&$B)
    {
        require_once('Text/Tokenizer/Token.php');
        $result = $B->getValue();
        $result =& new Text_Tokenizer_Token('<term>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_138 {{{ */
    /**
     * Reduction function for rule 138 
     *
     * Rule 138 is:
     * <term>-><term_nonnumeric>
     *
     * @param Text_Tokenizer_Token Token of type '<term_nonnumeric>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<term>' token
     */
    protected function &reduce_rule_138(&$B)
    {
        require_once('Text/Tokenizer/Token.php');
        $result = $B->getValue();
        $result =& new Text_Tokenizer_Token('<term>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_140 {{{ */
    /**
     * Reduction function for rule 140 
     *
     * Rule 140 is:
     * <term_numeric>-><term_numeric_number>
     *
     * @param Text_Tokenizer_Token Token of type '<term_numeric_number>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<term_numeric>' token
     */
    protected function &reduce_rule_140(&$B)
    {
        require_once('Text/Tokenizer/Token.php');
        $result = $B->getValue();
        $result =& new Text_Tokenizer_Token('<term_numeric>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_159 {{{ */
    /**
     * Reduction function for rule 159 
     *
     * Rule 159 is:
     * <term_nonnumeric>-><STRING>
     *
     * @param Text_Tokenizer_Token Token of type '<STRING>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<term_nonnumeric>' token
     */
    protected function &reduce_rule_159(&$B)
    {
        require_once('Text/Tokenizer/Token.php');
        require_once('Structures/CSS/Value/Generic.php');
    $result = Structures_CSS_Value_Generic::create($B->getValue());
        $result =& new Text_Tokenizer_Token('<term_nonnumeric>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_161 {{{ */
    /**
     * Reduction function for rule 161 
     *
     * Rule 161 is:
     * <term_nonnumeric>-><IDENT>
     *
     * @param Text_Tokenizer_Token Token of type '<IDENT>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<term_nonnumeric>' token
     */
    protected function &reduce_rule_161(&$B)
    {
        require_once('Text/Tokenizer/Token.php');
        require_once('Structures/CSS/Value/Generic.php');
    $result = Structures_CSS_Value_Generic::create($B->getValue());
        $result =& new Text_Tokenizer_Token('<term_nonnumeric>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_163 {{{ */
    /**
     * Reduction function for rule 163 
     *
     * Rule 163 is:
     * <term_nonnumeric>-><URI>
     *
     * @param Text_Tokenizer_Token Token of type '<URI>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<term_nonnumeric>' token
     */
    protected function &reduce_rule_163(&$B)
    {
        require_once('Text/Tokenizer/Token.php');
        $B = preg_replace('/url\((.*)\)/', '\1', $B->getValue());
    if ($B[0] == "'" && $B[strlen($B) - 1] == "'" || 
        $B[0] == '"' && $B[strlen($B) - 1] == '"') {
      $B = substr($B, 1, strlen($B) - 2);
      $B = strtr($B, array('\\"' => '"', "\\'" => "'", '\\\\' => '\\'));
    }
    require_once('Structures/CSS/Value/URI.php');
    $result = new Structures_CSS_Value_URI($B);
        $result =& new Text_Tokenizer_Token('<term_nonnumeric>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_165 {{{ */
    /**
     * Reduction function for rule 165 
     *
     * Rule 165 is:
     * <term_nonnumeric>-><hexcolor>
     *
     * @param Text_Tokenizer_Token Token of type '<hexcolor>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<term_nonnumeric>' token
     */
    protected function &reduce_rule_165(&$B)
    {
        require_once('Text/Tokenizer/Token.php');
        $result = $B->getValue();
        $result =& new Text_Tokenizer_Token('<term_nonnumeric>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_166 {{{ */
    /**
     * Reduction function for rule 166 
     *
     * Rule 166 is:
     * <term_nonnumeric>-><function>
     *
     * @param Text_Tokenizer_Token Token of type '<function>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<term_nonnumeric>' token
     */
    protected function &reduce_rule_166(&$B)
    {
        require_once('Text/Tokenizer/Token.php');
        require_once('Structures/CSS/Value/Numeric.php');
    require_once('Structures/CSS/Value/Color.php');
    require_once('Structures/CSS/Value/Function.php');
    $B = $B->getValue();
    if (strtolower($B['name']) == 'rgb' &&
        count($B['args']) == 5 &&
        $B['args'][2] == ',' && 
        $B['args'][4] == ',' &&
        $B['args'][0] instanceof Structures_CSS_Value_Numeric &&
        $B['args'][1] instanceof Structures_CSS_Value_Numeric &&
        $B['args'][3] instanceof Structures_CSS_Value_Numeric
        ) {
        $result = new Structures_CSS_Value_Color($B['args'][0]->getNumericValue(), $B['args'][1]->getNumericValue(), $B['args'][3]->getNumericValue());
    } else {   
        $result =& new Structures_CSS_Value_Function($B);
    } 
        $result =& new Text_Tokenizer_Token('<term_nonnumeric>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_77 {{{ */
    /**
     * Reduction function for rule 77 
     *
     * Rule 77 is:
     * <unary_operator>-><MINUS>
     *
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<unary_operator>' token
     */
    protected function &reduce_rule_77()
    {
        require_once('Text/Tokenizer/Token.php');
        $result = '-';
        $result =& new Text_Tokenizer_Token('<unary_operator>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_78 {{{ */
    /**
     * Reduction function for rule 78 
     *
     * Rule 78 is:
     * <unary_operator>-><PLUS>
     *
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<unary_operator>' token
     */
    protected function &reduce_rule_78()
    {
        require_once('Text/Tokenizer/Token.php');
        $result = '+';
        $result =& new Text_Tokenizer_Token('<unary_operator>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_141 {{{ */
    /**
     * Reduction function for rule 141 
     *
     * Rule 141 is:
     * <term_numeric_number>-><NUMBER>
     *
     * @param Text_Tokenizer_Token Token of type '<NUMBER>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<term_numeric_number>' token
     */
    protected function &reduce_rule_141(&$B)
    {
        require_once('Text/Tokenizer/Token.php');
        require_once('Structures/CSS/Value/Numeric.php');
    $result = Structures_CSS_Value_Numeric::create($B->getValue());
        $result =& new Text_Tokenizer_Token('<term_numeric_number>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_143 {{{ */
    /**
     * Reduction function for rule 143 
     *
     * Rule 143 is:
     * <term_numeric_number>-><PERCENTAGE>
     *
     * @param Text_Tokenizer_Token Token of type '<PERCENTAGE>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<term_numeric_number>' token
     */
    protected function &reduce_rule_143(&$B)
    {
        require_once('Text/Tokenizer/Token.php');
        require_once('Structures/CSS/Value/Unit.php');
    $result = Structures_CSS_Value_Unit::create($B->getValue());
        $result =& new Text_Tokenizer_Token('<term_numeric_number>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_145 {{{ */
    /**
     * Reduction function for rule 145 
     *
     * Rule 145 is:
     * <term_numeric_number>-><LENGTH>
     *
     * @param Text_Tokenizer_Token Token of type '<LENGTH>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<term_numeric_number>' token
     */
    protected function &reduce_rule_145(&$B)
    {
        require_once('Text/Tokenizer/Token.php');
        require_once('Structures/CSS/Value/Unit.php');
    $result = Structures_CSS_Value_Unit::create($B->getValue());
        $result =& new Text_Tokenizer_Token('<term_numeric_number>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_147 {{{ */
    /**
     * Reduction function for rule 147 
     *
     * Rule 147 is:
     * <term_numeric_number>-><EMS>
     *
     * @param Text_Tokenizer_Token Token of type '<EMS>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<term_numeric_number>' token
     */
    protected function &reduce_rule_147(&$B)
    {
        require_once('Text/Tokenizer/Token.php');
        require_once('Structures/CSS/Value/Unit.php');
    $result = Structures_CSS_Value_Unit::create($B->getValue());
        $result =& new Text_Tokenizer_Token('<term_numeric_number>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_149 {{{ */
    /**
     * Reduction function for rule 149 
     *
     * Rule 149 is:
     * <term_numeric_number>-><EXS>
     *
     * @param Text_Tokenizer_Token Token of type '<EXS>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<term_numeric_number>' token
     */
    protected function &reduce_rule_149(&$B)
    {
        require_once('Text/Tokenizer/Token.php');
        require_once('Structures/CSS/Value/Unit.php');
    $result = Structures_CSS_Value_Unit::create($B->getValue());
        $result =& new Text_Tokenizer_Token('<term_numeric_number>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_151 {{{ */
    /**
     * Reduction function for rule 151 
     *
     * Rule 151 is:
     * <term_numeric_number>-><ANGLE>
     *
     * @param Text_Tokenizer_Token Token of type '<ANGLE>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<term_numeric_number>' token
     */
    protected function &reduce_rule_151(&$B)
    {
        require_once('Text/Tokenizer/Token.php');
        require_once('Structures/CSS/Value/Unit.php');
    $result = Structures_CSS_Value_Unit::create($B->getValue());
        $result =& new Text_Tokenizer_Token('<term_numeric_number>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_153 {{{ */
    /**
     * Reduction function for rule 153 
     *
     * Rule 153 is:
     * <term_numeric_number>-><TIME>
     *
     * @param Text_Tokenizer_Token Token of type '<TIME>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<term_numeric_number>' token
     */
    protected function &reduce_rule_153(&$B)
    {
        require_once('Text/Tokenizer/Token.php');
        require_once('Structures/CSS/Value/Unit.php');
    $result = Structures_CSS_Value_Unit::create($B->getValue());
        $result =& new Text_Tokenizer_Token('<term_numeric_number>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_155 {{{ */
    /**
     * Reduction function for rule 155 
     *
     * Rule 155 is:
     * <term_numeric_number>-><FREQ>
     *
     * @param Text_Tokenizer_Token Token of type '<FREQ>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<term_numeric_number>' token
     */
    protected function &reduce_rule_155(&$B)
    {
        require_once('Text/Tokenizer/Token.php');
        require_once('Structures/CSS/Value/Unit.php');
    $result = Structures_CSS_Value_Unit::create($B->getValue());
        $result =& new Text_Tokenizer_Token('<term_numeric_number>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_157 {{{ */
    /**
     * Reduction function for rule 157 
     *
     * Rule 157 is:
     * <term_numeric_number>-><DIMENSION>
     *
     * @param Text_Tokenizer_Token Token of type '<DIMENSION>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<term_numeric_number>' token
     */
    protected function &reduce_rule_157(&$B)
    {
        require_once('Text/Tokenizer/Token.php');
        require_once('Structures/CSS/Value/Generic.php');
    $result = Structures_CSS_Value_Generic::create($B->getValue());
        $result =& new Text_Tokenizer_Token('<term_numeric_number>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_167 {{{ */
    /**
     * Reduction function for rule 167 
     *
     * Rule 167 is:
     * <hexcolor>-><HASH>
     *
     * @param Text_Tokenizer_Token Token of type '<HASH>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<hexcolor>' token
     */
    protected function &reduce_rule_167(&$B)
    {
        require_once('Text/Tokenizer/Token.php');
        require_once('Structures/CSS/Value/Color.php');
    $result = Structures_CSS_Value_Color::create($B->getValue());
        $result =& new Text_Tokenizer_Token('<hexcolor>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_57 {{{ */
    /**
     * Reduction function for rule 57 
     *
     * Rule 57 is:
     * <ppage>-><pagesym_sstar><pseudo_page><LBRACE><declarations_optional_semicolon><RBRACE>
     *
     * @param Text_Tokenizer_Token Token of type '<pseudo_page>'
     * @param Text_Tokenizer_Token Token of type '<declarations_optional_semicolon>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<ppage>' token
     */
    protected function &reduce_rule_57(&$B,&$C)
    {
        require_once('Text/Tokenizer/Token.php');
        $result = array(
        'pseudo' => $B->getValue(),
        'declarations' => $C->getValue()
    );
        $result =& new Text_Tokenizer_Token('<ppage>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_60 {{{ */
    /**
     * Reduction function for rule 60 
     *
     * Rule 60 is:
     * <ppage>-><pagesym_sstar><LBRACE><declarations_optional_semicolon><RBRACE><splus>
     *
     * @param Text_Tokenizer_Token Token of type '<declarations_optional_semicolon>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<ppage>' token
     */
    protected function &reduce_rule_60(&$C)
    {
        require_once('Text/Tokenizer/Token.php');
        $result = array(
        'pseudo' => null,
        'declarations' => $C->getValue()
    );
        $result =& new Text_Tokenizer_Token('<ppage>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_107 {{{ */
    /**
     * Reduction function for rule 107 
     *
     * Rule 107 is:
     * <attrib>-><LBRACKET><trimmed_ident><attrib_operator_sstar><attrib_operator_rhand_sstar><RBRACKET>
     *
     * @param Text_Tokenizer_Token Token of type '<trimmed_ident>'
     * @param Text_Tokenizer_Token Token of type '<attrib_operator_sstar>'
     * @param Text_Tokenizer_Token Token of type '<attrib_operator_rhand_sstar>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<attrib>' token
     */
    protected function &reduce_rule_107(&$B,&$C,&$D)
    {
        require_once('Text/Tokenizer/Token.php');
        $result = '[' . $B->getValue() . $C->getValue() . $D->getValue() . ']';
        $result =& new Text_Tokenizer_Token('<attrib>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_119 {{{ */
    /**
     * Reduction function for rule 119 
     *
     * Rule 119 is:
     * <attrib_operator_rhand_sstar>-><attrib_operator_rhand><splus>
     *
     * @param Text_Tokenizer_Token Token of type '<attrib_operator_rhand>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<attrib_operator_rhand_sstar>' token
     */
    protected function &reduce_rule_119(&$B)
    {
        require_once('Text/Tokenizer/Token.php');
        $result =& $B->getValue();
        $result =& new Text_Tokenizer_Token('<attrib_operator_rhand_sstar>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_40 {{{ */
    /**
     * Reduction function for rule 40 
     *
     * Rule 40 is:
     * <media>-><media_sym_sstar><medialist><LBRACE><splus><rulesetplus><RBRACE>
     *
     * @param Text_Tokenizer_Token Token of type '<medialist>'
     * @param Text_Tokenizer_Token Token of type '<rulesetplus>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<media>' token
     */
    protected function &reduce_rule_40(&$B,&$C)
    {
        require_once('Text/Tokenizer/Token.php');
        require_once('Structures/CSS/Rule/AtMedia.php');
    $result = array(new Structures_CSS_Rule_AtMedia($B->getValue(), $C->getValue()));;
        $result =& new Text_Tokenizer_Token('<media>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_45 {{{ */
    /**
     * Reduction function for rule 45 
     *
     * Rule 45 is:
     * <media>-><media_sym_sstar><medialist><LBRACE><splus><RBRACE><splus>
     *
     * @param Text_Tokenizer_Token Token of type '<medialist>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<media>' token
     */
    protected function &reduce_rule_45(&$B)
    {
        require_once('Text/Tokenizer/Token.php');
        require_once('Structures/CSS/Rule/AtMedia.php');
    $result = array(new Structures_CSS_Rule_AtMedia($B->getValue(), array()));
        $result =& new Text_Tokenizer_Token('<media>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_43 {{{ */
    /**
     * Reduction function for rule 43 
     *
     * Rule 43 is:
     * <media>-><media_sym_sstar><medialist><LBRACE><rulesetplus><RBRACE><splus>
     *
     * @param Text_Tokenizer_Token Token of type '<medialist>'
     * @param Text_Tokenizer_Token Token of type '<rulesetplus>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<media>' token
     */
    protected function &reduce_rule_43(&$B,&$C)
    {
        require_once('Text/Tokenizer/Token.php');
        require_once('Structures/CSS/Rule/AtMedia.php');
    $result = array(new Structures_CSS_Rule_AtMedia($B->getValue(), $C->getValue()));;
        $result =& new Text_Tokenizer_Token('<media>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_128 {{{ */
    /**
     * Reduction function for rule 128 
     *
     * Rule 128 is:
     * <ddeclaration>-><property><COLON><splus><expr>
     *
     * @param Text_Tokenizer_Token Token of type '<property>'
     * @param Text_Tokenizer_Token Token of type '<expr>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<ddeclaration>' token
     */
    protected function &reduce_rule_128(&$B,&$C)
    {
        require_once('Text/Tokenizer/Token.php');
        $result = array(
        'property' => $B->getValue(),
        'expressions' => $C->getValue(),
        'priority' => false
    );
        $result =& new Text_Tokenizer_Token('<ddeclaration>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_129 {{{ */
    /**
     * Reduction function for rule 129 
     *
     * Rule 129 is:
     * <ddeclaration>-><property><COLON><expr><prio>
     *
     * @param Text_Tokenizer_Token Token of type '<property>'
     * @param Text_Tokenizer_Token Token of type '<expr>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<ddeclaration>' token
     */
    protected function &reduce_rule_129(&$B,&$C)
    {
        require_once('Text/Tokenizer/Token.php');
        $result = array(
        'property' => $B->getValue(),
        'expressions' => $C->getValue(),
        'priority' => true
    );
        $result =& new Text_Tokenizer_Token('<ddeclaration>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_135 {{{ */
    /**
     * Reduction function for rule 135 
     *
     * Rule 135 is:
     * <expr>-><expr><term>
     *
     * @param Text_Tokenizer_Token Token of type '<expr>'
     * @param Text_Tokenizer_Token Token of type '<term>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<expr>' token
     */
    protected function &reduce_rule_135(&$B,&$D)
    {
        require_once('Text/Tokenizer/Token.php');
        $result =& $B->getValue();
    $result[] = $D->getValue();
    $result[] = '';
        $result =& new Text_Tokenizer_Token('<expr>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_131 {{{ */
    /**
     * Reduction function for rule 131 
     *
     * Rule 131 is:
     * <prio>-><important_sym_sstar>
     *
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<prio>' token
     */
    protected function &reduce_rule_131()
    {
        require_once('Text/Tokenizer/Token.php');
        $result = '';
        $result =& new Text_Tokenizer_Token('<prio>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_70 {{{ */
    /**
     * Reduction function for rule 70 
     *
     * Rule 70 is:
     * <operator>-><SLASH>
     *
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<operator>' token
     */
    protected function &reduce_rule_70()
    {
        require_once('Text/Tokenizer/Token.php');
        $result = '/';
        $result =& new Text_Tokenizer_Token('<operator>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_72 {{{ */
    /**
     * Reduction function for rule 72 
     *
     * Rule 72 is:
     * <operator>-><COMMA>
     *
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<operator>' token
     */
    protected function &reduce_rule_72()
    {
        require_once('Text/Tokenizer/Token.php');
        $result = ',';
        $result =& new Text_Tokenizer_Token('<operator>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_132 {{{ */
    /**
     * Reduction function for rule 132 
     *
     * Rule 132 is:
     * <important_sym_sstar>-><IMPORTANT_SYM>
     *
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<important_sym_sstar>' token
     */
    protected function &reduce_rule_132()
    {
        require_once('Text/Tokenizer/Token.php');
        $result = '';
        $result =& new Text_Tokenizer_Token('<important_sym_sstar>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_139 {{{ */
    /**
     * Reduction function for rule 139 
     *
     * Rule 139 is:
     * <term_numeric>-><unary_operator><term_numeric_number>
     *
     * @param Text_Tokenizer_Token Token of type '<unary_operator>'
     * @param Text_Tokenizer_Token Token of type '<term_numeric_number>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<term_numeric>' token
     */
    protected function &reduce_rule_139(&$B,&$C)
    {
        require_once('Text/Tokenizer/Token.php');
        $result = $C->getValue();
    if ($B->getValue() == '-') $result->setNumericValue(-1 * $result->getNumericValue());
        $result =& new Text_Tokenizer_Token('<term_numeric>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_160 {{{ */
    /**
     * Reduction function for rule 160 
     *
     * Rule 160 is:
     * <term_nonnumeric>-><STRING><splus>
     *
     * @param Text_Tokenizer_Token Token of type '<STRING>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<term_nonnumeric>' token
     */
    protected function &reduce_rule_160(&$B)
    {
        require_once('Text/Tokenizer/Token.php');
        require_once('Structures/CSS/Value/Generic.php');
    $result = Structures_CSS_Value_Generic::create($B->getValue());
        $result =& new Text_Tokenizer_Token('<term_nonnumeric>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_162 {{{ */
    /**
     * Reduction function for rule 162 
     *
     * Rule 162 is:
     * <term_nonnumeric>-><IDENT><splus>
     *
     * @param Text_Tokenizer_Token Token of type '<IDENT>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<term_nonnumeric>' token
     */
    protected function &reduce_rule_162(&$B)
    {
        require_once('Text/Tokenizer/Token.php');
        require_once('Structures/CSS/Value/Generic.php');
    $result = Structures_CSS_Value_Generic::create($B->getValue());
        $result =& new Text_Tokenizer_Token('<term_nonnumeric>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_164 {{{ */
    /**
     * Reduction function for rule 164 
     *
     * Rule 164 is:
     * <term_nonnumeric>-><URI><splus>
     *
     * @param Text_Tokenizer_Token Token of type '<URI>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<term_nonnumeric>' token
     */
    protected function &reduce_rule_164(&$B)
    {
        require_once('Text/Tokenizer/Token.php');
        $B = preg_replace('/url\((.*)\)/', '\1', $B->getValue());
    if ($B[0] == "'" && $B[strlen($B) - 1] == "'" || 
        $B[0] == '"' && $B[strlen($B) - 1] == '"') {
      $B = substr($B, 1, strlen($B) - 2);
      $B = strtr($B, array('\\"' => '"', "\\'" => "'", '\\\\' => '\\'));
    }
    require_once('Structures/CSS/Value/URI.php');
    $result = new Structures_CSS_Value_URI($B);
        $result =& new Text_Tokenizer_Token('<term_nonnumeric>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_142 {{{ */
    /**
     * Reduction function for rule 142 
     *
     * Rule 142 is:
     * <term_numeric_number>-><NUMBER><splus>
     *
     * @param Text_Tokenizer_Token Token of type '<NUMBER>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<term_numeric_number>' token
     */
    protected function &reduce_rule_142(&$B)
    {
        require_once('Text/Tokenizer/Token.php');
        require_once('Structures/CSS/Value/Numeric.php');
    $result = Structures_CSS_Value_Numeric::create($B->getValue());
        $result =& new Text_Tokenizer_Token('<term_numeric_number>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_144 {{{ */
    /**
     * Reduction function for rule 144 
     *
     * Rule 144 is:
     * <term_numeric_number>-><PERCENTAGE><splus>
     *
     * @param Text_Tokenizer_Token Token of type '<PERCENTAGE>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<term_numeric_number>' token
     */
    protected function &reduce_rule_144(&$B)
    {
        require_once('Text/Tokenizer/Token.php');
        require_once('Structures/CSS/Value/Unit.php');
    $result = Structures_CSS_Value_Unit::create($B->getValue());
        $result =& new Text_Tokenizer_Token('<term_numeric_number>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_146 {{{ */
    /**
     * Reduction function for rule 146 
     *
     * Rule 146 is:
     * <term_numeric_number>-><LENGTH><splus>
     *
     * @param Text_Tokenizer_Token Token of type '<LENGTH>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<term_numeric_number>' token
     */
    protected function &reduce_rule_146(&$B)
    {
        require_once('Text/Tokenizer/Token.php');
        require_once('Structures/CSS/Value/Unit.php');
    $result = Structures_CSS_Value_Unit::create($B->getValue());
        $result =& new Text_Tokenizer_Token('<term_numeric_number>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_148 {{{ */
    /**
     * Reduction function for rule 148 
     *
     * Rule 148 is:
     * <term_numeric_number>-><EMS><splus>
     *
     * @param Text_Tokenizer_Token Token of type '<EMS>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<term_numeric_number>' token
     */
    protected function &reduce_rule_148(&$B)
    {
        require_once('Text/Tokenizer/Token.php');
        require_once('Structures/CSS/Value/Unit.php');
    $result = Structures_CSS_Value_Unit::create($B->getValue());
        $result =& new Text_Tokenizer_Token('<term_numeric_number>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_150 {{{ */
    /**
     * Reduction function for rule 150 
     *
     * Rule 150 is:
     * <term_numeric_number>-><EXS><splus>
     *
     * @param Text_Tokenizer_Token Token of type '<EXS>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<term_numeric_number>' token
     */
    protected function &reduce_rule_150(&$B)
    {
        require_once('Text/Tokenizer/Token.php');
        require_once('Structures/CSS/Value/Unit.php');
    $result = Structures_CSS_Value_Unit::create($B->getValue());
        $result =& new Text_Tokenizer_Token('<term_numeric_number>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_152 {{{ */
    /**
     * Reduction function for rule 152 
     *
     * Rule 152 is:
     * <term_numeric_number>-><ANGLE><splus>
     *
     * @param Text_Tokenizer_Token Token of type '<ANGLE>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<term_numeric_number>' token
     */
    protected function &reduce_rule_152(&$B)
    {
        require_once('Text/Tokenizer/Token.php');
        require_once('Structures/CSS/Value/Unit.php');
    $result = Structures_CSS_Value_Unit::create($B->getValue());
        $result =& new Text_Tokenizer_Token('<term_numeric_number>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_154 {{{ */
    /**
     * Reduction function for rule 154 
     *
     * Rule 154 is:
     * <term_numeric_number>-><TIME><splus>
     *
     * @param Text_Tokenizer_Token Token of type '<TIME>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<term_numeric_number>' token
     */
    protected function &reduce_rule_154(&$B)
    {
        require_once('Text/Tokenizer/Token.php');
        require_once('Structures/CSS/Value/Unit.php');
    $result = Structures_CSS_Value_Unit::create($B->getValue());
        $result =& new Text_Tokenizer_Token('<term_numeric_number>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_156 {{{ */
    /**
     * Reduction function for rule 156 
     *
     * Rule 156 is:
     * <term_numeric_number>-><FREQ><splus>
     *
     * @param Text_Tokenizer_Token Token of type '<FREQ>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<term_numeric_number>' token
     */
    protected function &reduce_rule_156(&$B)
    {
        require_once('Text/Tokenizer/Token.php');
        require_once('Structures/CSS/Value/Unit.php');
    $result = Structures_CSS_Value_Unit::create($B->getValue());
        $result =& new Text_Tokenizer_Token('<term_numeric_number>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_158 {{{ */
    /**
     * Reduction function for rule 158 
     *
     * Rule 158 is:
     * <term_numeric_number>-><DIMENSION><splus>
     *
     * @param Text_Tokenizer_Token Token of type '<DIMENSION>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<term_numeric_number>' token
     */
    protected function &reduce_rule_158(&$B)
    {
        require_once('Text/Tokenizer/Token.php');
        require_once('Structures/CSS/Value/Generic.php');
    $result = Structures_CSS_Value_Generic::create($B->getValue());
        $result =& new Text_Tokenizer_Token('<term_numeric_number>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_168 {{{ */
    /**
     * Reduction function for rule 168 
     *
     * Rule 168 is:
     * <hexcolor>-><HASH><splus>
     *
     * @param Text_Tokenizer_Token Token of type '<HASH>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<hexcolor>' token
     */
    protected function &reduce_rule_168(&$B)
    {
        require_once('Text/Tokenizer/Token.php');
        require_once('Structures/CSS/Value/Color.php');
    $result = Structures_CSS_Value_Color::create($B->getValue());
        $result =& new Text_Tokenizer_Token('<hexcolor>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_55 {{{ */
    /**
     * Reduction function for rule 55 
     *
     * Rule 55 is:
     * <ppage>-><pagesym_sstar><pseudo_page><splus><LBRACE><declarations_optional_semicolon><RBRACE>
     *
     * @param Text_Tokenizer_Token Token of type '<pseudo_page>'
     * @param Text_Tokenizer_Token Token of type '<declarations_optional_semicolon>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<ppage>' token
     */
    protected function &reduce_rule_55(&$B,&$C)
    {
        require_once('Text/Tokenizer/Token.php');
        $result = array(
        'pseudo' => $B->getValue(),
        'declarations' => $C->getValue()
    );
        $result =& new Text_Tokenizer_Token('<ppage>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_58 {{{ */
    /**
     * Reduction function for rule 58 
     *
     * Rule 58 is:
     * <ppage>-><pagesym_sstar><pseudo_page><LBRACE><declarations_optional_semicolon><RBRACE><splus>
     *
     * @param Text_Tokenizer_Token Token of type '<pseudo_page>'
     * @param Text_Tokenizer_Token Token of type '<declarations_optional_semicolon>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<ppage>' token
     */
    protected function &reduce_rule_58(&$B,&$C)
    {
        require_once('Text/Tokenizer/Token.php');
        $result = array(
        'pseudo' => $B->getValue(),
        'declarations' => $C->getValue()
    );
        $result =& new Text_Tokenizer_Token('<ppage>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_41 {{{ */
    /**
     * Reduction function for rule 41 
     *
     * Rule 41 is:
     * <media>-><media_sym_sstar><medialist><LBRACE><splus><rulesetplus><RBRACE><splus>
     *
     * @param Text_Tokenizer_Token Token of type '<medialist>'
     * @param Text_Tokenizer_Token Token of type '<rulesetplus>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<media>' token
     */
    protected function &reduce_rule_41(&$B,&$C)
    {
        require_once('Text/Tokenizer/Token.php');
        require_once('Structures/CSS/Rule/AtMedia.php');
    $result = array(new Structures_CSS_Rule_AtMedia($B->getValue(), $C->getValue()));;
        $result =& new Text_Tokenizer_Token('<media>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_127 {{{ */
    /**
     * Reduction function for rule 127 
     *
     * Rule 127 is:
     * <ddeclaration>-><property><COLON><splus><expr><prio>
     *
     * @param Text_Tokenizer_Token Token of type '<property>'
     * @param Text_Tokenizer_Token Token of type '<expr>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<ddeclaration>' token
     */
    protected function &reduce_rule_127(&$B,&$C)
    {
        require_once('Text/Tokenizer/Token.php');
        $result = array(
        'property' => $B->getValue(),
        'expressions' => $C->getValue(),
        'priority' => true
    );
        $result =& new Text_Tokenizer_Token('<ddeclaration>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_136 {{{ */
    /**
     * Reduction function for rule 136 
     *
     * Rule 136 is:
     * <expr>-><expr><operator><term>
     *
     * @param Text_Tokenizer_Token Token of type '<expr>'
     * @param Text_Tokenizer_Token Token of type '<operator>'
     * @param Text_Tokenizer_Token Token of type '<term>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<expr>' token
     */
    protected function &reduce_rule_136(&$B,&$C,&$D)
    {
        require_once('Text/Tokenizer/Token.php');
        $result =& $B->getValue();
    $result[] = $D->getValue();
    $result[] = $C->getValue();
        $result =& new Text_Tokenizer_Token('<expr>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_71 {{{ */
    /**
     * Reduction function for rule 71 
     *
     * Rule 71 is:
     * <operator>-><SLASH><splus>
     *
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<operator>' token
     */
    protected function &reduce_rule_71()
    {
        require_once('Text/Tokenizer/Token.php');
        $result = '/';
        $result =& new Text_Tokenizer_Token('<operator>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_73 {{{ */
    /**
     * Reduction function for rule 73 
     *
     * Rule 73 is:
     * <operator>-><COMMA><splus>
     *
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<operator>' token
     */
    protected function &reduce_rule_73()
    {
        require_once('Text/Tokenizer/Token.php');
        $result = ',';
        $result =& new Text_Tokenizer_Token('<operator>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_133 {{{ */
    /**
     * Reduction function for rule 133 
     *
     * Rule 133 is:
     * <important_sym_sstar>-><IMPORTANT_SYM><splus>
     *
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<important_sym_sstar>' token
     */
    protected function &reduce_rule_133()
    {
        require_once('Text/Tokenizer/Token.php');
        $result = '';
        $result =& new Text_Tokenizer_Token('<important_sym_sstar>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_172 {{{ */
    /**
     * Reduction function for rule 172 
     *
     * Rule 172 is:
     * <function>-><CSSFUNCTION><expr><RPAREN>
     *
     * @param Text_Tokenizer_Token Token of type '<CSSFUNCTION>'
     * @param Text_Tokenizer_Token Token of type '<expr>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<function>' token
     */
    protected function &reduce_rule_172(&$B,&$C)
    {
        require_once('Text/Tokenizer/Token.php');
        $result = array(
        'name' => strtr($B->getValue(), array('(' => '')),
        'args' => $C->getValue(),
    );
        $result =& new Text_Tokenizer_Token('<function>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_56 {{{ */
    /**
     * Reduction function for rule 56 
     *
     * Rule 56 is:
     * <ppage>-><pagesym_sstar><pseudo_page><splus><LBRACE><declarations_optional_semicolon><RBRACE><splus>
     *
     * @param Text_Tokenizer_Token Token of type '<pseudo_page>'
     * @param Text_Tokenizer_Token Token of type '<declarations_optional_semicolon>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<ppage>' token
     */
    protected function &reduce_rule_56(&$B,&$C)
    {
        require_once('Text/Tokenizer/Token.php');
        $result = array(
        'pseudo' => $B->getValue(),
        'declarations' => $C->getValue()
    );
        $result =& new Text_Tokenizer_Token('<ppage>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_170 {{{ */
    /**
     * Reduction function for rule 170 
     *
     * Rule 170 is:
     * <function>-><CSSFUNCTION><splus><expr><RPAREN>
     *
     * @param Text_Tokenizer_Token Token of type '<CSSFUNCTION>'
     * @param Text_Tokenizer_Token Token of type '<expr>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<function>' token
     */
    protected function &reduce_rule_170(&$B,&$C)
    {
        require_once('Text/Tokenizer/Token.php');
        $result = array(
        'name' => strtr($B->getValue(), array('(' => '')),
        'args' => $C->getValue(),
    );
        $result =& new Text_Tokenizer_Token('<function>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_171 {{{ */
    /**
     * Reduction function for rule 171 
     *
     * Rule 171 is:
     * <function>-><CSSFUNCTION><expr><RPAREN><splus>
     *
     * @param Text_Tokenizer_Token Token of type '<CSSFUNCTION>'
     * @param Text_Tokenizer_Token Token of type '<expr>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<function>' token
     */
    protected function &reduce_rule_171(&$B,&$C)
    {
        require_once('Text/Tokenizer/Token.php');
        $result = array(
        'name' => strtr($B->getValue(), array('(' => '')),
        'args' => $C->getValue(),
    );
        $result =& new Text_Tokenizer_Token('<function>', $result);
        return $result;
    }
    /* }}} */
    /* reduce_rule_169 {{{ */
    /**
     * Reduction function for rule 169 
     *
     * Rule 169 is:
     * <function>-><CSSFUNCTION><splus><expr><RPAREN><splus>
     *
     * @param Text_Tokenizer_Token Token of type '<CSSFUNCTION>'
     * @param Text_Tokenizer_Token Token of type '<expr>'
     * @return Text_Tokenizer_Token Result token from reduction. It must be a '<function>' token
     */
    protected function &reduce_rule_169(&$B,&$C)
    {
        require_once('Text/Tokenizer/Token.php');
        $result = array(
        'name' => strtr($B->getValue(), array('(' => '')),
        'args' => $C->getValue(),
    );
        $result =& new Text_Tokenizer_Token('<function>', $result);
        return $result;
    }
    /* }}} */
}
?>