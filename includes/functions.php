<?php 
function access_denied_messages($fail_url, $message){
  if(isset($_GET[$fail_url])){
    return '<p>' . $message . '</p>';
  }
}

