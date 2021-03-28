    // Detectar cambios de conexión
    function isOnline() {

        if ( navigator.onLine ) {

          const userAgent = window.navigator.userAgent.toLowerCase();
          const ios = (/iphone|ipad|ipod/.test(userAgent));

      if (ios) {
        // console.log("ios");

      } else {
        // console.log("web");
      }
        } else{
            // No tenemos conexión
            //  console.log('Offline');

          $(document).ready(function() {
             $("#myModal").modal("show");
          });

            $('#myModal').fadeIn();
              setTimeout(function() {
                   $("#myModal").fadeOut();
              },100000);


        }
    }
    window.addEventListener('online', isOnline );
    window.addEventListener('offline', isOnline );
    isOnline();
