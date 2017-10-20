<?php
declare(strict_types=1); // must be first line


namespace kdaviesnz\reactions;

use kdaviesnz\atom\Bond;
use kdaviesnz\atom\IAtom;
use kdaviesnz\matter\IMatter;
use kdaviesnz\molecule\Molecule;

class Combination extends ReactionStep implements ICombination
{

    /**
     * Combination constructor.
     */
    public function __construct(IAtom $firstAtom, IAtom $secondAtom)
    {
        parent::__construct($firstAtom, $secondAtom);

        // Add bond to atoms
        $bond = new Bond($secondAtom);
        $recipBond = new Bond($firstAtom);
        $firstAtom->addBond($bond);
        $secondAtom->addBond($recipBond);

        // Add reaction arrow
        $firstAtomValence = $firstAtom->getValence();
        $secondAtomValence = $secondAtom->getValence();
        if ($bond->isIonic() && $firstAtomValence > $secondAtomValence) {
            $this->addReactionArrow(new ReactionArrow($firstAtom, $secondAtom));
        } else  if ($bond->isIonic() && $firstAtomValence < $secondAtomValence) {
            $this->addReactionArrow(new ReactionArrow($secondAtom, $firstAtom));
        }
        $this->product = new Molecule($firstAtom, $secondAtom);
    }
}