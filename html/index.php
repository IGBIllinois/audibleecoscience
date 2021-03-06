<?php
require_once 'includes/main.inc.php';
require_once 'includes/header.inc.php';

$num_podcasts = 3;
$recent_podcasts = getRecentPodcasts($db,3);

$recent_podcasts_html = "";
foreach ($recent_podcasts as $podcast) {
	$recent_podcasts_html .= "<div class='category'>";
	$recent_podcasts_html .= "<div class='category_img'><a href='podcast.php?id=" . $podcast['podcast_id'] . "'><img src='" . __PICTURE_WEB_DIR__ . "/" . $podcast['category_filename'] . "' ";
	$recent_podcasts_html .= "alt='" . $podcast['category_name'] . "'></a></div>";
	$recent_podcasts_html .= "<div class='category_content'>";
	$recent_podcasts_html .= "<h2><a href='podcast.php?id=" . $podcast['podcast_id'] . "'>" . $podcast['podcast_source'] . "</a></h2>";
	if ($podcast['podcast_short_summary'] != "") {
		$recent_podcasts_html .= "<p>" . substr($podcast['podcast_short_summary'],0,100) . "...</p>";
	}
	else {
		$recent_podcasts_html .= "<p>" . substr($podcast['podcast_summary'],0,100) . "...</p>";
	}
	$recent_podcasts_html .= "</div><div class='clear'></div></div>";



}
?>
 
                    

<div class="clear"></div>
<div class="browsebytopic">Browse podcasts by topic</div>
<hr class="browsebytopic_hr" />
<?php echo $category_html; ?>
<div class="clear"></div>
<hr>

    <div class="container_category_podcastlist">
	<?php echo $recent_podcasts_html; ?>    
<!-- end class="container_category_podcastlist" -->
    </div>

<!-- top 10 podcasts -->
<?php
	require_once('includes/top10_podcasts.inc.php');
?>
<!-- end of top 10 -->

<?php require_once 'includes/footer.inc.php'; ?>
