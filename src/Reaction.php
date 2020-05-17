<?php

declare(strict_types=1);

namespace kdaviesnz\reactions;


use kdaviesnz\molecule\IMolecule;

class Reaction implements IReaction
{

	/** @var IReactionSteps[] */
	private $reactionSteps = [];

	/** @var IMolecule[] */
	private $products = [];


	public function addStep(IReactionStep $reactionStep)
	{
		$this->reactionSteps[] = $reactionStep;
	}


	public function addProduct(IMolecule $product)
	{
		$this->products[] = $product;
	}
}