function validateForm() {
  let eposta = document.forms["formularioa"]["eposta"].value;
  let galdera = document.forms["formularioa"]["galdera"].value;
  var re = /[a-zA-Z0-9]*(@ikasle.ehu.eus|@ehu.eus)/;
  if (re.test(eposta) == false){
    alert("E-posta ez da egokia!");
    return false;
  }
  if (galdera.length > 10){
    alert("Galdera luzeegia da!");
    return false;
  }
}