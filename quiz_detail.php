<?php
    session_start();
    ini_set('display_errors', 1);
    require_once __DIR__ . '\vendor\facebook\graph-sdk\src\Facebook\autoload.php';

    use Facebook\FacebookSession;
    use Facebook\FacebookRequest;
    use Facebook\GraphUser;
    use Facebook\FacebookRedirectLoginHelper;


    $fb = new Facebook\Facebook([
        'app_id' => '372088543563837',
        'app_secret' => '5a2921cf48bc30e769d23eadf9b30225',
        'default_graph_version' => 'v2.5',
    ]);

    $helper = $fb->getRedirectLoginHelper();
    try {
        $accessToken = $helper->getAccessToken();
    } catch(Facebook\Exceptions\FacebookResponseException $e) {
        // When Graph returns an error
        echo 'Graph returned an error: ' . $e->getMessage();
        exit;
    } catch(Facebook\Exceptions\FacebookSDKException $e) {
        // When validation fails or other local issues
        echo 'Facebook SDK returned an error: ' . $e->getMessage();
        exit;
    }

    if (isset($accessToken)) {
    // Logged in!
    $_SESSION['facebook_access_token'] = (string) $accessToken;

    // Now you can redirect to another page and use the
    // access token from $_SESSION['facebook_access_token']

    $response = $fb->get('/me?fields=id,name,gender,email,link', $accessToken);

    $user = $response->getGraphUser();
    echo'<pre>';
    print_r($user);
    echo'</pre>';

    echo 'ID: ' . $user['id'];
    echo 'Name: ' . $user['name'];
    // echo 'Gener: ' . $user['gener'];
    echo 'Email: ' . $user['email'];
    // echo 'Link: ' . $user['link'];

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <title>QuizSiJa</title>
</head>
<body style="background-color:#4d4d4d;font-family:'Courier New', Courier, monospace;">
    
</body>
</html>