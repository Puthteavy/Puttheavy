function test() {
    var mytest=document.querySelector('.text');
    var h1=document.querySelector('h1');
    mytest.style.backgroundColor='red';
    h1.style.color='green';

}
function condition_asignOperator(){
    var icecream='chocalate';
    if(icecream==='chocalate'){
        var demo=document.querySelector('.condition');
        demo.textContent='it is chocalate';
    }
    else{
        var demo=document.querySelector('.condition');
        demo.textContent='it not chocalate';
    }
}
function testfuntion(num1,num2){
    var num1,num2;
    var result=num1+num2;
    return result;
}
//event
var x=document.querySelector('html');
x.onclick=function event() {
    alert(testfuntion(3,5));
}


//      changing image
var myImage =document.querySelector('img');
myImage.onclick=function imageChange() {
    var mySrc=myImage.getAttribute('src');
    var img1='images/pc/overview_img01.jpg';
    var img2='images/pc/overview_img02.jpg';

    if(mySrc===img1){
        myImage .setAttribute('src',img1);
    }
    else{
        myImage .setAttribute('src',img2);
    }

}





//The set syntax binds an object property to a function to be called when there is an attempt to set that property.
//The get syntax binds an object property to a function that will be called when that property is looked up.
//in java get use to  returns a value and set use to change value
//The setItem() method of the Storage interface, when passed a key name and value, will add that key to the storage, or update that key's value if it already exists.
//The getItem() method of the Storage interface, when passed a key name, will return that key's value.

var button=document.querySelector('button');
var heading=document.querySelector('h1');

function setUser(){
    var myName=prompt('Please input your name');
    localStorage.setItem('name:',myName);
    heading.textContent='User Name:'+myName;
}

if(!localStorage.getItem('name')) {
    setUser();
} else {
    var storedName = localStorage.getItem('name');
    heading.textContent = 'User Name, ' + storedName;
}

button.onclick = function() {
    setUser();
}



