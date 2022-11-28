<?php

function isSecure()
{
  return (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
    || $_SERVER['SERVER_PORT'] == 443;
}
if(isSecure()){
  $currentlink = 'https';
}else{
  $currentlink = 'http';
}
$currentlink .= "://" . $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$MetaDetails = App\Models\MetaDetails::where('pageurl', '=', $currentlink)->paginate(1000, ['*'], 'page', (int)$_GET['page']);
$MetaDetailscount = $MetaDetails->count();
if ($MetaDetailscount) {
  foreach ($MetaDetails as $MetaDetailstag) {
    echo $MetaDetailstag->title;
    echo $MetaDetailstag->description;
  }
} else {
?>
  <title>The Automotive Component Manufacturers Association of India - ACMA</title>
  <meta name="description" content="ACMA represents the interest of over 830 auto component manufacturers contributing more than 85% of the auto component industry's turnover in the organized sector.">
<?php
}
?>