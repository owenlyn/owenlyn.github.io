<?php
    /* Send an SMS using Twilio. You can run this file 3 different ways:
     *
     * - Save it as sendnotifications.php and at the command line, run 
     *        php sendnotifications.php
     *
     * - Upload it to a web host and load mywebhost.com/sendnotifications.php 
     *   in a web browser.
     * - Download a local server like WAMP, MAMP or XAMPP. Point the web root 
     *   directory to the folder containing this file, and load 
     *   localhost:8888/sendnotifications.php in a web browser.
     */
 
    // Step 1: Download the Twilio-PHP library from twilio.com/docs/libraries, 
    // and move it into the folder containing this file.
    require "twilio-php-master/Services/Twilio.php";
 
    // Step 2: set our AccountSid and AuthToken from www.twilio.com/user/account
   // set your AccountSid and AuthToken from www.twilio.com/user/account
    $AccountSid = "ACf33d3ad02556c7a269bfbcff427c95d1";
    $AuthToken = "f62e9ad108a735916f2245d12c64198c";


 
    // Step 3: instantiate a new Twilio Rest Client
    $client = new Services_Twilio($AccountSid, $AuthToken);
 
    // Step 4: make an array of people we know, to send them a message. 
    // Feel free to change/add your own phone number and name here.
    $people = array(
        //"+14047230214" => "Amir",
        //"+17703659375" => "Chris"
        "+16785759906" => "owen"
    );
 
    // Step 5: Loop over all our friends. $number is a phone number above, and 
    // $name is the name next to it
    foreach ($people as $number => $name) {
 
        $sms = $client->account->messages->sendMessage(
 
        // Step 6: Change the 'From' number below to be a valid Twilio number 
        // that you've purchased, or the (deprecated) Sandbox number
            "14803606746", 
 
            // the number we are sending to - Any phone number
            $number,
 
            // the sms body
            "Hey $name, This is how we will send a text at the Hackathon Demo"
        );
 
        // Display a confirmation message on the screen
        echo "Sent message to $name";
    }