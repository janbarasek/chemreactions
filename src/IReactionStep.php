<?php

declare(strict_types=1);

namespace kdaviesnz\reactions;


use kdaviesnz\molecule\IMolecule;

interface IReactionStep
{
	public function getProduct(): IMolecule;

	public function setProcedure(Callable $procedure);

	public function setProduct(IMolecule $product);

	public function addReactionArrow(IReactionArrow $reactionArrow);
}