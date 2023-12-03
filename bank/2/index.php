<?php
// Security Headers Check
function checkSecurityHeaders() {
    $headers = get_headers("http://example.com", 1);

    $requiredHeaders = [
        'Strict-Transport-Security',
        'X-Content-Type-Options',
        'X-Frame-Options',
        'Content-Security-Policy'
    ];

    $missingHeaders = array_diff($requiredHeaders, array_keys($headers));

    if (empty($missingHeaders)) {
        echo "All required security headers are present.\n";
    } else {
        echo "Missing security headers: " . implode(', ', $missingHeaders) . "\n";
    }
}

// Call the function
checkSecurityHeaders();
?>
