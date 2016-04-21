<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <meta name="google" value="notranslate">
    <meta http-equiv="Cache-Control" max-age="86400">
    <meta http-equiv="Expires" content="86400">
    <meta name="norton-safeweb-site-verification" content="mn6ebhon2azo2lypw-8kair-72m0dz1xunk5hs3havp490yq7odvv6jczqm0fnqoz3xbamjllr6t88y3tf1lcjjy5u79veoa7vy9b-z6iv7y5tj6m0i99a0-cihxvauc" />
    <?php 
        if(isset($_GET["article"])){
            if($_GET["article"]==4){
                echo '<title>CHUNITHM Rate Calculator</title>';
            }else{
                echo '<title>Akashi_SNの日記</title>';
            }
        }else{
            echo '<title>Akashi_SNの日記</title>';
        }
    ?>
    <link rel='stylesheet' href='common/css/bootstrap.min.css' type='text/css' media='all' />
    <link rel='stylesheet' href='common/css/style.css' type='text/css' media='all' />
    <link rel="icon" href="common/images/icon.jpg" sizes="32x32" />
    <link rel="canonical" href="https://akashisn.azurewebsites.net" />
    <script type='text/javascript' src='common/js/jquery.js'></script>
    <script src="https://www.google.com/recaptcha/api.js?hl=en"></script>
    <script type="text/javascript" >
        var syncerTimeout = null;
        jQuery(function() {
            jQuery(window).scroll(function() {
                if (syncerTimeout == null) {
                    syncerTimeout = setTimeout(function() {
                        var element = jQuery('#page-top');
                        var now = jQuery(window).scrollTop();
                        var under = jQuery('body').height() - (now + jQuery(window).height());
                        element.fadeIn('slow');
                        syncerTimeout = null;
                    }, 1000);
                }
            });
            jQuery('#move-page-top').click(
                function() {
                    jQuery('html,body').animate({ scrollTop: 0 }, 'slow');
                }
            );
        });
    </script>
    <script type="text/javascript">
        function syncerRecaptchaCallback( code ){
            if(code != ""){
                jQuery( '#syncer-recaptcha-form input , #syncer-recaptcha-form textarea , #syncer-recaptcha-form button' ).removeAttr( 'disabled' ) ;
            }
        }
    </script>
    <script>
        ! function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0],
                p = /^http:/.test(d.location) ? 'http' : 'https';
            if (!d.getElementById(id)) {
                js = d.createElement(s);
                js.id = id;
                js.src = p + '://platform.twitter.com/widgets.js';
                fjs.parentNode.insertBefore(js, fjs);
            }
        }(document, 'script', 'twitter-wjs');
    </script>
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-74926268-1', 'auto');
      ga('send', 'pageview');
    </script>
</head>

<body class="home blog single-author sidebar">
    <div id="page" class="hfeed site">
        <header id="masthead" class="site-header" role="banner">
            <a class="home-link" href="/" title="Akashi_SNの日記" rel="home">
                <h1 class="site-title">Akashi_SNの日記</h1>
                <h2 class="site-description">おもにCTF関係のことを書いていきます</h2>
            </a>
        </header>
        <div id="main" class="site-main">
            <div id="primary" class="content-area">
                <div id="content" class="site-content" role="main">
                    <?php
                        if(isset($_GET["article"]) && ctype_digit($_GET["article"]) && $_GET["article"] > 0 && $_GET["article"] < 5){
                            $a=$_GET["article"];
                            echo '<article style="padding-bottom: 30px;">';
                            echo file_get_contents("article/$a/$a.html");
                            echo '</article>';
                        }else{
                    ?>
                    <a href="?article=4">
                        <header class="entry-header">
                            <h1 class="entry-title">CHUNITHM Rate Calculator</h1>
                        </header>
                    </a>
                        <article><div class="entry-content">
                            チュウニズムのレートを計算するものです。
                            <ul>
                                <li>楽曲別レートを計算します</li>
                                <li>最大レートを算出します<br>(最大レートはBEST枠で一番レートが高いものを10回連続で出したものとして計算した値です。)</li>
                            </ul>
                            レートの仕組みについてはリゼット(14新)推奨日記に書いてあります。
                            <br> チュウニズムプラス対応です。
                            <br> 製作者(
                            @Akashi_SN)
                            <br> 計算方法や譜面定数は
                            @capueんほかによるものを参考にしました。ありがとうございました。
                            <h3>対象譜面</h3>
                            <hr> レベル11以上の楽曲が対象です。
                        </article>
                    

                    <a href="?article=1">
                        <header class="entry-header">
                            <h1 class="entry-title">SECCON 2015 Online CTF write up</h1>
                        </header>
                    </a>
                    <article><div class="entry-content">
                            <p>2015/12/5~6の間SECCON 2015 Online CTFにチーム名BiPhoneでAkashi_SNとして5人で参加しました。CTFは初めてまだ1ヶ月ほどにしてはまぁ解けた方かな・・・？</p>
                            <p>ちなみに順位は240位でした。</p>
                            <p>僕が解いた問題のwrite upをします。</p>...
                        </div>
                    </article>
                    <!--<a href="https://akashisn.azurewebsites.net/?article=2">
                    <article>
                        <header class="entry-header">
                            <h1 class="entry-title">CpawCTF write up</h1>
                        </header>
                        <div class="entry-content">
                            <p>CpawCTFをやってみたので</p>
                            <p>出来ているやつからwrite upを書いていきます</p>
                            <p>出来次第追加していきます</p>...
                        </div>
                    </article></a>
                    -->
                    <a href="?article=3">
                        <header class="entry-header">
                            <h1 class="entry-title">8946 write up</h1>
                        </header>
                    </a>
                    <article>
                        <div class="entry-content">
                            <p>8946という常時開催CTFをやってみたので</p>
                            <blockquote><p>このサイトでは、セキュリティーに関連する問題を解くことができ、ハッキングを通してセキュリティを学ぶ事ができます。</p></blockquote>
                            <p>&#8230;8946より</p>
                            <p>出来ているものからwrite upを書いていきます。<br>随時追加していきます</p>
                        </div>
                    </article>
                    
                    <?php
                       }
                    ?>
                </div>
            </div>
            <div id="tertiary" class="sidebar-container" role="complementary">
                <div class="sidebar-inner">
                    <div class="widget-area">
                        <aside id="recent-posts-4" class="widget widget_recent_entries">
                            <h3 id="widget-title">ページ内検索</h3>
                            <div>
                                <form id="cse-search-box" action="https://google.com/cse">
                                    <input type="hidden" name="cx" value="010075462428157447804:bkbzingwoa0" />
                                    <input type="hidden" name="ie" value="UTF-8" />
                                    <input type="text" name="q" size="31" />
                                    <input style="margin-top:10px;" type="submit" name="sa" value="Search" />
                                </form>
                                <img src="https://www.google.com/cse/images/google_custom_search_smwide.gif">
                            </div>
                        </aside>
                        <aside id="recent-posts-4" class="widget widget_recent_entries">
                            <h3 id="widget-title">プロフィール</h3>
                            <ul>
                                <li>
                                    <a href="https://twitter.com/Akashi_SN"><img src="common/images/ZukPePec.jpg" width="80" height="80" /></a>
                                    <br>
                                    <font size="3"><a href="https://twitter.com/Akashi_SN">Akashi_SN::友利奈緒</a></font>
                                    <br>
                                    <a href="https://twitter.com/Akashi_SN" class="twitter-follow-button" data-show-count="false" data-lang="ja">@Akashi_SNさんをフォロー</a>
                                    <br>
                                    <img src="common/images/favicon.ico" width="20" height="20" /><a href="https://twitter.com/Akashi_SN"><font size="3">twitter</font></a>
                                    <img src="common/images/fluidicon.png" width="20" height="20" /><a href="https://github.com/AkashiSN"><font size="3">GitHub</font></a>
                                    <br>
                                    <font size="3">CTFを勉強中<br>主にwebやnetwork</font>
                                </li>
                            </ul>
                        </aside>
                        <aside id="recent-posts-4" class="widget widget_recent_entries">
                            <h3 id="widget-title">お知らせ</h3>
                            <ul>
                                <li>
                                    <p>WordPressが重かったので新たにサーバーを立てました。</p>
                                    <p>なので何かありましたらTwitterにリプを飛ばしてください。</p>
                                </li>
                            </ul>
                        </aside>
                        <aside id="recent-posts-4" class="widget widget_recent_entries">
                            <h3 id="widget-title">投稿</h3>
                            <ul>
                                <li>
                                    <a href="?article=1">SECCON 2015 Online CTF write up</a>
                                    <span class="post-date">2015年12月6日</span>
                                </li>
                                <!--<li>
                                    <a href="https://akashisn.azurewebsites.net/?article=2">CpawCTF write up</a>
                                    <span class="post-date">2016年1月31日</span>
                                </li>-->
                                <li>
                                    <a href="?article=3">8946 write up</a>
                                    <span class="post-date">2016年1月20日</span>
                                </li>
                                <li>
                                    <a href="?article=4">CHUNITHM Rate Calculator</a>
                                    <span class="post-date">2016年3月27日</span>
                                </li>
                            </ul>
                        </aside>
                        <aside id="recent-posts-4" class="widget widget_recent_entries">
                            <h3 id="widget-title">バナー</h3>
                            <ul>
                                <li><a href="http://charlotte-anime.jp/" target="_blank" title="TVアニメ「Charlotte(シャーロット)」公式サイト" ><img src="common/images/200x40_2.jpg" alt="TVアニメ「Charlotte(シャーロット)」公式サイト" width="200" height="40" /></a>
                                </li>
                            </ul>
                        </aside>
                    </div>
                </div>
            </div>
            <div id="page-top" class="page-top">
                <p><a id="move-page-top" class="move-page-top">▲</a></p>
            </div>
            <div id="footer">
                <p>Copyright (c) 2015. Akashi_SN All rights reserved.</p>
            </div>
        </div>
    </div>
</body>

</html>
