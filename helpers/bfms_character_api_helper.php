<?php 

if(!function_exists('bfms_character__api__get_character'))
{
  function bfms_character__api__get_character($char)
  {
    $apiUrl = preg_replace('/character\/(\d+)/i', 'wp-json/wp/v2/character/$1', $char->bfms_character_url);
    $ch = curl_init();
    curl_setopt_array($ch, array(
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_HEADER         => false,
      CURLOPT_USERAGENT      => "nova",
    ));
    curl_setopt($ch, CURLOPT_URL, $apiUrl);
    $content = curl_exec($ch);
    curl_close($ch);
    return $content;
  }
}
