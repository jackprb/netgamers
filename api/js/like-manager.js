let btnLike = document.querySelector(".likeBtn");
let postID = document.querySelector("#pId");

function unlike(IDpost, IDuser){
    axios.get('api/api-unlike-post.php?p=' + IDpost + '&u=' + IDuser).then(response=>{
    });
}

function like(IDpost, IDuser){
    axios.get('api/api-like-post.php?p=' +IDpost + '&u=' + IDuser).then(response=>{
    });
}

function likeButtonChanger(IDpost, IDuser){
    console.log("likeButtonChanger: post:" + IDpost + "user: " + IDuser);
    if (btnLike.classList.contains("likeBtn")){
        like(IDpost, IDuser);
        btnLike.classList.remove("likeBtn");
        btnLike.classList.add("unlikeBtn");
        btnLike.children[0].classList.replace("ai-heart", "ai-heart-filled");
    } else {
        unlike(IDpost, IDuser);
        btnLike.classList.remove("unlikeBtn");
        btnLike.classList.add("likeBtn");
        btnLike.children[0].classList.replace("ai-heart-filled", "ai-heart");
    }
}
