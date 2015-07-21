<?php
/**
 * Created by PhpStorm.
 * User: Wesker
 * Date: 21/07/2015
 * Time: 9:57
 */

require_once('phirehose-master/lib/Phirehose.php');
require_once('phirehose-master/lib/OauthPhirehose.php');

/**
 * Example of using Phirehose to display a live filtered stream using track words
 */
class FilterTrackConsumer extends OauthPhirehose
{
    /**
     * Enqueue each status
     *
     * @param string $status
     */
  //  protected $conect = new MongoClient("mongodb://example.com:27017");
    protected $myTrackWords = array('sterling', 'blackmetal', 'Ernest Hemmingway', 'FelizMartes');
    public function enqueueStatus($status)
    {
        /*
         * In this simple example, we will just display to STDOUT rather than enqueue.
         * NOTE: You should NOT be processing tweets at this point in a real application, instead they should be being
         *       enqueued and processed asyncronously from the collection process.
         */
       // $data = json_decode($status, true);
       var_dump($status);

       if (is_array($data) && isset($data['user']['screen_name'])) {
            print $data['user']['screen_name'] . ': ' . urldecode($data['text']) . "\n";
        }
    }

    public function checkFilterPredicates()
    {
        $response = http_get("http://www.example.com/", array("timeout"=>1), $info);
        print_r($info);
        $randWord1 = $this->myTrackWords[rand(0, 3)];
        $randWord2 = $this->myTrackWords[rand(0, 3)];
        $this->setTrack(array($randWord1, $randWord2));
    }
}

// The OAuth credentials you received when registering your app at Twitter
define("TWITTER_CONSUMER_KEY", "sEKnw0eg7swg8n63oS2ZL9Stp");
define("TWITTER_CONSUMER_SECRET", "CvHzQMcUhd0NrGzwfVjZyKArOQ5i8ss1hLzXEw7v1DtVyKlJZC");


// The OAuth data for the twitter account
define("OAUTH_TOKEN", "872376888-hAFTE0d45sC4oP6WadEd5IveBeYL6fR4GRLxIrpI");
define("OAUTH_SECRET", "F3a8HlytFwgXaLX6LgAPMvfASvfqLmHsjAP1BgWKipDlw");

// Start streaming
$sc = new FilterTrackConsumer(OAUTH_TOKEN, OAUTH_SECRET, Phirehose::METHOD_FILTER);

$sc->consume();









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