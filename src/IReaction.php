<?php

declare(strict_types=1);

namespace kdaviesnz\reactions;


use kdaviesnz\molecule\IMolecule;

interface IReaction
{
	public function addProduct(IMolecule $product);

	public function addStep(IReactionStep $reactionStep);
}