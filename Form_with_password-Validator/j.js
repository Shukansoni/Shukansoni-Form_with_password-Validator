const validatorText = document.getElementById("validatorText"),
showHide = document.getElementById("showHide");
let a = 1;

const passwordCheck = document.querySelectorAll(".password-check img");
validatorText.focus();

$("#showHide").click(function (e) {
    validatorText.type = validatorText.type === "text" ? "password" : "text";
    e.target.setAttribute("src",e.target.src.includes("hide.png")?"images/show.png":"images/hide.png");
});

const combinations = [
    { regex: /.{8}/, key: 0 },
    { regex: /[A-Z]/, key: 1},
    { regex: /[a-z]/, key: 2},
    { regex: /[0-9]/, key: 3},
    { regex: /[^A-Za-z0-9]/, key: 4},
];
validatorText.addEventListener("keyup", function (e) {
    combinations.forEach((item) => {
        const IsValid = item.regex.test(e.target.value);
        let checkItem = passwordCheck[item.key];
        console.log(checkItem);

        if(IsValid){
            checkItem.src = "images/check.png";
            checkItem.parentElement.style.color = "#06d6a0";
            a = a+1;
        }
        else{
            checkItem.src = "images/close.png";
            checkItem.parentElement.style.color = "#2dcafe";
        }
    });
});