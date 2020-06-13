<?php
namespace App\Http\Controllers;
use \Auth;
use App\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = Message::paginate(10);

        return view('admin.messages.messages', compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contact');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = Auth::id();
        $file = '';
        if($request->hasFile('picture')){

           $filename = $request->picture->getClientOriginalName(); // save the original fileName instead of gibberish
            $request->picture->storeAs('public/pictures', $filename); // save on storage
            $file .= $filename;

        }
        if($request->hasFile('picture1')){

            $filename = $request->picture1->getClientOriginalName();
            $request->picture1->storeAs('public/pictures', $filename);
            $file .= '/'; // seperator between files in the database
            $file .= $filename;

        }
        if($request->hasFile('picture2')){

            $filename = $request->picture2->getClientOriginalName();
            $request->picture2->storeAs('public/pictures', $filename);
            $file .= '/';
            $file .= $filename;

        }
        if($request->hasFile('picture3')){

            $filename = $request->picture3->getClientOriginalName();
            $request->picture3->storeAs('public/pictures', $filename);
            $file .= '/';
            $file .= $filename;

        }
            $subject = $request->subject;
            $msgs = $request->message;

        // Create a message in database
        $message = Message::create(['subject' => $subject, 'message' => $msgs, 'user_id'=>$user_id, 'picture' => $file]);


        return redirect('contact');
    }

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
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
    public function destroy($id)
    {
        $message = Message::findOrFail($id);

        $message->delete();

        session()->flash('message', 'Message was deleted');

        return redirect('admin/messages');
    }
}
?>
