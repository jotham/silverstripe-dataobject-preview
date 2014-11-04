(function($) {
   /*
    * TODO: Looked at quite a few ways to do this, appreciate any ideas.
    */
   function patchInterface(){
      if ( $('.cms-previewabledataobject').length > 0 ) {
         $('.cms-navigator').hide();
      }
   }
   $.entwine('ss.preview', function($){
      $('.cms-container').entwine().on('afterstatechange', patchInterface);
      $('.cms-preview').entwine().on('afterIframeAdjustedForPreview', patchInterface);
      patchInterface();
   });
}(jQuery));

