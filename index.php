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
		or bike repair. He is detail oriented, focused, and introverted, but enjoys small doses of social situations, such as Magic: The Gathering
		tournaments or playing with his friends casually. He has a handful of interests that he dives deeply into, such as sci-fi and fantasy,
		craft beer, etc.
		He is technology oriented and will have some combination of newer mobile, tablet, laptop or desktop access. He may or may not
		have put together his own desktop tower, but has the skills to do so.
		</p>
		<p>
		Other gaming interests include: Settlers of Catan, Sentinels of the Multiverse, Chez Geek, Call of Cthulhu, Arkham Horror.
		</p>
		<p>
		<strong>Goal</strong>He desires to gain accurate information about the Magic: The Gathering card or groupings of cards that he has searched for.
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
		<p>User</p>
		<ul>
			<li>Username</li>
			<li>Email Address</li>
			<li>Comments</li>
			<li>DCI Number</li>
			<li>Name</li>
			<li><strong>Primary Key</strong> Email address</li>
		</ul>
		<p>Card</p>
		<ul>
			<li>Card Picture</li>
			<li>Card Name</li>
			<li>Mana Cost</li>
			<li>Converted Mana Cost</li>
			<li>Color Identity</li>
			<li>Rules Text</li>
			<li>Types</li>
			<li>P&#47;T &#40;power&#47;toughness&#41;</li>
			<li>Rarity</li>
			<li>Artist</li>
			<li>Rulings</li>
			<li>Sets and&#47;or Expansions</li>
			<li>Card Number</li>
			<li>Community Rating</li>
			<li>Format</li>
			<li><strong>Primary Key</strong> Multiverse ID</li>
		</ul>
			<p>Expansion</p>
			<ul>
				<li>Name</li>
				<li>Release Date</li>
				<li>Is this expansion a set? T or F</li>
				<li>Number of cards</li>
				<li>Set Symbol</li>
				<li>Expansion Code</li>
				<li>Artists</li>
				<li></li>
			</ul>

			<p>Comments</p>

		<hr>
		<h3>Conceptual Model</h3>
		<p>A card can be in many expansions but each expansion will only have one printing of that card and each expansion
		will have many cards.</p>

	</body>
</html>