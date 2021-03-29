
    function isOnline() {

        if (!navigator.onLine) {
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

    function isIos() {
        if (ios) {
           console.log('ios');
          $(document).ready(function() {
             $("#modal-ios").modal("show");
          });

        }
    }

    const userAgent = window.navigator.userAgent.toLowerCase();
    const ios = (/iphone|ipad|ipod/.test(userAgent));

    window.addEventListener('ios', isIos );

    isIos();







