<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
   <h1>Create project</h1>

   <form action="{{ route('project.store') }}" method="POST">
       @csrf
       <h6>Title</h6>

       <input type="text" name="title">

       <h6>Desc</h6>
       <input type="text" name="description">

       <button type="submit">Create Project</button>
   </form>
</body>
</html>

