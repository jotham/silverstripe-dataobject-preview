# Silverstripe 3.1 DataObject Side-by-side Preview

Activates (most) of the new Silverstripe 3.1 Side-by-side Preview functionality for use with DataObjects. 

- http://doc.silverstripe.org/framework/en/reference/preview.

![screenshot_plugin](https://cloud.githubusercontent.com/assets/247139/4880595/5eb2c5ac-633d-11e4-86c0-c207d85f7be9.jpg)

## Requirements

Silverstripe 3.1 (Older versions lack the CMS support)

## Features

- Preview for Data Objects

## Install

- Install the module into the Silverstripe root
- Review the files in <site>/dataobject-preview/example_files/
- Create a DataObject that extends PreviewableDataObject (see example_files/ExampleObject.php)
- Create a ModelAdmin that manages your DataObject
- Create a Page + Page Controller to render your DataObject preview (see example_files/PreviewPage.php)
- Create a Template for your Preview Page (see example_files/PreviewPage.ss)
- Make sure your PreviewableDataObject has defined $preview_page to match the name of your Preview Page controller
- run /dev/build and ?flush=all

## Usage

You should see the preview panel when editing the details of your DataObject through the ModelAdmin GridField.

## Changelog

