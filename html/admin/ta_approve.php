<?php
require_once 'includes/main.inc.php';
require_once 'includes/session.inc.php';

if (!($login_user->is_admin())){
        header('Location: invalid.php');
}

$unapprovedHtml = "";
if ($login_user->is_ta()) {
	$podcasts = getUnapprovedPodcasts($db,$login_user->get_username());
	foreach ($podcasts as $podcast) {

        $unapprovedHtml .= "<tr><td><a href='podcast.php?id=" . $podcast['podcast_id'] . "'>" . $podcast['podcast_showName'] . "</td>";
        $unapprovedHtml .= "<td>" . $podcast['podcast_source'] . "</td>";
        $unapprovedHtml .= "<td>" . $podcast['podcast_programName'] . "</td>";
        $unapprovedHtml .= "<td>" . $podcast['podcast_time'] . "</td>";
        $unapprovedHtml .= "<td>" . $podcast['user_name'] . "</td>";
        $unapprovedHtml .= "<td><input type='button' value='Edit' class='btn btn-primary' ";
        $unapprovedHtml .= "onClick=\"window.location.href='editPodcast.php?id=" . $podcast['podcast_id'] . "'\"></td>";
        $unapprovedHtml .= "</tr>";

	}

}
else {

	$unapprovedHtml = "<tr><td colspan='6'>None</td></tr>";
}

require_once 'includes/header.inc.php';
?>
<h3>TA's Unapproved Podcasts</h3>
<table class='table table-bordered'>
	<tr>
	<th>Show Name</th>
        <th>Source</th>
        <th>Program</th>
        <th>Time Uploaded</th>
	<th>Created By</th>
        <th>Edit</th>
	</tr>


<?php echo $unapprovedHtml; ?>


</table>

<?php
require_once 'includes/footer.inc.php';
?>
