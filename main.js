//Get Data

let theContent = document.getElementById("content");

let url ="http://localhost/Direct%20Refresh%20API%20-%20JSON/read.php";

//Get Data Directly after every change : Add - Delete - Update Without Refresh Page 

setInterval(() => {
    fetch(url).then(response => response.json())
    .then(data => getData(data))
    .catch(error => console.log(error));
    
}, 1000);


function getData(data){
    //console.log(data);
    theContent.innerHTML = '';
    data.forEach( element => {
        theContent.innerHTML += '<div class="shadow p-3 mb-5 bg-body rounded mt-4"> <h3 class="title">'+ element.title+'</h3> <p class="description" style="font-size:14px;">'+ element.descrip +'</p></div>'  ;
    });
}


//Add Data
let addUrl ="http://localhost/Direct%20Refresh%20API%20-%20JSON/add.php";
let theForm = document.getElementById("theForm");

theForm.onsubmit = (e) => {
    e.preventDefault();
    let theFormData = new FormData(theForm);
    console.log(theFormData);
     fetch(addUrl,{
    method : 'POST' ,
    body : theFormData,
    }).then( response => response.json())
    .then(data => {
        console.log(data);
        document.getElementById("titleInp").value= " ";
        document.getElementById("descriptionInp").value= " ";
    })
    .catch(error => console.log(error)); 
}

//Delete Data
function deleteItem(idItem){

   /*  fetch(addUrl , {
        method: 'POST',
        body: JSON.stringify({valueId : idItem }),
    }).then(response => response.json())
    .then(data => console.log(data))
    .catch(error => console.log(error)); */
    console.log(idItem);
}


