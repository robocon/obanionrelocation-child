<?php get_header(); ?>

<?php

if(isset($_GET['dan'])){
	
	$statement = "select * from ob_posts where post_content LIKE '%RE/MAX%';";
	$query = mysql_query($statement);
	echo mysql_num_rows($query)."here";
	while($rec = mysql_fetch_assoc($query)){
		echo $rec['post_title'];
		$new = str_replace("Relocation Services, LLC/ Dynamic Properties", "Relocation Services, RE/MAX Dynamic Properties", $rec['post_content']);
		$query2 = "UPDATE ob_posts set post_content = '".addslashes($new)."' where ID = '".$rec['ID']."';";
		//mysql_query($query2);
		//echo mysql_error();
		echo $query2."<hr>";
		}	
	
	
	
	}
	
?>

Oops!  We couldn't find the page you requested.
	
<?php get_footer(); ?>