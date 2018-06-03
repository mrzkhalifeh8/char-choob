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
/*
output or returns parsable string of a variable
that you want to export.if $return is used and set,
to true function will return the variable rep
*/
function dump($var, $return = false)
{
    if (is_array($var)) {
        $out = print_r($var, true);
    } elseif (is_object($var, true)) {
        $out = var_export($var, true);
    } else {
        $out = $var;
    }

    if ($return) {
        return "\n<pre style='direction: ltr'>\n $out\n </pre>\n";;
    } else {
        echo "\n<pre style='direction: ltr'>\n $out\n </pre>\n";
    }

}
// function to return current time & date
function getCurrentDateTime()
{
    return date('Y-m-d H:i:s');
}

//encrypt password with salt
function encryptPassword($password)
{
    global $config;
    return md5($password . $config['salt']);

}

//geting full url
//getting full url
function getFullUrl(){
    $fullurl ='http://' . $_SERVER['HTTP_HOST'] .  $_SERVER['REQUEST_URI'];
    return $fullurl;
  }

  //getting the request uri
  function getRequestUri(){
    return $_SERVER['REQUEST_URI'];
  }
  //getting base url
  function baseUrl(){
    global $config;
    return $config['base'];
  }
/*
find the occurrence of one string inside another one 
with casesensetive parameter,
case sensetive if used and set to true function will check occurrence with 
exact formant else first turn all characters to lower. then check occurence 

*/
function strhas($string, $search , $caseSensitive =false) {
    if($caseSensitive){
      return strpos($string, $search) !== false;
    }else{
      return strpos(strtolower($string), strtolower($search)) !== false;
    }
  
  }