<?php

namespace App\Http\Controllers;

use App\parent_child_relations;
use App\parents;
use App\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ParentsController extends Controller
{
    //show all parents
    public function show_all(Request $request){
        //$parents = parents::all();
        $parents = parents::paginate(30);
        return view('admin.pages.student.view_parents',['parents'=>$parents]);
    }

    //update
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'parent_name' => 'required|string|min:2',
            'parent_occupation' => 'required|string|min:2',
            'parent_residential' => 'required|string|min:2',
            'parent_address' => 'required|string|min:2',
            'parent_contact' => 'required|string|regex:/(07)[0-9]{8}/'
        ]);


        if ($validator->fails()) {
            $errors = $validator->errors();
            $errors = json_decode($errors);
            //return response()->json(array('errors'=>$validator->getMessageBag()->toArray()));
            return response()->json([
                'success' => false,
                'message' => $errors
            ], 422);

        } else {
            //save the parent data
            $parent = parents::find(request('parent_id'));
            $parent->parent_name = request('parent_name');
            $parent->parent_occupation = request('parent_occupation');
            $parent->parent_residence = request('parent_residential');
            $parent->parent_address = request('parent_address');
            $parent->parent_phone_no = request('parent_contact');
            $parent->save();
            return response()->json(['success'=>true,'message'=>'record updated'],200);
        }
    }

    //search
    public function search(Request $request){
        if($request->ajax()){
            $output = "";
            $search_name = request('search');
            //check if its empty
            if(empty($search_name)){
                //$parents = parents::all();
                $parents = parents::paginate(20);
            }else{
                $parents = parents::where('parent_name','like','%'.$search_name.'%')->paginate(20);
            }

            //retrieve the information
            if($parents){
                foreach ($parents as $parent){
                    //display the ouput
                    $output = '<tr class="parent{{$parent->id}} table-hover">'.
                        '<td>'.$parent->parent_name.'</td>'.
                        '<td>'.$parent->parent_phone_no.'</td>'.
                        '<td>'.$parent->parent_occupation.'</td>'.
                        '<td>'.$parent->parent_residence.'</td>'.
                        '<td>'.$parent->parent_address.'</td>'.

                        '<td>'.
                            '<a href="#"
                               class="parent_edit btn btn-lg btn-info"
                               id="edit_student"
                               data-id="'.$parent->id.'"
                               data-name="'.$parent->parent_name.'"
                               data-occupation="'.$parent->parent_occupation.'"
                               data-residence="'.$parent->parent_residence.'"
                               data-address="'.$parent->parent_address.'"
                               data-phone="'.$parent->parent_phone_no.'"
                            >Edit</a>'.
                        '</td>'.

                        '<td>
                            <!--delete>
                            <a href="#"
                               class="parent_student btn btn-danger"
                               id="delete_student"
                               data-id="'.$parent->id.'"
                               data-name="'.$parent->parent_name.'"
                            >Delete</a>
                            <!--in the future add details such as my children-->
                        </td>
                    </tr>';

                    echo $output;
                }
            }else{
                $output = '<tr><td align="center" colspan="7">No Data found</td></tr>';
                echo $output;
            }
        }
    }

    //erase data
    public function delete(){

    }

    //store information
    public function store(Request $request)
    {
        //get the student id
        //use js to check whether student has 2 parents or not

        //get the parent category
        $parent = new parents();
        $parent_child = new parent_child_relations();
        $parent_category = request('parent_category');

        if ($parent_category === 'single' || $parent_category === 'guardian') {
            //one validation form
            $validator = Validator::make($request->all(), [
                'parent_one' => 'required|string|min:2',
                'one_occupation' => 'required|string|min:2',
                'one_residential' => 'required|string|min:2',
                'one_address' => 'required|string|min:2',
                'one_contact' => 'required|string|regex:/(07)[0-9]{8}/',
            ]);

            if ($validator->fails()) {
                $errors = $validator->errors();
                $errors = json_decode($errors);
                //return response()->json(array('errors'=>$validator->getMessageBag()->toArray()));
                return response()->json([
                    'success' => false,
                    'message' => $errors
                ], 422);

            } else {
                //save the parent data
                $parent->parent_name = request('parent_one');
                $parent->parent_occupation = request('one_occupation');
                $parent->parent_residence = request('one_residential');
                $parent->parent_address = request('one_address');
                $parent->parent_phone_no = request('one_contact');
                $parent->save();

                //save the relation between parent and child
                $parent_child->parent_id = $parent->id;
                $parent_child->student_id = request('student_id');
                $parent_child->save();
                return response()->json(['success' => true, 'message' => 'record updated'], 200);
            }


        } else if($parent_category === 'parents') {
            //two validation forms
            $validator = Validator::make($request->all(), [
                'parent_one' => 'required|string|min:2',
                'one_occupation' => 'required|string|min:2',
                'one_residential' => 'required|string|min:2',
                'one_address' => 'required|string|min:2',
                'one_contact' => 'required|string|regex:/(07)[0-9]{8}/',

                'two_parent' => 'required|string|min:2',
                'two_occupation' => 'required|string|min:2',
                'two_residential' => 'required|string|min:2',
                'two_address' => 'required|string|min:2',
                'two_contact' => 'required|string|regex:/(07)[0-9]{8}/',
            ]);

            //validation fails return the data
            if ($validator->fails()) {
                $errors = $validator->errors();
                $errors = json_decode($errors);
                //return response()->json(array('errors'=>$validator->getMessageBag()->toArray()));
                return response()->json([
                    'success' => false,
                    'message' => $errors
                ], 422);


            } else {
                //save for the first parent
                $parent->parent_name = request('parent_one');
                $parent->parent_occupation = request('one_occupation');
                $parent->parent_residence = request('one_residential');
                $parent->parent_address = request('one_address');
                $parent->parent_phone_no = request('one_contact');
                $parent->save();

                //save the relation between parent and child
                $parent_child->parent_id = $parent->id;
                $parent_child->student_id = request('student_id');
                $parent_child->save();

                //save data for the 2nd parent
                $parent1 = new parents();
                $parent1->parent_name = request('two_parent');
                $parent1->parent_occupation = request('two_occupation');
                $parent1->parent_residence = request('two_residential');
                $parent1->parent_address = request('two_address');
                $parent1->parent_phone_no = request('two_contact');
                $parent1->save();

                //save the relation between parent and child
                $parent_child1 = new parent_child_relations();
                $parent_child1->parent_id = $parent1->id;
                $parent_child1->student_id = request('student_id');
                $parent_child1->save();

                return response()->json(['success' => true, 'message' => 'record updated'], 200);
            }

        }else{
            //parent is existing
            $validator = Validator::make($request->all(), [
                'existing_parent_phone' => 'required|string|regex:/(07)[0-9]{8}/'
            ]);

            if ($validator->fails()) {
                $errors = $validator->errors();
                $errors = json_decode($errors);
                //return response()->json(array('errors'=>$validator->getMessageBag()->toArray()));
                return response()->json([
                    'success' => false,
                    'message' => $errors
                ], 422);

            } else {
                //check if phone number exists in the db
                $existing_parent = request('existing_parent_phone');
                //$existing_record = parents::where('parent_phone_no','=',$existing_parent)->get();
                $existing_record = parents::where('parent_phone_no','=',$existing_parent)->first();

                if($existing_record !== null){
                    //record exists
                    //update parent relation table
                    $parent_id = $existing_record->id;
                    $parent_child2 = new parent_child_relations();
                    $parent_child2->parent_id = $parent_id;
                    $parent_child2->student_id = request('student_id');
                    $parent_child2->save();

                    return response()->json(['success' => true, 'message' => 'Parent has been added to child'], 200);
                }else{
                    //record does not exist
                    $error = ['Phone Number'=>'The phone number does not exist'];
                    return response()->json([
                        'success' => false,
                        'message' => $error
                    ], 422);
                }

            }

        }


    }
}
