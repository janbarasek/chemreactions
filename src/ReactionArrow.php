<?php

declare(strict_types=1);

namespace kdaviesnz\reactions;


use kdaviesnz\atom\IAtom;

class ReactionArrow implements IReactionArrow
{

	/** @var IAtom */
	private $electronSink;

	/** @var IAtom */
	private $electronSource;


	/**
	 * @param $electronSink
	 * @param $electronSource
	 * @throws \Exception
	 */
	public function __construct($electronSink, $electronSource)
	{
		if (!in_array(get_class($electronSink), ["kdaviesnz\atom\Halogen", "kdaviesnz\atom\Atom", "kdaviesnz\atom\Bond"])
			&& !in_array(get_class($electronSource), ["kdaviesnz\atom\Halogen", "kdaviesnz\atom\Atom", "kdaviesnz\atom\Bond"])) {
			throw new \Exception("Wrong parameter type for ReactionArrow - " . get_class($electronSink) . " " . get_class($electronSource));
		}

		$this->electronSink = $electronSink;
		$this->electronSource = $electronSource;
	}


	/**
	 * @return IAtom
	 */
	public function getElectronSink(): IAtom
	{
		return $this->electronSink;
	}


	/**
	 * @return IAtom
	 */
	public function getElectronSource(): IAtom
	{
		return $this->electronSource;
	}
}