<?php
include_once 'includes/main.inc.php';
include_once 'includes/header.inc.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
	$id = $_GET['id'];
	$podcast = new podcast($id,$db);

	if ($podcast->getApproved()) {
		$relFile = __PODCAST_WEB_DIR__ . "/" . $podcast->getFile();
	}
	else {
		echo "This podcast does not exist";
		exit;
	}
}

else {

	echo "Podcast does not exist";
	exit;
}
?>

<h3><?php echo $podcast->getShowName(); ?></h3>
<br>Media Source: <?php echo $podcast->getSource(); ?>
<br>Program Name: <?php echo $podcast->getProgramName(); ?>
<br>Broadcast Year: <?php echo $podcast->getBroadcastYear(); ?>
<br>Original Link: <a href='<?php echo $podcast->getUrl(); ?>' target='_blank'><?php echo $podcast->getUrl(); ?></a>
<br>Summary: <?php echo $podcast->getSummary(); ?>
<?php if ($podcast->getFile() != "") {

	echo "<br>Play Podcast:";
	echo "<audio id='player' type='audio/mp3' controls='controls' src='" . $relFile . "'></audio>";
	echo "<script>";
	echo "$('audio,video').mediaelementplayer();";
	echo "</script>";
	echo "<br><a href='download.php?id=" . $id . "'>Download Podcast</a>";
} ?>

<?php

include 'includes/footer.inc.php';
?>
