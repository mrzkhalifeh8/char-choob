<?
/*
output or return hr tag,if $return used and set to true,
 function will return the hr tag with enter instead of outputing it.
 */
function hr($return = false)
{
    if ($return) {
        return "<hr>\n";
    } else {
        echo "<hr>\n";
    }
}
/*
output or return br tag,if $return used and set to true,
 function will return the br tag with enter instead of outputing it.
 */
function br($return = false)
{
    if ($return) {
        return "<br>\n";
    } else {
        echo "<br>\n";
    }
}