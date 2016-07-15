<?php
declare(strict_types=1);

namespace Player;

interface Interface {
	public function getId() : string;

	public function getScore() : \Score\Interface;
}
