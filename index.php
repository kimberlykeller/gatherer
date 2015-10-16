<!DOCTYPE html>
<html>
	<head lang="en">
		<meta charset="UTF-8"/>
		<title>Database Design for Gatherer</title>
	</head>
	<body>
		<h1>Database Design Project for Gatherer</h1>
		<h3>Persona</h3>
		<p>Aleck is 25 years old with a degree in Electrical Engineering. He enjoys tabletop gaming and problem solving.
		In his spare time he builds or fixes small things by hand in his garage workshop, inlcudes things like woodworking
		or bike repair. He is detail oriented, focused, and introverted, but enjoys small doses of social situations, such as <em>Magic: The Gathering</em>
		tournaments or playing with his friends casually. He has a handful of interests that he dives deeply into, such as sci-fi and fantasy,
		craft beer, etc.
		He is technology and internet savvy. He will primarily access Gatherer through a desktop or laptop
		with a high speed internet connection. He may have built his own desktop tower and owns his modem and router.
		He is desperately waiting for Google Fiber so that he can break up with Comcast, because he knows that Comcast is evil.
		</p>
		<p>
		Other gaming interests include: Settlers of Catan, Sentinels of the Multiverse, Chez Geek, Call of Cthulhu, Arkham Horror, Dungeons & Dragons.
		</p>
		<p>
		<strong>Goal:</strong> He desires to gain accurate information about the <em>Magic: The Gathering</em> card or grouping of cards that he has searched for.
		</p>
		<h3>Use Cases</h3>
		<p><strong>Use Case 1 &rarr; Aleck Wants A Specific Card</strong></p>
		<ol>
			<li>	Aleck goes to gatherer.wizards.com with a specific card in mind. He wants to know all of the essential information
		about this card.
			</li>
			<li>	Gatherer has a basic search funciton that he can type or copy/paste the card name into.</li>
			<li>	Aleck begins typing the card name.</li>
			<li>	Gatherer anticipates Aleck's request based on the first few characters and makes suggestions.</li>
			<li>	Aleck can either type the full card name or select a suggestion.</li>
			<li>	Aleck hits enter or clicks the &quot;search&quot; button.</li>
			<li>	Gatherer fetches the page with the specific card information requested.</li>
		.</ol>
		<p><strong>Use Case 2 &rarr; Aleck Wants A Group of Cards </strong></p>
		<ol>
			<li>	Aleck goes to gatherer.wizards.com with a type of card in mind. He wants to see all the cards with this type.
			(for example, he wants to see all cards with type &quot;creature&quot;)</li>
			<li>	Gatherer allows him to check a box to indicate he wants to search by type, not by name</li>
			<li>	Aleck enters the type into the search box and hits enter or hits the &quot;search&quot; button</li>
			<li>	Gatherer fetches all the cards with this type and displays them in a list with a brief summary of each card</li>
			<li>	Aleck clicks on the name or picture of the card he is interested in</li>
			<li>	Gatherer fetches the specific information on that card and loads a page to display it</li>
		</ol>

		<hr>
		<h3>Data Breakdown</h3>
		<p><strong>Data Entities</strong></p>

		<p>Card</p>
		<ul>
			<li>Card Name</li>
			<li>Converted Mana Cost</li>
			<li>Type</li>
			<li>Rules Text</li>
			<li>Rarity</li>
			<li>Sets and&#47;or Expansions</li>
			<li><strong>Primary Key</strong> Multiverse ID</li>
			<li><strong>Foriegn Key</strong> Expansion ID</li>
			<li><strong>C Model Notes</strong> A card can be in many expansions</li>
		</ul>
		<p>Expansion</p>
		<ul>
			<li>Name</li>
			<li>Release Date</li>
			<li>Is this expansion a set? T or F</li>
			<li>Number of cards</li>
			<li><strong>Primary Key</strong> Expansion ID</li>
			<li><strong>C Model Notes</strong> An expansion has many cards</li>
		</ul>

		<hr>
		<h3>Conceptual Model</h3>
		<p>Many to many </p>
		<img src="img/gatherer-erd.svg" alt="the ERD for the gatherer project">



	</body>
</html>