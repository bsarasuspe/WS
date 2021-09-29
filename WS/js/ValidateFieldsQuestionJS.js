function validateForm() {
  var eposta = document.forms["galderenF"]["eposta"].value;
  var galdera = document.forms["galderenF"]["galdera"].value;
  var zailtasuna = document.forms["galderenF"]["zailtasuna"].value;
  var ezuzena = document.forms["galderenF"]["ezuzena"].value;
  var eokerra1 = document.forms["galderenF"]["eokerra1"].value;
  var eokerra2 = document.forms["galderenF"]["eokerra1"].value;
  var eokerra3 = document.forms["galderenF"]["eokerra1"].value;
  var zailtasuna = document.forms["galderenF"]["zailtasuna"].value;
  var gaia = document.forms["galderenF"]["gaia"].value;
  var re = /^([a-zA-Z]+[0-9]{3}@ikasle\.ehu\.(eus|es)|[a-zA-Z]*\.*[a-zA-Z]+(@ehu\.(eus|es)))$/;
  if (eposta.length>0 && galdera.length>0 && ezuzena.length>0 && eokerra1.length>0 
    && eokerra2.length>0 && eokerra3.length>0 && zailtasuna.length>0 && gaia.length>0){
   
    if (re.test(eposta) == false){
      alert("E-posta ez da egokia!");
      return false;
    }
    if (galdera.length < 10){
      alert("Galdera motzegia da!");
      return false;
    }

  }else{
    alert("Informazio guztia ez duzu bete!");
      return false;
  }
  
}