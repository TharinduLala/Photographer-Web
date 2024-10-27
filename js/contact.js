const enquiryForm = document.getElementById("enquiry-form");
enquiryForm.addEventListener('submit',(e)=>{
    e.preventDefault();
    const formData = new FormData(e.target);
    const data = {};
            formData.forEach((value, key) => {
                data[key] = value;
            });
    console.log(data);

    fetch("./php/placeEnquiry.php", {
        "method": "POST",
        "headers": {
            "Content-Type": "application/json; charset=utf-8"
        },
        "body": JSON.stringify(data)
    }).then(function (res) {
        return res.text();

    }).then(function (data) {
        alert(data);
        enquiryForm.reset();
    });

});


  
  
