<template>
    <div id="mainContainer">
        <div id="mainCrudContainer" class="container-fluid">
            <div class="row ml-5 ">
                <div class="row mt-3">

                    <div class="col-lg-6">
                        <a class="h3" href="/">Сотрудники</a>
                    </div>
                    <div class="col-lg-6">
                        <a href="/addEmployee" class="btn btn-info float-right"><i class="fas fa-user"></i>&nbsp;&nbsp;Добавить</a>
                    </div>

                </div>
            </div>

            <hr class="bg-info"/>
            <br/>

            <div class="alert alert-danger" v-if="errorMsg">
                {{ errorMsg }}
            </div>
            <div class="alert alert-success" v-if="successMsg">
                { successMsg }}
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
                        <tr class="text-center bg-light" v-for="employee in employees_data" :key="employee.id"> 
                            <td>{{ employee.id }}</td>
                            <td>{{ employee.name }}</td>
                            <td>{{ employee.dob }}</td>
                            <td>{{ employee.position }}</td>
                            <td><a :href="/edit/ + employee.id" class="text-success"><i class="fas fa-edit"></i></a></td>
                             <td><a href="#" class="text-danger" @click="showDelModal = true; selectEmployee(employee)"><i class="fas fa-trash"></i></a></td>
                        </tr>
                    </tbody>

                </table>
            </div>
        </div>
                    
        <!-- Удаление сотрудника -->
       <div id="overlay" v-if="showDelModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="model-header">
                        <button type="button" class="close mr-1" @click="showDelModal=false">
                            <span aria-hidden="true">&times;</span>
                        </button>    
                        <h4 class="modal-title ml-4 mt-4">Вы действительно хотите удалить все данные этого сотрудника?</h4>   
                        <h5 class="modal-title ml-4 mt-4">Вы удаляете сотрудника {{ currentEmployee.name }}</h5>                                                                        
                    </div>
                    <div class="modal-body p-4">                                 
                        <div class="form-group">
                            <a :href="/delete/ + currentEmployee.id" class="btn btn-info btn-block btn-lg alert-danger" @click="showDelModal = false">Да</a>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-info btn-block btn-lg alert-success" @click="showDelModal = false;">Нет</button>
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
                currentEmployee: {},
                errorMsg: "",
                successMsg: "",
                showDelModal: false
            }
        },

        props:[
            'employees_data'
        ],

        mounted: function() {

        },      

        methods:{             

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