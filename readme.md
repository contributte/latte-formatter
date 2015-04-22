# Events

[![Build Status](https://travis-ci.org/minetro/formatter.svg?branch=master)](https://travis-ci.org/minetro/formatter)
[![Downloads this Month](https://img.shields.io/packagist/dm/minetro/formatter.svg?style=flat)](https://packagist.org/packages/minetro/formatter)
[![Latest stable](https://img.shields.io/packagist/v/minetro/formatter.svg?style=flat)](https://packagist.org/packages/minetro/formatter)
[![HHVM Status](https://img.shields.io/hhvm/minetro/formatter.svg?style=flat)](http://hhvm.h4cc.de/package/minetro/formatter)

Simple string formatter for Latte.

## Install

```sh
$ composer require minetro/formatter:~1.0.0
```

## Usage

### Register in config

Register in your config file (e.q. config.neon).

```neon
services

    formatter.number: 
        class: Minetro\Formatter\NumberFormatter('Kè')
    
    nette.latteFactory:
        setup:
            - addFilter(money, [@formatter.number,format])
```