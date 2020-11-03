var readCookie = function(name) {
    var nameEQ = encodeURIComponent(name) + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) === ' ')
            c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) === 0)
            return decodeURIComponent(c.substring(nameEQ.length, c.length));
    }
    return null;
};

var initFirebase = function() {
	
	// Initialize Firebase. 
	// Your web app's Firebase configuration
	// For Firebase JS SDK v7.20.0 and later, measurementId is optional
	var firebaseConfig = {
	  apiKey: "AIzaSyAJEOaUYtHX4KsUUnsrUcmpk2ao3JTkKLY",
	  authDomain: "embedded-development.firebaseapp.com/",
	  databaseURL: "https://embedded-development.firebaseio.com",
	  projectId: "embedded-development",
	  storageBucket: "embedded-development.appspot.com",
	  messagingSenderId: "13169664321",
	  appId: "1:13169664321:web:485c7bea971d669e7741c0",
	  measurementId: "G-QZKEVYQB3E"
	};
	
	// Initialize Firebase
	firebase.initializeApp(firebaseConfig);
	firebase.analytics();

	var initArduinoTest = '// the setup function runs once when you press reset or power the board\nvoid setup() {\n\n}\n\n// the loop function runs over and over again forever\nvoid loop() {\n\n}\n';

	// Get Firebase Database reference. 
	var firegroupid = readCookie('firegroupid');
	var firepadRef = firebase.database().ref().child(firegroupid);
	
	// Create CodeMirror (with lineWrapping on). 
	var codeMirror = CodeMirror(document.getElementById('firepad-container'), { lineWrapping: true, lineNumbers: true, mode: 'text/x-arduino' }); 
	// Create a random ID to use as our user ID (we must give this to firepad and FirepadUserList).
    var userId = Math.floor(Math.random() * 9999999999).toString();
    
	// Create Firepad (with rich text toolbar and shortcuts enabled). 
	var firepad = Firepad.fromCodeMirror(firepadRef, codeMirror, { 
		richTextShortcuts: false, 
		richTextToolbar: false, 
		defaultText: initArduinoTest,
		userId: userId });
};

$(function() {
	if($('#firepad-container').length != 0) {
		initFirebase();
	}
	
	var connection = new RTCMultiConnection();

	// this line is VERY_important
	connection.socketURL = 'https://rtcmulticonnection.herokuapp.com:443/';
	
	// if you want audio+video conferencing
	connection.session = {
	    audio: true,
	    video: true
	};
	
	connection.openOrJoin(readCookie('firegroupid'));
});