<?php
define('OAUTH2_CLIENT_ID', 'c89d3589bb8755204a1a');
define('OUATH2_CLIENT_SECRET', '090b127e5ba1e7feaed4ccfc35199eb28ed5aa6a');

$authorizeURL = 'https://github.com/login/oauth/authorize';
$tokenURL = 'https://github.com/login/ouath/access_token';
$apiURLBase = 'https://api.github.com/';
$directURL = 'http://root.brickcraftmc.nl:8095/auth/auth.php';

session_start();

if(get('action') == 'login') {

  $_SESSION['state'] = hash('sha256', microtime(TRUE).rand().$_SERVER['REMOTE_ADDR']);
  unset($_SESSION['access_token']);
  
  $params = array(
    'client_id' => OAUTH2_CLIENT_ID,
    'redirect_uri' => $directURL,
    'scope' => 'user',
    'state' => $_SESSION['state']
  );

  header('Location: ' . $authorizeURL . '?' . http_build_query($params));
  die();
}

if(get('code')) {
	if(!get('state') || $_SESSION['state'] != get('state')) {
		header('Location: ' . $directURL);
		die();
	}
	echo "session valid";

	$token = apiRequest($tokenURL, array(
    	'client_id' => OAUTH2_CLIENT_ID,
    	'client_secret' => OAUTH2_CLIENT_SECRET,
    	'redirect_uri' => $directURL,
    	'state' => $_SESSION['state'],
    	'code' => get('code')
  	));

	echo "created token array and prepared it";

    $_SESSION['access_token'] = $token->access_token;
    header('Location: ' . $directURL);
}

if(get(error)) {
	echo "An error occured.";
	echo "<p>" . $_GET['error'] . ": " . $_GET['error_description'] . "</p><a href=\"" . $_GET['error_uri'] . "\">Click here for more info.</a>";
}

if(session('access_token')) {
	$user = apiRequest($apiURLBase . 'user');

	echo '<h3>Logged In</h3>';
  	echo '<h4>' . $user->name . '</h4>';
  	echo '<pre>';
  	print_r($user);
  	echo '</pre>';
} else {
	echo '<h3>Not logged in</h3>';
  	echo '<p><a href="?action=login">Log In</a></p>';
}

function apiRequest($url, $post=FALSE, $headers=array()) {
  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

  if($post)
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));

  $headers[] = 'Accept: application/json';

  if(session('access_token'))
    $headers[] = 'Authorization: Bearer ' . session('access_token');

  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

  $response = curl_exec($ch);
  return json_decode($response);
}

function get($key, $default=NULL) {
  return array_key_exists($key, $_GET) ? $_GET[$key] : $default;
}
function session($key, $default=NULL) {
  return array_key_exists($key, $_SESSION) ? $_SESSION[$key] : $default;
}

?>