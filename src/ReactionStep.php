<?php
declare(strict_types=1); // must be first line

namespace kdaviesnz\reactions;

use kdaviesnz\matter\IMatter;
use kdaviesnz\molecule\IMolecule;

class ReactionStep implements IReactionStep
{

    private $reactionArrow; // IReactionArrow
    private $firstReactant; // IMatter
    private $secondReactant; // IMatter
    protected $product;
    private $procedure; // Callable

    /**
     * ReactionStep constructor.
     * @param $firstReactant
     * @param $secondReactant
     */
    public function __construct(IMatter $firstReactant, IMatter $secondReactant)
    {
        $this->firstReactant = $firstReactant;
        $this->secondReactant = $secondReactant;
    }

    public function addReactionArrow(IReactionArrow $reactionArrow)
    {
        $this->reactionArrow = $reactionArrow;
    }

    /**
     * @return mixed
     */
    public function setProduct(IMolecule $product)
    {
         $this->product = $product;
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
    public function getProduct():IMolecule
    {
        return $this->product;
    }








}