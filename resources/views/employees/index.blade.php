<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Сотрудники</title>        
    </head>
    <body>
        <ul>
            @foreach ($employees as $employee)
                <li>
                    {{ $employee->name }}
                </li>
            @endforeach
        </ul>
    </body>
</html>
