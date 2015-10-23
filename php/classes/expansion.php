<?php
require_once(dirname(__DIR__) . "/functions/validate-date.php");
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
	 * @var boolean $expanOrSet
	 **/
	private $expanOrSet;
	/**
	 * the date that the expansion was released on
	 * @var DateTime $expanReleaseDate
	 **/
	private $expanReleaseDate;

	/**
	 * constructor for this Expansion
	 *
	 * @param mixed $newExpanId id of this expansion or null if new expansion
	 * @param string $newExpanName name of this expansion
	 * @param int $newExpanNumberOfCards the number of cards in this expansion
	 * @param boolean $newExpanOrSet indicates if the expansion is also a set, if so then the parameter is set to 1
	 * @param datetime $newExpanReleaseDate the date the expansion was released, if null, assign current date
	 * @throws InvalidArgumentException if the date type is not valid
	 * @throws RangeException if the data values are out of bounds (too long, negative etc.)
	 * @throws Exception thrown for all other exceptions
	 **/
	public function __construct($newExpanId, $newExpanName, $newExpanNumberOfCards, $newExpanOrSet, $newExpanReleaseDate = null) {
		try {
			$this->setExpanId($newExpanId);
			$this->setExpanName($newExpanName);
			$this->setExpanNumberOfCards($newExpanNumberOfCards);
			$this->setExpanOrSet($newExpanOrSet);
			$this->setExpanReleaseDate($newExpanReleaseDate);
		} catch(InvalidArgumentException $invalidArgument) {
			//re-throw the exception to the caller
			throw(new InvalidArgumentException($invalidArgument->getMessage(), 0, $invalidArgument));
		} catch(RangeException $range) {
			//re-throw the exception to the caller
			throw(new RangeException($range->getMessage(), 0, $range));
		} catch(Exception $exception) {
			//re-throw generic exception
			throw(new Exception($exception->getMessage(), 0, $exception));
		}
	}

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
	 *@return boolean value 1 for expansion is a set and 0 for expansion is not a set
	 **/
	public function getExpanOrSet() {
		return($this->expanOrSet);
	}

	/** mutator method for whether or not the the expansion is a set
	 *
	 * @param boolean $newExpanOrSet 1 for expansion/set and 0 for just expansion
	 * @throws InvalidArgumentException if not a valid boolean 1 or 0
	 **/
	public function setExpanOrSet($newExpanOrSet) {
		//verify the entry is valid
		$newExpanOrSet = filter_var($newExpanOrSet, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);
		if($newExpanOrSet === null) {
			throw(new InvalidArgumentException("expansion or set is not a valid 1 or 0"));
		}
		//convert and store expansion or set
		$this->expanOrSet = intval($newExpanOrSet);
	}

	/**
	 * accessor method for expansion release date
	 *
	 * @return DateTime value of expansion release
	 **/
	public function getExpanReleaseDate() {
		return($this->expanReleaseDate);
	}

	/**
	 * mutator method for expansion release date
	 * @param DateTime $newExpanReleaseDate
	 * @throws InvalidArgumentException if $newExpanReleaseDate is not a valid object or string
	 * @throws RangeException if $newExpanReleaseDate is not a valid date
	 * @throws Exception for all other exceptions
	 **/
	public function setExpanReleaseDate($newExpanReleaseDate) {
		//base case: if the date is null use current date and time
		if($newExpanReleaseDate === null) {
			$this->expanReleaseDate = new DateTime();
			return;
		}
		//store expansion release date
		try {
			$newExpanReleaseDate = validateDate($newExpanReleaseDate);
		} catch(InvalidArgumentException $invalidArgument) {
			throw(new InvalidArgumentException($invalidArgument->getMessage(), 0, $invalidArgument));
		} catch(RangeException $range) {
			throw(new RangeException($range->getMessage(), 0, $range));
		} catch(Exception $exception) {
			throw(new Exception($exception->getMessage(), 0, $exception));
		}
		$this->expanReleaseDate = $newExpanReleaseDate;
	}

	/**
	 * inserts this Expansion into mySQl
	 *
	 * @param PDO $pdo pointer to PDO connection object
	 * @throws PDOException when mySQL related errors occur
	 **/
	public function insert(PDO $pdo) {
		//enforce the expanId is null (don't insert an expansion that already exists)
		if($this->expanId !== null) {
			throw(new PDOException("not a new expansion"));
		}

		//create query template
		$query =
			"INSERT INTO expansion(expanId, expanName, expanNumberOfCards, expanOrSet, expanReleaseDate)
			VALUES (:expanId, :expanName, :expanNumberOfCards, :expanOrSet, :expanReleaseDate)";
		$statement = $pdo->prepare($query);

		//bind the member variables to the place holders in the template
		$formattedDate = $this->expanReleaseDate->format("Y-m-d H:i:s");
		$parameters = array("expanId" => $this->expanId, "expanName" => $this->expanName, "expanNumberOfCards" => $this->expanNumberOfCards,
			"expanOrSet" => $this->expanOrSet, "expanReleaseDate" => $formattedDate);
		$statement->execute($parameters);

		//update the null expanId with what mySQL just gave us
		$this->expanId = intval($pdo->lastInsertId());
	}

	/**
	 * deletes this Expansion from mySQL
	 *
	 * @param PDO $pdo pointer to mySQL connection
	 * @throws PDOException when mySQL related errors occur
	 **/
	public function delete(PDO $pdo) {
		//enforce that the expanId is not null (don't delete an expansion that hasn't been inserted)
		if($this->expanId === null) {
			throw(new PDOException("unable to delete an expansion that does not exist"));
		}

		//create query template
		$query = "DELETE FROM expansion WHERE expanId = :expanId";
		$statement = $pdo->prepare($query);

		//bind the member variables to the place holder in the template
		$parameters = array("expanId" => $this->expanId);
		$statement->execute($parameters);
	}

	/**
	 * updates this expansion in mySQL
	 *
	 * @param PDO $pdo pointer to PDO connection
	 * @throws PDOException when mySQL related errors occur
	 **/
	public function update(PDO $pdo) {
		//enforce that the expanId is not null (don't update an expansion that hasn't been inserted)
		if($this->expanId === null) {
			throw(new PDOException("unable to update an expansion that does not exist"));
		}

		//create query template
		$query =
			"UPDATE expansion SET expanName = :expanName, expanNumberOfCards = :expanNumberOfCards,
			expanOrSet = :expanOrSet, expanReleaseDate = :expanReleaseDate WHERE expanId = :expanId";
		$statement = $pdo->prepare($query);

		//bind the member variables to the place holders in the template
		$formattedDate = $this->expanReleaseDate->format("Y-m-d H:i:s");
		$parameters = array("expanName" => $this->expanName, "expanNumberOfCars" => $this->expanNumberOfCards,
			"expanOrSet" => $this->expanOrSet, "expanReleaseDate" => $formattedDate, "expanId" => $this->expanId);
		$statement->execute($parameters);
	}

}


