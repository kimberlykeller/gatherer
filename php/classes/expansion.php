<?php

/**
 *A group of Magic: The Gathering cards released together is a Set/Expansion
 *
 *An expansion is a regularly issued printing of Magic: The Gathering cards,
 * usually following a theme. It can contain newly created cards as well as re-printings
 * of previously printed cards.
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
	 * @throws InvalidArgumentException if $newExpanId is not an integer
	 * @throws RangeException if $newTweetId is not positive
	 **/
	public function setExpanId($newExpanId) {
		//base case: if the expan id is null, this is a new expansion without a mySQL assigned id
		if($newExpanId === null) {
			$this->expanId = null;
			return;
		}

		//verify the tweet id is valid
		$newExpanId = filter_var($newExpanId, FILTER_VALIDATE_INT);
		if($newExpanId === false) {
			throw(new InvalidArgumentException("expan id is not a valid integer"));
		}

		//verify the expan id is positive
		if($newExpanId <= 0) {
			throw(new RangeException("expan id is not positive"));
		}

		//convert and store expan id
		$this->expanId = intval($newExpanId);

	}

	/**
	 * accessor method for expansion name
	 *
	 * @return string value of expansion name
	 **/
	public function getExpanName() {
		return($this->expanName);
	}

	/**
	 * mutator method for expansion name
	 *
	 * @param string $newExpanName new value of expansion name
	 * @throws InvalidArgumentException if $newExpanName is not a string or insecure
	 * @throws RangeException if $newExpanName is > 128 characters
	 **/
	public function setExpanName($newExpanName) {
		//verify the expansion name is secure
		$newExpanName = trim($newExpanName);
		$newExpanName = filter_var($newExpanName, FILTER_SANITIZE_STRING);
		if(empty($newExpanName) === true) {
			throw(new InvalidArgumentException("expansion name is empty or insecure"));
		}
		//verify the expansion name will fit in the database
		if(strlen($newExpanName) > 128) {
			throw(new RangeException("expansion name is too large"));
		}
		//store expansion name
		$this->expanName = $newExpanName;
	}
	/**
	 * accessor method for the number of cards in the expansion
	 *
	 * @return int value number of cards
	 */
	public function getExpanNumberOfCards() {
		return($this->expanNumberOfCards);
	}

	/**
	 * mutator method for the number of card in the expansion
	 *
	 * @param int $newExpanNumberOfCards number of cards
	 * @throws InvalidArgumentException if $newExpanNumberOfCards is not an integer
	 * @throws RangeException if $newExpanNumberOfCards is not positive
	 **/
	public function setExpanNumberOfCards($newExpanNumberOfCards) {
		//verify the number of cards is valid
		$newExpanNumberOfCards = filter_var($newExpanNumberOfCards, FILTER_VALIDATE_INT);
		if($newExpanNumberOfCards === false) {
			throw(new InvalidArgumentException("number of cards is not a valid integer"));
		}
		//verify the number of cards is positive
		if($newExpanNumberOfCards <= 0) {
			throw(new RangeException("number of cards is not positive"));
		}
		//convert and store number of cards
		$this->expanNumberOfCards = intval($newExpanNumberOfCards);
	}
	/**
	 * accessor method for expansion or set
	 *
	 *@return int value 1 for expansion is a set and 0 for expansion is not a set
	 **/
	public function getExpanOrSet() {
		return($this->expanOrSet);
	}
	/** mutator method for whether or not the the expansion is a set
	 *
	 * @param int $newExpanOrSet 1 for expansion/set and 0 for expansion !== set
	 * @throw InvalidArgumentException if the entry is not a valid integer
	 * @throw RangeException if the entry is not a 0 or a 1
	 **/
	public function setExpanOrSet($newExpanOrSet) {
		//verify the entry is valid
		$newExpanOrSet = filter_var($newExpanOrSet, FILTER_VALIDATE_INT);
		if($newExpanOrSet === false) {
			throw(new InvalidArgumentException("expansion or set is not a valid integer"));
		}
		//verify the entry is either a 0 or a 1
		if($newExpanOrSet < 0 || > 1) {
			throw(new RangeException("expansion or set must be a 0 for expansion only or 1 for also a set"));
		}
		//convert and store expansion or set
		$this->expanOrSet = intval($newExpanOrSet);
	}
}

