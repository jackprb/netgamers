let srcList = document.querySelector("#resultsList");

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
                            <img src="${getUserImagePath(search[i]['path'])}" class="img-fluid" alt="${search[i]['altText']}" />
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
    }
    return result;
}

function createPostSearchResult(searchImg, searchNoImg){
    let result = "";
    console.log(searchImg);
    if(searchImg.length > 0){
        result = `
        <p class="fs-sm">
        With Image:
        <ul>`;
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
        result += `</ul>
        </p>`;
    }
    if(searchNoImg.length > 0){
        result += `
            <p class="fs-sm">
                With-Out Image:
                <ul>`;
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
                                    <p class="card-text"><strong>${searchNoImg[i]['text']}</strong></p>
                                    <p class="card-text"><a href="profile.php?u=${searchNoImg[i]['ID']}"></a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>`;
            result += str1;
        }
        result += `</ul>
        </p>`;
    }
    return result;
}

document.querySelector("#searchBtn").addEventListener("click", function(){
    let searchQuery = document.getElementById("searchI").value;
    let searchTypeRadios = document.getElementsByName("searchType"); 
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

function getUserImagePath(filename){
    return "./upload/userImages/" + filename;
}

function getPostImagePath(filename){
    return "./upload/postImages/" + filename;
}

function getSearchResult(searchQuery, searchType){
    
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
   
}