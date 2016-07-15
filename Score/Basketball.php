<?php
declare(strict_types=1);

namespace Score;

class Basketball extends Abstract implements Interface {
	public $position = '';
	public $scoredPoint = 0;
	public $rebound = 0;
	public $assist = 0;

	public __construct(string $position, int $scoredPoint, int $rebound, int $assist) {
		$this->position = $position;
		$this->scoredPoint = $scoredPoint;
		$this->rebound = $rebound;
		$this->assist = $assist;
	}

	public calculateScore() : int {
		if ($this->position === \Game\Basketball::GUARD) {
			return $this->calculateGuardScore();
		}

		if ($this->position === \Game\Basketball::FORWARD) {
			return $this->calculateForwardScore();
		}

		if ($this->position === \Game\Basketball::CENTER) {
			return $this->calculateCenterScore();
		}

		throw new Exception('Wrong position.');
	}

	protected calculateGuardScore() : int {
		return $scoredPoint * 2 + $rebound * 3 + $assist;
	}

	protected calculateForwardScore() : int {
		return $scoredPoint * 2 + $rebound * 2 + $assist * 2;
	}

	protected calculateCenterScore() : int {
		return $scoredPoint * 2 + $rebound + $assist * 3;
	}
}
