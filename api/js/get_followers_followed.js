let followerCountLbl = document.querySelectorAll(".followerCount");
let followedCountLbl = document.querySelectorAll(".followedCount");
let followerList = document.querySelector("#followerList");
let followedList = document.querySelector("#followedList");
let userID = document.querySelector("#userID").value;

function getUserImagePath($filename){
    return "./upload/userImages/" + $filename;
}

function getCount(usersList){
    return Reflect.ownKeys(usersList).length;
}

function createList(usersList){
    let usernameList = Reflect.ownKeys(usersList);
    let result = "";
    if(Reflect.ownKeys(usersList).length > 0){
        usernameList.forEach(element => {
            let str = `
            <li class="list-group-item">
                <div class="card border-0 overflow-hidden">
                    <div class="row d-flex align-items-center">
                        <div class="col-2 col-sm-2 ms-4 bg-repeat-0">
                            <img src="${getUserImagePath(usersList[element]['path'])}" class="img-fluid rounded-circle" alt="${usersList[element]['altText']}" />
                        </div>
                        <div class="col-8 col-sm-8 ">
                            <div class="card-body">
                                <p class="card-text"><a href="profile.php?u=${usersList[element]['id']}">${element}</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>`;
            result += str;
        });
    }
    return result;
}

function update(){
    getFollowed();
    getFollowers();
}

window.addEventListener("load", function () {
    if(userID != null){
        update();
    }
    setInterval(function(){ 
        update(); 
    }, 10000); // fetch new notifications every 10 seconds.  
});

function getFollowed(){
    axios.get('api/api-get-followedList.php?u='+userID).then(response => {
        const res = response.data;
        if(response.data.length == 0){
            followedCountLbl.forEach(element => {
                element.innerHTML = '0';
            });
            followedList.innerHTML = "";
        }else{
            followedCountLbl.forEach(element => {
                element.innerHTML =  getCount(response.data);
            }); 
            followedList.innerHTML = createList(response.data);
        }
    });
}

function getFollowers(){
    axios.get('api/api-get-followersList.php?u='+userID).then(response => {
        const res = response.data;
        if(response.data.length == 0){
            followerCountLbl.forEach(element => {
                element.innerHTML = '0';
            });
            followerList.innerHTML = "";
        }else{
            followerCountLbl.forEach(element => {
                element.innerHTML =  getCount(response.data);
            });
            followerList.innerHTML = createList(response.data);
        }
    });
}