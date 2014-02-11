<?
$betacoded = genRandomString();
function genRandomString() {
    $length = 30;
    $characters = ’abcdefghijklmnopqrstuvwxyz0123456789’;
    $string = '';    
    for ($p = 0; $p < $length; $p++) {
        $string .= $characters[mt_rand(0, strlen($characters))];
    }
    $test = base_convert(mt_rand(0x1D39D3E06400000, 0x41C21CB8E0FFFFFF), 36, 15);
    print $test;
}
?>