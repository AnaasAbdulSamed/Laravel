<?php

namespace App\Http\Controllers;

// use App\Jobs\NewProductJob;
use Illuminate\Http\Request;
use DB;
use App\Product;
use Illuminate\Support\Facades\Auth;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Mail\Mailable;
use App\Jobs\NewProductJob;
use Illuminate\Support\Facades\Log;
use Rap2hpoutre\FastExcel\FastExcel;
use App\DataTables\ProductDataTable;
use Validator;
use App\Http\Co;
use App\Order;
use App\Project;
use App\Student;
use App\Subject;
use App\Task;
use App\User;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class ProductController extends Controller
{
    public function index()
    {
        //dd(Auth::check()) ; to check login or not (tru/false)
        $product = DB::table('products')->get();

        //dd($product);

        return view('product.index', compact('product'));
    }

    public function create()
    {
        return view('product.create');
    }

    public function store(Request $request)
    {


        $validator = FacadesValidator::make($request->all(), [
            'product_name' => 'required|string|max:255',
            'product_code' => 'required|string|max:20|unique:products',
            'details' => 'required|string|max:20|unique:products',
            'brand' => 'required|string|max:20|unique:products',


        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        $user = User::find(Auth::id());

        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_code'] = $request->product_code;
        $data['details'] = $request->details;
        $data['brand'] = $request->brand;
        // $data['user_id'] = Auth::id() ;


        $image = $request->file('logo');
        if ($image) {
            $image_name = date('dmy_H_s_i');  //date-time-second
            $ext = strtolower($image->getClientOriginalExtension());  //image format(png,jpg.etc..)
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'public/media/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);


            // Alert::success('Success Title', 'Success Message');
        }

        $data['logo'] = $image_url;

        $product = $user->products()->create($data);
        // $product = DB::table('products')->insert($data);




        // NewProductJob::dispatch()->delay(now()->addSeconds(3));




        return redirect()->route('demo')


            ->withSuccessMessage('success', 'Product Created Successfully');
    }

    public function Edit($id)
    {

        $user = $this->getUser();
        $product = $user->products()->where('id', $id)->first();

        // $product = Product::where('id', $id)->first();
        // return view('product.edit', compact('product'));
        return $product->toArray();
        // return ["data" => $product] ;
        //  return view('product.edit');



    }

    protected function getUser()
    {
        return User::find(Auth::id());
    }

    public function Update(Request $request)
    {

        $oldlogo = $request->old_logo;
        $data = array();
        $id = $request->id;
        $data['product_name'] = $request->product_name;
        $data['product_code'] = $request->product_code;
        $data['details'] = $request->details;
        $data['brand'] = $request->brand;


        $image = $request->file('logo');
        if ($image) {
            //unlink($oldlogo);
            $image_name = date('dmy_H_s_i');  //date-time-second
            $ext = strtolower($image->getClientOriginalExtension());  //image format(png,jpg.etc..)
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'public/media/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);

            $data['logo'] = $image_url;
        }

        $user = $this->getUser();
        $user->products()->where('id', $id)->update($data);
        // FacadesDB::table('products')
        return redirect()->route('demo')
            ->with('success', 'Product Update Successfully');
    }


    public function Delete($id)
    {

        $user = $this->getUser();
        $user->products()->where('id', $id)->delete();
        // $product = DB::table('products')->where('id', $id)->delete();
        return redirect()->route('product.index');
        alert()->success('SuccessAlert', 'Lorem ipsum dolor sit amet.');


        // ->with('success', 'Product Delete Successfully');

    }

    public function export()
    {
        $product = Product::all();
        return (new FastExcel($product))->download('file.xlsx');
    }

    public function import()
    {
        try {

            $filePath = public_path('storage/excel_files/file.xlsx');



            (new FastExcel)->import($filePath, function ($line) {

                // dd($line);

                // foreach($line as $p){
                //     dd($p['product_name']);
                // }
                // dd($line['product_name'])

                Product::create([
                    'product_name' => $line['product_name'],
                    'product_code' => $line['product_code'],
                    'details' => $line['details'],
                    'logo' => $line['logo'],
                    'brand' => $line['brand'],
                    //  'brand'=>$line['brand'],

                    "user_id" => AUTH::id()



                    //'product_name', 'product_code', 'details', 'logo'
                ]);
            });
        } catch (\Exception $e) {
            Log::error('Error importing data: ' . $e->getMessage());
            echo "Error: " . $e->getMessage();
        }
    }
    public function demo(ProductDataTable $dataTable)
    {

        // $user = User::find(4) ;
        // // dd($user->products) ;
        // $product = DB::table('products')->get();
        // $product = Product::where('id', $id)->first();

        return $dataTable->render('product.demo');


        // url: "/delete/product/" +id,
    }
    public function view($id)
    {
        $productId = 123;
        $url = route('product.view', ['id' => $productId]);

        $user = User::find(decrypt($id));
        return view('product.view');
    }

    public function test()
    {

        // $address = $user->address()->create([
        //     "address_line_1" => "front" ,
        //     "city"  => "abcd" ,
        //     "post_code" => "post1" ,
        //     "state"=> 123
        // ]);
        // return $address ;

        // return $user->address ;

        // return $user->address()->delete() ;
        // has one *************************************************************************************************************
        //  $auth_id = Auth::id() ;
        //  $user = User::find($auth_id) ;

        // return $user->address()->update([
        //     "city" => "jhhsadh"
        // ]);


        // has one through *****************************************************************************

        
        // $user = User::find($auth_id);
        // $user->addresses;
        // return view('product.test')->with(['user'=>$user]);
        // return $user;

        // *********** has to one
        // $user = User::find(1);
        // $address = $user->address; 
        $auth_id = Auth::id();
         $user = User::find($auth_id);
        $user = User::with('address', 'products', 'orders')->find($auth_id);
         //dd($user->products) ;
       

    //   $auth_id = Auth::id();
    //     $user = User::find($auth_id); // Replace with your logic to retrieve a user
// ****************************************************************************************last working
    $auth_id = Auth::id();
         $user = User::find($auth_id);
        $user = User::with('address', 'products', 'orders')->find($auth_id);
             return view('product.test', compact('user'));







    }

    public function onethrough()
    {
        

    //     $project = Project::create([
    //         'title'=> 'Project A'
    //     ]);

    //     $user1 = User::create([
    //         'name'=> 'User 3',
    //         'email'=> 'user3@example.com',
    //         'password' => Hash::make('password'),
    //         'project_id'=> $project->id
    //     ]);
    //     $user2 = User::create([
    //         'name'=> 'User 4',
    //         'email'=> 'user4@example.com',
    //         'password' => Hash::make('password'),
    //         'project_id'=> $project->id
    //     ]);

    //     $user3 = User::create([
    //         'name'=> 'User 5',
    //         'email'=> 'user5@example.com',
    //         'password' => Hash::make('password'),
    //         'project_id'=> $project->id
    //     ]);

    //     $task1 = Task::create([
    //         'title' => 'Task 4 for project 2 by user 3',
    //         'user_id' => $user1->id

    //     ]);
    //     $task2 = Task::create([
    //         'title' => 'Task 4 for project 2 by user 3',
    //         'user_id' => $user1->id

    //     ]);
    
    // $task3 = Task::create([
    //     'title' => 'Task 5 for project 2 by user 4',
    //     'user_id' => $user->id

    // ]);
    // $task3 = Task::create([
    //     'title' => 'Task 6 for project 2 by user 5',
    //     'user_id' => $user5->id

    // ]);
    $project = Project::find(0);
    // return $project->users[1]->tasks; to show user 1 project
    
    dd ($project->tasks);








    }
    public function manytomany()

    {
         $student = Student::first();
        $subject = Subject::first();
        
       
  // $student->subjects()->attach([2,3,4]);
   $student->subjects()->sync([1,3]);
//   $students = Student ::with( 'subject')->get();

//   $student = Student::with(['user','subject'])->get();



// dd($student);





        
 return view('product.manytomany', compact('student'));

    }

  


    

    public function hastomanyth()
    {
      

        $project = Project::find();
        // return $project->tasks;
        dd ($project->tasks);

    }





}
