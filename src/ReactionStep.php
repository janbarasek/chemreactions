<?php
declare(strict_types=1); // must be first line

namespace kdaviesnz\reactions;

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
    public function __construct($firstReactant, $secondReactant)
    {
        if (!in_array(get_class($firstReactant), array("kdaviesnz\molecule\Alkene", "kdaviesnz\molecule\HydrogenHalide", "kdaviesnz\atom\Atom"))
            && !in_array(get_class($secondReactant), array("kdaviesnz\molecule\Alkene", "kdaviesnz\molecule\HydrogenHalide", "kdaviesnz\atom\Atom"))) {
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