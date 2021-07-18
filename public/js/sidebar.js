           $(document).ready(function(e) {
           // Cuando le dás click muestra #content
           $('#menu-toggle').click(function(){
              $("#wrapper").toggleClass("menuDisplayed");
              console.log("ff")
           });

           // Simular click
           $('#menu-toggle').click();
           });
