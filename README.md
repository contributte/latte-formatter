![](https://heatbadger.now.sh/github/readme/contributte/latte-formatter/?deprecated=1)

<p align=center>
    <a href="https://bit.ly/ctteg"><img src="https://badgen.net/badge/support/gitter/cyan"></a>
    <a href="https://bit.ly/cttfo"><img src="https://badgen.net/badge/support/forum/yellow"></a>
    <a href="https://contributte.org/partners.html"><img src="https://badgen.net/badge/sponsor/donations/F96854"></a>
</p>

<p align=center>
    Website 🚀 <a href="https://contributte.org">contributte.org</a> | Contact 👨🏻‍💻 <a href="https://f3l1x.io">f3l1x.io</a> | Twitter 🐦 <a href="https://twitter.com/contributte">@contributte</a>
</p>

## Disclaimer

| :warning: | This project is no longer being maintained. Please use [contributte/utils](https://github.com/contributte/utils).
|---|---|

| Composer | [`minetro/latte-formatter`](https://packagist.org/packages/minetro/latte-formatter) |
|---|---|
| Version | ![](https://badgen.net/packagist/v/minetro/latte-formatter) |
| PHP | ![](https://badgen.net/packagist/php/minetro/latte-formatter) |
| License | ![](https://badgen.net/github/license/contributte/latte-formatter) |

## Usage

### Register in config

Register in your config file (e.q. config.neon).

```neon
services:
	formatter.money: 
		class: Minetro\Formatter\NumberFormatter('Kc')
	formatter.weight: 
		class: Minetro\Formatter\NumberFormatter('kg', '~')
		setup:
			- setThousand(NULL)
			- setDecimal(0)
	nette.latteFactory:
		setup:
			- addFilter(money, [@formatter.number,format])
			# or
			- addFilter(money, @formatter.number::format)
```


## Development

This package was maintained by these authors.

<a href="https://github.com/f3l1x">
  <img width="80" height="80" src="https://avatars2.githubusercontent.com/u/538058?v=3&s=80">
</a>

-----

Consider to [support](https://contributte.org/partners.html) **contributte** development team.
Also thank you for using this package.
