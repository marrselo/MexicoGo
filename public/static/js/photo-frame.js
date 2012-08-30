$(document).ready(function(){
    var _height=$('#photo-frame img').height();
    var _width=$('#photo-frame img').width();
    $('#photo-frame').attr('height',_height)
                    .attr('width',_width)
                    .css('padding','5px')
                    .css('margin','0 auto')
                    .css('height',_height)
                    .css('width',_width)
                    .css('box-shadow','0 1px 5px -1px');
    
});