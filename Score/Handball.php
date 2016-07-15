<?php
declare(strict_types=1);

namespace Score;

class Handball extends Abstract implements Interface {

	public $position = '';
	public $goalsMade = 0;
	public $goalsReceived = 0;

	protected const INITIAL_RATING_GOALKEEPER = 50;
	protected const INITIAL_RATING_FIELD_PLAYER = 20;

	public __construct(string $position, int $made, int $received) {
		$this->position = $position;
		$this->goalsMade = $made;
		$this->goalsReceived = $received;
	}

	public calculateScore() : int {
		if ($position === \Game\Handball::GOALKEEPER) {
			return $this->calculateGoalkeeperScore();
		}

		if ($position === \Game\Handball::FIELD_PLAYER) {
			return $this->calculateFieldPlayerScore();
		}

		throw new Exception('Wrong position.');
	}

	protected calculateGoalkeeperScore() : int {
		return self::INITIAL_RATING_GOALKEEPER + $goalsMade * 5 - $goalsReceived * 2;
	}

	protected calculateFieldPlayerScore() : int {
		return self::INITIAL_RATING_FIELD_PLAYER + $goalsMade - $goalsReceived;
	}
}
