<?php
function convert_maps_url_to_iframe_url($maps_url) {
    // Request the Google Maps URL and get the HTML response
    $html = file_get_contents($maps_url);
    
    // Find the iframe element and extract the src attribute if found
    if (preg_match('/<iframe[^>]+src="([^"]+)"/', $html, $matches)) {
        return $matches[1];
    } else {
        return 'Error: iframe not found';
    }
}

// Example usage
$google_maps_url = 'https://www.google.com/maps?q=3217+Sandwich+Street';
$iframe_url = convert_maps_url_to_iframe_url($google_maps_url);
echo $iframe_url;
?>
