function createSearchResult(notifications){
    let result = "";
    if(notifications.length > 0){
        for(let i=0; i < notifications.length; i++){
            // struttura della notifica
            let str = `
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
                </div>
            </div>`;
            result += str;
        }
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

function getSearchResult(searchQuery, searchType){
    axios.get('api/api-search.php?searchI='+ searchQuery + "&searchType=" + searchType).then(response => {
        console.log(response);
    });
}