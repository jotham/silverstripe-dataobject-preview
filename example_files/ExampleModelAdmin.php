<?PHP

class ExampleObjectAdmin extends ModelAdmin {

   public static $managed_models = array('ExampleObject');
   static $url_segment = 'example-object';
   static $menu_title = 'Example Objects';

}
