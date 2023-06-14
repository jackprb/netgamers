let btnFollow = document.querySelector("#followButton");
let currUserID = document.querySelector("#userID");

if(btnFollow != null){
    btnFollow.addEventListener("click", function(){
        if(currUserID != null){
            textButtonChanger(currUserID.value);
        }
    });
}

function unfollow(IDUser){
    axios.get('api/api-unfollow.php?u=' +IDUser).then(response=>{
        getFollowers();
        getFollowed(); 
    });
}

function follow(IDUser){
    axios.get('api/api-follow.php?u='+IDUser).then(response=>{
        getFollowers();
        getFollowed(); 
    });
}

function textButtonChanger(IDUser){
    if (btnFollow.innerText === 'Follow') {
        follow(IDUser);
        btnFollow.innerHTML = '<i class="ai-user-minus ms-n1 me-2"></i>Unfollow';
    } else {
        unfollow(IDUser);
        btnFollow.innerHTML = '<i class="ai-user-plus ms-n1 me-2"></i>Follow';
    }
}
