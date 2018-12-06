<?php 
function access_denied_messages($fail_url, $message){
  if(isset($_GET[$fail_url])){
    return '<p class="denied">' . $message . '</p>';
  }
}

function text_shorten($text, $limit = 300){
        
    $text = $text . " ";
    $text = substr($text, 0, $limit);
    $text = $text . "...";  

    return '<p>' . $text . '</p>';
}

