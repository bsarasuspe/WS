$("#formularioa").submit(function(datuak) {
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