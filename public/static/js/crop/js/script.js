/* Funcion uploader
 * llamada $("#imgId").crop(cropWidth,cropHeight);
 * con esta llamada se le agrega al elemento imagen un evento click y al hacerle click abre una ventana que permite cropear
 *
 *  PARAMETROS:
 *  cropWidth:		integer		numero en pixeles del crop a lo ancho resultado default 150
 * 	cropHeight:		integer		numero en pixeles del crop a lo largo resultado default 150
 */

//var jcrop_api, boundx, boundy, CW, CH,fileName,image,resultW,resultH;
//var resultX=0;
//var resultY=0;

jQuery.fn.crop = function(options) {
    var that = this;
    var imagen = this[0];
    
    var settings = {
        dimensions: [150, 150],
        preview: true // true/false
    }            
    
    var popup = $('body').find('#popupcrop');    
    var blanket = $('body').find('#blanket');
    var preview = null;
    var jcrop_api = null
    
    
    if( blanket.length==0){
        blanket =$('<div>', {
            id:'blanket'
        });
        $('body').append(blanket)
    }
    
    /*agregamos el popup*/
    if( popup.length==0){
        popup =$('<div>', {id:'popupcrop' });
        $('body').append(popup);        
    }   
    
    $.extend(settings, options);
    
    this.bind("click", function(){

        var $img = $(this)
                
        popup.html(that.htmlPopup.call(this));
        popup.css({'width':settings.dimensions[0]+"px", left: (settings.dimensions[0]/2)+"px"});


        popup.css({'left': (($('body').width()-popup.width())/2)+'px'  });
        popup.show().animate({'opacity': '1'});
        blanket.show().animate({'opacity': '.65'});
        
        //$popup.css({'left': popup_x});
					
        /* escondemos el scroll del body */
        //document.body.style.overflow = 'hidden';
        
        preview = popup.find('.previewWrapper');
	
        $("#cropTar").Jcrop({
            onChange: that.updatePreview,
            onSelect: that.updatePreview,
            setSelect : [0, 0, settings.dimensions[0], settings.dimensions[1]],
            aspectRatio: settings.dimensions[0]/settings.dimensions[1]
        },function(){
            jcrop_api = this;
            var bounds = this.getBounds();
            this.boundx = bounds[0];
            this.boundy = bounds[1];
        })
        
        popup.find('#close-popup').click(function(e){e.preventDefault();that.cancelCrop()});
        popup.find('#save-popup').click(function(e){e.preventDefault(); that.endCrop()});       
            
    });

    
    this.htmlPopup = function(){ 
        var template =
        '<div class="group">'+
            '<div class="previewWrapper" style="width:'+settings.dimensions[0]+"px;height:"+settings.dimensions[1]+'px">'+
                '<img src="'+this.src+'" alt="Preview" class="jcrop-preview" />'+
            '</div>'+
            '<div class="description">'+
                'You can move an resize to your liking. When you are satisfied width your image, click the yellow button<p>'+        
                '<a id="close-popup" href="" class="boton-gris-basico oswald" >Cancel</a>'+
                '<a id="save-popup"  href="" class="boton-yellow-1 oswald" >GO FOR IT! >></a>'+
            '</div>'+        
        '</div>'+
        '<div class="cropArea">'+
            '<img src="'+this.src+'" id="cropTar" alt="Crop Area" >'+
        '</div>'
        return template;
    }
    
    this.updatePreview = function(c) {
        if (parseInt(c.w) > 0)
        {
            var rx = settings.dimensions[0] / c.w;
            var ry = settings.dimensions[1] / c.h;

            //update preview
            preview.find('img').css({
                width: Math.round(rx * this.boundx) + 'px',
                height: Math.round(ry * this.boundy) + 'px',
                marginLeft: '-' + Math.round(rx * c.x) + 'px',
                marginTop: '-' + Math.round(ry * c.y) + 'px'
            });
        }

    };

    this.endCrop = function (){
        var c = jcrop_api.tellSelect();
        if (parseInt(c.w) > 0){
            
            
            var rx = settings.dimensions[0] / c.w;
            var ry = settings.dimensions[1] / c.h;
            
            $(imagen).css({
                    'max-width': 'none',
                    'max-height': 'none',
                    width: Math.round(rx * jcrop_api.boundx) + 'px',
                    height: Math.round(ry * jcrop_api.boundy) + 'px',
                    marginLeft: '-' + Math.round(rx * c.x) + 'px',
                    marginTop: '-' + Math.round(ry * c.y) + 'px'
                }).trigger('update', c);
        }
        
        this.cancelCrop();
        return false; 
    };


    this.cancelCrop = function(){
        //popup.remove();
        popup.animate({'opacity': '0'}, function(){$(this).hide()});
        blanket.animate({'opacity': '0'}, function(){$(this).hide()});
        return false; 
    }    
    
    return this;
}
