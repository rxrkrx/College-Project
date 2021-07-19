var response;
function myFun() {
    
    const xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
             response = this.responseText;
             console.log(response);
             return response;
        }
    }

    xhttp.open("GET","includes/getData.php",true);
    xhttp.send();
    return response;
}


function counter() {
    let count = 0,val;
    const card = document.getElementsByClassName("count");
    const card1 = document.getElementsByClassName("count")[0];
    const card2 = document.getElementsByClassName("count")[1];
    const card3 = document.getElementsByClassName("count")[2];
    const myData = myFun();
    const realData = JSON.parse(myData);
    const student = realData.student;
    const teacher = realData.teacher;
    const courses = realData.courses;
    

    console.log(realData);

    setInterval(function(){
            // if (student>=count1) {
            //     val = ++count1;
            //     console.log(val);     
            // }
    },100);

    // console.log(card1);
    // console.log(card2);
    // console.log(card3);
}

counter();

// let elements = document.getElementsByClassName("count");
// for (let i = 0; i < element.length; i++) {
//     // console.log(element[i]);
//     element[i].addEventListener("scroll",counter); 
// }

// console.log(elements);
