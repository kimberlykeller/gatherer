<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Setting Up the Databases</title>
	</head>
	<body>
		<h3>Setting up....</h3>

		CREATE TABLE expansion (
			expanName VARCHAR(128) NOT NULL,
			expanReleaseDate DATE NOT NULL,
			expanNumberOfCards SMALLINT UNSIGNED NOT NULL,
			expanOrSet TINYINT UNSIGNED NOT NULL,
			expanId INT UNSIGNED NOT NULL,
			INDEX(releaseDate),
			UNIQUE(expanName),
			PRIMARY KEY(expanId),


		CREATE TABLE card (
			cardName
			convManaCost
			type
			rulesText
			rarity
			cardNumber
			multiverseId

		<br>...Done

	</body>
</html>