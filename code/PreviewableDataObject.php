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
    * Example:
    *
    * TODO: Provide a base class rather than an interface for convenience?
    */
   public function getPreviewAction(SiteTree $page, PreviewableDataObject $obj);
}

class PreviewableDataObject extends DataObject implements CMSPreviewable {

   /*
    * This is the Page we will use to render the PreviewableDataObject.
    * Note: Currently we assume that [PreviewPage]_Controller also exists.
    */
   static $preview_page = '[PreviewPage]';

   public function PreviewLink(){
      /*
       * This is the link we show in the CMS Preview panel
       */
      list($page_cls, $controller_cls) = $this->getPreviewClasses();
      return $controller_cls::getPreviewAction($page_cls::get()->First(), $this);
   }

   public function CMSEditLink(){
      /*
       * This is used by SilverStripeNavigator to provide an edit page link.
       * TODO: Possibly integrate Model Admin association for CMSEditLink
       */
      error_log('PreviewableDataObject->CMSEditLink - Not implemented.');
      return $this->Link();
   }

   /*
    * Both of these depend on us knowing the context of the request for this object
    * TODO: Define if editor context or front end website context.
    */
   public function Link($action = null) {
      return Controller::join_links(Director::baseURL(), $this->RelativeLink($action));
   }
   public function RelativeLink(){
      return '';
   }

   private function getPreviewClasses(){
      $cls = $this->stat('preview_page');
      $controller_cls = $cls . '_Controller';
      if ( !class_exists($cls) ) {
         throw new Exception('Class does not exist: ' . $cls);
      }
      if ( !in_array('CanPreviewableDataObject', class_implements($controller_cls)) ) {
         throw new Exception('Class does not implement CanPreviewableDataObject: ' . $controller_cls);
      }
      return array($cls, $controller_cls);
   }

}

class PreviewableDataObjectExt extends Extension {

   public function updateItemEditForm(&$form){
      $fields = $form->Fields();
      if( $this->owner->record instanceof PreviewableDataObject && !$fields->fieldByName('SilverStripeNavigator') ) {
         $this->injectNavigatorAndPreview($form, $fields);
      }
   }

   private function injectNavigatorAndPreview(&$form, &$fields){
      $editForm = $fields->fieldByName('EditForm');
      //TODO: Do we need to verify we are in the right controller?
      $template = Controller::curr()->getTemplatesWithSuffix('_SilverStripeNavigator');
      $navigator = new SilverStripeNavigator($this->owner->record);
      $field = new LiteralField('SilverStripeNavigator', $navigator->renderWith($template));
      $field->setAllowHTML(true);
      $fields->push($field);
      $form->addExtraClass('cms-previewable');
      $form->removeExtraClass('cms-panel-padded center');
   }

}
