# chemreactions

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

**Note:** Replace ```:author_name``` ```:author_username``` ```:author_website``` ```:author_email``` ```:vendor``` ```:package_name``` ```:package_description``` with their correct values in [README.md](README.md), [CHANGELOG.md](CHANGELOG.md), [CONTRIBUTING.md](CONTRIBUTING.md), [LICENSE.md](LICENSE.md) and [composer.json](composer.json) files, then delete this line. You can run `$ php prefill.php` in the command line to make all replacements at once. Delete the file prefill.php as well.

This is where your description should go. Try and limit it to a paragraph or two, and maybe throw in a mention of what
PSRs you support to avoid any confusion with users and contributors.

## Structure

If any of the following are applicable to your project, then the directory structure should follow industry best practises by being named the following.

```
bin/        
config/
src/
tests/
vendor/
```


## Install

Via Composer

``` bash
$ composer require kdaviesnz/atom
```

## Usage

``` php
        $Na = new \kdaviesnz\atom\Atom("2Na");
        $Cl = new \kdaviesnz\atom\Atom("Cl2");

        var_dump($Na->getValence());
        var_dump($Cl->getValence());

        // 2Na(s)  +  Cl2(g)  ——>  2NaCl(s)
        $r1 = new \kdaviesnz\reactions\Reaction();
        $reactionStep = new \kdaviesnz\reactions\Combination($Na, $Cl);
        $r1->addStep($reactionStep);
        $r1->addProduct($reactionStep->getProduct());

        var_dump($Na->getValence());
        var_dump($Cl->getValence());

        // Electrophilic addition / Ionization
        $CarbonMethylAtom1 = new \kdaviesnz\atom\Atom("C");
        $hydrogenMethylAtom1 = new \kdaviesnz\atom\Atom("H3");
        $CarbonMethylAtom1->addBond(new \kdaviesnz\atom\Bond($hydrogenMethylAtom1, "carbonmethlybond1"));
        $hydrogenMethylAtom1->addBond(new \kdaviesnz\atom\Bond($CarbonMethylAtom1, "carbonmethlybond1"));
        $carbonMethylAtom2 = new \kdaviesnz\atom\Atom("C");
        $hydrogenMethylAtom2 = new \kdaviesnz\atom\Atom("H3");
        $carbonMethylAtom2->addBond(new \kdaviesnz\atom\Bond($hydrogenMethylAtom2, "carbonmethlybond2"));
        $hydrogenMethylAtom2->addBond(new \kdaviesnz\atom\Bond($carbonMethylAtom2, "carbonmethlybond2"));
        $carbonDoubleBondAtom1 = new \kdaviesnz\atom\Atom("C");
        $carbonDoubleBondAtom2 = new \kdaviesnz\atom\Atom("C");
        $hydrogenCarbonDoubleBondAtom1 = new \kdaviesnz\atom\Atom("H");
        $hydrogenCarbonDoubleBondAtom2 = new \kdaviesnz\atom\Atom("H");
        $carbonDoubleBondAtom1->addBond(new \kdaviesnz\atom\Bond($hydrogenCarbonDoubleBondAtom1, "carbonhydrogenbond"));
        $hydrogenCarbonDoubleBondAtom1->addBond(new \kdaviesnz\atom\Bond($carbonDoubleBondAtom1, "carbonhydrogenbond"));
        $carbonDoubleBondAtom2->addBond(new \kdaviesnz\atom\Bond($hydrogenCarbonDoubleBondAtom2, "carbonhydrogenbond"));
        $hydrogenCarbonDoubleBondAtom2->addBond(new \kdaviesnz\atom\Bond($carbonDoubleBondAtom2, "carbonhydrogenbond"));
        $carbonDoubleBondAtom1->addBond(new \kdaviesnz\atom\Bond($carbonDoubleBondAtom2, "alkenedoublebond", "double" ));
        $carbonDoubleBondAtom2->addBond(new \kdaviesnz\atom\Bond($carbonDoubleBondAtom1,"alkenedoublebond", "double"));

        $r2 = new \kdaviesnz\reactions\ElectrophilicAddition(
            new \kdaviesnz\molecule\Alkene($CarbonMethylAtom1, $hydrogenMethylAtom1, $carbonMethylAtom2, $hydrogenMethylAtom2, $carbonDoubleBondAtom1, $carbonDoubleBondAtom2, $hydrogenCarbonDoubleBondAtom1, $hydrogenCarbonDoubleBondAtom2),
            new \kdaviesnz\molecule\HydrogenHalide(new \kdaviesnz\atom\Halogen("Br"))
        );
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CODE_OF_CONDUCT](CODE_OF_CONDUCT.md) for details.

## Security

If you discover any security related issues, please email :author_email instead of using the issue tracker.

## Credits

- [:author_name][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/:vendor/:package_name.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/:vendor/:package_name/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/:vendor/:package_name.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/:vendor/:package_name.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/:vendor/:package_name.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/:vendor/:package_name
[link-travis]: https://travis-ci.org/:vendor/:package_name
[link-scrutinizer]: https://scrutinizer-ci.com/g/:vendor/:package_name/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/:vendor/:package_name
[link-downloads]: https://packagist.org/packages/:vendor/:package_name
[link-author]: https://github.com/:author_username
[link-contributors]: ../../contributors
# chemreactions
# chemreactions
