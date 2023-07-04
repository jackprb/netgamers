let srcList = document.querySelector("#resultsList");
let searchQuery = "";
let searchType = "";
document.addEventListener("keypress", handleKeyPress); // to search when enter is pressed

function updateSearchData(){
    searchQuery = document.getElementById("searchI").value;
    let searchTypeRadios = document.getElementsByName("searchType");
    for (let i = 0; i < searchTypeRadios.length; i++) {
        if (searchTypeRadios[i].checked){
            searchType = searchTypeRadios[i].value;
        }
    }
    getSearchResult();
}

function handleKeyPress(event){
    if(event.keyCode === 13){
        updateSearchData();
    }
}

function createUsersSearchResult(search){
    let result = "";
    if(search.length > 0){
        for(let i=0; i < search.length; i++){
            // struttura della notifica
            let str = `
            <li class="list-group-item">
                <div class="card border-0 overflow-hidden">
                    <div class="row d-flex align-items-center">
                        <div class="col-2 col-sm-2 ms-4 bg-repeat-0">
                            <a href="profile.php?u=${search[i]['ID']}"><img src="${getUserImagePath(search[i]['path'])}" class="img-fluid userImg rounded-circle" alt="${search[i]['altText']}" /></a>
                        </div>
                        <div class="col-8 col-sm-8 ">
                            <div class="card-body">
                                <p class="card-text"><a href="profile.php?u=${search[i]['ID']}">${search[i]['username']}</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>`;
            result += str;
        }
    } else {
        let str = `
        <li class="list-group-item">
            <div class="card border-0 overflow-hidden">
                <div class="card-body">
                    <p class="card-text text-center">There are no users with this username '${searchQuery}'.</p>
                </div>
            </div>
        </li>`;
        result += str;
    }
    return result;
}

function createPostSearchResult(searchImg, searchNoImg){
    let result = "";
    console.log(searchImg);
    if(searchImg.length > 0){
        for(let i=0; i < searchImg.length; i++){
            // struttura della notifica
            let str = `
                <li class="list-group-item">
                    <div class="card border-0 overflow-hidden">
                        <div class="row d-flex align-items-center">
                            <div class="col-2 col-sm-2 ms-4 bg-repeat-0">
                                <a href="post.php?p=${searchImg[i]['ID']}"><img src="${getPostImagePath(searchImg[i]['path'])}" class="img-fluid" alt="${searchImg[i]['altText']}" /></a>
                            </div>
                            <div class="col-8 col-sm-8 ">
                                <div class="card-body">
                                <a href="post.php?p=${searchImg[i]['ID']}"><p class="card-text"><strong>${searchImg[i]['title']}</strong></p></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>`;
            result += str;
        }
    } 
    if(searchNoImg.length > 0){
        for(let i=0; i < searchNoImg.length; i++){
            // struttura della notifica
            let str1 = `
                <li class="list-group-item">
                    <div class="card border-0 overflow-hidden">
                        <div class="row d-flex align-items-center">
                            <div class="col-2 col-sm-2 ms-4 bg-repeat-0">
                                <a href="post.php?p=${searchNoImg[i]['ID']}">Title: ${searchNoImg[i]['title']}</a>
                            </div>
                            <div class="col-8 col-sm-8 ">
                                <div class="card-body">
                                    <a href="post.php?p=${searchNoImg[i]['ID']}"><p class="card-text"><strong>${searchNoImg[i]['text']}</strong></p></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>`;
            result += str1;
        }
    }
    if (searchNoImg.length == 0 && searchImg.length == 0){
        let str = `
        <li class="list-group-item">
            <div class="card border-0 overflow-hidden">
                <div class="card-body">
                    <p class="card-text text-center">There are no posts that match your search criteria.</p>
                </div>
            </div>
        </li>`;
        result = str;
    }
    return result;
}

function getUserImagePath(filename){
    return "./upload/userImages/" + filename;
}

function getPostImagePath(filename){
    return "./upload/postImages/" + filename;
}

function emptySearchResult(){
    return `
    <li class="list-group-item text-center">
        <div class="card border-0 overflow-hidden">
            <div class="card-body">
                <p class="card-text text-center">Type something in the search bar...</p>
            </div>
        </div>
    </li>`;
}

function getSearchResult(){
    console.log(searchQuery);
    if(searchQuery.length > 0){
        if(searchType == 'username'){
            axios.get('api/api-search.php?searchI='+ searchQuery + '&searchType=' + searchType).then(response => {
                srcList.innerHTML = createUsersSearchResult(response.data); 
            });
        }else{
            let Img = [];
            let noImg = [];
            axios.get('api/api-search-noImg.php?searchI='+ searchQuery + '&searchType=' + searchType).then(response => {
                noImg=response.data;
                axios.get('api/api-search.php?searchI='+ searchQuery + '&searchType=' + searchType).then(response => {
                    Img=response.data; 
                    console.log(Img);
                    srcList.innerHTML = createPostSearchResult(Img, noImg);
                }); 
            });
        }
    } else {
        srcList.innerHTML = emptySearchResult();
    }
}