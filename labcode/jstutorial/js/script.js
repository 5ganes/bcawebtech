// alert('Hello World !');
// var check = confirm('Do you really want to delete this item?');
// console.log(check);

// var name = prompt('Enter Your Name : ');
// console.log(name);

function changeTitle(){
	var title = document.getElementById('title');
	title.innerHTML = 'New Title';
	title.style.color = 'red';
}
function myLoad(){
	var title = document.getElementById('title');
	title.addEventListener('click', changeTitle);
}

document.addEventListener('DOMContentLoaded', myLoad);