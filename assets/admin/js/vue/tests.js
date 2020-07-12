var appTest = new Vue({
    el: "#app",
    data: {
        showEdit: false,
        arrTests: [],
        arrNewTest: {
            testName: "", 
            countQuesTest: "", 
            countPointTest: "",
            timeTest: "",
            dateStartTest: "",
            dateEndTest: "",
        },
        arrUpdateTest: {
            testId: "",
            testName: "", 
            countQuesTest: "", 
            countPointTest: "",
            timeTest: "",
            dateStartTest: "",
            dateEndTest: "",
        }
    },
    mounted(){
        this.getTestAll();
    },
    methods: {
        getTestAll(){
            axios
            .get("http://test/admin/controllers/cabinet/getAllTests")
            .then(function(response){
                if (response.data.error) { 
                    alert("Ошибка!!!");
                } else {
                    appTest.arrTests = response.data.testAll;
                }
            })
            .catch(error => console.log(error));
        },

        setNewTest(){
            var data = appTest.formData(appTest.arrNewTest);
            axios
            .post("http://test/admin/controllers/cabinet/setNewTest", data)
            .then(function(response){
                if (response.data.error) alert(response.data.message);
                else {
                    appTest.getTestAll();
                    appTest.arrNewTest.testName = "";
                    appTest.arrNewTest.countQuesTest = "";
                    appTest.arrNewTest.countPointTest = "";
                    appTest.arrNewTest.timeTest = "";
                    appTest.arrNewTest.dateStartTest = "";
                    appTest.arrNewTest.dateEndTest = "";
                } 
            })
            .catch(error => console.log(error));
        },

        showEditForm(id){
            for (var i in appTest.arrTests) {
                if (appTest.arrTests[i].id == id) {
                    appTest.arrUpdateTest = appTest.arrTests[i];
                } 
            }
            appTest.showEdit = true;
        },

        formData(obj){
            var fd = new FormData();
            for (var i in obj) {
                fd.append(i, obj[i]);
            }
            return fd;
        }
    }
});