<script src="https://www.gstatic.com/firebasejs/9.22.2/firebase-app.js"></script>

<script src="https://www.gstatic.com/firebasejs/9.22.2/firebase-database.js"></script>





<script type="module">
  // Import the functions you need from the SDKs you need
  import { initializeApp } from "https://www.gstatic.com/firebasejs/9.22.2/firebase-app.js";
  // TODO: Add SDKs for Firebase products that you want to use
  // https://firebase.google.com/docs/web/setup#available-libraries

  // Your web app's Firebase configuration
  const firebaseConfig = {
    apiKey: "AIzaSyAeO3eelUWnmhODcGjejqlswKbp-Csf2d0",
    authDomain: "donutplanet-fdf18.firebaseapp.com",
    projectId: "donutplanet-fdf18",
    storageBucket: "donutplanet-fdf18.appspot.com",
    messagingSenderId: "939338703161",
    appId: "1:939338703161:web:d3dfbd8e9d0ea843f008e8"
  };

  // Initialize Firebase
  const app = initializeApp(firebaseConfig);
  
  var myName = prompt("Enter your name");

  function sendMessage() {
    var message = document.getElementById("messaage").value;
    firebase.database().ref("messages").push().set({
        "sender": myName,
        "message": message
    });
    return false;
  }

  firebase.database().ref("messages").on("child_added", function (snapshot) {
    var html = "";
    html += "<li>";
      html += snapshot.val().sender + ": " + snapshot.val().message;
    html += "</li>";

    document.getElementById("messages").innerHTML += html;
  })
</script>

<form onsubmit="return sendMessage();">
    <input id="messaage" placeholder="Enter message" autocomplete="off">

    <input type="submit">
</form>

<ul id="messages"></ul>