<?php

declare(strict_types=1);
/*
 * ref http://www.webqc.org/balance.php?reaction=CH4+%2B+Cl2+%3D+CH2Cl+%2B+HCl
 * ref https://en.intl.chemicalaid.com/tools/equationbalancer.php?equation=C4H10+%2B+Cl+%3D+C4H9Cl+%2B+HCl
 */

namespace kdaviesnz\reactions;

interface IReactionEngine
{

	/*
 PROCEDURE NEW

	1. Does the chemical contain a halogen?
	   The halogens (/ˈhælədʒən, ˈheɪ-, -loʊ-, -ˌdʒɛn/) are a group in the periodic table consisting of five chemically related elements: fluorine (F), chlorine (Cl), bromine (Br), iodine (I), and astatine (At).
	If no go to 2.
	`2.1 I IFunctionalGroup->freeRadicalHalogenation(). Parent chemical is current chemical with hydrogen atom instead of
	halogen atom.
	2. Is the chemical an amine?
	if no go to 3.
		R-NH2
		2.1 Take the part of the chemical attached to the nitrogen atom and which is not a hydrogen atom. Replace the end (ie where the nitrogen atom was) with an oxygen atom and replace the O-C bond with a double bond. If this
		is a ketone go to 2.1.1. If it is an aldehyde go to 2.1.2.
			2.1.1 IAmine->reductiveAminationKeytone(IKetone ketone) (A ketone is an organic compound with the structure RC(=O)R', where R and R' can be a variety of carbon-containing substituents)
			2.1.2 IAmine->reductiveAminationAldehyde(IAldehyde aldehyde) (An aldehyde or alkanal is an organic compound containing a functional group with the structure R−C(=0)H, consisting of a carbonyl center with the carbon atom also bonded to hydrogen and to an R group, which is any generic alkyl or side chain) eg C=0 (Formaldehyde)



 PROCEDURE OLD

	1. Is the chemical an amine?
	if no go to 2.
		R-NH2
		1.1 Does the chemical have a methyl group attached to a Nitrogen atom and that nitrogent atom has a hydrogen atom attached?
		if no go to 1.2
			1.1.1 - IAmine->hydrogenSubstitionByMethylGroup()
				Parent: Current chemical with methyl group replaced with hydrogen atom.
				Reaction: IAmine->hydrogenSubstitionByMethylGroup()
		1.2 Does the chemical have a Carbon-Carbon link attached to a Nitrogen atom?
		if no to to 1.3
			1.2.1
				Parent: Current chemical with Carbon-Carbon link replaced with hydrogen atom.
				Reaction: hydrogenSubstitionByCarbonCarbon
		1.3 Does the chemical have a Carbon-Carbon-Carbon link attached to a Nitrogen atom?
		if no to to 1.4
			1.3.1
				Parent: Current chemical with Carbon-Carbon-Carbon link replaced with hydrogen atom.
				Reaction: hydrogenSubstitionByCarbonCarbonCarbon
		1.3 Does the chemical have a Carbon-Benzene link attached to a Nitrogen atom?
		if no to to 1.4
			1.3.1
				Parent: Current chemical with Carbon-Benzene link replaced with hydrogen atom.
				Reaction: hydrogenSubstitionByCarbonBenzene
		1.4 Does the chemical have a isopropyl group?
		if no go to 1.5
			1.4.1
				Parent: Current chemical with isopropyl group replaced with hydrogen atom.
				Reaction: hydrogenSubstitionByIsopropylGroup


	Example
	MDMA:
(CH3)N(H)-CH3-C-C-Benzene-{O-C-O-C}
CANONICAL SMILES
 CC(  CC1=CC2=C  (C=C1) OCO2 )NC     R-C-(NHCH3)
 Add hydrogens and show bonds
	[HHH]-C-C[HH](  CC1=CC2=C  (C=C1) OCO2   )N[HH]C[HHH]
	Molecular formula: C11H15NO2

	1. Yes.
	1.1. Yes.
		1.1.1 - IAmine->hydrogenSubstitionByMethylGroup()
				Parent:
				CC(CC1=CC2=C(C=C1)OCO2)N ((S)-Mda)
				Reaction: IAmine->hydrogenSubstitionByMethylGroup()


	Example DMT
	CN(C)CCC1=CNC2=CC=CC=C21 => [HHH]CN(CHHH)CCC1=CNC2=CC=CC=C21
	1. No - Nitrogen atom has two methyl groups and 1 carbon attached.

	Example Mescaline
	COC1=CC(=CC(=C1OC)OC)CCN
	1. No - Nitrogen atom has two hydrogens and 1 carbon attached.


	Example:

	MDP-2-P + methylamine-> intermediate imine + H2O-> MDMA



	 */


	/*

	A reaction mechanism describes the sequence of steps occurring during a reaction. Gaining an intuitive understanding of reaction mechanisms allows the accurate prediction of products for new reactions, a key goal of any organic chem- istry course. Most mechanisms involve combinations of the four elementary steps: (1) make a bond; (2) break a bond; (3) add a proton; or (4) take a proton away. Learning how to predict which step (or perhaps some other elementary step) is appropriate at a given stage in a mechanism requires recognition of the properties of the participating molecules. When writing mechanisms, arrows are used to in- dicate the redistribution of electrons during each step. We have a separate“Things You Should Know”section on just this topic coming up in a few chapters, along with practice problems.

 Most bond-making steps in reaction mechanisms involve nucleophiles re- acting with electrophiles. Nucleophiles are molecules that have a lone pair or bond that can donate electrons to make a new bond, usually corresponding to an area of relatively high electron density. Electrophiles contain atoms that can accept the new bond, usually corresponding to areas of relatively low electron density or even an unfilled valence shell. Note that often a bond is broken in the electrophile to make room for the new bond being made. We have another“ThingsYou Should Know”section on just this topic coming up in a few chapters..

	Chemistry 8th Edition.

	*/

	/**
	 *
	 * In this reaction, a chlorine atom is substituted for a methane hydrogen.
	 * One feature that’s interesting about this chlorination reaction is that the reaction is photochemical: Instead of using heat to start the reaction, the reaction uses light (abbreviated hν)! The reaction proceeds in three stages — initiation, propagation, and termination.
	 * “The light provides enough energy for the married chlorines to divorce — that is, for the chlorine-chlorine bond to break apart to form two chloride radicals, as shown in Figure 8-21. (Recall that free radicals are compounds that contain unpaired electrons.) This kind of bond dissociation is called homolytic cleavage, because the bond breaks symmetrically — one electron from the bond goes to one side, and the other electron goes to the other side, just as half of the shared property goes to each person in a divorce (theoretically). Note that you use one-headed fishhook arrows to show the movement of only one electron.
	 * “After the reaction has been initiated by forming the chlorine radicals, the reaction proceeds to the propagation steps (see Figure 8-22). A chlorine radical is unstable because the chlorine atom only has seven valence electrons, one electron short of having its valence octet completely full. To fill its valence octet, a chlorine radical then plucks a hydrogen atom (not a proton) from the methane to make hydrochloric acid plus the methyl radical. Now, however, the methyl radical is one electron short of completing its octet. So, the methyl radical then attacks another molecule of chlorine to make chloromethane plus another chlorine radical.
	 * “Because this reaction generates chlorine radicals as a byproduct, the reaction is called a chain reaction. In a chain reaction, the reactive species (in this case, the chlorine radical) is regenerated by the reaction. If not for the termination steps, this reaction could theoretically continue until all the starting materials were consumed. Termination steps are reactions that remove the reactive species without generating new ones. Any of the radical couplings shown in Figure 8-23 are considered termination steps because they remove the reactive species (the free radicals) from the reaction without replacing them.
	 * “What about the chlorination of larger molecules that have different kinds of hydrogens? In methane only one kind of hydrogen is available to be pulled off — and so only one possible product can be made — but in larger molecules, several products can be formed. For example, butane (see Figure 8-24) has two types of hydrogen. Hydrogens are classified according to the substitution of the carbon to which they’re attached. Hydrogens attached to primary carbons (or carbons bonded to only one other carbon) are called primary hydrogens, hydrogens attached to secondary carbons (or carbons bonded to two other carbons) are called secondary hydrogens, and so on. Butane has two types of hydrogens — primary hydrogens (1 degree) and secondary hydrogens (2 degrees).
	 * “The chlorination of butane selectively forms the product that results from the chloride radical abstracting a secondary hydrogen to make the secondary radical.
	 * “To see why this is so, you need to consider the stabilities of free radicals. Radicals are more stable when they rest on more highly substi“tuted carbons, as Figure 8-26 shows. Thus, you preferentially get chlorine substitution on the more highly substituted carbon atom.
	 * “The bromination of alkanes occurs in the same fashion as the chlorination of alkanes, except that Br2 is used in the reaction instead of Cl2. One difference between the chlorination and bromination of alkanes is that bromide radicals are more selective for hydrogen on more substituted carbons than chloride radicals are.
	 *
	 * Chlorine radicals are less stable than bromine radicals and, thus, have only modest selectivity for reacting with hydrogens on more substituted carbons, reacting many times with any hydrogen it bumps into. Bromine radicals, however, are more stable than chlorine radicals and, thus, are happier to wait until they bump into a hydrogen on a more highly substituted carbon before reacting.”
	 *
	 * @return string
	 */
	public function freeRadicalHalogenation(): string;


	/*
	 “Reacting benzene with electrophiles is a reaction called electrophilic aromatic substitution, and the general mechanism for this reaction is shown in Figure 16-1. In the first step of the mechanism, one of the double bonds in benzene attacks the positively charged electrophile (E+) to make a cation. This intermediate cation is stabilized by resonance (can you draw out the other two resonance structures?), but it’s non-aromatic (because the ring has an sp3-hybridized carbon). In the second step, when a base (abbreviated B: –) plucks off a proton adjacent to the carbocation, the aromatic ring is re-formed to make the substituted benzene.”

	“Figure 16-2 shows the reagents that you use to make different types of positively charged electrophiles. These reagents can be used to nitrate, brominate, chlorinate, or sulfonate benzene rings. These electrophiles all add to benzene in the fashion shown in Figure 16-1. The alkylation and acylation reactions are discussed in more detail in the following sections.”

Excerpt From: Arthur Winter. “Organic Chemistry I For Dummies.” iBooks.

Excerpt From: Arthur Winter. “Organic Chemistry I For Dummies.” iBooks.
Excerpt From: Arthur Winter. “Organic Chemistry I For Dummies.” iBooks.
	 */
	public function electrophilicAromaticSubstitution();


	/*
“Unlike the double bonds of alkenes, the double bonds in benzene are only weakly nucleophilic (nucleus loving), so you need powerful electrophiles (electron lovers) to make benzene react. You usually have to throw a full positive charge on the electrophile to make it strong enough to react with benzene. For exam“ple, Br2 reacts with alkenes but does not react with benzene. However, positively charged bromine, Br+, does react with benzene, because positively charged species are much more electrophilic than neutral species are. Unlike the reaction of bromine with alkenes (in which you get an addition reaction across the double bond), when benzene is reacted with the bromine ion (Br+), you get substitution reactions (in which the electrophile substitutes for hydrogen).

Reacting benzene with electrophiles is a reaction called electrophilic aromatic substitution, and the general mechanism for this reaction is shown in Figure 16-1. In the first step of the mechanism, one of the double bonds in benzene attacks the positively charged electrophile (E+) to make a cation. This intermediate cation is stabilized by resonance (can you draw out the other two resonance structures?), but it’s non-aromatic (because the ring has an sp3-hybridized carbon). In the second step, when a base (abbreviated B: –) plucks off a proton adjacent to the carbocation, the aromatic ring is re-formed to make the substituted benzene.”

	“Figure 16-2 shows the reagents that you use to make different types of positively charged electrophiles. These reagents can be used to nitrate, brominate, chlorinate, or sulfonate benzene rings. These electrophiles all add to benzene in the fashion shown in Figure 16-1. The alkylation and acylation reactions are discussed in more detail in the following sections.”

	[TABLE P329]

Excerpt From: Arthur Winter. “Organic Chemistry I For Dummies.” iBooks.

Excerpt From: Arthur Winter. “Organic Chemistry I For Dummies.” iBooks.

Excerpt From: Arthur Winter. “Organic Chemistry I For Dummies.” iBooks.
	 “One way to alkylate benzene rings was proposed by Charles Friedel and James Crafts. Reacting alkyl chlorides with the Lewis acid aluminum trichloride makes carbocations, they discovered, as shown in Figure 16-3. Carbocations are electrophilic enough to react with benzene to form alkyl benzenes by the same mechanism outlined in Figure 16-1.”

	RRRC-Cl->AlCl3->RRRC+ -AlCl4 (not in database)

	“Carbocations, though, are like naughty little children. As illustrated in Chapter 10 with the addition of HCl to alkenes, carbocations can — and will — rearrange if doing so makes a more stable carbocation.

 Tertiary cations are more stable than secondary cations, which are more stable than primary cations.

For example, reacting benzene with propyl chloride and aluminum trichloride makes isopropyl benzene as the major product, with the expected product, propyl benzene, as the minor product. See Figure 16-4 for the products of this reaction.”

	“The reason for this reaction not giving the expected product is that the primary cation can rearrange to the more stable secondary carbocation by a hydride shift, as shown in Figure 16-5. The addition of this secondary cation to benzene yields isopropyl benzene as the major product (not in database). Because of these rearrangements, adding straight-chain alkyl groups to benzene is difficult using the Friedel–Crafts alkylation reaction.”

Excerpt From: Arthur Winter. “Organic Chemistry I For Dummies.” iBooks.

Excerpt From: Arthur Winter. “Organic Chemistry I For Dummies.” iBooks.

Excerpt From: Arthur Winter. “Organic Chemistry I For Dummies.” iBooks.

Excerpt From: Arthur Winter. “Organic Chemistry I For Dummies.” iBooks.
	 */
	public function friedelCraftsAlkylation();


	/*
	 “To stop these pesky rearrangements that lead to undesired products, Friedel and Crafts came up with an acylation reaction (pronounced ay-sill-ay-shun). Taking an acid chloride (RCOCl) and adding aluminum trichloride makes an acylium cation, as shown in Figure 16-6. Acylium ions are stabilized by resonance and don’t rearrange.”

	(acid chloride) RClC=O -> (aluminum trichloride) AlC13 -> (acylium cation) RC+=O AlCl4 (not in database)

	Benzene -> RC+=0 -> (aryl ketone) benenzeRC=0 (not in database).

	BenzeneRC=0 -> H2/Pd/C -> BenzeneRC (not in database)

	“These acylium ions then react with benzene to make aryl ketones, as shown in Figure 16-7. Aryl ketones can be conveniently reduced with hydrogen and palladium on carbon (Pd/C) to alkyl aromatics. (Regular ketones not next to benzene rings, however, are untouched by these reagents.) Although it requires an additional step, this reaction sequence — acylation followed by reduction — is a handy way of making alkyl benzenes without worrying about carbocation rearrangements giving you undesired products.”

Excerpt From: Arthur Winter. “Organic Chemistry I For Dummies.” iBooks.

Excerpt From: Arthur Winter. “Organic Chemistry I For Dummies.” iBooks.
	 */
	public function friedelCraftsAcylation();


	/*
	 “A convenient way of making aryl amines is by reducing nitro groups. These groups can easily be reduced by the addition of tin chloride (SnCl2) in a little acid, as shown in Figure 16-8.”

	BenzeneNO2 -> tin chloride (SnCl2) / (acid) H+ -> BenzeneNH2 (aryl amine)

Excerpt From: Arthur Winter. “Organic Chemistry I For Dummies.” iBooks.

Excerpt From: Arthur Winter. “Organic Chemistry I For Dummies.” iBooks.
	 */
	public function nitroGroupReduction();


	/*
	 “Potassium permanganate is a powerful oxidizing reagent. In the presence of acid, this reagent takes alkyl benzenes, chews them up, and spits out aryl carboxylic acids (benzoic acids; refer to Figure 15-20), as shown in Figure 16-9. Any alkyl side chain that has a hydrogen adjacent to the phenyl ring will be oxidized to a carboxylic acid (a COOH group). If the alkyl side chain has no hydrogen adjacent to the ring, it will be left untouched.
	 */
	public function alkylatedBenzeneOxidation();


	/*
“Now you know the reagents that add different groups to benzene. But what if you want to synthesize disubstituted benzenes? After adding the first group, three locations are possible for the next group to add to, as shown in Figure 16-10. One possibility is for the next group to add ortho — organic-speak for adding to the carbon adjacent to the substituent. The group could also add meta (two carbons away from the first group) or it could add para (on the opposite side of the ring from the original group).”

Excerpt From: Arthur Winter. “Organic Chemistry I For Dummies.” iBooks.

	“Where the second substituent adds — ortho, meta, or para to the first substituent — depends on the nature of the group already attached to the benzene ring. Think of the substituents already on the ring as traffic controllers at an airport, directing the electrophile to land at certain runways (ortho, meta, or para, in this case). Electron-donating substituents activate the ring (that is, they make the ring react faster than an unsubstituted benzene reacts), and they tell the “incoming electrophile to land either at the ortho or the para position. With electron-donating substituents, you usually get a mixture of the ortho and para products. Electron-withdrawing groups on the ring, on the other hand, deactivate the benzene ring toward electrophilic attack (making the reaction slower than is the case with an unsubstituted benzene) and these electron-withdrawing groups tell the incoming electrophile to land at the meta position.”

	Bromination:

	(Anisole) BenzeneOCH3 -> BR2/FeBR3 -> (orthno product)  BrBenzeneOCHCH3 (para product) BrBenzeneOCHCH3 (not in database)

	Bromination:

	(nitrobenzene) BenzeneNO2 -> BR2/FeBR3 -> (meta product)  BrBenzeneNO2  (not in database)


	“The main point to remember here is that electron-donating groups direct substitution to the ortho and para position, while pi electron-withdrawing groups direct substitution to the meta position.”

	“The only exceptions are the halogens, which are not terribly good pi donors. They deactivate the ring as a result of being highly electronegative groups, pulling electrons away from the benzene ring toward themselves, making the ring less nucleophilic. But even though halogens are ring deactivators, they’re still ortho-para directors.

Pi-withdrawing groups (such as NO2 groups, carbonyl groups, CN, and so on) pull electrons away from the ring and deactivate it, making the ring less nucleophilic. Pi electron-withdrawers are thus ring deactivators. A deactivator means that the reaction of benzenes substituted with these substituents will be slower than the reaction of unsubstituted benzene. Pi electron-withdrawing substituents are meta directors. Table 16-1 outlines the nature of different substituents.”

	“Strongly activating

Weakly activating

Deactivating

Deactivating

OH
Alkyl
Halogens (F, Cl, Br, I)
NO2
OCH3
Phenyl
—COR (COOH, COOR, CHO, and so on)
NH2
CN
NR2
SO3H
 Here’s a tip for remembering Table 16-1: Any substituent whose first atom (the one attached to the benzene) contains a lone pair of electrons will be an ortho-para director (although not necessarily a ring activator). Those substituents without a lone pair on the first atom will likely be meta directors (with the exception of alkyl groups and aromatic rings, which are ortho-para directors).

 For performing multistep synthesis, the reduction of a nitro group to make an aryl amine is a way of converting a meta director into an ortho-para activator. The oxidation of an alkylated benzene (to make an aryl carboxylic acid) is a way of converting an ortho-para activator into a meta director. Additionally, the reduction of an aryl ketone (the product of a Friedel–Crafts acylation) to an alkane is a way of converting a meta director into an ortho-para activator.

”

Excerpt From: Arthur Winter. “Organic Chemistry I For Dummies.” iBooks.

Excerpt From: Arthur Winter. “Organic Chemistry I For Dummies.” iBooks.

Excerpt From: Arthur Winter. “Organic Chemistry I For Dummies.” iBooks.

Excerpt From: Arthur Winter. “Organic Chemistry I For Dummies.” iBooks.

Excerpt From: Arthur Winter. “Organic Chemistry I For Dummies.” iBooks.
	 */
	public function disubstitutedBenzeneSynthesis();


	/*
“When thinking about the synthesis of polysubstituted benzenes (benzenes substituted more than once), remember that the order of substituent addition is crucial. You have to put on the substituents in the right order so that they direct the next substituent to the right place.

For example, how would you synthesize 3-bromo-1-ethylbenzene, shown in Figure 16-16? First, you should notice that the substituents are meta to each other. That means that the first substituent that you add should be a meta director in order to get the next substituent in the meta position. But the substituents — the ethyl group and the bromine — are both ortho-para directors! How are you going to get them meta to each other? At some point, one of them must have been a meta director that then got converted into the ortho-para substituent.”

	“In the case of 3-bromo-1-ethylbenzene, the ethyl group could be added by a Friedel–Crafts acylation, as shown in Figure 16-17. Acyl groups are meta directors. The bromine could then be added and would go meta to the acyl group. The acyl group could then be reduced into the alkyl portion, as shown in the last step of Figure 16-17. The key to this synthesis is the order — switching any of the steps would lead to the wrong product.”

Excerpt From: Arthur Winter. “Organic Chemistry I For Dummies.” iBooks.

Excerpt From: Arthur Winter. “Organic Chemistry I For Dummies.” iBooks.

	benzene -> C=0-Cl / AlCl3 -> Benzene-CC=0 => Br2 / FeBr3 -> OBenzeneBr -> H2/Pd/C -> BrBenzene-CC (not in database)

	“The key to mastering aromatic synthesis problems is to add substituents in the correct order.”

Excerpt From: Arthur Winter. “Organic Chemistry I For Dummies.” iBooks.
	 */
	public function substitutedBenzeneSynthesis();


	/*
	 “I’ve shown you how benzene can act as a nucleophile (nucleus lover), reacting with powerful electrophiles in the electrophilic aromatic substitution reaction. Benzene can also act as an electrophile when the ring is sufficiently activated toward nucleophilic attack. When benzene is activated toward nucleophilic attack, strong nucleophiles can displace leaving groups substituted on the ring (usually a halide).
	
	Benzene rings activated toward nucleophilic attack include those that are substituted with strong electron-withdrawing groups in the ortho and para positions (groups like NO2, CN, COR, and so on). Substituted benzenes that are not activated with powerful electron-withdrawing groups will not undergo nucleophilic aromatic substitution. For example, 1-bromo-2,4-dinitrobenzene, shown in Figure 16-18, is activated toward nucleophilic attack because it has two powerful electron-withdrawing groups (NO2) ortho and para to the leaving group (Br). The addition of hydroxide ion (HO–) displaces the bromide.”
	
	Excerpt From: Arthur Winter. “Organic Chemistry I For Dummies.” iBooks.
	
	   benzene Br NO2 NO2 -> HO -> Benzene OH NO2 NO2  (not in database)
	 */
	public function nucleophilicAromaticSubstitution();


	/*
	 “A somewhat less useful but still highly interesting reaction of benzene is the reaction of a halobenzene (like bromobenzene or chlorobenzene) with a strong base (like hydroxide) at high temperature and pressure. Because the aromatic ring is not activated for nucleophilic attack by electron-withdrawing substituents, you can’t get nucleophilic aromatic substitution. Instead, you get elimination, as shown in Figure 16-20, to make a weird intermediate called a benzyne. Benzyne is a highly unstable intermediate, consisting of a benzene ring with a triple bond. Nucleophiles (abbreviated –:Nuc in Figure 16-20) quickly add to benzyne to make substituted benzenes.”

Excerpt From: Arthur Winter. “Organic Chemistry I For Dummies.” iBooks.
	 */
	public function nucleophilicAromaticElimination();


}