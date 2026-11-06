# Slova_HyvaElasticsuiteCompat

Fixes for `hyva-themes/magento2-smile-elasticsuite` running on Hyvä 1.5+.

## Category listing swatches

`Hyva_SmileElasticsuite` (up to and including 1.2.8) overrides the configurable
renderer on category pages (`category.product.type.details.renderers.configurable`)
with `Hyva_SmileElasticsuite::swatch/product/listing/renderer.phtml`. That template
is a copy of the pre-1.5 Hyvä renderer: it renders `product.swatch.item` inside an
Alpine `x-for` and never sets `option` on the block. Hyvä 1.5's `swatch-item.phtml`
throws on that:

```
RuntimeException: product.swatch.item rendered without "option" data
```

so every category containing a configurable product fails to render.

This module points the block back at the Hyvä 1.5 template
(`Magento_Swatches::product/listing/renderer.phtml`). The Elasticsuite swatches
helper is injected through `Hyva_SmileElasticsuite`'s `di.xml`, which stays in
effect.

**Remove this module** once a `hyva-themes/magento2-smile-elasticsuite` release
ships a 1.5-compatible listing renderer.

## Requirements

| | |
|---|---|
| Magento Open Source | 2.4.8 |
| Hyvä Theme | 1.5 or newer |
| `hyva-themes/magento2-smile-elasticsuite` | 1.2 – 1.2.8 |
| PHP | 8.3 – 8.4 |

The module is a single layout file: no PHP classes, no database tables, no settings.

## Installation

```bash
composer require slova/module-hyva-elasticsuite-compat
bin/magento module:enable Slova_HyvaElasticsuiteCompat
bin/magento setup:upgrade
bin/magento cache:flush
```

Open a category with a configurable product: it renders, with its swatches.

## Uninstalling

When the Hyvä ElasticSuite module ships its own fix:

```bash
bin/magento module:disable Slova_HyvaElasticsuiteCompat
composer remove slova/module-hyva-elasticsuite-compat
bin/magento setup:upgrade
bin/magento cache:flush
```

## License

MIT, see [LICENSE](LICENSE).
