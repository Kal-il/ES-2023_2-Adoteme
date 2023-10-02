$(document).ready(function() {
     $("#cor").on("change", function() {
         if ($(this).val() === 'outra') {
             $("#outraCor").css("display", "block");
         } else {
             $("#outraCor").css("display", "none");
         }
     }).trigger("change");
 });

 $(document).ready(function() {
     $("#vacina_completa").on("change", function() {
         if ($(this).prop("checked") === false) {
             $("#infoVacina").css("display", "block");
         } else {
             $("#infoVacina").css("display", "none");
         }
     }).trigger("change");
 });

