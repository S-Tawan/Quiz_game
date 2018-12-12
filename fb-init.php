<?php
    // require './vendor/autoload.php';

    // $fb = new Facebook\Facebook([
    //     'add_id' => '1729474503824661',
    //     'app_secret' => 'b93a2f70c387002fed9e3b64a35f4317',
    //     'default_graph_varsion' => 'v2.7'
    // ]);

    // $helper = $fb->getRedirectLoginHelper();
    // $login_url = $helper->getLoginUrl("http://localhost:8080/Quiz_game/");

    // try {
    //     $accessToken = $helper->getAccessToken();
    //     if(isset($accessToken)){
    //         $_SESSION['access_token'] = (string)$accessToken;

    //         header("Location: index.php");
    //     }
    // } catch (\Throwable $th) {
    //     //throw $th;
    // }

    // session_start();
    ini_set('display_errors', 1);
    require_once __DIR__ . '\vendor\facebook\graph-sdk\src\Facebook\autoload.php';

    use Facebook\FacebookSession;
    use Facebook\FacebookRequest;
    use Facebook\GraphUser;
    use Facebook\FacebookRedirectLoginHelper;


    $fb = new Facebook\Facebook([
    'app_id' => '1729474503824661',
    'app_secret' => 'b93a2f70c387002fed9e3b64a35f4317',
    'default_graph_version' => 'v2.5',
    ]);

    $helper = $fb->getRedirectLoginHelper();

    $permissions = ['email', 'user_likes']; // optional

    $loginUrl = $helper->getLoginUrl('http://localhost:8080/Quiz_game/quiz_detail.php', $permissions);

    // echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';

?>