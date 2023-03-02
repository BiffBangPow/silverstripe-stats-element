## Stats element

Simple element for displaying stats on the page.

Stats will animate by default, this can be disabled with a config setting:

```yaml
BiffBangPow\Element\StatsElement:
  animate_stats: false
```

Default JS can be blocked if required by setting the config value on the class:

```yaml
BiffBangPow\Element\StatsElement:
  include_default_js: false
```