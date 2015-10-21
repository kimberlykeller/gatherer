<?php

/**
 *A group of Magic: The Gathering cards released together in a Set/Expansion
 *
 *An expansion is a regularly issued printing of Magic: The Gathering cards,
 * usually following a theme. It can contain newly created cards as well as re-printings
 * of previous printed cards.
 *
 *@author Kimberly Keller <kimberly@gravitaspublications.com>
 **/

class Expansion {
	/**
	 * id for this expansion; this is the primary key
	 * @var int $expanId
	 **/
	private $expanId;
	/**
	 * name of the expansion
	 * @var string $expanName
	 **/
	private $expanName;
	/**
	 * number of cards printed in the expansion
	 * @var int $expanNumberOfCards
	 **/
	private $expanNumberOfCards;
	/**
	 * a 1 or a 0 indicating if the expansion is also a set. 1 for if set is true
	 * @var int $expanOrSet
	 **/
	private $expanOrSet;
	/**
	 * the date that the expansion was released on
	 * @var date $expanReleaseDate
	 **/
	private $expanReleaseDate;

	/**
	 * accessor method for expan id
	 *
	 * @return mixed value of expan id
	 **/
	public function getExpanId() {
		return($this->expanId);
	}

	/**
	 * mutator method for expanId
	 *
	 * @param mixed $newExpanId new value of tweet id
	 * @throws InvalidArugmentException if $newExpanId is not an integer
	 * @throws RangeException if $newTweetId is not positive
	 **/
}

