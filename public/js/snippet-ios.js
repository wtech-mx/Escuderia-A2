// Detects if device is on iOS

const userAgent = window.navigator.userAgent.toLowerCase();
const ios = (/iphone|ipad|ipod/.test(userAgent));


function pw(){

      if (ios == true) {
        console.log("ios");

              function clickbutton() {
                // simulamos el click del mouse en el boton del formulario
                $("#md-snackbar-action").click();
              }
              $('#md-snackbar-action').on('click',function() {
                console.log('action button clicked');
              });

              setTimeout(clickbutton, 5000);

      } else {
        console.log("web");
      }

    return ios;
  }

  pw();


    document.getElementById('md-snackbar-action').addEventListener('click', function () {
        mobiscroll.snackbar({
            message: 'Instalar Aplicacion en tu iphone',
            color: 'primary',
            button: {
                text: 'OK',
                action: function () {
                    mobiscroll.toast({
                        message: 'Tab y agrega en el escritorio!',
                        color: 'success',
                        icon:'',
                        action: '',
                    });
                }
            }
        });
    });
