<?php
	require("ohjournal.php");
	$j->protect(Config::$webRead);
	require("header.php");
	$data = $j->getAllEntries();
?>
<h2>Your Entries</h2>
<h3><?php echo $a = $j->countDays(); ?> entries over <?php echo $b = $j->totalDays(); ?> days. (<?php echo intval($a/$b * 100); ?>%)</h3>
<div id="jump">
	<p>	<?php
			$i = 0;
			foreach(array_keys($data) as $month){
				if($i % 4 == 0 && $i > 0)echo "<br />";
				echo "<a href='#".date("Y-n", strtotime($month))."' class='scroll ".( ($i % 4 == 0) ? "first" : "" )."'>".date("F Y", strtotime($month))."</a>";
				$i++;
			}
		?>
	</p>
</div>
<?php 
	$lastDate = null;
	foreach($data as $month => $days){
		echo "<h3 id='".date("Y-n", strtotime($month))."'>".date("F Y", strtotime($month))."</h3>".
				"<h4>".($a = count($days))." responses over ".($b = date("t", strtotime($month . " GMT")))." days. (".intval($a/$b * 100)."%)</h4>";
		foreach($days as $day => $entries){
			$sent = date(Config::$webDate, strtotime($day));
?>
	<div class="entry">
		<a href="#" class="down button"></a>
		<a href="#" class="up button"></a>
		<a href="#" class="delete button"></a>
		<div class="bar">
			<div class="sent"><?php echo $sent; ?></div>
		</div>
	<?php
		foreach($entries as $row){
			$row['received'] .= " GMT";
			$body = trim(preg_replace("/[\n]/", "<br />", $row['entry']));
	?>
			<div class="body"><?php echo $body; ?></div>
	<?php
		}
	?>
	</div>
<?php
		}
	}
?>
<?php require("footer.php"); ?>
