<?php include "templates/header.php"; ?>

<ul>
	<li><a href="event.php"><strong>Create</strong></a> - Add an event</li>
</ul>

<?php
	require "functions.php";
	require "../connection.php";

	if(isset($_POST['delete'])){
		if(delete_event(filter_input(INPUT_POST, 'delete', FILTER_SANITIZE_NUMBER_INT))){
			header('Location: index.php');
			exit;
		}
	}
?>

<ul>
<?php
foreach(get_event_list() as $event){
	echo "<div id='container-flex'><href='event.php?id=".$event['owner_id']."'>" . $event["name"] . "</>";
	echo "<form method='post' action='index.php' />\n";
	echo "<input type='hidden' value='".$event['owner_id']."' name='delete' />\n";
	echo "<input type='submit' value='Delete' />\n";
	echo "</form>";
	echo "</div>";
	echo "<div><p href='event.php?id=".$event['id']."'>date :".$event["date"] . "</p></div>";
	echo "<div><p href='event.php?id=".$event['id']."'>Description : ".$event["description"] . "</p></div>";
	echo "<a href='event.php?id=".$event['id']."'><img src=/".$event["image"] . "/> </a>";
}
?>
</ul>


<?php include "templates/footer.php"; ?>