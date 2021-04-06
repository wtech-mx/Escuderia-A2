            <script src="https://www.gstatic.com/firebasejs/7.23.0/firebase.js"></script>
            <script>

                window.indexedDB = window.indexedDB || window.mozIndexedDB || window.webkitIndexedDB || window.msIndexedDB;

                window.IDBTransaction = window.IDBTransaction || window.webkitIDBTransaction || window.msIDBTransaction;
                window.IDBKeyRange = window.IDBKeyRange || window.webkitIDBKeyRange || window.msIDBKeyRange;
                //En caso de que el navegador del usuario no sea compatible con IndexedDB
                if (!window.indexedDB) {
                    console.log('¡IndexedDB no es compatible!')
                }else{
                    console.log('Compatible con IndexedDB')
                }

                const firebaseConfig = {
                    apiKey: "AIzaSyCx0ssO35wLU3d6e6C4QPrpqANdjj2L2Pc",
                    authDomain: "checkngo-e379f.firebaseapp.com",
                    projectId: "checkngo-e379f",
                    storageBucket: "checkngo-e379f.appspot.com",
                    messagingSenderId: "925533275751",
                    appId: "1:925533275751:web:1a077ea798718e9d0c36c2",
                    measurementId: "G-ZPD0T689L3"
                };
                // measurementId: G-R1KQTR3JBN
                  // Initialize Firebase
                firebase.initializeApp(firebaseConfig);
                const messaging = firebase.messaging();

                function initFirebaseMessagingRegistration() {
                        messaging
                        .requestPermission()
                        .then(function () {
                            return messaging.getToken()
                        })
                        .then(function(token) {
                            console.log(token);

                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });

                            $.ajax({
                                url: '{{ route("save-token") }}',
                                type: 'POST',
                                data: {
                                    token: token
                                },
                                dataType: 'JSON',
                                success: function (response) {
                                    alert('Token saved successfully.');
                                },
                                error: function (err) {
                                    console.log('User Chat Token Error'+ err);
                                },
                            });

                        }).catch(function (err) {
                            toastr.error('User Chat Token Error'+ err, null, {timeOut: 3000, positionClass: "toast-bottom-right"});
                        });
                 }

                 messaging.onMessage(function(payload) {
                    const noteTitle = payload.notification.title;
                    const noteOptions = {
                        body: payload.notification.body,
                        icon: payload.notification.icon,
                    };
                    new Notification(noteTitle, noteOptions);


                    // Así se ve nuestra información de clientes.
                    const customerData = [
                      { ssn: "444-44-4444", name: "Bill", age: 35, email: "bill@company.com" },
                      { ssn: "555-55-5555", name: "Donna", age: 32, email: "donna@home.org" }
                    ];

                    const dbName = "the_name";

                    //abriendo una base de datos
                    var  request = window.indexedDB.open(dbName, 1);

                    // Este evento solamente está implementado en navegadores recientes
                    request.onupgradeneeded = function(event) {
                      var db = event.target.result;

                      // Se crea un almacén para contener la información de nuestros cliente
                      // Se usará "ssn" como clave ya que es garantizado que es única
                      var objectStore = db.createObjectStore("customers", { keyPath: "noteTitle" });

                      // Se crea un índice para buscar clientes por nombre. Se podrían tener duplicados
                      // por lo que no se puede usar un índice único.
                      objectStore.createIndex("name", "name", { unique: false });

                      // Se crea un índice para buscar clientespor email. Se quiere asegurar que
                      // no puedan haberdos clientes con el mismo email, asi que se usa un índice único.
                      objectStore.createIndex("email", "email", { unique: true });

                      // Se usa transaction.oncomplete para asegurarse que la creación del almacén
                      // haya finalizado antes de añadir los datos en el.
                      objectStore.transaction.oncomplete = function(event) {
                        // Guarda los datos en el almacén recién creado.
                        var customerObjectStore = db.transaction("customers", "readwrite").objectStore("customers");
                        for (var i in customerData) {
                          customerObjectStore.add(customerData[i]);
                          console.log('Añadio datos')
                        }
                      }
                    };
                });


            </script>
