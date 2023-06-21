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
        btnFollow.innerHTML = `
        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-person-dash text-dark me-2 svg-md" viewBox="0 0 16 16" aria-hidden="true">
            <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7ZM11 12h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1 0-1Zm0-7a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z"/>
            <path d="M8.256 14a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z"/>
        </svg>Unfollow`;
    } else {
        unfollow(IDUser);
        btnFollow.innerHTML = `
        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-person-add text-dark me-2 svg-md" viewBox="0 0 16 16" aria-hidden="true">
            <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Zm-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z"/>
            <path d="M8.256 14a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z"/>
        </svg>Follow`;
    }
}
