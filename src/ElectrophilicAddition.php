<?php
declare(strict_types=1);

namespace kdaviesnz\reactions;

use kdaviesnz\molecule\IAlkene;
use kdaviesnz\molecule\IHydrogenHalide;

class ElectrophilicAddition extends Reaction implements IElectrophilicAddition
{

    private $product; // IMolecule
    /**
     * ElectrophilicAddition constructor.
     */
    public function __construct(
        IAlkene $alkene,
        IHydrogenHalide $hydrogenHalide
    )
    {
        /*

         $reaction = new ElectrophilicAddition(
        $alkene,
        $hydrogenHalide,
        $this->getDoubleBondCarbonAtom(),
        $hydrogenHalide->getHydrogenAtom(),
        $this->getDoubleBond(),
        $hydrogenHalide->getHalideAtom(),
        $hydrogenHalide->getBond()
        );

         Step 1:
         $firstReactant == the alkene
         $secondRectant == the hydrohalogen
         $firstReactantAtom == carbon atom of the aklene C==C double bond.
         $secondReactantAtom == hydrogen atom of the hydrohalogen
         $electronSource == the alkene C==C double bond.

                 Step 2:
            $secondStepElectronSink == the halogen atom of the hydrohalogen.
            $secondStepElectronSource == the hydrohalogen bond.

        Step 3:

         */
        // Add arrow from the alkene C==C double bond to the hydrogen atom of the hydrohalide.
        // Comb into one Ionization call -> should set Ionization->product to ICarbonate
        $alkeneCarbonCarbonBondAtom = $alkene->carbonAtomWithDoubleBond;
        $hydrogenHalideHydrogenAtom = $hydrogenHalide->hydrogenAtom;
        $hydrogenHalideHalogenAtom = $hydrogenHalide->halogenAtom;
        $hydrohalogenBonds = $hydrogenHalideHalogenAtom->getBonds();
        $hydrohalogenBond = $hydrohalogenBonds[0];
        $alkeneCarbonCarbonBond = $alkene->doubleBond;

        $ionizationReactionStep = new Ionization(
                $alkene,
                $hydrogenHalide,
                $alkeneCarbonCarbonBondAtom,
                $hydrogenHalideHydrogenAtom,
                $hydrogenHalideHalogenAtom,
                $alkeneCarbonCarbonBond,
                $hydrohalogenBond
        );

        $this->addStep($ionizationReactionStep);

        // Add arrow from the halogen atom to the carbon atom of what was the C==C double bond (now single bond).
        $lastStep = new ReactionStep($hydrogenHalide,$ionizationReactionStep->getProduct());
        $lastStep->addReactionArrow(new ReactionArrow($hydrogenHalideHalogenAtom, $alkeneCarbonCarbonBondAtom));
        $hydrogenHalideHalogenAtom->decrementValence();
        $alkeneCarbonCarbonBondAtom->incrementValence();

      //  $this->product = $lastStep->product;

    }
}