function generateComments(comments, userID){
    let result = "";
//`text`, `dateTime`, users.username
    for(let i=0; i < comments.length; i++){
        let articolo = `
        <li class="list-group-item">
            <header class="justify-content-start d-flex">
                <h3 class="fs-md">Commented by ${comments[i]["username"]} on ${comments[i]["dateTime"]}</h3>
            </header>
            <section>
                <p>${comments[i]["text"]}</p>
            </section>
            <footer class="justify-content-end d-flex">
                <a href="post.php?p=${comments[i]["postID"]}">Back to the post</a>`;

        if(comments[i]["userID"] == userID){
            articolo += `<a href="#" title="Modify comment" class="nav-item position-relative fs-4 p-2 mx-sm-1">
                <i class="ai-edit"></i>
            </a>`;
        }
        articolo +=`</footer>
        </li>
        `;
        result += articolo;
    }
    return result;
}

function getPostImagePath($filename){
    return "./upload/commentImages/" + $filename;
}

window.addEventListener("load", function(){
    getAllComment();
});

function getAllComment(){
    let p = document.querySelector("#pId").value;
    let userID = document.querySelector("#uId").value;
    axios.get('api/api-get-postComments.php?p='+p).then(response => {
        console.log(response.data);
        const container = document.querySelector("#commentsList");
        const containerCount = document.querySelector("#commentsCount");
        containerCount.innerHTML = "This post has " + response.data.length + " comments";
        container.innerHTML = generateComments(response.data, userID);
    });
}
