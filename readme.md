# Latte-Formatter

Simple string formatter for Latte.

-----

[![Build Status](https://img.shields.io/travis/minetro/latte-formatter.svg?style=flat-square)](https://travis-ci.org/minetro/latte-formatter)
[![Downloads total](https://img.shields.io/packagist/dt/minetro/latte-formatter.svg?style=flat-square)](https://packagist.org/packages/minetro/latte-formatter)
[![Latest stable](https://img.shields.io/packagist/v/minetro/latte-formatter.svg?style=flat-square)](https://packagist.org/packages/minetro/latte-formatter)
[![HHVM Status](https://img.shields.io/hhvm/minetro/latte-formatter.svg?style=flat-square)](http://hhvm.h4cc.de/package/minetro/latte-formatter)

## Discussion / Help

[![Join the chat](https://img.shields.io/gitter/room/minetro/nette.svg?style=flat-square)](https://gitter.im/minetro/nette?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)

## Install

```bash
composer require minetro/latte-formatter:~1.0.0
```

## Usage

### Register in config

Register in your config file (e.q. config.neon).

```yaml
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
