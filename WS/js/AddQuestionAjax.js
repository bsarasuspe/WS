/*function AddQuestionAjax() {
    var galdera = $("#formularioa").get(0);
    $.ajax({
        type: 'POST',
        url: "../php/AddQuestionWithImage.php",
        enctype:'multipart/form-data',
        data: new FormData(galdera),
        success: function(data) {
            alert("Datuak ongi gorde dira.") 
        },
        error: function (data) {
            $("#ajaxtext").text("Ezin izan da galdera gorde.");
        }
  });
}*/

/*
function AddQuestionAjax() {
    var galdera = $("#formularioa").get(0);
    xhro = new XMLHttpRequest();
    xhro.open("POST", "../php/AddQuestionWithImage.php", true);
    xhro.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhro.send(new FormData(galdera));
}*/

function AddQuestionAjax(){
    var galdera = $("#formularioa").get(0);
    $.post({
        url: '../php/AddQuestionWithImage.php',
        data: new FormData(galdera),
        enctype:'multipart/form-data',
        success: function (data) {
            //$("#ajaxtext").text("Galdera gorde da.");
            var dataHTML = $.parseHTML(data);
            $("#ajaxtext").html($(dataHTML).find("#mezuak"));
            //$("input[type='submit']").remove();
            //SeeQuestionsAjax();
        },
        error: function (data) {
            $("#ajaxtext").text("Ezin izan da galdera gorde.");
        }
    });
}
