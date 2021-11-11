$(document).ready(function(){
    
    $('#search').focus(function(){
        $('#btn-search').css("background-color" ,"white");
        $('#search').css("background-color" ,"white");
        $('#btn-search').css("color" ,"#ccc");
    });

    $('#search').blur(function(){
        $('#search').css("background-color" ,"#eee");
        $('#btn-search').css("background-color" ,"#eee");
        $('#btn-search').css("color" ,"white");
    });

    $('#btn-search').focus(function(){
        $('#search').css("background-color" ,"white");
        $('#btn-search').css("background-color" ,"white");
        $('#btn-search').css("color" ,"#ccc");
    });

    $('#btn-search').blur(function(){
        $('#search').css("background-color" ,"#eee");
        $('#btn-search').css("background-color" ,"#eee");
        $('#btn-search').css("color" ,"white");
    });

    $('#btn-search').click(function(){
        if ($('#search').val() == "")
            $('#search').focus();
    });
});