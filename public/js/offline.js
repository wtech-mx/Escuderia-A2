    // Detectar cambios de conexión
    function isOnline() {

        if (!navigator.onLine ) {
             console.log('Offline');

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
