# Core-Shortcodes
This plugin includes some basic yet handy shortcodes for WordPress themes, make sure to activate ‘Core Shortcodes’ plugin before using these plugins. Shortcode details are below.

## Buttons Shortcode

Button shortcode accepts 5 parameters and can be defined as …

    [button url="# " color="black" size="small" type="square" target="blank"]Button[/button]

Possible values of each parameter is given below , default values are given in bold font:

**Parameter Possible Values**
_ _ _


**url:**	any URL with proper format
_ _ _

**color:**	black, grey, green, blue, yellow, red, purple, orange, pink
_ _ _

**size:**	small, medium, large
_ _ _

**type:**	square, round
_ _ _

**target:**	blank, self, parent, top


## Tabs Shortcode
	
You can create tabbed sections in your site using this shortcode. This shortcode has special syntax. You need to wrap all your [tab] shortcodes within [tabs] shortcode like the example below to make it work as a tabbed section  …

    [tabs]
    [tab title="First Title"]Your Content  Here.[/tab]
    [tab title="Second Title"]Your Content  Here.[/tab] 
    [tab title="Third  Title"]Your Content  Here.[/tab] 
    [/tabs]


## Toggle Shortcode
	
Toggle shortcode accepts only 1 parameter named ‘state’ and it accepts two values (open, collapse). Default value is ‘collapse’.

    [toggle  title=" Title Here" state="open"] Content  Here.  [/toggle]


##  Alert Shortcode
	
Similar  to toggle shortcode, this shortcode also accepts only 1 parameter named ‘style and it accepts four values (success, error, info, note). Default value is ‘info’.

    [alert style="success"]Your Content Here.[/alert]


##  Higlight Text Shortcode
	
This shortcode is used to highlight any  text in your writings. To highlight some text, wrap such text with this shortcode as given in the example.

    [highlight] Your Text Here. [/highlight]
