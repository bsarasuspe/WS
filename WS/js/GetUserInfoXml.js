$(document).ready(function() {
    $('#button').click(function() { 
        $.get('../xml/Users.xml', function(datuak){
            var erabiltzaileZer = $(datuak).find('erabiltzailea');
            var eposta = $('#eposta').val();
            for (var i = 0; i < erabiltzaileZer.length; i++){
                if(erabiltzaileZer[i].getElementsByTagName("eposta")[0].childNodes[0].nodeValue == eposta){
                    $('#telefonoa').val(erabiltzaileZer[i].getElementsByTagName("telefonoa")[0].childNodes[0].nodeValue);
                    $('#izena').val(erabiltzaileZer[i].getElementsByTagName("izena")[0].childNodes[0].nodeValue);
                    $('#abizena').val(erabiltzaileZer[i].getElementsByTagName("abizena1")[0].childNodes[0].nodeValue + " " + erabiltzaileZer[i].getElementsByTagName("abizena2")[0].childNodes[0].nodeValue);
                }
            }
        })
    });
});