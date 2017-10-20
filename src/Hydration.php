<?php
declare(strict_types=1); // must be first line

namespace kdaviesnz\reactions;

class Hydration extends Reaction implements IHydration
{

    /**
     * Hydration constructor.
     */
    public function __construct(IMolecule &$alkene, IMolecule &$water, IMolecule $sulfuricAcidCatalyst)
    {
        parent::__construct($alkene, $water);

        $waterHydrogenAtom = $water->getAtom("H");
        $waterOxygenAtom = $water->getAtom("O");

        // Add catalyst
        $this->addCatylst($sulfuricAcidCatalyst);

        $step = new ReactionStep($alkene, $water);

        $procedure = function() use ($waterHydrogenAtom, $waterOxygenAtom, $alkene, $alkeneCarbonCarbonBond){

            // Break bond between hydrogen atom in water and oxygen atom.
            $waterHydrogenAtom->removeBond($waterOxygenAtom);
            $waterOxygenAtom->removeBond($waterHydrogenAtom);

            $alkeneCarbonCarbonBondSecondAtom = $alkene->getDoubleBond()->getAtom("C", 1);
            $alkeneCarbonCarbonBondFirstAtom = $alkene->getDoubleBond()->getAtom("C", 0);

            // Add bond between hydrogen atom and the second carbon atom in the carbon-carbon double bond.
            $alkeneCarbonCarbonBondSecondAtom->addBond(new Bond($waterHydrogenAtom));
            $waterHydrogenAtom->addBond(new Bond($alkeneCarbonCarbonBondSecondAtom));

            // Change the $alkeneCarbonCarbonBondAtom to a single bond
            $alkeneCarbonCarbonBond->bondType = "single";

            // Add bond between the oxygen water atom and the first carbon atom in the carbon-carbon double bond.
            $alkeneCarbonCarbonBondFirstAtom->addBond(new Bond($waterOxygenAtom));
            $waterOxygenAtom->addBond($alkeneCarbonCarbonBondFirstAtom);

        };

        $step->setProcedure($procedure);
        // $alkene should now be an alcohol
        $step->setProduct(new Alcohol($alkene));

        $this->addStep($step);

        $this->products[] = new Alcohol($alkene);

    }
}