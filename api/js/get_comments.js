let cArr = [];

function generateComments(comments, userID, commLike){
    let result = "";
//`text`, `dateTime`, users.username
    for(let i=0; i < comments.length; i++){
        let articolo = `
        <li class="list-group-item">
            <header class="d-flex justify-content-start">
                <h5 class="fs-md">Commented by ${comments[i]["username"]} on ${comments[i]["dateTime"]}</h5>
            </header>
            <section>
                <p>${comments[i]["text"]}</p>
            </section>

            <footer class="d-flex justify-content-end">
                <div class="fs-lg align-self-center p-2">
                    <a href="#top">Back to the post</a>
                </div>`;

        if(comments[i]["userID"] == userID){
            articolo += `
                <div class="fs-4 p-2">
                    <a class="d-block" href="modifycomment.php?c=${comments[i]["ID"]}&p=${comments[i]["postID"]}" title="Modify comment">
                        <i class="ai-edit"></i>
                    </a>
                </div>`;
        }
        articolo +=`<div class="fs-4 p-2">
                    <a title="Like" class="nav-item text-danger position-relative"
                    onclick="likeButtonCommChanger(${comments[i]["ID"]}, ${userID});">`;
        let r = false;
        for(let j=0; j < commLike.length; j++){
            if(commLike[j]["commentID"] == comments[i]["ID"]){
                articolo +=`<i class="ai-heart-filled" id="${comments[i]["ID"]}"></i>`;
                r = true;
            }
        }
        if(!r){
            articolo +=`<i class="ai-heart" id="${comments[i]["ID"]}"></i>`;
        }
        articolo +=`</a>
                    </div>
                </footer>
            </li>`;
        result += articolo;
    }
    return result;
}

function likeButtonCommChanger(IDcomment, IDuser){
    console.log("likeButtonChanger: comment: " + IDcomment + "user: " + IDuser);
    let el = document.getElementById(IDcomment);
    if (el.classList.contains("ai-heart")){
        axios.get('api/api-like-comment.php?c=' + IDcomment + '&u=' + IDuser).then(response=>{});
        el.classList.replace("ai-heart", "ai-heart-filled");
    } else {
        axios.get('api/api-unlike-comment.php?c=' + IDcomment + '&u=' + IDuser).then(response=>{});
        el.classList.replace("ai-heart-filled", "ai-heart");
    }
}

function getPostImagePath($filename){
    return "./upload/commentImages/" + $filename;
}

window.addEventListener("load", function(){
    getAllComment();
    setInterval(function(){ 
        getAllComment(); 
    }, 10000); // fetch new notifications every 10 seconds. 
});

function getAllComment(){
    let p = document.querySelector("#pId").value;
    let userID = document.querySelector("#uId").value;
    axios.get('api/api-get-postComments.php?p='+p).then(response => {
        const comm = response.data;
        const container = document.querySelector("#commentsList");
        const containerCount = document.querySelector("#commentsCount");
        containerCount.innerHTML = "This post has " + comm.length + " comments";
        axios.get('api/api-get-comlike-set.php?p='+ p+ '&u=' + userID).then(response1 => {
            container.innerHTML = generateComments(comm, userID, response1.data);
        });
        
    });
}
