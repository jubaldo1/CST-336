 <?php
 session_start();
 ?>
 <!DOCTYPE html>
 <html>
6: <head>
7: <title>Accessing session variables</title>
8: </head>
9: <body>
10: <h1>Content Page</h1>
11: <?php
 if (isset($_SESSION['products'])) {
 echo "<strong>Your cart:</strong><ol>";
 foreach (unserialize($_SESSION['products']) as $p) {
 echo "<li>".$p."</li>";
 }
 echo "</ol>";
 }
 ?>
 <p><a href="arraysession.php">return to product choice page</a></p>
 </body>
 </html>