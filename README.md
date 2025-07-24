# Inputmask Plugin for OctoberCMS

## How to install

```
$ cd your/project/plugins
$ mkdir yfktn
$ cd yfktn
$ git clone https://github.com/yfktn/oc-inputmask.git inputmask
$ cd your/main/project/path
$ php artisan october:migrate
```

## How to use

In your field declarations, use `ocnumberinputmask` as the value of type.

```
nilai_perolehan:
    label: 'Nilai perolehan'
    span: auto
    type: ocnumberinputmask
    decimalCount: 2
    tab: Detail
    disabled: true
```

