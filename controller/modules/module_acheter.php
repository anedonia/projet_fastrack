<?php

function paiment_is_full()
{
    $full=true;
    foreach(array("cardname","cardnumber","expmonth","expyear","cvv") as $key)
    {
        if (empty($_POST[$key]))
        {
            $full = false;
        }
    }
    return $full;
}

function cryptage_info_paiement()
{
    $info = [];
    foreach(array("cardname","cardnumber","expmonth","expyear","cvv") as $key)
    {

        //la key et iv son à cahcer et je sais pas encore comment
        $secret_key = "bite";
        $secret_iv = 'This is my secret iv';
        // hash
        $key_crypt = hash('sha256', $secret_key);
        // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
        $iv = substr(hash('sha256', $secret_iv), 0, 16);

        $output = openssl_encrypt ($_POST[$key],"AES-256-CBC",$key_crypt,0,$iv);
        $info[$key] = base64_encode($output);

        /*
        $output = openssl_decrypt(base64_decode($info[$key]),"AES-256-CBC",$key_crypt,0,$iv);

        echo $output,"<br>";
        */
    }
    return $info;
}




