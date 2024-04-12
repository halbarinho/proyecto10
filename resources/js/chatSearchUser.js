import { list } from "postcss";

//Manejo campo busqueda usuarios
const userSearch = document.getElementById('userSearch');
const usersList = document.getElementById('usersList');
const usersNumber = document.getElementById('usersNumber');

window.onload=function(){

userSearch.addEventListener('input',(event)=>{
    const query = userSearch.value.trim();
    console.log('Valor: ',query);

    if(query.length>0){
        searchUser(query);
    }
    else{
        clearSearchResults();
    }
});
};


function searchUser(query){

    axios.get(`/search/users?q=${query}`)
    .then(response => {
        const users = response.data.users;
        displaySearchResults(users);
    })
    .catch(error => {
        console.error('Error en la consulta:', error);
    });
}


function displaySearchResults(users){
    usersList.innerHTML='';

    let listContent = '';

    users.forEach(user=>{

        listContent+=`<a href="/chat/with/${user.id}">
        <button class="flex flex-row items-center p-2 hover:bg-gray-100 rounded-xl">
            <div
                class="flex items-center justify-center w-8 h-8 bg-indigo-200 rounded-full">
                ${user.name.substring(0,1).toUpperCase()}
            </div>
            <div class="ml-2 text-sm font-semibold">${user.name}</div>
        </button>
    </a>`;



    });
    usersNumber.innerHTML=users.length;
    usersList.innerHTML=listContent;


    // console.log(listContent);
}


function clearSearchResults(){
    usersList.innerHTML='';
}
