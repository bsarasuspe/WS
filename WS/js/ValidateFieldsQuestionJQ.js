$(document).ready(function(){
  $('#submit').click(function(){
    var emailER = /^([a-zA-Z]+[0-9]{3}@ikasle\.ehu\.(eus|es)|[a-zA-Z]*\.*[a-zA-Z]+(@ehu\.(eus|es)))$/;
    var email = $('#eposta').val();
    var galdera = $('#galdera').val();
    var ezuzena = $('#ezuzena').val();
    var eokerra1 = $('#eokerra1').val();
    var eokerra2 = $('#eokerra2').val();
    var eokerra3 = $('#eokerra3').val();
    var zailtasuna = $('#zailtasuna').val();
    var gaia = $('#gaia').val();

    if (email.length>0 && galdera.length>0 && ezuzena.length>0 && eokerra1.length>0 && eokerra2.length>0  
      && eokerra3.length>0 && zailtasuna.length>0 && gaia.length>0){
        
      if (!emailER.test(email)){
      alert('E-posta ez da egokia!');
      return false;
      }
      if (galdera.length < 10){
       alert('Galdera motzeegia da!');
       return false;
      }

    }else{
      alert("Informazio guztia ez duzu bete!");
      return false;
    }

    return true;
  });
});