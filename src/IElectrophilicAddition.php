<?php

namespace kdaviesnz\reactions;

interface IElectrophilicAddition
{
    /*
     Electrophilic Addition to a π Bond. When an electrophile attacks a π bond, the π electron pair may form a new σ bond to the electron-deficient atom of the electrophile. (Not all additions to π bonds involve electrophiles or carbocations.) The other π bond carbon no longer shares the π electron pair, resulting in a carbocation. This addition is indicated with a curved arrow starting at the π bond and ending at the electron deficient atom of the electrophile. More powerful electrophiles or the formation of more stable carbocations result in lower activation energy and faster addition. Electrophilic addition to a π bond is illustrated by the reaction of HBr (an electrophile) with styrene (PhCH=CH2). Note that the more stable carbocation (secondary with resonance) is formed. This is a key mechanistic feature of Markovnikov’s Rule.

    http://www.chem.ucla.edu/~harding/tutorials/cc.pdf

    Steps. IReactionStep

    Params: nucleophile with double bond, electrophile (both passed by reference)
    eg CH3CH==CHCH3 + HBR

    Get the π (double) bond (IBond object, by reference) (B1)
    Change B1 to a single bond eg CH==CH becomesc CH---C
    Get the electron deficient atom of the electrophile (A1)  eg "H" of HBR
    And a new bond from the atom that B1 points to and point it to A1
    Change the atom that B1 points to (A2) to a + ion by subtracting an election (-- valence electrons).

    Add an electron to A1.
    If A1 now has more than 8 valence electrons then
        Remove the bond between A1 and the atom it's bonded to (A3)
        Add an atom to A3 to change it to a - ion.

    Add bond from A3 to A2.
    Subtrace an election from A3.
    Add an election to A2.


     */
}