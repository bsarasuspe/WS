function AddQuestionAjax() {
    var formularioa = $("#formularioa").get(0);
    $.ajax({
        method: 'POST',
        url: '../php/AddQuestionWithImage.php?',
        data: new FormData(formularioa),
        enctype:'multipart/form-data',
        processData: false,
        contentType: false,
        cache: false,
        success: function (data) {
            $("#mezua").html("Galdera ongi gehitu da!");
        },
        error: function (data) {
            $("#mezua").html("Errore bat gertatu da galdera gehitzean!");
        }
    });
}