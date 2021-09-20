$(document).ready(function() {
  $("#formumlarioa").validate({
    rules: {
      eposta : {
        pattern: '[a-zA-Z0-9]*(@ikasle.ehu.eus|@ehu.eus)'
      },
      galdera: {
        maxlength: 10
      },
    }
    messages: {
      galdera: {
        maxlength: "Galdera luzeegia da!"
      }
      eposta: {
        pattern: "E-posta ez da egokia!"
    }
  });
});