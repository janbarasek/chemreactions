<?php

namespace kdaviesnz\reactions;

use kdaviesnz\molecule\IMolecule;

interface IReaction
{
    public function addProduct(IMolecule $product);
    public function addStep(IReactionStep $reactionStep);
}