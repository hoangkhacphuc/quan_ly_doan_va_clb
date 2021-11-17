CKEDITOR.replace('editor',{
    height: '500px',
    filebrowserUploadUrl : 'group/upload?command=QuickUpload',
});

$(document).ready(function () {
    $('#inp-title').focus(function () { 
        $('.page>.new-post>.container>.line').css({
            'animation' : 'select_Input_Title 0.5s',
            'width' : '100%',
            'height' : '2px'
        });
        console.log(CKEDITOR.instances.editor.getData());
    });
    $('#inp-title').blur(function () { 
        $('.page>.new-post>.container>.line').css({
            'animation' : 'unselect_Input_Title 0.5s',
            'width' : '0',
            'height' : '0'
        });
    });
});