<?php
header('Content-Type: application/json; charset=utf-8');

$curl = curl_init();
// set post fields
$post = [
    'command' => morse_encoder("freemem"),
    'command' => morse_encoder("cpu"),
];
curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://ik.olleco.net/morse-api/',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => $post,

));

$response = curl_exec($curl);

curl_close($curl);
function get_morse() {
	return array('a' => '.-',
    'b' => '-...',
    'c' => '-.-.',
    'd' => '-..',
    'e' => '.',
    'f' => '..-.',
    'g' => '--.',
    'h' => '....',
    'i' => '..',
    'j' => '.---',
    'k' => '-.-',
    'l' => '.-..',
    'm' => '--',
    'n' => '-.',
    'o' => '---',
    'p' => '.--.',
    'q' => '--.-',
    'r' => '.-.',
    's' => '...',
    't' => '-',
    'u' => '..-',
    'v' => '...-',
    'w' => '.--',
    'x' => '-..-',
    'y' => '-.--',
    'z' => '--..',
    '0' => '-----',
    '1' => '.----',
    '2' => '..---',
    '3' => '...--',
    '4' => '....-',
    '5' => '.....',
    '6' => '-....',
    '7' => '--...',
    '8' => '---..',
    '9' => '----.',
    '.' => '.-.-.-',
    ',' => '--..--',
    '?' => '..--..',
    '/' => '-..-.',
    ' ' => ' ',);
}

function morse_encoder($wordd) {
    $morse = array_map("trim", get_morse());
    $output = "";
    foreach (str_split($wordd) as $value) {
		$output .= $morse[$value]." ";
       
	} 
    return $output;
	//return str_replace(array_keys(get_morse()),get_morse(), strtolower($wordd));
}
function morse_decoder($word) {
	$morse = array_map("trim", get_morse());
	$output = "";
	foreach (explode(" ", $word) as $value) {
		$output .= array_search($value, $morse);
	}
	return strtoupper($output);
}

//echo morse_encoder("arch"); echo "\n";
//echo morse_decoder(".---- ...-- ..--- ..... ----. .---- -.... .---- -.... -----")."\n";


print_r(json_decode($response));

?>