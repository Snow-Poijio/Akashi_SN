<?php
require("common.php");
session_start();

/*エラー判定(直接アクセス)*/
if(!isset($_POST['userid']) && !isset($_SESSION['userid'])){
  header("HTTP/1.1 301 Moved Permanently");
  header("Location: https://akashisn.azurewebsites.net/?article=4");
  exit();
}

if(isset($_SESSION['userid'])){
  $userid = $_SESSION['userid'];
}
if(isset($_POST['userid'])){
  $userid = userid_get($_POST['userid']);
}

/*エラー判定(未ログイン)*/
  $error = rate_get($userid);
  if(!isset($error)){
    header("HTTP/1.1 301 Moved Permanently");
    header("Location: https://akashisn.azurewebsites.net/chunithm/error.html");
    exit();
  }
$_SESSION['userid'] = $userid;
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja" dir="ltr">
  <head>

    <meta charset="UTF-8" />
    <meta name="viewport" id="viewport" content="width=320,user-scalable=yes" />
    <meta name="format-detection" content="telephone=no">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="Pragma" CONTENT="no-cache">
    <meta http-equiv="Cache-Control" CONTENT="no-cache">
    <meta http-equiv="Expires" CONTENT="-1">
    <meta name="robots" content="INDEX, FOLLOW" />

    <title>CHUNITHM Rate Calculator</title>
    <link rel="stylesheet" href="https://chunithm-net.com/mobile/common/css/common.css" />
    <link rel="stylesheet" href="https://chunithm-net.com/mobile/common/css/submenu.css" />
    <link rel="stylesheet" href="https://chunithm-net.com/mobile/common/css/contents.css" />
    <link rel="stylesheet" type="text/css" href="styles.css" media="all" />
    <link media="only screen and (min-width: 0px) and (max-width: 568px)" href="smart.css" type="text/css" rel="stylesheet" />
    <script src="https://chunithm-net.com/mobile/lib/jquery-1.11.1.min.js"></script>
    <script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js'></script>
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-74926268-1', 'auto');
      ga('send', 'pageview');
    </script>
    <script type="text/javascript">
      $(function(){
        $("#loading").load("./main.php");
      })
    </script>
    <script type="text/javascript">
      ! function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0],
            p = /^http:/.test(d.location) ? 'http' : 'https';

        if (!d.getElementById(id)) {
            js = d.createElement(s);
            js.id = id;
            js.async=true;
            js.src = p + '://platform.twitter.com/widgets.js';
            fjs.parentNode.insertBefore(js, fjs);
        }
      }(document, 'script', 'twitter-wjs');
    </script>
  </head>

<body>
  <div id="loading" align="center">
    <img src="gif-load.gif"alt="Now Loading..." />
    <p style="text-align:center;">Loading･･･</p>
  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div>CHUNITHM Rate Calculator by Akashi_SN <a href="https://twitter.com/Akashi_SN" class="twitter-follow-button" data-show-count="false">Follow @Akashi_SN</a></div>
</body>
</html>
