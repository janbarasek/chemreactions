<?php
declare(strict_types=1); // must be first line

namespace kdaviesnz\reactions;

use kdaviesnz\molecule\IMolecule;

class Reaction implements IReaction
{
    private $reactionSteps = array(); // array of IReactionSteps.
    private $products = array(); // array of IMolecule

    public function addStep(IReactionStep $reactionStep)
    {
        $this->reactionSteps[] = $reactionStep;
    }

    public function addProduct(IMolecule $product)
    {
        $this->products[] = $product;
    }

}