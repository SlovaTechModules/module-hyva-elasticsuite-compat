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
