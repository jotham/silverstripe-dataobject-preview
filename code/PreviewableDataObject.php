<?PHP

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

