<!DOCTYPE html>
<html lang="en">
    <head>     
        <title>CRUD приложение с использованием Laravel, Vue, PHP, PostgreeSql</title> 
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">              
    </head>

    <body>
        <!-- Добавление нового сотрудника -->
        <div id="overlay" v-if="showAddModal">  
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="model-header">                                          
                        <a href="/" class="btn btn-info btn-block alert-danger btn-lg">Отменить добавление сотрудника</a>   
                        <h4 class="modal-title ml-4 mt-4">Добавление сотрудника</h4> 
                        <h5 class="modal-title ml-4 mt-4">Введите данные сотрудника ниже</h5> 
                    </div>
                    <div class="modal-body p-4">
                        <form action="/insert" method="POST">  
                        {{ csrf_field() }}                                                                           
                            <div class="form-group">
                                <input type="text" name="name" class="form-control form-control-lg" placeholder="Имя">
                            </div>
                            <div class="form-group">
                                <input type="text" name="dob" class="form-control form-control-lg" placeholder="Дата рождения">
                            </div>
                            <div class="form-group">
                                <input type="text" name="position" class="form-control form-control-lg" placeholder="Должность">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-info btn-block btn-lg">Подтвердить</button>
                            </div>
                        </form>  
                    </div>
                 </div>
            </div>                            
        </div>     
    </body>
</html>