$(document).ready(function() {
    $('#button').click(function() {
        $('#telefonoa').val("a");
        $('#izena').val("b");
        $('#abizena').val("c");
        $.get('../xml/Users.xml', function(datuak){
            var epostenZer = $(datuak).find('eposta');
            var eposta = $('#eposta').val();
            for (var i = 0; i < epostenZer.length; i++){
                if(epostenZer[i].childNodes[0].nodeValue == $eposta){
                    $('#telefonoa').val("a");
                    $('#izena').val("a");
                    $('#abizena').val("a");
                }
            }
        })
    });
});
/*
$(document).ready(function() {
    $.get('../xml/Users.xml', function(datuak){
        var epostenZer = $(datuak).find('eposta');
        var eposta = $('#eposta').val();
        for (var i = 0; i < epostenZer.length; i++){
            if(epostenZer[i].childNodes[0].nodeValue == $eposta){
                $('#telefonoa').val("a");
                $('#izena').val("a");
                $('#abizena').val("a");
            }
        }
    })
});

*/