<?php

namespace App;

class ChoreRecorder
{
	protected $builder;

	public function __construct($chore)
	{
		$this->builder['chore_id'] = $chore->id;
	}

	public function byPerson($person)
	{
		$this->builder['user_id'] = $person->id;

		return $this;
	}

	public function on($date)
	{
		$this->builder['date'] = $date;
		return $this;
	}
}