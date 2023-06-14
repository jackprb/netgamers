let followerCountLbl = document.querySelectorAll(".followerCount");
let followedCountLbl = document.querySelectorAll(".followedCount");
let followerList = document.querySelector("#followerList");
let followedList = document.querySelector("#followedList");
let userID = document.querySelector("#userID").value;

function getUserImagePath($filename){
    return "./upload/userImages/" + $filename;
}

function createList(usersList){
    let result = "";
    if(usersList.length > 0){
        for(let i=0; i < usersList.length; i++){
            // struttura della notifica
            let str = `
            <li class="list-group-item">
                <div class="card border-0 overflow-hidden">
                    <div class="row d-flex align-items-center">
                        <div class="col-2 col-sm-2 ms-4 bg-repeat-0">
                            <img src="${getUserImagePath(usersList[i]['path'])}" class="img-fluid" alt="${usersList[i]['altText']}" />
                        </div>
                        <div class="col-8 col-sm-8 ">
                            <div class="card-body">
                                <p class="card-text"><a href="profile.php?u=${usersList[i]['id']}">${usersList[i]}</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>`;
            result += str;
        }
    }
    return result;
}

function update(){
    getFollowed();
    getFollowers();
}

window.addEventListener("load", function () {
    if(userID != null){
        getFollowers(); // fetch list of followers on page load
        getFollowed();  // fetch list of followed on page load
    }
});

function getFollowed(){
    axios.get('api/api-get-followedList.php?u='+userID).then(response => {
        console.log(response.data);
        const res = response.data;
        followedList.innerHTML = createList(response.data);
    });
}

function getFollowers(){
    axios.get('api/api-get-followersList.php?u='+userID).then(response => {
        console.log(response.data);
        const res = response.data;
        followerList.innerHTML = createList(response.data);
    });
}