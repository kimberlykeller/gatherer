DROP TABLE IF EXISTS card;
DROP TABLE IF EXISTS expansion;

CREATE TABLE expansion (
	expanName VARCHAR(128) NOT NULL,
	expanReleaseDate DATE NOT NULL,
	expanNumberOfCards SMALLINT UNSIGNED NOT NULL,
	expanOrSet TINYINT UNSIGNED NOT NULL,
	expanId INT UNSIGNED AUTO_INCREMENT NOT NULL,
	INDEX(expanReleaseDate),
	UNIQUE(expanName),
	PRIMARY KEY(expanId)
);


CREATE TABLE card (
	cardName VARCHAR(128) NOT NULL,
	convManaCost TINYINT NOT NULL,
	type VARCHAR (64),
	rulesText VARCHAR(1000),
	rarity VARCHAR(32),
	multiverseId INT UNSIGNED AUTO_INCREMENT NOT NULL,
	expanId INT UNSIGNED NOT NULL,
	INDEX(expanId),
	FOREIGN KEY (expanId) REFERENCES expansion(expanId),
	INDEX(cardName),
	PRIMARY KEY(multiverseId)
);

INSERT INTO expansion(expanName, expanReleaseDate, expanNumberOfCards, expanOrSet)
VALUES("Gatecrash","2013-02-01","249","1");

INSERT INTO expansion(expanName, expanReleaseDate, expanNumberOfCards, expanOrSet)
VALUES("From the Vault: Angels","2015-08-21","15","0");

INSERT INTO card(cardName, convManaCost, type, rulesText, rarity, expanId)
VALUES("Aurelia, The Warleader","6","Legendary Creature","
Flying, vigilance, haste
Whenever Aurelia, the Warleader attacks for the first time each turn,
untap all creatures you control.
After this phase, there is an additional combat phase.","Mythic Rare","1");

INSERT INTO card(cardName, convManaCost, type, rulesText, rarity, expanId)
VALUES("Aurelia, The Warleader","6","Legendary Creature","
Flying, vigilance, haste
Whenever Aurelia, the Warleader attacks for the first time each turn,
untap all creatures you control.
After this phase, there is an additional combat phase.","Mythic Rare","2");


