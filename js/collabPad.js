$(function() {
	// Initialize Firebase. 
	// Your web app's Firebase configuration
	// For Firebase JS SDK v7.20.0 and later, measurementId is optional
	var firebaseConfig = {
	  apiKey: "AIzaSyAJEOaUYtHX4KsUUnsrUcmpk2ao3JTkKLY",
	  authDomain: "embedded-development.firebaseapp.com",
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

	// Get Firebase Database reference. 
	var firepadRef = firebase.database().ref(); 
	// Create CodeMirror (with lineWrapping on). 
	var codeMirror = CodeMirror(document.getElementById('firepad-container'), { lineWrapping: true }); 
	// Create Firepad (with rich text toolbar and shortcuts enabled). 
	var firepad = Firepad.fromCodeMirror(firepadRef, codeMirror, { richTextShortcuts: true, richTextToolbar: true, defaultText: 'Hello, World!' });
});