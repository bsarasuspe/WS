function validateForm() {
  let eposta = document.forms["formularioa"]["eposta"].value;
  let galdera = document.forms["formularioa"]["galdera"].value;
  let zailtasuna = document.forms["formularioa"]["zailtasuna"].value;
  var re = /([a-zA-Z]+[0-9]{3}@ikasle.ehu.(eus|es)|[a-zA-Z]*.*[a-zA-Z]+(@ehu.(eus|es)))/;
  if (re.test(eposta) == false){
    alert("E-posta ez da egokia!");
    return false;
  }
  if (galdera.length > 10){
    alert("Galdera luzeegia da!");
    return false;
  }
}