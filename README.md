# SilverStripe 3.1 DataObject Preview

Activates some of the new Silverstripe 3.1 side-by-side preview functionality for use with DataObjects.

- http://doc.silverstripe.org/framework/en/reference/preview.

![screenshot_plugin](https://cloud.githubusercontent.com/assets/247139/4880595/5eb2c5ac-633d-11e4-86c0-c207d85f7be9.jpg)

## Requirements

- Silverstripe 3.1

## Install

1. Install the module into the SilverStripe root.
2. Create a DataObject that extends PreviewableDataObject.
   - [example_files/ExampleObject.php](https://github.com/jotham/silverstripe-dataobject-preview/blob/master/example_files/ExampleObject.php)
3. Create a ModelAdmin that manages your DataObject.
4. Create a Page + Page Controller to render your DataObject preview.
   - [example_files/PreviewPage.php](https://github.com/jotham/silverstripe-dataobject-preview/blob/master/example_files/PreviewPage.php)
5. Create a Template for your Preview Page.
   - [example_files/PreviewPage.ss](https://github.com/jotham/silverstripe-dataobject-preview/blob/master/example_files/PreviewPage.ss)
6. Run /dev/build and ?flush=all

## Troubleshooting

- Make sure your DataObject has defined $preview_page.

## Todo

- Make an Extension so you don't have to migrate your existing DataObjects.
- Fix up Versioning.

