<?php
    require './vendor/autoload.php';

    $fb = new Facebook\Facebook([
        'add_id' => '1729474503824661',
        'app_secret' => 'b93a2f70c387002fed9e3b64a35f4317',
        'default_graph_varsion' => 'v2.7'
    ]);

    $helper = $fb->getRedirectLoginHelper();
    $login_url = $helper->getLoginUrl("http://localhost:8080/Quiz_game/");

    try {
        $accessToken = $helper->getAccessToken();
        if(isset($accessToken)){
            $_SESSION['access_token'] = (string)$accessToken;

            header("Location: index.php");
        }
    } catch (\Throwable $th) {
        //throw $th;
    }

?>