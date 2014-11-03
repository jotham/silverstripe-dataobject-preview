<?PHP
class PreviewPage extends Page {

   public static $db = array(
   );

   public static $has_one = array(
   );

   public static $has_many = array(
   );

   public function getCMSFields() {
      $fields = parent::getCMSFields();
      return $fields;
   }

}

class PreviewPage_Controller extends Page_Controller implements CanPreviewableDataObject {

   public static $allowed_actions = array(
      'show'
   );

   public $exampleObject;

   public function getPreviewAction(SiteTree $page, PreviewableDataObject $obj) {
      /*
       * $obj is an instance of ExampleObject in this case.
       * 'show' can be what ever action you wish the controller to use
       */
      return $page->Link('show/' . $obj->ID);
   }

   public function index($request){
      // Could list all ExampleObjects etc.  Just show blank in the CMS Preview panel.
      return $this->renderWith('PreviewableDataObjectEmpty', 'Page');
   }

   public function show($request){
      $this->exampleObject = ExampleObject::get()->filter(array('ID' => $request->param('ID')))->First();
      if ( is_null($this->exampleObject) ) {
         // This means the object is either new in the CMS or doesn't exist
         return $this->renderWith('PreviewableDataObjectEmpty', 'Page');
      }
      return $this->renderWith('PreviewPage', 'Page');
   }

   public function getName(){
      return $this->exampleObject->Name;
   }

}

