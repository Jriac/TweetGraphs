<?php
/**
 * Created by PhpStorm.
 * User: Wesker
 * Date: 21/07/2015
 * Time: 9:57
 */

// The worker will execute every X seconds:

class StreamingDaemon
{
//$seconds = 5;
// We work out the micro seconds ready to be used by the 'usleep' function.
//$micro = $seconds * 1000000;
private  $ch;
private $response;

public function _construct(){
    $this->ch = curl_init();
    curl_setopt($this->ch, CURLOPT_URL, 'https://stream.twitter.com/1.1/statuses/filter.json?track=blackmetal');
    curl_setopt($this->ch, CURLOPT_USERPWD, 'jriac91@gmail.com:Omegas23');
    curl_setopt($this->ch, CURLOPT_WRITEFUNCTION, 'saveTweet');
    curl_setopt($this->ch, CURLOPT_MAXCONNECTS, 1);
    curl_setopt($this->ch, CURLOPT_POST, true);
    curl_setopt($this->ch, CURLOPT_FORBID_REUSE, true);
    curl_setopt($this->ch, CURLOPT_HTTPHEADER, array('Cache-Control: max-age=0', 'Connection: keep-alive', 'Keep-Alive: 3600'));
    $this->response = curl_exec($this->ch);
    var_dump($this->response);
}

    public function saveTweet()
    {
        try {
             //calls saveTweet() as callback, which only task is printing the current tweet

            $header_size = curl_getinfo($this->ch, CURLINFO_HEADER_SIZE);
            $header_string = substr($this->response, 0, $header_size);
            $body = substr($this->response, $header_size);
            echo $body . "\n";
        } catch (Exception $e) {
            print_r($e);
            //
            // echo $e->getMessage(); //print message describeb above
        }


    }
}

$streamer= new StreamingDaemon();



/*while(true){
    // This is the code you want to loop during the service...
    $myFile = "/home/ballen/daemontest.txt";
    $fh = fopen($myFile, 'a') or die("Can't open file");
    $stringData = "File updated at: " . time(). "\n";
    fwrite($fh, $stringData);
    fclose($fh);

    // Now before we 'cycle' again, we'll sleep for a bit...
    echo "sleeping...";
    usleep($micro);
}*/