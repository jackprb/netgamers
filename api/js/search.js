let srcList = document.querySelector("#resultsList");

function createUsersSearchResult(search){
    let result = "";
    if(search.length > 0){
        for(let i=0; i < search.length; i++){
            // struttura della notifica
            let str = `
<<<<<<< HEAD
            <li class="list-group-item">
                <div class="card border-0 overflow-hidden">
                    <div class="row d-flex align-items-center">
                        <div class="col-2 col-sm-2 ms-4 bg-repeat-0">
                            <img src="${getUserImagePath(search[i]['path'])}" class="img-fluid" alt="${search[i]['altText']}" />
                        </div>
                        <div class="col-8 col-sm-8 ">
                            <div class="card-body">
                                <p class="card-text"><a href="profile.php?u=${search[i]['ID']}">${search[i]['username']}</a></p>
                            </div>
                        </div>
                    </div>
=======
            <div class="toast fade show" role="alert" style="margin-bottom: 7%;" aria-live="assertive" aria-atomic="true" data-bs-autohide="false">
                <div class="toast-header ${notifications[i][`type`][0]}">
                    <i class="ai-bell fs-lg me-2"></i>
                    <span class="fw-medium me-auto">${notifications[i][`type`][1]}</span>
                    <button type="button" onclick="readNotification(${notifications[i]['ID']});" class="btn-close btn-close-white ms-2" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="row">
                    <div class="col-sm-5 col-md-4"><img class="userImg d-block rounded-circle mb-2 img-fluid" src = "./upload/userImages/${notifications[i][`path`]}" >
                    </div>
                    <div class="toast-body col-sm-7 col-md-8"><a href="profile.php?u=${notifications[i]['userSrc']}"><strong>${notifications[i]['username']}</strong></a>${notifications[i][`type`][2]}<strong>${notifications[i]['content']}</strong></div>
>>>>>>> 9d4366acf1030b0021b142a6814bdccdd753d90e
                </div>
            </li>`;
            result += str;
        }
    }
    return result;
}

function createPostSearchResult(searchImg, searchNoImg){
    let result = "";
    if(searchImg.length > 0){
        result = `
        <p class="fs-sm">
        With Image:`;
        for(let i=0; i < searchImg.length; i++){
            // struttura della notifica
            let str = `
                <li class="list-group-item">
                    <div class="card border-0 overflow-hidden">
                        <div class="row d-flex align-items-center">
                            <div class="col-2 col-sm-2 ms-4 bg-repeat-0">
                                <img src="${getPostImagePath(searchImg[i]['path'])}" class="img-fluid" alt="${searchImg[i]['altText']}" />
                            </div>
                            <div class="col-8 col-sm-8 ">
                                <div class="card-body">
                                    <p class="card-text"><strong>${searchImg[i]['title']}</strong></p>
                                    <p class="card-text"><a href="profile.php?u=${searchImg[i]['ID']}"></a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>`;
            result += str;
        }
        result += `</p>`;
    }
    if(searchNoImg.length > 0){
        result = `
            <p class="fs-sm">
                With-Out Image:`;
        for(let i=0; i < searchNoImg.length; i++){
            // struttura della notifica
            let str1 = `
                <li class="list-group-item">
                    <div class="card border-0 overflow-hidden">
                        <div class="row d-flex align-items-center">
                            <div class="col-2 col-sm-2 ms-4 bg-repeat-0">
                                <a>Title: ${searchNoImg[i]['title']}</a>
                            </div>
                            <div class="col-8 col-sm-8 ">
                                <div class="card-body">
                                    <p class="card-text"><strong>${searchNoImg[i]['title']}</strong></p>
                                    <p class="card-text"><a href="profile.php?u=${searchNoImg[i]['ID']}"></a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>`;
            result += str1;
        }
        result += `</p>`;
    }
    return result;
}

document.querySelector("#searchBtn").addEventListener("click", function(){
    let searchQuery = document.querySelector("#searchI").innerText;
    let searchTypeRadios = document.getElementsByName("searchType").innerText; 
    let searchType = "";
    for (let i = 0; i < searchTypeRadios.length; i++) {
        if (searchTypeRadios[i].checked){
            searchType = searchTypeRadios[i].value;
        }
    }
    getSearchResult(searchQuery, searchType);
});

function getTypeResult(){
    axios.get('api/api-get-search-type.php').then(response => {
        let typeRes = response.data;
        return typeRes;
    });
}

function getUserImagePath($filename){
    return "./upload/userImages/" + $filename;
}

function getPostImagePath($filename){
    return "./upload/postImages/" + $filename;
}

function getSearchResult(searchQuery){
    
        if(getTypeResult() == 'username'){
            axios.get('api/api-search.php?s='+ searchQuery).then(response => {
                srcList.innerHTML = createUsersSearchResult(response.data); 
            });
        }else{
            let Img;
            let noImg;
            axios.get('api/api-search-noImg.php?s='+ searchQuery).then(response => {
                noImg=response; 
            });
            axios.get('api/api-search.php?s='+ searchQuery).then(response => {
                Img=response; 
            });
            srcList.innerHTML = createPostSearchResult(Img, noImg);
        }
   
}