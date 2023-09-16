<!DOCTYPE html>
<html>
<head>
    <title>Student Details</title>
</head>
<body>
    <h1>Student Details</h1>
    
    <p>Name: {{ $student->student_name }}</p>
    <p>Roll Number: {{ $student->student_rollno }}</p>


    


   
 

    

    <h2>Subjects:</h2>
    <ul>
        @foreach ($student->subjects as $subject)
        
            <li>{{ $subject->sujbject_name}}</li>
            <li>{{ $subject->student_id }}</li>
        @endforeach
    </ul>
   
</body>
</html>
