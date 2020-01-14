<!DOCTYPE html>
<html lang="en">
    <head>     
        <title>CRUD приложение с использованием Laravel, Vue, PHP, PostgreeSql</title> 
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">              
    </head>

    <body>
        <!-- Изменение сотрудника -->
        <div id="overlay" v-if="showEditModal">  
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="model-header">                                          
                        <a href="/" class="btn btn-info btn-block alert-danger btn-lg">Отменить изменение сотрудника</a>   
                        <h4 class="modal-title ml-4 mt-4">Изменение сотрудника</h4> 
                        <h5 class="modal-title ml-4 mt-4">Измените данные сотрудника ниже</h5> 
                    </div>
                    <div class="modal-body p-4">
                        <form action="/update/{{ $employee_data->id }}" method="POST">  
                        {{ csrf_field() }}   
                        {{ method_field('PUT') }}   
                             <div class="form-group">
                                <input type="text" name="id" id="id" class="form-control form-control-lg" value="{{ $employee_data->id }}" placeholder="id" readonly>
                            </div>                                                                        
                            <div class="form-group">
                                <input type="text" name="name" id="name" class="form-control form-control-lg" value="{{ $employee_data->name }}" placeholder="Имя">
                            </div>
                            <div class="form-group">
                                <input type="text" name="dob" id="dob" class="form-control form-control-lg" value="{{ $employee_data->dob }}" placeholder="Дата рождения">
                            </div>
                            <div class="form-group">
                                <input type="text" name="position" id="position" class="form-control form-control-lg" value="{{ $employee_data->position }}" placeholder="Должность">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-info btn-block btn-lg">Применить изменения</button>
                            </div>
                        </form>  
                    </div>
                 </div>
            </div>                            
        </div>     
    </body>
</html>