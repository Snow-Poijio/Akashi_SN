<?php
  session_start();
  require("common.php");
  //ini_set( 'display_errors', 0 );
  //error_reporting(0);

  $userid = $_SESSION['userid'];
  $level = array();
  $score = array();
  $music = array();
  $lately_music = array();
  $lately_score = array();
  $ex = 0;
  $mas = 0;
  $user_rate = array();
  $user_rates = 0;
  $flag_exp = 0;
  $flag_mas = 0;
  $flag_ex = 0;
  
  /*BEST30*/
  for($i=11;$i<=13;$i++){
    $flag_exp = 0;
    $flag_mas = 0;
    $level = level_get($userid,$i);
    $length = count($level['levelList']);
    $length_plus = count($level['levelPlusList']);
    for($j=0;$j<$length;$j++){
      $flag_exp = 0;
      $flag_mas = 0;
      $musicid = $level['levelList'][$j];
      $score = score_get($userid,$musicid);
      if($score['length']==0){
        continue;
      }
      for($ij=0;$ij<$score['length'];$ij++){
        if($score['userMusicList'][$ij]['level'] == 2){
          if(isset($base_rate_ex[$musicid])){
            if(!isset($music[$musicid]['best_rate_ex'])){
              $ex = (int)$score['userMusicList'][$ij]['scoreMax'];
              $rank_e = (int)$score['userMusicList'][$ij]['scoreRank'];
              $flag_exp = 1;
            }
          }
        }if($score['userMusicList'][$ij]['level'] == 3){
          if(isset($base_rate[$musicid])){
            if(!isset($music[$musicid]['best_rate'])){
              $mas = (int)$score['userMusicList'][$ij]['scoreMax'];
              $rank_m = (int)$score['userMusicList'][$ij]['scoreRank'];
              $flag_mas = 1;
            }
          }
        }
      }
      if(isset($music[$musicid]['best_rate'])){
        continue;
      }if(isset($music[$musicid]['best_rate_ex'])){
        continue;
      }
      if(isset($base_rate_ex[$musicid]) && $flag_exp == 1){
        if(!isset($music[$musicid]['best_rate_ex'])){
          $music[$musicid]['title'] = $score['musicName'];
          $music[$musicid]['image'] = "https://chunithm-net.com/mobile/".$score['musicFileName'];
          $music[$musicid]['base_rate_ex'] = (double)$base_rate_ex[$musicid];
          $music[$musicid]['best_rate_ex'] = (double)score_to_rate($ex,(double)$base_rate_ex[$musicid]);
          $music[$musicid]['rank']['ex'] = $rank_e;
          $music[$musicid]['score']['ex'] = $ex;
        }
      }if(isset($base_rate[$musicid]) && $flag_mas == 1){
        if(!isset($music[$musicid]['best_rate'])){
          $music[$musicid]['title'] = $score['musicName'];
          $music[$musicid]['image'] = "https://chunithm-net.com/mobile/".$score['musicFileName'];
          $music[$musicid]['base_rate'] = (double)$base_rate[$musicid];
          $music[$musicid]['best_rate'] = (double)score_to_rate($mas,(double)$base_rate[$musicid]);
          $music[$musicid]['rank']['mas'] = $rank_m;
          $music[$musicid]['score']['mas'] = $mas;
        }
      }
      if(isset($music[$musicid]['best_rate_ex'])){
        $user_rate[] = array(
          'rate' => (double)$music[$musicid]['best_rate_ex'],
          'musicid' => $musicid,
          'ex' => 1,
        );
      }if(isset($music[$musicid]['best_rate'])){
        $user_rate[] = array(
          'rate' => (double)$music[$musicid]['best_rate'],
          'musicid' => $musicid,
          'ex' => 0,
        );
      }
    }

    for($j=0;$j<$length_plus;$j++){
      $flag_exp = 0;
      $flag_mas = 0;
      $musicid = $level['levelPlusList'][$j];
      $score = score_get($userid,$musicid);
      if($score['length']==0){
        continue;
      }
      for($ij=0;$ij<$score['length'];$ij++){
        if($score['userMusicList'][$ij]['level'] == 2){
          if(isset($base_rate_ex[$musicid])){
            if(!isset($music[$musicid]['best_rate_ex'])){
              $ex = (int)$score['userMusicList'][$ij]['scoreMax'];
              $rank_e = (int)$score['userMusicList'][$ij]['scoreRank'];
              $flag_exp = 1;
            }
          }
        }if($score['userMusicList'][$ij]['level'] == 3){
          if(isset($base_rate[$musicid])){
            if(!isset($music[$musicid]['best_rate'])){
              $mas = (int)$score['userMusicList'][$ij]['scoreMax'];
              $rank_m = (int)$score['userMusicList'][$ij]['scoreRank'];
              $flag_mas = 1;
            }
          }
        }
      }
      if(isset($music[$musicid]['best_rate'])){
        continue;
      }if(isset($music[$musicid]['best_rate_ex'])){
        continue;
      }
      if(isset($base_rate_ex[$musicid]) && $flag_exp == 1){
        if(!isset($music[$musicid]['best_rate_ex'])){
          $music[$musicid]['title'] = $score['musicName'];
          $music[$musicid]['image'] = "https://chunithm-net.com/mobile/".$score['musicFileName'];
          $music[$musicid]['base_rate_ex'] = (double)$base_rate_ex[$musicid];
          $music[$musicid]['best_rate_ex'] = (double)score_to_rate($ex,(double)$base_rate_ex[$musicid]);
          $music[$musicid]['rank']['ex'] = $rank_e;
          $music[$musicid]['score']['ex'] = $ex;
        }
      }if(isset($base_rate[$musicid]) && $flag_mas == 1){
        if(!isset($music[$musicid]['best_rate'])){
          $music[$musicid]['title'] = $score['musicName'];
          $music[$musicid]['image'] = "https://chunithm-net.com/mobile/".$score['musicFileName'];
          $music[$musicid]['base_rate'] = (double)$base_rate[$musicid];
          $music[$musicid]['best_rate'] = (double)score_to_rate($mas,(double)$base_rate[$musicid]);
          $music[$musicid]['rank']['mas'] = $rank_m;
          $music[$musicid]['score']['mas'] = $mas;
        }
      }
      if(isset($music[$musicid]['best_rate_ex'])){
        $user_rate[] = array(
          'rate' => (double)$music[$musicid]['best_rate_ex'],
          'musicid' => $musicid,
          'ex' => 1,
        );
      }if(isset($music[$musicid]['best_rate'])){
        $user_rate[] = array(
          'rate' => (double)$music[$musicid]['best_rate'],
          'musicid' => $musicid,
          'ex' => 0,
        );
      }
    }
  }
  rsort($user_rate);
  for($i=0;$i<30;$i++){
    $user_rates += (double)$user_rate[$i]['rate'];
  }

  $ex = 0;
  $mas = 0;
  $rank_e = 0;
  $rank_m = 0;
  $flag = 0;
  $lately_score = array();
  $lately_user_rate = array();
  $lately_user_rates = 0;

  $lately_score = lately_score_get($userid);
  $length = $lately_score['length'];
  for($i=0;$i<$length;$i++){
    $flag = 0;
    $img = $lately_score['userPlaylogList'][$i]['musicFileName'];
    $musicid = $img_to_musicid[$img];
    if($lately_score['userPlaylogList'][$i]['levelName'] == 'expert'){
      if(isset($base_rate_ex[$musicid])){
        $ex = (int)$lately_score['userPlaylogList'][$i]['score'];
        $rank_e = (int)$lately_score['userPlaylogList'][$i]['rank'];
        $flag = 1;
      }
    }else if($lately_score['userPlaylogList'][$i]['levelName'] == 'master'){
      if(isset($base_rate[$musicid])){
        $mas = (int)$lately_score['userPlaylogList'][$i]['score'];
        $rank_m = (int)$lately_score['userPlaylogList'][$i]['rank'];
        $flag = 2;
      }
    }
    if(isset($base_rate_ex[$musicid]) && $flag == 1){
        $lately_music[$musicid]['title'] = $lately_score['userPlaylogList'][$i]['musicName'];
        $lately_music[$musicid]['image'] = "https://chunithm-net.com/mobile/".$img;
        $lately_music[$musicid]['base_rate_ex'] = (double)$base_rate_ex[$musicid];
        $lately_music[$musicid]['rate_ex'] = (double)score_to_rate($ex,(double)$base_rate_ex[$musicid]);
        $lately_music[$musicid]['rank']['ex'] = $rank_e;
        $lately_music[$musicid]['score']['ex'] = $ex;
    }else if(isset($base_rate[$musicid]) && $flag == 2){
        $lately_music[$musicid]['title'] = $lately_score['userPlaylogList'][$i]['musicName'];
        $lately_music[$musicid]['image'] = "https://chunithm-net.com/mobile/".$img;
        $lately_music[$musicid]['base_rate'] = (double)$base_rate[$musicid];
        $lately_music[$musicid]['rate'] = (double)score_to_rate($mas,(double)$base_rate[$musicid]);
        $lately_music[$musicid]['rank']['mas'] = $rank_m;
        $lately_music[$musicid]['score']['mas'] = $mas;
    }
    if(isset($lately_music[$musicid]['rate_ex'])){
        $lately_user_rate[] = array(
          'rate' => (double)$lately_music[$musicid]['rate_ex'],
          'musicid' => $musicid,
          'ex' => 1,
        );
      }else if(isset($lately_music[$musicid]['rate'])){
        $lately_user_rate[] = array(
          'rate' => (double)$lately_music[$musicid]['rate'],
          'musicid' => $musicid,
          'ex' => 0,
        );
      }
  }
  rsort($lately_user_rate);
  for($i=0;$i<10;$i++){
    $lately_user_rates += (double)$lately_user_rate[$i]['rate'];
  }
  $user_rate_best = round($user_rates/30, 2);
  $user_rate_best_max = round(($user_rate[0]['rate']*10+$user_rates)/40,2);
  $user_rate_recent = round($lately_user_rates/10, 2);
  $tmp = rate_get($userid);
  $tmp1 = $tmp['userInfo']['playerRating'];
  $user_rate_result = substr($tmp1, 0,2).'.'.substr($tmp1, 2,4);
  //$user_rate_result = round(($lately_user_rates+$user_rates)/40, 2);
  echo '
    <div id="sub_title">CHUNITHM Rate Calculator</div>
    <h2 id="rate">
      <p>BEST枠平均: '.$user_rate_best.'/最大レート: '.$user_rate_best_max.'</p>
      <p>RECENT枠平均: '.$user_rate_recent.'/表示レート: '.$user_rate_result.'</p>
    </h2>
    <p><a style="font-size:18pt;" href="https://akashisn.azurewebsites.net/?article=4" target=_brank>使い方</a></p>';
?>
<!--tweetボタン-->
<div id="button"></div>
<script src="https://platform.twitter.com/widgets.js"></script>
<script>
twttr.ready(function() {
  var rate_best = "BEST枠平均: " + <?php echo $user_rate_best; ?>;
  var rate_best_max = "最大レート: " + <?php echo $user_rate_best_max; ?>;
  var rate_recent = "RECENT枠平均: " + <?php echo $user_rate_recent; ?>;
  var rate_result = "表示レート: " + <?php echo $user_rate_result; ?>;
  var rate = rate_best + " " + rate_best_max + "\n" + rate_recent + " " + rate_result + "\n";
  twttr.widgets.createShareButton(
    'https://akashisn.azurewebsites.net/?article=4',
    location.href,
    document.getElementById('button'),
    {
      lang: 'ja',
      size: 'large',
      text:  rate,
      hashtags : 'CHUNITHMRateCalculator'
    }
  )
});
</script>
<?php echo'
  <div id="wrap">
    <div id="inner">
      <div class="frame01 w460">
        <div class="frame01_inside w450">
          <h2 style="margin-top:10px;" id="page_title">BEST枠</h2>
            <hr class="line_dot_black w420">
            <div id="userPlaylog_result">
              <div class="box01 w420">
                <div class="mt_10">';
  for($i=0;$i<30;$i++){
    $flag_ex=0;
    $musicid = $user_rate[$i]['musicid'];
    if($user_rate[$i]['ex'] == 1){
      $flag_ex=1;
      $score = $music[$musicid]['score']['ex'];
      $rate = $music[$musicid]['best_rate_ex'];
      $base_rate = $music[$musicid]['base_rate_ex'];
      $rank = rank_to_rank($music[$musicid]['rank']['ex']);
    }else{
      $score = $music[$musicid]['score']['mas'];
      $rate = $music[$musicid]['best_rate'];
      $rank = rank_to_rank($music[$musicid]['rank']['mas']);
      $base_rate = $music[$musicid]['base_rate'];
    }
    $img = $music[$musicid]['image'];
    $title = $music[$musicid]['title'];
    echo '
                  <div class="frame02 w400">
                    <div class="play_jacket_side">
                      <div class="play_jacket_area">
                        <div id="Jacket" class="play_jacket_img">
                          <img src="'.$img.'">
                        </div>
                      </div>
                    </div>
                    <div class="play_data_side01">
                      <div class="box02 play_track_block">
                        <div id="TrackLevel" class="play_track_result">';
      if($flag_ex==1){
        echo '
                          <img src="https://chunithm-net.com/mobile/common/images/icon_expert.png">';
      }else {
        echo '
                          <img src="https://chunithm-net.com/mobile/common/images/icon_master.png">';
      }
      echo '
                        </div>
                      </div>
                      <div class="box02 play_musicdata_block">
                        <div id="MusicTitle" class="play_musicdata_title">'.$title.'</div>
                        <div class="play_musicdata_score clearfix">
                          <div class="play_musicdata_score_text">譜面定数:<span id="Score">'.$base_rate.'</span></div><br>
                          <div class="play_musicdata_score_text">RATING:<span id="Score">'.$rate.'</span></div><br>
                          <div class="play_musicdata_score_text">Score：<span id="Score">'.$score.'</span></div>
                          <img src="https://chunithm-net.com/mobile/common/images/icon_'.$rank.'.png"></div>
                        </div>
                      </div>
                    </div>';
  }
  echo '
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="frame01 w460">
          <div class="frame01_inside w450">
            <h2 style="margin-top:10px;" id="page_title">BEST枠外</h2>
            <hr class="line_dot_black w420">
            <div id="userPlaylog_result">
              <div class="box01 w420">
                <div class="mt_10">';
  $cont = count($user_rate);
  for($i=30;$i<$cont;$i++){
    $flag_ex=0;
    $musicid = $user_rate[$i]['musicid'];
    if($user_rate[$i]['ex'] == 1){
      $flag_ex=1;
      $score = $music[$musicid]['score']['ex'];
      $rate = $music[$musicid]['best_rate_ex'];
      $base_rate = $music[$musicid]['base_rate_ex'];
      $rank = rank_to_rank($music[$musicid]['rank']['ex']);
    }else{
      $score = $music[$musicid]['score']['mas'];
      $rate = $music[$musicid]['best_rate'];
      $rank = rank_to_rank($music[$musicid]['rank']['mas']);
      $base_rate = $music[$musicid]['base_rate'];
    }
    $img = $music[$musicid]['image'];
    $title = $music[$musicid]['title'];
    echo '
                  <div class="frame02 w400">
                    <div class="play_jacket_side">
                      <div class="play_jacket_area">
                        <div id="Jacket" class="play_jacket_img">
                          <img src="'.$img.'">
                        </div>
                      </div>
                    </div>
                    <div class="play_data_side01">
                      <div class="box02 play_track_block">
                         <div id="TrackLevel" class="play_track_result">';
      if($flag_ex==1){
        echo '
                          <img src="https://chunithm-net.com/mobile/common/images/icon_expert.png">';
      }else {
        echo '
                          <img src="https://chunithm-net.com/mobile/common/images/icon_master.png">';
      }
      echo '
                        </div>
                      </div>
                      <div class="box02 play_musicdata_block">
                        <div id="MusicTitle" class="play_musicdata_title">'.$title.'</div>
                        <div class="play_musicdata_score clearfix">
                          <div class="play_musicdata_score_text">譜面定数:<span id="Score">'.$base_rate.'</span></div><br>
                          <div class="play_musicdata_score_text">RATING:<span id="Score">'.$rate.'</span></div><br>
                          <div class="play_musicdata_score_text">Score：<span id="Score">'.$score.'</span></div>
                          <img src="https://chunithm-net.com/mobile/common/images/icon_'.$rank.'.png"></div>
                        </div>
                      </div>
                    </div>';
  }
?>
