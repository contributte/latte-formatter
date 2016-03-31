# Latte-Formatter

[![Build Status](https://img.shields.io/travis/minetro/latte-formatter.svg?style=flat-square)](https://travis-ci.org/minetro/latte-formatter)
[![Downloads total](https://img.shields.io/packagist/dt/minetro/latte-formatter.svg?style=flat-square)](https://packagist.org/packages/minetro/latte-formatter)
[![Latest stable](https://img.shields.io/packagist/v/minetro/latte-formatter.svg?style=flat-square)](https://packagist.org/packages/minetro/latte-formatter)
[![HHVM Status](https://img.shields.io/hhvm/minetro/latte-formatter.svg?style=flat-square)](http://hhvm.h4cc.de/package/minetro/latte-formatter)

Simple string formatter for Latte.

## Install

```sh
$ composer require minetro/latte-formatter:~1.0.0
```

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
