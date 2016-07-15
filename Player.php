<?php
declare(strict_types=1);

use Player;

class Player implements Interface {

	protected $id;
	protected $nick;
	protected $score;

	public function __construct(string $id, string $nick, \Score\Interface $score) {
		$this->id = $id;
		$this->nick = $nick;
		$this->score = $score;
	}

	public function getId() : string {
		return $this->id;
	}

	public function getScore() : \Score\Interface {
		return $this->score;
	}
}
