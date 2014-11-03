# SilverStripe 3.1 DataObject Preview

Activates (most) of the new Silverstripe 3.1 side-by-side preview functionality for use with DataObjects. 

- http://doc.silverstripe.org/framework/en/reference/preview.

![screenshot_plugin](https://cloud.githubusercontent.com/assets/247139/4880595/5eb2c5ac-633d-11e4-86c0-c207d85f7be9.jpg)

## Requirements

Silverstripe 3.1

## Install

- Install the module into the SilverStripe root.
- Create a DataObject that extends PreviewableDataObject.
  - see https://github.com/jotham/silverstripe-dataobject-preview/blob/master/example_files/ExampleObject.php
- Create a ModelAdmin that manages your DataObject.
- Create a Page + Page Controller to render your DataObject preview.
  - see https://github.com/jotham/silverstripe-dataobject-preview/blob/master/example_files/PreviewPage.php
- Create a Template for your Preview Page.
  - see https://github.com/jotham/silverstripe-dataobject-preview/blob/master/example_files/PreviewPage.ss
- Run /dev/build and ?flush=all

## Troubleshooting

- Make sure your DataObject has defined $preview_page.

## Changelog

