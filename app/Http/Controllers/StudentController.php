<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GraphAware\Bolt\Protocol\V1\Session;
use App\Http\Requests\StoreStudentRequest;
use Exception;

class StudentController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function edit(Session $client, $id)
    {
        // dd($id);
        // if ($client->run($cypher = "OPTIONAL MATCH (s:STUDENT) WHERE ID(s) = $id RETURN s IS NOT NULL"))
        // {
        //     // dd("not found");
        //     return response()->json([
        //         'status' => 'fail',
        //         'message' => 'There is no student with that id'
        //     ],404);
        // }
        // else
        // {
            $i = 0;
            $student = array();
            $cypher = "MATCH (s:STUDENT) WHERE ID(s) = $id RETURN s,ID(s)" ;

            try{
                $result = $client->run($cypher);
            }
            catch (Exception $e){
                return $e->getMessage();
            }

            // return dd($result);
            
            foreach ($result->getRecords() as $record) {
                $student[$i] = array(
                    "id" => $record->get('ID(s)'),
                    "name" => $record->get('s')->value('name'),
                    "age" => $record->get('s')->value('age'),
                    "email" => $record->get('s')->value('email'),
                    "phone" => $record->get('s')->value('phone'),
                );
                $i++;
            }
            return view('edit',['student' => $student]);
            // return response()->json([
            //     'status' => 'success',
            //     'data' => $students
            // ],200);
        // }
    }

    public function fetchstudent(Session $client)
    {
        // dd('fetchstudent');
        $i = 0;
        $students = array();
        $result = $client->run("MATCH (s:STUDENT {}) RETURN s,ID(s)");
        foreach ($result->getRecords() as $record) {
            // dd($record);
            $students[$i] = array(
                "id" => $record->get('ID(s)'),
                "name" => $record->get('s')->value('name'),
                "age" => $record->get('s')->value('age'),
                "email" => $record->get('s')->value('email'),
                "phone" => $record->get('s')->value('phone'),
            );
            $i++;
        }
        // echo gettype($students);

        // return $students[0]['name'];
        // dd($students);

        return view('welcome',['students' => $students]);

        // return response()->json([
        //     'status' => 'success',
        //     'data' => $students
        // ],200);
    }

    public function test($id)
    {
        return $id;
    }

    public function update(StoreStudentRequest $request, Session $client, $id)
    {
        // $x = $client->run("OPTIONAL MATCH (s:STUDENT) WHERE ID(s) = $id RETURN s");
        // // return dd(($x));

        // //TODO: must check if the student exists
        // if ($x != null) //!null = false
        // {
            // Retrieve the validated input data...
            $request->validated();

            $students = array();
            $cypher = "MATCH (s:STUDENT) WHERE ID(s) = $id
                    SET s.name = '$request->name', s.age = '$request->age'
                    , s.email = '$request->email', s.phone = '$request->phone'";
            
            try {
                $client->run($cypher);
            }
            catch (Exception $e) {
                // return $e->getMessage();
                return response()->json([
                    'status' => 'fail',
                    'message' => 'something went wrong'
                ],500);
            }

            $result = $client->run("MATCH (s:STUDENT) WHERE ID(s) = $id RETURN s,ID(s)");
            foreach ($result->getRecords() as $record) {
                $students = array(
                    "id" => $record->get('ID(s)'),
                    "name" => $record->get('s')->value('name'),
                    "age" => $record->get('s')->value('age'),
                    "email" => $record->get('s')->value('email'),
                    "phone" => $record->get('s')->value('phone'),
                );
            }

            // return response()->json([
            //     'status' => 'success',
            //     'message' => 'Successfully updated',
            //     'student' => $students
            // ],201);

            return redirect()->route('student.get');
            
            
        // }
        // else if($x === null)
        // {
        //     return response()->json([
        //         'status' => 'fail',
        //         'message' => 'There is no student with that id'
        //     ],404);
        // }
        
    }

    public function delete(Session $client,$id)
    {
        //TODO: must check if the student exists
        // if ($client->run($cypher = "OPTIONAL MATCH (s:STUDENT) 
        //             WHERE ID(s) = $id RETURN s IS NOT NULL"))
        // {
        //     // dd("not found");
        //     return response()->json([
        //         'status' => 'fail',
        //         'message' => 'There is no student with that id'
        //     ],404);
        // }
        // else
        // {
            $cypher = "MATCH (s:STUDENT) WHERE ID(s) = $id DETACH DELETE s";

            try{
                $client->run($cypher);
            }
            catch (Exception $e){
                return response()->json([
                    'status' => 'fail',
                    'message' => 'can not delete'
                ],204);
            }
            

            // return response()->json([
            //     'status' => 'success',
            //     'message' => 'Successfully deleted'
            // ],204);
            return redirect()->route('student.get');
        // }

    }

    public function create()
    {
        return view('create');
    }

    public function store(Session $client, StoreStudentRequest $request)
    {
        // Retrieve the validated input data...
        $request->validated();
        //TODO: validation

        $cypher = "CREATE (student:STUDENT {
            name:'$request->name', 
            age:'$request->age',
            email:'$request->email',
            phone:'$request->phone'
            })";

        try {
            $client->run($cypher);
        }
        catch (Exception $e) {
            // return $e->getMessage();
            return response()->json([
                'status' => 'fail',
                'message' => 'something went wrong'
            ],500);
        }
        
        // return response()->json([
        //     'status' => 'success',
        //     'message' => 'Successfully created'
        // ],200);

        return redirect()->route('student.get');
    }
}
