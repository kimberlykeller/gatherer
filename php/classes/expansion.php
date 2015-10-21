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
	 * @throws InvalidArugmentException if $newExpanId is not an integer
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
	 * @throws InvalidArguemntException if $newExpanName is not a string or insecure
	 * @throws RangeExcpetion if $newExpanName is > 128 characters
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
			throw(RangeException("expansion name is too large"));
		}
		//store expansion name
		$this->expanName = $newExpanName;
	}
}

