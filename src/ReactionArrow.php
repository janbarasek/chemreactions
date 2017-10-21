<?php

namespace kdaviesnz\reactions;

/**
 * Created by PhpStorm.
 * User: kevindavies
 * Date: 15/10/17
 * Time: 7:44 AM
 */

use kdaviesnz\atom\IAtom;

class ReactionArrow implements IReactionArrow
{
    private $electronSink; // IAtom
    private $electronSource; // IAtom

    /**
     * ReactionArrow constructor.
     * @param $electronSink
     * @param $electronSource
     */
    public function __construct($electronSink, $electronSource)
    {
        if (!in_array(get_class($electronSink), array("kdaviesnz\atom\Halogen", "kdaviesnz\atom\Atom", "kdaviesnz\atom\Bond"))
            && !in_array(get_class($electronSource), array("kdaviesnz\atom\Halogen", "kdaviesnz\atom\Atom", "kdaviesnz\atom\Bond"))) {
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