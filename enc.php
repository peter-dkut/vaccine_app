<?php
   use Defuse\Crypto\Crypto;
   use  Defuse\Crypto\Key;
   require "vendor/autoload.php";
   $key=Key::createNewRandomKey();

   $message="we  are good in php";
   $encrypt=Crypto::encrypt($message,$key);
   $dec=Crypto::decrypt($encrypt,$key);
   $amount=count($encrypt);

   echo "$encrypt";
   echo "<br>";
   echo "$dec";
   