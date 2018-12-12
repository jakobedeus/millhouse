<?php 

// A function which uses $_GET url to return a message to make specific error messages.
function access_denied_messages($fail_url, $message){
  if(isset($_GET[$fail_url])){
    return '<p class="text_denied">' . $message . '</p>';
  }
}

// function to show excerpts on feed.php
// Set string limit to 300 characters.
function text_shorten($text, $limit = 300){
        
    $text = $text . " ";
    $text = substr($text, 0, $limit);
    $text = $text . "...";  
  // When 300 characters is met, return $text.
    return '<p>' . $text . '</p>';
}

