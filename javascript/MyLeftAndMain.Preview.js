(function($) {
    $.entwine('ss.preview', function($){
        $('.cms-preview').entwine({
            /*DefaultMode: 'content',*/
            getSizes: function() {
                var sizes = this._super();
                sizes.mobile.width = '400px';
                return sizes;
            }
        });
    });
    $.entwine('ss', function($){
        $('.cms-container').entwine({
            getLayoutOptions: function() {
                var opts = this._super();
                opts.minPreviewWidth = 600;
                return opts;
            }
        });
    });
}(jQuery));
