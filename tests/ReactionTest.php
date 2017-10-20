<?php

require_once("vendor/autoload.php");
require_once("src/IReactionStep.php");
require_once("src/ReactionStep.php");
require_once("src/ICombination.php");
require_once("src/Combination.php");
require_once("src/IReactionArrow.php");
require_once("src/ReactionArrow.php");
require_once("src/IReaction.php");
require_once("src/Reaction.php");


class ReactionTest extends PHPUnit_Framework_TestCase
{

    public function setUp()
    {

    }

    public function tearDown()
    {

    }

    public function testReaction()
    {
        $Na = new \kdaviesnz\atom\Atom("2Na");
        $Cl = new \kdaviesnz\atom\Atom("Cl2");

        var_dump($Na->getValence());
        var_dump($Cl->getValence());

        // 2Na(s)  +  Cl2(g)  ——>  2NaCl(s)
        $r = new \kdaviesnz\reactions\Reaction();
        $reactionStep = new \kdaviesnz\reactions\Combination($Na, $Cl);
        $r->addStep($reactionStep);
        $r->addProduct($reactionStep->getProduct());

        var_dump($Na->getValence());
        var_dump($Cl->getValence());

    }
}
