<title>Php Crawel</title>
<?php
error_reporting(E_ALL);
/*echo'<h2>First Step (A) </h2>';
//step a in first link
$htmlA = file_get_contents('https://www.homegate.ch/mieten/immobilien/kanton-zuerich/trefferliste?ep=1');
$domA = new DOMDocument;
@$domA->loadHTML($htmlA);
$linksA = $domA->getElementsByTagName('a');
//get all links in the page
echo'<ul>';
foreach ($linksA as $link){
    $href = $link->getAttribute('href');
	//first check    
    if($href != '#'){
		    $myarray = explode('/',$href);
            //second check
            if (preg_match('/^[1-9][0-9]*$/', end($myarray)))
            {
                echo '<li>'.$href.'</li>';
                // step c
                $html = file_get_contents('https://www.homegate.ch'.$href);
                    $dom = new DOMDocument;
                    @$dom->loadHTML($html);
                    $links = $dom->getElementsByTagName('a');
                    //get all links in the page
                    echo '<h3>Step C :</h3><ul>';
                    foreach ($links as $link){
                        $href = $link->getAttribute('href');
                        //first check    
                        if($href != '#'){
                                $myarray = explode('/',$href);
                                //second check
                                if (preg_match('/^[1-9][0-9]*$/', end($myarray)))
                                {
                                    echo '<li>'.$href.'</li>';
                                }
                            }

                    }
                echo '</ul>';
            }
        }
    
}
echo'</ul><h2>Second Step (B) </h2>';
//move to the next Page by counting up the last number in the URL
$htmlB = file_get_contents('https://www.homegate.ch/mieten/108859795');
$domB = new DOMDocument;
@$domB->loadHTML($htmlB);
$linksB = $domB->getElementsByTagName('a');
//get all links in the page
echo '<ul>';
foreach ($linksB as $link){
	$href = $link->getAttribute('href');
	//first check    
    if($href != '#'){
		    $myarray = explode('/',$href);
            //second check
            if (preg_match('/^[1-9][0-9]*$/', end($myarray)))
            {
                echo '<li>'.$href.'</li>';
                // step c
                $html = file_get_contents('https://www.homegate.ch'.$href);
                    $dom = new DOMDocument;
                    @$dom->loadHTML($html);
                    $links = $dom->getElementsByTagName('a');
                    //get all links in the page
                    echo '<h3>Step C :</h3><ul>';
                    foreach ($links as $link){
                        $href = $link->getAttribute('href');
                        //first check    
                        if($href != '#'){
                                $myarray = explode('/',$href);
                                //second check
                                if (preg_match('/^[1-9][0-9]*$/', end($myarray)))
                                {
                                    echo '<li>'.$href.'</li>';
                                }
                            }

                    }
                echo '</ul>';
            }
        }
    
}*/
echo'<h2>Advanced Task </h2>';
$url = 'https://www.newhome.ch/de/kaufen/suchen/haus_wohnung/kanton_zuerich/liste.aspx?p=1';

$agent= 'Googlebot-Image/1.0 Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)';
$html_brand = $url;
$ch = curl_init();

$options = array(
    CURLOPT_URL            => $html_brand,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HEADER         => true,
    CURLOPT_FOLLOWLOCATION => 1,
    CURLOPT_ENCODING       => "",
    CURLOPT_AUTOREFERER    => true,
    CURLOPT_CONNECTTIMEOUT => 120,
    CURLOPT_TIMEOUT        => 120,
    CURLOPT_MAXREDIRS      => 10,
	CURLOPT_USERAGENT      => $agent,
	CURLOPT_SSL_VERIFYPEER => true,
	CURLOPT_SSL_VERIFYHOST => 2,
	CURLOPT_CAINFO         => getcwd() . "/QuoVadisRootCA2.crt"
);
curl_setopt_array( $ch, $options );
$response = curl_exec($ch); 
echo "Error: <pre>" . print_r(curl_getinfo($ch)) . "</pre><br>";

curl_close($ch);
?>