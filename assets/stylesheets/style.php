<?
header('Content-type: text/css');
header("Last-Modified: ".gmdate('D, d M Y H:i:s', filemtime($_GET['file']))." GMT");
header("Expires: ".gmdate('D, d M Y H:i:s', (filemtime($_GET['file']) + 691200))." GMT");

ob_start('ob_gzhandler');
ob_start('compress');

//Function for compressing the CSS as tightly as possible
function compress($buffer) {
  //Remove CSS comments
  $buffer = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $buffer);
  //Remove tabs, spaces, newlines, etc.
  $buffer = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $buffer);
  return $buffer;
}

require($_GET['file']);

ob_end_flush();
ob_end_flush();
?>