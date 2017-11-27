<?php
$connection = mysqli_connect("localhost", "root", "", "quote_db");
/* check connection */
if (!$connection) {
printf("Connect failed: %s\n", mysqli_connect_error());
exit();
}

$rand = rand(1,10);
$sql = "Select * From quote_table WHERE QuoteID='$rand';";
if ($result = mysqli_query($connection, $sql)) {
printf("Select returned %d rows.<br />\n", mysqli_num_rows($result));

echo "<table border='1'>";
echo "<tr><th>Quote ID</th><th>Quote of Today</th></tr>";

/* fetch associative array */
while ($record = mysqli_fetch_row($result)) {
echo "<tr><td>{$record[0]}</td>";
echo "<td>{$record[1]}</td></tr>";
}
echo "</table>";


mysqli_free_result($result);
} else {
printf("%s.<br />\n", mysqli_error($connection));
}


/* close connection */ 
mysqli_close($connection);
?>