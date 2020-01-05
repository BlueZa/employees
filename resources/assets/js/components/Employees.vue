<template>
    <div id="mainContainer">                            
        <div id="mainCrudContainer" class="container-fluid">
            <div class="row ml-5 ">
                <div class="row mt-3">
                    <div class="col-lg-6">
                        <h3>Сотрудники</h3>
                    </div>
                                        
                    <div class="col-lg-6">
                        <button class="btn btn-info float-right" @click="showAddModal = true">
                            <i class="fas fa-user"></i>&nbsp;&nbsp; Добавить
                        </button>
                    </div>
                </div>
            </div>

            <hr class="bg-info"/>
            <br/>

            <div class="alert alert-danger" v-if="errorMsg">
                {{ errorMsg }}
            </div>

            <div class="alert alert-success" v-if="successMsg">
                {{ successMsg }}
            </div>
        </div>                     
                            

        <!-- Таблица -->
        <div class="row">
            <div class="col-lg-12">
                <table class="table table-bordered tablep-stripted">
                    <thead>
                        <tr class="text-center bg-info text-light">
                            <th>ID</th>
                            <th>Имя</th>
                            <th>Дата рождения</th>
                            <th>Должность</th>
                            <th>Изменить</th>
                            <th>Удалить</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr class="text-center bg-light" v-for="employee in employees" :key="employee.id"> 
                            <td>{{ employee.id }}</td>
                            <td>{{ employee.name }}</td>
                            <td>{{ employee.dob }}</td>
                            <td>{{ employee.position }}</td>
                            <td><a href="#anchor" class="text-success" @click="showEditModal = true; selectEmployee(employee)"><i class="fas fa-edit"></i></a></td>
                            <td><a href="#anchor" class="text-danger" @click="showDelModal = true; selectEmployee(employee)"><i class="fas fa-trash"></i></a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Добавление нового сотрудника -->
        <div id="overlay" v-if="showAddModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="model-header">
                        <button type="button" class="close mr" @click="showAddModal=false">
                            <span aria-hidden="true">&times;</span>
                        </button>   
                        <h5 class="modal-title">Добавить данные сотрудника</h5> 
                    </div>

                    <div class="modal-body">                                                                                   
                        <div class="form-group">
                            <input type="text" name="name" v-model="newEmployee.name" class="form-control form-control-lg" placeholder="Имя">
                        </div>
                        <div class="form-group">
                            <input type="text" name="dob" v-model="newEmployee.dob" class="form-control form-control-lg" placeholder="Дата рождения">
                        </div>
                        <div class="form-group">
                            <input type="text" name="position" v-model="newEmployee.position" class="form-control form-control-lg" placeholder="Должность">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-info btn-block btn-lg" @click="showAddModal=false; addEmployee();" >Добавить</button>
                        </div>                                       
                    </div>
                </div>
            </div>
        </div>

        <!-- Изменение сотрудника -->
        <div id="overlay" v-if="showEditModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="model-header">
                        <button type="button" class="close mr" @click="showEditModal=false">
                            <span aria-hidden="true">&times;</span>
                        </button>  
                        <h5 class="modal-title">Изменение данных сотрудника</h5>                                                                           
                    </div>
                    <div class="modal-body p">
                        <div class="form-group">
                            <input type="text" name="name" class="form-control form-control-lg" v-model="currentEmployee.name">                                            
                            <div class="form-group">
                                <input type="text" name="dob" class="form-control form-control-lg" v-model="currentEmployee.dob">
                            </div>
                            <div class="form-group">
                                <input type="text" name="position" class="form-control form-control-lg" v-model="currentEmployee.position">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-info btn-block btn-lg" @click="showEditModal=false; updateEmployee();">Изменить</button>
                            </div>                    
                        </div>           
                    </div>
                </div>
            </div>
        </div>

        <!-- Удаление сотрудника -->
        <div id="overlay" v-if="showDelModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="model-header">
                        <button type="button" class="close mr" @click="showDelModal=false">
                            <span aria-hidden="true">&times;</span>
                        </button>    
                        <h4 class="modal-title mt">Вы действительно хотите удалить все данные этого сотрудника?</h4>   
                        <h5 class="modal-title mt">Вы удаляете сотрудника {{ currentEmployee.name }}</h5>                                                                        
                        
                        <div class="modal-body p">
                            <div class="form-group">
                                <button class="btn btn-info btn-block btn-lg alert-danger" @click="showDelModal = false; deleteEmployee();">Да</button>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-info btn-block btn-lg alert-success" @click="showDelModal = false;">Нет</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 

    </div>
</template>

<script>
    export default{
        data() {
            return{
                employees: [],
                newEmployee: {
                    id: "", 
                    name: "",
                    dob: "",
                    position: ""
                },
                currentEmployee: {},
                errorMsg: "",
                successMsg: "",
                showAddModal: false,
                showEditModal: false,
                showDelModal: false,
            }
        },

        mounted: function() {
            this.getAllEmployees();
        },      

        methods:{            

            getAllEmployees(){
                axios.get("http://94.243.5.215/process.php?action=read").then(response => {
                    if(response.data.error){
                        this.errorMsg = response.data.message;
                    }else{
                        this.employees = response.data.employees;
                    }
                });
            },

            addEmployee(){
                var FormData = this.toFormData(this.newEmployee);

                axios.post("http://94.243.5.215/process.php?action=create", FormData).then(response => {
                    
                    this.newEmployee = { name: "", dob: "", position: "" };

                    if(response.data.error){
                        this.errorMsg = response.data.message;
                    }else{
                        this.successMsg = response.data.message;
                        this.getAllEmployees();
                    }
                });

            },

            updateEmployee(){
                var FormData = this.toFormData(this.currentEmployee);

                axios.post("http:/94.243.5.215/process.php?action=update", FormData).then(response => {
                    
                    this.currentEmployee = { };

                    if(response.data.error){
                        this.errorMsg = response.data.message;
                    }else{
                        this.successMsg = response.data.message;
                        this.getAllEmployees();
                    }
                });

            },

            deleteEmployee(){
                var FormData = this.toFormData(this.currentEmployee);

                axios.post("http://94.243.5.215/process.php?action=delete", FormData).then(response => {
                    
                    this.currentEmployee = { };

                    if(response.data.error){
                        this.errorMsg = response.data.message;
                    }else{
                        this.successMsg = response.data.message;
                        this.getAllEmployees();
                    }
                });

            },

            toFormData(obj){
                var fd = new FormData();
                for(var i in obj){
                    fd.append(i, obj[i]);
                }
                return fd;
            },

            selectEmployee(employee){
                this.currentEmployee = employee;
            },
        },
    }

</script>

<style>

#overlay{
    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    background: rgba(0, 0, 0, 0.6);
}

</style>