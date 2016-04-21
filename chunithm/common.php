<?php
  ini_set( 'display_errors', 0 );
  error_reporting(0);
  
  function userid_get($u){
    $a = explode(";",$u);
    $b;
    for($i = 0;$i< count($a);$i++){
      $pos = strpos($a[$i],'userId');
      if ($pos !== false) {
        $b = $i;
      }
    }
    $c = explode("=",$a[$b]);
    return $c[1];
  }

  function level_get($userid,$level){
    $url = 'https://chunithm-net.com/ChuniNet/GetUserMusicLevelApi';
    $headers = array(
    'Host: chunithm-net.com',
    'Connection: keep-alive',
    'Accept: application/json, text/javascript, */*; q=0.01',
    'Origin: https://chunithm-net.com',
    'X-Requested-With: XMLHttpRequest',
    'User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.87 Safari/537.36',
    'Content-Type: application/x-www-form-urlencoded; charset=UTF-8',
    'Referer: https://chunithm-net.com/mobile/MusicLevel.html',
    'Accept-Encoding: gzip, deflate',
    'Accept-Language: ja,en;q=0.8',
    );
    $data = array(
      'userId' => $userid,
      'level' => $level,
    );
    $options = array(
    'http' => array(
      'method'  => 'POST',
      'content' => json_encode( $data ),
      'header'=>  "Content-Type: application/json\r\n" .
                  "Accept: application/json\r\n"
      )
    );
    $context  = stream_context_create( $options );
    $level = file_get_contents( $url, false, $context );  
    return json_decode( $level , true );
  }

  function score_get($userid,$musicId){
    $url = 'https://chunithm-net.com/ChuniNet/GetUserMusicDetailApi';
    $headers = array(
      'Host: chunithm-net.com',
      'Connection: keep-alive',
      'Accept: application/json, text/javascript, */*; q=0.01',
      'Origin: https://chunithm-net.com',
      'X-Requested-With: XMLHttpRequest',
      'User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.87 Safari/537.36',
      'Content-Type: application/x-www-form-urlencoded; charset=UTF-8',
      'Referer: https://chunithm-net.com/mobile/MusicDetail.html',
      'Accept-Encoding: gzip, deflate',
      'Accept-Language: ja,en;q=0.8',
    );
    $data = array(
      'userId' => $userid,
      'musicId' => $musicId,
    );
    $options = array(
    'http' => array(
      'method'  => 'POST',
      'content' => json_encode( $data ),
      'header'=>  "Content-Type: application/json\r\n" .
                  "Accept: application/json\r\n"
      )
    );
    $context  = stream_context_create( $options );
    $score = file_get_contents( $url, false, $context );  
    return json_decode( $score , true );
  }

  function lately_score_get($userid){
    $url = 'https://chunithm-net.com/ChuniNet/GetUserPlaylogApi';
    $headers = array(
      'Host: chunithm-net.com',
      'Connection: keep-alive',
      'Content-Length: 29',
      'Cache-Control: max-age=0',
      'Accept: application/json, text/javascript, */*; q=0.01',
      'Origin: https://chunithm-net.com',
      'X-Requested-With: XMLHttpRequest',
      'User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.87 Safari/537.36',
      'Content-Type: application/x-www-form-urlencoded; charset=UTF-8',
      'Accept-Encoding: gzip, deflate',
      'Accept-Language: ja,en;q=0.8',
    );
    $data = array(
      'userId' => $userid,
    );
    $options = array(
    'http' => array(
      'method'  => 'POST',
      'content' => json_encode( $data ),
      'header'=>  "Content-Type: application/json\r\n" .
                  "Accept: application/json\r\n"
      )
    );
    $context  = stream_context_create( $options );
    $score = file_get_contents( $url, false, $context );  
    return json_decode( $score , true );
  }

  function rate_get($userid){
    $url = 'https://chunithm-net.com/ChuniNet/GetUserInfoApi';
    $headers = array(
    'Host: chunithm-net.com',
    'Connection: keep-alive',
    'Accept: application/json, text/javascript, */*; q=0.01',
    'Origin: https://chunithm-net.com',
    'X-Requested-With: XMLHttpRequest',
    'User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.87 Safari/537.36',
    'Content-Type: application/x-www-form-urlencoded; charset=UTF-8',
    'Referer: https://chunithm-net.com/mobile/MusicLevel.html',
    'Accept-Encoding: gzip, deflate',
    'Accept-Language: ja,en;q=0.8',
    );
    $data = array(
      'userId' => $userid,
      'friendCode' => 0,
      'fileLevel' => 1,
    );
    $options = array(
    'http' => array(
      'method'  => 'POST',
      'content' => json_encode( $data ),
      'header'=>  "Content-Type: application/json\r\n" .
                  "Accept: application/json\r\n"
      )
    );
    $context  = stream_context_create( $options );
    $rate = file_get_contents( $url, false, $context );  
    return json_decode( $rate , true );
  }

  function rank_to_rank($rank){
    if($rank == 10)
      return 'sss';
    if($rank == 9)
      return 'ss';
    if($rank == 8)
      return 's';
    if($rank == 7)
      return 'aaa';
    if($rank == 6)
      return 'aa';
    if($rank == 5)
      return 'a';
  }
  function score_to_rate($score,$base_rate){
    if($score >= 1007500){
      return (double)($base_rate+2);
    }if($score >= 1005000){
      return (double)($base_rate+1.5+($score-1005000)*10/50000);
    }if($score >= 1000000){
      return (double)($base_rate+1+($score-1000000)*5/50000);
    }if($score >= 975000){
      return (double)($base_rate+($score-975000)*2/50000);
    }if($score >= 950000){
      return (double)($base_rate-1.5+($score-950000)*3/50000);
    }if($score >= 925000){
      return (double)($base_rate-3+($score-925000)*3/50000);
    }if($score >= 900000){
      return (double)($base_rate-5+($score-900000)*4/50000);
    }if($score >= 800000){
      return (double)($base_rate-7.5+($score-800000)*1.25/50000);
    }if($score >= 700000){
      return (double)($base_rate-8.5+($score-700000)*0.5/50000);
    }if($score >= 600000){
      return (double)($base_rate-9+($score-600000)*0.25/50000);
    }if($score >= 500000){
      return (double)($base_rate-13.7+($score-500000)*2.35/50000);
    }
  }

  
  $base_rate_ex = array();

  $base_rate_ex[52] = 11.1;
  $base_rate_ex[197] = 11.2;
  $base_rate_ex[202] = 11.2;
  $base_rate_ex[232] = 11.3;
  $base_rate_ex[141] = 11.5;
  $base_rate_ex[90] = 11.6;
  $base_rate_ex[63] = 11.7;
  $base_rate_ex[152] = 11.7;
  $base_rate_ex[103] = 11.7;
  $base_rate_ex[134] = 11.8;
  $base_rate_ex[76] = 11.8;
  $base_rate_ex[69] = 11.9;
  $base_rate_ex[226] = 12.3;
  $base_rate_ex[180] = 12.4;

  $base_rate = array();

  $base_rate[56] = 11.0;
  $base_rate[14] = 11.0;
  $base_rate[158] = 11.0;
  $base_rate[79] = 11.0;
  $base_rate[148] = 11.0;
  $base_rate[74] = 11.0;
  $base_rate[112] = 11.0;
  $base_rate[255] = 11.1;
  $base_rate[17] = 11.1;
  $base_rate[38] = 11.1;
  $base_rate[179] = 11.1;
  $base_rate[224] = 11.1;
  $base_rate[65] = 11.1;
  $base_rate[185] = 11.2;
  $base_rate[110] = 11.2;
  $base_rate[91] = 11.2;
  $base_rate[204] = 11.2;
  $base_rate[67] = 11.2;
  $base_rate[129] = 11.2;
  $base_rate[9] = 11.3;
  $base_rate[5] = 11.3;
  $base_rate[111] = 11.3;
  $base_rate[176] = 11.3;
  $base_rate[163] = 11.3;
  $base_rate[60] = 11.4;
  $base_rate[114] = 11.4;
  $base_rate[113] = 11.4;
  $base_rate[18] = 11.4;
  $base_rate[98] = 11.4;
  $base_rate[206] = 11.4;
  $base_rate[169] = 11.4;
  $base_rate[117] = 11.5;
  $base_rate[156] = 11.5;
  $base_rate[115] = 11.5;
  $base_rate[160] = 11.5;
  $base_rate[42] = 11.6;
  $base_rate[41] = 11.6;
  $base_rate[10] = 11.7;
  $base_rate[130] = 11.7;
  $base_rate[209] = 11.7;
  $base_rate[47] = 11.7;
  $base_rate[149] = 11.7;
  $base_rate[207] = 11.7;
  $base_rate[99] = 11.7;
  $base_rate[75] = 11.7;
  $base_rate[146] = 11.7;
  $base_rate[68] = 11.7;
  $base_rate[75] = 11.7;
  $base_rate[166] = 11.8;
  $base_rate[212] = 11.8;
  $base_rate[96] = 11.8;
  $base_rate[48] = 11.8;
  $base_rate[3] = 11.8;
  $base_rate[145] = 11.8;
  $base_rate[150] = 11.8;
  $base_rate[214] = 11.9;
  $base_rate[247] = 11.9;
  $base_rate[168] = 11.9;
  $base_rate[21] = 11.9;
  $base_rate[140] = 11.9;
  $base_rate[244] = 12.0;
  $base_rate[228] = 12.0;
  $base_rate[118] = 12.0;
  $base_rate[203] = 12.0;
  $base_rate[108] = 12.0;
  $base_rate[213] = 12.1;
  $base_rate[23] = 12.1;
  $base_rate[88] = 12.1;
  $base_rate[200] = 12.1;
  $base_rate[95] = 12.1;
  $base_rate[171] = 12.1;
  $base_rate[243] = 12.2;
  $base_rate[83] = 12.2;
  $base_rate[132] = 12.2;
  $base_rate[94] = 12.2;
  $base_rate[45] = 12.2;
  $base_rate[233] = 12.2;
  $base_rate[252] = 12.3;
  $base_rate[120] = 12.3;
  $base_rate[199] = 12.3;
  $base_rate[71] = 12.3;
  $base_rate[53] = 12.3;
  $base_rate[82] = 12.3;
  $base_rate[27] = 12.4;
  $base_rate[215] = 12.4;
  $base_rate[161] = 12.4;
  $base_rate[151] = 12.4;
  $base_rate[70] = 12.4;
  $base_rate[62] = 12.4;
  $base_rate[235] = 12.5;
  $base_rate[136] = 12.5;
  $base_rate[6] = 12.5;
  $base_rate[73] = 12.5;
  $base_rate[142] = 12.6;
  $base_rate[51] = 12.6;
  $base_rate[154] = 12.7;
  $base_rate[167] = 12.7;
  $base_rate[33] = 12.7;
  $base_rate[128] = 12.7;
  $base_rate[64] = 12.7;
  $base_rate[178] = 12.7;
  $base_rate[104] = 12.7;
  $base_rate[205] = 12.7;
  $base_rate[157] = 12.8;
  $base_rate[101] = 12.8;
  $base_rate[222] = 12.9;
  $base_rate[165] = 12.9;
  $base_rate[152] = 12.9;
  $base_rate[92] = 13.0;
  $base_rate[138] = 13.0;
  $base_rate[107] = 13.0;
  $base_rate[63] = 13.0;
  $base_rate[72] = 13.0;
  $base_rate[135] = 13.1;
  $base_rate[173] = 13.1;
  $base_rate[197] = 13.1;
  $base_rate[141] = 13.1;
  $base_rate[202] = 13.1;
  $base_rate[144] = 13.2;
  $base_rate[76] = 13.2;
  $base_rate[90] = 13.2;
  $base_rate[232] = 13.3;
  $base_rate[159] = 13.4;
  $base_rate[69] = 13.4;
  $base_rate[52] = 13.4;
  $base_rate[134] = 13.7;
  $base_rate[103] = 13.7;
  $base_rate[226] = 13.8;
  $base_rate[180] = 13.9;

  $img_to_musicid = array();

  $img_to_musicid['img/429d34fef5fddb02.jpg'] =  255;
  $img_to_musicid['img/520c1fef62954ca6.jpg'] =  185;
  $img_to_musicid['img/4bbc4ec5ee9aa0b6.jpg'] =  42;
  $img_to_musicid['img/af78dd039a36a4c7.jpg'] =  14;
  $img_to_musicid['img/d42200159ef91521.jpg'] =  110;
  $img_to_musicid['img/7ad659a57ef26888.jpg'] =  111;
  $img_to_musicid['img/fce0bad9123dcd76.jpg'] =  9;
  $img_to_musicid['img/2535487ae13b2fd8.jpg'] =  56;
  $img_to_musicid['img/696d4f956ebb4209.jpg'] =  17;
  $img_to_musicid['img/3bee1cce7d794f31.jpg'] =  60;
  $img_to_musicid['img/3dc05a281c0724f7.jpg'] =  112;
  $img_to_musicid['img/38faf81803b730f3.jpg'] =  5;
  $img_to_musicid['img/0e73189a7083e4f4.jpg'] =  179;
  $img_to_musicid['img/b33923bd4e6e5609.jpg'] =  156;
  $img_to_musicid['img/b02c3912d1524d5c.jpg'] =  114;
  $img_to_musicid['img/529d98ad07709ae5.jpg'] =  38;
  $img_to_musicid['img/3f8eb68a4f6089dc.jpg'] =  113;
  $img_to_musicid['img/3c2606abe4dded71.jpg'] =  18;
  $img_to_musicid['img/88124d980ac7eca4.jpg'] =  117;
  $img_to_musicid['img/cb77a66b62023890.jpg'] =  91;
  $img_to_musicid['img/f7e67efaf6ced6ea.jpg'] =  98;
  $img_to_musicid['img/7f17441bc2582ec8.jpg'] =  41;
  $img_to_musicid['img/9165ee58223accc0.jpg'] =  115;
  $img_to_musicid['img/1ea73ffbba6d7ead.jpg'] =  204;
  $img_to_musicid['img/f092ddd9e1fe088b.jpg'] =  169;
  $img_to_musicid['img/f56cd36303a3239a.jpg'] =  129;
  $img_to_musicid['img/e10bbd173df15772.jpg'] =  206;
  $img_to_musicid['img/aa0cefb5a0f00457.jpg'] =  176;
  $img_to_musicid['img/e3ce6712e8cddf10.jpg'] =  158;
  $img_to_musicid['img/809bf2b3f8effa6f.jpg'] =  160;
  $img_to_musicid['img/281f821a06a7da18.jpg'] =  79;
  $img_to_musicid['img/cd458a75aa049889.jpg'] =  148;
  $img_to_musicid['img/fd6847e3bb2e3629.jpg'] =  163;
  $img_to_musicid['img/713d52aa40ed7fc4.jpg'] =  65;
  $img_to_musicid['img/feef37ed3d91cfbd.jpg'] =  74;
  $img_to_musicid['img/11437ebc94947550.jpg'] =  67;
  $img_to_musicid['img/5744f4cf66710a56.jpg'] =  209;
  $img_to_musicid['img/5a0ac8501e3b95ce.jpg'] =  166;
  $img_to_musicid['img/1982767436fc52d8.jpg'] =  168;
  $img_to_musicid['img/5cb17a59f4b8c133.jpg'] =  47;
  $img_to_musicid['img/c9c2fa20dcd9a46e.jpg'] =  149;
  $img_to_musicid['img/4f69fb126f579c2f.jpg'] =  21;
  $img_to_musicid['img/9d2ebc847487e01b.jpg'] =  96;
  $img_to_musicid['img/b38eba298df2c6db.jpg'] =  48;
  $img_to_musicid['img/d739ba44da6798a0.jpg'] =  3;
  $img_to_musicid['img/f4a2d88c38669f72.jpg'] =  214;
  $img_to_musicid['img/58847f9694837c0b.jpg'] =  247;
  $img_to_musicid['img/e4df0d48302ccd26.jpg'] =  130;
  $img_to_musicid['img/5151993f923b06a5.jpg'] =  207;
  $img_to_musicid['img/0d7bd146ebed6fba.jpg'] =  10;
  $img_to_musicid['img/0bb58f15b16703ab.jpg'] =  145;
  $img_to_musicid['img/2a41ad71b77d12c9.jpg'] =  150;
  $img_to_musicid['img/ee332e6fa86661fd.jpg'] =  99;
  $img_to_musicid['img/e1454dc2eeae2030.jpg'] =  75;
  $img_to_musicid['img/0aad2e0ff661e7d1.jpg'] =  140;
  $img_to_musicid['img/d3b40f7b8e0758ff.jpg'] =  146;
  $img_to_musicid['img/145b9b6f4c27d78e.jpg'] =  68;
  $img_to_musicid['img/e0a700914896ea4a.jpg'] =  244;
  $img_to_musicid['img/8b84b06033585428.jpg'] =  235;
  $img_to_musicid['img/8872c759bea3bd9f.jpg'] =  243;
  $img_to_musicid['img/1c508bbd42d335fe.jpg'] =  132;
  $img_to_musicid['img/164258c65c714d50.jpg'] =  94;
  $img_to_musicid['img/b8ab9573859ebe4f.jpg'] =  23;
  $img_to_musicid['img/17e485acfe11a67f.jpg'] =  118;
  $img_to_musicid['img/fdc3bb451f6403d2.jpg'] =  27;
  $img_to_musicid['img/181682bf5b277726.jpg'] =  83;
  $img_to_musicid['img/a84a31e562efd7a0.jpg'] =  120;
  $img_to_musicid['img/101d4e7b03a5a89e.jpg'] =  203;
  $img_to_musicid['img/5fe5db1d2e40ee7a.jpg'] =  233;
  $img_to_musicid['img/25abef88cb12af3e.jpg'] =  171;
  $img_to_musicid['img/90dca26c66c5d5b7.jpg'] =  45;
  $img_to_musicid['img/a8d181c5442df7d2.jpg'] =  142;
  $img_to_musicid['img/c4f977d264deafb1.jpg'] =  136;
  $img_to_musicid['img/81cc90c04676f18b.jpg'] =  215;
  $img_to_musicid['img/90589be457544570.jpg'] =  6;
  $img_to_musicid['img/c4223e68340efa41.jpg'] =  88;
  $img_to_musicid['img/4ceb5aed4a4a1c47.jpg'] =  161;
  $img_to_musicid['img/d76afb63de1417f8.jpg'] =  199;
  $img_to_musicid['img/569e7b07c0696bc7.jpg'] =  200;
  $img_to_musicid['img/2bf02bef3051ecaf.jpg'] =  71;
  $img_to_musicid['img/161f13a787a00032.jpg'] =  51;
  $img_to_musicid['img/db38c119e4d8933e.jpg'] =  95;
  $img_to_musicid['img/73ad66e81061bba3.jpg'] =  53;
  $img_to_musicid['img/1ec3213366f4ad57.jpg'] =  108;
  $img_to_musicid['img/27ef71f8a76f1e8a.jpg'] =  82;
  $img_to_musicid['img/7237488215dbd1d3.jpg'] =  151;
  $img_to_musicid['img/3ccebd87235f591c.jpg'] =  70;
  $img_to_musicid['img/0c2791f737ce1ff2.jpg'] =  73;
  $img_to_musicid['img/9386971505bb20b0.jpg'] =  62;
  $img_to_musicid['img/2e9fdbbc15ade5cb.jpg'] =  154;
  $img_to_musicid['img/1e85c4b6775c84b0.jpg'] =  165;
  $img_to_musicid['img/24611f2e2374e6a8.jpg'] =  167;
  $img_to_musicid['img/573109ca9050f55d.jpg'] =  157;
  $img_to_musicid['img/fddc37caee47286d.jpg'] =  33;
  $img_to_musicid['img/7edc6879319accfd.jpg'] =  128;
  $img_to_musicid['img/6bf934fede23724d.jpg'] =  64;
  $img_to_musicid['img/81e347d3b96b2ae1.jpg'] =  101;
  $img_to_musicid['img/f63fab30a7b6f160.jpg'] =  152;
  $img_to_musicid['img/9f281db3bcc9353b.jpg'] =  178;
  $img_to_musicid['img/ff945c9cb9e43e83.jpg'] =  104;
  $img_to_musicid['img/3d7803669dd3fcb9.jpg'] =  205;
  $img_to_musicid['img/d5a47266b4fe0bfe.jpg'] =  159;
  $img_to_musicid['img/17315fb464f265bd.jpg'] =  92;
  $img_to_musicid['img/a2069fdb9d860d36.jpg'] =  232;
  $img_to_musicid['img/8b04b9ad2d49850c.jpg'] =  144;
  $img_to_musicid['img/e7ee14d9fe63d072.jpg'] =  135;
  $img_to_musicid['img/478e8835e382f740.jpg'] =  138;
  $img_to_musicid['img/2e95529be9118a11.jpg'] =  173;
  $img_to_musicid['img/ae6d3a8806e09613.jpg'] =  197;
  $img_to_musicid['img/45112e2818cf80a2.jpg'] =  202;
  $img_to_musicid['img/b43fef626f5b88cd.jpg'] =  107;
  $img_to_musicid['img/93abb77776c70b47.jpg'] =  76;
  $img_to_musicid['img/2e6c11edba79d997.jpg'] =  141;
  $img_to_musicid['img/2df15f390356067f.jpg'] =  63;
  $img_to_musicid['img/c2c4ece2034eb620.jpg'] =  69;
  $img_to_musicid['img/a62f975edc860e34.jpg'] =  52;
  $img_to_musicid['img/ec3a366b4724f8f6.jpg'] =  72;
  $img_to_musicid['img/19d57f9a7652308a.jpg'] =  90;
  $img_to_musicid['img/08a24ed249ed2eec.jpg'] =  134;
  $img_to_musicid['img/993b5cddb9d9badf.jpg'] =  226;
  $img_to_musicid['img/a732d43fd2a11e8f.jpg'] =  180;
  $img_to_musicid['img/3210d321c2700a57.jpg'] =  103;

?>