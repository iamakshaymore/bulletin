<?php
include './connection.php';

if (isset($_GET['domain'])) {
	$domain=$_GET['domain'];
	$sql="SELECT * FROM university Where univDomain='".$domain."';";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
    	header('Content-type: text/xml');
        $e = "<?xml version=\"1.0\"?>
        <login>
        <status>true</status>
		</login>
		";
		$xml = new SimpleXMLElement($e);
		echo $xml->asXML();
    }
    
    else{
        header('Content-type: text/xml');
        $e = "<?xml version=\"1.0\"?>
			<login>
			<status>false</status>
			</login>
			";
			$xml = new SimpleXMLElement($e);
			echo $xml->asXML();	
        }
}

?>