<html>
<head>
       <title>La librairie d'In'Tech INFO</title>
</head>
<body>
<?php
echo "Nous sommes le ",date("m.d.y")," et il est ",date("H:i");
?>
<table border="1" cellspacing="0" cellpadding="5px" width="100%">
	<tr>
		<td colspan="2" align="center" style="background-color: #cccccc">
			<h1 style="background-color: #cccccc; margin: 0px;padding:0px">La librairie d'In'Tech INFO</h1>
		</td>
	</tr>
	<tr>
		<td valign="top" style="background-color: cyan" width="100px">
			<a href="index.php?action=index.php">Accueil</a><br />
			<a href="index.php?action=cd.php">Cd</a><br />
			<a href="index.php?action=index.php">Books</a><br />
			<a href="index.php?action=showcart.php">panier</a><br />
			<form action="mainlayout.php" method="get">
				<input type="submit" value="logout" name="logout">
			</form>
		</td>
		<td>
			<?php 
				
				
			?>	
		</td>
	</tr>
</table>
</body>
</html>