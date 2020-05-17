<?php

declare(strict_types=1);

namespace kdaviesnz\reactions;


use kdaviesnz\molecule\IMolecule;

class ReactionStep implements IReactionStep
{

	/** @var IReactionArrow */
	protected $product;

	/** @var IMatter */
	private $reactionArrow;

	/** @var IMatter */
	private $firstReactant;

	/** @var IMatter|null */
	private $secondReactant;

	/** @var callable */
	private $procedure;


	/**
	 * @param $firstReactant
	 * @param $secondReactant
	 * @throws \Exception
	 */
	public function __construct($firstReactant, $secondReactant)
	{
		if (!in_array(get_class($firstReactant), ["kdaviesnz\molecule\Alkene", "kdaviesnz\molecule\HydrogenHalide", "kdaviesnz\atom\Atom"])
			&& !in_array(get_class($secondReactant), ["kdaviesnz\molecule\Alkene", "kdaviesnz\molecule\HydrogenHalide", "kdaviesnz\atom\Atom"])) {
			throw new \Exception("Wrong parameter type for ReactionStep -" . get_class($firstReactant) . ' ' . get_class($secondReactant));
		}
		$this->firstReactant = $firstReactant;
		$this->secondReactant = $secondReactant;
	}


	public function addReactionArrow(IReactionArrow $reactionArrow)
	{
		$this->reactionArrow = $reactionArrow;
	}


	/**
	 * @param mixed $procedure
	 */
	public function setProcedure(Callable $procedure)
	{
		$this->procedure = $procedure;
	}


	/**
	 * @return mixed
	 */
	public function getProduct(): IMolecule
	{
		return $this->product;
	}


	/**
	 * @return mixed
	 */
	public function setProduct(IMolecule $product)
	{
		$this->product = $product;
	}
}