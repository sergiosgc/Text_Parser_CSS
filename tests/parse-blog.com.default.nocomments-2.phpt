--TEST--
Parse blog.com.default.nocomments-2.css
--FILE--
<?php
dl('Text_Tokenizer_Regex_Matcher_Ext.so');
ini_set('include_path', sprintf('%s:%s', 
    realpath(dirname(__FILE__) . '/../'),
    ini_get('include_path')));
require_once('Text/Tokenizer/Regex/Matcher/Php.php');
require_once('Text/Parser/CSS/Tokenizer.php');
require_once('Text/Parser/CSS.php');
$tokenizer = new Text_Parser_CSS_Tokenizer(file_get_contents(dirname(__FILE__) . '/input/blog.com.default.nocomments-1.css'), new Text_Tokenizer_Regex_Matcher_Ext());

$parser = new Text_Parser_CSS($tokenizer);
print((string) $parser->parse()->getValue());
?>
--EXPECT--
img#logo
{
 position: absolute;
 border: 0px;
 height: 85px
}
body
{
 background: rgb(255, 255, 255) url('/images/internal.bg.png') repeat-x scroll top left;
 border: 0px;
 margin: 0px;
 padding: 85px 0px 0px 0px;
 color: #999999;
 text-align: center
}
body.fckeditor
{
 background: rgb(255, 255, 255) url('/images/fckeditor.bg.png') repeat-x scroll top left
}
a
{
 color: 5db
}
div#content
{
 margin: 0px auto;
 width: 739px;
 text-align: left
}
#header
{
 position: absolute;
 height: 85px;
 width: 739px;
 margin-left: auto;
 margin-right: auto;
 top: 0px;
 background: 72c url('/images/header.bg.png') no-repeat scroll top left;
 text-decoration: none
}
#header a#header-home-link
{
 width: 235px;
 height: 85px;
 position: absolute;
 top: 0px;
 left: 0px
}
#header #header-banner
{
 position: absolute;
 top: 20px;
 left: 261px;
 border: 0px;
 height: 60px;
 width: 468px
}
#header #header-banner iframe
{
 border-style: solid;
 border-color: rgb(255, 255, 255);
 border-width: 5px 5px 0px 5px
}
#header-menu
{
 position: absolute;
 top: 0px;
 left: 439px;
 color: rgb(255, 255, 255);
 width: 300px;
 text-align: right
}
ul#header-menu,
#header-menu li
{
 margin: 0px;
 padding: 0px
}
#header-menu li
{
 display: inline;
 padding: 0px 3px 0px 11px;
 background: transparent url('/images/header.menuseparator.png') no-repeat scroll bottom left
}
#header-menu li.first
{
 background: none
}
#header-menu li a
{
 text-decoration: none;
 color: rgb(255, 255, 255);
 text-transform: uppercase
}
#header-menu ul
{
 list-style-type: none
}
.fckeditor #header
{
 background-image: none;
 height: 25px
}
.createuser #header
{
 background: transparent url('/images/header.createuser.bg.png') no-repeat scroll top left
}
.createblog #header
{
 background: transparent url('/images/header.createblog.bg.png') no-repeat scroll top left
}
.customizeblog #header
{
 background: transparent url('/images/header.customizeblog.bg.png') no-repeat scroll top left
}
.photos #header
{
 background: transparent url('/images/header.photos.bg.png') no-repeat scroll top left
}
body.photos
{
 padding-top: 124px
}
div#breadcrumbs
{
 text-align: right;
 height: 50px
}
.fckeditor div#breadcrumbs
{
 height: 10px
}
div#breadcrumbs span.step
{
 color: 0A;
 vertical-align: middle;
 position: relative;
 top: -3px
}
div#breadcrumbs .step div#breadcrumbs .step img
{
 border: 1px solid rgb(255, 0, 0);
 display: inline
}
div#breadcrumbs .step img
{
 position: relative;
 top: 9px
}
div#title
{
 background: transparent url('/images/title.bg.png') no-repeat scroll top right;
 line-height: 62px;
 color: rgb(255, 255, 255);
 text-align: left;
 padding-left: 95px
}
.createuser div#title
{
 background-image: url('/images/title.1.bg.png')
}
.createblog div#title
{
 background-image: url('/images/title.2.bg.png')
}
.customizeblog div#title
{
 background-image: url('/images/title.3.bg.png')
}
.success div#title
{
 background-image: url('/images/title.s.bg.png')
}
div#body
{
 background: 5dae url('/images/body.bg.png') no-repeat scroll top right;
 min-height: 420px;
 margin: 8px 0px 0px 78px;
 padding: 24px 30px;
 text-align: left
}
.fckeditor div#body
{
 padding-top: 5px
}
div#body,
div#body a,
div#body td,
div#body td a
{
 color: 47656D
}
div#body div,
div#body h2,
div#body h3,
div#body h4,
div#body h5,
div#body h6
{
 text-align: left
}
.customizeblog div#body,
.customizeblog div#body div,
.customizeblog div#body h1,
.customizeblog div#body h2,
.customizeblog div#body h3,
.customizeblog div#body h4,
.customizeblog div#body h5,
.customizeblog div#body h6
{
 text-align: center
}
h1
{
 background-image: url('/images/navh2.png');
 height: 35px;
 width: 766px;
 color: #336699;
 padding-left: 12px;
 padding-top: 7px;
 font-size: 25px;
 margin-top: 5px;
 margin-bottom: 0px;
 text-align: left
}
div#body-bottom
{
 background: transparent url('/images/body.bottom.png') no-repeat scroll top right;
 height: 16px;
 margin: 0px 0px 15px 78px;
 padding: 0px
}
.success div#body
{
 background-color: 2e;
 background-image: url('/images/body-success.bg.png');
 min-height: 0px;
 height: 155px;
 text-align: right;
 position: relative;
 margin-bottom: 18px
}
.success div.whiterounded p
{
 margin: 5px 0px 0px 0px;
 padding: 0px
}
.success div.whiterounded
{
 width: 434px;
 padding: 20px 20px 20px 20px;
 margin: 0px 0px 0px auto;
 background: rgb(255, 255, 255) url('/images/whiterounded-success.top.png') no-repeat scroll top right;
 text-align: left
}
.success div.whiterounded-bottom
{
 background: transparent url('/images/whiterounded-success.bottom.gif') no-repeat scroll top right;
 width: 474px;
 height: 18px;
 margin: 0px 0px 0px auto
}
.success input.submit
{
 margin: 0px 0px 0px auto;
 position: absolute;
 top: 142px;
 left: 440px;
 background: transparent url('/images/button-success.greennext.gif') no-repeat scroll bottom left
}
.success #body-bottom
{
 display: none
}
div#body form td
{
 border: solid 4d;
 border-width: 1px 0px 0px 0px;
 vertical-align: top
}
div#body form td.label
{
 width: 132px;
 padding: 4px
}
div#body form td.label .optional
{
 display: block
}
div#body form td.input
{
 width: 260px;
 padding: 4px
}
div#body form td.wideinput
{
 width: auto
}
div#body form td.input textarea,
div#body form td.input select,
div#body form td.input input.text
{
 width: 230px
}
div#body form td.input textarea
{
 height: 65px
}
div#body form td.help
{
 background: transparent url('/images/form.help.bg.gif') no-repeat scroll top left;
 padding: 4px 4px 4px 15px;
 text-align: left
}
div#body form td.tags
{
 padding: 4px 4px 4px 15px;
 text-align: left
}
div#body form td.help p
{
 margin-top: 0;
 margin-bottom: 2em
}
div#body form td.error
{
 background: transparent url('/images/form.error.bg.gif') no-repeat scroll top left;
 padding: 4px 4px 4px 15px;
 color: #c95534
}
div#body form td.help-empty
{
 background-image: none
}
div#body input.submit
{
 display: block;
 width: 166px;
 height: 37px;
 border: 0px;
 margin: 0px;
 padding: 0px 0px 0px 13px;
 background: transparent url('/images/button.greennext.gif') no-repeat scroll bottom left;
 color: rgb(255, 255, 255);
 text-align: left;
 text-transform: lowercase;
 vertical-align: middle
}
div#body form td#blogurl input
{
 width: 165px;
 display: inline
}
div#body form td#blogurl select
{
 display: inline;
 width: 100px
}
table.layout
{
 border: 0px solid rgb(0, 128, 0)
}
div#body td.imagepick th
{
 background: transparent url('/images/imagepick.top.gif') no-repeat scroll top left;
 width: 187px;
 padding: 13px 21px 0px 0px;
 margin: 0px 0px 0px 0px;
 border: 0px;
 padding-right: 0px
}
div#body td.imagepick th.empty
{
 background-image: none
}
div#body td.imagepick td
{
 background: transparent url('/images/imagepick.bottom.gif') no-repeat scroll bottom left;
 width: 187px;
 margin: 0px;
 padding: 0px 19px 35px 0px
}
.imagepick img
{
 border: 0px
}
.imagepick
{
 padding-top: 20px;
 padding-bottom: 20px
}
div#body td.imagepick td.last,
div#body td.imagepick th.last
{
 padding-right: 0px
}
.imagepick div.white
{
 background: transparent url('/images/imagepick.bottom.gif') no-repeat bottom left;
 margin: 0px;
 padding: 0px 0px 35px 0px;
 width: 187px;
 height: 100%;
 text-align: center;
 overflow: hidden
}
div.greenbutton
{
 background: transparent url('/images/button.green.gif') no-repeat scroll center center;
 width: 106px;
 height: 24px;
 margin: 0px auto;
 text-align: center;
 text-transform: lowercase;
 color: rgb(255, 255, 255)
}
div.prevbutton,
div.nextbutton,
.customizeblog div#body div.prevbutton,
.customizeblog div#body div.nextbutton
{
 float: right;
 width: 133px;
 height: 24px;
 background: transparent url('/images/button.greennext.gif') no-repeat scroll center center;
 margin: 0px;
 padding: 7px 23px 6px 10px;
 text-align: left;
 text-transform: lowercase;
 vertical-align: middle
}
