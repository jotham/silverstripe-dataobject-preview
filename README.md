# Silverstripe 3.1 DataObject CMS Preview

A module for Silverstripe 3.1 that adds creates a DataObject with a preview panel much like the page editor.


## Requirements

Silverstripe 3.1 (Older versions lack the CMS support)

## Features

- Mostly works

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

