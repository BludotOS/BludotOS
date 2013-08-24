<?php
/*include('../../../../../include/session.php');
include('../../../../../include/view_active.php');
include('../../../../../include/coreBC.php');
$realm = 'Restricted area';
ob_start();
//user => password
echo $session->username;*/
//$users = array(''.$session->username.'' => 'test');

if (!isset($_SERVER['PHP_AUTH_USER'])) {
    header('WWW-Authenticate: Basic realm="My Realm"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'Text to send if user hits Cancel button';
    exit;
} else {
    if($_SERVER['PHP_AUTH_USER'] == 'e20a4cf3a086a3f33eb886bb3ae14dc0' && $_SERVER['PHP_AUTH_PW'] == '4a2d9034e280de92ae3fbeb0a7621d6c')
    {
    echo "<p>Hello {$_SERVER['PHP_AUTH_USER']}.</p>";
    echo "<p>You entered {$_SERVER['PHP_AUTH_PW']} as your password.</p>";
    };
}
?>