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

var initWebRTC = function(){
	var connection = new RTCMultiConnection();

	// this line is VERY_important
	connection.socketURL = 'https://rtcmulticonnection.herokuapp.com:443/';
	
	// if you want audio+video conferencing
	connection.session = {
	    audio: true,
	    video: true
	};
	
	connection.sdpConstraints.mandatory = {
	    OfferToReceiveAudio: true,
	    OfferToReceiveVideo: true
	};
	
	videoConstraints = {
        width: {
            ideal: 1280
        },
        height: {
            ideal: 720
        },
        frameRate: 30
    };
    
    connection.mediaConstraints = {
	    video: videoConstraints,
	    audio: true
	};
	
	connection.onstream = function(event) {	    
	    $('#open-or-join-room').hide("slow");
		$('#leave-room').show();
		
		var existing = document.getElementById(event.streamid);
	    if(existing && existing.parentNode) {
	      existing.parentNode.removeChild(existing);
	    }
	    
	    $('#video-container').append( event.mediaElement );
	    
	    if(event.type === 'local') {
	      video.volume = 0;
	      try {
	          video.setAttributeNode(document.createAttribute('muted'));
	      } catch (e) {
	          video.setAttribute('muted', true);
	      }
	    }
	};
	
	$('#leave-room').click(function() {
		$(this).hide("slow");
		$('#open-or-join-room').show();
		
	    // disconnect with all users
	    connection.getAllParticipants().forEach(function(pid) {
        	connection.disconnectWith(pid);
	    });
	
	    // stop all local cameras
	    connection.attachStreams.forEach(function(localStream) {
	        localStream.stop();
	    });
	
	    // close socket.io connection
	    connection.closeSocket();
	});	
	
	// Enable the join video button to connect to the videochat
	$('#open-or-join-room').click(function() {	    
		var firegroupid = readCookie('firegroupid');
	    connection.openOrJoin(firegroupid, function(isRoomExist, roomid, error) {
	        if(error) {
	          this.disabled = false;
	          alert(error);
	        }
	    });
	});	
};

var initFirebase = function(){
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

// Code to copy code to clipboard
var getCodeMirrorJQuery = function(target) {
    var $target = target instanceof jQuery ? target : $(target);
    if ($target.length === 0) {
        throw new Error('Element does not reference a CodeMirror instance.');
    }
    
    if (!$target.hasClass('CodeMirror')) {
    	if ($target.is('textarea')) {
            $target = $target.next('.CodeMirror');
        }
    }

    return $target.get(0).CodeMirror;
};

$(function() {
	if($('#firepad-container').length != 0) {
		initFirebase();
		initWebRTC();
	}
	
	// Enable the copy button to copy text to clipboard
    new Clipboard('.clip-btn-jquery', {
        text: function(trigger) {
            return getCodeMirrorJQuery('.CodeMirror').getDoc().getValue();
        }
    });
});