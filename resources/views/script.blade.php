<script src="https://unpkg.com/axios@1.1.2/dist/axios.min.js"></script>
<script type="module">
    import { initializeApp } from "https://www.gstatic.com/firebasejs/9.18.0/firebase-app.js";
    import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.18.0/firebase-analytics.js";
    import { getDatabase, ref, onValue, onDisconnect, serverTimestamp, onChildAdded, onChildChanged, onChildRemoved } from "https://www.gstatic.com/firebasejs/9.18.0/firebase-database.js";
    const firebaseConfig = {
        apiKey: "AIzaSyDoHBDVIZd2Wc5JslPKhVBpKiElgv9LYGs",
        authDomain: "u-ad-336609.firebaseapp.com",
        databaseURL: "https://u-ad-336609-default-rtdb.firebaseio.com",
        projectId: "u-ad-336609",
        storageBucket: "u-ad-336609.appspot.com",
        messagingSenderId: "147742148293",
        appId: "1:147742148293:web:26f55bdf178f97cacb52ac",
        measurementId: "G-44FWZ7PL0E"
    };

    let users = [];
    let countAdf = [];
    let countInf = [];

    // Initialize Firebase
    const app = initializeApp(firebaseConfig);
    const analytics = getAnalytics(app);
    const db = getDatabase(app);
    const dbRef = ref(db, 'Chat');
    
    onValue(dbRef, (snapshot) => {
        snapshot.forEach((childSnapshot) => {
            const childKey = childSnapshot.key;
            const childData = childSnapshot.val();
        });
    }, {
        onlyOnce: true
    });

    const dbRefAdv = ref(db, 'Chat/Adf');
    onValue(dbRefAdv, (snapshot) => {
        let keys = Object.keys(snapshot);
        $.each(Object.keys(snapshot.val()), function (k,v){
            let newUser = v.replace("User","");
            users.push(newUser);
        });
        console.log(Object.keys(snapshot));
    }, {
        onlyOnce: true
    });

    const dbRefInf = ref(db, 'Chat/Inf');
    onValue(dbRefInf, (snapshot) => {
        $.each(Object.keys(snapshot.val()), function (k,v){
            let newUser = v.replace("User","");
            users.push(newUser);
        });
        let InfList = Object.values(snapshot.val());
        // for(let i=0;i<InfList.length;i++){
        //     console.log(InfList[i]);
        //     if(InfList[i]["clientName"] !== ''){
        //         let newUser = Object.values(InfList[0])[0];
        //         // newUser["Role"] = "Inf";
        //         // console.log(Object.values(InfList[0])[0]);
        //         // users.push(newUser);
        //     }
        // }
    }, {
        onlyOnce: true
    });


    console.log('users List');
    console.log(users);
    let storage =localStorage.setItem('users',users);
    let userHtml = '';

    $.each(users, function (key,val){
        userHtml += '<li>' + val+ '</li>'
    });


    $('#listUsers').append(userHtml);

    //  new Vue({
    //     el: '#app',
    //     data: {
    //         msg: 'Hello Vue!',
    //         data: [],
    //     },
    //      created(){
    //         this.generate();
    //      },
    //      methods: {
    //          generate() {
    //              this.codes.unshift(data);
    //          },
    //      },
    // });
</script>
