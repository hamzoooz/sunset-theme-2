jQuery(document).ready(function ($) {

    var updateCSS = function () { $("#hamzoooz_custome_css").val(editor.getSession().getValue()); }
    $("#custom-css-save").submit(updateCSS);

});

var editor = ace.edit("editor");
editor.setTheme("ace/theme/monokai");
editor.getSession().setMode("ace/mode/css");
