<?php

declare(strict_types=1);

namespace kdaviesnz\reactions;


use kdaviesnz\atom\IAtom;
use kdaviesnz\atom\IBond;
use kdaviesnz\molecule\Carbocation;
use kdaviesnz\molecule\IAlkene;
use kdaviesnz\molecule\IHydrogenHalide;
use kdaviesnz\molecule\IMolecule;

class Ionization extends ReactionStep implements IIonization
{

	/**
	 * @param IAlkene $alkene
	 * @param IHydrogenHalide $hydrogenHalide
	 * @param IAtom $alkeneCarbonCarbonBondAtom
	 * @param IAtom $hydrogenHalideHydrogenAtom
	 * @param IAtom $hydrogenHalideHalogenAtom
	 * @param IBond $alkeneCarbonCarbonBond
	 * @param IBond $hydrohalogenBond
	 * @throws \Exception
	 */
	public function __construct(IAlkene &$alkene, IHydrogenHalide &$hydrogenHalide, IAtom &$alkeneCarbonCarbonBondAtom, IAtom &$hydrogenHalideHydrogenAtom, IAtom &$hydrogenHalideHalogenAtom, IBond &$alkeneCarbonCarbonBond, IBond &$hydrohalogenBond)
	{

		/*
		 Step 1:
		 $firstReactant == the alkene
		 $secondRectant == the $hydrogenHalide
		 $secondReactantAtom == hydrogen atom of the hydrohalogen
		 $firstReactantAtom == carbon atom of the aklene C==C double bond.
		 $electronSource == the alkene C==C double bond.

		$this->addStep(new Ionization($firstReactant, $secondReactant, $firstReactantAtom, $secondReactantAtom, $firstStepElectronSource,  $firstStepElectronSink));
		$this->addStep(new Ionization($firstReactant, $secondReactant, $secondReactantAtom, $secondReactantAtom, $secondStepElectronSource, $secondStepElectronSink));

		 Step 2:
			$electronSource ==  hydrogen atom of the hydrohalogen
			$secondReactantAtom == the halogen atom of the hydrohalogen.
			$electronSource == the hydrohalogen bond.
			$secondRectant == the hydrohalogen
		 */
		parent::__construct($alkene, $hydrogenHalide);

		// Step 1: Add arrow from the alkene double bond to the hydrohalogen hydrogen atom.
		parent::addReactionArrow(new ReactionArrow($alkeneCarbonCarbonBond, $hydrogenHalideHydrogenAtom));
		$alkeneCarbonCarbonBondAtom->decrementValence(); // Ionize
		$hydrogenHalideHydrogenAtom->incrementValence();

		$alkeneCarbonCarbonBond->bondType = "single";

		// Step 2: Add arrow from halgogen bond to the halogen atom of the hydrohalogen.
		parent::addReactionArrow(new ReactionArrow($hydrohalogenBond, $hydrogenHalideHalogenAtom));

		// Remove hydrogen halide bond
		$hydrogenHalideHalogenAtom->removeBond($hydrohalogenBond);
		$hydrogenHalideHydrogenAtom->removeBond($hydrohalogenBond);

		$this->product = new Carbocation(...$alkene->getAtoms());

	}
}