jQuery( document ).ready(function($) {

     /* Media Uploader */
    $( document ).on( 'click', '.sh-image-upload', function() {
        
        var imgfield, showfield, multiple_img;
        var ele_obj     = jQuery(this);
        imgfield        = ele_obj.parent().find('.sh-img-upload-input');
        showfield       = ele_obj.parent().find('.sh-img-preview');
        multiple_img    = ele_obj.attr('data-multiple');
        multiple_img    = (typeof(multiple_img) != 'undefined' && multiple_img == 'true') ? true : false;

        if(typeof wp == "undefined" || shAdmin.new_ui != '1' ) {
            
            tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
            
            window.original_send_to_editor = window.send_to_editor;
            window.send_to_editor = function(html) {
                
                if( imgfield ) {
                    
                    var mediaurl = $('img',html).attr('src');
                    imgfield.val(mediaurl);
                    showfield.html('<img src="'+mediaurl+'" />');
                    tb_remove();
                    imgfield = '';
                    
                } else {
                    window.original_send_to_editor(html);
                }
            };
            return false;
            
        } else {
            
            var file_frame;
            
            /* New media uploader */
            var button = jQuery(this);

            /* If the media frame already exists, reopen it. */
            if ( file_frame ) {
                file_frame.open();
              return;
            }

            if( multiple_img == true ) {
                
                /* Create the media frame. */
                file_frame = wp.media.frames.file_frame = wp.media({
                    title: button.data( 'title' ),
                    button: {
                        text: button.data( 'button-text' ),
                    },
                    library: {
                            type: ['image']
                    },
                    multiple: true
                });
                
            } else {

                /* Create the media frame. */
                file_frame = wp.media.frames.file_frame = wp.media({
                    frame: 'post',
                    state: 'insert',
                    title: button.data( 'title' ),
                    button: {
                        text: button.data( 'button-text' ),
                    },
                    library: {
                            type: [ 'image' ]
                    },  
                    multiple: false  /* Set to true to allow multiple files to be selected */
                });
            }

            file_frame.on( 'menu:render:default', function(view) {
                /* Store our views in an object. */
                var views = {};
    
                /* Unset default menu items */
                view.unset('library-separator');
                view.unset('gallery');
                view.unset('featured-image');
                view.unset('embed');
    
                /* Initialize the views in our view object. */
                view.set(views);
            });

            // When an image is selected, run a callback.
            file_frame.on( 'select', function() {
                
                // Get selected size from media uploader
                var selected_size = $('.attachment-display-settings .size').val();
                var selection = file_frame.state().get('selection');
                
                selection.each( function( attachment, index ) {
                    
                    attachment = attachment.toJSON();

                    /* Selected attachment url from media uploader */
                    var attachment_id = attachment.id ? attachment.id : '';
                    if( attachment_id && attachment.sizes && multiple_img == true ) {
                        
                        var attachment_url          = attachment.sizes.thumbnail ? attachment.sizes.thumbnail.url : attachment.url;
                        var attachment_edit_link    = attachment.editLink ? attachment.editLink : '';
                        var template                = wp.template('sh-pap-img-gallery');
                        
                        showfield.append( template({
                                                    attachment_edit_link : attachment_edit_link,
                                                    attachment_url : attachment_url,
                                                    attachment_id : attachment_id,
                                                })
                        );
                        showfield.find('.sh-no-img-placeholder').hide();
                    }
                });
            });
    
            /* When an image is selected, run a callback. */
            file_frame.on( 'insert', function() {
                /* Get selected size from media uploader */
                var selected_size = $('.attachment-display-settings .size').val();
                var selection = file_frame.state().get('selection');
                selection.each( function( attachment, index ) {
                    attachment = attachment.toJSON();
                    var attachment_url = attachment.url;
                    imgfield.val(attachment_url);
                    ele_obj.parent().find('.sh-thumb-id').val( attachment.id );
                    if(showfield){
                        showfield.html('<img src="'+attachment_url+'" alt="" />');    
                    }
                    $(document.body).trigger('sh_media_item_added', [ele_obj, attachment_url, attachment]);
                });
            });
    
            file_frame.open();
        }
    }); 



    $( document ).on( 'click', '.sh-video-upload', function() {
        
        var imgfield, showfield, multiple_img;
        var ele_obj     = jQuery(this);
        imgfield        = ele_obj.parent().find('.sh-img-upload-input');
        showfield       = ele_obj.parent().find('.sh-img-preview');
        multiple_img    = ele_obj.attr('data-multiple');
        multiple_img    = (typeof(multiple_img) != 'undefined' && multiple_img == 'true') ? true : false;

        if(typeof wp == "undefined" || shAdmin.new_ui != '1' ) {
            
            tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
            
            window.original_send_to_editor = window.send_to_editor;
            window.send_to_editor = function(html) {
                
                if( imgfield ) {
                    
                    var mediaurl = $('img',html).attr('src');
                    imgfield.val(mediaurl);
                    showfield.html('<img src="'+mediaurl+'" />');
                    tb_remove();
                    imgfield = '';
                    
                } else {
                    window.original_send_to_editor(html);
                }
            };
            return false;
            
        } else {
            
            var file_frame;
            
            /* New media uploader */
            var button = jQuery(this);

            /* If the media frame already exists, reopen it. */
            if ( file_frame ) {
                file_frame.open();
              return;
            }

            if( multiple_img == true ) {
                
                /* Create the media frame. */
                file_frame = wp.media.frames.file_frame = wp.media({
                    title: button.data( 'title' ),
                    button: {
                        text: button.data( 'button-text' ),
                    },
                    library: {
                            type: [ 'video' ]
                    },
                    multiple: true
                });
                
            } else {

                /* Create the media frame. */
                file_frame = wp.media.frames.file_frame = wp.media({
                    frame: 'post',
                    state: 'insert',
                    title: button.data( 'title' ),
                    button: {
                        text: button.data( 'button-text' ),
                    },
                    library: {
                            type: [ 'video' ]
                    },  
                    multiple: false  /* Set to true to allow multiple files to be selected */
                });
            }

            file_frame.on( 'menu:render:default', function(view) {
                /* Store our views in an object. */
                var views = {};
    
                /* Unset default menu items */
                view.unset('library-separator');
                view.unset('gallery');
                view.unset('featured-image');
                view.unset('embed');
    
                /* Initialize the views in our view object. */
                view.set(views);
            });

            // When an image is selected, run a callback.
            file_frame.on( 'select', function() {
                
                // Get selected size from media uploader
                var selected_size = $('.attachment-display-settings .size').val();
                var selection = file_frame.state().get('selection');
                
                selection.each( function( attachment, index ) {
                    
                    attachment = attachment.toJSON();

                    /* Selected attachment url from media uploader */
                    var attachment_id = attachment.id ? attachment.id : '';
                    if( attachment_id && attachment.sizes && multiple_img == true ) {
                        
                        var attachment_url          = attachment.sizes.thumbnail ? attachment.sizes.thumbnail.url : attachment.url;
                        var attachment_edit_link    = attachment.editLink ? attachment.editLink : '';
                        var template                = wp.template('sh-pap-img-gallery');
                        
                        showfield.append( template({
                                                    attachment_edit_link : attachment_edit_link,
                                                    attachment_url : attachment_url,
                                                    attachment_id : attachment_id,
                                                })
                        );
                        showfield.find('.sh-no-img-placeholder').hide();
                    }
                });
            });
    
            /* When an image is selected, run a callback. */
            file_frame.on( 'insert', function() {
                /* Get selected size from media uploader */
                var selected_size = $('.attachment-display-settings .size').val();
                var selection = file_frame.state().get('selection');
                selection.each( function( attachment, index ) {
                    attachment = attachment.toJSON();
                    var attachment_url = attachment.url;
                    imgfield.val(attachment_url);
                    ele_obj.parent().find('.sh-thumb-id').val( attachment.id );
                    if(showfield){
                        showfield.html('<img src="'+attachment_url+'" alt="" />');    
                    }
                    $(document.body).trigger('sh_media_item_added', [ele_obj, attachment_url, attachment]);
                });
            });
    
            file_frame.open();
        }
    });   

    /* Clear Media */
    $( document ).on( 'click', '.sh-image-clear', function() {
        $(this).parent().find('.sh-thumb-id').val('');
        $(this).parent().find('.sh-img-upload-input').val('');
        $(this).parent().find('.sh-img-preview').html('');
        $(this).parent().find('.sh-banner-priview-img').html('');
        $(document.body).trigger('sh_media_item_removed', [$(this)]);
    });
   
});

