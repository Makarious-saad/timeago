public function timeago($tm){
       $cur_tm = time();
       $dif = $cur_tm - intval(Carbon::parse($tm)->timestamp);
       $pds = array('Seconds', 'Minutes', 'Hours', 'Days', 'Weeks', 'Months', 'Years', 'Anonymous');
       $pds2 = array('Second', 'Minute', 'Hour', 'Day', 'Week', 'Month, 'Year', 'Anonymous');
       $pds3 = array('One Second', 'One Minute', 'One Hour', 'One Day', 'One Week', 'One Month', 'One Year', 'Anonymous');
       $pds4 = array('Two Seconds', 'Two Minutes', 'Two Hours', 'Two Days', 'Two Weeks', 'Two Months', 'Two Years', 'Anonymous');
       $lngh = array(1,60,3600,86400,604800,2630880,31570560,315705600);
       for($v = sizeof($lngh) -1; ($v >= 0) && (($no = $dif / $lngh[$v]) <= 1); $v--);
 	     if($v < 0) $v = 0; $_tm = $cur_tm - ($dif % $lngh[$v]);
       $no = floor($no);
       if($no == 1) $x = $pds3[$v];
       if($no == 2) $x = $pds4[$v];
       elseif($no >= 3 && $no <= 10) $x = sprintf("%d %s ",$no,$pds[$v]);
       elseif($no > 10) $x = sprintf("%d %s ",$no,$pds2[$v]);
       return 'Since '.$x;
   }
