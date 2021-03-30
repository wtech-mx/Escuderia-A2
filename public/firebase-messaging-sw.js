/*
Give the service worker access to Firebase Messaging.
Note that you can only use Firebase Messaging here, other Firebase libraries are not available in the service worker.
*/
importScripts('https://www.gstatic.com/firebasejs/7.23.0/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/7.23.0/firebase-messaging.js');

/*
Initialize the Firebase app in the service worker by passing in the messagingSenderId.
* New configuration for app@pulseservice.com
*/
firebase.initializeApp({
            apiKey: "AIzaSyCx0ssO35wLU3d6e6C4QPrpqANdjj2L2Pc",
            authDomain: "checkngo-e379f.firebaseapp.com",
            projectId: "checkngo-e379f",
            storageBucket: "checkngo-e379f.appspot.com",
            messagingSenderId: "925533275751",
            appId: "1:925533275751:web:1a077ea798718e9d0c36c2",
            measurementId: "G-ZPD0T689L3"
            // measurementId: "G-R1KQTR3JBN"
        });

/*
Retrieve an instance of Firebase Messaging so that it can handle background messages.
*/
const messaging = firebase.messaging();
messaging.setBackgroundMessageHandler(function(payload) {
    console.log(
        "[firebase-messaging-sw.js] Received background message ",
        payload,
    );
    // Customize notification here
    const notificationTitle = "Background Message Title";
    const notificationOptions = {
        body: "Background Message body.",
        icon: "/itwonders-web-logo.png",
    };

    return self.registration.showNotification(
        notificationTitle,
        notificationOptions,
    );
});
