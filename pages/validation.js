// function validate(){
//     let form = document.getElementById("register_form");
//     let status = false;
//     console.log(form);
//     // document.writeln(name);
//     if(status === true)
//     {
//         form.submit();
//     }
// }

function validate(){
    let status = false;
    let name = document.getElementById("floatingName").value;
    let p1 = document.getElementsByClassName("in1")[0];
    let email = document.getElementById("email_id").value;
    let p2 = document.getElementsByClassName("in2")[1];
    console.log(name);
    if(!name){
        console.log("dhiraj sharma");
        p1.innerHTML= "** FIELD SHOULD NOT BE EMPTY **";
        p1.style.color ="red";
        status = false;
        return status;
    }
    else if(name.length < 3){
        p1.innerHTML= "** NAME IS TOO SHORT **";
        p1.style.color ="red";
        status = false;
        return status;
    }
    else{
        status = true;
    }

    if(!email){
        p2.innerHTML = "** FIELD SHOULD NOT BE EMPTY **";
        p2.style.color ="red";
        status = false;
        return status;
    }
    else{
        status = true;
        return status
    }
    return status;
}