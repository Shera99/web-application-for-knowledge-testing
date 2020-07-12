var app = new Vue({
    el: "#app",
    data: {
        errorMsg: "",
        successMsg: "",
        userInfo: {login: "", password: ""}
    },
    methods: {
        auth(){
            var formData = app.formData(app.userInfo);
            axios
            .post("http://test/admin/auth", formData)
            .then(function(response){
                if (response.data.error) {
                    app.errorMsg = response.data.message;
                    app.userInfo.password = "";
                } else {
                    app.successMsg = response.data.message;
                    location.href = 'http://test/admin/cabinet';
                }
            })
            .catch(error => console.log(error));
        },
        formData(obj){
           var fd = new FormData();
           for (var i in obj) {
               fd.append(i, obj[i]);
           } 
           return fd;
        }
    }
})