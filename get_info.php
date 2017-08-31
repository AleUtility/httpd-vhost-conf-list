<?php
/**
 * Created by PhpStorm.
 * User: Alessandro
 * Date: 31/08/2017
 * Time: 21:54
 */

define("HTTPD_VHOST_CONF_PATH", "C:/xampp/apache/conf/extra/httpd-vhosts.conf");

$count = 0;
$content = [];

$directory_content = array_diff(scandir(HTTPD_VHOST_CONF_PATH), array('..', '.'));
foreach ($directory_content as $idx => $file) {
    $httpd_vhosts_conf = explode("\n", file_get_contents(HTTPD_VHOST_CONF_PATH . $file));
    foreach ($httpd_vhosts_conf as $key => $value) {
        $value = trim($value);
        if (!startsWith($value, "#") && $value != "") {
            if (startsWith($value, "</")) {
                $count++;
            } else if (startsWith($value, "<")) { // Save port, but it is unless
                $line = explode(' ', str_replace(['<', '>'], '', $value));
                $line_content = explode(":", $line[1]);
                $content[$count][$line[0]] = array(
                    'ip' => $line_content[0],
                    'port' => $line_content[1]
                );
            } else {
                $line = explode(' ', $value);
                $content[$count][$line[0]] = $line[1];
            }

            // Print it!
            // $value = str_replace("<", "&lt;", $value);
            // $value = str_replace(">", "&gt;", $value);
            // echo "Key: " . $key . "; Value: " . $value . "<br />";
        }
    }
}
// echo '<pre>';
// print_r($content);
// echo '</pre>';

echo JSON_encode($content);

function startsWith($haystack, $needle)
{
    $length = strlen($needle);
    return (substr($haystack, 0, $length) === $needle);
}