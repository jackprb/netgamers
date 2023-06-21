let btnLike = document.querySelector(".likeBtn");
let postID = document.querySelector("#pId");

function unlike(IDpost, IDuser){
    axios.get('api/api-unlike-post.php?p=' + IDpost + '&u=' + IDuser).then(response=>{});
}

function like(IDpost, IDuser){
    axios.get('api/api-like-post.php?p=' +IDpost + '&u=' + IDuser).then(response=>{});
}

function likeButtonChanger(IDpost, IDuser){
    console.log("likeButtonChanger: post:" + IDpost + "user: " + IDuser);
    let el = document.getElementById('pLikeID');
    if (el.classList.contains("bi-heart")){
        like(IDpost, IDuser);
        el.classList.replace("bi-heart", "bi-heart-fill");
        el.innerHTML = '<path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>';
    } else {
        unlike(IDpost, IDuser);
        el.classList.replace("bi-heart-fill", "bi-heart");
        el.innerHTML = '<path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>';
    }
}
