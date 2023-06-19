let btnLike = document.querySelector(".likeBtn");
let postID = document.querySelector("#pId");

function unlike(IDpost, IDuser){
    axios.get('api/api-unlike-post.php?p=' + IDpost + '&u=' + IDuser).then(response=>{
    });
}

function like(IDpost, IDuser){
    axios.get('api/api-like-post.php?p=' +IDpost + '&u=' + IDuser).then(response=>{
        console.log(response);
    });
}

function likeButtonChanger(IDpost, IDuser){
    console.log("likeButtonChanger: post:" + IDpost + "user: " + IDuser);
    let el = document.getElementById('pLikeID');
    if (el.classList.contains("ai-heart")){
        like(IDpost, IDuser);
        el.classList.replace("ai-heart", "ai-heart-filled");
    } else {
        unlike(IDpost, IDuser);
        el.classList.replace("ai-heart-filled", "ai-heart");
    }
}
