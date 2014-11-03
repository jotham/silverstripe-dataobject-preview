<?PHP

interface CanPreviewableDataObject {
   /*
    * Return the Link to display the PreviewableDataObject
    *
    * @param SiteTree $page First SiteTree object we found for this controller
    * @param PreviewableDataObject $obj The object we want to display on the page
    *
    * @return string Link to route for displaying object
    *
    * Example: See example_files/PreviewPage.php
    *
    * TODO: Provide a base class rather than an interface for convenience?
    */
   public function getPreviewAction(SiteTree $page, PreviewableDataObject $obj);
}

