<?php

namespace App\Http\Controllers;

use App\Questionnaire;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Excel;
use App\Imports\UsersImport;
use App\Exports\UsersExport;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */


    public function fileImportExport()
    {
        return view('file-import');
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function fileImport(Request $request)
    {
        Excel::import(new UsersImport, $request->file('file')->store('temp'));
        return back();
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function fileExport()
    {
        return Excel::download(new UsersExport, 'users-collection.xlsx');
    }


    public function index()
    {

        return view('admin.user.read',[
            'status' => 'All',
            'result_1' => 'All',
            'nationality' => 'All',
            'gender' => 'All',
            'year' => 'All',
            'commitment' => 'All',
            'educational_background' => 'All',
            'educational_level' => 'All',
            'academy_location' => 'ALL'
        ])->with('users', User::where('nationality', "!=", null)->where('academy_location','amman')->orderBy('en_first_name')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */

    public function filter(Request $request){
        //dd($request);
        $users = User::query();
        if($request->filled('status')){
            $users->where('status', $request->status)->orderBy('en_first_name');
        }
        if($request->filled('result_1')){
            $users->where('result_1', $request->result_1)->orderBy('en_first_name');
        }
        if($request->filled('nationality')){
            $users->where('nationality', $request->nationality)->orderBy('en_first_name');
        }
        if($request->filled('gender')){
            $users->where('gender', $request->gender)->orderBy('en_first_name');
        }
        if($request->filled('year')){
            $users->where('year', $request->year)->orderBy('en_first_name');
        }
        if($request->filled('commitment')){
            $users->where('is_committed', $request->commitment)->orderBy('en_first_name');
        }
        if($request->filled('educational_background')){
            $users->where('educational_background', $request->educational_background)->orderBy('en_first_name');
        }
        if($request->filled('educational_level')){
            $users->where('educational_level', $request->educational_level)->orderBy('en_first_name');
        }

        if($request->filled('academy_location')){
            $users->where('academy_location',$request->academy_location)->orderBy('en_first_name');
        }
        if( $request->status != ""){
            $status = $request->status;
        }else{
            $status = "All";
        }
        if( $request->result_1 != ""){
            $result_1 = $request->result_1;
        }else{
            $result_1 = "All";
        }
        if( $request->nationality != ""){
            $nationality = $request->nationality;
        }else{
            $nationality = "All";
        }
        if( $request->gender != ""){
            $gender = $request->gender;
        }else{
            $gender = "All";
        }
        if( $request->year != ""){
            $year = $request->year;
        }else{
            $year = "All";
        }
        if( $request->commitment != ""){
            $commitment = $request->commitment;
        }else{
            $commitment = "All";
        }
        if( $request->educational_background != ""){
            $educational_background = $request->educational_background;
        }else{
            $educational_background = "All";
        }
        if( $request->educational_level != ""){
            $educational_level = $request->educational_level;
        }else{
            $educational_level = "All";
        }
        if($request->academy_location != ""){
            $academy_location = $request->academy_location;
        }else{
            $academy_location = "ALL";
        }
        if($request->university != ""){
            $university = $request->university;
        }else{
            $university = "Not Found";
        }if($request->field != ""){
            $university = $request->field;
        }else{
            $field= "Not Found";
        }
        return view('admin.user.read', [
            'users' => $users->where('nationality', "!=" ,null)->where('academy_location','amman')->get(),
            'status' => $status,
            'result_1' => $result_1,
            'nationality' => $nationality,
            'gender' => $gender,
            'year' => $year,
            'commitment' => $commitment,
            'educational_background' => $educational_background ,
            'educational_level' => $educational_level,
            'academy_location'  => $academy_location,
            'university'=> $university,
            'field' => $field,
            "personal_img" => $request->personal_img,
            "id_img" => $request->personal_img,
            "vaccination_img" => $request->personal_img,
        ]);
    }

    public function status(Request $request, $id){
        $validated = $request->validate([
            'result_1' => 'required'
        ]);
        User::where('id', $id)->first()->update(
            [
                'result_1' => $request->result_1 ,
                'status' =>$request->result_1 ,
            ]

        );
        return back()->with('status_store', 'The Status Has been Updated Successfully' );
    }


    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit(User $user)
    {

        $dateOfBirth = $user->day."-".$user->month."-".$user->year;
        $age =  Carbon::parse($dateOfBirth)->age;
        if(!DB::table('code_challenges')->where('user_id', $user->id)->exists()){
            $html_certificate = '_';
            $css_certificate = '_';
            $js_certificate = '_';
        }else{
            $html_certificate = Storage::disk('local')->url(DB::table('code_challenges')->where('user_id', $user->id)->first()->html_certificate);
            $css_certificate = Storage::disk('local')->url(DB::table('code_challenges')->where('user_id', $user->id)->first()->css_certificate);
            $js_certificate = Storage::disk('local')->url(DB::table('code_challenges')->where('user_id', $user->id)->first()->js_certificate);
        }
        if(!DB::table('english_quizzes')->where('user_id', $user->id)->exists()){
            $english_score = '_';
            $english_account_link = '_';
            $english_score_image = '_';
        }else{
            $english_score = DB::table('english_quizzes')->where('user_id', $user->id)->first()->english_score ;
            $english_account_link = DB::table('english_quizzes')->where('user_id', $user->id)->first()->english_account_link ;
            $english_score_image = Storage::disk('local')->url(DB::table('english_quizzes')->where('user_id', $user->id)->first()->english_score_image);
        }
        $questionnaires = Questionnaire::all() ;
        return view('admin.user.update', compact(['age','html_certificate','css_certificate','js_certificate', 'english_score' , 'english_account_link' , 'english_score_image',  'questionnaires', 'user']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function openCodeChallenge($id)
    {
        //
        User::where('id', $id)->first()->update(
            [
                'status' => 'in_progress' ,
                'is_submitted' => '0' ,
            ]
        );
        DB::table('code_challenges')->where('user_id', $id)->delete();
        return redirect()->back();

    }
    public function openEnglishQuiz($id)
    {
        //
        User::where('id', $id)->first()->update(
            [
                'status' => 'in_progress' ,
                'is_submitted' => '0' ,
            ]
        );
        DB::table('english_quizzes')->where('user_id', $id)->delete();
        return redirect()->back();
    }
    public function openQuestionnaire($id)
    {
        //

        User::where('id', $id)->first()->update(
            [
                'status' => 'in_progress' ,
                'is_submitted' => '0' ,
            ]
        );
        return redirect()->back();
    }
    public function destroy($id){
         //
        $user = User::findOrFail($id);
        $user->delete();
        DB::table('code_challenges')->where('user_id', $id)->delete();
        DB::table('english_quizzes')->where('user_id', $id)->delete();

        return redirect()->route('users.index');
    }
}
