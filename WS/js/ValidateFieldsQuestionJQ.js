$(document).ready(function(){
  $('#submit').click(function(){
    var emailER = /^([a-zA-Z]+[0-9]{3}@ikasle.ehu.(eus|es)|[a-zA-Z]*.*[a-zA-Z]+(@ehu.(eus|es)))$/;
    var email = $('#eposta').val();
    var galdera = $('#galdera').val();

    if (!emailER.test(email)){
      alert('E-posta ez da egokia!');
      return false;
    }
    if (galdera.length > 10){
      alert('Galdera luzeegia da!');
      return false;
    }

    return true;
  });
});