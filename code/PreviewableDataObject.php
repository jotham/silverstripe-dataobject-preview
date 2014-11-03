<?PHP

class PreviewableDataObject extends DataObject implements CMSPreviewable {

   static $preview_class = 'OtherProductPage';

   public function Link($action = null) {
      trace('PreviewableDataObject::Link', $action);
      return 'http://staging.fbcloud.co.nz/doap-test/admin/other_products/OtherProduct/EditForm/field/OtherProduct/item/2/edit';
      return Controller::join_links(Director::baseURL(), $this->RelativeLink($action));
   }

   public function RelativeLink($action = null){
      trace('PreviewableDataObject::RelativeLink', $action);
      trace('RelativeLink', Controller::curr()->Link());
      return '';
   }

   public function PreviewLink(){
      return $this->getPreviewClass()->AbsoluteLink('show/'.$this->ID);
   }

   public function CMSEditLink($action = null) {
      trace('PreviewableDataObject::CMSEditLink', $action);
      return $this->Link($action);
   }

   public function getCMSFields(){
      error_log('PreviewableDataObject::getCMSFields');
      $fields = parent::getCMSFields();
      return $fields;
   }

   public function getPreviewClass(){
      $previewClass = $this->stat('preview_class');
      $controllerClass =  $previewClass . "_Controller";
      if( Controller::curr() instanceof $controllerClass ) {
         $previewPage = Controller::curr();
      } else {
         $previewPage = $previewClass::get()->First();
      }
      return $previewPage;
   }

}

class PreviewableModelAdmin extends ModelAdmin {

   public function getEditForm($id = null, $fields = null) {
      $form = parent::getEditForm($id, $fields);
      return $form;
   }

}

class PreviewableDataObjectExt extends Extension {

   public function updateItemEditForm(&$form){
      $fields = $form->Fields();
      if( !$fields->fieldByName('SilverStripeNavigator')) {
         $navigator = new SilverStripeNavigator($this->owner->record);
         $field = new LiteralField(
            'SilverStripeNavigator',
            $navigator->renderWith('LeftAndMain_SilverStripeNavigator')
         );
         $field->setAllowHTML(true);
         $fields->push($field);
      }
      $form->addExtraClass('cms-previewable');
      $form->removeExtraClass('cms-panel-padded center');
   }

   public function updateEditForm(&$form) {
      /*$fields = $form->Fields();
      trace($this->sanitiseClassName($this->owner->modelClass));
      trace($this->owner->modelClass);
      [>!dd($fields->fieldByName($this->sanitiseClassName($this->owner->modelClass))->getState(false));<]
      trace($this->owner->getAction());
      return;
      if ( Controller::curr()->getAction() == 'EditForm' ) { // SS suggests this is a special name not subject to immediate change
         if( !$fields->fieldByName('SilverStripeNavigator')) {
            $navigator = new SilverStripeNavigator($page);
            trace($this->getTemplatesWithSuffix('_SilverStripeNavigator'));
            $navField = new LiteralField(
               'SilverStripeNavigator',
               $navigator->renderWith($this->getTemplatesWithSuffix('_SilverStripeNavigator'))
            );
            $navField->setAllowHTML(true);
            $fields->push($navField);
         }
         trace('Enabling preview view');
         $form->addExtraClass('cms-previewable');
         $form->removeExtraClass('cms-panel-padded center');
      }*/
   }
}
