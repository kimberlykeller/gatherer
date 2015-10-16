CREATE TABLE expansion (
			expanName VARCHAR(128) NOT NULL,
			expanReleaseDate DATE NOT NULL,
			expanNumberOfCards SMALLINT UNSIGNED NOT NULL,
			expanOrSet TINYINT UNSIGNED NOT NULL,
			expanId INT UNSIGNED AUTO_INCREMENT NOT NULL,
			INDEX(releaseDate),
			UNIQUE(expanName),
			PRIMARY KEY(expanId),
		);


		CREATE TABLE card (
			cardName VARCHAR(128) NOT NULL,
			convManaCost TINYINT NOT NULL,
			type VARCHAR (64),
			rulesText VARCHAR(1000),
			rarity VARCHAR(20),
			multiverseId INT UNSIGNED AUTO_INCREMENT NOT NULL,
			expanId INT UNSIGNED NOT NULL,
			INDEX(expanId),
			FOREIGN KEY (expanId) REFERENCES expansion(expanId),
			UNIQUE(cardName),
			PRIMARY KEY(multiverseId),
		);