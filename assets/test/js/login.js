var app = new Vue({
    el: "#app",
    data: {
        errorMsg: "",
        successMsg: "",
        items: {},
        info: {testid: "", fio: ""}
    },
    mounted(){
        this.getAllTest();
    },
    methods:{
        getAllTest(){
            axios
            .get("http://test/test/controllers/loginController.php?action=alltest")
            .then(function(response){
                    app.items = response.data.tests;
            })
            .catch(error => console.log(error));
        },

        registerUser(){
            var formData = app.toFormData(app.info);
            axios
            .post("http://test/test/controllers/loginController.php?action=gotest", formData)
            .then(function(response){
                if(response.data.error){
                    app.errorMsg = response.data.message;
                } else {
                    app.errorMsg = "";
                    app.successMsg = response.data.message;
                    location.href = "http://test/test/test.php?test="+app.info.testid;
                }
            })
            .catch(error => console.log(error));
        },

        toFormData(obj){
            var fd = new FormData();
            for (var i in obj) {
                fd.append(i, obj[i]);
            }
            return fd;
        }

    }
});