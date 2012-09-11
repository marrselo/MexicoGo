/* Upload tomado de http://tutorialzine.com/2011/09/html5-file-upload-jquery-php/
 * 
 * Funcion uploader
 * llamada $("#divId").uploader(maxFileSize,maxFiles,idAppend,crop);
 *
 *  PARAMETROS:
 *  maxFileSize		int		El tamano maximo de archivo que se puede subir en bytes default 500000
 *  maxFiles 		int		El numero maximo de archivos que puede subir
 *  append		char	selector del elemento donde se va a agregar la imagen subida, default false el append en el mismo div
 *  crop			bool	Condicion para que salte el crop inmediatamente de subir archivo, si esta es true maxFiles se define en 1, default false
 */
//var numImage=0;
//var jcrop_api, boundx, boundy;
//var postFileUrl='fileUpload/server/php/';
//var imageFolderUrl='/uploads/';

jQuery.fn.uploader = function(options) {
    
    var that = this;
    var numImage = 0;
    
    var settings = {
        name: 'file',
        postFileUrl: 'uploads/',
        maxFileSize:  20000, // kbs
        maxFiles: 1,
        append: null, // selector
        dimensions: [100, 100],  //array(width, height)
        crop: false, // 
        scalePreview: 1, // Escala la vista previa en un factor 1:?
        load : null
    }
    
    $.extend(settings, options);
    settings.maxFileSize *= 1000;
        
        
    //detectamos si el navegador soporta drag & drop
    if(!('draggable' in document.createElement('span'))) {
        //desaparece el area de drop files
        $(this).find("span").html("");
        $(this).css({            'background':'none',            'border':'none'        });
    }
	
    //definimos la dropzone
    $(this).fileupload({
        acceptFileTypes: /(\.|\/)(jpe?g|png)$/i,
        url: settings.postFileUrl,
        dataType: 'json',
        dropZone: $(this),
        maxFileSize: settings.maxFileSize,
        submit: function (event, files) { 
            //check for max files
            var fileCount = files.originalFiles.length;
            if (fileCount > settings.maxFiles) {
                alert("The max number of files is "+settings.maxFiles);
                throw 'This is not an error. This is just to abort javascript';
                return false; 
            }
            //check for images only
            var regexp = /\.(png$)|(jpg$)/i;
            // Using the filename extension for our test,
            // as legacy browsers don't report the mime type
            for(var i in files.files){
                if (!regexp.test(files.files[i].name)) {
                    alert('The file '+files.files[i].name+' is not an image (jpg, png), will not be uploaded');
                    return false;
                }
            }
            //check for image size
            if (files.files[0].size > settings.maxFileSize){
                alert('The file '+files.files[0].name+' exeds the max file size and will not be uploaded');
                return false
            }
        },
        done: function (e, data) {
            //obj = JSON.parse(data.result);
            //createImage(obj);
            $.each(data.result, function (index, file) {
                createImage(file);
            });
        }
        
    });
	
	
	
	
    function createImage(file, autocrop){        
        autocrop = autocrop===false ? autocrop : true;
        var template = '<div class="preview">'+
            '<div class="cont-imagen">'+
                '<img src="'+file.url+'" title = "'+file.name+'" style="max-width:'+settings.dimensions[0]*settings.scalePreview+'px; max-height: '+settings.dimensions[1]*settings.scalePreview+'px;" />'+
            '</div>'+
                '<input type="hidden" name="'+settings.name+'[]" value="'+file.name+'" class="img-name" />'+
                '<input type="text" name="'+settings.name+'_params[]" value="" class="img-params" />'+
            '<div class="data">'+                
                '<input type="text" name="'+settings.name+'_title[]" value="'+file.title+'" class="img-title" placeholder="Name" title="Name" />'+
                '<input type="text" name="'+settings.name+'_description[]" value="'+(file.description||'')+'" class="img-description" placeholder="Description"  title="Description" />'+
                '<input type="hidden" name="'+settings.name+'_delete[]" value="0" class="deleted" />'+
                '<input type="hidden" name="'+settings.name+'_id[]" value="'+(file.id||0)+'" class="img-title"  />'+
                '<input type="button" class="remove" value="X" >'+            
            '</div>'+
        '</div>'; 
            
        var preview = $(template), 
        image = $('img', preview);
        var btndel = $('.remove', preview).click(function(){
            $(this).parent().find('.deleted').val(1).end().parent().fadeOut();
        });
        
        
        
        image.bind('update', function(e, data){
            var $this = $(this);
            var left = $this.css('margin-left').replace('px', '');
            var top = $this.css('margin-top').replace('px', '');
            
            $this.css({width: $this.width()*settings.scalePreview, height: $this.height()*settings.scalePreview, 'margin-left': left*settings.scalePreview, 'margin-top': top*settings.scalePreview});
            
            left = $this.css('margin-left');
            top = $this.css('margin-top');
            preview.find('.img-params').val($.param(data) );            

        })
        
        image.css({'max-width': settings.dimensions[0]*settings.scalePreview, 'max-height': settings.dimensions[1]*settings.scalePreview});
        image.parent().css({'width': settings.dimensions[0]*settings.scalePreview, 'height': settings.dimensions[1]*settings.scalePreview, overflow: 'hidden', position: 'relative'});
                
        if(settings.append == false){
            //message.hide();
            //preview.appendTo(dropbox);
        }
        else{
            if(settings.maxFiles == 1){
                $(settings.append).html('')
            }
            preview.appendTo(settings.append);

        }
		
        // Associating a preview container
        // with the file, using jQuery's $.data():
		
        $.data(file,preview);
		
        if(settings.crop){
            //agrega el evento crop a la imagen insertada
            image.crop({dimensions: settings.dimensions});
            //si el crop esta habilitado aventar una ventana que se cree aqui mismo
            if(settings.maxFiles==1 && autocrop==true){
                image.trigger('click');
            }
        }
        numImage++;
		
    }
    
    if(settings.load){
        for(var i in settings.load){
            createImage(settings.load[i], false);
        }
        
    }
    
    return this;
};


//evitamos que el navegador se comporte normalmente al arrastrar archivos
$(document).bind('drop dragover', function (e) {
    e.preventDefault();
});



